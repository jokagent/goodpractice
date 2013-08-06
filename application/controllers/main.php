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
		$data['username']=$this->rus2translit($this->session->userdata('name'));
		$data['useremail']=$this->session->userdata('email');
		$data['news'] = $this->news->get_three_last_news();
		$data['trigger'] = ($name=='buy') ? 0 : 1;
		$data['logged'] = $this->check_login();
		$data['URL']= ($name=='blog') ? '/main/viewBlogEntry/' : '/main/viewProductEntry/';
		$data['URL_news'] = '/main/viewNewsEntry/';

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
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

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
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

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
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

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
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

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
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

	}
	public function clients(){
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['trigger'] = 0;
		$data['logged'] = $this->check_login();
		$data['news'] = $this->news->get_three_last_news();
		$data['URL']= '/main/viewNewsEntry';
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

	}
	public function contacts(){
		$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		$data['trigger'] = 0;
		$data['news'] = $this->news->get_three_last_news();
		$data['logged'] = $this->check_login();
		$data['URL']= '/main/viewNewsEntry';
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

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
		$data['URL_news'] = '/main/viewNewsEntry/';
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
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

	}

	public function registration() {
			$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		
		$data['trigger'] = 0;
		
		$data['news'] = $this->news->get_three_last_news();
		$data['logged'] = $this->check_login();
		$data['URL']= '/main/viewNewsEntry';
		$data['URL_news'] = '/main/viewNewsEntry/';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center');
		// $this->load->view('main/buy');
		$this->load->view('main/registration.html');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html'); 
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

	}

	public function fail() {
			$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		
		$data['trigger'] = 0;
		
		$data['news'] = $this->news->get_three_last_news();
		$data['logged'] = $this->check_login();
		$data['URL']= '/main/viewNewsEntry';
		$data['URL_news'] = '/main/viewNewsEntry/';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center');
		// $this->load->view('main/buy');
		$this->load->view('main/fail');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html'); 
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

	}
	public function success() {
			$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		
		$data['trigger'] = 0;
		
		$data['news'] = $this->news->get_three_last_news();
		$data['logged'] = $this->check_login();
		$data['URL']= '/main/viewNewsEntry';
		$data['URL_news'] = '/main/viewNewsEntry/';
		$this->load->view('main/htmlheader.html', $data);
		$this->load->view('main/header-top');
		$this->load->view('main/header-bottom');
		$this->load->view('main/sidebar-left');
		$this->load->view('main/center');
		// $this->load->view('main/buy');
		$this->load->view('main/success');
		$this->load->view('main/sidebar-right');
		$this->load->view('main/footer-menu');
		$this->load->view('main/footer');
		$this->load->view('main/htmlfooter.html'); 
		 if (!$this->ion_auth->logged_in())
            {
                $this->load->view('main/popup.html');
            }

	}

	public function getRespondFromIM() {
		$secretKey = "Montblanc789";
		
			$email = $this->session->userdata('email');
        if ($email)
        {

            $data['nameo'] = $this->session->userdata('name');
        }
		
		$data['trigger'] = 0;

		$in_eshopId = $this->input->post("eshopId");
		$in_orderId = $this->input->post("orderId");
		$in_serviceName = $this->input->post("serviceName");
		$in_eshopAccount = $this->input->post("eshopAccount");
		$in_recipientAmount = $this->input->post("recipientAmount");
		$in_recipientCurrency = $this->input->post("recipientCurrency");
		$in_paymentStatus = $this->input->post("paymentStatus");
		$in_userName = $this->input->post("userName");
		$in_userEmail = $this->input->post("userEmail");
		$in_paymentData = $this->input->post("paymentData");
		$in_secretKey = $this->input->post("secretKey");		// нужен для проверки по HTTPS хотя в любом случае проверка )о
		// 											//контрольной подписи предпочтительна, по этому просто игнорируем его.
		$in_hash = strtoupper($this->input->post("hash"));

		$for_hash = $in_eshopId."::".
			$in_orderId."::".
			$in_serviceName."::".
			$in_eshopAccount."::".
			$in_recipientAmount."::".
			$in_recipientCurrency."::".
			$in_paymentStatus."::".
			$in_userName."::".
			$in_userEmail."::".
			$in_paymentData."::".
			$secretKey; 
			$my_hash = strtoupper(md5($for_hash));

		if ($my_hash == $in_hash)
			{
				$checksum = true;
			}
		else
			{
				$checksum = false;
			}



		$f=@fopen("orders.txt","a+") or
          die("error");
		fputs($f,	date("d:m:Y h:i:s").
					" orderId: $in_orderId;".
					" ServiceName: $in_serviceName".
					" eshopAccount: $in_eshopAccount".
					" Amount: $in_recipientAmount;".
					" Currency: $in_recipientCurrency;".
					" Date: $in_paymentData;".
					" Status: $in_paymentStatus;".
					" Name: $in_userName;".
					" Email: $in_userEmail;".
					" PaymentData: $in_paymentData".
					" secretKey: $in_secretKey".
					// " For hash : $for_hash".
					" Checksum: ".($checksum==true?1:0)."\n"
			);
		// fputs($f, "Присланный клютч: $in_secretKey\nМой kещ :: $my_hash\nNe moy :: $in_hash");
		// fclose($f);
		if (!$checksum)
			{
			  echo "bad sign\n";
			  exit();
			}	
				// Символический вывод подтверждающий успешность получения информации и совпадения подписей
		echo "OK\n";
	}
	private function rus2translit($text){
	    // Русский алфавит
	    $rus_alphabet = array(
	        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й',
	        'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф',
	        'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
	        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й',
	        'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф',
	        'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
	    );
	    
	    // Английская транслитерация
	    $rus_alphabet_translit = array(
	        'A', 'B', 'V', 'G', 'D', 'E', 'IO', 'ZH', 'Z', 'I', 'I',
	        'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F',
	        'H', 'C', 'CH', 'SH', 'SH', '`', 'Y', '`', 'E', 'IU', 'IA',
	        'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'i',
	        'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f',
	        'h', 'c', 'ch', 'sh', 'sh', '`', 'y', '`', 'e', 'iu', 'ia'
	    );
	    
	    return str_replace($rus_alphabet, $rus_alphabet_translit, $text);
	}
	function writeLog(){
		echo $this->records->writeLog($this->input->post('json_string'));
	}	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */