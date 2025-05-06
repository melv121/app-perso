<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->helper(array('url', 'form', 'auth'));
        $this->load->library('session');
    }
    
    public function index() {
        // Charger les données à afficher sur la page d'accueil
        $data['categories'] = $this->category_model->get_all_categories();
        $data['testimonials'] = $this->get_testimonials();
        
        // Charger les vues
        $this->load->view('templates/header', ['title' => 'BallotPro - Ballots de vêtements pour revendeurs']);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
    
    private function get_testimonials() {
        // Dans une version future, ces données pourraient venir d'une base de données
        return [
            [
                'content' => "J'ai pu lancer ma boutique en ligne grâce aux ballots de BallotPro. Le rapport qualité/prix est imbattable!",
                'author' => "Marie L., propriétaire de \"Vintage Corner\""
            ],
            [
                'content' => "Des vêtements de qualité et un service client réactif. Je recommande!",
                'author' => "Thomas D., revendeur sur Vinted"
            ]
        ];
    }
}
