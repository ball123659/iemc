<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
  
  /** ------------------------------------------------------
	 * Class Constructors. 
	 * -------------------------------------------------------
	 */
	public function __construct()
	{
		parent::__construct(); 
	}

	/* function getDB($db){
		if($db == 'datastore'){
			$this->current_db  = $this->load->database('datastore', TRUE);
		} elseif($db == 'diw_factory') {
			$this->current_db  = $this->load->database('diw_factory', TRUE);
		}
	} */
	
	function getLogin($email,$password)
	{
		$query = $this->db->query("SELECT * FROM tb_user WHERE email ILIKE '".$email."' AND password ILIKE '".$password."'");
		return $query->result_array();
	}
	
	function getUser($id_user="")
	{
		$this->db->select("*");
		$this->db->from("tb_user");
		if(!empty($id_user)){
			$this->db->where("id_user",$id_user);
		}
		$this->db->order_by("id_user","DESC");
		
		$query = $this->db->get();

		return $query->result_array();
	}
	
	function insertData($table,$data)
	{
		$this->db->insert($table, $data);
		//return $idOfInsertedData = $this->db->insert_id();
	}

	function updateData($table,$data, $id)
	{
		$this->db->where('id_user', $id);
		$this->db->update($table, $data);
	}

	function deleteData($table,$id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete($table); 
	}
}
