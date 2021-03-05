<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class FilmModel extends Model{

    protected $table = 'film';
    protected $allowedFields = ['id','titre'];
    
}