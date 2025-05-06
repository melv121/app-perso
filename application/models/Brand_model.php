<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all_brands() {
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('brands');
        return $query->result_array();
    }
    
    public function get_brands_by_tier($tier = null) {
        if ($tier !== null) {
            $this->db->where('tier', $tier);
        }
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('brands');
        return $query->result_array();
    }
    
    public function get_brand_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('brands');
        return $query->row_array();
    }
    
    public function get_brand_by_slug($slug) {
        $this->db->where('slug', $slug);
        $query = $this->db->get('brands');
        return $query->row_array();
    }
    
    public function get_ballots_by_brand($brand_id, $limit = null) {
        $this->db->select('b.*');
        $this->db->from('ballots b');
        $this->db->join('ballot_brand bb', 'b.id = bb.ballot_id');
        $this->db->where('bb.brand_id', $brand_id);
        $this->db->where('b.stock >', 0);
        $this->db->group_by('b.id');
        
        if ($limit !== null) {
            $this->db->limit($limit);
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_popular_brands($limit = 10) {
        // Récupère les marques les plus présentes dans les ballots vendus
        $this->db->select('br.id, br.name, br.slug, br.tier, COUNT(bb.id) as ballot_count');
        $this->db->from('brands br');
        $this->db->join('ballot_brand bb', 'br.id = bb.brand_id');
        $this->db->join('ballots b', 'bb.ballot_id = b.id');
        $this->db->group_by('br.id');
        $this->db->order_by('ballot_count', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();
    }
}
