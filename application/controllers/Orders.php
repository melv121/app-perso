<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        try {
            $this->load->database();
            $this->load->model(['Order_model', 'Product_model']);
        } catch (Exception $e) {
            show_error('Erreur de base de données : ' . $e->getMessage());
        }
    }

    public function create() {
        if (!$this->session->userdata('logged_in')) {
            echo json_encode(['success' => false, 'message' => 'Vous devez être connecté']);
            return;
        }

        $product_id = $this->input->post('product_id');
        $payment_method = $this->input->post('payment_method');
        $customer_info = $this->input->post('customer_info');

        try {
            $product = $this->Product_model->get_by_id($product_id);
            if (!$product) {
                echo json_encode(['success' => false, 'message' => 'Produit introuvable']);
                return;
            }

            $order_data = [
                'user_id' => $this->session->userdata('user_id'),
                'product_id' => $product_id,
                'amount' => $product->price,
                'payment_method' => $payment_method,
                'status' => 'pending',
                'customer_info' => json_encode($customer_info)
            ];

            $order_id = $this->Order_model->create($order_data);
            
            // Ici, intégrer avec les vraies APIs de paiement
            // Pour la démo, on simule un paiement réussi
            $this->Order_model->update_status($order_id, 'completed');

            echo json_encode(['success' => true, 'order_id' => $order_id]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function success($order_id) {
        $order = $this->Order_model->get_by_id($order_id);
        $this->load->view('orders/success', compact('order'));
    }
}
