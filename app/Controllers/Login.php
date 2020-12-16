<?php namespace App\Controllers;

use App\Models\AuthModel;

class Login extends BaseController
{
	public function __construct()
	{
		helper('form');
	}
	public function index()
	{
		return view('Login/index.php');
	}

	public function registerView()
	{
		return view('Login/register.php');
	}

	public function auth()
	{
		$model = new AuthModel;

		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$data = $model->checkData($username, sha1($password));
		
		$session = session();
		if ($data) {
			$sessdata = [
				'username' => $data->nama_petugas,
				'logged_in' => TRUE,
				'jabatan' => $data->jabatan
			];
			$session->set($sessdata);
			return redirect()->to(base_url().'/Perpustakaan');
		}else{
			$session->setFlashdata('msg','Username/password salah');
			return redirect()->to(base_url().'/Login');
		}
	}

	public function registerAccount()
	{
		$model = new AuthModel;
		$data = [
			'nama_petugas' => $this->request->getPost('username'),
			'jabatan' => "pustakawan",
			'password' => sha1($this->request->getPost('password'))
		];
		$res = $model->register($data);
		if ($res->connID->affected_rows == 1) {
			return redirect()->to(base_url().'/Login');
		}else{
			return redirect()->to(base_url().'/Login/registerView');
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url().'/Login');
	}

	//--------------------------------------------------------------------

}
