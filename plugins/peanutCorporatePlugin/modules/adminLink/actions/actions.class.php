<?php

require_once dirname(__FILE__).'/../lib/adminLinkGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminLinkGeneratorHelper.class.php';

/**
 * adminLink actions.
 *
 * @package    peanutCorporatePlugin
 * @subpackage adminLink
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminLinkActions extends autoAdminLinkActions
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
