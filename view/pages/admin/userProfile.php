<?php ob_start();?>



<!--Action boxes-->
  <div class="container-fluid">
<!--End-Action boxes-->    
<?php while($infos= $infosProfile->fetch()){
    

      
      
      ?>
    <hr/>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-user"></i></span>
            <h5>Profile</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
                <li class="clearfix">
                  <div class="txt"> Nom : <span class="by label"><?php if(isset($_SESSION['id'])){echo $infos['lastname'];}; 
                      ?></span></div>
                  
                </li>
                <li class="clearfix">
                  <div class="txt">Prénom :  <span class="date badge badge-warning"><?php if(isset($_SESSION['id'])){echo $infos['firstname'];}; 
                      ?></span> </div>
                  
                </li>
                <li class="clearfix">
                  <div class="txt">Pseudo : <span class="by label"><?php if(isset($_SESSION['id'])){echo $infos['pseudo'];}; 
                      ?></span></div>
               
                </li>
                <li class="clearfix">
                  <div class="txt">Email : <span class="date badge badge-info"><?php if(isset($_SESSION['id'])){echo $infos['mail'];}; 
                      ?></span> </div>
       
                </li>
                <li class="clearfix">
                  <div class="txt">Fonction : <span class="date badge badge-important"><?php if(isset($_SESSION['id'])){echo $infos['poste'];}; 
                      ?></span> </div>
       
                </li>
              </ul>
            </div>
          </div>
        </div>
       
        </div>
      </div>
    </div>
  
<?php }
      $infosProfile->closeCursor();?>
<!--end-main-container-part-->


<?php $content = ob_get_clean();?>
<?php require('templateAdmin.php')?>