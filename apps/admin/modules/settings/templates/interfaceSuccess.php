<section id="sf_admin_container">

  <header>
    <h1><?php echo __('About your interface') ?></h1>
  </header>
  
  <?php if($sf_user->hasPermission('5') || $sf_user->hasPermission('4')){ ?>

    <?php $interface = unserialize(peanutConfig::get('interface')); ?>

    <section id="sf_admin_header"></section>

    <section id="sf_admin_content">

      <div class="sf_admin_form clearfix">
        <form action="<?php echo url_for('settings/interface') ?>" method="post" enctype="multipart/form-data">

          <?php echo $form->renderHiddenFields() ?>
          <fieldset id="sf_fieldset_content">

            <div class="content_box_content clearfix">

              <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_title">
                <div>
                  <?php echo $form['title']->renderLabel() ?>
                  <div class="content">
                    <?php echo $form['title']->render(array('class' => 'text-input')) ?>
                  </div>
                </div>
              </div>

              <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_logo">
                <div>
                  <?php echo $form['logo']->renderLabel() ?>
                  <div class="content">
                    <div class="content">
                    <?php if(isset($interface['logo']) && $interface['logo'] != ""): ?>
                      <?php $form->setDefault('logo', $interface['logo']); ?>
                      <img style="width: 685px;" src="/uploads/admin/<?php echo $interface['logo'] ?>"> 
                    <?php endif;?>
                      <?php echo $form['logo']->render(array('class' => 'text-input')) ?>
                  </div>
                  </div>
                </div>
              </div>

              <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_color">
                <div>
                  <?php echo $form['color']->renderLabel() ?>
                  <div class="content">
                    <?php echo $form['color']->render(array('class' => 'text-input')) ?>
                  </div>
                </div>
              </div>
   
              <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_background">
                <div>
                  <?php echo $form['background']->renderLabel() ?>
                  <div class="content">
                    <?php if(isset($interface['background'])): ?>
                      <?php $form->setDefault('background', $interface['background']); ?>
                      <img style="width: 685px;" src="/uploads/admin/<?php echo $interface['background'] ?>"> 
                    <?php endif;?>
                      <?php echo $form['background']->render(array('class' => 'text-input')) ?>
                  </div>
                </div>
              </div>
            </div>

          </fieldset>

          <fieldset id="sf_fieldset_informations">

            <p><?php echo __('Information from the connection interface can be modified so that you can have a custom login interface.') ?></p>
            

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