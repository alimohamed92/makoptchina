<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<title>Alhery</title>

	<!-- <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/css/img/favicon.ico" /> -->
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
	
	
	<link rel="stylesheet" href = "<?php echo base_url(); ?>assets/css/acceuil.css">  
    </head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <img src="<?php echo base_url() ?>assets/images/logo-makoptchi-na-.png" WIDTH=180 HEIGHT=90/>
               </a><button class="btn btn-primary" type="button">Connexion</button>
                </div>
            </div>
		</nav>
		
		<header class="masthead">
            <div class="container">
                <div class="masthead-heading text-uppercase">Face à l'épidemie du COVID-19</div>
                <div class="masthead-subheading">Le gouvernement appelle à la mobilisation de tous</div>
                <a class="btn btn-primary btn-xl  js-scroll-trigger" href="#services">Je veux aider</a>
				<a class="btn btn-primary btn-xl  js-scroll-trigger" href="#services" style="margin-left: 5px;">Besoin d'aide ?</a>
            
			</div>
        </header>
        
<!-- Stat-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Actuellement nous avons</h2>
                </div>
                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Donneurs inscrits</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo count($donneurs);?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-users fa-2x "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Demandeurs</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo count($demandeurs);?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-users fa-2x "></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dossiers créés</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo $demandes->total;?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fa fa-folder-open fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Dons effectués</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo count($dons);?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="far fa-handshake fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
                
</div>    
            </div>
        </section>

<!-- Qui sommes nous-->
<section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Qui sommes nous</h2>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>



		<!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Conctact</h2>
                    <h3 class="section-subheading text-muted">B3 Multimedia today</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3">Adresse </h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-laptop fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3">Telephone</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-lock fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3">E-mail</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
					</div>
                </div>
            </div>
        </section>

        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Alhery 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right"><a class="mr-3" href="#!">Privacy Policy</a><a href="#!">Terms of Use</a></div>
                </div>
            </div>
        </footer>

		<!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
       <!-- Core theme JS-->
	   <script src="<?php echo base_url() ?>assets/js/acceuil.js"></script>
</body>
</html>