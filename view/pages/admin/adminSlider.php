<?php ob_start();?>



<div class="row-fluid">
   

    
      
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Slider</h5>
          </div>
          <div class="widget-content">
           <?php while($listPicture = $showOnePicture->fetch()){
    
?>
           
            <ul class="thumbnails">
         
              <li class="span2">
                 
                  <a> <img src="<?php echo $listPicture['img_desc'];?>" alt="" > </a>
              
                <div class="actions"> <?php if($_SESSION['id'] == 203 OR $_SESSION['id'] == 222){?>
    <a title="Modifer" id="" href="./index.php?action=modifyslide&amp;id=<?php echo $listPicture['img_id'];?>"><i class="icon-pencil" id="iconpencil"></i></a> <?php }?><a class="lightbox_trigger" href="<?php echo $listPicture['img_desc'];?>"><i class="icon-search"></i></a>
                   </div>
                 
                </li>
             <p class="textslide"><?php echo $listPicture['textslide'];?></p>
            </ul>
            <?php 
}
              $showOnePicture->closeCursor();?>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Qui sommes-nous?</h5>
          </div>
          <div class="widget-content">
           <?php while($listinfos = $showOneInfos->fetch()){
    
?>
           
            <ul class="thumbnails">
         
              <li class="span2">
                 
                   <p class="textslide"><?php echo $listinfos['titre'];?></p>
              
                <div class="actions"> <?php if($_SESSION['id'] == 203 OR $_SESSION['id'] == 222){?>
    <a title="Modifer" id="" href="./index.php?action=modifyinfos&amp;id=<?php echo $listinfos['id'];?>"><i class="icon-pencil" id="iconpencil"></i></a> <?php }?>
                   </div>
                 
                </li>
             <p class="textslide"><?php echo $listinfos['textinfos'];?></p>
            
            </ul>
            <?php 
}
              $showOneInfos->closeCursor();?>
          </div>
        </div>
      </div>
    </div>
 
<?php $content = ob_get_clean();?>
<?php require('./view/pages/admin/templateAdmin.php');?>