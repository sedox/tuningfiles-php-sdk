<?php
/**
 * SupportTicket
 *
 * PHP version 5
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * TuningFiles API
 *
 * Welcome to the TuningFiles API documentation.  # Language  All API methods accept language parameter, which can be set via the `X-LANG` custom header. Content of the header should be the code of the language you are requesting.  Available languages:    * English (`en`)   * Chinese traditional (`zh-hant`)   * Chinese simplified (`zh-hans`)   * Russian (`ru`)   * Norwegian Bokmål (`nb`)   * Latvian (`lv`)   * Lithuanian (`lt`)   * Croatian (`hr`)   * Spanish (`es`)  Set language to English: ``` curl -X GET \"https://api.tuningfiles.com/method\" -H \"x-lang: en\" ```  # Errors If there is an error, API will return appropriate error code and message like so:  ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  HTTP status code will be the same as the error code. In the case above, returned http status code will be 404.   Failed API authentication: ```json {   \"error\": {     \"code\": 403,     \"message\": \"Invalid API key\"   } } ```  API Key doesn't have enough permissions to access requested resource (some API methods require a paid subscription): ```json {   \"error\": {     \"code\": 401,     \"message\": \"This API key does not have enough permissions\"   } } ```  Not found: ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  Bad request: ```json {   \"error\": {     \"code\": 400,     \"message\": \"Bad request / Wrong parameters\"   } } ```  Server error: ```json {   \"error\": {     \"code\": 500,     \"message\": \"Internal server error\"   } } ``` # Rate limits To protect from flood and abuse, this API implements rate limiting. Currently, only requests made to the Vehicle Database REST API are limited. All the requests made to the File Tuning REST API are not rate-limited (this may change in the future).  **Vehicle Database REST API limits:**   - All methods: *3600 calls/hour*  **File Tuning REST API limits:**   - All methods: *no limits*  **Support REST API limits:**   - All methods: *3600 calls/hour*    Limits are per API Key and are reset every hour. If your app hits those limits, API will return error code `429` with message `This API key has reached the time limit for this method`        # Webhooks You can use webhook to receive notifications about particular events. When you enable webhook in your [API settings page](https://app.tuningfiles.com/api), you can let your app execute code immediately after specific events occur, instead of having to make API calls periodically. For example, you can rely on webhooks to trigger an action in your app when project is created, it's status is updated or when file is purchased.  Webhook notification is using `POST` as http request method and contains a JSON payload, and HTTP headers that provide context.      For example, when project is created, webhook will contains the following headers:    **X-TF-EVENT**: project_create     **X-TF-HMAC-SHA256**: aV95gkmXR75CFvdeIn9DwOmpTCBndDqo/70uJWiYtaY=    and JSON body:   ```   {     \"id\": 146356,     \"uuid\": \"07b2402b-00cd-4d61-9bc4-13b85a1849fb\",     \"name\": \"Audi A3 8P 2.0 TDI 136hp 320Nm 2017\",      \"status\": \"Waiting\",     \"status_code\": 0,     ...     \"files\": [       {         \"id\": 246810,         \"uuid\": \"3dbb36a1-d50f-4327-8100-83a8c2f1b869\",         \"project\": 146356,         \"type\": \"Original\",         ...       }     ]   }   ```    ## Headers Webhook notifications are using following custom http headers:      `X-TF-EVENT`: Event which triggered this webhook     `X-TF-HMAC-SHA256`: Webhook verification hash  ## Events Each webhook will contain `X-TF-EVENT` header. This header represents the event which triggered this webhook.  File Tuning REST API event types:   - `project_create` - Project is created. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    - `project_update` - Project is updated. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)   - `file_purchase` - File is purchased. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    Support REST API event types:   - `ticket_created` - Support request (ticket) was created. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_opened` - Support request (ticket) status was set to \"Opened\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_pending` - Support request (ticket) status was set to \"Pending\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_reopened` - Support request (ticket) status was set to \"Opened\". This event is triggered when a \"closed\" ticket has been re-opened again. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_answered` - Support request (ticket) status was set to \"Answered\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_closed` - Support request (ticket) status was set to \"Closed\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `message_created` - Triggered when a new message (reply) is added into the ticket. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)    ## Verification To allow a client to verify a webhook message has in fact come from TuningFiles, an `X-TF-HMAC-SHA256` header is included in each webhook POST message. The contents of this header is the Base64 encoded output of the HMAC SHA256 encoding of the JSON body of the message, using your API Secret as the encryption key.   Following psuedo PHP example shows how we generate the `X-TF-HMAC-SHA256` value: ```php   base64_encode(hash_hmac('sha256', $webhook_json, $your_api_secret, true)); ```  To verify the authenticity of the webhook message, you should calculate this value yourself and verify it equals the value contained in the header. # SDKs TuningFiles offers a PHP SDK to help interact with the API.  However, no SDK is required to use the API. ## PHP SDK [PHP SDK](https://github.com/sedox/tuningfiles-php-sdk) is hosted on [Github](https://github.com/sedox/tuningfiles-php-sdk). For all PHP SDK examples provided in these docs you will need to configure the `$apiInstance`. You may do it like this:   - For Vehicle Database API:      ```php       $apiInstance = new Tuningfiles\\Api\\VehicleDatabaseApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```    - For Tuning API:          ```php       $apiInstance = new Tuningfiles\\Api\\TuningApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```
 *
 * OpenAPI spec version: 1.2.4
 * Contact: support@tuningfiles.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.33
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Tuningfiles\Model;

use \ArrayAccess;
use \Tuningfiles\ObjectSerializer;

/**
 * SupportTicket Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SupportTicket implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'support_ticket';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'string',
'department' => 'string',
'department_id' => 'int',
'subject' => 'string',
'project_id' => 'int',
'project_name' => 'string',
'evc_project' => 'int',
'status' => 'string',
'status_code' => 'int',
'created' => '\DateTime',
'updated' => '\DateTime',
'closed' => '\DateTime'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'department' => null,
'department_id' => null,
'subject' => null,
'project_id' => null,
'project_name' => null,
'evc_project' => null,
'status' => null,
'status_code' => null,
'created' => 'date-time',
'updated' => 'date-time',
'closed' => 'date-time'    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
'department' => 'department',
'department_id' => 'department_id',
'subject' => 'subject',
'project_id' => 'project_id',
'project_name' => 'project_name',
'evc_project' => 'evc_project',
'status' => 'status',
'status_code' => 'status_code',
'created' => 'created',
'updated' => 'updated',
'closed' => 'closed'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'department' => 'setDepartment',
'department_id' => 'setDepartmentId',
'subject' => 'setSubject',
'project_id' => 'setProjectId',
'project_name' => 'setProjectName',
'evc_project' => 'setEvcProject',
'status' => 'setStatus',
'status_code' => 'setStatusCode',
'created' => 'setCreated',
'updated' => 'setUpdated',
'closed' => 'setClosed'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'department' => 'getDepartment',
'department_id' => 'getDepartmentId',
'subject' => 'getSubject',
'project_id' => 'getProjectId',
'project_name' => 'getProjectName',
'evc_project' => 'getEvcProject',
'status' => 'getStatus',
'status_code' => 'getStatusCode',
'created' => 'getCreated',
'updated' => 'getUpdated',
'closed' => 'getClosed'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const STATUS_OPEN = 'open';
const STATUS_ANSWERED = 'answered';
const STATUS_PENDING = 'pending';
const STATUS_CLOSED = 'closed';
const STATUS_CODE_1 = 1;
const STATUS_CODE_2 = 2;
const STATUS_CODE_4 = 4;
const STATUS_CODE_3 = 3;

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_OPEN,
self::STATUS_ANSWERED,
self::STATUS_PENDING,
self::STATUS_CLOSED,        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusCodeAllowableValues()
    {
        return [
            self::STATUS_CODE_1,
self::STATUS_CODE_2,
self::STATUS_CODE_4,
self::STATUS_CODE_3,        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['department'] = isset($data['department']) ? $data['department'] : null;
        $this->container['department_id'] = isset($data['department_id']) ? $data['department_id'] : null;
        $this->container['subject'] = isset($data['subject']) ? $data['subject'] : null;
        $this->container['project_id'] = isset($data['project_id']) ? $data['project_id'] : null;
        $this->container['project_name'] = isset($data['project_name']) ? $data['project_name'] : null;
        $this->container['evc_project'] = isset($data['evc_project']) ? $data['evc_project'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['status_code'] = isset($data['status_code']) ? $data['status_code'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['updated'] = isset($data['updated']) ? $data['updated'] : null;
        $this->container['closed'] = isset($data['closed']) ? $data['closed'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getStatusCodeAllowableValues();
        if (!is_null($this->container['status_code']) && !in_array($this->container['status_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status_code', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id Ticket ID
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets department
     *
     * @return string
     */
    public function getDepartment()
    {
        return $this->container['department'];
    }

    /**
     * Sets department
     *
     * @param string $department Department name
     *
     * @return $this
     */
    public function setDepartment($department)
    {
        $this->container['department'] = $department;

        return $this;
    }

    /**
     * Gets department_id
     *
     * @return int
     */
    public function getDepartmentId()
    {
        return $this->container['department_id'];
    }

    /**
     * Sets department_id
     *
     * @param int $department_id Department ID
     *
     * @return $this
     */
    public function setDepartmentId($department_id)
    {
        $this->container['department_id'] = $department_id;

        return $this;
    }

    /**
     * Gets subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->container['subject'];
    }

    /**
     * Sets subject
     *
     * @param string $subject Ticket subject
     *
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->container['subject'] = $subject;

        return $this;
    }

    /**
     * Gets project_id
     *
     * @return int
     */
    public function getProjectId()
    {
        return $this->container['project_id'];
    }

    /**
     * Sets project_id
     *
     * @param int $project_id Project ID
     *
     * @return $this
     */
    public function setProjectId($project_id)
    {
        $this->container['project_id'] = $project_id;

        return $this;
    }

    /**
     * Gets project_name
     *
     * @return string
     */
    public function getProjectName()
    {
        return $this->container['project_name'];
    }

    /**
     * Sets project_name
     *
     * @param string $project_name Project Name
     *
     * @return $this
     */
    public function setProjectName($project_name)
    {
        $this->container['project_name'] = $project_name;

        return $this;
    }

    /**
     * Gets evc_project
     *
     * @return int
     */
    public function getEvcProject()
    {
        return $this->container['evc_project'];
    }

    /**
     * Sets evc_project
     *
     * @param int $evc_project EVC Project ID
     *
     * @return $this
     */
    public function setEvcProject($evc_project)
    {
        $this->container['evc_project'] = $evc_project;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Ticket status name
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets status_code
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->container['status_code'];
    }

    /**
     * Sets status_code
     *
     * @param int $status_code Ticket status code
     *
     * @return $this
     */
    public function setStatusCode($status_code)
    {
        $allowedValues = $this->getStatusCodeAllowableValues();
        if (!is_null($status_code) && !in_array($status_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status_code', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status_code'] = $status_code;

        return $this;
    }

    /**
     * Gets created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param \DateTime $created Date on which ticket was created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     *
     * @param \DateTime $updated Date on which ticket was updated
     *
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

        return $this;
    }

    /**
     * Gets closed
     *
     * @return \DateTime
     */
    public function getClosed()
    {
        return $this->container['closed'];
    }

    /**
     * Sets closed
     *
     * @param \DateTime $closed Date on which ticket was closed
     *
     * @return $this
     */
    public function setClosed($closed)
    {
        $this->container['closed'] = $closed;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
