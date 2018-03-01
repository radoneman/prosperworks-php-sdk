<?php
namespace Prosperworks\Entities;

class Activity
{
    // string - The street part of the address
    public $parent;
    // string - The city part of the address
    public $type;
    // string - The state part of the address
    public $details;

    /**
     * Default constructor
     * @param array $properties
     */
    public function __construct(Array $properties = array()) {
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }
}