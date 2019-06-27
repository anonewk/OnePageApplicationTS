<?php ob_start();?>
   
<section id="slider">
    <div id="presentation">
        <div class="row">

            <p>
                Notre <span class="blue">application web</span> vous permet de rester informé de nos activité, écoutez nos artistes ainsi que visionner des interviews sur les artistes du monde entier<span class="blue"> TS</span>
                la nouvelle expérience <span class="blue">sensorielle</span> qui rapproche les coeurs et fédère <span class="blue">plus les esprits</span>
            </p>
        </div>
    </div>
    <div class="slider-container">
        <div id="slider">
            <div id="arrows">
                <div id="leftArrow">
                    <a href="#slider-container" class="control_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                </div>
                <div id="pausebouton">
                    <i id="pause_circle" class="fas fa-pause-circle" aria-hidden="true"></i>
                </div>
                <div id="rightArrow">
                    <a href="#slider-container" class="control_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                </div>

            </div>
               
     <?php while ($lists=$showOnePicture->fetch())
                    
{
     
 
    ?>  

            <ul id="pause">
               
                <li class="slides">
                  
                    <div class="sliderText white">
                        
                        <div class="sliderTextChild">
                              
       
                            <p>
                                <?php echo $lists['textslide'];?>
                                
                            </p>
             
           </div>            
                    </div>
   
                    <img class="slide_img" src="<?php echo $lists['img_desc'];?>" alt="slide">
                </li>
       
          
             
            </ul>
                                                
    
        <?php 
                
                   
}
$showOnePicture->closeCursor(); 
             
        ?>
            <div id="backgroundProgressBar">
                <div id="progressBar"></div>
            </div>
        </div>



    </div>
</section>

<section id="ourevent">

    <div id="projets">
        <div class="ti_projets">
            <h2 id="port">NOS EVENEMENTS</h2>
            <div class="section_title_underline">
                <span class="outer-line"></span><i class="fa fa-circle fa" aria-hidden="true"></i><span class="outer-line"></span>
            </div>
        </div>
    </div>
    <div id="tabs">
        <div id="arrowsEvent">
            <div id="leftArrowEvent">
                <a href="#slider-container" class="control_prevEvent"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
            </div>

            <div id="rightArrowEvent">
                <a href="#slider-container" class="control_nextEvent"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>

        </div>
        <div class="content">
            <ul class="flex " id="flexevent">
                <?php while ($event = $Events->fetch())
                    
{
    ?>
                <li class="project">
                    <img id="img" alt="Illutration lunettes et sourcils noir sur un nez" src="<?php echo $event['img_desc'];?>" />
                    <div class="project_description">
                        <span class="eye_icon">
                            <i class="fa fa-eye fa-stack-1x" aria-hidden="true"></i>
                        </span>
                        <a href="./index.php?action=selectionevent&amp;id=<?php echo $event['img_id']?>">
                            <h3>    
                                <?php echo $event['img_nom'];?>
                            </h3>
                        </a>
                        <p>
                            <?php echo $event['img_description'];?>
                        </p>
                    </div>
                </li>

                <?php 
}
     $Events->closeCursor();
        ?>
            </ul>
        </div>

    </div>
</section>
<section class="section" id="service">
    <div id="contenue"></div>
    <div id="servicetext">
        <h2 class="noservice">Qui sommes-nous</h2>
        <div class="section_title_underline">
            <span class="outer-line"></span><i class="fa fa-circle fa" aria-hidden="true"></i><span class="outer-line"></span>
        </div>
        <p class="servicepresentation">TS, une nouvelle expérience sensorielle qui rapproche les coeurs et fédère les esprits.</p>
    </div>
    <div class="infoservices" id="infoservices">
        <div id="mainfeature">
            <img src="./public/images/cover.png" alt="mainfeature"></div>
        <div id="prensentationservices">
            <div id="infoservice1" class="infoservices">
                <span class="service_icon">
                    <i class="fas fa-calendar-alt" aria-hidden="true"></i>

                </span>
                <h3 class="titreservice">Evènements</h3>
                <p class="textservice">Turbulence Sonore est une association <strong>culturelle événementielle.</strong>

            </div>
            <div id="infoservice2" class="infoservices">
                <span class="service_icon">
                    <i class="fas fa-bus" aria-hidden="true"></i>

                </span>

                <h3 class="titreservice">Voyages</h3>
                <p class="textservice">Nos solutions sont belles, avec un <strong>design fonctionnel</strong>, qui inspire confiance
                    et qui permet à l’utilisateur de <strong>concrétiser son action</strong> simplement.</p>
            </div>
            <div class="infoservices" id="infoservice3">
                <span class="service_icon">
                    <i class="fas fa-music" aria-hidden="true"></i>

                </span>
                <h3 class="titreservice">Label</h3>
                <p class="textservice">Être <strong>présent sur les moteurs de recherche</strong> est un élément clé de toute
                    stratégie de <strong>marketing digital</strong>, profitez de notre savoir faire!</p>
            </div>
        </div>
    </div>
</section>
<section class="section" id="contact">
    <div id="conteneur_contact">
        <form action="./index.php?action=sendmail">
            <h2>Nous Contacter</h2>
            <p><span>Turbulence Sonore</span><br />Adresse<br />Tél</p>
            <input type="text" name="nom" placeholder="Nom" />
            <input type="text" name="email" placeholder="E-mail" />
            <input type="text" name="subject" placeholder="Sujet" />
            <textarea name="message" placeholder="Message"></textarea>
            <input type="submit" name="envoyer"class="bouton"/>
           
        </form>
    </div>
</section>

<?php $content = ob_get_clean();?>
<?php require('template.php')?>
