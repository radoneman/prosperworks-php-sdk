<?php
namespace Prosperworks\Entities;

class Task
{
    // number - Unique identifier for the Task.
    public $id;
    // string - The name of the Task.
    public $name;
    // identifier - The primary related resource for the Task.
    public $related_resource;
    // number - Unique identifier of the User that will be the owner of the Task.
    public $assignee_id;
    // number - The date on which the Task is due.
    public $due_date;
    // number - The date on which to receive a reminder about the Task.
    public $reminder_date;
    // number - The date on which the Task was completed. This is automatically set when the status changes from Open to Completed, and cannot be set directly.
    public $completed_date;
    // string_enum - The priority of the Task. Valid values are: "None", "High".
    public $priority;
    // string_enum - The status of the Task. Valid values are: "Open", "Completed".
    public $status;
    // string - Description of the Task.
    public $details;
    // array - An array of the tags associated with the Task, represented as strings.
    public $tags = [];
    // list	An array of custom field values belonging to the Person.
    public $custom_fields = [];
    // number - A Unix timestamp representing the time at which this Task was created.
    public $date_created;
    // number - A Unix timestamp representing the time at which this Task was last modified.
    public $date_modified;


    const PRIORITY_NONE = 'None';
    const PRIORITY_HIGH = 'High';
    const STATUS_OPEN = 'Open';
    const STATUS_COMPLETED = 'Completed';

    /**
     * Default constructor
     * @param array $properties
     */
    public function __construct(Array $properties = array()) {
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