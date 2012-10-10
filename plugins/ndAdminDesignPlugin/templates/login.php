<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

  <head>
    <meta charset="utf-8" />

    <?php include_http_metas() ?>
    <?php include_metas() ?>

    <?php include_title() ?>

    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <?php include_html5_stylesheets() ?>
    <link rel="stylesheet" href="/ndAdminDesignPlugin/css/reset.css" media="screen, projection">
    <link rel="stylesheet" href="/ndAdminDesignPlugin/css/structure.css" media="screen, projection">

    <?php echo html5_javascript_include_tag('/peanutAssetPlugin/js/modernizr-2.0.6.min.js') ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="/peanutAssetPlugin/js/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
  </head>

  <body>
    <?php echo $sf_content ?>
 
    <footer id="main">
      <a href="http://www.dachez.com">Nicolas Dachez | Communication visuelle - Print - Web</a> | <a href="#">Contact</a>
    </footer>
    <!--[if lt IE 7 ]>
      <script src="js/libs/dd_belatedpng.js"></script>
      <script>DD_belatedPNG.fix('img, .png_bg');</script>
    <![endif]-->
    <?php include_html5_javascripts() ?>
  </body>
</html>
