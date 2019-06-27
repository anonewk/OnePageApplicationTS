<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">

    <meta name="description" content="Découvrez Turbulence Sonore, la nouvelle expérience sensorielle qui rapproche les coeurs et fédère les esprits.">

    <meta name="keywords" content="Turbulence Sonore, Lyon, evenementiel, electronique, voyage, label " />
    <!--Meta Facebook-->
    <meta property="og:title" content="Turbulence Sonore - TS" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="turbulencesonore.com/">
    <meta property="og:image" content="images/" />
    <meta property="og:description" content="Découvrez Turbulence Sonore, la nouvelle expérience sensorielle qui rapproche les coeurs et fédère les esprits." />
    <meta property="og:site_name" content="Turbulence Sonore" />
    <meta property="fb:admins" content="Facebook numeric ID" />




    <!--    STYLE-->

    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/fullcalendar.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/matrix-style.css" />
    <link rel="stylesheet" type="text/css" href="./public/css/matrix-media.css" />
    <link href="./public/fonts/adminFont-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="./public/css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



    <!--POLICES-->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:500" rel="stylesheet">

    <!--FontAWESOME -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!--    SCRIPT-->
    
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/solid.js" integrity="sha384-6FXzJ8R8IC4v/SKPI8oOcRrUkJU8uvFK6YJ4eDY11bJQz4lRw5/wGthflEOX8hjL" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/regular.js" integrity="sha384-Gxfqh68NuE4s0o2renzieYkDYVbdJynynsdrB7UG9yEvgpS9TVM+c4bknWfQXUBg" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/brands.js" integrity="sha384-zJ8/qgGmKwL+kr/xmGA6s1oXK63ah5/1rHuILmZ44sO2Bbq1V3p3eRTkuGcivyhD" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/fontawesome.js" integrity="sha384-xl26xwG2NVtJDw2/96Lmg09++ZjrXPc89j0j7JHjLOdSwHDHPHiucUjfllW0Ywrq" crossorigin="anonymous"></script>


    <script type="text/javascript" src="./public/js/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: '250px'
        });

    </script>
    
    <title>TS admin</title>
</head>

<body>
    <!--Header-part-->

    <header>
        <div id="header">
            <img src="./public/images/admints2.png" alt="imgadmin" style="width: 250px;">
            <h1><a href="dashboard.php">TS admin</a></h1>

        </div>
        <!--close-Header-part-->


        <!--top-Header-menu-->
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
                <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i> <span class="text">Bienvenue <?php if(isset($_SESSION['pseudo'])){echo $_SESSION['pseudo'];}?></span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="./index.php?action=profile"><i class="icon-user"></i> Mon profile</a></li>
                        <li class="divider"></li>
                        <li><a href="./index.php?action=task"><i class="icon-check"></i>Mes tâches</a></li>
                        <li class="divider"></li>
                        <li><a href="./index.php?action=logOut"><i class="icon-key"></i>Déconnexion</a></li>
                    </ul>
                </li>
                <li class=""><a title="" href="./index.php?action=logOut"><i class="icon icon-share-alt"></i> <span class="text">Déconnexion</span></a></li>
            </ul>
        </div>
        <!--close-top-Header-menu-->

    </header>
    <!--sidebar-menu-->
    <div id="sidebar"><a href="" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
        <ul>
            <li><a href="./index.php?action=home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
               <?php if($_SESSION['id'] == 203 OR $_SESSION['id'] == 223){
    ?>

         

            <li> <a href="./index.php?action=admintool"><i class="icon icon-th-list"></i> <span>Outils admin</span></a><?php }?>    
            </li>
            <li ><a href="./index.php?action=task"><i class="icon-ok"></i> <span>Tâches</span></a></li>
            <li> <a href="./index.php?action=gallerypicture"><i class="icon icon-picture"></i> <span>Gallery</span></a> </li>
                  <?php if($_SESSION['id'] == 222 OR $_SESSION['id'] == 245  OR $_SESSION['id'] == 203){
    ?>
 
            <li> <a href="./index.php?action=event"><i class="icon icon-calendar"></i> <span>Evenements</span></a> </li>
            <li> <a href="./index.php?action=slidertool"><i class="icon icon-inbox"></i> <span>Outil</span></a> </li>
            <?php }?>
        </ul>
    </div>
    <!--sidebar-menu-->

    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="./index.php?action=home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Accueil</a></div>
        </div>
        
        <!--End-breadcrumbs-->



        <?php echo $content;?>
        <!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2019 &copy; <a href="http://facebook.com/turbulencesonore" target="_blank" >Turbulence Sonore</a> </div>
</div>
<!--end-Footer-part--> 
    </div>
        <script src="./public/js/adminJs/excanvas.min.js"></script>
        <script src="./public/js/adminJs/jquery.min.js"></script>
        <script src="./public/js/adminJs/jquery.ui.custom.js"></script>
        <script src="./public/js/adminJs/bootstrap.min.js"></script>
        <script src="./public/js/adminJs/jquery.flot.min.js"></script>
        <script src="./public/js/adminJs/jquery.flot.resize.min.js"></script>
        <script src="./public/js/adminJs/jquery.peity.min.js"></script>
        <script src="./public/js/adminJs/fullcalendar.min.js"></script>
        <script src="./public/js/adminJs/matrix.js"></script>
        <script src="./public/js/adminJs/matrix.dashboard.js"></script>
        <script src="./public/js/adminJs/jquery.gritter.min.js"></script>
        <script src="./public/js/adminJs/matrix.interface.js"></script>
        <script src="./public/js/adminJs/matrix.chat.js"></script>
        <script src="./public/js/adminJs/jquery.validate.js"></script>
        <script src="./public/js/adminJs/matrix.form_validation.js"></script>
        <script src="./public/js/adminJs/jquery.wizard.js"></script>
        <script src="./public/js/adminJs/jquery.uniform.js"></script>
        <script src="./public/js/adminJs/select2.min.js"></script>
        <script src="./public/js/adminJs/matrix.popover.js"></script>
        <script src="./public/js/adminJs/jquery.dataTables.min.js"></script>
        <script src="./public/js/adminJs/matrix.tables.js"></script>
        <link href='./public/js/packages/core/main.css' rel='stylesheet' />
<link href='./public/js/packages//daygrid/main.css' rel='stylesheet' />
<link href='./public/js/packages//timegrid/main.css' rel='stylesheet' />
<link href='./public/js/packages//list/main.css' rel='stylesheet' />
<script src='./public/js/packages//core/main.js'></script>
<script src='./public/js/packages//core/locales-all.js'></script>
<script src='./public/js/packages//interaction/main.js'></script>
<script src='./public/js/packages//daygrid/main.js'></script>
<script src='./public/js/packages/timegrid/main.js'></script>
<script src='./public/js/packages/list/main.js'></script>


        <script type="text/javascript">
            // This function is called from the pop-up menus to transfer to
            // a different page. Ignore if the value returned is a null string:
            function goPage(newURL) {

                // if url is empty, skip the menu dividers and reset the menu selection to default
                if (newURL != "") {

                    // if url is "-", it is this page -- reset the menu:
                    if (newURL == "-") {
                        resetMenu();
                    }
                    // else, send page to designated URL            
                    else {
                        document.location.href = newURL;
                    }
                }
            }

            // resets the menu selection upon entry to this page:
            function resetMenu() {
                document.gomenu.selector.selectedIndex = 2;
            }

        </script>
        
</body>

</html>
