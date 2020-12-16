<?php namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model{
	protected $table ='mahasiswa';

	 public function getData()
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->get()->getResult();
    }
}