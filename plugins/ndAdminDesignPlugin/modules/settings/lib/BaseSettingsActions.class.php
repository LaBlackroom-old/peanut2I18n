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
}