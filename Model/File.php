<?php
/**
 * File
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
 * Welcome to the TuningFiles API documentation.  # Language  All API methods accept language parameter, which can be set via `X-LANG` custom header. Content of the header should be the code of the language you are requesting.  Available languages:    * English (`en`)   * Chinese traditional (`zh-hant`)   * Chinese simplified (`zh-hans`)   * Russian (`ru`)   * Norwegian Bokmål (`nb`)   * Latvian (`lv`)   * Lithuanian (`lt`)   * Croatian (`hr`)   * Spanish (`es`)  Set language to English: ``` curl -X GET \"https://api.tuningfiles.com/method\" -H \"x-lang: en\" ```  # Errors If there is an error, API will return appropriate error code and message like so:  ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  HTTP status code will be the same as the error code. In the case above, returned http status code will be 404.   Failed API authentication: ```json {   \"error\": {     \"code\": 403,     \"message\": \"Invalid API key\"   } } ```  API Key doesn't have enough permissions to access requested resource (some API methods require a paid subscription): ```json {   \"error\": {     \"code\": 401,     \"message\": \"This API key does not have enough permissions\"   } } ```  Not found: ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  Bad request: ```json {   \"error\": {     \"code\": 400,     \"message\": \"Bad request / Wrong parameters\"   } } ```  Server error: ```json {   \"error\": {     \"code\": 500,     \"message\": \"Internal server error\"   } } ``` # Rate limits Currently, no rate-limits are enabled. However this may change in the future.  Please, do not abuse this service. Every request is logged and analysed automatically by machine learning. If abuse is detected, you may be automatically blocked or rate-limited. # Webhooks You can use webhook to receive notifications about particular events. When you enable webhook in your [API settings page](https://app.tuningfiles.com/api), you can let your app execute code immediately after specific events occur, instead of having to make API calls periodically. For example, you can rely on webhooks to trigger an action in your app when project is created, it's status is updated or when file is purchased.  Webhook notification is using `POST` as http request method and contains a JSON payload, and HTTP headers that provide context.      For example, when project is created, webhook will contains the following headers:    **X-TF-EVENT**: project_create     **X-TF-HMAC-SHA256**: aV95gkmXR75CFvdeIn9DwOmpTCBndDqo/70uJWiYtaY=    and JSON body:   ```   {     \"id\": 146356,     \"uuid\": \"07b2402b-00cd-4d61-9bc4-13b85a1849fb\",     \"name\": \"Audi A3 8P 2.0 TDI 136hp 320Nm 2017\",      \"status\": \"Waiting\",     \"status_code\": 0,     ...     \"files\": [       {         \"id\": 246810,         \"uuid\": \"3dbb36a1-d50f-4327-8100-83a8c2f1b869\",         \"project\": 146356,         \"type\": \"Original\",         ...       }     ]   }   ```    ## Headers Webhook notifications are using following custom http headers:      `X-TF-EVENT`: Event which triggered this webhook     `X-TF-HMAC-SHA256`: Webhook verification hash  ## Events Each webhook will contain `X-TF-EVENT` header. This header represents the event which triggered this webhook.  Event types:   - `project_create` - Project is created. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    - `project_update` - Project is updated. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)   - `file_purchase` - File is purchased. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    ## Verification To allow a client to verify a webhook message has in fact come from TuningFiles, an `X-TF-HMAC-SHA256` header is included in each webhook POST message. The contents of this header is the Base64 encoded output of the HMAC SHA256 encoding of the JSON body of the message, using your API Secret as the encryption key.   Following psuedo PHP example shows how we generate the `X-TF-HMAC-SHA256` value: ```php   base64_encode(hash_hmac('sha256', $webhook_json, $your_api_secret, true)); ```  To verify the authenticity of the webhook message, you should calculate this value yourself and verify it equals the value contained in the header. # SDKs TuningFiles offers a PHP SDK to help interact with the API.  However, no SDK is required to use the API. ## PHP SDK [PHP SDK](https://github.com/sedox/tuningfiles-php-sdk) is hosted on [Github](https://github.com/sedox/tuningfiles-php-sdk). For all PHP SDK examples provided in these docs you will need to configure the `$apiInstance`. You may do it like this:   - For Vehicle Database API:      ```php       $apiInstance = new Tuningfiles\\Api\\VehicleDatabaseApi(         new GuzzleHttp\\Client(),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```    - For Tuning API:          ```php       $apiInstance = new Tuningfiles\\Api\\TuningApi(         new GuzzleHttp\\Client(),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```
 *
 * OpenAPI spec version: 1.0.1
 * Contact: support@tuningfiles.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.8
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
 * File Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class File implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'file';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
'uuid' => 'string',
'project' => 'int',
'type' => 'string',
'ecu_number' => 'int',
'ecu_label' => 'string',
'remap_id' => 'int',
'remap_name' => 'string',
'remap_addons' => 'string[]',
'size' => 'int',
'md5sum' => 'string',
'is_checksum_updated' => 'bool',
'user_id' => 'int',
'uploaded_by' => 'int',
'is_original' => 'bool',
'is_stack' => 'bool',
'stack' => 'int',
'is_cmdencrypted' => 'bool',
'is_cmddecrypted' => 'bool',
'is_id' => 'bool',
'comment' => 'string',
'pricing' => '\Tuningfiles\Model\FilePricing',
'payment' => '\Tuningfiles\Model\FilePayment',
'added' => '\DateTime',
'updated' => '\DateTime'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => null,
'uuid' => null,
'project' => null,
'type' => null,
'ecu_number' => null,
'ecu_label' => null,
'remap_id' => null,
'remap_name' => null,
'remap_addons' => null,
'size' => null,
'md5sum' => null,
'is_checksum_updated' => null,
'user_id' => null,
'uploaded_by' => null,
'is_original' => null,
'is_stack' => null,
'stack' => null,
'is_cmdencrypted' => null,
'is_cmddecrypted' => null,
'is_id' => null,
'comment' => null,
'pricing' => null,
'payment' => null,
'added' => 'date-time',
'updated' => 'date-time'    ];

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
'project' => 'project',
'type' => 'type',
'ecu_number' => 'ecu_number',
'ecu_label' => 'ecu_label',
'remap_id' => 'remap_id',
'remap_name' => 'remap_name',
'remap_addons' => 'remap_addons',
'size' => 'size',
'md5sum' => 'md5sum',
'is_checksum_updated' => 'is_checksum_updated',
'user_id' => 'user_id',
'uploaded_by' => 'uploaded_by',
'is_original' => 'is_original',
'is_stack' => 'is_stack',
'stack' => 'stack',
'is_cmdencrypted' => 'is_cmdencrypted',
'is_cmddecrypted' => 'is_cmddecrypted',
'is_id' => 'is_id',
'comment' => 'comment',
'pricing' => 'pricing',
'payment' => 'payment',
'added' => 'added',
'updated' => 'updated'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
'uuid' => 'setUuid',
'project' => 'setProject',
'type' => 'setType',
'ecu_number' => 'setEcuNumber',
'ecu_label' => 'setEcuLabel',
'remap_id' => 'setRemapId',
'remap_name' => 'setRemapName',
'remap_addons' => 'setRemapAddons',
'size' => 'setSize',
'md5sum' => 'setMd5sum',
'is_checksum_updated' => 'setIsChecksumUpdated',
'user_id' => 'setUserId',
'uploaded_by' => 'setUploadedBy',
'is_original' => 'setIsOriginal',
'is_stack' => 'setIsStack',
'stack' => 'setStack',
'is_cmdencrypted' => 'setIsCmdencrypted',
'is_cmddecrypted' => 'setIsCmddecrypted',
'is_id' => 'setIsId',
'comment' => 'setComment',
'pricing' => 'setPricing',
'payment' => 'setPayment',
'added' => 'setAdded',
'updated' => 'setUpdated'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
'uuid' => 'getUuid',
'project' => 'getProject',
'type' => 'getType',
'ecu_number' => 'getEcuNumber',
'ecu_label' => 'getEcuLabel',
'remap_id' => 'getRemapId',
'remap_name' => 'getRemapName',
'remap_addons' => 'getRemapAddons',
'size' => 'getSize',
'md5sum' => 'getMd5sum',
'is_checksum_updated' => 'getIsChecksumUpdated',
'user_id' => 'getUserId',
'uploaded_by' => 'getUploadedBy',
'is_original' => 'getIsOriginal',
'is_stack' => 'getIsStack',
'stack' => 'getStack',
'is_cmdencrypted' => 'getIsCmdencrypted',
'is_cmddecrypted' => 'getIsCmddecrypted',
'is_id' => 'getIsId',
'comment' => 'getComment',
'pricing' => 'getPricing',
'payment' => 'getPayment',
'added' => 'getAdded',
'updated' => 'getUpdated'    ];

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
        $this->container['uuid'] = isset($data['uuid']) ? $data['uuid'] : null;
        $this->container['project'] = isset($data['project']) ? $data['project'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['ecu_number'] = isset($data['ecu_number']) ? $data['ecu_number'] : null;
        $this->container['ecu_label'] = isset($data['ecu_label']) ? $data['ecu_label'] : null;
        $this->container['remap_id'] = isset($data['remap_id']) ? $data['remap_id'] : null;
        $this->container['remap_name'] = isset($data['remap_name']) ? $data['remap_name'] : null;
        $this->container['remap_addons'] = isset($data['remap_addons']) ? $data['remap_addons'] : null;
        $this->container['size'] = isset($data['size']) ? $data['size'] : null;
        $this->container['md5sum'] = isset($data['md5sum']) ? $data['md5sum'] : null;
        $this->container['is_checksum_updated'] = isset($data['is_checksum_updated']) ? $data['is_checksum_updated'] : null;
        $this->container['user_id'] = isset($data['user_id']) ? $data['user_id'] : null;
        $this->container['uploaded_by'] = isset($data['uploaded_by']) ? $data['uploaded_by'] : null;
        $this->container['is_original'] = isset($data['is_original']) ? $data['is_original'] : null;
        $this->container['is_stack'] = isset($data['is_stack']) ? $data['is_stack'] : null;
        $this->container['stack'] = isset($data['stack']) ? $data['stack'] : null;
        $this->container['is_cmdencrypted'] = isset($data['is_cmdencrypted']) ? $data['is_cmdencrypted'] : null;
        $this->container['is_cmddecrypted'] = isset($data['is_cmddecrypted']) ? $data['is_cmddecrypted'] : null;
        $this->container['is_id'] = isset($data['is_id']) ? $data['is_id'] : null;
        $this->container['comment'] = isset($data['comment']) ? $data['comment'] : null;
        $this->container['pricing'] = isset($data['pricing']) ? $data['pricing'] : null;
        $this->container['payment'] = isset($data['payment']) ? $data['payment'] : null;
        $this->container['added'] = isset($data['added']) ? $data['added'] : null;
        $this->container['updated'] = isset($data['updated']) ? $data['updated'] : null;
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
     * @param int $id File ID.
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
     * @param string $uuid File v4 UUID.
     *
     * @return $this
     */
    public function setUuid($uuid)
    {
        $this->container['uuid'] = $uuid;

        return $this;
    }

    /**
     * Gets project
     *
     * @return int
     */
    public function getProject()
    {
        return $this->container['project'];
    }

    /**
     * Sets project
     *
     * @param int $project Project ID (Sedox ID).
     *
     * @return $this
     */
    public function setProject($project)
    {
        $this->container['project'] = $project;

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
     * @param string $type Type of the file.  For original files it can be: `ID File` or `Original`. For tuned files it can be `Stage 1, 2, 3, etc`. For files with special requests only (like `DPF Off`, `Vmax Off`, etc) it can be `Decativation Only`.
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets ecu_number
     *
     * @return int
     */
    public function getEcuNumber()
    {
        return $this->container['ecu_number'];
    }

    /**
     * Sets ecu_number
     *
     * @param int $ecu_number ECU number. Some cars have more than one ECU.
     *
     * @return $this
     */
    public function setEcuNumber($ecu_number)
    {
        $this->container['ecu_number'] = $ecu_number;

        return $this;
    }

    /**
     * Gets ecu_label
     *
     * @return string
     */
    public function getEcuLabel()
    {
        return $this->container['ecu_label'];
    }

    /**
     * Sets ecu_label
     *
     * @param string $ecu_label ECU label.
     *
     * @return $this
     */
    public function setEcuLabel($ecu_label)
    {
        $this->container['ecu_label'] = $ecu_label;

        return $this;
    }

    /**
     * Gets remap_id
     *
     * @return int
     */
    public function getRemapId()
    {
        return $this->container['remap_id'];
    }

    /**
     * Sets remap_id
     *
     * @param int $remap_id ID of the remap.
     *
     * @return $this
     */
    public function setRemapId($remap_id)
    {
        $this->container['remap_id'] = $remap_id;

        return $this;
    }

    /**
     * Gets remap_name
     *
     * @return string
     */
    public function getRemapName()
    {
        return $this->container['remap_name'];
    }

    /**
     * Sets remap_name
     *
     * @param string $remap_name Name of the remap.
     *
     * @return $this
     */
    public function setRemapName($remap_name)
    {
        $this->container['remap_name'] = $remap_name;

        return $this;
    }

    /**
     * Gets remap_addons
     *
     * @return string[]
     */
    public function getRemapAddons()
    {
        return $this->container['remap_addons'];
    }

    /**
     * Sets remap_addons
     *
     * @param string[] $remap_addons Array with all special requests (addons) added into the file.
     *
     * @return $this
     */
    public function setRemapAddons($remap_addons)
    {
        $this->container['remap_addons'] = $remap_addons;

        return $this;
    }

    /**
     * Gets size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->container['size'];
    }

    /**
     * Sets size
     *
     * @param int $size Actual file size in bytes.
     *
     * @return $this
     */
    public function setSize($size)
    {
        $this->container['size'] = $size;

        return $this;
    }

    /**
     * Gets md5sum
     *
     * @return string
     */
    public function getMd5sum()
    {
        return $this->container['md5sum'];
    }

    /**
     * Sets md5sum
     *
     * @param string $md5sum MD5 sum of the file.
     *
     * @return $this
     */
    public function setMd5sum($md5sum)
    {
        $this->container['md5sum'] = $md5sum;

        return $this;
    }

    /**
     * Gets is_checksum_updated
     *
     * @return bool
     */
    public function getIsChecksumUpdated()
    {
        return $this->container['is_checksum_updated'];
    }

    /**
     * Sets is_checksum_updated
     *
     * @param bool $is_checksum_updated Shows either checksum was updated (corrected) or not
     *
     * @return $this
     */
    public function setIsChecksumUpdated($is_checksum_updated)
    {
        $this->container['is_checksum_updated'] = $is_checksum_updated;

        return $this;
    }

    /**
     * Gets user_id
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->container['user_id'];
    }

    /**
     * Sets user_id
     *
     * @param int $user_id Owner of the file.
     *
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->container['user_id'] = $user_id;

        return $this;
    }

    /**
     * Gets uploaded_by
     *
     * @return int
     */
    public function getUploadedBy()
    {
        return $this->container['uploaded_by'];
    }

    /**
     * Sets uploaded_by
     *
     * @param int $uploaded_by Uploader of the file (may be a sub-account)
     *
     * @return $this
     */
    public function setUploadedBy($uploaded_by)
    {
        $this->container['uploaded_by'] = $uploaded_by;

        return $this;
    }

    /**
     * Gets is_original
     *
     * @return bool
     */
    public function getIsOriginal()
    {
        return $this->container['is_original'];
    }

    /**
     * Sets is_original
     *
     * @param bool $is_original Shows either this is an original file or not.
     *
     * @return $this
     */
    public function setIsOriginal($is_original)
    {
        $this->container['is_original'] = $is_original;

        return $this;
    }

    /**
     * Gets is_stack
     *
     * @return bool
     */
    public function getIsStack()
    {
        return $this->container['is_stack'];
    }

    /**
     * Sets is_stack
     *
     * @param bool $is_stack Shows if file is stack (archive). Archive contains more than one file. If car is with 2 ECUs you will receive stacked file (archive) with 2 modified files (one for each ECU).
     *
     * @return $this
     */
    public function setIsStack($is_stack)
    {
        $this->container['is_stack'] = $is_stack;

        return $this;
    }

    /**
     * Gets stack
     *
     * @return int
     */
    public function getStack()
    {
        return $this->container['stack'];
    }

    /**
     * Sets stack
     *
     * @param int $stack Stack ID (if this file is part of stack/archive).
     *
     * @return $this
     */
    public function setStack($stack)
    {
        $this->container['stack'] = $stack;

        return $this;
    }

    /**
     * Gets is_cmdencrypted
     *
     * @return bool
     */
    public function getIsCmdencrypted()
    {
        return $this->container['is_cmdencrypted'];
    }

    /**
     * Sets is_cmdencrypted
     *
     * @param bool $is_cmdencrypted Shows either this is a CMD Encrypted file.
     *
     * @return $this
     */
    public function setIsCmdencrypted($is_cmdencrypted)
    {
        $this->container['is_cmdencrypted'] = $is_cmdencrypted;

        return $this;
    }

    /**
     * Gets is_cmddecrypted
     *
     * @return bool
     */
    public function getIsCmddecrypted()
    {
        return $this->container['is_cmddecrypted'];
    }

    /**
     * Sets is_cmddecrypted
     *
     * @param bool $is_cmddecrypted Shows either this is a CMD Decrypted file.
     *
     * @return $this
     */
    public function setIsCmddecrypted($is_cmddecrypted)
    {
        $this->container['is_cmddecrypted'] = $is_cmddecrypted;

        return $this;
    }

    /**
     * Gets is_id
     *
     * @return bool
     */
    public function getIsId()
    {
        return $this->container['is_id'];
    }

    /**
     * Sets is_id
     *
     * @param bool $is_id Shows either this is an ID file.
     *
     * @return $this
     */
    public function setIsId($is_id)
    {
        $this->container['is_id'] = $is_id;

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
     * @param string $comment Comment left by developer.
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->container['comment'] = $comment;

        return $this;
    }

    /**
     * Gets pricing
     *
     * @return \Tuningfiles\Model\FilePricing
     */
    public function getPricing()
    {
        return $this->container['pricing'];
    }

    /**
     * Sets pricing
     *
     * @param \Tuningfiles\Model\FilePricing $pricing pricing
     *
     * @return $this
     */
    public function setPricing($pricing)
    {
        $this->container['pricing'] = $pricing;

        return $this;
    }

    /**
     * Gets payment
     *
     * @return \Tuningfiles\Model\FilePayment
     */
    public function getPayment()
    {
        return $this->container['payment'];
    }

    /**
     * Sets payment
     *
     * @param \Tuningfiles\Model\FilePayment $payment payment
     *
     * @return $this
     */
    public function setPayment($payment)
    {
        $this->container['payment'] = $payment;

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
     * @param \DateTime $added Date-time file was uploaded.
     *
     * @return $this
     */
    public function setAdded($added)
    {
        $this->container['added'] = $added;

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
     * @param \DateTime $updated Date-time file was updated.
     *
     * @return $this
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

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
