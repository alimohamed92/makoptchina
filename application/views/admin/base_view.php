<!doctype html>
<html lang="en">
  <head>
  	<title>Alhery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/sidebarStyle.css"> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.css"> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/common.css">  
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
</head>
<body>
		
    <div class="wrapper d-flex align-items-stretch">

	    <nav id="sidebar" class="active" style="background: #585858">
            <h1><a href="<?php echo site_url();?>" class="logo">A.</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="<?php echo site_url('donneur'); ?>"><span class="fa fa-home"></span> Accueil</a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/demandesEnAttentes'); ?>"><span class="fa fa-compass" data-toggle="tooltip" data-placement="top" title="Demandes en attente de confirmation"></span> Demandes</a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/demandesSuivies'); ?>"><span class="fa fa-folder"></span>Mes dossiers</a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/users'); ?>"><span class="fa fa-user-plus"></span>Users</a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/signaler'); ?>"><span class="fa fa-flag"></span>Suspects</a>
                </li>
            </ul>

    	</nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: #2a2727">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary" style="background-color: #585858">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" style="margin-right: 5px">
                            <div class="dropdown">
                                <a class="nav-link " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fa fa-user-o"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Profil</a>
                                    <a class="dropdown-item" href="<?php echo site_url('deconnexion'); ?>">
                                    Déconnexion
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item" style="margin-right: 30px">
                            <a class="nav-link" href="#" title ="À propos"> <i class="fa fa-info-circle" aria-hidden="true"></i></a>
                        </li>
                        
                    </ul>
                    </div>
                </div>
            </nav>
      
            <h2 class="mb-4"><?php echo $title ?></h2>
            
