<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $data = array('products' => array());
        
        try {
            $this->load->database();
            if (file_exists(APPPATH . 'models/Product_model.php')) {
                $this->load->model('Product_model');
                $products = $this->Product_model->get_all();
                $data['products'] = $products ? $products : array();
            }
        } catch (Exception $e) {
            // Ignorer les erreurs et continuer avec un tableau vide
            log_message('error', 'Database error in Welcome::index: ' . $e->getMessage());
        }
        
        $this->load->view('welcome_message', $data);
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
