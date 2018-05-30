<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request_model extends CI_Model
{

    public $table = 't_request';
    public $table_v = 'v_request';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table_v)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('idEmployee', $q);
	$this->db->or_like('subject', $q);
	$this->db->or_like('message', $q);
	$this->db->or_like('appvDepCh', $q);
	$this->db->or_like('appGenMan', $q);
	$this->db->or_like('dateAppvDepCh', $q);
	$this->db->or_like('dateAppGenMan', $q);
	$this->db->or_like('dateRequest', $q);
	$this->db->or_like('requestState', $q);
	$this->db->from($this->table_v);
        return $this->db->count_all_results();
    }
    // get total rows
    function total_rows_pending($q = NULL) {
       
	$this->db->not_like('appGenMan',"approuved");
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
    // get total rows
    function total_rows_discarded($q = NULL) {
       
	$this->db->or_like('closed',"discarded");
	
	$this->db->from($this->table_v);
        return $this->db->count_all_results();
    }
    // get total rows
    function total_rows_employee($idEmployee,$q = NULL) {
        $this->db->where('idEmployee',$idEmployee);
       
           
	$this->db->from($this->table_v);
        return $this->db->count_all_results();
    }
    // get total rows
    function total_rows_departement($idDepartement,$q = NULL) {
        $this->db->where('idDepartement',$idDepartement);
       
           
	$this->db->from($this->table_v);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
       
        $this->db->like('id', $q);
        
	
	$this->db->or_like('subject', $q);
	$this->db->or_like('message', $q);
	$this->db->or_like('amount', $q);
	$this->db->or_like('currency', $q);
	$this->db->or_like('appvDepCh', $q);
	$this->db->or_like('appGenMan', $q);
         $this->db->or_like('closed', $q);
	$this->db->or_like('dateAppvDepCh', $q);
	$this->db->or_like('dateAppGenMan', $q);
	$this->db->or_like('dateRequest', $q);
	$this->db->or_like('requestState', $q);
        
	$this->db->limit($limit, $start);
        
        return $this->db->get($this->table_v)->result();
    }
    // get data with limit and search
    function get_limit_data_employee($idEmployee,$limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('idEmployee',$idEmployee);
      $this->db->limit($limit, $start);
        
        return $this->db->get($this->table_v)->result();
    }
    function get_limit_data_employee_discarder($idEmployee,$limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('idEmployee',$idEmployee);
      $this->db->limit($limit, $start);
        
        return $this->db->get($this->table_v)->result();
    }
    function get_limit_data_employee_pending($idEmployee,$limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('idEmployee',$idEmployee);
      $this->db->limit($limit, $start);
        
        return $this->db->get($this->table_v)->result();
    }
    function get_limit_data_departement($idDepartement,$limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('idDepartement',$idDepartement);
      $this->db->limit($limit, $start);
        
        return $this->db->get($this->table_v)->result();
    }
    function get_limit_data_departement_pending($idDepartement,$limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('idDepartement',$idDepartement);
        $this->db->where('appvDepCh <>','approuved');
      $this->db->limit($limit, $start);
        
        return $this->db->get($this->table_v)->result();
    }
    function get_limit_data_departement_discarded($idDepartement,$limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->where('idDepartement',$idDepartement);
       
	$this->db->or_like('appGenMan', "discarded");
	$this->db->or_like('appvDepCh', "discarded");
   
      $this->db->limit($limit, $start);
        
        return $this->db->get($this->table_v)->result();
    }
    // get data with limit and search
    function get_limit_data_pending($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
	

	$this->db->like('appGenMan', "");
	$this->db->or_like('appvDepCh', "");
   
	
	$this->db->limit($limit, $start);
        return $this->db->get($this->table_v)->result();
    }
    function get_limit_data_discarded($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
      
	

	$this->db->or_like('appGenMan', "discarded");
	$this->db->or_like('appvDepCh', "discarded");
   
	
	$this->db->limit($limit, $start);
        return $this->db->get($this->table_v)->result();
    }
    // get data with limit and search
    function get_limit_data_approuved($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->like('appvDepCh', 1);
	$this->db->like('appGenMan', 1);
         $this->db->like('closed', 0);
	
	$this->db->limit($limit, $start);
        return $this->db->get($this->table_v)->result();
    }
    // get data with limit and search
    function get_limit_data_closed($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	
	$this->db->like('closed', 1);
	
	$this->db->limit($limit, $start);
        return $this->db->get($this->table_v)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Request_model.php */
/* Location: ./application/models/Request_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-06 15:25:55 */
/* http://harviacode.com */