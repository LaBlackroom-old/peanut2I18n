<?php

/**
 * peanutSeo form.
 *
 * @package    peanutSeoPlugin
 * @subpackage form
 * @author     Alexandre "pocky" Balmes
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
abstract class PluginpeanutSeoForm extends BasepeanutSeoForm
{
  
  public function setup()
  {
    parent::setup();

    unset($this['id']);
    
    $this->widgetSchema['is_indexable'] = new sfWidgetFormChoice(array(
    	'choices'	=>	array(0 => 'noindex', 1 => 'index'),
    	'expanded'	=>	false,
    ));
    
    $this->widgetSchema['is_followable'] = new sfWidgetFormChoice(array(
    	'choices'	=>	array(0 => 'nofollow', 1 => 'follow'),
    	'expanded'	=>	false,
    ));
    
    $this->widgetSchema->setLabels(array(
      'is_indexable'	=> 'Index',
      'is_followable'	=> 'Follow',
    ));
    
    $this->widgetSchema->setFormFormatterName('div');
    
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