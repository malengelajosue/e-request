<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mouvement extends CI_Controller
{   private $cash;
    function __construct()
    {
        
        parent::__construct();
        $this->load->model('Mouvement_model');
        $this->load->model('Cash_model');
        $this->load->library('form_validation');
        $cash=new Cash_model();
        $this->cash=$cash->get_all();
          if (!isset($_SESSION['user']) or !isset($_SESSION['employee'])) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mouvement/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mouvement/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mouvement/index.html';
            $config['first_url'] = base_url() . 'mouvement/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mouvement_model->total_rows($q);
        $mouvement = $this->Mouvement_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mouvement_data' => $mouvement,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
       $section= $this->load->view('mouvement/t_mouvement_list', $data,true);
        $this->load->view('home/home',['section'=>$section]);
    }

    public function read($id) 
    {
        $row = $this->Mouvement_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idCash' => $row->idCash,
		'amount' => $row->amount,
		'dateModif' => $row->dateModif,
		'actionType' => $row->actionType,
	    );
           $section= $this->load->view('mouvement/t_mouvement_read', $data,true);
            $this->load->view('home/home',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mouvement'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mouvement/create_action'),
	    'id' => set_value('id'),
	    'cashs' => $this->cash,
	    'amount' => set_value('amount'),
	    'dateModif' => set_value('dateModif'),
	    'actionType' => set_value('actionType'),
	);
       $section= $this->load->view('mouvement/t_mouvement_form', $data,true);
       $this->load->view('home/home',['section'=>$section]);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idCash' => $this->input->post('idCash',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		
		'actionType' => 'Provisioning',
	    );

            $this->Mouvement_model->insert($data);
            $this->Cash_model->update($this->input->post('idCash',TRUE),['amount'=>$this->input->post('amount',TRUE)]);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mouvement'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mouvement_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mouvement/update_action'),
		'id' => set_value('id', $row->id),
		'idCash' => set_value('idCash', $row->idCash),
		'amount' => set_value('amount', $row->amount),
		'dateModif' => set_value('dateModif', $row->dateModif),
		'actionType' => set_value('actionType', $row->actionType),
	    );
           $section= $this->load->view('mouvement/t_mouvement_form', $data,true);
            $this->load->view('home/home',['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mouvement'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idCash' => $this->input->post('idCash',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'dateModif' => $this->input->post('dateModif',TRUE),
		'actionType' => $this->input->post('actionType',TRUE),
	    );

            $this->Mouvement_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mouvement'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mouvement_model->get_by_id($id);

        if ($row) {
            $this->Mouvement_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mouvement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mouvement'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idCash', 'idcash', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required|numeric');
	

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_mouvement.doc");

        $data = array(
            't_mouvement_data' => $this->Mouvement_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mouvement/t_mouvement_doc',$data);
    }

}

/* End of file Mouvement.php */
/* Location: ./application/controllers/Mouvement.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-06 15:25:26 */
/* http://harviacode.com */