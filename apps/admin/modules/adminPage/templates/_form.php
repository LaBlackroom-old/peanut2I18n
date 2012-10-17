<?php 
if($form->isNew() && (!$sf_user->hasPermission('2') && !$sf_user->hasPermission('3')
   && !$sf_user->hasPermission('4') && !$sf_user->hasPermission('5')))
{
  echo '<div class="sorry sf_admin_form">';
    echo __('Sorry but you can not create page.', null, 'sfGuard');
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
  
  <?php echo form_tag_for($form, '@peanut_page') ?>
    <?php echo $form->renderHiddenFields(false) ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>
      
    <fieldset id="sf_fieldset_general">
      <div class="content_box_header">
        <h2><?php echo __('Général') ?></h2>
      </div>
      
      <div class="content_box_content clearfix">
        
        <?php if($lang['lang']){ ?>
          <?php foreach($lang['lang'] as $key => $value){ ?>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_<?php echo strtolower($value) ?>_title <?php echo strtolower($value) ?>">
              <?php echo $form[strtolower($value)]['title']->renderLabel() ?>

              <div class="content">
                <?php echo $form[strtolower($value)]['title']->render() ?>
              </div>

              <div class="help">
                <?php echo $form[strtolower($value)]['title']->renderHelp() ?>
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
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_fr_title fr">
              <?php echo $form['fr']['title']->renderLabel() ?>

              <div class="content">
                <?php echo $form['fr']['title']->render() ?>
              </div>

              <div class="help">
                <?php echo $form['fr']['title']->renderHelp() ?>
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
        <?php if($lang['lang']){ ?>
          <?php foreach($lang['lang'] as $key => $value){ ?>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_<?php echo strtolower($value) ?>_content <?php echo strtolower($value) ?>">
              <?php echo $form[strtolower($value)]['content']->renderLabel() ?>

              <div class="content">
                <?php echo $form[strtolower($value)]['content']->render() ?>
              </div>

              <div class="help">
                <?php echo $form[strtolower($value)]['content']->renderHelp() ?>
              </div>
            </div>
        
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_<?php echo strtolower($value) ?>_excerpt <?php echo strtolower($value) ?>">
              <?php echo $form[strtolower($value)]['excerpt']->renderLabel() ?>

              <div class="content">
                <?php echo $form[strtolower($value)]['excerpt']->render() ?>
              </div>

              <div class="help">
                <?php echo $form[strtolower($value)]['excerpt']->renderHelp() ?>
              </div>
            </div>
          <?php }}else{ ?>
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_fr_content fr">
              <?php echo $form['fr']['content']->renderLabel() ?>

              <div class="content">
                <?php echo $form['fr']['content']->render() ?>
              </div>

              <div class="help">
                <?php echo $form['fr']['content']->renderHelp() ?>
              </div>
            </div>
        
            <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_fr_excerpt fr">
              <?php echo $form['fr']['excerpt']->renderLabel() ?>

              <div class="content">
                <?php echo $form['fr']['excerpt']->render() ?>
              </div>

              <div class="help">
                <?php echo $form['fr']['excerpt']->renderHelp() ?>
              </div>
            </div>
        <?php } ?>

        
        <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_peanutSeo">
          
          <?php echo $form['peanutSeo']->renderLabel() ?>
          
          <div class="content">
            <div class="embedForm">

              <?php if($lang['lang']){ ?>
                <?php foreach($lang['lang'] as $key => $value){ ?>
                  <div class="form-row <?php echo strtolower($value) ?>">
                    <?php echo $form['peanutSeo'][strtolower($value)]['title']->renderLabel() ?>
                    <?php echo $form['peanutSeo'][strtolower($value)]['title']->render() ?>
                    <div class="help"><?php echo $form['peanutSeo'][strtolower($value)]['title']->renderHelp() ?></div>
                  </div>
                <?php }}else{ ?>
                  <div class="form-row fr">
                    <?php echo $form['peanutSeo']['fr']['title']->renderLabel() ?>
                    <?php echo $form['peanutSeo']['fr']['title']->render() ?>
                    <div class="help"><?php echo $form['peanutSeo']['fr']['title']->renderHelp() ?></div>
                  </div>  
              <?php } ?>
              
              <?php if($lang['lang']){ ?>
                <?php foreach($lang['lang'] as $key => $value){ ?>
                  <div class="form-row <?php echo strtolower($value) ?>">
                    <?php echo $form['peanutSeo'][strtolower($value)]['description']->renderLabel() ?>
                    <?php echo $form['peanutSeo'][strtolower($value)]['description']->render() ?>
                    <div class="help"><?php echo $form['peanutSeo'][strtolower($value)]['description']->renderHelp() ?></div>
                  </div>
                <?php }}else{ ?>
                  <div class="form-row fr">
                    <?php echo $form['peanutSeo']['fr']['description']->renderLabel() ?>
                    <?php echo $form['peanutSeo']['fr']['description']->render() ?>
                    <div class="help"><?php echo $form['peanutSeo']['fr']['description']->renderHelp() ?></div>
                  </div>
              <?php } ?>

              <?php if($lang['lang']){ ?>
                <?php foreach($lang['lang'] as $key => $value){ ?>
                  <div class="form-row <?php echo strtolower($value) ?>">
                    <?php echo $form['peanutSeo'][strtolower($value)]['keywords']->renderLabel() ?>
                    <?php echo $form['peanutSeo'][strtolower($value)]['keywords']->render() ?>
                    <div class="help"><?php echo $form['peanutSeo'][strtolower($value)]['keywords']->renderHelp() ?></div>
                  </div>
                <?php }}else{ ?>
                  <div class="form-row fr">
                    <?php echo $form['peanutSeo']['fr']['keywords']->renderLabel() ?>
                    <?php echo $form['peanutSeo']['fr']['keywords']->render() ?>
                    <div class="help"><?php echo $form['peanutSeo']['fr']['keywords']->renderHelp() ?></div>
                  </div>
              <?php } ?>
              
              <div class="form-row">
                <?php echo $form['peanutSeo']['is_indexable']->renderLabel() ?>
                <?php echo $form['peanutSeo']['is_indexable']->render() ?>
                <div class="help"><?php echo $form['peanutSeo']['is_indexable']->renderHelp() ?></div>
              </div>
              
              <div class="form-row">
                <?php echo $form['peanutSeo']['is_followable']->renderLabel() ?>
                <?php echo $form['peanutSeo']['is_followable']->render() ?>
                <div class="help"><?php echo $form['peanutSeo']['is_followable']->renderHelp() ?></div>
              </div>
              
            </div>
          </div>
        </div>
        
      </div>
    </fieldset>
  
    <fieldset id="sf_fieldset_informations">
      <div class="content_box_header">
        <h2><?php echo __('Informations') ?></h2>
      </div>
      
      <div class="content_box_content">
        <div class="sf_admin_form_row sf_admin_enum sf_admin_form_field_status">
          <?php echo $form['status']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['status']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['status']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_author">
          <?php echo $form['author']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['author']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['author']->renderHelp() ?>
          </div>
        </div>
        
        <div class="sf_admin_form_row sf_admin_foreignkey sf_admin_form_field_menu">
          <?php echo $form['menu']->renderLabel() ?>
          
          <div class="content" id="selectmenu">
            <?php echo $form['menu']->render() ?>
            
            <a class="ajax" href="/adminMenu/newx">
              <img title="<?php echo __("Add new menu") ?>" src="/peanutAssetPlugin/images/admin/add.png" />
            </a>
          </div>
          
          <div class="help">            
            <?php echo $form['menu']->renderHelp() ?>
          </div>
          
          <div id="dialog"> </div>
        </div>
      
        <?php if(!$form->isNew()): ?>
        <div class="sf_admin_form_row sf_admin_date sf_admin_form_field_menu">
          <?php echo $form['created_at']->renderLabel() ?>
          
          <div class="content">
            <?php echo $form['created_at']->render() ?>
          </div>
          
          <div class="help">
            <?php echo $form['created_at']->renderHelp() ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </fieldset>
  
    

    <?php include_partial('adminPage/form_actions', array('peanut_page' => $peanut_page, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </form>
</div>

<?php include_partial('settings/cssjslang', array('lang' => $lang)) ?>    

<?php } ?>