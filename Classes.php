<?php

class Person{
    public $name;
    public $age;
    public $id;

    /**
     * @type Array of PersonSubject
     */
    public $subjects = null;

    function __construct($id = null, $name = null, $age = null) {
        $this->name = $name;
        $this->id = $id;
        $this->age = $age;
        $this->subjects = array();
    }

    function __set($name, $value) {
        switch ($name) {
            case 'person_id':
                $this->id = (int)$value;
                break;
            case 'person_name':
                $this->name = (string)$value;
                break;
            case 'person_age': 
                $this->age = (int)$value;
                break;
        }
    }

}


class Subject{
    public $name;
    public $id;

    function __construct() {
    }

    function __set($name, $value) {
        switch ($name) {
            case 'subject_id':
                $this->id = (int)$value;
                break;
            case 'subject_name':
                $this->name = (string)$value;
                break;
        }
    }

}


class PersonSubject extends Subject {
    public $person_subject_id;

    function __construct () {

    }

    function __set($name, $value) {
        switch ($name) {
            case 'person_subject_id':
                $this->person_subject_id = (int)$value;
                break;
            default:
                parent::__set($name, $value);
                break;
        }
    }

}


?>