<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        try {
            $this->load->database();
            $this->load->model(['Product_model', 'Artisan_model']);
        } catch (Exception $e) {
            show_error('Erreur de base de données : ' . $e->getMessage());
        }
    }

    public function add() {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('type') != 'artisan') {
            redirect('login');
        }
        
        $user_id = $this->session->userdata('user_id');
        $artisan = null;
        
        try {
            if (isset($this->Artisan_model)) {
                $artisan = $this->Artisan_model->get_by_user($user_id);
            }
        } catch (Exception $e) {
            show_error('Erreur lors du chargement du profil artisan.');
        }
        
        if (!$artisan) {
            redirect('artisan/devenir');
        }
        
        if ($this->input->post()) {
            // Validation des données
            $category = $this->input->post('category');
            if (empty($category)) {
                $category = 'art'; // Valeur par défaut
            }
            
            // Gestion de l'upload d'image
            $image_name = '';
            if (!empty($_FILES['image']['name'])) {
                $upload_result = $this->upload_image();
                if ($upload_result['success']) {
                    $image_name = $upload_result['filename'];
                } else {
                    $data['error'] = $upload_result['error'];
                    $this->load->view('products/add', $data);
                    return;
                }
            }
            
            $data = [
                'artisan_id' => $artisan->id,
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'category' => $category,
                'image' => $image_name
            ];
            
            try {
                $this->Product_model->insert($data);
                $this->session->set_flashdata('success', 'Produit ajouté avec succès !');
                redirect('artisan/dashboard');
            } catch (Exception $e) {
                $data['error'] = 'Erreur lors de l\'ajout du produit : ' . $e->getMessage();
                $this->load->view('products/add', $data);
                return;
            }
        }
        
        $this->load->view('products/add');
    }

    private function upload_image() {
        // Créer le dossier uploads s'il n'existe pas
        $upload_path = './uploads/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        
        // Debug du fichier reçu
        log_message('debug', 'File upload attempt - Name: ' . $_FILES['image']['name'] . ' - Type: ' . $_FILES['image']['type'] . ' - Size: ' . $_FILES['image']['size']);
        
        // Configuration simplifiée de l'upload
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = '*'; // Permettre tous les types temporairement pour tester
        $config['max_size'] = 10240; // 10MB
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = FALSE;
        
        // Réinitialiser complètement la librairie
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('image')) {
            $upload_data = $this->upload->data();
            
            // Vérifier que c'est bien une image après upload
            $image_info = getimagesize($upload_data['full_path']);
            if ($image_info === false) {
                // Supprimer le fichier si ce n'est pas une image
                unlink($upload_data['full_path']);
                return [
                    'success' => false,
                    'error' => 'Le fichier uploadé n\'est pas une image valide.'
                ];
            }
            
            // Redimensionner l'image si elle est trop grande
            $this->resize_image($upload_data['full_path'], 1200, 800);
            
            return [
                'success' => true,
                'filename' => $upload_data['file_name'],
                'original_name' => $upload_data['orig_name']
            ];
        } else {
            // Debug détaillé des erreurs
            $errors = $this->upload->display_errors('', '');
            log_message('error', 'Upload failed: ' . $errors);
            log_message('error', 'PHP Upload Error Code: ' . $_FILES['image']['error']);
            
            // Messages d'erreur plus explicites
            $error_messages = [
                UPLOAD_ERR_INI_SIZE => 'Le fichier est trop volumineux (limite PHP).',
                UPLOAD_ERR_FORM_SIZE => 'Le fichier est trop volumineux (limite formulaire).',
                UPLOAD_ERR_PARTIAL => 'Le fichier n\'a été que partiellement uploadé.',
                UPLOAD_ERR_NO_FILE => 'Aucun fichier n\'a été uploadé.',
                UPLOAD_ERR_NO_TMP_DIR => 'Dossier temporaire manquant.',
                UPLOAD_ERR_CANT_WRITE => 'Impossible d\'écrire le fichier sur le disque.',
                UPLOAD_ERR_EXTENSION => 'Upload stoppé par une extension PHP.'
            ];
            
            $php_error = isset($error_messages[$_FILES['image']['error']]) 
                ? $error_messages[$_FILES['image']['error']] 
                : 'Erreur inconnue.';
            
            return [
                'success' => false,
                'error' => 'Erreur d\'upload: ' . $errors . ' | Erreur PHP: ' . $php_error
            ];
        }
    }
    
    private function resize_image($source_path, $max_width = 1200, $max_height = 800) {
        // Vérifier que le fichier existe
        if (!file_exists($source_path)) {
            return false;
        }
        
        // Configuration du redimensionnement
        $config['image_library'] = 'gd2';
        $config['source_image'] = $source_path;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $max_width;
        $config['height'] = $max_height;
        $config['quality'] = 90;
        
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        
        if (!$this->image_lib->resize()) {
            log_message('error', 'Image resize failed: ' . $this->image_lib->display_errors());
            // Ne pas bloquer si le redimensionnement échoue
        }
        
        $this->image_lib->clear();
        return true;
    }

    public function edit($id) {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('type') != 'artisan') {
            redirect('login');
        }
        
        $user_id = $this->session->userdata('user_id');
        $artisan = $this->Artisan_model->get_by_user($user_id);
        $product = $this->Product_model->get_by_id($id);
        
        // Vérifier que le produit appartient à l'artisan connecté
        if (!$product || $product->artisan_id != $artisan->id) {
            show_404();
        }
        
        if ($this->input->post()) {
            // Gestion de l'upload d'image pour l'édition
            $image_name = $product->image; // Garder l'ancienne image par défaut
            
            if (!empty($_FILES['image']['name'])) {
                $upload_result = $this->upload_image();
                if ($upload_result['success']) {
                    // Supprimer l'ancienne image
                    if (!empty($product->image) && file_exists('./uploads/' . $product->image)) {
                        unlink('./uploads/' . $product->image);
                    }
                    $image_name = $upload_result['filename'];
                } else {
                    $data = array('error' => $upload_result['error'], 'product' => $product);
                    $this->load->view('products/edit', $data);
                    return;
                }
            }
            
            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'category' => $this->input->post('category') ?: $product->category,
                'image' => $image_name
            ];
            
            try {
                $this->Product_model->update($id, $data);
                $this->session->set_flashdata('success', 'Produit modifié avec succès.');
                redirect('artisan/dashboard');
            } catch (Exception $e) {
                $data = array('error' => 'Erreur lors de la modification du produit.', 'product' => $product);
                $this->load->view('products/edit', $data);
            }
        }
        
        $data = array('product' => $product);
        $this->load->view('products/edit', $data);
    }

    public function delete($id) {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('type') != 'artisan') {
            redirect('login');
        }
        
        $user_id = $this->session->userdata('user_id');
        $artisan = $this->Artisan_model->get_by_user($user_id);
        $product = $this->Product_model->get_by_id($id);
        
        // Vérifier que le produit appartient à l'artisan connecté
        if (!$product || $product->artisan_id != $artisan->id) {
            show_404();
        }
        
        try {
            // Supprimer l'image associée
            if (!empty($product->image) && file_exists('./uploads/' . $product->image)) {
                unlink('./uploads/' . $product->image);
            }
            
            $this->Product_model->delete($id);
            $this->session->set_flashdata('success', 'Produit supprimé avec succès.');
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Erreur lors de la suppression du produit.');
        }
        
        redirect('artisan/dashboard');
    }

    public function collections() {
        try {
            $this->load->model('Product_model');
            $products = $this->Product_model->get_all();
            $data = array('products' => $products);
            $this->load->view('products/collections', $data);
        } catch (Exception $e) {
            $products = array();
            $data = array('products' => $products);
            $this->load->view('products/collections', $data);
        }
    }
    
    public function filter_by_category() {
        $category = $this->input->post('category');
        
        try {
            $this->load->model('Product_model');
            if ($category === 'all') {
                $products = $this->Product_model->get_all();
            } else {
                $products = $this->Product_model->get_by_category($category);
            }
            
            // Retourner les données en JSON
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'products' => $products,
                'count' => count($products)
            ]);
        } catch (Exception $e) {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage(),
                'products' => [],
                'count' => 0
            ]);
        }
    }
}
