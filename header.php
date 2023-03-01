<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <?php global $wp; ?>
    <link rel='canonical' href='<?php echo home_url( $wp->request ) ?>'/>

    <title><?php wp_title( '|', 'echo', 'right' ); ?><?php bloginfo( 'name' ); ?></title>

    <?php wp_head(); ?>

    <?php root_vars() ?>
    <?php preloader_css() ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php echo rkt_get_image( 'image' ) ?>

<!--<div id="preloader">-->
<!--    <div id="loader"></div>-->
<!--</div>-->

<main>

