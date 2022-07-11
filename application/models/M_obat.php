<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat extends CI_Model{
    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function update_data($data, $table)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($table, $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    
    public function update_obat($data, $table)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($table, $data);    
    }

    public function kategori_obat()
    {
        $this->db->select('*');
        $this->db->from('data_obat');
        return $this->db->get()->num_rows();
    }
    public function data_obat()
    {
        $this->db->select('*');
        $this->db->from('daftar_obat');
        return $this->db->get()->num_rows();
    }
    public function stok_obat()
    {
        $this->db->select('*');
        $this->db->from('stok_obat');
        return $this->db->get()->num_rows();
    }
    public function User()
    {
        $this->db->select('*');
        $this->db->from('User');
        return $this->db->get()->num_rows();
    }


    public function get_keyword ($keyword)
    {
        $this->db->select('*');
        $this->db->from('stok_obat');
		$this->db->like('nama',$keyword);
        $this->db->or_like('jenis',$keyword);
		$this->db->or_like('kemasan',$keyword);
        return $this->db->get()->result();
    }

    public function get_keyword1 ($keyword1)
    {
        $this->db->select('*');
        $this->db->from('daftar_obat');
		$this->db->like('nama',$keyword1);
        $this->db->or_like('jenis',$keyword1);
		$this->db->or_like('isi',$keyword1);
        return $this->db->get()->result();
    }

    public function get_keyword2 ($keyword2)
    {
        $this->db->select('*');
        $this->db->from('kategori_obat');
		$this->db->like('id',$keyword2);
        $this->db->or_like('kategori',$keyword2);
        
        return $this->db->get()->result();
    }

    public $kode_obat;
        public $nama;
        public $jenis;
        public $kemasan;
        public $stok;

    public function __construct()
    {
        $this->load->database();
    }

    public function cekkodeobat()
    {
        $query = $this->db->query("SELECT MAX(kode_obat) as kode_obat from stok_obat");
        $hasil = $query->row();
        return $hasil->kode_obat;
    }

    public function simpan()
    {
        $this->kode_obat = $_POST['kode_obat'];
        $this->nama = $_POST['nama'];
        $this->jenis = $_POST['jenis'];
        $this->kemasan = $_POST['kemasan'];
        $this->stok = $_POST['stok'];
        $this->db->insert('stok_obat', $this);
    }




}