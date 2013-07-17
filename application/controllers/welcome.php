<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
		public function index()
		{
		$data['random'] = md5(uniqid(mt_rand(), true));
		$this->load->view('auth/htmlheader.html');
		$this->load->view('auth/login', $data);
		$this->load->view('auth/htmlfooter.html');
		}
		public function login()
		{
		$data['random'] = md5(uniqid(mt_rand(), true));
		$this->load->view('auth/htmlheader.html');
		$this->load->view('auth/login', $data);
		$this->load->view('auth/htmlfooter.html');
		}
		public function restore(){
		$data['random'] = md5(uniqid(mt_rand(), true));
		$this->load->view('auth/htmlheader.html');
		$this->load->view('auth/lostpassword', $data);
		$this->load->view('auth/htmlfooter.html');	
		}
		public function register(){
		$data['random'] = md5(uniqid(mt_rand(), true));
		$this->load->view('auth/htmlheader.html');
		$this->load->view('auth/register', $data);
		$this->load->view('auth/htmlfooter.html');	
		}
		public function activate(){
		$data['random'] = md5(uniqid(mt_rand(), true));
		$this->load->view('auth/htmlheader.html');
		$this->load->view('auth/email/activation', $data);
		$this->load->view('auth/htmlfooter.html');	
		}
		public function ajax(){
		echo json_encode($this->input->post());
		}
		public function email(){
		echo json_encode($this->input->post());
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */