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
        $this->load->model('news');
        $this->load->library('session');
        $this->load->library('ion_auth');
    }
    //goodpractice.loc/main/index/$name/$address/
	public function site($name='blog', $message = '')
	{
		$email = $this->session->userdata('email');
        $data['nameo'] = ($email) ?  $this->session->userdata('name') : '';
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = $message;
		$data['URL']= '/adminpanel/editBlogEntry/';
		$data['news'] = $this->news->get_three_last_news();
		$data['logged'] = $this->ion_auth->logged_in();
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		
		$this->load->view('main/center');
		
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
	public function changeBlogEntry(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$text = $this->input->post('text');
		$message = $this->records->editBlogEntry($id, array('title'=>$title,'description'=>$description,'text'=>$text));
		$this->site('', $message);
	}
	public function addProductEntry(){
		$title = $this->input->post('title');
		$text = $this->input->post('text');
		$message = $this->records->insBuyEntry(array('title'=>$title,'text'=>$text));
		$this->site('', $message);
	}
	public function changeShopEntry(){
		$title = $this->input->post('title');
		$text = $this->input->post('text');$id = $this->input->post('id');
		$message = $this->records->editShopEntry($id, array('title'=>$title,'text'=>$text));
		$this->site('', $message);
	}

	public function posts(){
		$email = $this->session->userdata('email');
        $data['nameo'] = ($email) ?  $this->session->userdata('name') : '';
        $data['logged'] = $this->ion_auth->logged_in();
        $data['news'] = $this->news->get_three_last_news();
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['URL']= '/adminpanel/editBlogEntry/';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		
		$this->load->view('main/center');
		$this->load->view('main/blog');
		$this->load->view('main/posts.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');			
	}

	public function products(){
		$email = $this->session->userdata('email');
        $data['nameo'] = ($email) ?  $this->session->userdata('name') : '';
        $data['logged'] = $this->ion_auth->logged_in();
        $data['news'] = $this->news->get_three_last_news();
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		
		$data['URL']= '/adminpanel/editProductEntry/';
		$this->load->view('main/htmlheader.html', $data);
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

	public function editBlogEntry($id){
		$email = $this->session->userdata('email');
        $data['nameo'] = ($email) ?  $this->session->userdata('name') : '';
        $data['logged'] = $this->ion_auth->logged_in();
        $data['news'] = $this->news->get_three_last_news();
		$data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = 'fuck all of you';
		$data['post'] = $this->records->getBlogInfoBy($id);
		$data['URL']= '/adminpanel/changeBlogEntry';
		
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		// $this->load->view('main/buy');
		$this->load->view('main/editPosts.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}

	public function editProductEntry($id) {
		$email = $this->session->userdata('email');
        $data['nameo'] = ($email) ?  $this->session->userdata('name') : '';
        $data['logged'] = $this->ion_auth->logged_in();
        $data['news'] = $this->news->get_three_last_news();
		 $data['records'] = $this->records->all_blogs();
		$data['buy'] = $this->records->all_products();
		$data['trigger'] = 0;
		$data['message'] = 'fuck all of you';
		$data['post'] = $this->records->getProductInfoBy($id);
		$data['URL']= '/adminpanel/changeShopEntry';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center', $data);
		// $this->load->view('main/buy');
		$this->load->view('main/editProducts.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html');
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */