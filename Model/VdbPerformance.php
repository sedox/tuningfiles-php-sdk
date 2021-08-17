<?php
/**
 * VdbPerformance
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
 * OpenAPI spec version: 1.1.7
 * Contact: support@tuningfiles.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.28-SNAPSHOT
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
 * VdbPerformance Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class VdbPerformance implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'vdb_performance';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'fuel_consumption_avg' => 'float',
'top_speed' => 'float',
'zero_to_hundred' => 'float',
'top_speed_st1' => 'float',
'zero_to_hundred_st1' => 'float',
'top_speed_st2' => 'float',
'zero_to_hundred_st2' => 'float'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'fuel_consumption_avg' => null,
'top_speed' => null,
'zero_to_hundred' => null,
'top_speed_st1' => null,
'zero_to_hundred_st1' => null,
'top_speed_st2' => null,
'zero_to_hundred_st2' => null    ];

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
'fuel_consumption_avg' => 'fuel_consumption_avg',
'top_speed' => 'top_speed',
'zero_to_hundred' => 'zero_to_hundred',
'top_speed_st1' => 'top_speed_st1',
'zero_to_hundred_st1' => 'zero_to_hundred_st1',
'top_speed_st2' => 'top_speed_st2',
'zero_to_hundred_st2' => 'zero_to_hundred_st2'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'fuel_consumption_avg' => 'setFuelConsumptionAvg',
'top_speed' => 'setTopSpeed',
'zero_to_hundred' => 'setZeroToHundred',
'top_speed_st1' => 'setTopSpeedSt1',
'zero_to_hundred_st1' => 'setZeroToHundredSt1',
'top_speed_st2' => 'setTopSpeedSt2',
'zero_to_hundred_st2' => 'setZeroToHundredSt2'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'fuel_consumption_avg' => 'getFuelConsumptionAvg',
'top_speed' => 'getTopSpeed',
'zero_to_hundred' => 'getZeroToHundred',
'top_speed_st1' => 'getTopSpeedSt1',
'zero_to_hundred_st1' => 'getZeroToHundredSt1',
'top_speed_st2' => 'getTopSpeedSt2',
'zero_to_hundred_st2' => 'getZeroToHundredSt2'    ];

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
        $this->container['fuel_consumption_avg'] = isset($data['fuel_consumption_avg']) ? $data['fuel_consumption_avg'] : null;
        $this->container['top_speed'] = isset($data['top_speed']) ? $data['top_speed'] : null;
        $this->container['zero_to_hundred'] = isset($data['zero_to_hundred']) ? $data['zero_to_hundred'] : null;
        $this->container['top_speed_st1'] = isset($data['top_speed_st1']) ? $data['top_speed_st1'] : null;
        $this->container['zero_to_hundred_st1'] = isset($data['zero_to_hundred_st1']) ? $data['zero_to_hundred_st1'] : null;
        $this->container['top_speed_st2'] = isset($data['top_speed_st2']) ? $data['top_speed_st2'] : null;
        $this->container['zero_to_hundred_st2'] = isset($data['zero_to_hundred_st2']) ? $data['zero_to_hundred_st2'] : null;
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
     * Gets fuel_consumption_avg
     *
     * @return float
     */
    public function getFuelConsumptionAvg()
    {
        return $this->container['fuel_consumption_avg'];
    }

    /**
     * Sets fuel_consumption_avg
     *
     * @param float $fuel_consumption_avg Average fuel consumption.
     *
     * @return $this
     */
    public function setFuelConsumptionAvg($fuel_consumption_avg)
    {
        $this->container['fuel_consumption_avg'] = $fuel_consumption_avg;

        return $this;
    }

    /**
     * Gets top_speed
     *
     * @return float
     */
    public function getTopSpeed()
    {
        return $this->container['top_speed'];
    }

    /**
     * Sets top_speed
     *
     * @param float $top_speed Maximum speed in kmh.
     *
     * @return $this
     */
    public function setTopSpeed($top_speed)
    {
        $this->container['top_speed'] = $top_speed;

        return $this;
    }

    /**
     * Gets zero_to_hundred
     *
     * @return float
     */
    public function getZeroToHundred()
    {
        return $this->container['zero_to_hundred'];
    }

    /**
     * Sets zero_to_hundred
     *
     * @param float $zero_to_hundred Time to get from 0kmh to 100kmh (in seconds).
     *
     * @return $this
     */
    public function setZeroToHundred($zero_to_hundred)
    {
        $this->container['zero_to_hundred'] = $zero_to_hundred;

        return $this;
    }

    /**
     * Gets top_speed_st1
     *
     * @return float
     */
    public function getTopSpeedSt1()
    {
        return $this->container['top_speed_st1'];
    }

    /**
     * Sets top_speed_st1
     *
     * @param float $top_speed_st1 Maximum speed with Stage 1 tuning (in kmh).
     *
     * @return $this
     */
    public function setTopSpeedSt1($top_speed_st1)
    {
        $this->container['top_speed_st1'] = $top_speed_st1;

        return $this;
    }

    /**
     * Gets zero_to_hundred_st1
     *
     * @return float
     */
    public function getZeroToHundredSt1()
    {
        return $this->container['zero_to_hundred_st1'];
    }

    /**
     * Sets zero_to_hundred_st1
     *
     * @param float $zero_to_hundred_st1 Time to get from 0kmh to 100kmh with Stage 1 tuning (in seconds).
     *
     * @return $this
     */
    public function setZeroToHundredSt1($zero_to_hundred_st1)
    {
        $this->container['zero_to_hundred_st1'] = $zero_to_hundred_st1;

        return $this;
    }

    /**
     * Gets top_speed_st2
     *
     * @return float
     */
    public function getTopSpeedSt2()
    {
        return $this->container['top_speed_st2'];
    }

    /**
     * Sets top_speed_st2
     *
     * @param float $top_speed_st2 Maximum speed with Stage 2 tuning (in kmh).
     *
     * @return $this
     */
    public function setTopSpeedSt2($top_speed_st2)
    {
        $this->container['top_speed_st2'] = $top_speed_st2;

        return $this;
    }

    /**
     * Gets zero_to_hundred_st2
     *
     * @return float
     */
    public function getZeroToHundredSt2()
    {
        return $this->container['zero_to_hundred_st2'];
    }

    /**
     * Sets zero_to_hundred_st2
     *
     * @param float $zero_to_hundred_st2 Time to get from 0kmh to 100kmh with Stage 2 tuning (in seconds).
     *
     * @return $this
     */
    public function setZeroToHundredSt2($zero_to_hundred_st2)
    {
        $this->container['zero_to_hundred_st2'] = $zero_to_hundred_st2;

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
