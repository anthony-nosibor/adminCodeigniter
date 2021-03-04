
    

    <h1></h1>
    <div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- invoice list -->
                    <section class="invoice-list-wrapper section">
                        <!-- create invoice button-->
                        <!-- Options and filter dropdown button-->
                      
                      
                 
                        
                        <div class="responsive-table">
                       <!-- Form with validation -->
                       
                       <div class="col s12 m6 l6">
                                <div id="validation" class="card card card-default scrollspy">
                                    <div class="card-content">
                                        <h4 class="card-title">Formulaire de modification et d'ajout</h4>

                                        <form  method="POST" action="<?php echo base_url('Admin/Artist/Edit/'.$formArtist['id']);?>">
                                          <!-- Je cache mon champs pour lui dire que je suis dans le mode modifier-->

                                           <?php if(isset($formArtist['id'])){ ?>
                                           <!-- Je met à jour -->
                                          <input name="save" value="update" type="hidden">
                                          <?php }else { ?>
                                           <!-- Je crée un nouvel enregistrement -->
                                          <input name="save" value="create" type="hidden">
                                          <?php } ?>


                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix"></i>
                                                    <input id="name4" name="artistname" value="<?php echo $formArtist['nom'];?>" type="text" class="validate">
                                                    <label for="name4">Nom</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix"></i>
                                                    <input id="text" name="artistnickname" value="<?php echo $formArtist['prenom'];?>" type="text" class="validate">
                                                    <label for="email4">Prénom</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix"></i>
                                                    <input id="text" name="artistbirthday" value="<?php echo $formArtist['annee_naissance'];?>" type="number" class="validate">
                                                    <label for="password5">Année de naissance</label>
                                                </div>
                                            </div>
                            
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>               


