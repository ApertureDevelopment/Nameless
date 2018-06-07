<?php 
/*
 *	Made by Samerton
 *  https://github.com/NamelessMC/Nameless/
 *  NamelessMC version 2.0.0-pr3
 *
 *  License: MIT
 *
 *  404 Not Found page
 */

header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); 

define('PAGE', 404);
?>

<!DOCTYPE html>
<html lang="<?php echo (defined('HTML_LANG') ? HTML_LANG : 'en'); ?>" <?php if(defined('HTML_RTL') && HTML_RTL === true) echo ' dir="rtl"'; ?>>
  <head>
    <meta charset="<?php echo (defined('LANG_CHARSET') ? LANG_CHARSET : 'utf-8'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo SITE_NAME; ?> - 404">
	<meta name="robots" content="noindex">
	
	<?php if(isset($custom_meta)){ echo $custom_meta; } ?>
	
	<?php
	$title = '404';
	require(ROOT_PATH . '/core/templates/header.php');
	?>
	
	<!-- Custom style -->
	<style>
	html {
		overflow-y: scroll;
	}
	</style>
	
  </head>
  <body>
	<?php
	// Generate navbar and footer
	require(ROOT_PATH . '/core/templates/navbar.php');
	require(ROOT_PATH . '/core/templates/footer.php');

	// Assign Smarty variables
	$smarty->assign(array(
		'TITLE' => $language->get('errors', '404_title'),
		'CONTENT' => $language->get('errors', '404_content'),
		'BACK' => $language->get('errors', '404_back'),
		'HOME' => $language->get('errors', '404_home'),
		'ERROR' => str_replace(array('{x}', '{y}'), array('<a href="' . URL::build('/contact') . '">', '</a>'), $language->get('errors', '404_error')),
		'PATH' => (defined('CONFIG_PATH') ? CONFIG_PATH : '')
	));
	
	// 404 template
	$smarty->display(ROOT_PATH . '/custom/templates/' . TEMPLATE . '/404.tpl');
	?>
  </body>
</html>
