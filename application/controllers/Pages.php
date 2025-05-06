<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form', 'auth'));
        $this->load->library('session');
    }
    
    public function how_it_works() {
        // Charger les vues
        $this->load->view('templates/header', ['title' => 'Comment ça marche | BallotPro']);
        $this->load->view('pages/how_it_works');
        $this->load->view('templates/footer');
    }
    
    public function about() {
        $this->load->view('templates/header', ['title' => 'À propos | BallotPro']);
        $this->load->view('pages/about');
        $this->load->view('templates/footer');
    }
    
    public function contact() {
        $this->load->view('templates/header', ['title' => 'Contact | BallotPro']);
        $this->load->view('pages/contact');
        $this->load->view('templates/footer');
    }
    
    public function faq() {
        $this->load->view('templates/header', ['title' => 'FAQ | BallotPro']);
        $this->load->view('pages/faq');
        $this->load->view('templates/footer');
    }
    
    public function legal() {
        $this->load->view('templates/header', ['title' => 'Mentions légales | BallotPro']);
        $this->load->view('pages/legal');
        $this->load->view('templates/footer');
    }
    
    public function terms() {
        $this->load->view('templates/header', ['title' => 'Conditions générales de vente | BallotPro']);
        $this->load->view('pages/terms');
        $this->load->view('templates/footer');
    }
    
    public function privacy() {
        $this->load->view('templates/header', ['title' => 'Politique de confidentialité | BallotPro']);
        $this->load->view('pages/privacy');
        $this->load->view('templates/footer');
    }
}