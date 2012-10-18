<?php

/**
 *
 * @package    peanut
 * @subpackage settings
 * @author     Alexandre 'pocky' Balmes <falbalmes@gmail.com>
 */

class BaseSettingsActions extends sfActions
{
  public function executeInterface(sfWebRequest $request)
  {
    $this->form = new interfaceSettingsForm();
    
    if($request->isMethod('post'))
    { 
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      
      if($this->form->isValid())
      {
        $interface = array();
        $bdd = unserialize(peanutConfig::get('interface'));
        
        foreach($this->form->getValues() as $name => $value)
        {
          if($name == 'logo' || $name == 'background'){ 
            if($value){ 
              $extension = $value->getExtension($value->getOriginalExtension());
              $value->save(sfConfig::get('sf_upload_dir') . '/admin/' . $value->getOriginalName());
              $interface[$name] = $value->getOriginalName();
            }
            else{
              $interface[$name] = $bdd[$name];
            }
          }
          else{
            $interface[$name] = $value;
          }
        }
        peanutConfig::set('interface', serialize($interface));
        
      }

    }
  }
  
  public function executeLang(sfWebRequest $request)
  {
    $this->form = new langSettingsForm();
    
    if($request->isMethod('post'))
    { 
      $this->form->bind($request->getParameter('settings'));
      
      if($this->form->isValid())
      {

        if($this->form->getValue('lang')){
        
          $options = $this->form->getWidgetSchema()->getFields();
          $options = $options['lang']->getChoices();

          foreach($this->form->getValue('lang') as $language){
            $trad[] = $options[$language];
          }
          $lang = $this->form->getValue('lang');
        }
        else{
          $trad = "Français";
          $lang = array('FR');
        }
        
        $lang = array(
          'lang'  => $lang,
          'trad'  => $trad
        );
        peanutConfig::set('lang', serialize($lang));
        
      }

    }
  }
  
  public function executeFirstlang(sfWebRequest $request)
  {
    $this->form = new firstlangSettingsForm();
    
    if($request->isMethod('post'))
    { 
      $this->form->bind($request->getParameter('settings'));
      
      if($this->form->isValid())
      {
        peanutConfig::set('firstlang', $this->form->getValue('firstlang'));
      }

    }
  }
  
  
  public function executeSociety(sfWebRequest $request)
  {
    $this->form = new societySettingsForm();
    
    if($request->isMethod('post'))
    { 
      $this->form->bind($request->getParameter('settings'));
      
      if($this->form->isValid())
      {
        
        peanutConfig::set('society', $this->form->getValue('society'));
        peanutConfig::set('url', $this->form->getValue('url'));
        peanutConfig::set('tel', $this->form->getValue('tel'));

        $adr = array(
          'street-address'  => $this->form->getValue('street-address'),
          'locality'        => $this->form->getValue('locality'),
          'region'          => $this->form->getValue('region'),
          'postal-code'     => $this->form->getValue('postal-code'),
          'country-name'    => $this->form->getValue('country-name')
        );
        
        peanutConfig::set('adr', serialize($adr));
        
      }

    }
  }
  
  public function executeGoogle(sfWebRequest $request)
  {
    $this->form = new googleSettingsForm();
    
    if($request->isMethod('post'))
    { 
      $this->form->bind($request->getParameter('settings'));
      
      if($this->form->isValid())
      {
        
        foreach($this->form->getValues() as $name => $value)
        {
          peanutConfig::set($name, $value);
        }
        
      }

    }
  }
  
  public function executeGeneral(sfWebRequest $request)
  {
    $this->form = new generalSettingsForm();
    
    if($request->isMethod('post'))
    { 
      $this->form->bind($request->getParameter('settings'));
      
      if($this->form->isValid())
      {
        
        foreach($this->form->getValues() as $name => $value)
        {
          peanutConfig::set($name, $value);
        }
        
      }

    }
  }
  
  public function executeContact(sfWebRequest $request)
  {
    $this->form = new contactSettingsForm();
    
    if($request->isMethod('post'))
    { 
      $this->form->bind($request->getParameter('settings'));
      
      if($this->form->isValid())
      {
        foreach($this->form->getValues() as $name => $value)
        {
          peanutConfig::set($name, $value);
        }
      }
    }
  }
}