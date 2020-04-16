<?php
namespace Prosperworks\Entities;

class Lead
{
    // number - Unique identifier for the Lead.
    public $id;
    // string - The first and last name of the Lead
    public $name;
    // An encapsulation of the Lead's street, city, state, postal code, and country
    public $address;
    // number - Unique identifier of the User that will be the owner of the Lead
    public $assignee_id;
    // string - The name of the company to which the Lead belongs
    public $company_name;
    // number -Unique identifier of the Customer Source that generated this Lead
    public $customer_source_id;
    // string Description of the Lead.
    public $details;
    // list - An encapsulation of the Lead's email address and category
    public $email = [];
    // list - The expected monetary value of business with the Lead
    public $monetary_value;
    // An array of phone numbers belonging to the Lead
    public $phone_numbers = [];
    //	list - An array of social profiles belonging to the Lead.
    public $socials = [];
    // A string representing the status of the Lead. Valid values are: "New", "Unqualified", "Contacted", "Qualified"
    public $status;
    //	list - An array of the tags associated with the Lead, represented as strings.
    public $tags = [];
    // string - The professional title of the Lead.
    public $title;
    //	list - An array of websites belonging to the Lead.
    public $websites = [];
    // list	An array of custom field values belonging to the Lead.
    public $custom_fields = [];
    // number - A Unix timestamp representing the time at which this Lead was created.
    public $date_created;
    // A Unix timestamp representing the time at which this Lead was last modified.
    public $date_modified;


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
                    case "email":
                        $email = new Email($value);
                        $this->{$key}[] = $email;
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
