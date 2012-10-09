<?php

class myUser extends sfBasicSecurityUser
{
  
  public function isFirstRequest($boolean = null)
  {
    
    if(is_null($boolean))
    {
      return $this->getAttribute('first_request', true);
    }
    
    $this->setAttribute('first_request', $boolean);

    if(peanutConfig::get('firstlang')):
      $lang = strtolower(peanutConfig::get('firstlang'));
    else:  
      $lang = 'fr';
    endif;

    $this->setCulture($lang); 
  }
  
}
