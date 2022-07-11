<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->model('M_obat');
	}

	// controller login
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() == false) {
			$this->load->view('coba/login');
		}  else {
			// validasinya success
			$this->_login(); 
		}
		
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$User = $this->db->get_where('User', ['email' => $email])->row_array();
		
		if($User) {
			session_start();
			if (isset($_SESSION['level'])) {
				header("index.php/login/dashboard");
			}
			if (isset($_SESSION['email'])) {
    			header("index.php/login/dashboard");
				}
						
			// jika usernya aktif
			if($User['is_active'] == 1) {
				// cek password
				if(password_verify($password, $User['password'])) {
					$data = [
						'email' => $User['email'],
						'level' => $User['level'],
						'role_id' => $User['role_id']
					];
					$this->session->set_Userdata($data);
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Wrong Password!</div>');
					redirect('index.php/Login');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				This email has not been activated!</div>');
				redirect('index.php/Login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered!</div>');
			redirect('index.php/Login');
		}
		if($User['role_id'] == 1){
			redirect('index.php/login/dashboard');
					}else {
						redirect('index.php/login/dashboard');
					}
		
		
	}

	//controller registrasi

	public function registrasi()
	{
		/*$this->load->view('coba/registrasi');
	}
	function proses()
	{
		$config['upload_path']	='assets/img/profil';
		$config['allowed_types']	='gif|jpg|png';
		$config['max_size']			=100;
		$config['max_width']		=2048;
		$config['max_height']		=768;
		$config['encrypt_name']		=TRUE;
		$this->load->library('upload', $config);
		if (! $this->upload->do_upload('image'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('form_upload', $error);
		} else {
			$data['name'] = $this->upload->data('name');
			$data['email'] = $this->upload->data('email');
			$data['password'] = $this->upload->data('password1', PASSWORD_DEFAULT);
			$data['username'] = $this->upload->data('username');
			$data['level'] = $this->upload->data('admin');
			$data['is_active'] = $this->upload->data('1');
			$data['image'] = $this->upload->data('image');
		
			$this->db->insert('User', $data);
			redirect('index.php/login');
		}*/


		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[User.email]', 
		['is_unique' => 'This email has already registered!']);
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]
		matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[5]
		matches[password1]');
		$this->form_validation->set_rules('image', 'image');
		$this->form_validation->set_rules('role_id', 'role_id');
		if( $this-> form_validation->run() == false) {
			$this->load->view('coba/registrasi');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name')),	
				'email' => htmlspecialchars($this->input->post('email')),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'username' => $this->input->post('username'),
				'level' => $this->input->post('level', true),
				'role_id' => $this->input->post('role_id', true),
				'is_active' => 1,
				'image' => $this->input->post('image')
			];
			$this->db->insert('User', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation! your account has been created.Plase Login</div>');
			redirect('index.php/Login');
		}
	}

	// controller dashboard
	public function dashboard()
	{
		$data['kategori'] = $this->M_obat->kategori_obat();
		$data['data'] = $this->M_obat->data_obat();
		$data['stok'] = $this->M_obat->stok_obat();
		$data['admin'] = $this->M_obat->User();
		$this->load->view('coba/dashboard', $data);
		
	}

	//public function logout
	public function logout() 
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			You have logged out!</div>');
			redirect('index.php/Login');
	}

	public function tables()
	{
		$data['header'] = 'Tables';
		$data['User'] = $this->Auth_model->get_data('User')->result();
		$this->load->view('coba/tables', $data);
	}

	public function edit ($id)
	{
		$data = array (
				'id' => $id,
				'name' => $this->input->post('name'),	
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'image' => $this->input->post('image')
		);

			$this->Auth_model->update_data($data, 'User');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data berhasil diedit 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/Login/tables');
	}

	public function delete ($id)
		{
			$where = array ('id' => $id);
			$this->Auth_model->hapus_data($where, 'User');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data berhasil dihapus
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			redirect('index.php/login/tables');
		}

	public function Profile()
	{
		$data['User'] = $this->db->get_where('User', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('coba/profile', $data); 
	}

	function create()
	{
		$this->load->view('coba/upload_img');
	}


	public function member()
	{
		$data['kategori'] = $this->M_obat->kategori_obat();
		$data['data'] = $this->M_obat->data_obat();
		$data['stok'] = $this->M_obat->stok_obat();
		$data['admin'] = $this->M_obat->User();
		$this->load->view('coba/member', $data);
		
	}
	
}
	