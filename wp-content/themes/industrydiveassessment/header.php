<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IndustryDiveAssessment
 */

?>
<!doctype html>
<html <?php
language_attributes(); ?>>
<head>
    <meta charset="<?php
    bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php
    wp_head(); ?>
</head>

<body <?php
body_class(); ?>>
<?php
wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php
        esc_html_e('Skip to content', 'industrydiveassessment'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
                <div class="header">
                    <div class="header-search">
                        <form action="" method="get">
                            <input type="search" name="s" id="search" placeholder="Search">
                        </form>
                    </div>

                    <div class="header-title">
                        <h1><?php
                                bloginfo('name'); ?></h1>
                        <p class="site-title"><?php
                                bloginfo('description'); ?></p>
                    </div>

                    <div class="header-subscribe open-button" onclick="openForm()">
                        <a href="#">
                            <i class="fa-solid fa-envelope-open-text"></i>
                            Subscribe
                        </a>

                        <div class="form-popup" id="myForm">
                          <form action="" class="form-container">
                            <label for="email"><b>Email</b></label>
                            <input type="text" id="subscribe_email" placeholder="Enter Email" name="email" required>
                              <p id="subscribeMsg"></p>

                              <button type="submit" class="btn subscribeBtn">Subscribe</button>
<!--                              <button type="button" class="btn cancel" onclick="closeForm()">Close</button>-->
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .site-branding -->

        <div class="container">
            <div class="header-menu">
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>

    </header><!-- #masthead -->
