<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artisan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        // Vérifier l'authentification avant tout
        if (!$this->session->userdata('logged_in') || $this->session->userdata('type') != 'artisan') {
            redirect('login');
        }
        
        // Charger la base de données et les modèles avec gestion d'erreur
        try {
            $this->load->database();
            $this->load->model(array('User_model', 'Artisan_model', 'Product_model'));
        } catch (Exception $e) {
            show_error('Erreur de base de données : ' . $e->getMessage());
        }
    }

    public function dashboard() {
        $user_id = $this->session->userdata('user_id');
        $artisan = null;
        $products = array();
        
        try {
            // Vérifier que le modèle est bien chargé
            if (isset($this->Artisan_model)) {
                $artisan = $this->Artisan_model->get_by_user($user_id);
            }
            if (isset($this->Product_model) && $artisan) {
                $products = $this->Product_model->get_by_artisan($artisan->id);
            }
        } catch (Exception $e) {
            // En cas d'erreur, continuer avec des valeurs par défaut
        }
        
        $data = array(
            'artisan' => $artisan,
            'products' => $products
        );
        
        $this->load->view('artisan/dashboard', $data);
    }

    public function devenir() {
        $user_id = $this->session->userdata('user_id');
        $data = array();
        
        if ($this->input->post()) {
            $insert_data = array(
                'user_id' => $user_id,
                'bio' => $this->input->post('bio'),
                'website' => $this->input->post('website')
            );
            
            try {
                $this->Artisan_model->insert($insert_data);
                redirect('artisan/dashboard');
            } catch (Exception $e) {
                $data['error'] = 'Erreur lors de l\'enregistrement.';
            }
        }
        
        $this->load->view('artisan/devenir', $data);
    }
}
