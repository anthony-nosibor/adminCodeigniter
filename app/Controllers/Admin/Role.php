<?php

namespace App\Controllers\Admin;
use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\ArtistModel;
use App\Models\FilmModel;
 
class Role extends BaseController
{
    
    public $roleModel = null;

    public function __construct(){  
        $this->roleModel = new RoleModel();
        $this->artistModel = new ArtistModel();
        $this->filmModel = new FilmModel();
    }

    public function index(){

       
        $listRoles = $this->roleModel->findAll();
        //dd($listArtists);

        /** exemple de passage de variable a une vue */ 
        $data = ['page_title'  => 'Admin > Liste des acteurs et leurs film',
                 'aff_menu'    => true,
                 'filmModel'   => $this->filmModel,
                 'artistModel' => $this->artistModel,
                 'tabRoles'    => $this->roleModel->orderBy('nom_role','desc')->paginate(10),
                 'pager'       => $this->roleModel->pager
                ]; 
                
            
            echo view('common/HeaderAdmin' , 	$data);
            echo view('Admin/Roles/ListRoles',           $data);
            echo view('common/FooterSite');

    }

    public function edit($id=null){

        
        $Roles = $this->roleModel->where('id', $id)->first();

        /*********************************************************************************************************
         * Je controle si variable 'save' existe, et si elle existe cela veut dire que l'on a posté un formulaire 
         * *******************************************************************************************************/
        if(!empty($this->request->getVar('save'))){

        /*********************************************************************************************************
         * $rules me permet de controler données saisies dans le formulaire ex:
         * nom est requis long minimal 3 et longueur max 20
         * *******************************************************************************************************/
            $rules = [
                'artistname'          => 'required|min_length[3]|max_length[20]',
                'artistnickname'         => 'required|min_length[3]|max_length[20]',
                'artistbirthday'      => 'required'  
            ];
        
        /*********************************************************************************************************
         *  $this->validate($rules) va vérifier si les données entrés dans $rules sont correctement rentrés.
         * *******************************************************************************************************/
            if($this->validate($rules)){
                
                    $datasave = [
                        
                        'nom'     => $this->request->getVar('artistname'),
                        'prenom'    => $this->request->getVar('artistnickname'),
                        'annee_naissance' =>$this->request->getVar('artistbirthday')
                    ];

                    if($this->request->getVar('save')=='update'){
                    
                        $this->roleModel->where('id', $id)->set($datasave)->update();

                    }else{

                        $this->roleModel->save($datasave);
                        return redirect()->to('/Admin/Role');

                    }
                   
            }

        }

                $data = ['page_title' => 'Admin > Liste des films et acteurs ' ,
                         'aff_menu'   => true,
                         'formArtist' => $Roles,
                        ]; 
                        
          
                echo view('common/HeaderAdmin' , 	$data);
                echo view('Admin/Roles/edit',           $data);
                echo view('common/FooterSite');

    }

    public function delete($id=null){

        $this->roleModel->where('id', $id)->delete();
        return redirect()->to('/Admin/Role/');

    }

 



}
