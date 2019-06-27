<?php ob_start();?>

<!--Action boxes-->
<div class="container-fluid">
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
           <?php if($_SESSION['id'] == 203 OR $_SESSION['id'] == 223){
    ?>

            <li class="bg_lb"> <a href="./index.php?action=admintool"> <i class="icon-th-list"></i> <span class="label label-important"></span>Outil d'admin</a> </li>
            <?php }?>
            <li class="bg_lo"> <a href="./index.php?action=gallerypicture"> <i class="icon-picture"></i> Gallery</a> </li>
            <li class="bg_ls"> <a href="./index.php?action=task"> <i class="icon-ok"></i>Tâches</a> </li>
                  <?php if($_SESSION['id'] == 222 OR $_SESSION['id'] == 245  OR $_SESSION['id'] == 203){
    ?>    

            <li class="bg_lg"> <a href="./index.php?action=event"> <i class="icon-calendar"></i> Evenements</a> </li>
           
            
            <li class="bg_ly"> <a href="./index.php?action=slidertool"> <i class="icon-inbox"></i> Outil </a> </li>
 <?php }?>

        </ul>
    </div>
    <!--End-Action boxes-->

   
    
    
    <div class="row-fluid">
       <!--TASK-->
        <div class="span6">

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
                    <h5>Tâches</h5>
                </div>
                <div class="widget-content">
                    <div class="todo">
                        <ul>
                           <?php while($taskList = $allTask->fetch()){?>
                            <li class="clearfix">
                                <div class="txt"> <?php echo $taskList['task'];?><span class="date badge badge-info"><?php echo $taskList['date_limite'];?></span><span class="by label"><?php echo $_SESSION['pseudo'];?></span></div>
                                
                            </li>
<?php } $allTask->closeCursor();?>
                        </ul>
                    </div>
                </div>
            </div>



        </div>
        <!-- END TASK-->
        
        <!--TEAM-->
        <div class="span6">
        
            <div class="widget-box">
                <div class="widget-title"><span class="icon"><i class="icon-user"></i></span>
                    <h5>Membres de l'équipes</h5>
                </div>
                <div class="widget-content nopadding fix_hgt">
                    <ul class="recent-posts">
                    <?php while ($userList = $infosUser->fetch()){
    
?>
                        <li>
                           <a href="./index.php?action=userinfos&amp;id=<?php  echo $userList['id'];?>">
                            <div class="user-thumb"> <img width="40" height="40" alt="User" src="./public/images/demo/av4.jpg"> </div>
                            <div class="article-post"> <span class="user-info"><?php  echo $userList['firstname']; $userList['lastname'];?></span>
                                <p><?php echo $userList['poste'];?></p>
                            </div>
                            </a>
                        </li>
                        <?php } 
                        $infosUser->closeCursor();?>
                    </ul>
                </div>
            </div>



        </div>
        <!--END TEAM-->
    </div>
</div>

<!--end-main-container-part-->

<?php $content = ob_get_clean();?>
<?php require('templateAdmin.php')?>
