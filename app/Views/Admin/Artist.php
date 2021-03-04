
    

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
                 
                        
                        <div class="responsive-table">
                            <table class="table invoice-data-table white border-radius-4 pt-1">
                                <thead>
                                    <tr>
                                        <!-- data table responsive icons -->
                                        <th></th>
                                        <!-- data table checkbox -->
                                        <th></th>
                                        <th>id</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Date de naissance</th>
                                        <th>Nombre de films</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               
                                   
                                

                                <tbody>
                                <?php 
                                
                                    foreach($tabArtistes as $Artist){
                                                                        
                                ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href=""><?php echo $Artist['id']?></a>
                                        </td>

                                        <td><span class="invoice-amount"><?php echo $Artist['nom']?></span></td>

                                        <td><small><?php echo $Artist['prenom']?></small></td>

                                        <td><span class="invoice-customer"><?php echo $Artist['annee_naissance']?></span></td>

                                        <td>
                                            <span class="bullet green"></span>
                                            <small><?php echo $Artist['id']?></small>
                                        </td>

                                        <td>
                                            <div class="invoice-action">
                                                <a href="app-invoice-view.html" class="invoice-action-view mr-4">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </a>
                                                <a href="<?php echo base_url("Admin/Artist/edit/".$Artist['id'])?>" class="invoice-action-edit">
                                                    <i class="material-icons">edit</i>
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




