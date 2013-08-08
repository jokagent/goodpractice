<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Records extends CI_Model {


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }
    function all_blogs(){
    	return $this->db->select('*')->get('blog')->result_array();
    }

    function all_products(){
    	return $this->db->select('*')->get('buy')->result_array();
    }
    function insBlogEntry($data){
        $this->db->set($data)->insert('blog');
        return 'Blog Entry added';
    }
    function editBlogEntry($id, $data){
        $this->db->where('id',$id)->set($data)->update('blog');
        return 'Blog Entry changed';
    }
    function editShopEntry($id, $data){
		$this->db->where('id',$id)->set($data)->update('buy');
		return 'Blog Entry changed';
    }
    function insBuyEntry($data){
    	$this->db->set($data)->insert('buy');
		return 'Shop Entry added';
    }
    function getBlogInfoBy($id){
        return $this->db->select('*')->where('id', $id)->get('blog')->result_array();
    }

    function getProductInfoBy($id){
        return $this->db->select('*')->where('id', $id)->get('buy')->result_array();
    }

    function getNameBy($id){
        return $this->db->select('name')->where('id',$id)->get('users')->result_array();
    }
    function writeLog($str){
        $this->db->set('send', $str)->insert('orders');
        return $this->db->insert_id();
    }
    function writeLogLast($str, $id){
        $this->db->where('id',$id)->set('received' , $str)->update('orders');
    }
    function checkIfChanged($id, $price){
        $temp = $this->db->select('price')->where('id', $id)->get('buy')->result_array();
        if (!empty($temp)){
            if ((double)$temp[0]['price'] == (double)$price) {
                return false;
            } else return true;
        } else return true;
    }
}