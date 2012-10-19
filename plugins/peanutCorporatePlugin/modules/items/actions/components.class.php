<?php

/**
 * items actions.
 *
 * @package    peanutCorporatePlugin
 * @subpackage items
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class itemsComponents extends sfComponents
{
  public function executeMainMenu(sfWebRequest $request)
  {
    echo "cultureAA : " . $this->culture = $request->getParameter('sf_culture');
    
    $items = Doctrine_Core::getTable('peanutItem')->getItemsByMenu(1, 'publish', $this->culture);
    $this->items = $items->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
  }

  public function executeFooterMenu(sfWebRequest $request)
  {
    $this->culture = $request->getParameter('sf_culture');
    
    $items = Doctrine_Core::getTable('peanutLink')->getItemsByMenu(2, 'publish', $this->culture);
    $this->items = $items->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
  }
}
