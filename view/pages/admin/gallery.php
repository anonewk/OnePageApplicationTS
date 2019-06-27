<?php ob_start();?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
                    <h5>Gallery</h5>
                </div>
                <div class="widget-content">
                    <ul class="thumbnails">
                        <?php while ($listPicture=$showGallery->fetch())
                    
{
    ?>
                        <li class="span2"> <a> <img src="<?php echo $listPicture['img_desc'];?>" alt=""> </a>
                            <div class="actions"> <a class="tip" href="<?php echo $listPicture['img_desc'];?>" title="Afficher"><i class="icon-search"></i></a>
                                <?php if($_SESSION['id'] == 203 OR $_SESSION['id'] == 223){
    ?>
                                <a class="tip" href="./index.php?action=delpicture&amp;id=<?php echo $listPicture['img_id']; ?> " title="Supprimer"><i class="icon-remove"></i></a><?php }?>
                                <a class="tip" href="./index.php?action=download&amp;id=<?php echo $listPicture['img_id']; ?> " title="Télécharger"><i class="icon-download-alt"></i></a> </div>
                        </li>
                        <?php 
           
}
     
        
               
     $showGallery->closeCursor();
               
        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                    <h5>Files</h5>
                </div>
                <div class="widget-content">
                    <ul class="thumbnails">
                        <?php while ($listFiles=$showFiles->fetch())
                    
{
    ?>
                        <li class="span2"> <a> <img src="<?php echo $listFiles['img_desc'];?>" alt=""> </a>
                            <div class="actions">
                                <?php if($_SESSION['id'] == 203 OR $_SESSION['id'] == 223){
    ?>

                                <a class="tip" href="./index.php?action=delfiles&amp;id=<?php echo $listFiles['img_id']; ?> " title="Supprimer"><i class="icon-remove"><?php }?></i></a><a class="tip" href="./index.php?action=download&amp;id=<?php echo $listPicture['img_id']; ?> " title="Télécharger"><i class="icon-download-alt"></i></a> </div>
                        </li>
                        <?php 
        
       
        
}

    
     $showFiles->closeCursor();
        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->
<?php $content = ob_get_clean();?>
<?php require('templateAdmin.php')?>
