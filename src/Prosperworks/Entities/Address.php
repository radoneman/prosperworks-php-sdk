<?php
namespace Prosperworks\Entities;

class Address {
    // string - The street part of the address
    public $street;
    // string - The city part of the address
    public $city;
    // string - The state part of the address
    public $state;
    // string - The postal/zip code part of the address
    public $postal_code;
    // string - the country part of the address
    public $country;
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