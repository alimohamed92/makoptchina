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
        <img src="<?php echo base_url() ?>assets/images/logo-alhery.png"/>
        <a href ="<?php echo site_url('auth'); ?>" class="btn btn-primary btn-xl" type="button"><?php if($this->session->userdata('log_user')==true) { echo 'Mon espace';} else { echo 'Connexion'; }?> <i class="fas fa-sign-in-alt"></i></a>
    </div>
</nav>
		
<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Alhery</div>
        <div class="masthead-subheading" style="margin-bottom: 115px;">
                    Aidons les couches vulnérables de notre société !
        </div>
        <a class="btn btn-primary btn-xl  js-scroll-trigger mobil-btn" href ="<?php echo site_url('auth/inscriptDon'); ?>">Je veux aider <i class="fas fa-hands-helping"></i></a>
		<a class="btn btn-primary btn-xl  js-scroll-trigger mobil-btn"   href ="<?php echo site_url('auth/inscriptDemande'); ?>" style="margin-left: 5px;">J'ai Besoin d'aide <i class="fas fa-hand-holding"></i></a>
            
    </div>
</header>
       
       <!-- Qui sommes nous-->
<section class="page-section" id="services">
            <div class="container">
                <div class="text-center" style="margin-bottom: 45px">
                    <h2 class="section-heading text-uppercase green">Qui sommes nous ?</h2>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <p class="large text-muted">
                            Née d’un collectif de Nigériens vivant au Niger et à l’extérieur, <b>Alhery</b> est une plateforme d’entraide qui permet de mettre en relation une personne qui veut aider avec une autre qui est dans le besoin, et cela <b>en toute discrétion !</b>
                            </br> <a href="#" class="text-primary">contact@ahery.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
 
<!-- Stat-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center" style="margin-bottom: 45px">
                    <h2 class="section-heading text-uppercase green" >Actuellement nous avons</h2>
                </div>
                <div class="row">

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary  shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">Donneurs</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo count($donneurs);?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-users fa-2x green"></i>
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
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">Demandeurs</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo count($demandeurs);?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fas fa-users fa-2x green "></i>
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
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">Dossiers créés</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo $demandes->total;?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="fa fa-folder-open fa-2x green"></i>
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
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">Dons effectués</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo $dons->total;?></div>
                                    </div>
                                    <div class="col-auto">
                                    <i class="far fa-handshake fa-2x green"></i>
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


		<!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center" style="margin-bottom: 45px">
                    <h2 class="section-heading text-uppercase green">Comment ça marche ? <i class="fas fa-download"></i></h2>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-user-cog fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3 text-primary" style="margin-top: 0px !important;" >Ambassadeur </h4>
                        <p class="text-muted">
                            <ol style="text-align: left;">
                                <li><b>Vous êtes</b> habitant de quartier, médecin, humanitaire, association...</li>
                                <li><b>Vous êtes</b> au contact de personnes dans le besoin.</li>
                                <li><b>Demander des accès </b> à Alhery afin d’inscrire des personnes.</li>
                            </ol>
                        </p>
                       
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-hands-helping fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3 text-primary" style="margin-top: 0px !important;">Donneur</h4>
                        <p class="text-muted">
                            <ol style="text-align: left;">
                                <li><b> Vous êtes </b> un paisible citoyen, une entreprise, ONG...</li>
                                <li><b>Vous êtes </b> au Niger ou à l’extérieur.</li>
                                <li><b>Vous souhaitez </b> porter assistance à des personnes vulnérables.</li>
                                <li><b>Connectez-vous </b> (ou inscrivez-vous) pour voir la liste de personnes dans le besoin.</li>
                            </ol>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i class="fas fa-hand-paper fa-stack-1x fa-inverse"></i></span>
                        <h4 class="my-3 text-primary" style="margin-top: 0px !important;">Demandeur</h4>
                        <p class="text-muted">
                            <ol style="text-align: left;">
                                <li><b> Vous êtes </b> en capacité d’enregistrer votre demande en tout autonomie</li>
                                <li><b> Vous ne pouvez pas </b> le faire vous-même ? demander assistance à toute personne autour de vous</li>
                                <li><b> Connectez-vous </b> et enregistrer la demande d’aide en toute simplicité</li>
                                <li><b>Un donneur </b> verra votre demande et vous contactera <b>en toute discression</b></li>
                            </ol>
                        </p>
					</div>
                </div>
            </div>
        </section>

        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left text-primary">Copyright © Alhery 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-orange btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-orange btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-orange btn-social mx-2 " href="mailto: contact@ahery.com"><i class="far fa-envelope"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right"><a class="mr-3 text-primary" href="#" data-toggle="modal" data-target="#exampleModalScrollable">Notre politique de confidentialité</a></div>
                </div>
            </div>
        </footer>

        <!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Information de confidentialité</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

		<!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
       <!-- Core theme JS-->
	   <script src="<?php echo base_url() ?>assets/js/acceuil.js"></script>
</body>
</html>