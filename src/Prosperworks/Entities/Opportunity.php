<?php
namespace Prosperworks\Entities;

class Opportunity {
    // number - Unique identifier for the Opportunity.
    public $id;
    // string - The name of the Opportunity.
    public $name;
    // number - Unique identifier of the User that will be the owner of the Opportunity.
    public $assignee_id;
    // number - The expected close date of the Opportunity.
    public $close_date;
    // string - The unique identifier of the primary Company with which the Opportunity is associated.
    public $company_id;
    // string - The name of the primary Company with which the Opportunity is associated.
    public $company_name;
    // number - Unique identifier of the Customer Source that generated this Opportunity.
    public $customer_source_id;
    // string - Description of the Opportunity.
    public $details;
    // number - If the Opportunity's status is "Lost", the unique identifier of the loss reason that caused this Opportunity to be lost.
    public $loss_reason_id;
    // number - The monetary value of the Opportunity.
    public $monetary_value;
    // number - The unique identifier of the Pipeline in which this Opportunity is.
    public $pipeline_id;
    // number - The unique identifier of the Person who is the primary contact for this Opportunity.
    public $primary_contact_id;
    // string_enum - The priority of the Opportunity. Valid values are: "None", "Low", "Medium", "High".
    public $priority;
    // number - The unique identifier of the Pipeline Stage of the Opportunity.
    public $pipeline_stage_id;
    // string_enum - The status of the Opportunity. Valid values are: "Open", "Won", "Lost", "Abandoned".
    public $status;
    // list - An array of the tags associated with the Opportunity, represented as strings.
    public $tags;
    // number - The expected probability of winning the Opportunity. Valid values are [0-100] (inclusive).
    public $win_probability;
    // number - A Unix timestamp representing the time at which this Opportunity was created.
    public $date_created;
    // number - A Unix timestamp representing the time at which this Opportunity was last modified.
    public $date_modified;
    //[]	 list - An array of custom field values belonging to the Opportunity.
    public $custom_fields = array();

    /**
     * Default constructor
     * @param array $properties
     */
    public function __construct(Array $properties=array()){
        foreach ($properties as $key => $value) {
            switch ($key) {
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