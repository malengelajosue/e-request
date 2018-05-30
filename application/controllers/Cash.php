<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cash extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cash_model');
        $this->load->library('form_validation');
          if (!isset($_SESSION['user']) or !isset($_SESSION['employee'])) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'cash/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'cash/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'cash/index.html';
            $config['first_url'] = base_url() . 'cash/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Cash_model->total_rows($q);
        $cash = $this->Cash_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'cash_data' => $cash,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $section=$this->load->view('cash/t_cash_list', $data,true);
        $this->load->view('home/home', ['section'=>$section]);
    }

    public function read($id) 
    {
        $row = $this->Cash_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'currency' => $row->currency,
		'amount' => $row->amount,
		'description' => $row->description,
	    );
            $section=$this->load->view('cash/t_cash_read', $data,true);
            $this->load->view('home/home', ['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cash'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('cash/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'currency' => set_value('currency'),
	    'amount' => set_value('amount'),
	    'description' => set_value('description'),
	);
        $section=$this->load->view('cash/t_cash_form', $data,true);
        $this->load->view('home/home', ['section'=>$section]);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'currency' => $this->input->post('currency',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Cash_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('cash'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cash_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('cash/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'currency' => set_value('currency', $row->currency),
		'amount' => set_value('amount', $row->amount),
		'description' => set_value('description', $row->description),
	    );
            $section=$this->load->view('cash/t_cash_form', $data,true);
            $this->load->view('home/home', ['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cash'));
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
		'currency' => $this->input->post('currency',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Cash_model->update($this->input->post('id', TRUE), $data,true);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cash'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cash_model->get_by_id($id);

        if ($row) {
            $this->Cash_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cash'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cash'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('currency', 'currency', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required|numeric');
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_cash.doc");

        $data = array(
            't_cash_data' => $this->Cash_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('cash/t_cash_doc',$data);
    }

}

/* End of file Cash.php */
/* Location: ./application/controllers/Cash.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-06 15:23:30 */
/* http://harviacode.com */