<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
	function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('records');
    }
    //goodpractice.loc/main/index/$name/$address/
	public function site($name='blog')
	{
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = ($name=='buy') ? 0 : 1;
		$data['URL']= '/main/viewBlogEntry/';
		$this->load->view('main/htmlheader.html');
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		$this->load->view('main/'.$name, $data);
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}
	public function index(){
		$this->site();
	}
	public function egor()
	{
		//$data = array('name'=>'Egor');
		$this->load->view('main/htmlheader.html');

		$this->load->view('main/footer'/*, $data*/);
		$this->load->view('main/htmlfooter.html');
	}
	public function course3()
	{
		//$data = array('name'=>'Egor');
		$this->load->view('main/htmlheader.html');
		$this->load->view('main/footer'/*, $data*/);
		$this->load->view('main/htmlfooter.html');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */