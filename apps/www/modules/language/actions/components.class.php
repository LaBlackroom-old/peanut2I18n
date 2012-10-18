<?php

  class languageComponents extends sfComponents
  {
    public function executeLanguage(sfWebRequest $request)
    {
      $lang = unserialize(peanutConfig::get('lang'));
      
      if($lang['lang']){
        foreach($lang['lang'] as $key => $value){          
          $tabLang[] = strtolower($value);
          $tabTrad[] = $lang['trad'][$key];
        }
      }
      else{
        $tabLang = array('fr');
        $tabTrad = array('Français');
      }
      
      $this->language = array(
          'lang' => $tabLang,
          'trad' => $tabTrad
      );
    }
  }