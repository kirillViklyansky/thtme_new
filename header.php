<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <?php global $wp; ?>
    <link rel='canonical' href='<?php echo home_url( $wp->request ) ?>'/>

    <?php wp_head(); ?>

    <style type="text/css">
		:root {
			--main-color-1: <?php echo get_field('main_color_1', 'options') ?: '#000' ?>;
			--main-color-2: <?php echo get_field('main_color_2', 'options') ?: '#000' ?>;
			--main-color-3: <?php echo get_field('main_color_3', 'options') ?: '#000' ?>;
			--main-color-4: <?php echo get_field('main_color_4', 'options') ?: '#000' ?>;
			--main-color-5: <?php echo get_field('main_color_5', 'options') ?: '#000' ?>;
			--main-color-6: <?php echo get_field('main_color_6', 'options') ?: '#000' ?>;
		}

		#preloader {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}

		#loader {
			display: block;
			position: relative;
			left: 50%;
			top: 50%;
			width: 150px;
			height: 150px;
			margin: -75px 0 0 -75px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: var(--main-color-1);
			-webkit-animation: spin 2s linear infinite;
			animation: spin 2s linear infinite;
		}

		#loader:before {
			content: "";
			position: absolute;
			top: 5px;
			left: 5px;
			right: 5px;
			bottom: 5px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: var(--main-color-2);
			-webkit-animation: spin 3s linear infinite;
			animation: spin 3s linear infinite;
		}

		#loader:after {
			content: "";
			position: absolute;
			top: 15px;
			left: 15px;
			right: 15px;
			bottom: 15px;
			border-radius: 50%;
			border: 3px solid transparent;
			border-top-color: var(--main-color-3);
			-webkit-animation: spin 1.5s linear infinite;
			animation: spin 1.5s linear infinite;
		}

		@-webkit-keyframes spin {
			0% {
				-webkit-transform: rotate(0deg);
				-ms-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			100% {
				-webkit-transform: rotate(360deg);
				-ms-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}

		@keyframes spin {
			0% {
				-webkit-transform: rotate(0deg);
				-ms-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			100% {
				-webkit-transform: rotate(360deg);
				-ms-transform: rotate(360deg);
				transform: rotate(360deg);
			}
		}
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="preloader">
    <div id="loader"></div>
</div>


