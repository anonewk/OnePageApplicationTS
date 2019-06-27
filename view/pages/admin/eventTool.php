<?php ob_start();?>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify" ></i> </span>
                    <h5>Ajouter un évenment</h5>
                </div>
                <div class="widget-content nopadding">
                    <form action="./index.php?action=eventTool" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="control-group">
                            <label name="eventtitre" class="control-label">Titre de l'évenement</label>
                            <div class="controls">
                                <input type="text" name="eventtitre" class="span11" placeholder="Titre de l'evenement" />
                                
                            </div>
                        </div>
                        <div class="control-group">
                            <label name="eventdescription" class="control-label">Description de l'evenement</label>
                            <div class="controls">

                                <textarea type="text" name="eventdescription"  placeholder="Description" class="tinymce"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label name="eventdate" class="control-label">Date de l'evenement</label>
                            <div class="controls">
                                <input type="date" name="eventdate" class="span11" placeholder="Date de l'evenement" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label name="name" class="control-label">Titre de l'image</label>
                            <div class="controls">
                                <input type="text" name="name" class="span11" placeholder="Titre de l'image" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="img_description" class="control-label">Description de l'imge</label>
                            <div class="controls">
                                <input type="text" name="img_description" class="span11" placeholder="Courte description" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label name="fichier" class="control-label">Upload image</label>
                            <div class="controls">
                               <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
                               
                                <input type="file" name="fichier" class="span11" />
                                 </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="submit" name="submit">Ajouter</button>
                        </div>
                        
                    </form>
                </div>
            </div>

    
        </div>
          <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-calendar"></i> </span>
            <h5>Evènement en cours</h5>
          </div>
          <div class="widget-content">
           <?php while($event = $Events->fetch()){
    
?>
           
            <ul class="thumbnails">
         
              <li class="span2">
                 
                  <a> <img src="<?php echo $event['img_desc'];?>" alt="" > </a>
                      <?php if($_SESSION['id'] == 203 OR $_SESSION['id'] == 222){
    ?>
                <div class="actions"> <a title="" id="" href="./index.php?action=delevent&amp;id=<?php echo $event['img_id'];?>"><i class="icon-remove" id="icon-remove" title="Supprimer"></i></a>
                   </div>
                 <?php }?>
                </li>
             <p class="textslide"><?php echo $event['text_event'];?></p>
            </ul>
            <?php 
}
              $Events->closeCursor();?>
          </div>
        </div>
      </div>

    </div>
</div>

<?php $content = ob_get_clean();?>
<?php  require('templateAdmin.php');?>
