<?php

/**
 * googleSettings form.
 *
 * @package    peanut2
 * @subpackage form
 * @author     AlexandrepockyBalmes
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class interfaceSettingsForm extends peanutSettingsForm
{
  public function configure()
  {
    $interface = unserialize(peanutConfig::get('interface'));
        
    //echo "<pre>"; print_r($interface); echo "</pre>"; die();
    
    $this->widgetSchema['title'] = new sfWidgetFormHtml5InputText();
    if($interface['title']){ $this->widgetSchema['title']->setDefault($interface['title']); }
    $this->widgetSchema['title']->setLabel('Interface title');
    
    $this->widgetSchema['color'] = new sfWidgetFormHtml5InputColor(array(
        'template.html' => ''
    ));
    if($interface['color']){ $this->widgetSchema['color']->setDefault($interface['color']); }
    $this->widgetSchema['color']->setLabel('Interface color');

    $this->widgetSchema['logo'] = new sfWidgetFormInputFile(array(
        'label' => 'Logo',
    ));

    $this->validatorSchema['logo'] = new sfValidatorFile(array(
        'required'             => false,
        'mime_types'           => 'web_images',
        'path'                 => sfConfig::get('sf_upload_dir').'/admin',
        'validated_file_class' => 'peanutValidatedFile',
    ));

    $this->widgetSchema['background'] = new sfWidgetFormInputFile(array(
        'label' => 'Background',
    ));

    $this->validatorSchema['background'] = new sfValidatorFile(array(
        'required'             => false,
        'mime_types'           => 'web_images',
        'path'                 => sfConfig::get('sf_upload_dir').'/admin',
        'validated_file_class' => 'peanutValidatedFile',
    ));
  }
}
