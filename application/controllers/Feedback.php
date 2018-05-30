<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feedback extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Feedback_model');
        $this->load->library('form_validation');
        if (!isset($_SESSION['user']) or !isset($_SESSION['employee'])) {
            redirect(base_url());
        }
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'feedback/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'feedback/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'feedback/index.html';
            $config['first_url'] = base_url() . 'feedback/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Feedback_model->total_rows($q);
        $feedback = $this->Feedback_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'feedback_data' => $feedback,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $section = $this->load->view('feedback/t_feedback_list', $data, true);
        $this->load->view('home/home', ['section'=>$section]);
    }

    public function read($id) {
        $row = $this->Feedback_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'subject' => $row->subject,
                'message' => $row->message,
                'idRequest' => $row->idRequest,
                'idEmployee' => $row->idEmployee,
                'document' => $row->document,
            );
            $section = $this->load->view('feedback/t_feedback_read', $data, true);
            $this->load->view('home/home', ['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('feedback'));
        }
    }

    public function create() {
        if (!isset($_SESSION['requestId'])) {
            redirect(site_url('request'));
        }
        $data = array(
            'button' => 'Create',
            'action' => site_url('feedback/create_action'),
            'id' => set_value('id'),
            'subject' => set_value('subject'),
            'message' => set_value('message'),
            'idRequest' => set_value('idRequest'),
            'idEmployee' => set_value('idEmployee'),
            'document' => set_value('document'),
        );
        $section = $this->load->view('feedback/t_feedback_form', $data, true);
        $this->load->view('home/home', ['section'=>$section]);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'subject' => $this->input->post('subject', TRUE),
                'message' => $this->input->post('message', TRUE),
                'idRequest' => $this->session->requestId,
                'idEmployee' => $this->session->employee->id,
                'document' => $this->input->post('document', TRUE),
            );

            $this->Feedback_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            $this->session->unset_userdata('requestId');
            redirect(site_url('feedback'));
        }
    }

    public function update($id) {
        $row = $this->Feedback_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('feedback/update_action'),
                'id' => set_value('id', $row->id),
                'subject' => set_value('subject', $row->subject),
                'message' => set_value('message', $row->message),
                'idRequest' => set_value('idRequest', $row->idRequest),
                'idEmployee' => set_value('idEmployee', $row->idEmployee),
                'document' => set_value('document', $row->document),
            );
            $section = $this->load->view('feedback/t_feedback_form', $data, true);
            $this->load->view('home/home', ['section'=>$section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('feedback'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'subject' => $this->input->post('subject', TRUE),
                'message' => $this->input->post('message', TRUE),
                'idRequest' => $this->input->post('idRequest', TRUE),
                'idEmployee' => $this->input->post('idEmployee', TRUE),
                'document' => $this->input->post('document', TRUE),
            );

            $this->Feedback_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('feedback'));
        }
    }

    public function delete($id) {
        $row = $this->Feedback_model->get_by_id($id);

        if ($row) {
            $this->Feedback_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('feedback'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('feedback'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('message', 'message', 'trim|required');
        
        $this->form_validation->set_rules('document', 'document', 'trim');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_feedback.doc");

        $data = array(
            't_feedback_data' => $this->Feedback_model->get_all(),
            'start' => 0
        );

        $this->load->view('feedback/t_feedback_doc', $data);
    }

}

/* End of file Feedback.php */
/* Location: ./application/controllers/Feedback.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-06 15:25:14 */
/* http://harviacode.com */