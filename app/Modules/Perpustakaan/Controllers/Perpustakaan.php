<?php namespace App\Modules\Perpustakaan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Perpustakaan\Models\PerpustakaanModel;

class Perpustakaan extends BaseController
{
	
	public function __construct()
	{
		helper('form');
	}

	public function index($method = '')
	{
		
		if ($method == 'anggota')
			return $this->anggota();
		else if ($method == 'buku')
			return $this->buku();
		else if ($method == 'petugas')
			return $this->petugas();
		else if ($method == 'peminjaman')
			return $this->peminjaman();
		else {
			$data = [
				'title' => 'Dashboard',
				'content' => 'App\Modules\Perpustakaan\Views\v_grid_dashboard'
			];

			return view('template', $data);
		}
		
	}

	public function submit($param)
    {
    	$model = new PerpustakaanModel($param);

		$id = $this->request->getPost('id');
		
		if ($param == 'anggota') {
			 $data = array(
				'nama_anggota' => $this->request->getPost('nama_anggota'),
				'jk_anggota' => $this->request->getPost('jk')
			);
			$id_field = "id_anggota";
		}else if ($param == 'buku') {
			 $data = array(
				'judul_buku' => $this->request->getPost('judul_buku'),
				'tahun_terbit' => $this->request->getPost('tahun_terbit'),
				'stok' => $this->request->getPost('stok')
			);
			$id_field = "id_buku";
		}else if ($param == 'petugas') {
			 $data = array(
				'nama_petugas' => $this->request->getPost('nama_petugas'),
				'jabatan' => $this->request->getPost('jabatan'),
				'password' => sha1($this->request->getPost('password'))
			);
			$id_field = "id_petugas";
		}else if ($param == 'peminjaman') {
			 $data = array(
				'tgl_pinjam' => $this->request->getPost('tanggal_pinjam'),
				'tgl_kembali' => $this->request->getPost('tanggal_kembali'),
				'id_buku' => $this->request->getPost('id_buku'),
				'id_petugas' => $this->request->getPost('id_petugas'),
				'id_anggota' => $this->request->getPost('id_anggota')
			);
			$id_field = "id_peminjaman";
		}

		if($id == "")
			$res = $model->insertData($data);
		else
			$res = $model->updateData($data, $id, $id_field);

		
		return $this->index($param);
    }


	public function anggota($param = "", $id = "", $nama_anggota = "", $jk = "")
	{

		$model = new PerpustakaanModel("anggota");

		if ($param == 'delete') {
			$model->deleteData($id, 'id_anggota');
			return redirect()->route('perpustakaan/anggota');
		}

		if ($param == 'add') {
			$data = [
				'title' => 'Tambah Anggota',
				'content' 	=> 'App\Modules\Perpustakaan\Views\v_form_anggota',
				'data' => [
					"id" => $id,
					"nama_anggota" => $nama_anggota,
					"jk" => $jk
				]
			];
		}else if($param == 'edit') {
			$data = [
				'title' => 'Edit Anggota',
				'content' => 'App\Modules\Perpustakaan\Views\v_form_anggota',
				'data' => [
					"id" => $id,
					"nama_anggota" => $nama_anggota,
					"jk" => $jk
				]
			];
		}else{
			$data = [
				'title' => 'Data Anggota',
				'content' => 'App\Modules\Perpustakaan\Views\v_grid_anggota',
				'data' => $model->paginate(2, 'bootstrap'),
				'pager' => $model->pager
			];
		}
		return view('template', $data);
	}

