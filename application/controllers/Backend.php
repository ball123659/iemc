<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	public function login()
	{
		$this->load->view('login');
	}
	public function dashboard()
	{
		if(isset($_SESSION['session_id']) && $_SESSION['project'] == 'poms_backend')
		{
			$this->load->view('script');
			$this->load->view('header');
			$this->load->view('dashboard');
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('login');
		}
	}
	public function mngUser()
	{
		if(isset($_SESSION['session_id']) && $_SESSION['project'] == 'poms_backend')
		{
			$this->load->view('header');

			if($_SESSION['role'] == 0)
			{
				$this->load->view('mngUser');
			}
			else
			{
				echo "<script type='text/javascript'>alert('คุณไม่ได้รับสิทธิ์ให้เข้าถึงหน้านี้');</script>";
				$this->load->view('dashboard');
			}

			$this->load->view('footer');
		}
		else
		{
			$this->load->view('login');
		}
	}
	
	public function report()
	{
		if(isset($_SESSION['session_id']) && $_SESSION['project'] == 'poms_backend')
		{
			$this->load->view('header');
			$this->load->view('report');
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function mngStation()
	{
		if(isset($_SESSION['session_id']) && $_SESSION['project'] == 'poms_backend')
		{
			$this->load->view('header');

			if($_SESSION['role'] == 0)
			{
				$this->load->view('mngStation');
			}
			else
			{
				echo "<script type='text/javascript'>alert('คุณไม่ได้รับสิทธิ์ให้เข้าถึงหน้านี้');</script>";
				$this->load->view('dashboard');
			}

			$this->load->view('footer');
		}
		else
		{
			$this->load->view('login');
		}
	}
}
