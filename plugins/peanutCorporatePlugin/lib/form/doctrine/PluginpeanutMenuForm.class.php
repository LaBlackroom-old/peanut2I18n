<?php

/**
 * peanutMenu form.
 *
 * @package    peanutCorporatePlugin
 * @subpackage form
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com> <albalmes@gmail.com>
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginpeanutMenuForm extends BasepeanutMenuForm
{
  public function setup()
  {
    parent::setup();

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
    
    /**
     *
     * NestedSet Menu
     */
     
    $this->widgetSchema['parent'] = new sfWidgetFormDoctrineChoiceNestedSet(array(
      'model'     => 'peanutMenu',
      'add_empty' => 'This is a first level menu',
    ));
    
    $this->validatorSchema['parent'] = new sfValidatorDoctrineChoiceNestedSet(array(
      'required' => false,
      'model'    => 'peanutMenu',
      'node'     => $this->getObject(),
    ));
    
    if($this->getObject()->getNode()->hasParent())
    {
      $this->setDefault('parent', $this->getObject()->getNode()->getParent()->getId());
    }
    
    $this->setValidator('parent', new sfValidatorDoctrineChoiceNestedSet(array(
      'required'    => false,
      'model'       => 'peanutMenu',
      'node'        => $this->getObject(),
    )));
    
    $this->getValidator('parent')->setMessage('node', 'A menu cannot be made a descend of itself!');
    
  }
  
  protected function doSave($con = null)
  {
    parent::doSave($con);
    
    $node = $this->object->getNode();

    if($this->getValue('parent'))
    {
      $parent = Doctrine::getTable('peanutMenu')->findOneById($this->getValue('parent'));
      if($this->isNew() || $this->getObject()->getNode()->hasParent())
      {
        $this->getObject()->getNode()->insertAsLastChildOf($parent);
      }
      else
      {
        return parent::doSave($con);
      }
    }
    else
    {
      $categoryTree = Doctrine::getTable('peanutMenu')->getTree();
      if($this->isNew())
      {
        $categoryTree->createRoot($this->getObject());
      }
      else
      {
        $this->getObject()->getNode()->makeRoot($this->getObject()->getId());
      }
    }
  }
}
