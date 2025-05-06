<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ballot_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_ballots_filtered($category = null, $sort = 'newest', $price_min = null, $price_max = null, $brands = null) {
        $this->db->select('b.*, c.name as category_name, c.slug as category_slug');
        $this->db->from('ballots b');
        $this->db->join('categories c', 'b.category_id = c.id');
        $this->db->where('b.stock >', 0);
        
        if ($category) {
            $this->db->where('c.slug', $category);
        }
        
        if ($price_min !== null) {
            $this->db->where('b.price >=', $price_min);
        }
        
        if ($price_max !== null) {
            $this->db->where('b.price <=', $price_max);
        }
        
        if ($brands !== null && is_array($brands) && !empty($brands)) {
            $this->db->join('ballot_brand bb', 'b.id = bb.ballot_id');
            $this->db->where_in('bb.brand_id', $brands);
            $this->db->group_by('b.id'); // Pour éviter les duplications si plusieurs marques correspondent
        }
        
        switch ($sort) {
            case 'price_low':
                $this->db->order_by('b.price', 'ASC');
                break;
            case 'price_high':
                $this->db->order_by('b.price', 'DESC');
                break;
            case 'popularity':
                $this->db->order_by('b.sales', 'DESC');
                break;
            case 'newest':
            default:
                $this->db->order_by('b.created_at', 'DESC');
                break;
        }
        
        $query = $this->db->get();
        $ballots = $query->result_array();
        
        // Récupérer les marques pour chaque ballot
        foreach ($ballots as $key => $ballot) {
            $ballots[$key]['brands'] = $this->get_ballot_brands($ballot['id']);
        }
        
        return $ballots;
    }
    
    public function get_ballot_by_id($id) {
        $this->db->select('b.*, c.name as category_name, c.slug as category_slug');
        $this->db->from('ballots b');
        $this->db->join('categories c', 'b.category_id = c.id');
        $this->db->where('b.id', $id);
        $query = $this->db->get();
        $ballot = $query->row_array();
        
        if ($ballot) {
            // Ajouter les marques associées
            $ballot['brands'] = $this->get_ballot_brands($id);
        }
        
        return $ballot;
    }
    
    public function get_ballot_brands($ballot_id) {
        $this->db->select('br.id, br.name, br.slug, br.tier, bb.percentage');
        $this->db->from('ballot_brand bb');
        $this->db->join('brands br', 'bb.brand_id = br.id');
        $this->db->where('bb.ballot_id', $ballot_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_related_ballots($category_id, $exclude_id, $limit = 4) {
        $this->db->where('category_id', $category_id);
        $this->db->where('id !=', $exclude_id);
        $this->db->where('stock >', 0);
        $this->db->limit($limit);
        $this->db->order_by('sales', 'DESC');
        $query = $this->db->get('ballots');
        $ballots = $query->result_array();
        
        // Récupérer les marques pour chaque ballot
        foreach ($ballots as $key => $ballot) {
            $ballots[$key]['brands'] = $this->get_ballot_brands($ballot['id']);
        }
        
        return $ballots;
    }
    
    public function get_featured_ballots($limit = 6) {
        $this->db->where('stock >', 0);
        $this->db->limit($limit);
        $this->db->order_by('sales', 'DESC');
        $query = $this->db->get('ballots');
        $ballots = $query->result_array();
        
        // Récupérer les marques pour chaque ballot
        foreach ($ballots as $key => $ballot) {
            $ballots[$key]['brands'] = $this->get_ballot_brands($ballot['id']);
        }
        
        return $ballots;
    }
    
    public function calculate_potential_margin($wholesale_price, $estimated_retail) {
        $margin = $estimated_retail - $wholesale_price;
        $percentage = ($margin / $wholesale_price) * 100;
        return round($percentage);
    }
    
    public function get_all_brands() {
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('brands');
        return $query->result_array();
    }
    
    public function get_price_range() {
        $this->db->select_min('price', 'min_price');
        $this->db->select_max('price', 'max_price');
        $query = $this->db->get('ballots');
        return $query->row_array();
    }
    
    public function search_ballots($search_term, $limit = 10) {
        $this->db->select('b.*, c.name as category_name');
        $this->db->from('ballots b');
        $this->db->join('categories c', 'b.category_id = c.id');
        $this->db->like('b.name', $search_term);
        $this->db->or_like('b.description', $search_term);
        $this->db->or_like('c.name', $search_term);
        $this->db->where('b.stock >', 0);
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }
}
