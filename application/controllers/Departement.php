<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Departement extends CI_Controller
{   private $employees;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Departement_model');
        $this->load->model('Employee_model');
        $this->load->library('form_validation');
        $this->employees= new Employee_model();
        $this->employees= $this->employees->get_all();
          if (!isset($_SESSION['user']) or !isset($_SESSION['employee'])) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'departement/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'departement/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'departement/index.html';
            $config['first_url'] = base_url() . 'departement/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Departement_model->total_rows($q);
        $departement = $this->Departement_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'departement_data' => $departement,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
       $section= $this->load->view('departement/t_departement_list', $data,true);
       $this->load->view('home/home',['section'=>$section]);
    }

    public function read($id) 
    {
        $row = $this->Departement_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'idChef' => $row->idChef,
		'description' => $row->description,
	    );
           $section= $this->load->view('departement/t_departement_read', $data,true);
            $this->load->view('home/home',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('departement'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('departement/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'employees' => $this->employees,
	    'description' => set_value('description'),
	);
       $section= $this->load->view('departement/t_departement_form', $data,true);
        $this->load->view('home/home',['section'=>$section]);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'idChef' => $this->input->post('idChef',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Departement_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('departement'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Departement_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('departement/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'employees' => $this->employees,
		'description' => set_value('description', $row->description),
	    );
           $section= $this->load->view('departement/t_departement_form', $data,true);
            $this->load->view('home/home',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('departement'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'idChef' => $this->input->post('idChef',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Departement_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('departement'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Departement_model->get_by_id($id);

        if ($row) {
            $this->Departement_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('departement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('departement'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('idChef', 'idchef', 'trim');
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_departement.doc");

        $data = array(
            't_departement_data' => $this->Departement_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('departement/t_departement_doc',$data);
    }

}

/* End of file Departement.php */
/* Location: ./application/controllers/Departement.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-06 15:24:47 */
/* http://harviacode.com */