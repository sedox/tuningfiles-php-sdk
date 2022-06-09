<?php
/**
 * ProjectVehicleData
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
 * Welcome to the TuningFiles API documentation.  # Language  All API methods accept language parameter, which can be set via the `X-LANG` custom header. Content of the header should be the code of the language you are requesting.  Available languages:    * English (`en`)   * Chinese traditional (`zh-hant`)   * Chinese simplified (`zh-hans`)   * Russian (`ru`)   * Norwegian Bokmål (`nb`)   * Latvian (`lv`)   * Lithuanian (`lt`)   * Croatian (`hr`)   * Spanish (`es`)  Set language to English: ``` curl -X GET \"https://api.tuningfiles.com/method\" -H \"x-lang: en\" ```  # Errors If there is an error, API will return appropriate error code and message like so:  ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  HTTP status code will be the same as the error code. In the case above, returned http status code will be 404.   Failed API authentication: ```json {   \"error\": {     \"code\": 403,     \"message\": \"Invalid API key\"   } } ```  API Key doesn't have enough permissions to access requested resource (some API methods require a paid subscription): ```json {   \"error\": {     \"code\": 401,     \"message\": \"This API key does not have enough permissions\"   } } ```  Not found: ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  Bad request: ```json {   \"error\": {     \"code\": 400,     \"message\": \"Bad request / Wrong parameters\"   } } ```  Server error: ```json {   \"error\": {     \"code\": 500,     \"message\": \"Internal server error\"   } } ``` # Rate limits To protect from flood and abuse, this API implements rate limiting. Currently, only requests made to the Vehicle Database REST API are limited. All the requests made to the File Tuning REST API are not rate-limited (this may change in the future).  **Vehicle Database REST API limits:**   - All methods: *3600 calls/hour*  **File Tuning REST API limits:**   - All methods: *no limits*  **Support REST API limits:**   - All methods: *3600 calls/hour*    Limits are per API Key and are reset every hour. If your app hits those limits, API will return error code `429` with message `This API key has reached the time limit for this method`        # Webhooks You can use webhook to receive notifications about particular events. When you enable webhook in your [API settings page](https://app.tuningfiles.com/api), you can let your app execute code immediately after specific events occur, instead of having to make API calls periodically. For example, you can rely on webhooks to trigger an action in your app when project is created, it's status is updated or when file is purchased.  Webhook notification is using `POST` as http request method and contains a JSON payload, and HTTP headers that provide context.      For example, when project is created, webhook will contains the following headers:    **X-TF-EVENT**: project_create     **X-TF-HMAC-SHA256**: aV95gkmXR75CFvdeIn9DwOmpTCBndDqo/70uJWiYtaY=    and JSON body:   ```   {     \"id\": 146356,     \"uuid\": \"07b2402b-00cd-4d61-9bc4-13b85a1849fb\",     \"name\": \"Audi A3 8P 2.0 TDI 136hp 320Nm 2017\",      \"status\": \"Waiting\",     \"status_code\": 0,     ...     \"files\": [       {         \"id\": 246810,         \"uuid\": \"3dbb36a1-d50f-4327-8100-83a8c2f1b869\",         \"project\": 146356,         \"type\": \"Original\",         ...       }     ]   }   ```    ## Headers Webhook notifications are using following custom http headers:      `X-TF-EVENT`: Event which triggered this webhook     `X-TF-HMAC-SHA256`: Webhook verification hash  ## Events Each webhook will contain `X-TF-EVENT` header. This header represents the event which triggered this webhook.  File Tuning REST API event types:   - `project_create` - Project is created. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    - `project_update` - Project is updated. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)   - `file_purchase` - File is purchased. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    Support REST API event types:   - `ticket_created` - Support request (ticket) was created. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_opened` - Support request (ticket) status was set to \"Opened\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_reopened` - Support request (ticket) status was set to \"Opened\". This event is triggered when a \"closed\" ticket has been re-opened again. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_answered` - Support request (ticket) status was set to \"Answered\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_closed` - Support request (ticket) status was set to \"Closed\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `message_created` - Triggered when a new message (reply) is added into the ticket. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)    ## Verification To allow a client to verify a webhook message has in fact come from TuningFiles, an `X-TF-HMAC-SHA256` header is included in each webhook POST message. The contents of this header is the Base64 encoded output of the HMAC SHA256 encoding of the JSON body of the message, using your API Secret as the encryption key.   Following psuedo PHP example shows how we generate the `X-TF-HMAC-SHA256` value: ```php   base64_encode(hash_hmac('sha256', $webhook_json, $your_api_secret, true)); ```  To verify the authenticity of the webhook message, you should calculate this value yourself and verify it equals the value contained in the header. # SDKs TuningFiles offers a PHP SDK to help interact with the API.  However, no SDK is required to use the API. ## PHP SDK [PHP SDK](https://github.com/sedox/tuningfiles-php-sdk) is hosted on [Github](https://github.com/sedox/tuningfiles-php-sdk). For all PHP SDK examples provided in these docs you will need to configure the `$apiInstance`. You may do it like this:   - For Vehicle Database API:      ```php       $apiInstance = new Tuningfiles\\Api\\VehicleDatabaseApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```    - For Tuning API:          ```php       $apiInstance = new Tuningfiles\\Api\\TuningApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```
 *
 * OpenAPI spec version: 1.2.1
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
 * ProjectVehicleData Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProjectVehicleData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'project_vehicle_data';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'type' => 'string',
'producer' => 'string',
'producer_id' => 'int',
'series' => 'string',
'build' => 'string',
'model' => 'string',
'model_id' => 'int',
'model_year' => 'int',
'generation' => 'string',
'generation_id' => 'int',
'engine_name' => 'string',
'engine_id' => 'int',
'engine_output_ps' => 'int',
'engine_transmission' => 'string',
'engine_transmission_id' => 'int',
'ecu_producer' => 'string',
'ecu_build' => 'string',
'ecu_oem_number' => 'string',
'ecu_hardware_number' => 'string',
'ecu_software_number' => 'string',
'ecu_software_upgrade_version' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'type' => null,
'producer' => null,
'producer_id' => null,
'series' => null,
'build' => null,
'model' => null,
'model_id' => null,
'model_year' => null,
'generation' => null,
'generation_id' => null,
'engine_name' => null,
'engine_id' => null,
'engine_output_ps' => null,
'engine_transmission' => null,
'engine_transmission_id' => null,
'ecu_producer' => null,
'ecu_build' => null,
'ecu_oem_number' => null,
'ecu_hardware_number' => null,
'ecu_software_number' => null,
'ecu_software_upgrade_version' => null    ];

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
'type' => 'type',
'producer' => 'producer',
'producer_id' => 'producer_id',
'series' => 'series',
'build' => 'build',
'model' => 'model',
'model_id' => 'model_id',
'model_year' => 'model_year',
'generation' => 'generation',
'generation_id' => 'generation_id',
'engine_name' => 'engine_name',
'engine_id' => 'engine_id',
'engine_output_ps' => 'engine_output_ps',
'engine_transmission' => 'engine_transmission',
'engine_transmission_id' => 'engine_transmission_id',
'ecu_producer' => 'ecu_producer',
'ecu_build' => 'ecu_build',
'ecu_oem_number' => 'ecu_oem_number',
'ecu_hardware_number' => 'ecu_hardware_number',
'ecu_software_number' => 'ecu_software_number',
'ecu_software_upgrade_version' => 'ecu_software_upgrade_version'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'type' => 'setType',
'producer' => 'setProducer',
'producer_id' => 'setProducerId',
'series' => 'setSeries',
'build' => 'setBuild',
'model' => 'setModel',
'model_id' => 'setModelId',
'model_year' => 'setModelYear',
'generation' => 'setGeneration',
'generation_id' => 'setGenerationId',
'engine_name' => 'setEngineName',
'engine_id' => 'setEngineId',
'engine_output_ps' => 'setEngineOutputPs',
'engine_transmission' => 'setEngineTransmission',
'engine_transmission_id' => 'setEngineTransmissionId',
'ecu_producer' => 'setEcuProducer',
'ecu_build' => 'setEcuBuild',
'ecu_oem_number' => 'setEcuOemNumber',
'ecu_hardware_number' => 'setEcuHardwareNumber',
'ecu_software_number' => 'setEcuSoftwareNumber',
'ecu_software_upgrade_version' => 'setEcuSoftwareUpgradeVersion'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'type' => 'getType',
'producer' => 'getProducer',
'producer_id' => 'getProducerId',
'series' => 'getSeries',
'build' => 'getBuild',
'model' => 'getModel',
'model_id' => 'getModelId',
'model_year' => 'getModelYear',
'generation' => 'getGeneration',
'generation_id' => 'getGenerationId',
'engine_name' => 'getEngineName',
'engine_id' => 'getEngineId',
'engine_output_ps' => 'getEngineOutputPs',
'engine_transmission' => 'getEngineTransmission',
'engine_transmission_id' => 'getEngineTransmissionId',
'ecu_producer' => 'getEcuProducer',
'ecu_build' => 'getEcuBuild',
'ecu_oem_number' => 'getEcuOemNumber',
'ecu_hardware_number' => 'getEcuHardwareNumber',
'ecu_software_number' => 'getEcuSoftwareNumber',
'ecu_software_upgrade_version' => 'getEcuSoftwareUpgradeVersion'    ];

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
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['producer'] = isset($data['producer']) ? $data['producer'] : null;
        $this->container['producer_id'] = isset($data['producer_id']) ? $data['producer_id'] : null;
        $this->container['series'] = isset($data['series']) ? $data['series'] : null;
        $this->container['build'] = isset($data['build']) ? $data['build'] : null;
        $this->container['model'] = isset($data['model']) ? $data['model'] : null;
        $this->container['model_id'] = isset($data['model_id']) ? $data['model_id'] : null;
        $this->container['model_year'] = isset($data['model_year']) ? $data['model_year'] : null;
        $this->container['generation'] = isset($data['generation']) ? $data['generation'] : null;
        $this->container['generation_id'] = isset($data['generation_id']) ? $data['generation_id'] : null;
        $this->container['engine_name'] = isset($data['engine_name']) ? $data['engine_name'] : null;
        $this->container['engine_id'] = isset($data['engine_id']) ? $data['engine_id'] : null;
        $this->container['engine_output_ps'] = isset($data['engine_output_ps']) ? $data['engine_output_ps'] : null;
        $this->container['engine_transmission'] = isset($data['engine_transmission']) ? $data['engine_transmission'] : null;
        $this->container['engine_transmission_id'] = isset($data['engine_transmission_id']) ? $data['engine_transmission_id'] : null;
        $this->container['ecu_producer'] = isset($data['ecu_producer']) ? $data['ecu_producer'] : null;
        $this->container['ecu_build'] = isset($data['ecu_build']) ? $data['ecu_build'] : null;
        $this->container['ecu_oem_number'] = isset($data['ecu_oem_number']) ? $data['ecu_oem_number'] : null;
        $this->container['ecu_hardware_number'] = isset($data['ecu_hardware_number']) ? $data['ecu_hardware_number'] : null;
        $this->container['ecu_software_number'] = isset($data['ecu_software_number']) ? $data['ecu_software_number'] : null;
        $this->container['ecu_software_upgrade_version'] = isset($data['ecu_software_upgrade_version']) ? $data['ecu_software_upgrade_version'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * @param int $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets producer
     *
     * @return string
     */
    public function getProducer()
    {
        return $this->container['producer'];
    }

    /**
     * Sets producer
     *
     * @param string $producer producer
     *
     * @return $this
     */
    public function setProducer($producer)
    {
        $this->container['producer'] = $producer;

        return $this;
    }

    /**
     * Gets producer_id
     *
     * @return int
     */
    public function getProducerId()
    {
        return $this->container['producer_id'];
    }

    /**
     * Sets producer_id
     *
     * @param int $producer_id producer_id
     *
     * @return $this
     */
    public function setProducerId($producer_id)
    {
        $this->container['producer_id'] = $producer_id;

        return $this;
    }

    /**
     * Gets series
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->container['series'];
    }

    /**
     * Sets series
     *
     * @param string $series series
     *
     * @return $this
     */
    public function setSeries($series)
    {
        $this->container['series'] = $series;

        return $this;
    }

    /**
     * Gets build
     *
     * @return string
     */
    public function getBuild()
    {
        return $this->container['build'];
    }

    /**
     * Sets build
     *
     * @param string $build build
     *
     * @return $this
     */
    public function setBuild($build)
    {
        $this->container['build'] = $build;

        return $this;
    }

    /**
     * Gets model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->container['model'];
    }

    /**
     * Sets model
     *
     * @param string $model model
     *
     * @return $this
     */
    public function setModel($model)
    {
        $this->container['model'] = $model;

        return $this;
    }

    /**
     * Gets model_id
     *
     * @return int
     */
    public function getModelId()
    {
        return $this->container['model_id'];
    }

    /**
     * Sets model_id
     *
     * @param int $model_id model_id
     *
     * @return $this
     */
    public function setModelId($model_id)
    {
        $this->container['model_id'] = $model_id;

        return $this;
    }

    /**
     * Gets model_year
     *
     * @return int
     */
    public function getModelYear()
    {
        return $this->container['model_year'];
    }

    /**
     * Sets model_year
     *
     * @param int $model_year model_year
     *
     * @return $this
     */
    public function setModelYear($model_year)
    {
        $this->container['model_year'] = $model_year;

        return $this;
    }

    /**
     * Gets generation
     *
     * @return string
     */
    public function getGeneration()
    {
        return $this->container['generation'];
    }

    /**
     * Sets generation
     *
     * @param string $generation generation
     *
     * @return $this
     */
    public function setGeneration($generation)
    {
        $this->container['generation'] = $generation;

        return $this;
    }

    /**
     * Gets generation_id
     *
     * @return int
     */
    public function getGenerationId()
    {
        return $this->container['generation_id'];
    }

    /**
     * Sets generation_id
     *
     * @param int $generation_id generation_id
     *
     * @return $this
     */
    public function setGenerationId($generation_id)
    {
        $this->container['generation_id'] = $generation_id;

        return $this;
    }

    /**
     * Gets engine_name
     *
     * @return string
     */
    public function getEngineName()
    {
        return $this->container['engine_name'];
    }

    /**
     * Sets engine_name
     *
     * @param string $engine_name engine_name
     *
     * @return $this
     */
    public function setEngineName($engine_name)
    {
        $this->container['engine_name'] = $engine_name;

        return $this;
    }

    /**
     * Gets engine_id
     *
     * @return int
     */
    public function getEngineId()
    {
        return $this->container['engine_id'];
    }

    /**
     * Sets engine_id
     *
     * @param int $engine_id engine_id
     *
     * @return $this
     */
    public function setEngineId($engine_id)
    {
        $this->container['engine_id'] = $engine_id;

        return $this;
    }

    /**
     * Gets engine_output_ps
     *
     * @return int
     */
    public function getEngineOutputPs()
    {
        return $this->container['engine_output_ps'];
    }

    /**
     * Sets engine_output_ps
     *
     * @param int $engine_output_ps engine_output_ps
     *
     * @return $this
     */
    public function setEngineOutputPs($engine_output_ps)
    {
        $this->container['engine_output_ps'] = $engine_output_ps;

        return $this;
    }

    /**
     * Gets engine_transmission
     *
     * @return string
     */
    public function getEngineTransmission()
    {
        return $this->container['engine_transmission'];
    }

    /**
     * Sets engine_transmission
     *
     * @param string $engine_transmission engine_transmission
     *
     * @return $this
     */
    public function setEngineTransmission($engine_transmission)
    {
        $this->container['engine_transmission'] = $engine_transmission;

        return $this;
    }

    /**
     * Gets engine_transmission_id
     *
     * @return int
     */
    public function getEngineTransmissionId()
    {
        return $this->container['engine_transmission_id'];
    }

    /**
     * Sets engine_transmission_id
     *
     * @param int $engine_transmission_id engine_transmission_id
     *
     * @return $this
     */
    public function setEngineTransmissionId($engine_transmission_id)
    {
        $this->container['engine_transmission_id'] = $engine_transmission_id;

        return $this;
    }

    /**
     * Gets ecu_producer
     *
     * @return string
     */
    public function getEcuProducer()
    {
        return $this->container['ecu_producer'];
    }

    /**
     * Sets ecu_producer
     *
     * @param string $ecu_producer ecu_producer
     *
     * @return $this
     */
    public function setEcuProducer($ecu_producer)
    {
        $this->container['ecu_producer'] = $ecu_producer;

        return $this;
    }

    /**
     * Gets ecu_build
     *
     * @return string
     */
    public function getEcuBuild()
    {
        return $this->container['ecu_build'];
    }

    /**
     * Sets ecu_build
     *
     * @param string $ecu_build ecu_build
     *
     * @return $this
     */
    public function setEcuBuild($ecu_build)
    {
        $this->container['ecu_build'] = $ecu_build;

        return $this;
    }

    /**
     * Gets ecu_oem_number
     *
     * @return string
     */
    public function getEcuOemNumber()
    {
        return $this->container['ecu_oem_number'];
    }

    /**
     * Sets ecu_oem_number
     *
     * @param string $ecu_oem_number ecu_oem_number
     *
     * @return $this
     */
    public function setEcuOemNumber($ecu_oem_number)
    {
        $this->container['ecu_oem_number'] = $ecu_oem_number;

        return $this;
    }

    /**
     * Gets ecu_hardware_number
     *
     * @return string
     */
    public function getEcuHardwareNumber()
    {
        return $this->container['ecu_hardware_number'];
    }

    /**
     * Sets ecu_hardware_number
     *
     * @param string $ecu_hardware_number ecu_hardware_number
     *
     * @return $this
     */
    public function setEcuHardwareNumber($ecu_hardware_number)
    {
        $this->container['ecu_hardware_number'] = $ecu_hardware_number;

        return $this;
    }

    /**
     * Gets ecu_software_number
     *
     * @return string
     */
    public function getEcuSoftwareNumber()
    {
        return $this->container['ecu_software_number'];
    }

    /**
     * Sets ecu_software_number
     *
     * @param string $ecu_software_number ecu_software_number
     *
     * @return $this
     */
    public function setEcuSoftwareNumber($ecu_software_number)
    {
        $this->container['ecu_software_number'] = $ecu_software_number;

        return $this;
    }

    /**
     * Gets ecu_software_upgrade_version
     *
     * @return string
     */
    public function getEcuSoftwareUpgradeVersion()
    {
        return $this->container['ecu_software_upgrade_version'];
    }

    /**
     * Sets ecu_software_upgrade_version
     *
     * @param string $ecu_software_upgrade_version ecu_software_upgrade_version
     *
     * @return $this
     */
    public function setEcuSoftwareUpgradeVersion($ecu_software_upgrade_version)
    {
        $this->container['ecu_software_upgrade_version'] = $ecu_software_upgrade_version;

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
