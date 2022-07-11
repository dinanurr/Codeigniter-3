<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('index.php/login/index');
		}
		$this->load->model('M_obat');
		$this->load->helper("url");
	}

	public function index()
	{
		$data['kategori_obat'] = $this->M_obat->get_data('kategori_obat')->result();
		$this->load->view('coba/kategori_obat', $data);
	}

	public function tambah_obat()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
		
		if( $this-> form_validation->run() == false) {
			$this->load->view('coba/kategori_obat');
		} else {
			$data = [
				'kategori' => htmlspecialchars($this->input->post('kategori'))
			];
			$this->db->insert('kategori_obat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">
			Data berhasil ditambahkan 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/master/index');
		}
	}

    public function obat ($id)
	{
		$data = array (
				'id' => $id,
				'kategori' => $this->input->post('kategori')
		);

			$this->M_obat->update_data($data, 'kategori_obat');
			$this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">
			Data berhasil diedit 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/master/index');
	}

	public function delete_obt ($id)
		{
			$where = array ('id' => $id);
			$this->M_obat->hapus_data($where, 'kategori_obat');
			$this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">
			Data berhasil dihapus
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/master/index');
		}
		

		//daftar obat
	public function data()
		{
			$data['daftar_obat'] = $this->M_obat->get_data('daftar_obat')->result();
			$this->load->view('coba/data_obat', $data);

		}

	public function edit_obat ($id)
	{
		$data = array (
				'id' => $id,
				'kode_obat' => $this->input->post('kode_obat'),
				'nama' => $this->input->post('nama'),
				'jenis' => $this->input->post('jenis'),
				'isi' => $this->input->post('isi'),	
				'harga_box' => $this->input->post('harga_box'),
				'harga_satuan' => $this->input->post('harga_satuan'),
				'stok_box' => $this->input->post('stok_box'),
				'stok_biji' => $this->input->post('stok_biji'),
				'expired' => $this->input->post('expired')	
		);
		$this->M_obat->update_obat($data, 'daftar_obat');
			$this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">
			Data berhasil diedit 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/master/data');
	}

	public function tambah()
	{
		
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('jenis', 'jenis', 'required|trim');
		$this->form_validation->set_rules('isi', 'isi', 'required|trim');
		$this->form_validation->set_rules('harga_box', 'harga_box', 'required|trim');
		$this->form_validation->set_rules('harga_satuan', 'harga_satuan', 'required|trim');
		/*$this->form_validation->set_rules('stok_box', 'stok', 'required|trim');
		$this->form_validation->set_rules('stok_biji', 'stok', 'required|trim');*/
		$this->form_validation->set_rules('expired', 'expired', 'required|trim');
		
		if( $this-> form_validation->run() == false) {
			$this->load->view('coba/data_obat');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama')),	
				'jenis' => htmlspecialchars($this->input->post('jenis')),
				'isi' => htmlspecialchars($this->input->post('isi')),	
				'harga_box' => htmlspecialchars($this->input->post('harga_box')),
				'harga_satuan' => htmlspecialchars($this->input->post('harga_satuan')),
				/*'stok_box' => htmlspecialchars($this->input->post('stok_box')),
				'stok_biji' => htmlspecialchars($this->input->post('stok_biji')),*/
				'expired' => htmlspecialchars($this->input->post('expired'))
			];
			$this->db->insert('daftar_obat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">
			Data berhasil ditambahkan 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/master/data');
		}
	}

	public function detail_obat ($id)
	{
		$data = array (
				'id' => $id,
				'kode_obat' => $this->input->post('kode_obat'),
				'nama' => $this->input->post('nama'),
				'jenis' => $this->input->post('jenis'),
				'isi' => $this->input->post('isi'),	
				'harga_box' => $this->input->post('harga_box'),
				'harga_satuan' => $this->input->post('harga_satuan'),
				'stok_box' => $this->input->post('stok_box'),
				'stok_biji' => $this->input->post('stok_biji'),
				'expired' => $this->input->post('expired')	
		);
		$this->M_obat->update_obat($data, 'daftar_obat');
			redirect('index.php/master/data');
	}

	public function delete_obat ($id)
		{
			$where = array ('id' => $id);
			$this->M_obat->hapus_data($where, 'daftar_obat');
			$this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">
			Data berhasil dihapus
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/master/data');
		}

	// controler stok obat
	public function stok()
	{
		
        /*$table = "stok_obat";
        $field = "kode_obat";

        $lastKode = $this->M_kode->kode_obat('$table, $field');
        var_dump($lastKode);*/
		
		$data['stok_obat'] = $this->M_obat->get_data('stok_obat')->result();
		$this->load->view('coba/stok_obat', $data);
	}

	public function tambah_stok()
	{
		/*$this->form_validation->set_rules('kode_obat', 'kode_obat', 'required|trim');*/
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('jenis', 'jenis', 'required|trim');
		$this->form_validation->set_rules('kemasan', 'kemasan', 'required|trim');
		$this->form_validation->set_rules('stok', 'stok', 'required|trim');
		
		if( $this-> form_validation->run() == false) {
			$this->load->view('coba/stok_obat');
		} else {
			$data = [
				/*'kode_obat' => htmlspecialchars($this->input->post('kode_obat')),*/
				'nama' => htmlspecialchars($this->input->post('nama')),	
				'jenis' => htmlspecialchars($this->input->post('jenis')),
				'kemasan' => htmlspecialchars($this->input->post('kemasan')),
				'stok' => htmlspecialchars($this->input->post('stok'))
				
			];
			$this->db->insert('stok_obat', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">
			Data berhasil ditambahkan 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/master/stok');
		}
	}

	public function edit_stokobat ($id)
		{
		$data = array (
				'id' => $id,
				/*'kode_obat' => $this->input->post('kode_obat'),*/
				'nama' => $this->input->post('nama'),
				'jenis' => $this->input->post('jenis'),	
				'kemasan' => $this->input->post('kemasan'),
				'stok' => $this->input->post('stok')	
		);
		$this->M_obat->update_obat($data, 'stok_obat');
			$this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">
			Data berhasil diedit 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/master/stok');
		}

	public function search()
		{
			$keyword = $this->input->post('keyword');
			$data['stok_obat'] = $this->M_obat->get_keyword($keyword);
			$this->load->view('coba/stok_obat', $data);
		}

	public function search1()
		{
			$keyword1 = $this->input->post('keyword1');
			$data['daftar_obat'] = $this->M_obat->get_keyword1($keyword1);
			$this->load->view('coba/data_obat', $data);
		}

	public function search2()
		{
			$keyword2 = $this->input->post('keyword2');
			$data['kategori_obat'] = $this->M_obat->get_keyword2($keyword2);
			$this->load->view('coba/kategori_obat', $data);
		}


	public function cek()
    {
        $dariDB = $this->M_obat->cekkodeobat();
        //contoh JRD0004, angka 3 adalah awal pengambilan angka,dan 4 jumlah angka yg diambil
        $nourut = substr($dariDB, 3, 4);
        $kodeobatsekarang = $nourut + 1;
        $data = array('kode_obat' => $kodeobatsekarang);
        $this->load->view('coba/stok', $data);
    }

    public function simpan()
    {
        $this->M_obat->simpan();
		$this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible fade show" role="alert">
			Data berhasil ditambahkan 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
        redirect('index.php/master/stok');
    }

};
	