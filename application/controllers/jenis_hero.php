<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jenis_hero extends CI_Controller {

	public function index()
	{
		$this->load->model('hero_model');
		$data["jenisHero_list"] = $this->hero_model->getJenisHero();
		$this->load->view('jenis_hero',$data);	
	}

	public function createJenis(){
		$this->load->helper('url','form');	
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('keterangan','Keterangan','trim|required');
		$this->load->model('hero_model');	
		
		if($this->form_validation->run()==FALSE){
			$this->load->view('tambah_jenis_view');
		}else{

				$this->hero_model->insertJenisHero();
				$this->load->view('tambah_jenis_sukses');
		}
	}

	public function deleteJenis($idJenis){
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('hero_model');
		
		$this->hero_model->deleteById($idJenis);
		if($this->form_validation->run()==FALSE){
			redirect('jenis_hero');
		}
	}

	public function updateJenis($idJenis){
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('keterangan','Keterangan','trim|required');
		$this->load->model('hero_model');

		$data['jenis_hero']=$this->hero_model->getJenisHeroByID($idJenis);

		if($this->form_validation->run()==FALSE){
			$this->load->view('edit_jenis_view',$data);
		}
		else{
			$this->hero_model->updateJenisById($idJenis);
			$this->load->view('edit_jenis_sukses');
		}
	}

	
	//method update butuh parameter id berapa yang akan di update
	

	
}


/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>