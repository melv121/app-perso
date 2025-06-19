<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
    public function create($data) {
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }
    
    public function get_by_id($id) {
        return $this->db->get_where('orders', ['id' => $id])->row();
    }
    
    public function update_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update('orders', ['status' => $status]);
    }
    
    public function get_by_user($user_id) {
        $this->db->select('orders.*, products.name as product_name, products.price');
        $this->db->from('orders');
        $this->db->join('products', 'orders.product_id = products.id');
        $this->db->where('orders.user_id', $user_id);
        $this->db->order_by('orders.created_at', 'DESC');
        return $this->db->get()->result();
    }
}
