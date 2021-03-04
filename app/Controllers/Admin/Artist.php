<?php

namespace App\Controllers\Admin;
use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\ArtistModel;
 
class Artist extends BaseController
{
    
    public $artistModel = null;

    public function __construct(){  
        $this->artistModel = new ArtistModel();
    }

    public function index(){
        $this->artistModel = new ArtistModel();
        $listArtists = $this->artistModel->findAll();
        //dd($listArtists);

        /** exemple de passage de variable a une vue */ 
        $data = ['page_title' => 'Admin > Liste des artistes ' ,
                 'aff_menu'   => true,
                 'tabArtistes' => $listArtists
                ]; 
                
            
            echo view('common/HeaderAdmin' , 	$data);
            echo view('Admin/Artistes/List',           $data);
            echo view('common/FooterSite');

    }

    public function edit($id=null){

        
        $Artist = $this->artistModel->where('id', $id)->first();

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
                
                    $this->artistModel->where('id', $id)->set($datasave)->update();

                }else{

                    $this->artistModel->save($datasave);
                    return redirect()->to('/Admin/Artist');

                }

            
                    
            }

        }

                $data = ['page_title' => 'Admin > Liste des artistes ' ,
                         'aff_menu'   => true,
                         'formArtist' => $Artist,
                        ]; 
                        
       
   
                echo view('common/HeaderAdmin' , 	$data);
                echo view('Admin/Artistes/edit',           $data);
                echo view('common/FooterSite');

    }

 



}
