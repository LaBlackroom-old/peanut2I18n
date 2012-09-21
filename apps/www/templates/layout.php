<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

  <head>
    <meta charset="utf-8" />

    <?php include_http_metas() ?>
    <?php include_metas() ?>

    <title>
    <?php if (!include_slot('title')): ?>
      <?php echo peanutConfig::get('meta_title') ?>
    <?php endif; ?>
    </title>

    <meta name="description" content="<?php if(!include_slot('description', peanutConfig::get('meta_description'))) { get_slot('description'); } ?>">
    <meta name="keywords" content="<?php if(!include_slot('keywords', peanutConfig::get('meta_keywords'))) { get_slot('keywords'); } ?>">
    <meta name="robots" content="<?php if(!include_slot('robots', peanutConfig::get('meta_robots'))) { get_slot('robots'); } ?>">
    <meta name="language" content="<?php echo $sf_context->getRequest()->getParameter('sf_culture') ?>">

    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <?php include_html5_stylesheets() ?>

    <?php echo html5_javascript_include_tag('/js/modernizr-1.7.min.js') ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="/js/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="/css/nivo-slider.css" type="text/css" media="screen"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
            effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
            animSpeed: 500, // Slide transition speed
            pauseTime: 3000, // How long each slide will show
            startSlide: 0, // Set starting Slide (0 index)
            directionNav: true, // Next & Prev navigation
            controlNav: true, // 1,2,3... navigation
            controlNavThumbs: false, // Use thumbnails for Control Nav
            pauseOnHover: true, // Stop animation while hovering
            manualAdvance: false, // Force manual transitions
            prevText: 'Prev', // Prev directionNav text
            nextText: 'Next', // Next directionNav text
            randomStart: false, // Start on a random slide
            beforeChange: function(){}, // Triggers before a slide transition
            afterChange: function(){}, // Triggers after a slide transition
            slideshowEnd: function(){}, // Triggers after all slides have been shown
            lastSlide: function(){}, // Triggers when last slide is shown
            afterLoad: function(){} // Triggers when slider has loaded
        });
    });
    </script>
    
  </head>

  <body>
    <div id="container" class="alignCenter center container">

      <section id="top" class="alignLeft">

        <header class="clearfix">
          <h1 class="floatLeft">
            <a href="<?php echo url_for('@homepage') ?>" title="<?php __('Back to homepage') ?>">
              <img src="/images/logo.png" alt="<?php __('Back to homepage') ?>"/>
            </a>
          </h1>
          <h2 class="floatLeft">Influencing through Exhibitions and Events</h2>
          
        </header>

        <nav class="clearfix">
          <div class="floatRight icons_fbin">
            <a href="#" title=""><img src="/images/fb.png" alt=""/></a>
            <a href="#" title=""><img src="/images/in.png" alt=""/></a>
          </div>
          <div class="floatRight">
            <?php include_component('items', 'mainMenu') ?>
          </div>
        </nav>

      </section>

      <section id="main" class="alignLeft clearfix" role="main">
        
        <div class="banner">
          <?php include_partial('banner/bannerShow', array()) ?>
        </div>
        
        
        <div class="entries clearfix">
          <div class="industries floatLeft grid grid_8">
            <h1>Industries</h1>
            <ul>
              <li><a href="#" title="">Defense/Security/Aerospace</a></li>
              <li><a href="#" title="">Energy/Environement</a></li>
              <li><a href="#" title="">Healthcare/Pharmaceutical</a></li>
              <li><a href="#" title="">Beauty Cosmetics</a></li>
              <li><a href="#" title="">Optics</a></li>
              <li><a href="#" title="">IT/Broadcast</a></li>
            </ul>
          </div>
          
          <div class="who_you_are floatLeft grid grid_8">
            <h1>Who you are</h1>
            <ul>
              <li><a href="#" title="">Organizer</a></li>
              <li><a href="#" title="">Exhibitors/Company</a></li>
              <li><a href="#" title="">Exhibit house/Partner</a></li>
            </ul>
          </div>
          
          <div class="eie_in_video floatLeft grid grid_8">
            <h1>EIE Global in 1'30</h1>
            <img src="/images/video.png" alt=""/>
          </div>
          
        </div>

        <?php //echo $sf_content ?>
      </section>

    </div>
    
    <section id="footer">

      <footer class="clearfix">
        <div class="bloc_focus floatLeft grid grid_8">
          <h1>Focus On</h1>
          <img src="" alt=""/>
          <img src="" alt=""/>
          <img src="" alt=""/>
        </div>
        
        <div class="bloc_portfolio floatLeft grid grid_8">
          <h1>Portfolio</h1>
          
        </div>
        
        <div class="bloc_news floatLeft grid grid_8">
          <h1>News &amp; Resources</h1>
          <ul>
            <li><a href="#" title="">EIE office opening soon in Moscow...</a><a class="readmore" href="#" alt="">> Read More</a></li>
          </ul>
        </div>
      </footer>
      
      <div class="copyright">
        <nav>
          <?php include_component('items', 'footerMenu') ?>
           <!--<?php //include_component('language', 'language') ?>-->
        </nav>
      </div>

    </section>

    <!--[if lt IE 7 ]>
      <script src="js/dd_belatedpng.js"></script>
      <script>DD_belatedPNG.fix('img, .png_bg');</script>
    <![endif]-->


    <?php include_html5_javascripts() ?>
    
    <?php if(peanutConfig::get('google_guid')): ?>
    <script>
      var _gaq=[['_setAccount','<?php echo peanutConfig::get('google_guid') ?>'],['_trackPageview'],['_trackPageLoadTime']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
    <?php endif; ?>
    
  </body>
</html>