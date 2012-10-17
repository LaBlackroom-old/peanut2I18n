<?php 

if($form->isNew() && (!$sf_user->hasPermission('2') && !$sf_user->hasPermission('3')
   && !$sf_user->hasPermission('4') && !$sf_user->hasPermission('5')))
{
  echo '<div class="sorry sf_admin_form">';
    echo __('Sorry but you can not create menu.', null, 'sfGuard');
  echo '.. Cheater!</div>';
}
else
{
  ?>
  <?php use_stylesheets_for_form($form) ?>
  <?php use_javascripts_for_form($form) ?>

  <?php $lang = unserialize(peanutConfig::get('lang')); ?>

  <div class="sf_admin_form">

      <section class="language clearfix">
        <ul>
          <?php if($lang['lang']){ ?>
            <?php foreach($lang['lang'] as $key => $value){ ?>
              <li class="<?php echo strtolower($value) ?>" title="<?php echo __(strtolower($value)) ?>"><?php echo $value ?></li>
            <?php }}else{ ?>
              <li class="fr">FR</li>
            <?php } ?>
        </ul>
      </section>

      <?php echo form_tag_for($form, '@peanut_menu') ?>
      <?php echo $form->renderHiddenFields(false) ?>
      <?php if ($form->hasGlobalErrors()): ?>
        <?php echo $form->renderGlobalErrors() ?>
      <?php endif; ?>
      <fieldset id="sf_fieldset_general">

        <div class="content_box_header">
          <h2><?php echo __('General') ?></h2>
        </div>

        <div class="content_box_content clearfix">
          <?php if($lang['lang']){ ?>
            <?php foreach($lang['lang'] as $key => $value){ ?>

              <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_<?php echo strtolower($value) ?>_name <?php echo strtolower($value) ?>">
                <?php echo $form[strtolower($value)]['name']->renderLabel() ?>

                <div class="content">
                  <?php echo $form[strtolower($value)]['name']->render() ?>
                </div>

                <div class="help">
                  <?php echo $form[strtolower($value)]['name']->renderHelp() ?>
                </div>
              </div>

              <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_<?php echo strtolower($value) ?>_slug <?php echo strtolower($value) ?>">
                <?php echo $form[strtolower($value)]['slug']->renderLabel() ?>

                <div class="content">
                  <?php echo $form[strtolower($value)]['slug']->render() ?>
                </div>

                <div class="help">
                  <?php echo $form[strtolower($value)]['slug']->renderHelp() ?>
                </div>
              </div>

            <?php }}else{ ?>
              <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_fr_name fr">
                <?php echo $form['fr']['name']->renderLabel() ?>

                <div class="content">
                  <?php echo $form['fr']['name']->render() ?>
                </div>

                <div class="help">
                  <?php echo $form['fr']['name']->renderHelp() ?>
                </div>
              </div>
              <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_fr_slug fr">
                <?php echo $form['fr']['slug']->renderLabel() ?>

                <div class="content">
                  <?php echo $form['fr']['slug']->render() ?>
                </div>

                <div class="help">
                  <?php echo $form['fr']['slug']->renderHelp() ?>
                </div>
              </div>
            <?php } ?>
        </div>
      </fieldset>


      <fieldset id="sf_fieldset_content">
        <div class="content_box_header">
          <h2><?php echo __('Contenu') ?></h2>
        </div>

        <div class="content_box_content">

          <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_parent">
            <?php echo $form['parent']->renderLabel() ?>

            <div class="content">
              <?php echo $form['parent']->render() ?>
            </div>

            <div class="help">
              <?php echo $form['parent']->renderHelp() ?>
            </div>
          </div>

        </div>
      </fieldset>

      <fieldset id="sf_fieldset_informations">
        <div class="content_box_header">
          <h2><?php echo __('Informations') ?></h2>
        </div>

        <div class="content_box_content">

        </div>
      </fieldset>

      <?php include_partial('adminMenu/form_actions', array('peanut_menu' => $peanut_menu, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </form>
  </div>

  <?php include_partial('settings/cssjslang', array('lang' => $lang)) ?>    



  <?php if($lang['lang']){ ?>
    <?php foreach($lang['lang'] as $key => $value){ ?>

    <?php }}else{ ?>

  <?php } ?>
<?php } ?>