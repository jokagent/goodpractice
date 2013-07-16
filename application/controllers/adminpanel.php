<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

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
	public function site($name='blog', $message = '')
	{
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = $message;
		$data['URL']= '/adminpanel/editBlogEntry/';
		$this->load->view('main/htmlheader.html');
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		
		$this->load->view('main/center', $data);
		
		$this->load->view('main/adminPanel.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}
	public function index(){
		$this->site();
	}
	public function allPosts(){
		$this->site();
	}
	public function addBlogEntry(){
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$text = $this->input->post('text');
		$message = $this->records->insBlogEntry(array('title'=>$title,'description'=>$description,'text'=>$text));
		$this->site('', $message);
	}
	public function addProductEntry(){
		$title = $this->input->post('title');
		$text = $this->input->post('text');
		$message = $this->records->insBuyEntry(array('title'=>$title,'text'=>$text));
		$this->site('', $message);
	}

	public function posts(){
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = $message;
		$data['URL']= '/adminpanel/editBlogEntry/';
		$this->load->view('main/htmlheader.html');
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		
		$this->load->view('main/center', $data);
		$this->load->view('main/blog');
		$this->load->view('main/posts.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');			
	}

	public function products(){
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = $message;
		$data['URL']= '/adminpanel/editBlogEntry/';
		$this->load->view('main/htmlheader.html');
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		
		$this->load->view('main/center', $data);
		$this->load->view('main/buy');
		$this->load->view('main/products.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */