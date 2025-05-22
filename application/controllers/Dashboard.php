<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('dashboard/templates/tp_header.php');
		$this->load->view('dashboard/templates/tp_navbar.php');
		$this->load->view('dashboard/templates/tp_sidebar.php');
		$this->load->view('dashboard/dashboard.php');
		$this->load->view('dashboard/templates/tp_footer.php');
	}
}
