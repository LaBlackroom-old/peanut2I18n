<?php

include(dirname(__FILE__).'/../../../../bootstrap/unit.php');

$configuration = ProjectConfiguration::getApplicationConfiguration( 'www', 'test', true);
$databaseManager = new sfDatabaseManager($configuration);
$table = Doctrine_Core::getTable('peanutLink');


if(null == Doctrine_Core::getTable('peanutItem')->showItem(1)->fetchOne())
{
  Doctrine_Core::loadData(dirname(__FILE__).'/../../../../fixtures');
}

$t = new lime_test(9);


/*
 * 
 */

$t->comment('Get an instance');
$item = Doctrine_Core::getTable('peanutLink')->getInstance();
$t->ok($item, 'Current instance is peanutLink');

/*
 * 
 */
$t->comment('Get an item');
$item = Doctrine_Core::getTable('peanutLink')->getItem();
$t->ok($item, 'I got an object!');

/*
 * 
 */
$t->comment('Show an item');
$item = Doctrine_Core::getTable('peanutLink')->showItem(2)->fetchOne();
$t->is($item['title'], 'contact', 'The title is contact');

$item = Doctrine_Core::getTable('peanutItem')->showItem('contact')->fetchOne();
$t->is($item['id'], '2', 'The id is 2');

$item = Doctrine_Core::getTable('peanutItem')->showItem('2', 'link')->fetchOne();
$t->is($item['type'], 'link', 'The status of 2 is link');


/*
 * 
 */
$t->comment('Get all items');
$item = Doctrine_Core::getTable('peanutLink')->getItems('draft')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 draft item');

/*
 * 
 */
$t->comment('Get all items for a menu');

$item = Doctrine_Core::getTable('peanutLink')->getItemsByMenu(1, 'draft')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 item in this menu (1)');

/*
 * 
 */
$t->comment('Get all items for an author');
$item = Doctrine_Core::getTable('peanutLink')->getItemsByAuthor(1, 'draft')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 item for this author (1)');

/*
 * 
 */

$t->comment('Get all items where relation is co-worker');
$item = Doctrine_Core::getTable('peanutLink')->getItemsByRelation('co-worker', 'draft')->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
$t->is(count($item), '1', 'There are 1 item for this relation (co-worker)');
