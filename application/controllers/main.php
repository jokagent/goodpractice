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
        $this->load->model('news');
        $this->load->library('session');
        $this->load->library('ion_auth');
    }

    //goodpractice.loc/main/index/$name/$address/
	public function site($name='blog')
	{

		$email = $this->session->userdata('email');
        //проверка есть ли такие куки, если есть то записываем необходимую инфу в $data
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }

		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['news'] = $this->news->get_three_last_news();
		$data['trigger'] = ($name=='buy') ? 0 : 1;
		$data['logged'] = $this->check_login();
		$data['URL']= ($name=='blog') ? '/main/viewBlogEntry/' : '/main/viewProductEntry/';

		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center');
		$this->load->view('main/'.$name, $data);
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
        if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

	}
	public function check_login(){
		return $this->ion_auth->logged_in();

		/*$this->ion_auth->get_user_info();
		$info = json_decode($this->session->userdata('info'));
        if (!$info)
        {
         $this->session->sess_destroy();
            redirect('/auth/logout', 'refresh');
        }	*/	
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
		// if ($this->ion_auth->logged_in(){
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = 'fuck all of you';
		$data['post'] = $this->records->getBlogInfoBy($id);
		$data['logged'] = $this->check_login();
		$data['news'] = $this->news->get_three_last_news();
		$data['URL']= '/main/viewBlogEntry';
		$this->load->view('main/htmlheader.html', $data);
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
			$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = 'fuck all of you';
		$data['news'] = $this->news->get_three_last_news();
		$data['post'] = $this->records->getProductInfoBy($id);
		$data['logged'] = $this->check_login();
		$data['URL']= '/main/viewProductEntry';
		$this->load->view('main/htmlheader.html', $data);
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
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['trigger'] = 0;
		$data['logged'] = $this->check_login();
		$data['news'] = $this->news->get_three_last_news();
		$data['URL']= '/main/viewNewsEntry';
		$this->load->view('main/htmlheader.html', $data);
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
	public function couching(){
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['trigger'] = 0;
		$data['logged'] = $this->check_login();
		$data['news'] = $this->news->get_three_last_news();
		$data['URL']= '/main/viewNewsEntry';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		$this->load->view('main/couching.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}
	public function trening(){
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['trigger'] = 0;
		$data['logged'] = $this->check_login();
		$data['news'] = $this->news->get_three_last_news();
		$data['URL']= '/main/viewNewsEntry';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		$this->load->view('main/trening.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}
	public function about_us(){
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['trigger'] = 0;
		$data['logged'] = $this->check_login();
		$data['news'] = $this->news->get_three_last_news();
		$data['URL']= '/main/viewNewsEntry';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		$this->load->view('main/about_us.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}
	public function history(){
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['trigger'] = 0;
		$data['logged'] = $this->check_login();
		$data['news'] = $this->news->get_three_last_news();
		$data['URL']= '/main/viewNewsEntry';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		$this->load->view('main/history.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}public function clients(){
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['trigger'] = 0;
		$data['logged'] = $this->check_login();
		$data['news'] = $this->news->get_three_last_news();
		$data['URL']= '/main/viewNewsEntry';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		$this->load->view('main/clients.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}public function contacts(){
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['trigger'] = 0;
		$data['news'] = $this->news->get_three_last_news();
		$data['logged'] = $this->check_login();
		$data['URL']= '/main/viewNewsEntry';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		$this->load->view('main/contacts.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}

	public function viewNewsEntry($id) {
			$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		
		$data['trigger'] = 0;
		
		$data['news'] = $this->news->get_three_last_news();
		$data['report'] = $this->news->get_news_by($id);
		$data['logged'] = $this->check_login();
		$data['URL']= '/main/viewNewsEntry';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		// $this->load->view('main/buy');
		$this->load->view('main/viewNewsEntry.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html'); 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */