<?php ob_start();?>
<!--close-left-menu-stats-sidebar-->



<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span6">
            <?php if($_SESSION['id'] == 203){
    ?>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Ajouter une personne</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="./index.php?action=adduser" method="post" class="form-horizontal">
                        <div class="control-group">
                            <label name="lastname" class="control-label">Nom :</label>
                            <div class="controls">
                                <input type="text" name="lastname" class="span11" placeholder="Nom" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label name="firstname" class="control-label">Prénom :</label>
                            <div class="controls">
                                <input type="text" name="firstname" class="span11" placeholder="Prénom" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label name="mdp" class="control-label">Mot de passe</label>
                            <div class="controls">
                                <input type="password" name="mdp" class="span11" placeholder="Mot de passe" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label name="mail" class="control-label">Email</label>
                            <div class="controls">
                                <input type="email" name="mail" class="span11" placeholder="Email" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label name="pseudo" class="control-label">Pseudo</label>
                            <div class="controls">
                                <input type="text" name="pseudo" class="span11" placeholder="Pseudo" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label name="poste" class="control-label">Fonction</label>
                            <div class="controls">
                                <input type="text" name="poste" class="span11" />
                                <span class="help-block">Fonction de la personne</span> </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="valideradd" name="validerAdd">Ajouter</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <?php }?>
        <div class="span6">
        <div class="widget-box">
           
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5>Upload un fichier</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="./index.php?action=uploadfiles" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                
                    <div class="control-group">
                        <label class="control-label">File upload input</label>
                        <div class="controls">
                            <input type="file" name="fichier" />
                        </div>
                    </div>

                    <div class="form-actions">
                        <label class="control-label"></label>

                        <input type="submit" name="envoyer" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php if($_SESSION['id'] == 203){
    ?>
    <div class="widget-box">

        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Membres</h5>
        </div>

        <div class="widget-content nopadding">

            <table class="table table-bordered data-table">

                <thead>

                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Pseudo</th>
                        <th>Fonction</th>
                    
                    </tr>

                </thead>

                <tbody>

                    <?php  while ($userlist=$infosUser->fetch())
                    {
 
    
    ?>
                    <tr class="gradeA">

                        <td><?php  echo $userlist['lastname'];?></td>
                        <td><?php  echo $userlist['firstname']; ?></td>

                        <td><?php  echo $userlist['mail'];?></td>
                        <td class="center"><?php  echo $userlist['pseudo'];?></td>
                        <td><?php  echo $userlist['poste'];?><div class="pull-right"> <a class="tip" href="./index.php?action=modifyuser" title="Editer"><i class="icon-pencil"></i></a> <a class="tip" href="./index.php?action=deluser&amp;id=<?php echo $userlist['id']; ?> " title="Supprimer"><i class="icon-remove"></i></a> </div></td>
                        
                        <!--                            -->
                    </tr>

                    <?php 
     
                
     ?>
                </tbody>

                <?php
   
}
        
    
$infosUser->closeCursor();
            
         
?>

            </table>

            <?php      
                ?>

            <?php }?>

        </div>
    </div>

    <?php $content = ob_get_clean();?>
    <?php require('templateAdmin.php')?>
