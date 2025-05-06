<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogue extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['category_model', 'ballot_model', 'brand_model']);
        $this->load->helper(array('url', 'form', 'auth'));
        $this->load->library('session');
    }
    
    public function index() {
        // Récupérer les paramètres de filtrage
        $category = $this->input->get('cat', TRUE);
        $sort = $this->input->get('sort', TRUE) ?: 'newest';
        $price_min = $this->input->get('min', TRUE) ?: null;
        $price_max = $this->input->get('max', TRUE) ?: null;
        $selected_brands = $this->input->get('brands', TRUE) ?: [];
        
        // Récupérer l'éventail de prix pour le slider
        $price_range = $this->ballot_model->get_price_range();
        
        // Si aucun prix max n'est spécifié, utiliser le prix max de la gamme
        if ($price_max === null) {
            $price_max = $price_range['max_price'];
        }
        
        // Récupérer toutes les marques, regroupées par tier
        $all_brands = $this->brand_model->get_all_brands();
        $brands_by_tier = [
            'standard' => [],
            'premium' => [],
            'luxe' => []
        ];
        
        foreach ($all_brands as $brand) {
            $brands_by_tier[$brand['tier']][] = $brand;
        }
        
        // Récupérer les données pour la vue
        $data['categories'] = $this->category_model->get_all_categories();
        $data['ballots'] = $this->ballot_model->get_ballots_filtered($category, $sort, $price_min, $price_max, $selected_brands);
        $data['active_category'] = $category;
        $data['sort'] = $sort;
        $data['price_range'] = $price_range;
        $data['price_min'] = $price_min ?: $price_range['min_price'];
        $data['price_max'] = $price_max;
        $data['brands_by_tier'] = $brands_by_tier;
        $data['selected_brands'] = $selected_brands;
        
        // Charger les vues
        $this->load->view('templates/header', ['title' => 'Catalogue de ballots | BallotPro']);
        $this->load->view('catalogue/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function detail($id) {
        $data['ballot'] = $this->ballot_model->get_ballot_by_id($id);
        
        if(empty($data['ballot'])) {
            show_404();
        }
        
        $data['related_ballots'] = $this->ballot_model->get_related_ballots($data['ballot']['category_id'], $id);
        
        // Charger les vues
        $this->load->view('templates/header', ['title' => $data['ballot']['name'] . ' | BallotPro']);
        $this->load->view('catalogue/detail', $data);
        $this->load->view('templates/footer');
    }
}
