<section id="sf_admin_container">
  
  <header>
    <h1><?php echo __('About the first language') ?></h1>
  </header>
  
  <?php if($sf_user->hasPermission('5') || $sf_user->hasPermission('4')){ ?>
  
  <section id="sf_admin_header"></section>
  
  <section id="sf_admin_content">
    
    <div class="sf_admin_form clearfix">
      <form action="<?php echo url_for('settings/firstlang') ?>" method="post">
        
        <?php echo $form->renderHiddenFields() ?>
        <fieldset id="sf_fieldset_content">

          <div class="content_box_content clearfix">
            
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_country_name">
              <div>
                <?php echo $form['firstlang']->renderLabel() ?>
                <div class="content">
                  <?php echo $form['firstlang']->render(array('class' => 'text-input')) ?>
                </div>
              </div>
            </div>

          </div>

        </fieldset>
        
        <fieldset id="sf_fieldset_informations">
          
          <p><?php echo __('Select the language that is displayed first for the visitor.') ?></p>
          
          <input name="Send" type="submit" value="<?php echo __('Submit') ?>" class="button" id="send" size="16"/>
        </fieldset>
        
      </form>
    </div>
  </section>
  
</section>

<?php  
}
else{
?>
  <div class="sorry sf_admin_form">
    <?php echo __('Sorry, but you do not have access rights to this part.', null, 'sfGuard') ?>.. Cheater !
  </div>    
<?php
}
?>