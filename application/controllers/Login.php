<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    private $user;
    private $employee;
    private $departement;

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Employee_model');
        $this->load->model('Departement_model');
        $this->user = new User_model();
        $this->employee = new Employee_model();
        $this->departement = new Departement_model();
    }

    public function index() {
        $this->load->view('login/login', []);
    }

    public function authentication() {

        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $this->user = $this->user->get_by_username($username);
        if ($this->user != null) {
            if ($this->user->password == $password) {

                $this->employee = $this->employee->get_by_id($this->user->idEmployee);
                $this->departement = $this->departement->get_by_id($this->employee->idDepartement);
                
                
                $this->session->set_userdata('user', $this->user);
                $this->session->set_userdata('employee', $this->employee);
                $this->session->set_userdata('departement', $this->departement);
                if ($this->user->idType==2 or $this->user->idType==5) {
                    redirect(base_url('request'));
                }
                
                else{
                    redirect(base_url('home'));
                }
                
            } else {
                //message 
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }

    public function logout() {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('employee');
        $this->session->unset_userdata('departement');
        redirect(base_url());
    }

}
