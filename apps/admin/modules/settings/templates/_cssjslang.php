<?php /* CSS */
  if($lang['lang']){ 
    foreach($lang['lang'] as $key => $value){ 
      ?>
      <style type="text/css">
        .language .<?php echo strtolower($value) ?> {
          background: url('/images/admin/flags/<?php echo strtolower($value) ?>.png') no-repeat;
          text-indent: -1984px;
        }
        #authenticated div.sf_admin_form .content_box_content .<?php echo strtolower($value) ?> label {
          background: url('/images/admin/flags/<?php echo strtolower($value) ?>.png') no-repeat 90% center;
        }
      </style>
      <?php
    }
  }
  else{
    ?>
    <style type="text/css">
      .language .fr {
        background: url('/images/admin/flags/fr.png') no-repeat;
        text-indent: -1984px;
      }

      #authenticated div.sf_admin_form .content_box_content .fr label {
        background: url('/images/admin/flags/fr.png') no-repeat 90% center;
      }
    </style>  
    <?php
  }
?>          
   
<?php /* JS */
  if($lang['lang']){
    
    $lang = $sf_data->getRaw("lang");
    if(in_array('FR', $lang['lang'])){ $lang_fr = 1; }else{ $lang_fr = 0; }

    foreach($lang['lang'] as $key => $value){
      ?><script> 
        if( (<?php echo $lang_fr ?> == 1 && '<?php echo $value ?>' != 'FR') || (<?php echo $lang_fr ?> == 0 && <?php echo $key ?> != 0 )    )
        {  
          jQuery('#authenticated div.sf_admin_form .content_box_content .<?php echo strtolower($value) ?>').hide(); 
        }
        
        jQuery('.language .<?php echo strtolower($value) ?>').click(function() {
          jQuery('#authenticated div.sf_admin_form .content_box_content .<?php echo strtolower($value) ?>').slideToggle();
        })
      </script><?php
    }
  }
  else{
    ?><script> 
      jQuery('.language .fr').click(function() {
        jQuery('#authenticated div.sf_admin_form .content_box_content .fr').slideToggle();
      }) 
    </script><?php
  }
?>