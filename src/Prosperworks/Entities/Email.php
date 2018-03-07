<?php
namespace Prosperworks\Entities;

class Email {
    // string - An email address.
    public $email;
    // 	string - The category of the email address.
    public $category;
    /**
     * Default constructor
     * @param array $properties
     */
    public function __construct(Array $properties=array()){
        foreach($properties as $key => $value){
            $this->{$key} = $value;
        }
    }
}