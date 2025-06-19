<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
        try {
            $this->load->database();
            $this->load->model('User_model');
        } catch (Exception $e) {
            show_error('Erreur de base de données : ' . $e->getMessage());
        }
    }

    public function register() {
        if ($this->input->post()) {
            // Validation des données
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            $type = $this->input->post('type');
            
            // Vérifications
            if ($password !== $confirm_password) {
                $data['error'] = 'Les mots de passe ne correspondent pas.';
                $this->load->view('auth/register', $data);
                return;
            }
            
            if (strlen($password) < 6) {
                $data['error'] = 'Le mot de passe doit contenir au moins 6 caractères.';
                $this->load->view('auth/register', $data);
                return;
            }
            
            if (!in_array($type, ['client', 'artisan'])) {
                $data['error'] = 'Type d\'utilisateur invalide.';
                $this->load->view('auth/register', $data);
                return;
            }
            
            try {
                // Vérifier si l'utilisateur existe déjà
                $existing_user = $this->User_model->get_by_username($username);
                if ($existing_user) {
                    $data['error'] = 'Ce nom d\'utilisateur est déjà utilisé.';
                    $this->load->view('auth/register', $data);
                    return;
                }
                
                $existing_email = $this->User_model->get_by_email($email);
                if ($existing_email) {
                    $data['error'] = 'Cette adresse email est déjà utilisée.';
                    $this->load->view('auth/register', $data);
                    return;
                }
                
                // Créer l'utilisateur
                $user_data = [
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'type' => $type
                ];
                
                $user_id = $this->User_model->create($user_data);
                
                if (!$user_id) {
                    $data['error'] = 'Erreur lors de la création du compte utilisateur.';
                    $this->load->view('auth/register', $data);
                    return;
                }
                
                // Si c'est un artisan, créer son profil
                if ($type === 'artisan') {
                    $this->load->model('Artisan_model');
                    $artisan_data = [
                        'user_id' => $user_id,
                        'bio' => '',
                        'website' => ''
                    ];
                    
                    $artisan_id = $this->Artisan_model->create($artisan_data);
                    
                    if (!$artisan_id) {
                        // Si la création du profil artisan échoue, on continue quand même
                        log_message('error', 'Échec création profil artisan pour user_id: ' . $user_id);
                    }
                }
                
                $this->session->set_flashdata('success', 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.');
                redirect('login');
                
            } catch (Exception $e) {
                log_message('error', 'Erreur inscription: ' . $e->getMessage());
                $data['error'] = 'Erreur lors de la création du compte. Veuillez réessayer.';
                $this->load->view('auth/register', $data);
            }
        }
        
        $this->load->view('auth/register');
    }

    public function login() {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            try {
                $user = $this->User_model->get_by_username($username);
                
                if ($user && password_verify($password, $user->password)) {
                    $this->session->set_userdata([
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'type' => $user->type,
                        'logged_in' => TRUE
                    ]);
                    
                    // Message de bienvenue personnalisé
                    $this->session->set_flashdata('success', 'Bienvenue ' . $user->username . ' ! Vous êtes connecté en tant que ' . $user->type . '.');
                    
                    if ($user->type == 'artisan') {
                        redirect('artisan/dashboard');
                    } else {
                        redirect('/'); // Rediriger les clients vers l'accueil
                    }
                } else {
                    $data['error'] = 'Nom d\'utilisateur ou mot de passe incorrect.';
                    $this->load->view('auth/login', $data);
                }
            } catch (Exception $e) {
                $data['error'] = 'Erreur lors de la connexion.';
                $this->load->view('auth/login', $data);
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }
}