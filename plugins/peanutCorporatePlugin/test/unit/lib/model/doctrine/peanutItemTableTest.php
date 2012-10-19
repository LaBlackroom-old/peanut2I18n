<?php

include(dirname(__FILE__).'/../../../../bootstrap/unit.php');

$configuration = ProjectConfiguration::getApplicationConfiguration( 'www', 'test', true);
$databaseManager = new sfDatabaseManager($configuration);

if(null == Doctrine_Core::getTable('peanutItem')->showItem(1)->fetchOne())
{
  Doctrine_Core::loadData(dirname(__FILE__).'/../../../../fixtures');
}

$t = new lime_test(8);


/*
 * 
 */

$t->comment('Get an instance');
$item = Doctrine_Core::getTable('peanutItem')->getInstance();
$t->ok($item, 'Current instance is peanutItem');

/*
 * 
 */
$t->comment('Get an item');
$item = Doctrine_Core::getTable('peanutItem')->getItem();
$t->ok($item, 'I got an object!');

/*
 * 
 */
$t->comment('Show an item');
$item = Doctrine_Core::getTable('peanutItem')->showItem(1)->fetchOne();
$t->is($item['title'], 'Accueil', 'The title is Accueil');

$item = Doctrine_Core::getTable('peanutItem')->showItem('accueil')->fetchOne();
$t->is($item['id'], '1', 'The id is 1');

$item = Doctrine_Core::getTable('peanutItem')->showItem('1', 'page')->fetchOne();
$t->is($item['type'], 'page', 'The status of 1 is page');

/*
 * 
 */
$t->comment('Get all items');
$item = Doctrine_Core::getTable('peanutItem')->getItems('draft')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 draft item');

/*
 * 
 */
$t->comment('Get all items for a menu');

$item = Doctrine_Core::getTable('peanutItem')->getItemsByMenu(1, 'draft')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 item in this menu (2)');

/*
 * 
 */
$t->comment('Get all items for an author');
$item = Doctrine_Core::getTable('peanutItem')->getItemsByAuthor(1, 'draft')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '2', 'There are 2 items for this author (1)');