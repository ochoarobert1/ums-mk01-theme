<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <?php /* MAIN STUFF */ ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset') ?>" />
    <meta name="robots" content="NOODP, INDEX, FOLLOW" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="dns-prefetch" href="//facebook.com" crossorigin />
    <link rel="dns-prefetch" href="//connect.facebook.net" crossorigin />
    <link rel="dns-prefetch" href="//ajax.googleapis.com" crossorigin />
    <link rel="dns-prefetch" href="//google-analytics.com" crossorigin />
    <?php /* FAVICONS */ ?>
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
    <?php /* THEME NAVBAR COLOR */ ?>
    <meta name="msapplication-TileColor" content="#454545" />
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/win8-tile-icon.png" />
    <meta name="theme-color" content="#454545" />
    <?php /* AUTHOR INFORMATION */ ?>
    <meta name="language" content="<?php echo get_bloginfo('language'); ?>" />
    <meta name="author" content="ADMIN_SITIO" />
    <meta name="copyright" content="DIRECCION_URL" />
    <meta name="geo.position" content="10.333333;-67.033333" />
    <meta name="ICBM" content="10.333333, -67.033333" />
    <meta name="geo.region" content="VE" />
    <meta name="geo.placename" content="DIRECCION_AUTOR" />
    <meta name="DC.title" content="<?php if (is_home()) {
                                        echo get_bloginfo('name') . ' | ' . get_bloginfo('description');
                                    } else {
                                        echo get_the_title() . ' | ' . get_bloginfo('name');
                                    } ?>" />
    <?php /* MAIN TITLE - CALL HEADER MAIN FUNCTIONS */ ?>
    <?php wp_title('|', false, 'right'); ?>
    <?php wp_head() ?>
    <?php /* OPEN GRAPHS INFO - COMMENTS SCRIPTS */ ?>
    <?php if (is_single('post') && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
    <?php /* IE COMPATIBILITIES */ ?>
    <!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7" /><![endif]-->
    <!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8" /><![endif]-->
    <!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9" /><![endif]-->
    <!--[if gt IE 8]><!-->
    <html <?php language_attributes(); ?> class="no-js" />
    <!--<![endif]-->
    <!--[if IE]> <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script> <![endif]-->
    <!--[if IE]> <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script> <![endif]-->
    <!--[if IE]> <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" /> <![endif]-->
</head>

<body class="the-main-body <?php echo join(' ', get_body_class()); ?>" itemscope itemtype="http://schema.org/WebPage">
    <?php wp_body_open(); ?>
    <div id="fb-root"></div>
    <header class="container-fluid p-0" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <div class="row no-gutters">
            <div class="top-header col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="top-header-item col-xl col-lg col-md col-sm-6 col-6">
                            <i class="fa fa-map-marker"></i> 2601 SW 37th Ave. Suite 904
                        </div>
                        <div class="top-header-item col-xl col-lg col-md col-sm-6 col-6">
                            <i class="fa fa-phone"></i> any questions +1 305 444 1213
                        </div>
                        <div class="top-header-item text-right col-xl col-lg col-md col-sm-6 col-6">
                            <i class="fa fa-clock-o"></i> Mon to Fri: 9 am - 5 pm
                        </div>
                        <div class="top-header-item text-right social-header col-xl col-lg col-md col-sm-6 col-6">
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""><i class="fa fa-youtube-play"></i></a>
                            <a href=""><i class="fa fa-yelp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="the-header col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="container">
                    <div class="row">
                        <div class="header-logo col-3">
                            <a class="navbar-brand" href="<?php echo home_url('/'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                                <?php $custom_logo_id = get_theme_mod('custom_logo'); ?>
                                <?php $image = wp_get_attachment_image_src($custom_logo_id, 'logo'); ?>
                                <?php if (!empty($image)) { ?>
                                    <img src="<?php echo $image[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>" class="img-fluid img-logo" />
                                <?php } else { ?>
                                    Navbar
                                <?php } ?>
                            </a>
                        </div>
                        <div class="header-menu col-9">
                            <nav class="header-menu-wrapper">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'header_menu',
                                    'depth'           => 2,
                                    'container'       => 'div'
                                ));
                                ?>
                            </nav>
                            <div class="header-menu-buttons">
                                <i class="fa fa-search"></i>
                                <i class="fa fa-shopping-cart"></i>
                                <a href="" class="btn btn-md btn-header"><?php _e('Appointment', 'umedical'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>