<?php

/**
 * PluginpeanutLinkTranslation form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutLinkTranslationForm extends BasepeanutLinkTranslationForm
{
  public function setup()
  {
    parent::setup();
    
    $this->useFields(array(
     'title',
     'slug',
     'url',
     'content'
    ));
    
    $this->widgetSchema['url'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'required'    => true,
        'placeholder' => 'http://www.mywebsite.com'
    ));
    
    $this->widgetSchema['title'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'required'    => true,
        'placeholder' => 'My Title'
    ));
    
    $this->widgetSchema['slug'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'placeholder' => 'my-title'
    ));

    $this->widgetSchema['content'] = new sfWidgetFormTextarea($options = array(), $attributes = array(
        'placeholder' => 'Simple description about my link'
    ));
    
    $this->widgetSchema->setHelps(array(
      'title'         => 'The item title (required)',
      'slug'          => 'Not required but maybe usefull for your SEO',
      'content'       => 'The item content (required)'
    ));
  }
  
}
