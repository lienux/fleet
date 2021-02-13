<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_driver extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function get()
	{
		$this->db->select('*');
		$this->db->from('tb_driver');
		$res = $this->db->get()->result_array();		

		return $res;
	}

	public function detail($id)
	{
		$this->db->select('*')
		->from('tb_driver')
		->where('id',$id);
		$res = $this->db->get()->result_array();		

		return $res;
	}

	public function simpan($data)
	{
		return $this->db->insert('tb_driver',$data);
	}

	public function update($id,$data)
	{
		$this->db->where('id',$id);
		$res = $this->db->update('tb_driver',$data);
		return $res;
	}

	public function hapus($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('tb_driver');
	}
}