<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('Mod_vehicle','mVehicle');
		
		if($this->session->userdata('logged_in') == FALSE){
			redirect("login");
		}
	}

	public function index()
	{
		$data = array(			
			'breadcrumb' => 'Vehicle',
	        'dropdown_master' => ''
		);
		$res = $this->mVehicle->get();
		
		$data['page'] = $this->load->view('page_vehicle',array('data_vehicle'=>$res),true);
		$this->parser->parse('layout_admin',$data);				        
	}

	public function tambah()
	{
		$data = array(			
			'breadcrumb' => 'Vehicle / Tambah',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('form_tambah_vehicle',array(),true);
		$this->parser->parse('layout_admin',$data);	
	}

	public function doSimpan()
	{
		$flat_no = $this->input->post('txtFlatNo');
		$jk = $this->input->post('txtJK');
		$no_mesin = $this->input->post('txtNoMesin');

		$data = array(
			'flat_no'=>$flat_no,
			'jenis_kendaraan'=>$jk,
			'nomor_mesin'=>$no_mesin
		);

		$res = $this->mVehicle->simpan($data);

		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('item', 'Alhamdulillah...');
			redirect('vehicle');
		}else{
			echo "Teu Eucreug";
		}
	}

	public function delete($id)
	{
		$res = $this->mVehicle->hapus($id);

		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('item', 'Alhamdulillah... Hapus data berhasil');
			redirect('vehicle');
		}else{
			echo "gagal";
		}
	}

}
