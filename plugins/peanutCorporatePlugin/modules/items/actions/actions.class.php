<?php

/**
 * items actions.
 *
 * @package    peanutCorporatePlugin
 * @subpackage items
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class itemsActions extends peanutActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if(!$request->getParameter('sf_culture'))
    {
      if($this->getUser()->isFirstRequest())
      {
        $culture = $request->getPreferredCulture(array('en', 'fr'));
        $this->getUser()->setCulture($culture);
        $this->getUser()->isFirstRequest(false);
      }
      else
      {
        $culture = $this->getUser()->getCulture();
      }
      
      $this->redirect('localized_homepage');
      
    }
    
    $this->culture = $request->getParameter('sf_culture');
    
    $items = Doctrine_Core::getTable('peanutPage')->getItemsByMenu(1);
    $this->item = $items->fetchOne();

    $this->forward404Unless($this->item);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->culture = $request->getParameter('sf_culture');
    
    $item = Doctrine_Core::getTable('peanutItem')->showItem($this->getRequestParameter('slug'));
    $this->item = $item->fetchOne();
    
    $this->forward404Unless($this->item);
  }

  public function executeList(sfWebRequest $request)
  {
    $this->culture = $request->getParameter('sf_culture');
    
    $items = Doctrine_Core::getTable('peanutItem')->getItems('publish', $this->culture);
    $this->items = $items->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

    $this->forward404Unless($this->items);
  }

  public function executeListByAuthor(sfWebRequest $request)
  {
    $this->culture = $request->getParameter('sf_culture');
    
    $items = Doctrine_Core::getTable('peanutPage')->getItemsByAuthor($this->getRequestParameter('author'), 'publish', $this->culture);
    $this->items = $items->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

    $this->forward404Unless($this->items);
  }

  public function executeListByMenu(sfWebRequest $request)
  {
    $this->culture = $request->getParameter('sf_culture');
    
    $items = Doctrine_Core::getTable('peanutItem')->getItemsByMenu($this->getRequestParameter('menu'), 'publish', $this->culture);
    $this->items = $items->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

    $this->forward404Unless($this->items);
  }

  public function executeListLinkByRelation(sfWebRequest $request)
  {
    $this->culture = $request->getParameter('sf_culture');
    
    $links = Doctrine_core::getTable('peanutLink')->getItemsByRelation($this->getRequestParameter('relation'), 'publish', $this->culture);
    $this->items = $links->execute(array(), Doctrine_Core::HYDRATE_ARRAY);

    $this->forward404Unless($this->items);
  }

}
