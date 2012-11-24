<?php

// performs all the CRUD operation
class PersonModel {

    public $pdo;

    function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // fetch the person object from the database and set it in the object
    function fetchPerson(Person $person) {


    }

    // get the Person from database by id
    function getPersonById ($id) {
        $person = null;
        if (!is_numeric($id)) {
            throw new Exception('Person ID must be a number');
        }
        // 1. make a query
        $sql = 'select  person_id, 
                        p.name as person_name,
                        p.age as person_age

                        from person p where person_id = :id';

        // 2. get the PreparedStatement object out of PDO
        $statement = $this->pdo->prepare($sql);

        // 3. bind parameters if any
        // -- if its a value like a string or number in literal form use bindValue() 
        // -- if its a variable you are refering use bindParam
        $statement->bindParam('id', $id, PDO::PARAM_INT);

        // 4. execute the query
        $statement->execute();

        // 5. fetch the rows and iterate
        if ($rows = $statement->fetch(PDO::FETCH_ASSOC)) {
            $person = new Person();
            foreach ($rows as $key => $value) {
                $person->$key = $value; // invokes __set() method of Person object
            }
        }

        return $person;
    }

    // update the Person with the following details
    function updatePerson (Person $person) {

    }

    // delete the Person
    function deletePerson (Person $person) {

    }

    // get all the users list with the subjects
    function getAllUsers() {

        $personList = array();
        $prevKey = null;
        $person = null;

        // person and subject has many to many relationship
        // this query brings all the person and their corresponding subjects in one result set
        $sql = 'select 
                    person_id, subject_id, 
                    person_subject_id, person_name, 
                    person_age, s.name AS subject_name
                FROM (
                    select person_id, p.name AS person_name, p.age AS person_age, person_subject_id, fk_subject_id
                    FROM person p, person_subject ps
                    WHERE p.person_id = ps.fk_person_id
                    ORDER BY p.person_id
                )p1
                LEFT OUTER JOIN subject s ON s.subject_id = p1.fk_subject_id
                LIMIT 0 , 30';

        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        while ($rows = $statement->fetch(PDO::FETCH_ASSOC)) {
            // the current key which identifies the person tuple is unique
            $currentKey = $rows['person_id'];

            // check if this is the key we already have gone by
            if ($prevKey != $currentKey) {
                // if the person object is set this means we need to add the person to list
                if (isset($person)) {
                    array_push($personList, $person);
                    // reset the person object
                    $person = null;
                }
                // update the key
                $prevKey = $currentKey;
            }

            if (!isset($person)) {
                // person has many subjects so making instance only if 
                // this is a new person
                $person = new Person();
            }
            $subject = new PersonSubject();
            foreach ($rows as $key => $value) {
                // see the magical functions __set() in PersonSubject and Person bean class
                $person->$key = $value;
                $subject->$key = $value;
            }
            // as subjects are part of Person Object
            array_push($person->subjects, $subject);
        }
        // for the last person in the list
        if (isset($person)) {
            array_push($personList, $person);
            $person = null;
        }

        return $personList;
    }



}

?>