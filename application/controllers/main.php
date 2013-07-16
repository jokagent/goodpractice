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
		$data['URL']= ($name=='blog') ? '/main/viewBlogEntry/' : '/main/viewProductEntry/';
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
		$this->load->view('main/popup.html');
	}
	public function index(){
		$this->site();
	}
	public function egor(){
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

	public function viewBlogEntry($id) {
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = 'fuck all of you';
		$data['post'] = $this->records->getBlogInfoBy($id);
		$data['URL']= '/main/viewBlogEntry';
		$this->load->view('main/htmlheader.html');
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		// $this->load->view('main/buy');
		$this->load->view('main/viewBlog.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}
		public function viewProductEntry($id) {
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = 'fuck all of you';
		$data['post'] = $this->records->getProductInfoBy($id);
		$data['URL']= '/main/viewProductEntry';
		$this->load->view('main/htmlheader.html');
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		// $this->load->view('main/buy');
		$this->load->view('main/viewProduct.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}
	public function consulting(){
		$data['trigger'] = 0;
		$this->load->view('main/htmlheader.html');
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		$this->load->view('main/consulting.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */