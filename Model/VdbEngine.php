<?php
/**
 * VdbEngine
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
 * Welcome to the TuningFiles API documentation.  # Language  All API methods accept language parameter, which can be set via the `X-LANG` custom header. Content of the header should be the code of the language you are requesting.  Available languages:    * English (`en`)   * Chinese traditional (`zh-hant`)   * Chinese simplified (`zh-hans`)   * Russian (`ru`)   * Norwegian Bokmål (`nb`)   * Latvian (`lv`)   * Lithuanian (`lt`)   * Croatian (`hr`)   * Spanish (`es`)  Set language to English: ``` curl -X GET \"https://api.tuningfiles.com/method\" -H \"x-lang: en\" ```  # Errors If there is an error, API will return appropriate error code and message like so:  ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  HTTP status code will be the same as the error code. In the case above, returned http status code will be 404.   Failed API authentication: ```json {   \"error\": {     \"code\": 403,     \"message\": \"Invalid API key\"   } } ```  API Key doesn't have enough permissions to access requested resource (some API methods require a paid subscription): ```json {   \"error\": {     \"code\": 401,     \"message\": \"This API key does not have enough permissions\"   } } ```  Not found: ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  Bad request: ```json {   \"error\": {     \"code\": 400,     \"message\": \"Bad request / Wrong parameters\"   } } ```  Server error: ```json {   \"error\": {     \"code\": 500,     \"message\": \"Internal server error\"   } } ``` # Rate limits To protect from flood and abuse, this API implements rate limiting. Currently, only requests made to the Vehicle Database REST API are limited. All the requests made to the File Tuning REST API are not rate-limited (this may change in the future).  **Vehicle Database REST API limits:**   - All methods: *3600 calls/hour*  **File Tuning REST API limits:**   - All methods: *no limits*  **Support REST API limits:**   - All methods: *3600 calls/hour*    Limits are per API Key and are reset every hour. If your app hits those limits, API will return error code `401` with message `This API key has reached the time limit for this method`        # Webhooks You can use webhook to receive notifications about particular events. When you enable webhook in your [API settings page](https://app.tuningfiles.com/api), you can let your app execute code immediately after specific events occur, instead of having to make API calls periodically. For example, you can rely on webhooks to trigger an action in your app when project is created, it's status is updated or when file is purchased.  Webhook notification is using `POST` as http request method and contains a JSON payload, and HTTP headers that provide context.      For example, when project is created, webhook will contains the following headers:    **X-TF-EVENT**: project_create     **X-TF-HMAC-SHA256**: aV95gkmXR75CFvdeIn9DwOmpTCBndDqo/70uJWiYtaY=    and JSON body:   ```   {     \"id\": 146356,     \"uuid\": \"07b2402b-00cd-4d61-9bc4-13b85a1849fb\",     \"name\": \"Audi A3 8P 2.0 TDI 136hp 320Nm 2017\",      \"status\": \"Waiting\",     \"status_code\": 0,     ...     \"files\": [       {         \"id\": 246810,         \"uuid\": \"3dbb36a1-d50f-4327-8100-83a8c2f1b869\",         \"project\": 146356,         \"type\": \"Original\",         ...       }     ]   }   ```    ## Headers Webhook notifications are using following custom http headers:      `X-TF-EVENT`: Event which triggered this webhook     `X-TF-HMAC-SHA256`: Webhook verification hash  ## Events Each webhook will contain `X-TF-EVENT` header. This header represents the event which triggered this webhook.  File Tuning REST API event types:   - `project_create` - Project is created. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    - `project_update` - Project is updated. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)   - `file_purchase` - File is purchased. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    Support REST API event types:   - `ticket_created` - Support request (ticket) was created. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_opened` - Support request (ticket) status was set to \"Opened\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_reopened` - Support request (ticket) status was set to \"Opened\". This event is triggered when a \"closed\" ticket has been re-opened again. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_answered` - Support request (ticket) status was set to \"Answered\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_closed` - Support request (ticket) status was set to \"Closed\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `message_created` - Triggered when a new message (reply) is added into the ticket. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)    ## Verification To allow a client to verify a webhook message has in fact come from TuningFiles, an `X-TF-HMAC-SHA256` header is included in each webhook POST message. The contents of this header is the Base64 encoded output of the HMAC SHA256 encoding of the JSON body of the message, using your API Secret as the encryption key.   Following psuedo PHP example shows how we generate the `X-TF-HMAC-SHA256` value: ```php   base64_encode(hash_hmac('sha256', $webhook_json, $your_api_secret, true)); ```  To verify the authenticity of the webhook message, you should calculate this value yourself and verify it equals the value contained in the header. # SDKs TuningFiles offers a PHP SDK to help interact with the API.  However, no SDK is required to use the API. ## PHP SDK [PHP SDK](https://github.com/sedox/tuningfiles-php-sdk) is hosted on [Github](https://github.com/sedox/tuningfiles-php-sdk). For all PHP SDK examples provided in these docs you will need to configure the `$apiInstance`. You may do it like this:   - For Vehicle Database API:      ```php       $apiInstance = new Tuningfiles\\Api\\VehicleDatabaseApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```    - For Tuning API:          ```php       $apiInstance = new Tuningfiles\\Api\\TuningApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```
 *
 * OpenAPI spec version: 1.1.3
 * Contact: support@tuningfiles.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.24
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
 * VdbEngine Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class VdbEngine implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'vdb_engine';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'name' => 'string',
'slug' => 'string',
'type' => 'string',
'capacity' => 'int',
'power' => 'int',
'torque' => 'int',
'cylinders' => 'int',
'year' => 'int',
'ecu' => 'string',
'tcu' => 'string',
'hp_values' => 'string',
'nm_values' => 'string',
'rpm_values' => 'string',
'engine_code' => 'string',
'fuel_name' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'name' => null,
'slug' => null,
'type' => null,
'capacity' => null,
'power' => null,
'torque' => null,
'cylinders' => null,
'year' => null,
'ecu' => null,
'tcu' => null,
'hp_values' => null,
'nm_values' => null,
'rpm_values' => null,
'engine_code' => null,
'fuel_name' => null    ];

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
'name' => 'name',
'slug' => 'slug',
'type' => 'type',
'capacity' => 'capacity',
'power' => 'power',
'torque' => 'torque',
'cylinders' => 'cylinders',
'year' => 'year',
'ecu' => 'ecu',
'tcu' => 'tcu',
'hp_values' => 'hp_values',
'nm_values' => 'nm_values',
'rpm_values' => 'rpm_values',
'engine_code' => 'engine_code',
'fuel_name' => 'fuel_name'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'name' => 'setName',
'slug' => 'setSlug',
'type' => 'setType',
'capacity' => 'setCapacity',
'power' => 'setPower',
'torque' => 'setTorque',
'cylinders' => 'setCylinders',
'year' => 'setYear',
'ecu' => 'setEcu',
'tcu' => 'setTcu',
'hp_values' => 'setHpValues',
'nm_values' => 'setNmValues',
'rpm_values' => 'setRpmValues',
'engine_code' => 'setEngineCode',
'fuel_name' => 'setFuelName'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'name' => 'getName',
'slug' => 'getSlug',
'type' => 'getType',
'capacity' => 'getCapacity',
'power' => 'getPower',
'torque' => 'getTorque',
'cylinders' => 'getCylinders',
'year' => 'getYear',
'ecu' => 'getEcu',
'tcu' => 'getTcu',
'hp_values' => 'getHpValues',
'nm_values' => 'getNmValues',
'rpm_values' => 'getRpmValues',
'engine_code' => 'getEngineCode',
'fuel_name' => 'getFuelName'    ];

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
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['slug'] = isset($data['slug']) ? $data['slug'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['capacity'] = isset($data['capacity']) ? $data['capacity'] : null;
        $this->container['power'] = isset($data['power']) ? $data['power'] : null;
        $this->container['torque'] = isset($data['torque']) ? $data['torque'] : null;
        $this->container['cylinders'] = isset($data['cylinders']) ? $data['cylinders'] : null;
        $this->container['year'] = isset($data['year']) ? $data['year'] : null;
        $this->container['ecu'] = isset($data['ecu']) ? $data['ecu'] : null;
        $this->container['tcu'] = isset($data['tcu']) ? $data['tcu'] : null;
        $this->container['hp_values'] = isset($data['hp_values']) ? $data['hp_values'] : null;
        $this->container['nm_values'] = isset($data['nm_values']) ? $data['nm_values'] : null;
        $this->container['rpm_values'] = isset($data['rpm_values']) ? $data['rpm_values'] : null;
        $this->container['engine_code'] = isset($data['engine_code']) ? $data['engine_code'] : null;
        $this->container['fuel_name'] = isset($data['fuel_name']) ? $data['fuel_name'] : null;
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
     * @param int $id Engine ID.
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

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
     * @param string $name Engine name.
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->container['slug'];
    }

    /**
     * Sets slug
     *
     * @param string $slug URL-friendly name (slug).
     *
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->container['slug'] = $slug;

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
     * @param string $type Engine type. Diesel, Petrol, Turbo Diesel, Turbo Petrol, Heavy Diesel, Heavy Turbo Diesel, Marine Diesel, Marine Petrol, Marine Turbo Diesel, Hybrid, Other.
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->container['capacity'];
    }

    /**
     * Sets capacity
     *
     * @param int $capacity Engine capacity in cubic cm.
     *
     * @return $this
     */
    public function setCapacity($capacity)
    {
        $this->container['capacity'] = $capacity;

        return $this;
    }

    /**
     * Gets power
     *
     * @return int
     */
    public function getPower()
    {
        return $this->container['power'];
    }

    /**
     * Sets power
     *
     * @param int $power Engine horse power (metric).
     *
     * @return $this
     */
    public function setPower($power)
    {
        $this->container['power'] = $power;

        return $this;
    }

    /**
     * Gets torque
     *
     * @return int
     */
    public function getTorque()
    {
        return $this->container['torque'];
    }

    /**
     * Sets torque
     *
     * @param int $torque Engine torque in Nm.
     *
     * @return $this
     */
    public function setTorque($torque)
    {
        $this->container['torque'] = $torque;

        return $this;
    }

    /**
     * Gets cylinders
     *
     * @return int
     */
    public function getCylinders()
    {
        return $this->container['cylinders'];
    }

    /**
     * Sets cylinders
     *
     * @param int $cylinders Number of cylinders.
     *
     * @return $this
     */
    public function setCylinders($cylinders)
    {
        $this->container['cylinders'] = $cylinders;

        return $this;
    }

    /**
     * Gets year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->container['year'];
    }

    /**
     * Sets year
     *
     * @param int $year Manufacture year.
     *
     * @return $this
     */
    public function setYear($year)
    {
        $this->container['year'] = $year;

        return $this;
    }

    /**
     * Gets ecu
     *
     * @return string
     */
    public function getEcu()
    {
        return $this->container['ecu'];
    }

    /**
     * Sets ecu
     *
     * @param string $ecu ECU used.
     *
     * @return $this
     */
    public function setEcu($ecu)
    {
        $this->container['ecu'] = $ecu;

        return $this;
    }

    /**
     * Gets tcu
     *
     * @return string
     */
    public function getTcu()
    {
        return $this->container['tcu'];
    }

    /**
     * Sets tcu
     *
     * @param string $tcu Transmission control unit.
     *
     * @return $this
     */
    public function setTcu($tcu)
    {
        $this->container['tcu'] = $tcu;

        return $this;
    }

    /**
     * Gets hp_values
     *
     * @return string
     */
    public function getHpValues()
    {
        return $this->container['hp_values'];
    }

    /**
     * Sets hp_values
     *
     * @param string $hp_values HP values for plotting a dyno chart.
     *
     * @return $this
     */
    public function setHpValues($hp_values)
    {
        $this->container['hp_values'] = $hp_values;

        return $this;
    }

    /**
     * Gets nm_values
     *
     * @return string
     */
    public function getNmValues()
    {
        return $this->container['nm_values'];
    }

    /**
     * Sets nm_values
     *
     * @param string $nm_values Nm values for plotting a dyno chart.
     *
     * @return $this
     */
    public function setNmValues($nm_values)
    {
        $this->container['nm_values'] = $nm_values;

        return $this;
    }

    /**
     * Gets rpm_values
     *
     * @return string
     */
    public function getRpmValues()
    {
        return $this->container['rpm_values'];
    }

    /**
     * Sets rpm_values
     *
     * @param string $rpm_values RPM values for plotting a dyno chart.
     *
     * @return $this
     */
    public function setRpmValues($rpm_values)
    {
        $this->container['rpm_values'] = $rpm_values;

        return $this;
    }

    /**
     * Gets engine_code
     *
     * @return string
     */
    public function getEngineCode()
    {
        return $this->container['engine_code'];
    }

    /**
     * Sets engine_code
     *
     * @param string $engine_code Engine code.
     *
     * @return $this
     */
    public function setEngineCode($engine_code)
    {
        $this->container['engine_code'] = $engine_code;

        return $this;
    }

    /**
     * Gets fuel_name
     *
     * @return string
     */
    public function getFuelName()
    {
        return $this->container['fuel_name'];
    }

    /**
     * Sets fuel_name
     *
     * @param string $fuel_name Type of the fuel used. Diesel, Petrol, Ethanol, LPG, Hybrid.
     *
     * @return $this
     */
    public function setFuelName($fuel_name)
    {
        $this->container['fuel_name'] = $fuel_name;

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