	public function buku($param = "", $id = "", $judul_buku = "", $tahun_terbit = "", $stok = "")
	{
		$model = new PerpustakaanModel("buku");

		if ($param == 'delete') {
			$model->deleteData($id, 'id_buku');
		}

		if ($param == 'add') {
			$data = [
				'title' => 'Tambah Buku',
				'content' 	=> 'perpustakaan/v_form_buku',
				'data' => [
					"id" => $id,
					'judul_buku' => $judul_buku,
					'tahun_terbit' => $tahun_terbit,
					'stok' => $stok
				]
			];
		}else if ($param == 'edit') {
			$data = [
				'title' => 'Edit Buku',
				'content' 	=> 'perpustakaan/v_form_buku',
				'data' => [
					"id" => $id,
					'judul_buku' => $judul_buku,
					'tahun_terbit' => $tahun_terbit,
					'stok' => $stok
				]
			];
		}else{
			$data = [
				'title' => 'Data Buku',
				'content' => 'perpustakaan/v_grid_buku',
				'data' => $model->paginate(2, 'bootstrap'),
				'pager' => $model->pager
			];	
		}
		
		return view('template', $data);
	}

	public function petugas($param = "", $id = "", $nama_petugas = "", $jabatan = "", $password = "")
	{
		$model = new PerpustakaanModel("petugas");

		if ($param == 'delete') {
			$model->deleteData($id, 'id_petugas');
		}

		if ($param == 'add') {
			$data = [
				'title' => 'Tambah Petugas',
				'content' 	=> 'perpustakaan/v_form_petugas',
				'data' => [
					"id" => $id,
					'nama_petugas' => $nama_petugas,
					'jabatan' => $jabatan,
					'password' => $password
				]
			];
		}else if ($param == 'edit') {
			$data = [
				'title' => 'Edit Petugas',
				'content' 	=> 'perpustakaan/v_form_petugas',
				'data' => [
					"id" => $id,
					'nama_petugas' => $nama_petugas,
					'jabatan' => $jabatan,
					'password' => $password
				]
			];
		}else{
			$data = [
				'title' => 'Data Petugas',
				'content' => 'perpustakaan/v_grid_petugas',
				'data' => $model->paginate(2, 'bootstrap'),
				'pager' => $model->pager
			];	
		}
		
		return view('template', $data);
	}

	public function peminjaman($param = "", $id = "", $tanggal_pinjam = "", $tanggal_kembali = "", $id_buku = "", $id_petugas = "", $id_anggota = "")
	{
		$model = new PerpustakaanModel("view_peminjaman");
		$modelPeminjaman = new PerpustakaanModel("peminjaman");
		$modelBuku = new PerpustakaanModel("buku");
		$modelAnggota = new PerpustakaanModel("anggota");
		$modelPetugas = new PerpustakaanModel("petugas");

		if ($param == 'delete') {
			$modelPeminjaman->deleteData($id, 'id_peminjaman');
		}
		
		if ($param == 'add') {
			$data = [
				'title' => 'Tambah Peminjaman',
				'content' 	=> 'perpustakaan/v_form_peminjaman',
				'anggota' => $modelAnggota->getData(),
				'buku' => $modelBuku->getData(),
				'petugas' => $modelPetugas->getData(),
				'data' => [
					'id' => $id,
					'tanggal_pinjam' => $tanggal_pinjam,
					'tanggal_kembali' => $tanggal_kembali,
					'id_buku' => $id_buku,
					'id_petugas' => $id_petugas,
					'id_anggota' => $id_anggota
				]
			];
		}else if ($param == 'edit') {
			$data = [
				'title' => 'Edit Peminjaman',
				'content' 	=> 'perpustakaan/v_form_peminjaman',
				'anggota' => $modelAnggota->getData(),
				'buku' => $modelBuku->getData(),
				'petugas' => $modelPetugas->getData(),
				'data' => [
					'id' => $id,
					'tanggal_pinjam' => $tanggal_pinjam,
					'tanggal_kembali' => $tanggal_kembali,
					'id_buku' => $id_buku,
					'id_petugas' => $id_petugas,
					'id_anggota' => $id_anggota
				]
			];
		}else{
			$data = [
				'title' => 'Data Peminjaman',
				'content' => 'perpustakaan/v_grid_peminjaman',
				'data' => $model->paginate(2, 'bootstrap'),
				'pager' => $model->pager
			];	
		}



		return view('template', $data);
	}

	//--------------------------------------------------------------------

}
