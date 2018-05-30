<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request extends CI_Controller {
    private $cash;
    private $mouvement;
    function __construct() {
        parent::__construct();
        $this->load->model('Request_model');
        $this->load->model('Cash_model');
        $this->load->model('Mouvement_model');
        $this->cash=new Cash_model();
        $this->mouvement=new Mouvement_model();
        $this->load->library('form_validation');
          if (!isset($_SESSION['user']) or !isset($_SESSION['employee'])) {
            redirect(base_url());
        }
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'request/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'request/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'request/index.html';
            $config['first_url'] = base_url() . 'request/index.html';
        }


        if ($this->session->user->idType == 2) {
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Request_model->total_rows_departement($this->session->employee->idDepartement, $q);
            $request = $this->Request_model->get_limit_data_departement($this->session->employee->idDepartement, $config['per_page'], $start, $q);
        } else if ($this->session->user->idType == 5) {
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Request_model->total_rows($q);
            $request = $this->Request_model->get_limit_data_employee($this->session->employee->id, $config['per_page'], $start, $q);
        } else {
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Request_model->total_rows($q);
            $request = $this->Request_model->get_limit_data($config['per_page'], $start, $q);
        }


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'request_data' => $request,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $section = $this->load->view('request/t_request_list', $data, true);
        $this->load->view('home/home', ['section' => $section]);
    }

    public function read($id) {
        $row = $this->Request_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'idEmployee' => $row->idEmployee,
                'employee' => $row->employee,
                'departement' => $row->departement,
                'subject' => $row->subject,
                'amount' => $row->amount,
                'currency' => $row->currency,
                'message' => $row->message,
                'appvDepCh' => $row->appvDepCh,
                'appGenMan' => $row->appGenMan,
                'dateAppvDepCh' => $row->dateAppvDepCh,
                'dateAppGenMan' => $row->dateAppGenMan,
                'dateRequest' => $row->dateRequest,
                'requestState' => $row->requestState,
            );
            $section = $this->load->view('request/t_request_read', $data, true);
            $this->load->view('home/home', ['section' => $section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('request'));
        }
    }
    public  function serve($id){
        $request = $this->Request_model->get_by_id($id);
        $cash=$this->cash->get_by_id(1);
        $amount=(double)$cash->amount;
        
        if ($amount>=$request->amount) {
            $solde=$cash->amount-$request->amount;
            
           $this->cash->update(1, array(
               'amount'=>$solde
           ));
            
           $this->Request_model->update($id,array(
               'requestState'=>'served'
           ));
           $this->mouvement->insert(array(
               'idCash'=>1,
               'amount'=>$request->amount,
               'actionType'=>'request',
               'idRequest'=>$id
           ));
        }
        redirect(site_url('request'));
    }
    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('request/create_action'),
            'id' => set_value('id'),
            'idEmployee' => set_value('idEmployee'),
            'subject' => set_value('subject'),
            'currency' => set_value('currency'),
            'amount' => set_value('amount'),
            'message' => set_value('message'),
        );
        $section = $this->load->view('request/t_request_form', $data, true);
        $this->load->view('home/home', ['section' => $section]);
    }

    public function comment($id) {

        $this->session->set_userdata('requestId', $id);
        redirect(site_url('comment/create'));
    }

    public function feedback($id) {
     
        $this->session->set_userdata('requestId', $id);

        redirect(site_url('feedback/create'));
    }

    public function approuve($id) {
        $user = $this->session->user;
        if ($user->idType == 2) {
            $data = array(
                'appvDepCh' => 'approuved',
            );

            $this->Request_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('request'));
        } else if ($user->idType == 3) {
            $data = array(
                'appGenMan' => 'approuved',
            );

            $this->Request_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('request'));
        }
    }

    public function discard($id) {
        $user = $this->session->user;
        if ($user->idType == 2) {
            $data = array(
                'closed' => 'discarded',
            );

            $this->Request_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('request'));
        } else if ($user->idType == 3) {
            $data = array(
                'appGenMan' => 'discarded',
            );

            $this->Request_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('request'));
        }
    }

    public function close($id) {
        $user = $this->session->user;
        if ($user->idType == 4) {
            $data = array(
                'closed' => 'closed',
            );

            $this->Request_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('request'));
        }
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'idEmployee' => $this->session->employee->id,
                'idDepartement' => $this->session->employee->idDepartement,
                'subject' => $this->input->post('subject', TRUE),
                'message' => $this->input->post('message', TRUE),
                'currency' => $this->input->post('currency', TRUE),
                'amount' => $this->input->post('amount', TRUE),
            );

            $this->Request_model->insert($data);
            $this->session->set_flashdata('message', 'Your request a been successfully submited');
            redirect(site_url('request/create'));
        }
    }

    public function update($id) {
        $row = $this->Request_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('request/update_action'),
                'id' => set_value('id', $row->id),
                'idEmployee' => set_value('idEmployee', $row->idEmployee),
                'subject' => set_value('subject', $row->subject),
                'message' => set_value('message', $row->message),
                'amount' => set_value('amount', $row->amount),
            );
            $section = $this->load->view('request/t_request_form', $data, true);
            $this->load->view('home/home', ['section' => $section]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('request'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'idEmployee' => $this->input->post('idEmployee', TRUE),
                'subject' => $this->input->post('subject', TRUE),
                'message' => $this->input->post('message', TRUE),
                'currency' => $this->input->post('currency', TRUE),
                'amount' => $this->input->post('amount', TRUE),
            );

            $this->Request_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('request'));
        }
    }

    public function delete($id) {
        $row = $this->Request_model->get_by_id($id);

        if ($row) {
            $this->Request_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('request'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('request'));
        }
    }

    public function _rules() {

        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('message', 'message', 'trim|required');

        $this->form_validation->set_rules('amount', 'The amount', 'trim|required');


        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_request.doc");

        $data = array(
            't_request_data' => $this->Request_model->get_all(),
            'start' => 0
        );

        $this->load->view('request/t_request_doc', $data);
    }

}

/* End of file Request.php */
/* Location: ./application/controllers/Request.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-06 15:25:55 */
/* http://harviacode.com */