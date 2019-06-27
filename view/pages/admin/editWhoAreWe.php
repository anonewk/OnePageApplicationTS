<?php ob_start();?>



<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6" id="sliderContent">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify" ></i> </span>
                    <h5>Modifier le qui sommes nous</h5>
                </div> 
                <div class="widget-content nopadding">
                    <form action="./index.php?action=modifyinfos" method="post" class="form-horizontal">
                       <div class="control-group">
                            <label for="titre" class="control-label">Titre</label>
                            <div class="controls">
                                <input name="titre" type="text"  class="span11" placeholder="Titre" />
                            </div>
                        </div>    
                        <div class="control-group">
                            <label for="textinfos" class="control-label">Text </label>
                            <div class="controls">
                               <textarea type="text" name="textinfos"  placeholder="Court texte d'accompagnement" class="tinymce"></textarea>
                               
                            </div>
                        </div>
               
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" name="submit" name="submit">Modifier</button>
                        </div>
                        
                    </form>
                </div>
            </div>


        </div>

    
      
      
    </div>
    
</div>


<?php $content = ob_get_clean();?>
<?php require('./view/pages/admin/templateAdmin.php');?>