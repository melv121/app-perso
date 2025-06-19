<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Ne charger la base que si elle existe
        try {
            $this->load->database();
        } catch (Exception $e) {
            // Ignorer l'erreur de base de données pour l'instant
        }
    }

    public function index() {
        $products = array(); // Tableau vide par défaut
        
        // Essayer de charger les produits seulement si possible
        try {
            if (file_exists(APPPATH . 'models/Product_model.php')) {
                $this->load->model('Product_model');
                $products = $this->Product_model->get_all();
            }
        } catch (Exception $e) {
            // En cas d'erreur, garder un tableau vide
            $products = array();
        }
        
        $this->load->view('welcome_message', compact('products'));
    }
    public function about() {
        $this->load->view('static/about');
    }
    public function contact() {
        $this->load->view('static/contact');
    }
    public function conditions() {
        $this->load->view('static/conditions');
    }
}
