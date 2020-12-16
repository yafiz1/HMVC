<?php namespace App\Modules\Perpustakaan\Models;

use CodeIgniter\Model;

class PerpustakaanModel extends Model{

	protected $table = "";

	public function __construct($table)
	{
		parent::__construct();
		$this->table = $table;
	}

	public function getData()
	{
		$db = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->get()->getResult();
	}

	public function insertData($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->insert($data);
    }

    public function updateData($data, $id, $id_field)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where($id_field, $id);
        return $builder->update($data);
    }

    public function deleteData($id, $id_field)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->where($id_field, $id);
        return $builder->delete();
    }

}