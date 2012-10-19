<?php

/**
 * peanutLink form.
 *
 * @package    peanutCorporatePlugin
 * @subpackage form
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com> <albalmes@gmail.com>
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutLinkForm extends BasepeanutLinkForm
{
  public function setup()
  {
    parent::setup();
    
    $user = self::getValidUser();
    
    $this->useFields(array(
     'author',
     'status',
     'menu',
     'created_at'
    ));

    $this->embedRelation('peanutXfn');
    $this->widgetSchema['peanutXfn']->setLabel('XFN');

    $this->embedRelation('peanutSeo');
    $this->widgetSchema['peanutSeo']->setLabel('SEO');
    
    if(!$this->isNew()) {
      $this->widgetSchema['created_at'] = new sfWidgetFormI18nDate(array(
        'culture' => $user->getCulture(),
      ));
    }
    else
    {
      unset($this['created_at']);
    }
    
    /* Construction des langues du site */
    $lang = unserialize(peanutConfig::get('lang'));
    $default = array();
    
    if($lang['lang']){
      foreach($lang['lang'] as $key => $value){
        $default[$key] = strtolower($value); 
      } 
      
      $this->embedI18n($default);

      foreach($default as $lang){
        $this->widgetSchema->setLabel($lang, 'language-' . $lang);
      }
    }
    else{
      $this->embedI18n(array('fr'));
      $this->widgetSchema->setLabel('fr', 'Français');
    }
  }
}
