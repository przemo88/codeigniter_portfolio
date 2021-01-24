<?php namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'pages';

    protected $allowedFields = ['name','description','github','website','image'];

    public function getPages($id = false)
{
    if ($id === false)
    {
        return $this->findAll();
    }

    return $this->asArray()
                ->where(['id' => $id])
                ->first();
    }
}