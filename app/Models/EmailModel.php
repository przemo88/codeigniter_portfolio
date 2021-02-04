<?php namespace App\Models;

use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $allowedFields = ['name','email','message'];
}