<?php
/**
 * VehicleDatabaseApiTest
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
 * Please update the test case below to test the endpoint.
 */

namespace Tuningfiles;

use Tuningfiles\Configuration;
use Tuningfiles\ApiException;
use Tuningfiles\ObjectSerializer;

/**
 * VehicleDatabaseApiTest Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class VehicleDatabaseApiTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Setup before running any test cases
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
     * Test case for vdbEnginesSearch
     *
     * Search engine.
     *
     */
    public function testVdbEnginesSearch()
    {
    }

    /**
     * Test case for vdbListEngines
     *
     * List engines.
     *
     */
    public function testVdbListEngines()
    {
    }

    /**
     * Test case for vdbListManufacturers
     *
     * List manufacturers.
     *
     */
    public function testVdbListManufacturers()
    {
    }

    /**
     * Test case for vdbListModels
     *
     * List models.
     *
     */
    public function testVdbListModels()
    {
    }

    /**
     * Test case for vdbListTypes
     *
     * List vehicle types.
     *
     */
    public function testVdbListTypes()
    {
    }

    /**
     * Test case for vdbSearch
     *
     * Search.
     *
     */
    public function testVdbSearch()
    {
    }

    /**
     * Test case for vdbViewEngine
     *
     * View engine.
     *
     */
    public function testVdbViewEngine()
    {
    }

    /**
     * Test case for vdbViewManufacturer
     *
     * View manufacturer.
     *
     */
    public function testVdbViewManufacturer()
    {
    }

    /**
     * Test case for vdbViewModel
     *
     * View model.
     *
     */
    public function testVdbViewModel()
    {
    }

    /**
     * Test case for vdbViewPerformance
     *
     * View vehicle performance.
     *
     */
    public function testVdbViewPerformance()
    {
    }

    /**
     * Test case for vdbViewType
     *
     * View vehicle type.
     *
     */
    public function testVdbViewType()
    {
    }
}
