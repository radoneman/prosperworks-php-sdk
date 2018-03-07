<?php
namespace Prosperworks\Entities;

class PhoneNumber {
    // string - A phone number.
    public $number;
    // 	string - The category of the phone number.
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