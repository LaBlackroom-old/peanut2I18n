<?php

/**
 * peanutSettings form.
 *
 * @package    peanut2
 * @subpackage form
 * @author     AlexandrepockyBalmes
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class firstlangSettingsForm extends peanutSettingsForm
{
  public function configure()
  {
    $lang = unserialize(peanutConfig::get('lang'));
    $default = array();
    $user = self::getValidUser();

    $this->widgetSchema['firstlang'] = new sfWidgetFormChoice(array(
        'choices' => $this->_getSelectedLang()
    ));
    
    if($lang['lang']){
      foreach($lang['lang'] as $key => $value){
        $default[$key] = $value;
      }  
    }
    
    $this->widgetSchema['firstlang']->setDefault($default);
  }
  
  protected function _getSelectedLang(){
    
    $lang = unserialize(peanutConfig::get('lang'));
    
    if($lang['lang']){ 
      foreach($lang['lang'] as $key => $value){
        $selectedLang[$value] = $value;
      }
    }
    else{
      $selectedLang['0'] = 'FR';
    }
    
    return $selectedLang;
    
  }
}
