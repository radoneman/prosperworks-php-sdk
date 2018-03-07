<?php
namespace Prosperworks\Entities;

class SocialProfile {
    // string - The URL of a social profile.
    public $url;
    // 	string - The category of the social profile. Valid categories: linkedin, twitter, googleplus, facebook, youtube, quora, foursquare, klout, gravatar, other
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