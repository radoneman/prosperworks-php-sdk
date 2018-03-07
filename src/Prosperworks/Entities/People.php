<?php
namespace Prosperworks\Entities;

class People
{
    // number - Unique identifier for the Person.
    public $id;
    // string - The first and last name of the Person
    public $name;
    // string - The prefix of the person
    public $prefix;
    // string - The first name of the person
    public $first_name;
    // string - The middle name of the person
    public $middle_name;
    // string - The last name of the person
    public $last_name;
    // string - The suffix of the person
    public $suffix;
    // An encapsulation of the Person's street, city, state, postal code, and country
    public $address;
    // number - Unique identifier of the User that will be the owner of the Person
    public $assignee_id;
    // string - The unique identifier of the primary Company with which the Person is associated
    public $company_id;
    // string - The name of the primary Company with which the Person is associated.
    public $company_name;
    // number -The unique identifier of the Contact Type of the Person.
    public $contact_type_id;
    // string Description of the Person.
    public $details;
    // list - An array of email addresses belonging to the Person.
    public $emails = [];
    // list - An array of phone numbers belonging to the Person.
    public $phone_numbers = [];
    //	list - An array of social profiles belonging to the Person.
    public $socials = [];
    //	list - An array of the tags associated with the Person, represented as strings.
    public $tags = [];
    // string - The professional title of the Person.
    public $title;
    //	list - An array of websites belonging to the Person.
    public $websites = [];
    // number - A Unix timestamp representing the time at which this Person was created.
    public $date_created;
    // A Unix timestamp representing the time at which this Person was last modified.
    public $date_modified;
    // list	An array of custom field values belonging to the Person.
    public $custom_fields = [];
    /**
     * Default constructor
     * @param array $properties
     */
    public function __construct(Array $properties=array()){
        foreach ($properties as $key => $value) {
            if (isset($value)){
                switch ($key) {
                    case "address":
                        $address = new Address($value);
                        $this->{$key} = $address;
                        break;
                    case "emails":
                        foreach ($value as $element) {
                            $email = new Email($element);
                            $this->{$key}[] = $email;
                        }
                        break;
                    case "phone_numbers":
                        foreach ($value as $element) {
                            $phone = new PhoneNumber($element);
                            $this->{$key}[] = $phone;
                        }
                        break;
                    case "socials":
                        foreach ($value as $element) {
                            $socialProfile = new SocialProfile($element);
                            $this->{$key}[] = $socialProfile;
                        }
                        break;
                    case "websites":
                        foreach ($value as $element) {
                            $website = new Website($element);
                            $this->{$key}[] = $website;
                        }
                        break;
                    case "custom_fields":
                        foreach ($value as $element) {
                            $customField = new CustomField($element);
                            $this->{$key}[] = $customField;
                        }
                        break;
                    default:
                        $this->{$key} = $value;
                        break;
                }
            }
        }
    }
}
