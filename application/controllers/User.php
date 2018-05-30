<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{   private $userTypes;
     private $employees;
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('UserType_model');
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
        $this->userTypes=new UserType_model();
        $this->userTypes=$this->userTypes->get_all();
        
        $this->employees=new Employee_model();
        $this->employees=$this->employees->get_all();
          if (!isset($_SESSION['user']) or !isset($_SESSION['employee'])) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
       $section= $this->load->view('user/t_user_list', $data,true);
       $this->load->view('home/home',['section'=>$section]);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idEmployee' => $row->idEmployee,
		'username' => $row->username,
		'password' => $row->password,
		'dateCreation' => $row->dateCreation,
	    );
           $section= $this->load->view('user/t_user_read', $data,true);
           $this->load->view('home/home',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id' => set_value('id'),
	    'idEmployee' => set_value('idEmployee'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'dateCreation' => set_value('dateCreation'),
            'employees'=>$this->employees,
            'types'=>$this->userTypes,
	);
       $section= $this->load->view('user/t_user_form', $data,true);
       $this->load->view('home/home',['section'=>$section]);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idEmployee' => $this->input->post('idEmployee',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'idType' => $this->input->post('idType',TRUE),

	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id' => set_value('id', $row->id),
		'idEmployee' => set_value('idEmployee', $row->idEmployee),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		
                'employees'=>$this->employees,
                'types'=>$this->userTypes,
	    );
           $section= $this->load->view('user/t_user_form', $data,true);
           $this->load->view('home/home',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idEmployee' => $this->input->post('idEmployee',TRUE),
		'username' => $this->input->post('username',TRUE),
		'password' => $this->input->post('password',TRUE),
		'dateCreation' => $this->input->post('dateCreation',TRUE),
	    );

            $this->User_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idEmployee', 'idemployee', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[t_user.username]');
	$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
	$this->form_validation->set_rules('confPassword', 'Password condirmation', 'trim|required|matches[password]');
	

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_user.doc");

        $data = array(
            't_user_data' => $this->User_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user/t_user_doc',$data);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-06 15:26:56 */
/* http://harviacode.com */