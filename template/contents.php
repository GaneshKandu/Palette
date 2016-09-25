<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
	<base href="<?php echo  URL.'/'; ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style."/>
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development"/>
    <meta name="author" content="Ganesh Kandu"/>
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <title><?php echo  $tpl['title'] ?></title>
    <link href="css/metro.css" rel="stylesheet"/>
    <link href="<?php echo URL; ?>/language" rel="stylesheet"/>
    <link href="css/metro-icon.css" rel="stylesheet"/>
    <link href="css/metro-responsive.css" rel="stylesheet"/>
	<link href="css/dropzone.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/metro.js"></script>
    <style>
        html, body {
			
        }
        body {
        }
		#cell-content{
			min-height: 700px;
		}
        .page-content {
            padding-top: 3.125rem;	
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
		#tbl_createfile{
			font-size: 20px;
			line-height: 25px;
		}
    </style>
</head>
<body class="bg-steel" style="min-height: 100%" >
    <div class="app-bar fixed-top darcula" data-role="appbar">
        <a class="app-bar-element branding" href="<?php echo  URL.'/'; ?>" ><?php echo $tpl['lang']['Palette']; ?></a>
        <span class="app-bar-divider"></span>
        <ul class="app-bar-menu">
            <li><a href="<?php echo  URL.'/dashboard'; ?>"><?php echo $tpl['lang']['Dashboard']; ?></a></li>
			<?php if(MULTISITE){ ?>
            <li>
                <a href="" class="dropdown-toggle"><?php echo $tpl['lang']['Project']; ?></a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="<?php echo  URL; ?>/projects/newproject"><?php echo $tpl['lang']['New']." ".$tpl['lang']['Project']; ?></a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="" class="dropdown-toggle"><?php echo $tpl['lang']['Open']; ?></a>
                        <ul class="d-menu" data-role="dropdown">
						<?php 
							foreach($tpl['projects'] as $project){
                            ?><li><a href="<?php echo URL.'/projects/files/'.$project; ?>"><?php echo $project; ?></a></li><?php
							}
						?>
                        </ul>
                    </li>
                </ul>
            </li>
			<?php } ?>
            <li>
                <a href="" class="dropdown-toggle"><?php echo $tpl['lang']['Help']; ?></a>
                <ul class="d-menu" data-role="dropdown">
                    <li><a href="<?php echo  URL.'/'; ?>dashboard/about"><?php echo $tpl['lang']['About']; ?></a></li>
                </ul>
            </li>
			<?php __palatte_menu(); ?>
        </ul>

        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-cog"></span>  <?php echo $tpl['user']['user']; ?></span>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
                <ul class="unstyled-list fg-dark">
                    <!--li><a href="<?php echo  URL.'/'; ?>dashboard/profile" class="fg-white1 fg-hover-yellow">Profile</a></li-->
                    <li><a href="<?php echo  URL.'/logout'; ?>" class="fg-white3 fg-hover-yellow"><?php echo $tpl['lang']['Logout']; ?></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
				<?php if(MULTISITE){ ?>
                <div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1; height: 100%">
                    <ul class="sidebar">
                        <li><a href="#">
                            <span class="mif-apps icon"></span>
                            <span class="title"><?php echo $tpl['lang']['Project']; ?></span>
                            <span class="counter"><?php echo count($tpl['projects']); ?></span>
                        </a></li>
						<?php  foreach($tpl['projects'] as $project){ ?>
							<li>
							<a href="<?php echo URL.'/projects/files/'.$project; ?>" class="active">
                            <span class="mif-palette icon"></span>
                            <span class="title"><?php echo $project; ?></span>
							</a>
							</li>
						<?php } ?>
                    </ul>
                </div>
				<?php } ?>
                <div class="cell auto-size padding20 bg-white" id="cell-content">