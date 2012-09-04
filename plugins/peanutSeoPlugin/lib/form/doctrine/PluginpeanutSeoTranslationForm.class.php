<?php

/**
 * PluginpeanutSeoTranslation form.
 *
 * @package    peanutSeoPlugin
 * @subpackage form
 * @author     Alexandre 'pocky' Balmes <albalmes@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutSeoTranslationForm extends BasepeanutSeoTranslationForm
{
  public function setup()
  {
    parent::setup();
    
    $this->widgetSchema['title'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
      'maxlength'   => 195,
      'placeholder' => 'My beautiful title'
    ));

    $this->widgetSchema['description'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'maxlength'   => 255,
        'placeholder' => 'My beautiful description'
    ));

    $this->widgetSchema['keywords'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'placeholder' => 'My seo tags (comma separated)'
    ));
  
    $this->setValidator['keywords'] = new sfValidatorString(array(
      'max_length' => 195,
      'required' => false
    ), array(
      'max_length' => 'Le texte est trop long. Il faut %max_length% caractères maximums.'
    ));
    
    $this->setValidator['keywords'] = new sfValidatorString(array(
      'max_length' => 255,
      'required' => false
    ), array(
    	'max_length' => 'Le texte est trop long. Il faut %max_length% caractères maximums.'
    ));
    
    $this->widgetSchema->setHelps(array(
      'title'       => 'Your title for search engines',
      'description' => 'Your description for search engines',
      'keywords'    => 'Your keywords for search engines'
    ));
  }
  
}
