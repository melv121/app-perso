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
            $this->load->model(['User_model', 'Artisan_model', 'Product_model']);
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
        
        $this->load->view('artisan/dashboard', compact('artisan', 'products'));
    }

    public function devenir() {
        $user_id = $this->session->userdata('user_id');
        if ($this->input->post()) {
            $data = [
                'user_id' => $user_id,
                'bio' => $this->input->post('bio'),
                'website' => $this->input->post('website')
            ];
            try {
                $this->Artisan_model->insert($data);
                redirect('artisan/dashboard');
            } catch (Exception $e) {
                $error = 'Erreur lors de l\'enregistrement.';
            }
        }
        $this->load->view('artisan/devenir', isset($error) ? compact('error') : []);
    }
}
