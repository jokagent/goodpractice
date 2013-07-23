<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_news()
	{
		$query = $this->db->get('news');
		return $query->result_array();
	}
	public function get_three_last_news()
	{
		$query = $this->db->query("select id, date, description from news order by id desc limit 3");
		return $query->result_array();
	}
	public function get_news_by($id)
	{
		$query = $this->db->where('id',$id)->get('news');
		return $query->row_array();
	}

}
