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
    
    $this->widgetSchema['color'] = new sfWidgetFormHtml5InputText();
    if($interface['color']){ $this->widgetSchema['color']->setDefault($interface['color']); }
    $this->widgetSchema['color']->setLabel('Interface color');
    
    if(isset($interface['logo'])){
      $dir_logo = '/uploads/admin/';
      $file_logo = $interface['logo'];
    }  
    else {
      $dir_logo = '/images/';
      $file_logo = 'default_logo.png';
    }

    $this->widgetSchema['logo'] = new sfWidgetFormInputFileEditable(array(
        'label' => 'Logo',
        'file_src' => $dir_logo . $file_logo,
        'is_image' => true,
        'edit_mode' => !$this->isNew(),
        'template' => $this->_getImageUrl($file_logo)
    ));

    $this->validatorSchema['logo'] = new sfValidatorFile(array(
        'required'             => false,
        'mime_types'           => 'web_images',
        'path'                 => sfConfig::get('sf_upload_dir').'/admin',
        'validated_file_class' => 'peanutValidatedFile',
    ));

    if(isset($interface['background'])){
      $dir_background = '/uploads/admin/';
      $file_background = $interface['background'];
    }  
    else {
      $dir_background = '/images/';
      $file_background = 'default_background.png';
    }
    
    $this->widgetSchema['background'] = new sfWidgetFormInputFileEditable(array(
        'label' => 'Background',
        'file_src' => $dir_background . $file_background,
        'is_image' => true,
        'edit_mode' => !$this->isNew(),
        'template' => $this->_getImageUrl($file_background)
    ));

    $this->validatorSchema['background'] = new sfValidatorFile(array(
        'required'             => false,
        'mime_types'           => 'web_images',
        'path'                 => sfConfig::get('sf_upload_dir').'/admin',
        'validated_file_class' => 'peanutValidatedFile',
    ));
  }
  
  protected function _getImageUrl($object) {
    $tpl = '%file% %input% %delete% %delete_label%';
    
    if('' == $object) {
      $tpl = '%input%';
    }
    
    return $tpl;
  }
}
