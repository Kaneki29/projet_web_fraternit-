<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Article','root','');

}
 catch (\Throwable $th) {
        echo'database error';
}   if (isset($_POST['Envoyer'])) {
    echo"no problem";
}
        if (isset($_POST['article_titre'], $_POST['article_contenu'],$_POST['article_auteur'], )) {

            echo $_POST;
            if (!empty($_POST['article_titre']) AND !empty($_POST['article_contenu']) AND !empty($_POST['article_auteur']) ) {
                $article_titre = strip_tags(htmlspecialchars($_POST['article_titre']));
                $article_contenu = strip_tags(htmlspecialchars($_POST['article_contenu']));
                $article_auteur = strip_tags(htmlspecialchars($_POST['article_auteur']));
                print_r($_FILES['article_fichier']);
                $content_dir='img/';
                $tmp_dir=$_FILES['article_fichier']['tmp_name'];

                #__Verification existence du fichier__#

                if (!is_uploaded_file($tmp_dir)) {
                   exit('le fichier est introuvable');
                }
                echo" usze";
                #__Verification extension de fichier__#
                
                $type_file =$_FILES['article_fichier']['type'];
                if (!strstr($type_file,'jpeg') && !strstr($type_file,'png')) {
                    exit("ce fichier n'est pas une image");
                }

                $name_file = time().'.jpg';
                if (!move_uploaded_file($tmp_dir,$content_dir.$name_file)) {
                    exit('Impossible de copier le fichier');
                }
                $insert = $bdd->prepare('INSERT INTO article ');

            } else {
                $erreur ='Veuillez remplir tous les champs';
                echo"hiiii";
                }
            }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fraternité Plus la redac</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid nav-bar p-0">
        <div class="container-lg p-0">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand">
                    <h3 class="m-0 text-white display-4">Fraternité <span class="text-primary">Plus</span></h3>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="redaction.php" class="nav-item nav-link active">Ajout article</a>
                        <a href="sup.php" class="nav-item nav-link">Supprimer article</a>
                        <a href="Article.php" class="nav-item nav-link">Article</a>
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="blog.html" class="dropdown-item">Blog Grid</a>
                                <a href="single.html" class="dropdown-item">Blog Detail</a>
                            </div>
                        </div> -->
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
        <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Administration </h1>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="../index.html">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">La Redaction</p>
        </div>
    </div>
    <!-- Page Header Start -->

     <!-- Page redaction Start -->
     <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center">
                <small class="bg-primary text-white text-uppercase font-weight-bold text-center px-1">Quoi de neuf aujord'hui</small>
                <h1 class="mt-2 mb-5">Parlons-en</h1>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="d-flex align-items-center border mb-3 p-4">
                        <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="font-weight-bold">Notre Agence</h5>
                            <p class="m-0">Gbècon-Hounli, Abomey, Benin</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border mb-3 p-4">
                        <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="font-weight-bold">Notre Email</h5>
                            <p class="m-0">fraterniteplus2@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border mb-3 mb-md-0 p-4">
                        <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h5 class="font-weight-bold">Appelez-nous</h5>
                            <p class="m-0">+229 97-56-48-36 | +229 98-11-55-11</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form method= "POST" action="" enctype="multipart/form-data" >
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="text" class="form-control p-4" name="article_auteur" placeholder="Auteur" required="required" data-validation-required-message="Vous-etes prié d'entrer l'auteur" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" name="article_title" placeholder="Titre" required="required" data-validation-required-message="Prière d'entrer un titre" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="5" id="message" name="article_contenu" placeholder="Contenu" required="required" data-validation-required-message="Vous-etes prié d'entrer message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="file"  name="article_fichier"   required="required" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <input type="submit" value=Envoyer />
                    <!--            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"  type="Submit" value="envoyer l'article">Poster</button>-->
                           </div>
                        </form>
                             <br>
                </div>
                </div>
            </div>
        </div>
    </div>
                <?php if (isset($erreur)) {
                   echo $erreur;
                }
?>
   


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 pt-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h3 class="m-0 text-white display-4">Fraternité <span class="text-primary">Plus</span></h3>
                </a>
                <p>Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://m.facebook.com/fraterniteplus1/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="font-weight-bold text-primary mb-4">Quick Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="index.html"><i class="fa fa-angle-right text-primary mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="about.html"><i class="fa fa-angle-right text-primary mr-2"></i>About Us</a>
                    <a class="text-white" href="contact.html"><i class="fa fa-angle-right text-primary mr-2"></i>Contact Us</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="font-weight-bold text-primary mb-4">Get In Touch</h5>
                <p>Une équipe a votre ecoute faisant du social notre fer de lance</p>
                <p><i class="fa fa-map-marker-alt text-primary mr-2"></i>Gbècon-Hounli, Abomey, Benin</p>
                <p><i class="fa fa-phone-alt text-primary mr-2"></i>+ 229 97 56 48 36 / 65 62 91 32</p>
                <p><i class="fa fa-envelope text-primary mr-2"></i>fraterniteplus2@gmail.com</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-semi-bold" href="#">Fraternité Plus</a>. All Rights Reserved. Designed by
            <a class="font-weight-semi-bold" href="https://htmlcodex.com">Kaneki29</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
   

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>