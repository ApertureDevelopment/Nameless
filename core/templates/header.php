<?php
/*
 *	Made by Samerton
 *  https://github.com/NamelessMC/Nameless/
 *  NamelessMC version 2.0.0-pr3
 *
 *  License: MIT
 *
 *  Header generation
 */
 
// Set current page URL in session, provided it's not the login page
if(defined('PAGE') && PAGE != 'login' && PAGE != 404){
	if(FRIENDLY_URLS === true){
		$split = explode('?', $_SERVER['REQUEST_URI']);

		if(count($split) > 1)
			$_SESSION['last_page'] = URL::build($split[0], $split[1]);
		else
			$_SESSION['last_page'] = URL::build($split[0]);
	} else 
		$_SESSION['last_page'] = URL::build($_GET['route']);
}

// Add widgets to Smarty
if(isset($widgets))
	$smarty->assign('WIDGETS', $widgets->getWidgets());
?>
	<!-- Page Title -->
	<title><?php echo $title; ?> &bull; <?php echo SITE_NAME; ?></title>
	
	<meta name="author" content="<?php echo SITE_NAME; ?>">

	<!-- Global CSS -->
	<link rel="stylesheet" href="<?php if(defined('CONFIG_PATH')) echo CONFIG_PATH . '/'; else echo '/'; ?>core/assets/plugins/toastr/toastr.min.css">
	
	<?php if($page == 'admin'){ ?>
	<link rel="stylesheet" href="<?php if(defined('CONFIG_PATH')) echo CONFIG_PATH . '/'; else echo '/'; ?>core/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php if(defined('CONFIG_PATH')) echo CONFIG_PATH . '/'; else echo '/'; ?>core/assets/css/custom.css">
	<link rel="stylesheet" href="<?php if(defined('CONFIG_PATH')) echo CONFIG_PATH . '/'; else echo '/'; ?>core/assets/css/font-awesome.min.css">
	<?php 
	} else {
		foreach($css as $item){
			?>
	<link rel="stylesheet" href="<?php echo $item; ?>">
			<?php
		}
		if(isset($style) && is_array($style)){
			foreach($style as $item){
				echo $item;
			}
		}
	} 
	?>
	
	<?php

	// Background?
	$cache->setCache('backgroundcache');
	$background_image = $cache->retrieve('background_image');
	
	if(!empty($background_image)){
	?>
	<style>
	body {
		background-image: url('<?php echo $background_image; ?>');
		background-repeat: no-repeat;
		background-attachment: fixed;
        background-size: cover;
	}
	</style>
	<?php
	}
	?>