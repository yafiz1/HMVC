<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model{

	public function getData()
	{
		$db = \Config\Database::connect();
        $builder = $db->table("petugas");
        return $builder->get()->getResult();
	}

    public function checkData($username, $password)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("petugas");
        return $builder->getWhere(['nama_petugas'=>$username,'password'=>$password])->getRow();
    }

	public function register($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table("petugas");
        return $builder->insert($data);
    }

}



