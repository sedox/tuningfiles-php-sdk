<?php
/**
 * VdbSearchInner
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
 * OpenAPI spec version: 1.1.5
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
 * VdbSearchInner Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class VdbSearchInner implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'vdb_search_inner';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'type_id' => 'int',
'type_name' => 'string',
'manufacturer_id' => 'int',
'manufacturer_name' => 'string',
'manufacturer_slug' => 'string',
'brand_logo' => 'string',
'model_id' => 'int',
'model_common_name' => 'string',
'model_slug' => 'string',
'model_photo' => 'string',
'model_photo_unbranded' => 'string',
'generation_id' => 'int',
'generation_name' => 'string',
'generation_slug' => 'string',
'generation_photo' => 'string',
'generation_photo_unbranded' => 'string',
'engine_id' => 'int',
'engine_name' => 'string',
'engine_slug' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'type_id' => null,
'type_name' => null,
'manufacturer_id' => null,
'manufacturer_name' => null,
'manufacturer_slug' => null,
'brand_logo' => null,
'model_id' => null,
'model_common_name' => null,
'model_slug' => null,
'model_photo' => null,
'model_photo_unbranded' => null,
'generation_id' => null,
'generation_name' => null,
'generation_slug' => null,
'generation_photo' => null,
'generation_photo_unbranded' => null,
'engine_id' => null,
'engine_name' => null,
'engine_slug' => null    ];

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
'type_id' => 'type_id',
'type_name' => 'type_name',
'manufacturer_id' => 'manufacturer_id',
'manufacturer_name' => 'manufacturer_name',
'manufacturer_slug' => 'manufacturer_slug',
'brand_logo' => 'brand_logo',
'model_id' => 'model_id',
'model_common_name' => 'model_common_name',
'model_slug' => 'model_slug',
'model_photo' => 'model_photo',
'model_photo_unbranded' => 'model_photo_unbranded',
'generation_id' => 'generation_id',
'generation_name' => 'generation_name',
'generation_slug' => 'generation_slug',
'generation_photo' => 'generation_photo',
'generation_photo_unbranded' => 'generation_photo_unbranded',
'engine_id' => 'engine_id',
'engine_name' => 'engine_name',
'engine_slug' => 'engine_slug'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'type_id' => 'setTypeId',
'type_name' => 'setTypeName',
'manufacturer_id' => 'setManufacturerId',
'manufacturer_name' => 'setManufacturerName',
'manufacturer_slug' => 'setManufacturerSlug',
'brand_logo' => 'setBrandLogo',
'model_id' => 'setModelId',
'model_common_name' => 'setModelCommonName',
'model_slug' => 'setModelSlug',
'model_photo' => 'setModelPhoto',
'model_photo_unbranded' => 'setModelPhotoUnbranded',
'generation_id' => 'setGenerationId',
'generation_name' => 'setGenerationName',
'generation_slug' => 'setGenerationSlug',
'generation_photo' => 'setGenerationPhoto',
'generation_photo_unbranded' => 'setGenerationPhotoUnbranded',
'engine_id' => 'setEngineId',
'engine_name' => 'setEngineName',
'engine_slug' => 'setEngineSlug'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'type_id' => 'getTypeId',
'type_name' => 'getTypeName',
'manufacturer_id' => 'getManufacturerId',
'manufacturer_name' => 'getManufacturerName',
'manufacturer_slug' => 'getManufacturerSlug',
'brand_logo' => 'getBrandLogo',
'model_id' => 'getModelId',
'model_common_name' => 'getModelCommonName',
'model_slug' => 'getModelSlug',
'model_photo' => 'getModelPhoto',
'model_photo_unbranded' => 'getModelPhotoUnbranded',
'generation_id' => 'getGenerationId',
'generation_name' => 'getGenerationName',
'generation_slug' => 'getGenerationSlug',
'generation_photo' => 'getGenerationPhoto',
'generation_photo_unbranded' => 'getGenerationPhotoUnbranded',
'engine_id' => 'getEngineId',
'engine_name' => 'getEngineName',
'engine_slug' => 'getEngineSlug'    ];

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
        $this->container['type_id'] = isset($data['type_id']) ? $data['type_id'] : null;
        $this->container['type_name'] = isset($data['type_name']) ? $data['type_name'] : null;
        $this->container['manufacturer_id'] = isset($data['manufacturer_id']) ? $data['manufacturer_id'] : null;
        $this->container['manufacturer_name'] = isset($data['manufacturer_name']) ? $data['manufacturer_name'] : null;
        $this->container['manufacturer_slug'] = isset($data['manufacturer_slug']) ? $data['manufacturer_slug'] : null;
        $this->container['brand_logo'] = isset($data['brand_logo']) ? $data['brand_logo'] : null;
        $this->container['model_id'] = isset($data['model_id']) ? $data['model_id'] : null;
        $this->container['model_common_name'] = isset($data['model_common_name']) ? $data['model_common_name'] : null;
        $this->container['model_slug'] = isset($data['model_slug']) ? $data['model_slug'] : null;
        $this->container['model_photo'] = isset($data['model_photo']) ? $data['model_photo'] : null;
        $this->container['model_photo_unbranded'] = isset($data['model_photo_unbranded']) ? $data['model_photo_unbranded'] : null;
        $this->container['generation_id'] = isset($data['generation_id']) ? $data['generation_id'] : null;
        $this->container['generation_name'] = isset($data['generation_name']) ? $data['generation_name'] : null;
        $this->container['generation_slug'] = isset($data['generation_slug']) ? $data['generation_slug'] : null;
        $this->container['generation_photo'] = isset($data['generation_photo']) ? $data['generation_photo'] : null;
        $this->container['generation_photo_unbranded'] = isset($data['generation_photo_unbranded']) ? $data['generation_photo_unbranded'] : null;
        $this->container['engine_id'] = isset($data['engine_id']) ? $data['engine_id'] : null;
        $this->container['engine_name'] = isset($data['engine_name']) ? $data['engine_name'] : null;
        $this->container['engine_slug'] = isset($data['engine_slug']) ? $data['engine_slug'] : null;
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
     * Gets type_id
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->container['type_id'];
    }

    /**
     * Sets type_id
     *
     * @param int $type_id Vehicle type ID.
     *
     * @return $this
     */
    public function setTypeId($type_id)
    {
        $this->container['type_id'] = $type_id;

        return $this;
    }

    /**
     * Gets type_name
     *
     * @return string
     */
    public function getTypeName()
    {
        return $this->container['type_name'];
    }

    /**
     * Sets type_name
     *
     * @param string $type_name Vehicle type.
     *
     * @return $this
     */
    public function setTypeName($type_name)
    {
        $this->container['type_name'] = $type_name;

        return $this;
    }

    /**
     * Gets manufacturer_id
     *
     * @return int
     */
    public function getManufacturerId()
    {
        return $this->container['manufacturer_id'];
    }

    /**
     * Sets manufacturer_id
     *
     * @param int $manufacturer_id Manufacturer ID.
     *
     * @return $this
     */
    public function setManufacturerId($manufacturer_id)
    {
        $this->container['manufacturer_id'] = $manufacturer_id;

        return $this;
    }

    /**
     * Gets manufacturer_name
     *
     * @return string
     */
    public function getManufacturerName()
    {
        return $this->container['manufacturer_name'];
    }

    /**
     * Sets manufacturer_name
     *
     * @param string $manufacturer_name Manufacturer name.
     *
     * @return $this
     */
    public function setManufacturerName($manufacturer_name)
    {
        $this->container['manufacturer_name'] = $manufacturer_name;

        return $this;
    }

    /**
     * Gets manufacturer_slug
     *
     * @return string
     */
    public function getManufacturerSlug()
    {
        return $this->container['manufacturer_slug'];
    }

    /**
     * Sets manufacturer_slug
     *
     * @param string $manufacturer_slug URL-friendly name (slug) of the manufacturer.
     *
     * @return $this
     */
    public function setManufacturerSlug($manufacturer_slug)
    {
        $this->container['manufacturer_slug'] = $manufacturer_slug;

        return $this;
    }

    /**
     * Gets brand_logo
     *
     * @return string
     */
    public function getBrandLogo()
    {
        return $this->container['brand_logo'];
    }

    /**
     * Sets brand_logo
     *
     * @param string $brand_logo Photo of the brand.
     *
     * @return $this
     */
    public function setBrandLogo($brand_logo)
    {
        $this->container['brand_logo'] = $brand_logo;

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
     * @param int $model_id Model ID.
     *
     * @return $this
     */
    public function setModelId($model_id)
    {
        $this->container['model_id'] = $model_id;

        return $this;
    }

    /**
     * Gets model_common_name
     *
     * @return string
     */
    public function getModelCommonName()
    {
        return $this->container['model_common_name'];
    }

    /**
     * Sets model_common_name
     *
     * @param string $model_common_name Model name.
     *
     * @return $this
     */
    public function setModelCommonName($model_common_name)
    {
        $this->container['model_common_name'] = $model_common_name;

        return $this;
    }

    /**
     * Gets model_slug
     *
     * @return string
     */
    public function getModelSlug()
    {
        return $this->container['model_slug'];
    }

    /**
     * Sets model_slug
     *
     * @param string $model_slug URL-friendly name (slug) of the model.
     *
     * @return $this
     */
    public function setModelSlug($model_slug)
    {
        $this->container['model_slug'] = $model_slug;

        return $this;
    }

    /**
     * Gets model_photo
     *
     * @return string
     */
    public function getModelPhoto()
    {
        return $this->container['model_photo'];
    }

    /**
     * Sets model_photo
     *
     * @param string $model_photo Photo of the model.
     *
     * @return $this
     */
    public function setModelPhoto($model_photo)
    {
        $this->container['model_photo'] = $model_photo;

        return $this;
    }

    /**
     * Gets model_photo_unbranded
     *
     * @return string
     */
    public function getModelPhotoUnbranded()
    {
        return $this->container['model_photo_unbranded'];
    }

    /**
     * Sets model_photo_unbranded
     *
     * @param string $model_photo_unbranded Photo of the model (non branded version).
     *
     * @return $this
     */
    public function setModelPhotoUnbranded($model_photo_unbranded)
    {
        $this->container['model_photo_unbranded'] = $model_photo_unbranded;

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
     * @param int $generation_id Generation ID.
     *
     * @return $this
     */
    public function setGenerationId($generation_id)
    {
        $this->container['generation_id'] = $generation_id;

        return $this;
    }

    /**
     * Gets generation_name
     *
     * @return string
     */
    public function getGenerationName()
    {
        return $this->container['generation_name'];
    }

    /**
     * Sets generation_name
     *
     * @param string $generation_name Generation name.
     *
     * @return $this
     */
    public function setGenerationName($generation_name)
    {
        $this->container['generation_name'] = $generation_name;

        return $this;
    }

    /**
     * Gets generation_slug
     *
     * @return string
     */
    public function getGenerationSlug()
    {
        return $this->container['generation_slug'];
    }

    /**
     * Sets generation_slug
     *
     * @param string $generation_slug URL-friendly name (slug) of the generation.
     *
     * @return $this
     */
    public function setGenerationSlug($generation_slug)
    {
        $this->container['generation_slug'] = $generation_slug;

        return $this;
    }

    /**
     * Gets generation_photo
     *
     * @return string
     */
    public function getGenerationPhoto()
    {
        return $this->container['generation_photo'];
    }

    /**
     * Sets generation_photo
     *
     * @param string $generation_photo Photo of the generation.
     *
     * @return $this
     */
    public function setGenerationPhoto($generation_photo)
    {
        $this->container['generation_photo'] = $generation_photo;

        return $this;
    }

    /**
     * Gets generation_photo_unbranded
     *
     * @return string
     */
    public function getGenerationPhotoUnbranded()
    {
        return $this->container['generation_photo_unbranded'];
    }

    /**
     * Sets generation_photo_unbranded
     *
     * @param string $generation_photo_unbranded Photo of the generation (non branded version).
     *
     * @return $this
     */
    public function setGenerationPhotoUnbranded($generation_photo_unbranded)
    {
        $this->container['generation_photo_unbranded'] = $generation_photo_unbranded;

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
     * @param int $engine_id Engine ID.
     *
     * @return $this
     */
    public function setEngineId($engine_id)
    {
        $this->container['engine_id'] = $engine_id;

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
     * @param string $engine_name Engine name.
     *
     * @return $this
     */
    public function setEngineName($engine_name)
    {
        $this->container['engine_name'] = $engine_name;

        return $this;
    }

    /**
     * Gets engine_slug
     *
     * @return string
     */
    public function getEngineSlug()
    {
        return $this->container['engine_slug'];
    }

    /**
     * Sets engine_slug
     *
     * @param string $engine_slug URL-friendly name (slug) of the engine.
     *
     * @return $this
     */
    public function setEngineSlug($engine_slug)
    {
        $this->container['engine_slug'] = $engine_slug;

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
