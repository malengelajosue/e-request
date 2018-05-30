<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller
{
     private $departments;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('Departement_model');
        $this->load->library('form_validation');
        $this->departments=new Departement_model();
        $this->departments=$this->departments->get_all();
          if (!isset($_SESSION['user']) or !isset($_SESSION['employee'])) {
            redirect(base_url());
        }
                
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'employee/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'employee/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'employee/index.html';
            $config['first_url'] = base_url() . 'employee/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Employee_model->total_rows($q);
        $employee = $this->Employee_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'employee_data' => $employee,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
       $section= $this->load->view('employee/t_employee_list', $data,true);
       $this->load->view('home/home',['section'=>$section]);
    }

    public function read($id) 
    {
        $row = $this->Employee_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'matricule' => $row->matricule,
		'firstName' => $row->firstName,
		'lastName' => $row->lastName,
		'gender' => $row->gender,
		'email' => $row->email,
		'telephone' => $row->telephone,
		'idDepartement' => $row->idDepartement,
	    );
           $section= $this->load->view('employee/t_employee_read', $data,true);
           $this->load->view('home/home',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function create() 
    {
       
        $data = array(
            'button' => 'Create',
            'action' => site_url('employee/create_action'),
	    'id' => set_value('id'),
	    'matricule' => set_value('matricule'),
	    'firstName' => set_value('firstName'),
	    'lastName' => set_value('lastName'),
	    'gender' => set_value('gender'),
	    'email' => set_value('email'),
	    'telephone' => set_value('telephone'),
	    'departements' => $this->departments,
	);
       $section= $this->load->view('employee/t_employee_form', $data,true);
       $this->load->view('home/home',['section'=>$section]);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'matricule' => $this->input->post('matricule',TRUE),
		'firstName' => $this->input->post('firstName',TRUE),
		'lastName' => $this->input->post('lastName',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'email' => $this->input->post('email',TRUE),
		'telephone' => $this->input->post('telephone',TRUE),
		'idDepartement' => $this->input->post('idDepartement',TRUE),
	    );

            $this->Employee_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('employee'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employee/update_action'),
		'id' => set_value('id', $row->id),
		'matricule' => set_value('matricule', $row->matricule),
		'firstName' => set_value('firstName', $row->firstName),
		'lastName' => set_value('lastName', $row->lastName),
		'gender' => set_value('gender', $row->gender),
		'email' => set_value('email', $row->email),
		'telephone' => set_value('telephone', $row->telephone),
		'idDepartement' => set_value('idDepartement', $row->idDepartement),
                'departements' => $this->departments,
	    );
           $section= $this->load->view('employee/t_employee_form', $data,true);
           $this->load->view('home/home',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'matricule' => $this->input->post('matricule',TRUE),
		'firstName' => $this->input->post('firstName',TRUE),
		'lastName' => $this->input->post('lastName',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'email' => $this->input->post('email',TRUE),
		'telephone' => $this->input->post('telephone',TRUE),
		'idDepartement' => $this->input->post('idDepartement',TRUE),
	    );

            $this->Employee_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employee'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Employee_model->get_by_id($id);

        if ($row) {
            $this->Employee_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('employee'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('matricule', 'matricule', 'trim|required');
	$this->form_validation->set_rules('firstName', 'firstname', 'trim|required');
	$this->form_validation->set_rules('lastName', 'lastname', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('telephone', 'telephone', 'trim|required');
	$this->form_validation->set_rules('idDepartement', 'iddepartement', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_employee.doc");

        $data = array(
            't_employee_data' => $this->Employee_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('employee/t_employee_doc',$data);
    }

}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-06 15:25:00 */
/* http://harviacode.com */