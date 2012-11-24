<?php

include_once 'main.php';
include_once 'Classes.php';


$sql = "select * from person where person_id > :id";
$statement = $dbh->prepare($sql);

$statement->bindValue('id', 0, PDO::PARAM_INT);


$e = $statement->execute();
var_dump($e);

$statement->bindColumn('person_id', $id, PDO::PARAM_INT);
$statement->bindColumn('name', $name, PDO::PARAM_STR);
$statement->bindColumn('age', $age, PDO::PARAM_INT);

echo '$s = $statement->fetch(PDO::FETCH_BOUND);<br />';
$s = $statement->fetch(PDO::FETCH_BOUND);
var_dump($s);

var_dump($id);
var_dump($name);
var_dump($age);

echo '$s = $statement->fetch(PDO::FETCH_ASSOC);<br />';
$s = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($s);

echo '$s = $statement->fetch(PDO::FETCH_OBJ);<br />';
$s = $statement->fetch(PDO::FETCH_OBJ);
var_dump($s);


?>