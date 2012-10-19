<?php

/**
 * PluginpeanutPageTranslation form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutPageTranslationForm extends BasepeanutPageTranslationForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();
    
    $this->useFields(array(
      'title',
      'slug',
      'content',
      'excerpt'
    ));
    
    $this->widgetSchema['title'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'required'    => true,
        'placeholder' => 'My Title'
    ));
    
    $this->widgetSchema['slug'] = new sfWidgetFormHtml5InputText($options = array(), $attributes = array(
        'placeholder' => 'my-title'
    ));
    
    $this->widgetSchema['content'] = new sfWidgetFormCKEditor(array('jsoptions'=>array(
    	'customConfig'				      => '/lib/ckeditor/config.js',
    	'filebrowserBrowseUrl'            => '/lib/elfinder-1.1/elfinder.php.html',
    	'filebrowserImageBrowseUrl'       => '/lib/elfinder-1.1/elfinder.php.html'
    )));
    
    $this->validatorSchema['content'] = new sfValidatorString($options = array(
      'required'  => true
    ),$messages = array(
      'required'  => 'Fill this please'
    ));
    
    $this->widgetSchema['excerpt'] = new sfWidgetFormTextarea($options = array(), $attributes = array(
        'placeholder' => 'Excerpt or aside for my content'
    ));
    
    $this->widgetSchema->setHelps(array(
      'title'         => 'The item title (required)',
      'slug'          => 'Not required but maybe usefull for your SEO',
      'content'       => 'The item content (required)'
    ));
  }
}
