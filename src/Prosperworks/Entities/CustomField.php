<?php
namespace Prosperworks\Entities;

class CustomField {
    // number - The id of the Custom Field Definition for which this Custom Field stores a value.
    public $custom_field_definition_id;
    // mixed - The value (number, string, option id, or timestamp) of this Custom Field.
    public $value;
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