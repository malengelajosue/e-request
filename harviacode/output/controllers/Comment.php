<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Comment_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'comment/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'comment/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'comment/index.html';
            $config['first_url'] = base_url() . 'comment/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Comment_model->total_rows($q);
        $comment = $this->Comment_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'comment_data' => $comment,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('comment/t_comment_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Comment_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'comment' => $row->comment,
		'dateComment' => $row->dateComment,
		'idRequest' => $row->idRequest,
		'idEmployee' => $row->idEmployee,
	    );
            $this->load->view('comment/t_comment_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('comment'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('comment/create_action'),
	    'id' => set_value('id'),
	    'comment' => set_value('comment'),
	    'dateComment' => set_value('dateComment'),
	    'idRequest' => set_value('idRequest'),
	    'idEmployee' => set_value('idEmployee'),
	);
        $this->load->view('comment/t_comment_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'comment' => $this->input->post('comment',TRUE),
		'dateComment' => $this->input->post('dateComment',TRUE),
		'idRequest' => $this->input->post('idRequest',TRUE),
		'idEmployee' => $this->input->post('idEmployee',TRUE),
	    );

            $this->Comment_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('comment'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Comment_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('comment/update_action'),
		'id' => set_value('id', $row->id),
		'comment' => set_value('comment', $row->comment),
		'dateComment' => set_value('dateComment', $row->dateComment),
		'idRequest' => set_value('idRequest', $row->idRequest),
		'idEmployee' => set_value('idEmployee', $row->idEmployee),
	    );
            $this->load->view('comment/t_comment_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('comment'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'comment' => $this->input->post('comment',TRUE),
		'dateComment' => $this->input->post('dateComment',TRUE),
		'idRequest' => $this->input->post('idRequest',TRUE),
		'idEmployee' => $this->input->post('idEmployee',TRUE),
	    );

            $this->Comment_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('comment'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Comment_model->get_by_id($id);

        if ($row) {
            $this->Comment_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('comment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('comment'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('comment', 'comment', 'trim|required');
	$this->form_validation->set_rules('dateComment', 'datecomment', 'trim|required');
	$this->form_validation->set_rules('idRequest', 'idrequest', 'trim|required');
	$this->form_validation->set_rules('idEmployee', 'idemployee', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Comment.php */
/* Location: ./application/controllers/Comment.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-13 14:43:06 */
/* http://harviacode.com */