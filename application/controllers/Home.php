<?php

class Home extends CI_Controller {

    private $cashs;
    private $request;

    public function __construct() {
        parent::__construct();
        $this->load->model('Request_model');
        $this->load->model('Cash_model');
        $this->load->library('form_validation');
        $this->cashs = new Cash_model();
        $this->request = new Request_model();
        if (!isset($_SESSION['user']) or ! isset($_SESSION['employee'])) {
            redirect(base_url());
        }
        else if($_SESSION['user']->idType==2 or $_SESSION['user']->idType==5  ){
            redirect(site_url('request'));
        }
    }

    public function index() {
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

        $cashList = $this->cashs->get_all();
        $amountUsd = $cashList[1]->amount;
        $amountCdf = $cashList[0]->amount;
        $totalPending = $this->request->total_rows_pending();
        $totalDiscarded = $this->request->total_rows_discarded();
        $data_cash = array(
            'cash_data' => $cash,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'amountUsd' => $amountUsd,
            'amountCdf' => $amountCdf,
            'totalDiscarded' => $totalDiscarded,
            'totalPending' => $totalPending,
        );

        $section_data = $this->load->view('home/cash_list', $data_cash, true);
        $section = $this->load->view('home/dashboard', ['section' => $section_data], true);
        $this->load->view('home/home', ['section' => $section]);
    }

    public function pending() {
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
            $config['total_rows'] = $this->Request_model->total_rows_departement($_SESSION['employee']->idDepartement, $q);
            $request = $this->Request_model->get_limit_data_departement_pending($this->session->employee->idDepartement, $config['per_page'], $start, $q);
        } else {
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Request_model->total_rows_pending($q);
            $request = $this->Request_model->get_limit_data_pending($config['per_page'], $start, $q);
        }


        $this->load->library('pagination');
        $this->pagination->initialize($config);



        $cashList = $this->cashs->get_all();
        $amountUsd = $cashList[1]->amount;
        $amountCdf = $cashList[0]->amount;
        $totalPending = $this->request->total_rows_pending();
        $totalDiscarded = $this->request->total_rows_discarded();

        $data = array(
            'request_data' => $request,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'amountUsd' => $amountUsd,
            'amountCdf' => $amountCdf,
            'totalDiscarded' => $totalDiscarded,
            'totalPending' => $totalPending,
        );
        $section_data = $this->load->view('home/pending', $data, true);
        $section = $this->load->view('home/dashboard', ['section' => $section_data], true);
        $this->load->view('home/home', ['section' => $section]);
    }

    public function discarded() {
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
            $config['total_rows'] = $this->Request_model->total_rows_departement($_SESSION['employee']->idDepartement, $q);
            $request = $this->Request_model->get_limit_data_departement_discarded($this->session->employee->idDepartement, $config['per_page'], $start, $q);
        } else {
            $config['per_page'] = 10;
            $config['page_query_string'] = TRUE;
            $config['total_rows'] = $this->Request_model->total_rows_discarded($q);
            $request = $this->Request_model->get_limit_data_discarded($config['per_page'], $start, $q);
        }


        $this->load->library('pagination');
        $this->pagination->initialize($config);



        $cashList = $this->cashs->get_all();
        $amountUsd = $cashList[1]->amount;
        $amountCdf = $cashList[0]->amount;
        $totalPending = $this->request->total_rows_pending();
        $totalDiscarded = $this->request->total_rows_discarded();

        $data = array(
            'request_data' => $request,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'amountUsd' => $amountUsd,
            'amountCdf' => $amountCdf,
            'totalDiscarded' => $totalDiscarded,
            'totalPending' => $totalPending,
        );
        $section_data = $this->load->view('home/discarded', $data, true);
        $section = $this->load->view('home/dashboard', ['section' => $section_data], true);
        $this->load->view('home/home', ['section' => $section]);
    }

}
