<script type="text/javascript">
jQuery(document).ready( function () {
  jQuery("#result").hide();
 
    jQuery("#ajax").submit( function (){      
      
       jQuery.post( "<?php echo url_for('adminCategories/ajax') ?>",   
           jQuery('#ajax').serialize()  , function success(data){        
              if(data){  
              jQuery("#selectmenu select").remove();
              jQuery("#selectmenu").append(data);  
              jQuery("#dialog").dialog("close");                   
            }
             });
       
       return false;
    });
    
})
</script>

<form id="ajax" action="<?php echo url_for('adminCategories/ajax', array('sf_format' => 'html')) ?>" method="POST">
        <?php  echo $form->renderHiddenFields() ?> 
        <p> 
         <?php echo $form['name']->renderLabel() ?> <br />
         <?php  echo $form['name'] ?>
        </p>
        <p>           
         <?php echo $form['parent']->renderLabel() ?> <br />
         <?php  echo $form['parent'] ?>
        </p>
              
        <input class="submit" type="submit" value="Valider" />

</form>


<div id="result"> <?php echo __("New menu saved") ?> </div>

