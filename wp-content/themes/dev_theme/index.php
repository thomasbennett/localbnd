<?php ob_start(); ?>

<?php wp_list_pages(); ?>
<?php include('loop.php') ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
