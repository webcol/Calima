<?php
ini_set('include_path', ini_get('include_path').':./library/');

require_once 'ORM/Object.php';
require_once 'ORM/DataSource/Db.php';
require_once 'Zend/Db.php';

use ORM\Object;
use ORM\DataSource\Db;

$db = Zend_Db::factory('Pdo_Mysql', array(
	'host'     => '127.0.0.1',
    'username' => 'root',
    'password' => '',
    'dbname'   => 'sakila'
));

$dataSource = new Db($db);
Object::setDataSource($dataSource);

///////////////////////////////////////////////////////////////////////////////

class Film extends Object {}

echo "The database currently contains " . Film::count() . " movies.\n";
echo "The title of the first movie in the database is: " . Film::findFirst()->title . "\n";

$film = Film::findFirst(array('title' => 'RANDOM GO'));
echo "{$film->title}'s description is:\n{$film->description}\n";

echo "Films with a title that starts with a T and a rental rate of 2.99:\n";
$films = Film::find(array('title' => 'T*', 'rental_rate' => '2.99'));
foreach ($films as $film) {
    echo "{$film->title}\n";
}

echo "There are " . Film::count(array('rental_rate' => '4.99')) .  " movie(s) with a rental rate of 4.99.\n";

///////////////////////////////////////////////////////////////////////////////

class Actor extends Object {}

$actor = new Actor();
$actor->first_name = 'Crash';
$actor->last_name = 'Dummy';
$actor->save();

echo "The id of {$actor->first_name} {$actor->last_name} is: {$actor->actor_id}\n";

///////////////////////////////////////////////////////////////////////////////

$film = Film::findFirstByTitle('RANDOM GO');
echo "{$film->title}'s description is:\n{$film->description}\n";

echo "Films with a title that starts with a T and a rental rate of 2.99:\n";
$films = Film::findByTitleAndRentalRate('T*', '2.99');
foreach ($films as $film) {
    echo "{$film->title}\n";
}

echo "There are " . Film::countByRentalRate('4.99') .  " movie(s) with a rental rate of 4.99.\n";

///////////////////////////////////////////////////////////////////////////////

class Film_Actor extends Object {}

echo "Actor count before: " . Actor::count() . "\n";

try {
	Actor::transaction(function() {
	   $actor = new Actor();
	   $actor->first_name = 'John';
	   $actor->last_name = 'Doe';
	   $actor->save();
	   
	   echo "Actor count after save: " . Actor::count() . "\n";   
	   
	   $film = Film::findByTitle('RANDOM');
	   
	   $link = new Film_Actor();
	   $link->film_id = $film->film_id;
	   $link->actor_id = $actor->actor_id;
	   $link->save();
	});
} catch (Exception $ex) {
    echo "Exception:\n" . $ex->getMessage() . "\n";
}

echo "Actor count after exception: " . Actor::count() . "\n";