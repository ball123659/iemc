<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxs extends CI_Controller {

	public function function_process()
	{
		date_default_timezone_set('Asia/Bangkok');
		$timestamp = date("Y-m-d H:i:s");
				
		$data_response = array();
		$this->load->model('User_model');
		$this->load->model('Data_model');
		//$this->load->model('Log_model');
		if($_POST['process'] == 'login')
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
			
            $this->load->database('diw_factory');
			$user = $this->User_model->getLogin($email,$password);
            $this->db->close();
            //echo $this->db->last_query();
			//print_r($user);
			if(count($user) == 1)
			{
				if($user[0]['status'] == 1)
				{
					$data_response = array(
						"process_status" => 1
					);
					
					/* session_destroy(); */
					//session_start();
					$_SESSION['session_id'] = session_id();
					$_SESSION['project'] = "poms_backend";
					$_SESSION['id_user'] = $user[0]['id_user'];
					$_SESSION['email'] = $user[0]['email'];
					$_SESSION['role'] = $user[0]['role'];
					$_SESSION['status'] = $user[0]['status'];
					$_SESSION['page'] = 'dashboard';

                    //print_r($_SESSION);
				}
				else //user ปิดการใช้งาน
				{
					$data_response = array(
						"process_status" => 2
					);
				}
			}
			else //ไม่พบผู้ใช้งาน
			{
				$data_response = array(
					"process_status" => 0
				);
			}
		}
		
		if($_POST['process'] == 'logout')
		{
			session_destroy();
			
			$data_response = array(
				"process_status" => 1
			);
		}

        if($_POST['process'] == 'getUser')
		{
            if($_POST['type'] == 'all')
            {
                $this->load->database('diw_factory');
                $arrUser = $this->User_model->getUser();
                $this->db->close();
            }
            if($_POST['type'] == 'byId')
            {
                $this->load->database('diw_factory');
                $arrUser = $this->User_model->getUser($_POST['id_user']);
                $this->db->close();
            }
			
			$data_response = array(
				"process_status" => 1,
				"arrUser" => $arrUser
			);
		}
        if($_POST['process'] == 'addUser')
		{
            $this->load->database('diw_factory');
            $data_ins = array(
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "name" => $_POST['name'],
                "status" => $_POST['status'],
                "role" => $_POST['role']
            );
            
            $this->User_model->insertData("tb_user",$data_ins);
            $insert_id = $this->db->insert_id();
			$this->db->close();

			$data_response = array(
				"process_status" => 1
			);
		}
        if($_POST['process'] == 'editUser')
		{
            $this->load->database('diw_factory');
            $data_update = array(
                "email" => $_POST['email'],
                "password" => $_POST['password'],
                "name" => $_POST['name'],
                "status" => $_POST['status'],
                "role" => $_POST['role']
            );
            
            $this->User_model->updateData('tb_user',$data_update, $_POST['id_user']);
			$this->db->close();

			$data_response = array(
				"process_status" => 1
			);
		}

        if($_POST['process'] == 'getFactory')
		{
            if($_POST['type'] == 'bySearch')
            {
                //echo "<pre>";print_r($arrFactory);echo "</pre>";
                $this->load->database('diw_factory');
                $arrFactory = $this->Data_model->getFactory($_POST['factory_no'],$_POST['factory_no_new'],$_POST['factory_name'],$visible='enable');
                //echo $this->db->last_query();
                //echo "<pre>";print_r($arrFactory);echo "</pre>";
                $this->db->close();
            }
            if($_POST['type'] == 'bySearchAllVisible')
            {
                $this->load->database('diw_factory');
                $arrFactory = $this->Data_model->getFactory($_POST['factory_no'],$_POST['factory_no_new'],$_POST['factory_name'],$visible='all');
                $this->db->close();
            }
			
			$data_response = array(
				"process_status" => 1,
				"arrFactory" => $arrFactory
			);
		}

        if($_POST['process'] == 'getDataReport')
		{
            if($_POST['type'] == 'byIdFactory')
            {
                $this->load->database('diw_factory');
                $arrMeasurement = $this->Data_model->getMeasurement($_POST['id_factory']);
				$this->db->close();
				
				//$this->load->database('datastore');
				$this->load->database('diw_factory');
				$arrDataDetail = $this->Data_model->getDataDetail($_POST['id_factory']);
				$this->db->close();
				//print_r($arrDataDetail);
				$this->load->database('datastore');
                $sql = "SELECT date_time";
                foreach($arrDataDetail as $row_m)
                {
                    $arrData[$row_m['meas_code']] = $this->Data_model->getData(strtolower($row_m['meas_code']),$_POST['start_date'],$_POST['end_date']);
                    //echo $this->db->last_query();
                }
                //echo "<pre>";print_r($arrData);echo "</pre>";
                $this->db->close();
            }
			
			$data_response = array(
				"process_status" => 1,
				"arrMeasurement" => $arrMeasurement,
				"arrDataDetail" => $arrDataDetail,
				"arrData" => $arrData
			);
		}

		if($_POST['process'] == 'getFactoryDetail')
		{
			$this->load->database('diw_factory');
            $arrFactoryDetail = $this->Data_model->getFactoryDetail($_POST['id_factory']);
			
			$data_response = array(
				"process_status" => 1,
				"arrFactoryDetail" => $arrFactoryDetail
			);
		}

		if($_POST['process'] == 'updateStatus')
		{
			$this->load->database('diw_factory');
			
			if($_POST['f_status'] == 'TRUE'){
				$f_status = TRUE;
			} elseif($_POST['f_status'] == 'FALSE') {
				$f_status = FALSE;
			}

            $data_update = array(
                "is_visible_management" => $f_status
            );

			$this->Data_model->updateData('tb_factory',$data_update, 'id_factory' ,$_POST['id_factory']);
			$this->db->close();

			$data_response = array(
				"process_status" => 1
			);
		}

        echo json_encode($data_response);
    }
}
		
?>