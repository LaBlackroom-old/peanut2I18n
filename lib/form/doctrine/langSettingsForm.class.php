<?php

/**
 * peanutSettings form.
 *
 * @package    peanut2
 * @subpackage form
 * @author     AlexandrepockyBalmes
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class langSettingsForm extends peanutSettingsForm
{
  public function configure()
  {
    $lang = unserialize(peanutConfig::get('lang'));
    $default = array();
    $user = self::getValidUser();
    
    /* Pour connaitre l'iso639-2 des différentes langues : http://hapax.qc.ca/iso639-2.fr.htm */
    /* Pour l'ISO 3166 : http://userpage.chemie.fu-berlin.de/diverse/doc/ISO_3166.html */
    
    $this->widgetSchema['lang'] = new sfWidgetFormChoice(array(
        'multiple' => true,
        'expanded' => true,
        'choices' => array(
            'SK' => 'Albanais',
            'DE' => 'Allemand',
            'EN' => 'Anglais',
            'AR' => 'Arabe',
            'HY' => 'Arménien',
            'BE' => 'Biélorusse',
            'MY' => 'Birman',
            'BR' => 'Breton',
            'BG' => 'Bulgare',
            'CA' => 'Catalan',
            'ZH' => 'Chinois',
            'KO' => 'Coréen',
            'CO' => 'Corse',
            'HR' => 'Croate',
            'DA' => 'Danois',
            'ES' => 'Espagnol',
            'FI' => 'Finnois',
            'FR' => 'Français',
            'CY' => 'Gallois',
            'KA' => 'Géorgien',
            'GR' => 'Grec',
            'KL' => 'Groenlandais',
            'HU' => 'Hongrois',
            'ID' => 'Indonésien',
            'GA' => 'Irlandais',
            'IS' => 'Islandais',
            'IT' => 'Italien',
            'JA' => 'Japonais',
            'KK' => 'Kazakh',
            'LV' => 'Letton',
            'LT' => 'Lituanien',
            'LU' => 'Luxembourgeois',
            'MK' => 'Macédonien',
            'MG' => 'Malgache',
            'MT' => 'Maltais',
            'MO' => 'Moldave',
            'MN' => 'Mongol',
            'NL' => 'Néerlandais',
            'NE' => 'Népalais',
            'NO' => 'Norvégien',
            'PL' => 'Polonais',
            'PT' => 'Portugais',
            'RO' => 'Roumain',
            'RU' => 'Russe',
            'SL' => 'Slovène',
            'SU' => 'Soundanais',
            'SV' => 'Suédois',
            'TY' => 'Tahitien',
            'CS' => 'Tchèque',
            'TR' => 'Turc',
            'UK' => 'Ukrainien',
            'VI' => 'Vietnamien',
         )
    ));
    
    if($lang['lang']){
      foreach($lang['lang'] as $key => $value){
        $default[$key] = $value;
      }  
    }
    
    $this->widgetSchema['lang']->setDefault($default);
  }
}
