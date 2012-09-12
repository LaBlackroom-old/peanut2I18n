<?php

/**
 * peanutSettings form.
 *
 * @package    peanut2
 * @subpackage form
 * @author     AlexandrepockyBalmes
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class langSettingsForm extends peanutSettingsForm
{
  public function configure()
  {
    $lang = unserialize(peanutConfig::get('lang'));
    $default = array();
    $user = self::getValidUser();

    $this->widgetSchema['lang'] = new sfWidgetFormI18nChoiceCountry(array(
        'culture' => $user->getCulture(),
        'multiple' => true,
        'expanded' => true,
    ));
    
    if($lang['lang']){
      foreach($lang['lang'] as $key => $value){
        $default[$key] = $value;
      }  
    }
    
    $this->widgetSchema['lang']->setDefault($default);
    
    
    
  }
}
