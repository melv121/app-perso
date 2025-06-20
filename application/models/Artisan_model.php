<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artisan_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_by_user($user_id) {
        $query = $this->db->get_where('artisans', array('user_id' => $user_id));
        return $query->row();
    }
    
    public function get_by_id($id) {
        $query = $this->db->get_where('artisans', array('id' => $id));
        return $query->row();
    }
    
    public function insert($data) {
        return $this->db->insert('artisans', $data);
    }
    
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('artisans', $data);
    }
    
    public function delete($id) {
        return $this->db->delete('artisans', array('id' => $id));
    }
}
