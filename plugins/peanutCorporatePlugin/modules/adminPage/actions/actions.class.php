<?php

require_once dirname(__FILE__).'/../lib/adminPageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminPageGeneratorHelper.class.php';

/**
 * adminPage actions.
 *
 * @package    peanutCorporatePlugin
 * @subpackage adminPage
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminPageActions extends autoAdminPageActions
{
  public function buildQuery()
  {
    return parent::buildQuery()
      ->leftJoin('r.peanutMenu as m ON r.menu = m.id')
      ->leftJoin('r.peanutSeo as s ON r.seo_id = s.id')
      ->leftJoin('r.Translation as t ON r.id = t.id')
      ->leftJoin('r.sfGuardUser as u ON r.author = u.id');
  }
}
