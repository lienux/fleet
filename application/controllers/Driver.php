<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('parser');
		$this->load->model('Mod_driver','mDriver');
				
		if($this->session->userdata('logged_in') == FALSE){
			redirect("login");
		}
	}

	public function index()
	{
		$data = array(			
			'breadcrumb' => 'Vehicle'
		);
		$res = $this->mDriver->get();
		$data['page'] = $this->load->view('page/pengemudi/list',array('list_data'=>$res),true);
		$this->parser->parse('template/layout_admin',$data);				        
	}

	public function tambah()
	{
		$data = array(			
			'breadcrumb' => 'Driver / Tambah',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('page/pengemudi/form',array(),true);
		$this->parser->parse('template/layout_admin',$data);	
	}

	public function doSimpan()
	{
		$name = $this->input->post('txtNama');
		$jk = $this->input->post('txtJK');
		$no_sim = $this->input->post('txtSIM');

		$data = array(
			'name'=>$name,
			'jk'=>$jk,
			'no_sim'=>$no_mesin
		);

		$res = $this->mDriver->simpan($data);

		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah...');
			redirect('driver');
		}else{
			echo "Teu Eucreug";
		}
	}

	public function edit($id)
	{
		$res = $this->mVehicle->detail($id);
		$data = array(			
			'breadcrumb' => 'Vehicle / Edit',
	        'dropdown_master' => ''
		);
		$data['page'] = $this->load->view('page/kendaraan/form',array('data_detail'=>$res),true);
		$this->parser->parse('template/layout_admin',$data);
	}

	public function doUpdate($id)
	{
		$flat_no = $this->input->post('txtFlatNo');
		$jk = $this->input->post('txtJK');
		$no_mesin = $this->input->post('txtNoMesin');

		$data = array(
			'flat_no'=>$flat_no,
			'jenis_kendaraan'=>$jk,
			'nomor_mesin'=>$no_mesin
		);

		$res = $this->mVehicle->update($id,$data);

		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah...');
			redirect('vehicle');
		}else{
			echo "Teu Eucreug";
		}
	}

	public function doHapus($id)
	{
		$res = $this->mVehicle->hapus($id);
		if ($res > 0) {
			$this->session->set_flashdata('alert_true', 'collapse');
			$this->session->set_flashdata('message', 'Alhamdulillah... Hapus data berhasil');
			redirect('vehicle');
		}else{
			echo "gagal";
		}
	}

}