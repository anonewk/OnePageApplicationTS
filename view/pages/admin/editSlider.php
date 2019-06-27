<?php ob_start();?>



<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6" id="sliderContent">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify" ></i> </span>
                    <h5>Modifier le slider</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="./index.php?action=modifyslide" method="post" class="form-horizontal" enctype="multipart/form-data">
                       <div class="control-group">
                            <label name="name" class="control-label">Titre de l'image</label>
                            <div class="controls">
                                <input type="text" name="name" class="span11" placeholder="Titre de l'image" />
                            </div>
                        </div>    
                        <div class="control-group">
                            <label for="textslide" class="control-label">Text slider</label>
                            <div class="controls">
                               <textarea type="text" name="textslide"  placeholder="Court texte d'accompagnement" class="tinymce"></textarea>
                               
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="fileToUpload" class="control-label">Upload image</label>
                            <div class="controls">
                               <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                               
                                <input type="file" name="fileToUpload" class="span11" />
                                 </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="submit" name="submit">Modifier</button>
                        </div>
                        
                    </form>
                </div>
            </div>


        </div>

    
      
      
    </div>
    
</div>


<?php $content = ob_get_clean();?>
<?php require('./view/pages/admin/templateAdmin.php');?>