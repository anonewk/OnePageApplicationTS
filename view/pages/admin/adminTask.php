<?php ob_start()?>





<div class="row-fluid">
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
        <h5>Tâches</h5>
    </div>
    <?php while ($tasks = $allTask-> fetch()){
    
?>
    <div class="widget-content">
        <div class="todo">
            <ul>
                <li class="clearfix">
                    <div class="txt"> <?php echo $tasks['task'];?> <span class="date badge badge-info"><?php echo $tasks['date_limite'];?></span> <span class="by label"><?php echo $tasks['pseudo'];?></span></div>
                        <?php if($_SESSION['id'] == 203){
    ?>
                    <div class="pull-right">  <a class="tip" href="./index.php?action=deltask&amp;id=<?php echo  $tasks['id']; ?> " title="Delete"><i class="icon-remove"></i></a> </div><?php }?>
                </li>
            </ul>
        </div>
    </div>
        <?php
    }
    $allTask->closeCursor();
?>
</div>
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Ajouter une tâche</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="./index.php?action=addTask" method="post" class="form-horizontal">
                <div class="control-group">
                    <label name="task" class="control-label">Tâches</label>
                    <div class="controls">
                        <input type="text" name="task" class="span11" placeholder="Tâche à remplir" />
                    </div>
                </div>
                <div class="control-group">
                    <label name="limitdate" class="control-label">Date limite</label>
                    <div class="controls">
                        <input type="date" name="limitdate" class="span11" placeholder="<Date></Date> limite" />
                    </div>
                </div>
               
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-success" value="validertask" name="validertask">Ajouter</button>
                </div>
            </form>
        </div>
    </div>



</div>






<?php $content = ob_get_clean();?>
<?php require('templateAdmin.php');?>
