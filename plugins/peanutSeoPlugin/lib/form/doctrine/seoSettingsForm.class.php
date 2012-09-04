<?php

/**
 * googleSettings form.
 *
 * @package    peanut2
 * @subpackage form
 * @author     AlexandrepockyBalmes
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class seoSettingsForm extends peanutSettingsForm
{
  public function configure()
  { 
    $this->widgetSchema['meta_title'] = new sfWidgetFormHtml5InputText();
    $this->widgetSchema['meta_title']->setDefault(peanutConfig::get('meta_title'));
    $this->widgetSchema['meta_title']->setLabel('Your meta title');
    
    $this->widgetSchema['meta_description'] = new sfWidgetFormHtml5InputText();
    $this->widgetSchema['meta_description']->setDefault(peanutConfig::get('meta_description'));
    $this->widgetSchema['meta_description']->setLabel('Your meta description');
    
    $this->widgetSchema['meta_keywords'] = new sfWidgetFormHtml5InputText();
    $this->widgetSchema['meta_keywords']->setDefault(peanutConfig::get('meta_keywords'));
    $this->widgetSchema['meta_keywords']->setLabel('Your meta keywords');
    
    $this->widgetSchema['meta_robots'] = new sfWidgetFormHtml5InputText();
    $this->widgetSchema['meta_robots']->setDefault(peanutConfig::get('meta_robots'));
    $this->widgetSchema['meta_robots']->setLabel('Your meta robots');
    
    $this->widgetSchema['meta_language'] = new sfWidgetFormHtml5InputText();
    $this->widgetSchema['meta_language']->setDefault(peanutConfig::get('meta_language'));
    $this->widgetSchema['meta_language']->setLabel('Your meta language');
  }
}
