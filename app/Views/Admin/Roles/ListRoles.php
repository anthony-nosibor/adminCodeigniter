
    

    <h1><?php echo $page_title;?></h1>
    <div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- invoice list -->
                    <section class="invoice-list-wrapper section">
                        <!-- create invoice button-->
                        <!-- Options and filter dropdown button-->
                      
                        <!-- create invoice button-->
                        <div class="invoice-create-btn">
                            <a href="app-invoice-add.html" class="btn waves-effect waves-light invoice-create border-round z-depth-4">
                                <i class="material-icons">add</i>
                                <span class="hide-on-small-only">Create User</span>
                            </a>
                        </div>
                 
                        <?= $pager->links() ?>

                        <div class="responsive-table">
                            <table class="table invoice-data-table white border-radius-4 pt-1">
                                <thead>
                                    <tr>
                                        <!-- data table responsive icons -->
                                        <th></th>
                                        <!-- data table checkbox -->
                                        
                                        <th>id</th>
                                        <th>Nom du film</th>
                                        <th>Nom de l'acteur</th>
                                        <th>Rôle</th>
                                    </tr>
                                </thead>
                               
                                   
                                

                                <tbody>
                                <?php 

                                
                                        foreach($tabRoles as $Roles){                                        
                                        $film = $filmModel->where('id',$Roles['id_film'])->first();
                                        //dd($film);                           
                                ?>
                                    <tr>
                                        <td></td>
                                        <td><small><?php echo $Roles['id_acteur']?></small></td>
                                        <td>
                                            <a><?php echo $film['titre']?></a>
                                        </td>
                                         
                                        <td>
                                        <span class="invoice-amount"></span></td>
                                        

                                        <td><small><?php echo $Roles['nom_role']?></small></td>

                                        <td><span class="invoice-customer"></span></td>

                                        <td>
                                            <span class="bullet green"></span>
                                            <small></small>
                                        </td>

                                        <td>
                                            
                                                <a href="<?php echo base_url("Admin/Role/edit/".$Roles['id_film'])?>" class="invoice-action-edit">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="<?php echo base_url("Admin/Role/delete/".$Roles['id_film'])?>" class="invoice-action-delete">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                        <?php } ?>
                                   
                                </tbody>
                                
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>               


