<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all() {
        // Retourner un tableau vide si pas de base connectée pour éviter les erreurs
        try {
            if (!$this->db->table_exists('products')) {
                return array();
            }
            $this->db->select('products.*, artisans.*, users.username');
            $this->db->from('products');
            $this->db->join('artisans', 'products.artisan_id = artisans.id', 'left');
            $this->db->join('users', 'artisans.user_id = users.id', 'left');
            $this->db->order_by('products.created_at', 'DESC');
            return $this->db->get()->result();
        } catch (Exception $e) {
            return array();
        }
    }

    public function get_by_artisan($artisan_id) {
        $query = $this->db->get_where('products', array('artisan_id' => $artisan_id));
        return $query->result();
    }

    public function get_by_id($id) {
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row();
    }

    public function insert($data) {
        return $this->db->insert('products', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete($id) {
        return $this->db->delete('products', array('id' => $id));
    }
    
    public function get_by_category($category) {
        $query = $this->db->get_where('products', array('category' => $category));
        return $query->result();
    }
    
    public function get_categories_with_count() {
        try {
            $this->db->select('category, COUNT(*) as count');
            $this->db->from('products');
            $this->db->group_by('category');
            return $this->db->get()->result();
        } catch (Exception $e) {
            return array();
        }
    }
}
