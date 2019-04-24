<?php
/**
 * ProjectTest
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
 * Welcome to the TuningFiles API documentation.  # Language  All API methods accept language parameter, which can be set via `X-LANG` custom header. Content of the header should be the code of the language you are requesting.  Available languages:    * English (`en`)   * Chinese traditional (`zh-hant`)   * Chinese simplified (`zh-hans`)   * Russian (`ru`)   * Norwegian Bokmål (`nb`)   * Latvian (`lv`)   * Lithuanian (`lt`)   * Croatian (`hr`)   * Spanish (`es`)  Set language to English: ``` curl -X GET \"https://api.tuningfiles.com/method\" -H \"x-lang: en\" ```  # Errors If there is an error, API will return appropriate error code and message like so:  ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  HTTP status code will be the same as the error code. In the case above, returned http status code will be 404.   Failed API authentication: ```json {   \"error\": {     \"code\": 403,     \"message\": \"Invalid API key\"   } } ```  API Key doesn't have enough permissions to access requested resource (some API methods require a paid subscription): ```json {   \"error\": {     \"code\": 401,     \"message\": \"This API key does not have enough permissions\"   } } ```  Not found: ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  Bad request: ```json {   \"error\": {     \"code\": 400,     \"message\": \"Bad request / Wrong parameters\"   } } ```  Server error: ```json {   \"error\": {     \"code\": 500,     \"message\": \"Internal server error\"   } } ``` # Rate limits Currently, no rate-limits are enabled. However this may change in the future.  Please, do not abuse this service. Every request is logged and analysed automatically by machine learning. If abuse is detected, you may be automatically blocked or rate-limited.  # SDKs TuningFiles offers a PHP SDK to help interact with the API.  However, no SDK is required to use the API. ## PHP SDK [PHP SDK](https://github.com/sedox/tuningfiles-php-sdk) is hosted on [Github](https://github.com/sedox/tuningfiles-php-sdk). For all PHP SDK examples provided in these docs you will need to configure the `$client`. You may do it like this: ```php   $client = new Tuningfiles\\Api\\TuningApi(     new GuzzleHttp\\Client(),     Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')   ); ```
 *
 * OpenAPI spec version: 1.0
 * Contact: support@tuningfiles.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.7
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Please update the test case below to test the model.
 */

namespace Tuningfiles;

/**
 * ProjectTest Class Doc Comment
 *
 * @category    Class
 * @description Project
 * @package     Tuningfiles
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ProjectTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Setup before running any test case
     */
    public static function setUpBeforeClass()
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown()
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass()
    {
    }

    /**
     * Test "Project"
     */
    public function testProject()
    {
    }

    /**
     * Test attribute "id"
     */
    public function testPropertyId()
    {
    }

    /**
     * Test attribute "uuid"
     */
    public function testPropertyUuid()
    {
    }

    /**
     * Test attribute "name"
     */
    public function testPropertyName()
    {
    }

    /**
     * Test attribute "status"
     */
    public function testPropertyStatus()
    {
    }

    /**
     * Test attribute "status_code"
     */
    public function testPropertyStatusCode()
    {
    }

    /**
     * Test attribute "vehicle_data"
     */
    public function testPropertyVehicleData()
    {
    }

    /**
     * Test attribute "read_tool"
     */
    public function testPropertyReadTool()
    {
    }

    /**
     * Test attribute "read_tool_id"
     */
    public function testPropertyReadToolId()
    {
    }

    /**
     * Test attribute "dtc_codes"
     */
    public function testPropertyDtcCodes()
    {
    }

    /**
     * Test attribute "license_plate"
     */
    public function testPropertyLicensePlate()
    {
    }

    /**
     * Test attribute "notification_channels"
     */
    public function testPropertyNotificationChannels()
    {
    }

    /**
     * Test attribute "comment"
     */
    public function testPropertyComment()
    {
    }

    /**
     * Test attribute "remap_data"
     */
    public function testPropertyRemapData()
    {
    }

    /**
     * Test attribute "started_on"
     */
    public function testPropertyStartedOn()
    {
    }

    /**
     * Test attribute "finished_on"
     */
    public function testPropertyFinishedOn()
    {
    }

    /**
     * Test attribute "added"
     */
    public function testPropertyAdded()
    {
    }

    /**
     * Test attribute "uploaded"
     */
    public function testPropertyUploaded()
    {
    }

    /**
     * Test attribute "updated"
     */
    public function testPropertyUpdated()
    {
    }

    /**
     * Test attribute "attachments"
     */
    public function testPropertyAttachments()
    {
    }

    /**
     * Test attribute "files"
     */
    public function testPropertyFiles()
    {
    }
}
