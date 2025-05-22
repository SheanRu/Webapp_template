<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function page_404()
	{
		$this->load->view('custom_error/404.php');
	}
}
