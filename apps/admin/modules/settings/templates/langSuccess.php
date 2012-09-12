<section id="sf_admin_container">
  
  <header>
    <h1><?php echo __('About your language') ?></h1>
  </header>
  
  <section id="sf_admin_header"></section>
  
  <section id="sf_admin_content">
    
    <div class="sf_admin_form clearfix">
      <form action="<?php echo url_for('settings/lang') ?>" method="post">
        
        <?php echo $form->renderHiddenFields() ?>
        <fieldset id="sf_fieldset_content">

          <div class="content_box_content clearfix">
            
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_country_name">
              <div>
                <?php echo $form['lang']->renderLabel() ?>
                <div class="content">
                  <?php echo $form['lang']->render(array('class' => 'text-input')) ?>
                </div>
              </div>
            </div>

          </div>

        </fieldset>
        
        <fieldset id="sf_fieldset_informations">
          
          <p><?php echo __('Select the languages you want to add to your site.') ?></p>
          
          <input name="Send" type="submit" value="<?php echo __('Submit') ?>" class="button" id="send" size="16"/>
        </fieldset>
        
      </form>
    </div>
  </section>
  
</section>