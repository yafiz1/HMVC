<?php namespace App\Modules\Login\Controllers;

use App\Controllers\BaseController;
use App\Modules\Login\Models\AuthModel;

class Login extends BaseController
{
	public function __construct()
	{
		helper('form');
	}
	public function index()
	{
		$data = [
				'title' => 'Login',
				'content' => 'App\Modules\Login\Views\login'
			];
		return view('Login/index.php', $data);
	}

	public function registerView()
	{
		$data = [
				'title' => 'Register',
				'content' => 'App\Modules\Login\Views\register'
			];
		return view('Login/index.php', $data);
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
			return redirect()->route('Perpustakaan');
		}else{
			$session->setFlashdata('msg','Username/password salah');
			return redirect()->route('Login');
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
			return redirect()->route('Login');
		}else{
			return redirect()->route('Login/registerView');
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->route('Login');
	}

	//--------------------------------------------------------------------

}
