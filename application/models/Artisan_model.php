<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artisan_model extends CI_Model {
    public function get_by_user($user_id) {
        try {
            if (!$this->db->table_exists('artisans')) {
                return null;
            }
            return $this->db->get_where('artisans', ['user_id' => $user_id])->row();
        } catch (Exception $e) {
            return null;
        }
    }
    
    public function create($data) {
        try {
            if (!$this->db->table_exists('artisans')) {
                return false;
            }
            $this->db->insert('artisans', $data);
            return $this->db->insert_id();
        } catch (Exception $e) {
            log_message('error', 'Erreur création artisan: ' . $e->getMessage());
            return false;
        }
    }
    
    public function update($id, $data) {
        try {
            $this->db->where('id', $id);
            return $this->db->update('artisans', $data);
        } catch (Exception $e) {
            log_message('error', 'Erreur mise à jour artisan: ' . $e->getMessage());
            return false;
        }
    }
    
    public function get_by_id($id) {
        try {
            return $this->db->get_where('artisans', ['id' => $id])->row();
        } catch (Exception $e) {
            return null;
        }
    }
}
