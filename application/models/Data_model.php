<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {
  
  /** ------------------------------------------------------
	 * Class Constructors. 
	 * -------------------------------------------------------
	 */
	public function __construct()
	{
		parent::__construct(); 
	}
	
	function getFactory($factory_no="",$factory_no_new="",$factory_name="",$visible="")
	{
		$this->db->select("id_factory,factory_name,factory_no,factory_no_new,factory_address,is_visible_management");
		$this->db->from("tb_factory");
		if(!empty($factory_no)){
			$this->db->like("factory_no",$factory_no);
		}
		if(!empty($factory_no_new)){
			$this->db->like("factory_no_new",$factory_no_new);
		}
		if(!empty($factory_name)){
			$this->db->like("factory_name",$factory_name);
		}
		if($visible == "enable")
		{
			$this->db->where("is_visible_management",TRUE);
		}
		$this->db->order_by("factory_name","ASC");
		
		$query = $this->db->get();

		return $query->result_array();
	}

	function getFactoryDetail($id_factory)
	{
		$this->db->select("f.id_factory,f.factory_name,f.factory_no,f.factory_no_new,f.factory_address,pv.province_name,g.geo_name,f.factory_postcode,f.is_visible_management");
		$this->db->from("tb_factory f");
		$this->db->join("tb_province pv","pv.id_province = f.factory_province","left");
		$this->db->join("tb_geo g","g.id_geo = pv.id_geo","left");
		
		$query = $this->db->get();

		return $query->result_array();
	}

	function getMeasurement($id_factory="")
	{
		$this->db->select("tb_measurement.id_factory,tb_measurement.id_measurement,tb_measurement.meas_code");
		$this->db->from("tb_measurement");
		if(!empty($id_factory)){
			$this->db->where("tb_measurement.id_factory",$id_factory);
		}
		$this->db->order_by("meas_code","ASC");
		
		$query = $this->db->get();

		return $query->result_array();
	}

	function getDataDetail($id_factory="")
	{
		$this->db->select("tb_measurement.meas_code,tb_monitor.meas_channel,tb_parameter.id_parameter,tb_parameter.parameter_shortname,tb_unit.id_unit,tb_unit.unit_shortname");
		$this->db->from("tb_measurement");
		$this->db->join("tb_monitor","tb_monitor.meas_code = tb_measurement.meas_code","inner");
		$this->db->join("tb_parameter","tb_parameter.id_parameter = tb_monitor.parameter_id","inner");
		$this->db->join("tb_unit","tb_unit.id_unit = tb_parameter.id_unit","inner");
		if(!empty($id_factory)){
			$this->db->where("tb_measurement.id_factory",$id_factory);
			$this->db->where("tb_monitor.status",'1');
		}
		$this->db->order_by("meas_code","ASC");
		
		$query = $this->db->get();

		return $query->result_array();
	}

	function getData($meas_code="",$start_date="",$end_date="")
	{
		$this->db->select("*");
		$this->db->from($meas_code);
		$this->db->where("date_time >=",$start_date);
		$this->db->where("date_time <=",$end_date);
		$this->db->order_by("date_time","asc");
		
		$query = $this->db->get();

		return $query->result_array();
	}

	function updateData($table,$data, $id_column, $id)
	{
		$this->db->where($id_column, $id);
		$this->db->update($table, $data);
	}
}
