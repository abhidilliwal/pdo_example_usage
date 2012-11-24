<?php

require_once 'config.php';
require_once 'Classes.php';
require_once 'PersonModel.php';

    $dbh = new PDO($dsn, $user, $password);

    // for persistent connection uncomment the below lines,
    // $dbh = new PDO($dsn, $user, $password, array(
    // PDO::ATTR_PERSISTENT => true
    // ));

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    $dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);


    $pmodel = new PersonModel($dbh);

    $person = $pmodel->getPersonById(1);

    var_dump($person);

    $personList = $pmodel->getAllUsers();

    foreach ($personList as $person) {
        var_dump($person);
    }


?>