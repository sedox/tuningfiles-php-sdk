<?php
/**
 * ProjectsBody
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
 * ProjectsBody Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProjectsBody implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'projects_body';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'ecu1_file' => 'int',
'ecu1_label' => 'string',
'ecu2_file' => 'int',
'ecu2_label' => 'string',
'vehicle_type_id' => 'int',
'vehicle_manufacturer_id' => 'int',
'vehicle_model_id' => 'int',
'vehicle_model' => 'string',
'vehicle_generation_id' => 'int',
'vehicle_generation' => 'string',
'vehicle_engine' => 'string',
'vehicle_engine_id' => 'int',
'vehicle_year' => 'int',
'vehicle_gearbox' => 'int',
'vehicle_ecu' => 'string',
'hardware_number' => 'string',
'software_number' => 'string',
'read_tool' => 'string',
'remap' => 'int',
'addons' => 'int[]',
'dtc_codes' => 'string[]',
'notification_channel' => 'int[]',
'file_attachment' => 'int',
'ref' => 'string',
'customer_comment' => 'string',
'metadata' => 'map[string,string]'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'ecu1_file' => null,
'ecu1_label' => null,
'ecu2_file' => null,
'ecu2_label' => null,
'vehicle_type_id' => null,
'vehicle_manufacturer_id' => null,
'vehicle_model_id' => null,
'vehicle_model' => null,
'vehicle_generation_id' => null,
'vehicle_generation' => null,
'vehicle_engine' => null,
'vehicle_engine_id' => null,
'vehicle_year' => null,
'vehicle_gearbox' => null,
'vehicle_ecu' => null,
'hardware_number' => null,
'software_number' => null,
'read_tool' => null,
'remap' => null,
'addons' => null,
'dtc_codes' => null,
'notification_channel' => null,
'file_attachment' => null,
'ref' => null,
'customer_comment' => null,
'metadata' => null    ];

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
        'ecu1_file' => 'ecu1-file',
'ecu1_label' => 'ecu1-label',
'ecu2_file' => 'ecu2-file',
'ecu2_label' => 'ecu2-label',
'vehicle_type_id' => 'vehicle-type-id',
'vehicle_manufacturer_id' => 'vehicle-manufacturer-id',
'vehicle_model_id' => 'vehicle-model-id',
'vehicle_model' => 'vehicle-model',
'vehicle_generation_id' => 'vehicle-generation-id',
'vehicle_generation' => 'vehicle-generation',
'vehicle_engine' => 'vehicle-engine',
'vehicle_engine_id' => 'vehicle-engine-id',
'vehicle_year' => 'vehicle-year',
'vehicle_gearbox' => 'vehicle-gearbox',
'vehicle_ecu' => 'vehicle-ecu',
'hardware_number' => 'hardware-number',
'software_number' => 'software-number',
'read_tool' => 'read-tool',
'remap' => 'remap',
'addons' => 'addons',
'dtc_codes' => 'dtc-codes[]',
'notification_channel' => 'notification-channel[]',
'file_attachment' => 'file-attachment',
'ref' => 'ref',
'customer_comment' => 'customer-comment',
'metadata' => 'metadata'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'ecu1_file' => 'setEcu1File',
'ecu1_label' => 'setEcu1Label',
'ecu2_file' => 'setEcu2File',
'ecu2_label' => 'setEcu2Label',
'vehicle_type_id' => 'setVehicleTypeId',
'vehicle_manufacturer_id' => 'setVehicleManufacturerId',
'vehicle_model_id' => 'setVehicleModelId',
'vehicle_model' => 'setVehicleModel',
'vehicle_generation_id' => 'setVehicleGenerationId',
'vehicle_generation' => 'setVehicleGeneration',
'vehicle_engine' => 'setVehicleEngine',
'vehicle_engine_id' => 'setVehicleEngineId',
'vehicle_year' => 'setVehicleYear',
'vehicle_gearbox' => 'setVehicleGearbox',
'vehicle_ecu' => 'setVehicleEcu',
'hardware_number' => 'setHardwareNumber',
'software_number' => 'setSoftwareNumber',
'read_tool' => 'setReadTool',
'remap' => 'setRemap',
'addons' => 'setAddons',
'dtc_codes' => 'setDtcCodes',
'notification_channel' => 'setNotificationChannel',
'file_attachment' => 'setFileAttachment',
'ref' => 'setRef',
'customer_comment' => 'setCustomerComment',
'metadata' => 'setMetadata'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'ecu1_file' => 'getEcu1File',
'ecu1_label' => 'getEcu1Label',
'ecu2_file' => 'getEcu2File',
'ecu2_label' => 'getEcu2Label',
'vehicle_type_id' => 'getVehicleTypeId',
'vehicle_manufacturer_id' => 'getVehicleManufacturerId',
'vehicle_model_id' => 'getVehicleModelId',
'vehicle_model' => 'getVehicleModel',
'vehicle_generation_id' => 'getVehicleGenerationId',
'vehicle_generation' => 'getVehicleGeneration',
'vehicle_engine' => 'getVehicleEngine',
'vehicle_engine_id' => 'getVehicleEngineId',
'vehicle_year' => 'getVehicleYear',
'vehicle_gearbox' => 'getVehicleGearbox',
'vehicle_ecu' => 'getVehicleEcu',
'hardware_number' => 'getHardwareNumber',
'software_number' => 'getSoftwareNumber',
'read_tool' => 'getReadTool',
'remap' => 'getRemap',
'addons' => 'getAddons',
'dtc_codes' => 'getDtcCodes',
'notification_channel' => 'getNotificationChannel',
'file_attachment' => 'getFileAttachment',
'ref' => 'getRef',
'customer_comment' => 'getCustomerComment',
'metadata' => 'getMetadata'    ];

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
        $this->container['ecu1_file'] = isset($data['ecu1_file']) ? $data['ecu1_file'] : null;
        $this->container['ecu1_label'] = isset($data['ecu1_label']) ? $data['ecu1_label'] : null;
        $this->container['ecu2_file'] = isset($data['ecu2_file']) ? $data['ecu2_file'] : null;
        $this->container['ecu2_label'] = isset($data['ecu2_label']) ? $data['ecu2_label'] : null;
        $this->container['vehicle_type_id'] = isset($data['vehicle_type_id']) ? $data['vehicle_type_id'] : null;
        $this->container['vehicle_manufacturer_id'] = isset($data['vehicle_manufacturer_id']) ? $data['vehicle_manufacturer_id'] : null;
        $this->container['vehicle_model_id'] = isset($data['vehicle_model_id']) ? $data['vehicle_model_id'] : null;
        $this->container['vehicle_model'] = isset($data['vehicle_model']) ? $data['vehicle_model'] : null;
        $this->container['vehicle_generation_id'] = isset($data['vehicle_generation_id']) ? $data['vehicle_generation_id'] : null;
        $this->container['vehicle_generation'] = isset($data['vehicle_generation']) ? $data['vehicle_generation'] : null;
        $this->container['vehicle_engine'] = isset($data['vehicle_engine']) ? $data['vehicle_engine'] : null;
        $this->container['vehicle_engine_id'] = isset($data['vehicle_engine_id']) ? $data['vehicle_engine_id'] : null;
        $this->container['vehicle_year'] = isset($data['vehicle_year']) ? $data['vehicle_year'] : null;
        $this->container['vehicle_gearbox'] = isset($data['vehicle_gearbox']) ? $data['vehicle_gearbox'] : null;
        $this->container['vehicle_ecu'] = isset($data['vehicle_ecu']) ? $data['vehicle_ecu'] : null;
        $this->container['hardware_number'] = isset($data['hardware_number']) ? $data['hardware_number'] : null;
        $this->container['software_number'] = isset($data['software_number']) ? $data['software_number'] : null;
        $this->container['read_tool'] = isset($data['read_tool']) ? $data['read_tool'] : null;
        $this->container['remap'] = isset($data['remap']) ? $data['remap'] : null;
        $this->container['addons'] = isset($data['addons']) ? $data['addons'] : null;
        $this->container['dtc_codes'] = isset($data['dtc_codes']) ? $data['dtc_codes'] : null;
        $this->container['notification_channel'] = isset($data['notification_channel']) ? $data['notification_channel'] : null;
        $this->container['file_attachment'] = isset($data['file_attachment']) ? $data['file_attachment'] : null;
        $this->container['ref'] = isset($data['ref']) ? $data['ref'] : null;
        $this->container['customer_comment'] = isset($data['customer_comment']) ? $data['customer_comment'] : null;
        $this->container['metadata'] = isset($data['metadata']) ? $data['metadata'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['ecu1_file'] === null) {
            $invalidProperties[] = "'ecu1_file' can't be null";
        }
        if ($this->container['vehicle_type_id'] === null) {
            $invalidProperties[] = "'vehicle_type_id' can't be null";
        }
        if ($this->container['vehicle_manufacturer_id'] === null) {
            $invalidProperties[] = "'vehicle_manufacturer_id' can't be null";
        }
        if ($this->container['vehicle_year'] === null) {
            $invalidProperties[] = "'vehicle_year' can't be null";
        }
        if ($this->container['vehicle_gearbox'] === null) {
            $invalidProperties[] = "'vehicle_gearbox' can't be null";
        }
        if ($this->container['read_tool'] === null) {
            $invalidProperties[] = "'read_tool' can't be null";
        }
        if ($this->container['remap'] === null) {
            $invalidProperties[] = "'remap' can't be null";
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
     * Gets ecu1_file
     *
     * @return int
     */
    public function getEcu1File()
    {
        return $this->container['ecu1_file'];
    }

    /**
     * Sets ecu1_file
     *
     * @param int $ecu1_file ID of the uploaded original file. Obtained from the [/files/upload](#operation/file_upload) method.
     *
     * @return $this
     */
    public function setEcu1File($ecu1_file)
    {
        $this->container['ecu1_file'] = $ecu1_file;

        return $this;
    }

    /**
     * Gets ecu1_label
     *
     * @return string
     */
    public function getEcu1Label()
    {
        return $this->container['ecu1_label'];
    }

    /**
     * Sets ecu1_label
     *
     * @param string $ecu1_label Short description for the 1st original file. Eligable only if you upload 2 ECU files.
     *
     * @return $this
     */
    public function setEcu1Label($ecu1_label)
    {
        $this->container['ecu1_label'] = $ecu1_label;

        return $this;
    }

    /**
     * Gets ecu2_file
     *
     * @return int
     */
    public function getEcu2File()
    {
        return $this->container['ecu2_file'];
    }

    /**
     * Sets ecu2_file
     *
     * @param int $ecu2_file ID of the second uploaded original file. Obtained from the [/files/upload](#operation/file_upload) method.
     *
     * @return $this
     */
    public function setEcu2File($ecu2_file)
    {
        $this->container['ecu2_file'] = $ecu2_file;

        return $this;
    }

    /**
     * Gets ecu2_label
     *
     * @return string
     */
    public function getEcu2Label()
    {
        return $this->container['ecu2_label'];
    }

    /**
     * Sets ecu2_label
     *
     * @param string $ecu2_label Short description for the 2nd original file. Eligable only if you upload 2 ECU files.
     *
     * @return $this
     */
    public function setEcu2Label($ecu2_label)
    {
        $this->container['ecu2_label'] = $ecu2_label;

        return $this;
    }

    /**
     * Gets vehicle_type_id
     *
     * @return int
     */
    public function getVehicleTypeId()
    {
        return $this->container['vehicle_type_id'];
    }

    /**
     * Sets vehicle_type_id
     *
     * @param int $vehicle_type_id ID of the vehicle type. Obtained from the [/vehicles/types](#operation/vehicles_types_list) method.
     *
     * @return $this
     */
    public function setVehicleTypeId($vehicle_type_id)
    {
        $this->container['vehicle_type_id'] = $vehicle_type_id;

        return $this;
    }

    /**
     * Gets vehicle_manufacturer_id
     *
     * @return int
     */
    public function getVehicleManufacturerId()
    {
        return $this->container['vehicle_manufacturer_id'];
    }

    /**
     * Sets vehicle_manufacturer_id
     *
     * @param int $vehicle_manufacturer_id ID of the vehicle manufacturer. Obtained from the [/vehicles/manufacturers](#operation/vehicles_manufacturers_list) method.
     *
     * @return $this
     */
    public function setVehicleManufacturerId($vehicle_manufacturer_id)
    {
        $this->container['vehicle_manufacturer_id'] = $vehicle_manufacturer_id;

        return $this;
    }

    /**
     * Gets vehicle_model_id
     *
     * @return int
     */
    public function getVehicleModelId()
    {
        return $this->container['vehicle_model_id'];
    }

    /**
     * Sets vehicle_model_id
     *
     * @param int $vehicle_model_id ID of the vehicle model. Obtained from the [/vehicles/models](#operation/vehicles_models_list) method. This parameter is ***required*** if `vehicle-model` is not used. You must specify one of `vehicle-model-id` OR `vehicle-model` but noth both.
     *
     * @return $this
     */
    public function setVehicleModelId($vehicle_model_id)
    {
        $this->container['vehicle_model_id'] = $vehicle_model_id;

        return $this;
    }

    /**
     * Gets vehicle_model
     *
     * @return string
     */
    public function getVehicleModel()
    {
        return $this->container['vehicle_model'];
    }

    /**
     * Sets vehicle_model
     *
     * @param string $vehicle_model Name of the vehicle model. Use this if the vehicle model can't be found in our database. This will allow you to create a project with custom vehicle data. This parameter is ***required*** if `vehicle-model-id` is not used. You can't use both `vehicle-model` and `vehicle-model-id` parameters. You need to choose only one of them. Keep in mind that, if you choose to use the `vehicle-model` you will also need to specify the vehicle generation and engine using only the `vehicle-generation` and `vehicle-engine` parameters.
     *
     * @return $this
     */
    public function setVehicleModel($vehicle_model)
    {
        $this->container['vehicle_model'] = $vehicle_model;

        return $this;
    }

    /**
     * Gets vehicle_generation_id
     *
     * @return int
     */
    public function getVehicleGenerationId()
    {
        return $this->container['vehicle_generation_id'];
    }

    /**
     * Sets vehicle_generation_id
     *
     * @param int $vehicle_generation_id ID of the model generation. Obtained from the [/vehicles/generations](#operation/vehicles_generations_list) method. This parameter is ***required*** if `vehicle-generation` is not used. You must specify one of `vehicle-generation-id` OR `vehicle-generation` but noth both.
     *
     * @return $this
     */
    public function setVehicleGenerationId($vehicle_generation_id)
    {
        $this->container['vehicle_generation_id'] = $vehicle_generation_id;

        return $this;
    }

    /**
     * Gets vehicle_generation
     *
     * @return string
     */
    public function getVehicleGeneration()
    {
        return $this->container['vehicle_generation'];
    }

    /**
     * Sets vehicle_generation
     *
     * @param string $vehicle_generation Name of the model generation. Use this if the vehicle generation can't be found in our database. This will allow you to create a project with custom vehicle data. This parameter is ***required*** if `vehicle-generation-id` is not used. You can't use both `vehicle-generation` and `vehicle-generation-id` parameters. You need to choose only one of them. Keep in mind that, if you choose to use the `vehicle-generation` you will also need to specify the vehicle engine using only the `vehicle-engine` parameter.
     *
     * @return $this
     */
    public function setVehicleGeneration($vehicle_generation)
    {
        $this->container['vehicle_generation'] = $vehicle_generation;

        return $this;
    }

    /**
     * Gets vehicle_engine
     *
     * @return string
     */
    public function getVehicleEngine()
    {
        return $this->container['vehicle_engine'];
    }

    /**
     * Sets vehicle_engine
     *
     * @param string $vehicle_engine Name of the vehicle engine. E.g. `123d 204hp 400Nm`. This parameter is ***required*** if `vehicle-engine-id` is not used.
     *
     * @return $this
     */
    public function setVehicleEngine($vehicle_engine)
    {
        $this->container['vehicle_engine'] = $vehicle_engine;

        return $this;
    }

    /**
     * Gets vehicle_engine_id
     *
     * @return int
     */
    public function getVehicleEngineId()
    {
        return $this->container['vehicle_engine_id'];
    }

    /**
     * Sets vehicle_engine_id
     *
     * @param int $vehicle_engine_id ID of the engine. Obtained from the [/vehicles/engines](#operation/vehicles_engines_list) method. This parameter is ***required*** if `vehicle-engine` is not used.
     *
     * @return $this
     */
    public function setVehicleEngineId($vehicle_engine_id)
    {
        $this->container['vehicle_engine_id'] = $vehicle_engine_id;

        return $this;
    }

    /**
     * Gets vehicle_year
     *
     * @return int
     */
    public function getVehicleYear()
    {
        return $this->container['vehicle_year'];
    }

    /**
     * Sets vehicle_year
     *
     * @param int $vehicle_year Vehicle year of manufacturing.
     *
     * @return $this
     */
    public function setVehicleYear($vehicle_year)
    {
        $this->container['vehicle_year'] = $vehicle_year;

        return $this;
    }

    /**
     * Gets vehicle_gearbox
     *
     * @return int
     */
    public function getVehicleGearbox()
    {
        return $this->container['vehicle_gearbox'];
    }

    /**
     * Sets vehicle_gearbox
     *
     * @param int $vehicle_gearbox ID of the vehicle transmission (gearbox). Can be obtained from [/vehicles/transmissions](#operation/vehicles_transmissions_list) method.
     *
     * @return $this
     */
    public function setVehicleGearbox($vehicle_gearbox)
    {
        $this->container['vehicle_gearbox'] = $vehicle_gearbox;

        return $this;
    }

    /**
     * Gets vehicle_ecu
     *
     * @return string
     */
    public function getVehicleEcu()
    {
        return $this->container['vehicle_ecu'];
    }

    /**
     * Sets vehicle_ecu
     *
     * @param string $vehicle_ecu ECU name. E.g. `Bosch EDC16C39`.
     *
     * @return $this
     */
    public function setVehicleEcu($vehicle_ecu)
    {
        $this->container['vehicle_ecu'] = $vehicle_ecu;

        return $this;
    }

    /**
     * Gets hardware_number
     *
     * @return string
     */
    public function getHardwareNumber()
    {
        return $this->container['hardware_number'];
    }

    /**
     * Sets hardware_number
     *
     * @param string $hardware_number ECU hardware number
     *
     * @return $this
     */
    public function setHardwareNumber($hardware_number)
    {
        $this->container['hardware_number'] = $hardware_number;

        return $this;
    }

    /**
     * Gets software_number
     *
     * @return string
     */
    public function getSoftwareNumber()
    {
        return $this->container['software_number'];
    }

    /**
     * Sets software_number
     *
     * @param string $software_number ECU software number
     *
     * @return $this
     */
    public function setSoftwareNumber($software_number)
    {
        $this->container['software_number'] = $software_number;

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
     * @param string $read_tool Read tool used while reading the vehicle ECU. Can be ***integer*** (an ID obtained from [/vehicles/read-tools](#operation/read_tools_list)) or ***string*** with the name of the tool.
     *
     * @return $this
     */
    public function setReadTool($read_tool)
    {
        $this->container['read_tool'] = $read_tool;

        return $this;
    }

    /**
     * Gets remap
     *
     * @return int
     */
    public function getRemap()
    {
        return $this->container['remap'];
    }

    /**
     * Sets remap
     *
     * @param int $remap ID of the selected remap. Obtained from the  [/vehicles/remaps](#operation/remaps_list) method.
     *
     * @return $this
     */
    public function setRemap($remap)
    {
        $this->container['remap'] = $remap;

        return $this;
    }

    /**
     * Gets addons
     *
     * @return int[]
     */
    public function getAddons()
    {
        return $this->container['addons'];
    }

    /**
     * Sets addons
     *
     * @param int[] $addons Special requests. Array of remap addon IDs. Obtained from the [/vehicles/remaps](#operation/remaps_list) method.
     *
     * @return $this
     */
    public function setAddons($addons)
    {
        $this->container['addons'] = $addons;

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
     * @param string[] $dtc_codes Array with DTC codes to be removed.
     *
     * @return $this
     */
    public function setDtcCodes($dtc_codes)
    {
        $this->container['dtc_codes'] = $dtc_codes;

        return $this;
    }

    /**
     * Gets notification_channel
     *
     * @return int[]
     */
    public function getNotificationChannel()
    {
        return $this->container['notification_channel'];
    }

    /**
     * Sets notification_channel
     *
     * @param int[] $notification_channel Notification channels to be used for notification. Must be an array with notification channels identifiers obtained from the [/notification-channels](#operation/notification_channels_list) method.
     *
     * @return $this
     */
    public function setNotificationChannel($notification_channel)
    {
        $this->container['notification_channel'] = $notification_channel;

        return $this;
    }

    /**
     * Gets file_attachment
     *
     * @return int
     */
    public function getFileAttachment()
    {
        return $this->container['file_attachment'];
    }

    /**
     * Sets file_attachment
     *
     * @param int $file_attachment ID of additional file to be attached. Obtained from the [/attachments/upload](#operation/attachment_upload) method. Please note that, this is not for referencing original files!
     *
     * @return $this
     */
    public function setFileAttachment($file_attachment)
    {
        $this->container['file_attachment'] = $file_attachment;

        return $this;
    }

    /**
     * Gets ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->container['ref'];
    }

    /**
     * Sets ref
     *
     * @param string $ref License plate or Reference ID.
     *
     * @return $this
     */
    public function setRef($ref)
    {
        $this->container['ref'] = $ref;

        return $this;
    }

    /**
     * Gets customer_comment
     *
     * @return string
     */
    public function getCustomerComment()
    {
        return $this->container['customer_comment'];
    }

    /**
     * Sets customer_comment
     *
     * @param string $customer_comment Comment for the developers.
     *
     * @return $this
     */
    public function setCustomerComment($customer_comment)
    {
        $this->container['customer_comment'] = $customer_comment;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return map[string,string]
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param map[string,string] $metadata You can use this parameter to attach arbitrary key-value data to be sent. Metadata is useful for storing additional, structured information such as your user's corresponding unique identifier from your system. By default, metadata is acessible, but not used by our developers, but you may use it for your reference. You can specify up to 10 keys, with key names up to 20 characters long and values up to 500 characters long.
     *
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->container['metadata'] = $metadata;

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
