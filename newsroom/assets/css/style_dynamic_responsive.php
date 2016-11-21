<?php
header("Content-type: text/css; charset=utf-8");
?>

@media only screen and (max-width: 1024px){
<?php do_action('newsroom_elated_style_dynamic_responsive_1024'); ?>
}

@media only screen and (min-width: 480px) and (max-width: 768px){
	<?php do_action('newsroom_elated_style_dynamic_responsive_480_768'); ?>
}

@media only screen and (max-width: 480px){
	<?php do_action('newsroom_elated_style_dynamic_responsive_480'); ?>
}