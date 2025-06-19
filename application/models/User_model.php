<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function insert($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
    
    public function get_by_username($username) {
        try {
            if (!$this->db->table_exists('users')) {
                return null;
            }
            return $this->db->get_where('users', ['username' => $username])->row();
        } catch (Exception $e) {
            return null;
        }
    }
    
    public function get_by_id($id) {
        try {
            return $this->db->get_where('users', ['id' => $id])->row();
        } catch (Exception $e) {
            return null;
        }
    }
    
    public function get_by_email($email) {
        try {
            if (!$this->db->table_exists('users')) {
                return null;
            }
            return $this->db->get_where('users', ['email' => $email])->row();
        } catch (Exception $e) {
            return null;
        }
    }
    
    public function create($data) {
        try {
            if (!$this->db->table_exists('users')) {
                return false;
            }
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        } catch (Exception $e) {
            log_message('error', 'Erreur création utilisateur: ' . $e->getMessage());
            return false;
        }
    }
    
    public function update($id, $data) {
        try {
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        } catch (Exception $e) {
            log_message('error', 'Erreur mise à jour utilisateur: ' . $e->getMessage());
            return false;
        }
    }
}
