<?php
namespace Prosperworks\Entities;

class Website {
    // string - The URL of a social profile.
    public $url;
    // 	string - The category of the social profile.
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