<?php namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
	public function index()
	{
		$model = new MahasiswaModel;

		$data = [
			'title' => 'Data Mahasiswa',
			'content' => 'mahasiswa/v_grid',
			'mhs' => $model->paginate(2, 'bootstrap'),
			'pager' => $model->pager
		];
		return view('template', $data);
	}

	//--------------------------------------------------------------------

}
