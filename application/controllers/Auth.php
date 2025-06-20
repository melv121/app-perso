<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function login() {
        $data = array();
        
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            try {
                $this->load->database();
                $this->load->model('User_model');
                
                $user = $this->User_model->get_by_username($username);
                
                if ($user && password_verify($password, $user->password)) {
                    $this->session->set_userdata(array(
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'type' => $user->type,
                        'logged_in' => TRUE
                    ));
                    
                    if ($user->type == 'artisan') {
                        redirect('artisan/dashboard');
                    } else {
                        redirect('/');
                    }
                } else {
                    $data['error'] = 'Nom d\'utilisateur ou mot de passe incorrect.';
                }
            } catch (Exception $e) {
                $data['error'] = 'Erreur de connexion à la base de données.';
            }
        }
        
        $this->load->view('auth/login', $data);
    }
    
    public function register() {
        $data = array();
        
        if ($this->input->post()) {
            try {
                $this->load->database();
                $this->load->model('User_model');
                
                $user_data = array(
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'type' => $this->input->post('type')
                );
                
                $this->User_model->insert($user_data);
                $this->session->set_flashdata('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
                redirect('login');
            } catch (Exception $e) {
                $data['error'] = 'Erreur lors de l\'inscription.';
            }
        }
        
        $this->load->view('auth/register', $data);
    }
    
    public function logout() {
        $this->session->unset_userdata(array('user_id', 'username', 'type', 'logged_in'));
        $this->session->sess_destroy();
        redirect('/');
    }
}