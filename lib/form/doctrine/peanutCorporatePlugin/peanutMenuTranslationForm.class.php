<?php

/**
 * peanutMenuTranslation form.
 *
 * @package    eie
 * @subpackage form
 * @author     Dachez Nicolas
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class peanutMenuTranslationForm extends BasepeanutMenuTranslationForm
{
  public function setup()
  {
    parent::setup();
    
    $user = self::getValidUser();
    
    $this->useFields(array(
      'name',
      'slug'
    ));
    
    $this->widgetSchema['name'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'required'    => true,
        'placeholder' => sfContext::getInstance()->getI18N()->__('The menu title', null, 'peanutCorporate')
    ));
    
    $this->widgetSchema['slug'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'placeholder' => sfContext::getInstance()->getI18N()->__('the-menu-slug', null, 'peanutCorporate')
    ));

    $this->widgetSchema->setHelps(array(
      'name'         => 'The menu name (required)',
      'slug'         => 'Not required but maybe usefull for your SEO',
    ));
    
  }
}
