<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class RoleModel extends Model{

    protected $table = 'role';
    protected $allowedFields = ['id_film','nom_role'];
    
}