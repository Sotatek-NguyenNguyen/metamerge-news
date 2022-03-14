<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/imgs/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta
      name="description"
      content="Web site created using create-react-app"
    />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/imgs/favicon.png" />
    <meta property="og:url" content=""/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="MetaMerge"/>
    <meta property="og:description" content="MetaMerge"/>
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/imgs/poster_2.jpg"/>
    <title>MetaMerge News</title>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css" rel="stylesheet"/>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/setmedia.css" rel="stylesheet"/>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.3.2.1.min.js"></script>
	
  </head>
  <body>
		
<?php  wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css',false,'1.1','all'); ?>
    <header id="header">
      <div class="box_nav_header">

        <div class="d-none d-xl-block">
          <ul class="nav_header">
            <li class="item_nav"><a href="https://metamerge.game/#/">Home</a></li>
            <li class="item_nav"><a href="https://play.metamerge.game/#/">Play</a></li>
            <li class="item_nav"><a href="https://market.metamerge.game/#/">Marketplace</a></li>
            <li class="item_nav"><a href="https://docs.metamerge.game/">Document</a></li>
            <li class="item_nav"><a href="#">News</a></li>
          </ul>
        </div>

        <div class="d-block d-xl-none">
          <div class="header_mobile">
            <a href="https://metamerge.game/#/">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo_high.png" alt="<?php echo get_template_directory_uri(); ?>/assets/imgs/logo_high.png" class="logo_mobile_menu">
            </a>
            <button type="submit" class="btn_showMenuMobile" data-bs-dismiss="modal" data-bs-toggle="modal"
              data-bs-target="#modalMenuMobile">
              <span class="icon_show_menu_mobile">
                <svg class="MuiSvgIcon-root jss22" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                </svg>
              </span>
            </button>
          </div>
        </div>

      </div>
    </header>

    <div class="clearix"></div>
