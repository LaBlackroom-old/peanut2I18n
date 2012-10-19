<?php

include(dirname(__FILE__).'/../../../../bootstrap/unit.php');

$configuration = ProjectConfiguration::getApplicationConfiguration( 'www', 'test', true);
$databaseManager = new sfDatabaseManager($configuration);
$table = Doctrine_Core::getTable('peanutLink');


if(null == Doctrine_Core::getTable('peanutItem')->showItem(1)->fetchOne())
{
  Doctrine_Core::loadData(dirname(__FILE__).'/../../../../fixtures');
}

$t = new lime_test(10);


/*
 * 
 */

$t->comment('Get an instance');
$item = Doctrine_Core::getTable('peanutPage')->getInstance();
$t->ok($item, 'Current instance is peanutPage');

/*
 * 
 */
$t->comment('Get an item');
$item = Doctrine_Core::getTable('peanutPage')->getItem();
$t->ok($item, 'I got an object!');

/*
 * 
 */
$t->comment('Show an item');
$item = Doctrine_Core::getTable('peanutPage')->showItem(1)->fetchOne();
$t->is($item['title'], 'Accueil', 'The title is Accueil');

$item = Doctrine_Core::getTable('peanutPage')->showItem('accueil')->fetchOne();
$t->is($item['id'], '1', 'The id is 1');

$item = Doctrine_Core::getTable('peanutPage')->showItem('1')->fetchOne();
$t->is($item['type'], 'page', 'The status of 1 is page');


/*
 * 
 */
$t->comment('Get all items');

$item = Doctrine_Core::getTable('peanutPage')->getItems('publish')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 published item');


/*
 * 
 */
$t->comment('Get all items for a menu');

$item = Doctrine_Core::getTable('peanutPage')->getItemsByMenu(1)->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 item in this menu (1)');

/*
 * 
 */
$t->comment('Get all items for a menu');

$item = Doctrine_Core::getTable('peanutPage')->getItemsByMenuAndStatus(1, 'publish')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 item in this menu (1)');


/*
 * 
 */
$t->comment('Get all items for an author');
$item = Doctrine_Core::getTable('peanutPage')->getItemsByAuthor(1)->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 item for this author (1)');

/*
 * 
 */
$t->comment('Get all items for an author');
$item = Doctrine_Core::getTable('peanutPage')->getItemsByAuthorAndStatus(1, 'publish')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 item for this author (1)');
