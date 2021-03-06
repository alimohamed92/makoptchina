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
    <!--video autoplay muted loop id="myVideo">
        <source src="<?php echo base_url() ?>assets/images/alhery.mp4" type="video/mp4">
    </video-->
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
                            </br> <a href="mailto: contact@alhery.com" class="text-primary">contact@alhery.com</a>
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
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">Dossiers traités</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo $demandes->total > 0 ? $demandes->total : 0;?></div>
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
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="text-align: center;"><?php echo $dons->total > 0 ? $dons->total : 0;?></div>
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
                    <h2 class="section-heading text-uppercase green">Comment ça marche ? <a style="color: #0b6868" href = "<?php echo site_url('welcome/file').'?url=./data/FAQ.pdf'?>"><i class="fas fa-download"></i></a></h2>
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
                        <a class="btn btn-orange btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-orange btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-orange btn-social mx-2 " href="mailto: contact@alhery.com"><i class="far fa-envelope"></i></a>
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
     <b> 1. Généralités </b> </br></br>
Alhery attache une grande importance à la protection et au respect de votre vie privée. La présente politique vise à vous informer de nos pratiques concernant la collecte, l’utilisation et le partage des informations que vous êtes amenés à nous fournir par le biais de notre plateforme accessible depuis le site internet https://www.alhery.com/.

    </br></br><b> 2. Les informations que nous recueillons </b> </br>
Nous sommes susceptibles de recueillir et de traiter les données suivantes : numéro de téléphone, mot de passe et quartier de résidence. Ces informations sont obligatoires. À défaut, Alhery ne sera pas en mesure de vous fournir les services proposés par sur la plateforme et vous ne serez pas autorisés à créer de compte sur cette dernière.
Nous pouvons également être amenés à recueillir dans certains cas les données suivantes :
<ul>
    <li>	Le détail de vos visites sur la Plateforme et des contenus auxquels vous avez accédé ;</li>
    <li>	Les données que nous pouvons vous demander de fournir lorsque vous nous signalez un problème relatif à notre Plateforme ou à nos services, comme par exemple l’objet de votre demande d’assistance ;</li>
    <li>	Les données que nous recueillons automatiquement</li>
</ul>
Les Données Personnelles telles que votre numéro de téléphone sont automatiquement désactivées après clôture de votre compte. Les données utilisées pour des raisons statistiques (telles que la nature des aides) sont cependant archivées, sauf si vous en demandiez la suppression.

</br></br><b> 3-a. Utilisation des données que nous recueillons </b> </br>
Nous utilisons les données que nous recueillons afin de :
<ul>
    <li> Vous fournir les informations et services demandés ;</li>
    <li> Vous permettre de communiquer et d’échanger avec les autres membres : donneur, récipiendaires ou ambassadeur ; </li>
    <li> Vous informer des modifications apportées à nos services ;</li>
    <li> Améliorer et optimiser notre Plateforme, notamment pour nous assurer de ce que l’affichage de nos contenus est adapté à votre appareil ;</li>
    <li> Les données collectées ne sont pas utilisées à des fins commerciales ! </b> </li>
</ul>
</br><b> 3-b. Visibilité des données </b> </br>
<ul>
    <li> Les données (numéro de téléphone, quartier…) des <b>demandeurs</b> sont uniquement visibles aux donneurs et ambassadeurs afin qu’ils puissent être contactés et bénéficier des aides souhaitées.</li>
    <li> Les données (numéro de téléphone, quartier…) des <b> donneurs</b>  restent <b> invisibles</b> aux demandeurs.</li>
</ul>


</br><b> 4. Vos droits sur vos données personnelles </b> </br>
Vous disposez du droit de recevoir une copie, de demander la modification ou la suppression de vos Données Personnelles en notre possession (« droit d’accès » et (« droit d’effacement et droit de rectification »). 

</br></br><b> 5. Confidentialité de votre mot de passe</b> </br>
Vous êtes responsable de la confidentialité du mot de passe que vous avez choisi pour accéder à votre compte sur Alhery. Vous vous engagez à conserver ce mot de passe secret et à ne le communiquer à personne.</br>

</br><b> 6. Liens vers d’autres sites internet et réseaux sociaux </b> </br>
Notre Plateforme peut contenir des liens vers nos pages sur les réseaux sociaux. Veuillez noter que ces sites internet ont leur propre politique de confidentialité et que nous déclinons toute responsabilité quant à l’utilisation faite par ces sites des informations collectées lorsque vous cliquez sur ces liens. Nous vous invitons à prendre connaissance de politiques de confidentialité de ces sites avant de leur transmettre vos Données Personnelles.

</br></br><b> 7. Modification de notre politique de confidentialité </b> </br>
Nous pouvons être amenés à modifier occasionnellement la présente politique de confidentialité. Lorsque cela est nécessaire, nous vous en informerons et/ou solliciterons votre accord. Nous vous conseillons de consulter régulièrement cette page pour prendre connaissance des éventuelles modifications ou mises à jour apportées à notre politique de confidentialité.

</br></br><b> 8. Nous contacter </b> </br>
Pour toute question relative à la présente politique de confidentialité ou pour toute demande relative à vos données personnelles, vous pouvez nous contacter en
adressant un email à l’adresse <a href ="mailto: contact@alhery.com">contact@alhery.com</a>



</br></br><i> Version mise à jour le 28 juin 2020 </i> 

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