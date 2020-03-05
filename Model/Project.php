<?php
/**
 * Project
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
 * Welcome to the TuningFiles API documentation.  # Language  All API methods accept language parameter, which can be set via the `X-LANG` custom header. Content of the header should be the code of the language you are requesting.  Available languages:    * English (`en`)   * Chinese traditional (`zh-hant`)   * Chinese simplified (`zh-hans`)   * Russian (`ru`)   * Norwegian Bokmål (`nb`)   * Latvian (`lv`)   * Lithuanian (`lt`)   * Croatian (`hr`)   * Spanish (`es`)  Set language to English: ``` curl -X GET \"https://api.tuningfiles.com/method\" -H \"x-lang: en\" ```  # Errors If there is an error, API will return appropriate error code and message like so:  ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  HTTP status code will be the same as the error code. In the case above, returned http status code will be 404.   Failed API authentication: ```json {   \"error\": {     \"code\": 403,     \"message\": \"Invalid API key\"   } } ```  API Key doesn't have enough permissions to access requested resource (some API methods require a paid subscription): ```json {   \"error\": {     \"code\": 401,     \"message\": \"This API key does not have enough permissions\"   } } ```  Not found: ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  Bad request: ```json {   \"error\": {     \"code\": 400,     \"message\": \"Bad request / Wrong parameters\"   } } ```  Server error: ```json {   \"error\": {     \"code\": 500,     \"message\": \"Internal server error\"   } } ``` # Rate limits To protect from flood and abuse, this API implements rate limiting. Currently, only requests made to the Vehicle Database REST API are limited. All the requests made to the File Tuning REST API are not rate-limited (this may change in the future).  **Vehicle Database REST API limits:**   - All methods: *3600 calls/hour*  **File Tuning REST API limits:**   - All methods: *no limits*    Limits are per API Key and are reset every hour. If your app hits those limits, API will return error code `401` with message `This API key has reached the time limit for this method`        # Webhooks You can use webhook to receive notifications about particular events. When you enable webhook in your [API settings page](https://app.tuningfiles.com/api), you can let your app execute code immediately after specific events occur, instead of having to make API calls periodically. For example, you can rely on webhooks to trigger an action in your app when project is created, it's status is updated or when file is purchased.  Webhook notification is using `POST` as http request method and contains a JSON payload, and HTTP headers that provide context.      For example, when project is created, webhook will contains the following headers:    **X-TF-EVENT**: project_create     **X-TF-HMAC-SHA256**: aV95gkmXR75CFvdeIn9DwOmpTCBndDqo/70uJWiYtaY=    and JSON body:   ```   {     \"id\": 146356,     \"uuid\": \"07b2402b-00cd-4d61-9bc4-13b85a1849fb\",     \"name\": \"Audi A3 8P 2.0 TDI 136hp 320Nm 2017\",      \"status\": \"Waiting\",     \"status_code\": 0,     ...     \"files\": [       {         \"id\": 246810,         \"uuid\": \"3dbb36a1-d50f-4327-8100-83a8c2f1b869\",         \"project\": 146356,         \"type\": \"Original\",         ...       }     ]   }   ```    ## Headers Webhook notifications are using following custom http headers:      `X-TF-EVENT`: Event which triggered this webhook     `X-TF-HMAC-SHA256`: Webhook verification hash  ## Events Each webhook will contain `X-TF-EVENT` header. This header represents the event which triggered this webhook.  Event types:   - `project_create` - Project is created. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    - `project_update` - Project is updated. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)   - `file_purchase` - File is purchased. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    ## Verification To allow a client to verify a webhook message has in fact come from TuningFiles, an `X-TF-HMAC-SHA256` header is included in each webhook POST message. The contents of this header is the Base64 encoded output of the HMAC SHA256 encoding of the JSON body of the message, using your API Secret as the encryption key.   Following psuedo PHP example shows how we generate the `X-TF-HMAC-SHA256` value: ```php   base64_encode(hash_hmac('sha256', $webhook_json, $your_api_secret, true)); ```  To verify the authenticity of the webhook message, you should calculate this value yourself and verify it equals the value contained in the header. # SDKs TuningFiles offers a PHP SDK to help interact with the API.  However, no SDK is required to use the API. ## PHP SDK [PHP SDK](https://github.com/sedox/tuningfiles-php-sdk) is hosted on [Github](https://github.com/sedox/tuningfiles-php-sdk). For all PHP SDK examples provided in these docs you will need to configure the `$apiInstance`. You may do it like this:   - For Vehicle Database API:      ```php       $apiInstance = new Tuningfiles\\Api\\VehicleDatabaseApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```    - For Tuning API:          ```php       $apiInstance = new Tuningfiles\\Api\\TuningApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```
 *
 * OpenAPI spec version: 1.0.8
 * Contact: support@tuningfiles.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.16
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
 * Project Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Project implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'project';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'uuid' => 'string',
'name' => 'string',
'status' => 'string',
'status_code' => 'int',
'vehicle_data' => '\Tuningfiles\Model\ProjectVehicleData[]',
'read_tool' => 'string',
'read_tool_id' => 'int',
'dtc_codes' => 'string[]',
'license_plate' => 'string',
'notification_channels' => '\Tuningfiles\Model\NotificationChannel[]',
'comment' => 'string',
'remap_data' => '\Tuningfiles\Model\ProjectRemapData',
'started_on' => '\DateTime',
'finished_on' => '\DateTime',
'added' => '\DateTime',
'uploaded' => '\DateTime',
'updated' => '\DateTime',
'attachments' => '\Tuningfiles\Model\Attachment[]',
'files' => '\Tuningfiles\Model\\SplFileObject[]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'uuid' => null,
'name' => null,
'status' => null,
'status_code' => null,
'vehicle_data' => null,
'read_tool' => null,
'read_tool_id' => null,
'dtc_codes' => null,
'license_plate' => null,
'notification_channels' => null,
'comment' => null,
'remap_data' => null,
'started_on' => 'date-time',
'finished_on' => 'date-time',
'added' => 'date-time',
'uploaded' => 'date-time',
'updated' => 'date-time',
'attachments' => null,
'files' => null    ];

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
'uuid' => 'uuid',
'name' => 'name',
'status' => 'status',
'status_code' => 'status_code',
'vehicle_data' => 'vehicle_data',
'read_tool' => 'read_tool',
'read_tool_id' => 'read_tool_id',
'dtc_codes' => 'dtc_codes',
'license_plate' => 'license_plate',
'notification_channels' => 'notification_channels',
'comment' => 'comment',
'remap_data' => 'remap_data',
'started_on' => 'started_on',
'finished_on' => 'finished_on',
'added' => 'added',
'uploaded' => 'uploaded',
'updated' => 'updated',
'attachments' => 'attachments',
'files' => 'files'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'uuid' => 'setUuid',
'name' => 'setName',
'status' => 'setStatus',
'status_code' => 'setStatusCode',
'vehicle_data' => 'setVehicleData',
'read_tool' => 'setReadTool',
'read_tool_id' => 'setReadToolId',
'dtc_codes' => 'setDtcCodes',
'license_plate' => 'setLicensePlate',
'notification_channels' => 'setNotificationChannels',
'comment' => 'setComment',
'remap_data' => 'setRemapData',
'started_on' => 'setStartedOn',
'finished_on' => 'setFinishedOn',
'added' => 'setAdded',
'uploaded' => 'setUploaded',
'updated' => 'setUpdated',
'attachments' => 'setAttachments',
'files' => 'setFiles'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'uuid' => 'getUuid',
'name' => 'getName',
'status' => 'getStatus',
'status_code' => 'getStatusCode',
'vehicle_data' => 'getVehicleData',
'read_tool' => 'getReadTool',
'read_tool_id' => 'getReadToolId',
'dtc_codes' => 'getDtcCodes',
'license_plate' => 'getLicensePlate',
'notification_channels' => 'getNotificationChannels',
'comment' => 'getComment',
'remap_data' => 'getRemapData',
'started_on' => 'getStartedOn',
'finished_on' => 'getFinishedOn',
'added' => 'getAdded',
'uploaded' => 'getUploaded',
'updated' => 'getUpdated',
'attachments' => 'getAttachments',
'files' => 'getFiles'    ];

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

    const STATUS_WAITING = 'Waiting';
const STATUS_IN_PROGRESS = 'In Progress';
const STATUS_FINISHED = 'Finished';
const STATUS_CODE_0 = 0;
const STATUS_CODE_1 = 1;
const STATUS_CODE_2 = 2;

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_WAITING,
self::STATUS_IN_PROGRESS,
self::STATUS_FINISHED,        ];
    }
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusCodeAllowableValues()
    {
        return [
            self::STATUS_CODE_0,
self::STATUS_CODE_1,
self::STATUS_CODE_2,        ];
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
        $this->container['uuid'] = isset($data['uuid']) ? $data['uuid'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['status_code'] = isset($data['status_code']) ? $data['status_code'] : null;
        $this->container['vehicle_data'] = isset($data['vehicle_data']) ? $data['vehicle_data'] : null;
        $this->container['read_tool'] = isset($data['read_tool']) ? $data['read_tool'] : null;
        $this->container['read_tool_id'] = isset($data['read_tool_id']) ? $data['read_tool_id'] : null;
        $this->container['dtc_codes'] = isset($data['dtc_codes']) ? $data['dtc_codes'] : null;
        $this->container['license_plate'] = isset($data['license_plate']) ? $data['license_plate'] : null;
        $this->container['notification_channels'] = isset($data['notification_channels']) ? $data['notification_channels'] : null;
        $this->container['comment'] = isset($data['comment']) ? $data['comment'] : null;
        $this->container['remap_data'] = isset($data['remap_data']) ? $data['remap_data'] : null;
        $this->container['started_on'] = isset($data['started_on']) ? $data['started_on'] : null;
        $this->container['finished_on'] = isset($data['finished_on']) ? $data['finished_on'] : null;
        $this->container['added'] = isset($data['added']) ? $data['added'] : null;
        $this->container['uploaded'] = isset($data['uploaded']) ? $data['uploaded'] : null;
        $this->container['updated'] = isset($data['updated']) ? $data['updated'] : null;
        $this->container['attachments'] = isset($data['attachments']) ? $data['attachments'] : null;
        $this->container['files'] = isset($data['files']) ? $data['files'] : null;
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
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id Project ID (Sedox ID).
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets uuid
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->container['uuid'];
    }

    /**
     * Sets uuid
     *
     * @param string $uuid Project v4 UUID.
     *
     * @return $this
     */
    public function setUuid($uuid)
    {
        $this->container['uuid'] = $uuid;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Project name.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

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
     * @param string $status Project status. Can be: \"Waiting\", \"In Progress\", \"Finished\".
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
     * @param int $status_code Project status code. Can be: 0 = \"Waiting\"; 1 = \"In Progress\"; 2 = \"Finished\".
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
     * Gets vehicle_data
     *
     * @return \Tuningfiles\Model\ProjectVehicleData[]
     */
    public function getVehicleData()
    {
        return $this->container['vehicle_data'];
    }

    /**
     * Sets vehicle_data
     *
     * @param \Tuningfiles\Model\ProjectVehicleData[] $vehicle_data vehicle_data
     *
     * @return $this
     */
    public function setVehicleData($vehicle_data)
    {
        $this->container['vehicle_data'] = $vehicle_data;

        return $this;
    }

    /**
     * Gets read_tool
     *
     * @return string
     */
    public function getReadTool()
    {
        return $this->container['read_tool'];
    }

    /**
     * Sets read_tool
     *
     * @param string $read_tool Read tool used for reading the ECU.
     *
     * @return $this
     */
    public function setReadTool($read_tool)
    {
        $this->container['read_tool'] = $read_tool;

        return $this;
    }

    /**
     * Gets read_tool_id
     *
     * @return int
     */
    public function getReadToolId()
    {
        return $this->container['read_tool_id'];
    }

    /**
     * Sets read_tool_id
     *
     * @param int $read_tool_id read_tool_id
     *
     * @return $this
     */
    public function setReadToolId($read_tool_id)
    {
        $this->container['read_tool_id'] = $read_tool_id;

        return $this;
    }

    /**
     * Gets dtc_codes
     *
     * @return string[]
     */
    public function getDtcCodes()
    {
        return $this->container['dtc_codes'];
    }

    /**
     * Sets dtc_codes
     *
     * @param string[] $dtc_codes Array with DTC codes requested for removal.
     *
     * @return $this
     */
    public function setDtcCodes($dtc_codes)
    {
        $this->container['dtc_codes'] = $dtc_codes;

        return $this;
    }

    /**
     * Gets license_plate
     *
     * @return string
     */
    public function getLicensePlate()
    {
        return $this->container['license_plate'];
    }

    /**
     * Sets license_plate
     *
     * @param string $license_plate license_plate
     *
     * @return $this
     */
    public function setLicensePlate($license_plate)
    {
        $this->container['license_plate'] = $license_plate;

        return $this;
    }

    /**
     * Gets notification_channels
     *
     * @return \Tuningfiles\Model\NotificationChannel[]
     */
    public function getNotificationChannels()
    {
        return $this->container['notification_channels'];
    }

    /**
     * Sets notification_channels
     *
     * @param \Tuningfiles\Model\NotificationChannel[] $notification_channels Notification channels used for this project.
     *
     * @return $this
     */
    public function setNotificationChannels($notification_channels)
    {
        $this->container['notification_channels'] = $notification_channels;

        return $this;
    }

    /**
     * Gets comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->container['comment'];
    }

    /**
     * Sets comment
     *
     * @param string $comment Customer comment.
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->container['comment'] = $comment;

        return $this;
    }

    /**
     * Gets remap_data
     *
     * @return \Tuningfiles\Model\ProjectRemapData
     */
    public function getRemapData()
    {
        return $this->container['remap_data'];
    }

    /**
     * Sets remap_data
     *
     * @param \Tuningfiles\Model\ProjectRemapData $remap_data remap_data
     *
     * @return $this
     */
    public function setRemapData($remap_data)
    {
        $this->container['remap_data'] = $remap_data;

        return $this;
    }

    /**
     * Gets started_on
     *
     * @return \DateTime
     */
    public function getStartedOn()
    {
        return $this->container['started_on'];
    }

    /**
     * Sets started_on
     *
     * @param \DateTime $started_on Date on which project was started by our developers.
     *
     * @return $this
     */
    public function setStartedOn($started_on)
    {
        $this->container['started_on'] = $started_on;

        return $this;
    }

    /**
     * Gets finished_on
     *
     * @return \DateTime
     */
    public function getFinishedOn()
    {
        return $this->container['finished_on'];
    }

    /**
     * Sets finished_on
     *
     * @param \DateTime $finished_on Date on which project was finished by our developers.
     *
     * @return $this
     */
    public function setFinishedOn($finished_on)
    {
        $this->container['finished_on'] = $finished_on;

        return $this;
    }

    /**
     * Gets added
     *
     * @return \DateTime
     */
    public function getAdded()
    {
        return $this->container['added'];
    }

    /**
     * Sets added
     *
     * @param \DateTime $added Date on which project was added into the queue.
     *
     * @return $this
     */
    public function setAdded($added)
    {
        $this->container['added'] = $added;

        return $this;
    }

    /**
     * Gets uploaded
     *
     * @return \DateTime
     */
    public function getUploaded()
    {
        return $this->container['uploaded'];
    }

    /**
     * Sets uploaded
     *
     * @param \DateTime $uploaded Date on which project was created.
     *
     * @return $this
     */
    public function setUploaded($uploaded)
    {
        $this->container['uploaded'] = $uploaded;

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
     * @param \DateTime $updated Last update date.
     *
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

        return $this;
    }

    /**
     * Gets attachments
     *
     * @return \Tuningfiles\Model\Attachment[]
     */
    public function getAttachments()
    {
        return $this->container['attachments'];
    }

    /**
     * Sets attachments
     *
     * @param \Tuningfiles\Model\Attachment[] $attachments Array of attachment objects. All the attachments in this project.
     *
     * @return $this
     */
    public function setAttachments($attachments)
    {
        $this->container['attachments'] = $attachments;

        return $this;
    }

    /**
     * Gets files
     *
     * @return \Tuningfiles\Model\\SplFileObject[]
     */
    public function getFiles()
    {
        return $this->container['files'];
    }

    /**
     * Sets files
     *
     * @param \Tuningfiles\Model\\SplFileObject[] $files Array of file objects. All the files in this project.
     *
     * @return $this
     */
    public function setFiles($files)
    {
        $this->container['files'] = $files;

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
