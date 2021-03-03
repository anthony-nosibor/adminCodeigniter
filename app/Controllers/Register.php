<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Register extends BaseController
{

    
    public function index()
    {
        //include helper form
       // helper('form');
        
        $this->affichageFormLogin('Inscription à wwww.site.com',false);

		
       
    }
 
    public function save()
    {
        //include helper form
       // helper('form');
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.userEmail]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'userName'     => $this->request->getVar('name'),
                'userEmail'    => $this->request->getVar('email'),
                'userPassword' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            
            $data = [
                'page_title' => 'Register à wwww.site.com' ,
                'aff_menu'  => false,
                'validation' => $this->validator
            ];
            $this->affichageFormLogin($pagetitle='',$affmenu=false,$validation=null);
            
        }
         
    }

    private function affichageFormLogin($pagetitle='',$affmenu=false,$validation=null){


        $data = [
            'page_title' =>  $pagetitle,
            'aff_menu'  => $affmenu,
            'validation' => $validation
        ];

        echo view('common/HeaderAdmin' , 	$data);
        echo view('register', $data);
        echo view('common/FooterSite');


    }
 
}