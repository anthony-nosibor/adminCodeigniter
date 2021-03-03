<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
 
class Login extends BaseController
{
	public function index()
	{	

		/** exemple de passage de variable a une vue */ 
		$this->affichageFormLogin('Connexion à wwww.site.com',false);
        $this->session->set(['car'=>"voiture"]);
	}

	public function connexion()
    {
      
        $rules = [
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[6]|max_length[200]',
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $users = $model->where('userEmail',$this->request->getVar('email'))
                            ->findAll();
            d($users);
            

            foreach ($users as $user) 
            {
            /************************** On boucle jusqu'a ce que l'on trouve un mot de passe correcte ********************************/
               if(password_verify($this->request->getVar('password'), $user['userPassword']))
               {
                   $this->session->set(['id'=>[$user['userId']]]);
                   return redirect()->to('/Admin/Accueil');
               }
            }
            /******* Si il ne trouve pas de mot de passe correcte apres avoir parcouru la boucle ou qu'il n'y a pas de resultats ***********/
           
        }else{
            
            $data = [
                'page_title' => 'Connexion à wwww.site.com' ,
                'aff_menu'  => false,
                'validation' => $this->validator
            ];
    
            $this->affichageFormLogin('Connexion à wwww.site.com',false);
        }
         
    }

    public function logout(){

		return $this->session->destroy();
        redirect()->to('/Site/login');

	}

    private function affichageFormLogin($pagetitle='',$affmenu=false,$validation=null){


        $data = [
            'page_title' =>  $pagetitle,
            'aff_menu'  => $affmenu,
            'validation' => $validation
        ];

        echo view('common/HeaderAdmin' , 	$data);
        echo view('Site/login', $data);
        echo view('common/FooterSite');


    }

}
