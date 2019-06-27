<?php ob_start();?>
   
        <section class="section">
         
            <div id="containevent">
                <div id="img">
                 <img  alt="pictureEvent" src="<?php echo $pickOneEvent['img_desc'];?>" />
            </div >

                    <div id="eventSideDeco">
                        <article id="eventText">
                        <div id="eventTitre">
                            <h2>
                                <?php echo ($pickOneEvent['titre_event']);?>
                            </h2>
                            </div>
                            <div id="eventDescription">
                            <p>
                                <?php echo($pickOneEvent['text_event'])?>
                            </p>
                            <p>
                                 <?php echo($pickOneEvent['date_event'])?>
                            </p>
                            </div>
                       

                        </article>



                    </div>
            
            </div>

        </section>

<?php $content = ob_get_clean();?>
<?php require('template.php')?>
