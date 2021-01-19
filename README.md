# 
Welcome to the TuningFiles API documentation. 

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 1.1.2
- Package version: 1.1.0
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen
For more information, please visit [https:/tuningfiles.com](https:/tuningfiles.com)

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/sedox/tuningfiles-php-sdk.git"
    }
  ],
  "require": {
    "sedox/tuningfiles-php-sdk": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to//vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "file_example"; // string | 

try {
    $result = $apiInstance->attachmentUpload($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->attachmentUpload: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->creditsAmount();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->creditsAmount: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_id = 789; // int | File ID
$project_id = 789; // int | Project ID

try {
    $result = $apiInstance->fileDownload($file_id, $project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->fileDownload: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file_id = 789; // int | File ID
$project_id = 789; // int | Project ID

try {
    $result = $apiInstance->filePurchase($file_id, $project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->filePurchase: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "file_example"; // string | 

try {
    $result = $apiInstance->fileUpload($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->fileUpload: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->notificationChannelsList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->notificationChannelsList: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 56; // int | Project ID

try {
    $result = $apiInstance->projectView($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->projectView: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ecu1_file = 56; // int | 
$ecu1_label = "ecu1_label_example"; // string | 
$ecu2_file = 56; // int | 
$ecu2_label = "ecu2_label_example"; // string | 
$vehicle_type_id = 56; // int | 
$vehicle_manufacturer_id = 56; // int | 
$vehicle_model_id = 56; // int | 
$vehicle_generation_id = 56; // int | 
$vehicle_engine = "vehicle_engine_example"; // string | 
$vehicle_engine_id = 56; // int | 
$vehicle_year = 56; // int | 
$vehicle_gearbox = 56; // int | 
$vehicle_ecu = "vehicle_ecu_example"; // string | 
$hardware_number = "hardware_number_example"; // string | 
$software_number = "software_number_example"; // string | 
$read_tool = "read_tool_example"; // string | 
$remap = 56; // int | 
$addons = array(56); // int[] | 
$dtc_codes = array("dtc_codes_example"); // string[] | 
$notification_channel = array(56); // int[] | 
$file_attachment = 56; // int | 
$ref = "ref_example"; // string | 
$customer_comment = "customer_comment_example"; // string | 

try {
    $result = $apiInstance->projectsCreate($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_generation_id, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->projectsCreate: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$per_page = 20; // int | Projects per page
$page = 789; // int | Page number

try {
    $result = $apiInstance->projectsList($per_page, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->projectsList: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->readToolsList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->readToolsList: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vehicle_type_id = 789; // int | Vehicle type

try {
    $result = $apiInstance->remapsList($vehicle_type_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->remapsList: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->tuningSubscription();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->tuningSubscription: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$generation_id = 789; // int | Generation ID

try {
    $result = $apiInstance->vehiclesEnginesList($generation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesEnginesList: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$model_id = 789; // int | Model ID

try {
    $result = $apiInstance->vehiclesGenerationsList($model_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesGenerationsList: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vehicle_type_id = 789; // int | Vehicle type ID

try {
    $result = $apiInstance->vehiclesManufacturersList($vehicle_type_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesManufacturersList: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$manufacturer_id = 789; // int | Manufacturer ID

try {
    $result = $apiInstance->vehiclesModelsList($manufacturer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesModelsList: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->vehiclesTransmissionsList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesTransmissionsList: ', $e->getMessage(), PHP_EOL;
}

// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\TuningApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->vehiclesTypesList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesTypesList: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.tuningfiles.com/*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*TuningApi* | [**attachmentUpload**](docs/Api/TuningApi.md#attachmentupload) | **POST** /attachments/upload | Upload attachment
*TuningApi* | [**creditsAmount**](docs/Api/TuningApi.md#creditsamount) | **GET** /credits/amount | Get available credits amount
*TuningApi* | [**fileDownload**](docs/Api/TuningApi.md#filedownload) | **GET** /files/download/{file_id}/{project_id} | Download file
*TuningApi* | [**filePurchase**](docs/Api/TuningApi.md#filepurchase) | **GET** /files/purchase/{file_id}/{project_id} | Purchase file
*TuningApi* | [**fileUpload**](docs/Api/TuningApi.md#fileupload) | **POST** /files/upload | Upload original file
*TuningApi* | [**notificationChannelsList**](docs/Api/TuningApi.md#notificationchannelslist) | **GET** /notification-channels | List notification channels
*TuningApi* | [**projectView**](docs/Api/TuningApi.md#projectview) | **GET** /projects/view/{project_id} | View project
*TuningApi* | [**projectsCreate**](docs/Api/TuningApi.md#projectscreate) | **POST** /projects | Create project
*TuningApi* | [**projectsList**](docs/Api/TuningApi.md#projectslist) | **GET** /projects | List projects
*TuningApi* | [**readToolsList**](docs/Api/TuningApi.md#readtoolslist) | **GET** /vehicles/read-tools | List available read tools
*TuningApi* | [**remapsList**](docs/Api/TuningApi.md#remapslist) | **GET** /vehicles/remaps/{vehicle_type_id} | List available remaps
*TuningApi* | [**tuningSubscription**](docs/Api/TuningApi.md#tuningsubscription) | **GET** /subscription | Check for active subscription
*TuningApi* | [**vehiclesEnginesList**](docs/Api/TuningApi.md#vehiclesengineslist) | **GET** /vehicles/engines/{generation_id} | List vehicle engines
*TuningApi* | [**vehiclesGenerationsList**](docs/Api/TuningApi.md#vehiclesgenerationslist) | **GET** /vehicles/generations/{model_id} | List vehicle model generations
*TuningApi* | [**vehiclesManufacturersList**](docs/Api/TuningApi.md#vehiclesmanufacturerslist) | **GET** /vehicles/manufacturers/{vehicle_type_id} | List vehicle manufacturers
*TuningApi* | [**vehiclesModelsList**](docs/Api/TuningApi.md#vehiclesmodelslist) | **GET** /vehicles/models/{manufacturer_id} | List vehicle models
*TuningApi* | [**vehiclesTransmissionsList**](docs/Api/TuningApi.md#vehiclestransmissionslist) | **GET** /vehicles/transmissions | List available vehicle transmissions
*TuningApi* | [**vehiclesTypesList**](docs/Api/TuningApi.md#vehiclestypeslist) | **GET** /vehicles/types | List vehicle types
*VehicleDatabaseApi* | [**vdbEnginesSearch**](docs/Api/VehicleDatabaseApi.md#vdbenginessearch) | **GET** /vdb/engines/search | Search engine
*VehicleDatabaseApi* | [**vdbListEngines**](docs/Api/VehicleDatabaseApi.md#vdblistengines) | **GET** /vdb/engines/{generation_id} | List engines
*VehicleDatabaseApi* | [**vdbListGenerations**](docs/Api/VehicleDatabaseApi.md#vdblistgenerations) | **GET** /vdb/generations/{model_id} | List model generations
*VehicleDatabaseApi* | [**vdbListManufacturers**](docs/Api/VehicleDatabaseApi.md#vdblistmanufacturers) | **GET** /vdb/manufacturers/{vehicle_type_id} | List manufacturers
*VehicleDatabaseApi* | [**vdbListModels**](docs/Api/VehicleDatabaseApi.md#vdblistmodels) | **GET** /vdb/models/{manufacturer_id} | List models
*VehicleDatabaseApi* | [**vdbListTypes**](docs/Api/VehicleDatabaseApi.md#vdblisttypes) | **GET** /vdb/types | List vehicle types
*VehicleDatabaseApi* | [**vdbSearch**](docs/Api/VehicleDatabaseApi.md#vdbsearch) | **GET** /vdb/search | Search
*VehicleDatabaseApi* | [**vdbSubscription**](docs/Api/VehicleDatabaseApi.md#vdbsubscription) | **GET** /vdb/subscription | Check for active subscription
*VehicleDatabaseApi* | [**vdbViewEngine**](docs/Api/VehicleDatabaseApi.md#vdbviewengine) | **GET** /vdb/engines/view/{engine_id} | View engine
*VehicleDatabaseApi* | [**vdbViewGeneration**](docs/Api/VehicleDatabaseApi.md#vdbviewgeneration) | **GET** /vdb/generations/view/{generation_id} | View generation
*VehicleDatabaseApi* | [**vdbViewManufacturer**](docs/Api/VehicleDatabaseApi.md#vdbviewmanufacturer) | **GET** /vdb/manufacturers/view/{manufacturer_id} | View manufacturer
*VehicleDatabaseApi* | [**vdbViewModel**](docs/Api/VehicleDatabaseApi.md#vdbviewmodel) | **GET** /vdb/models/view/{model_id} | View model
*VehicleDatabaseApi* | [**vdbViewPerformance**](docs/Api/VehicleDatabaseApi.md#vdbviewperformance) | **GET** /vdb/performance/{generation_id}/{engine_id} | View vehicle performance
*VehicleDatabaseApi* | [**vdbViewType**](docs/Api/VehicleDatabaseApi.md#vdbviewtype) | **GET** /vdb/types/{type_id} | View vehicle type

## Documentation For Models

 - [Attachment](docs/Model/Attachment.md)
 - [AttachmentsUpload](docs/Model/AttachmentsUpload.md)
 - [Body](docs/Model/Body.md)
 - [Body1](docs/Model/Body1.md)
 - [CreditsAmount](docs/Model/CreditsAmount.md)
 - [DownloadFile](docs/Model/DownloadFile.md)
 - [Error401](docs/Model/Error401.md)
 - [Error401Error](docs/Model/Error401Error.md)
 - [Error404](docs/Model/Error404.md)
 - [Error404Error](docs/Model/Error404Error.md)
 - [Error500](docs/Model/Error500.md)
 - [Error500Error](docs/Model/Error500Error.md)
 - [ErrorBadRequest](docs/Model/ErrorBadRequest.md)
 - [ErrorBadRequestError](docs/Model/ErrorBadRequestError.md)
 - [ErrorInvalidKey](docs/Model/ErrorInvalidKey.md)
 - [ErrorInvalidKeyError](docs/Model/ErrorInvalidKeyError.md)
 - [FilesPurchase](docs/Model/FilesPurchase.md)
 - [FilesUpload](docs/Model/FilesUpload.md)
 - [NotificationChannel](docs/Model/NotificationChannel.md)
 - [NotificationChannels](docs/Model/NotificationChannels.md)
 - [Project](docs/Model/Project.md)
 - [ProjectFile](docs/Model/ProjectFile.md)
 - [ProjectFilePayment](docs/Model/ProjectFilePayment.md)
 - [ProjectFilePricing](docs/Model/ProjectFilePricing.md)
 - [ProjectRemapData](docs/Model/ProjectRemapData.md)
 - [ProjectRemapDataAddons](docs/Model/ProjectRemapDataAddons.md)
 - [ProjectVehicleData](docs/Model/ProjectVehicleData.md)
 - [Projects](docs/Model/Projects.md)
 - [ProjectsPagination](docs/Model/ProjectsPagination.md)
 - [Remap](docs/Model/Remap.md)
 - [RemapAddon](docs/Model/RemapAddon.md)
 - [Subscription](docs/Model/Subscription.md)
 - [VdbEngine](docs/Model/VdbEngine.md)
 - [VdbEngineInfo](docs/Model/VdbEngineInfo.md)
 - [VdbEngineInfoOptions](docs/Model/VdbEngineInfoOptions.md)
 - [VdbEngineInfoReadMethods](docs/Model/VdbEngineInfoReadMethods.md)
 - [VdbEngineInfoReadTools](docs/Model/VdbEngineInfoReadTools.md)
 - [VdbEngineInfoRemapStages](docs/Model/VdbEngineInfoRemapStages.md)
 - [VdbGeneration](docs/Model/VdbGeneration.md)
 - [VdbManufacturer](docs/Model/VdbManufacturer.md)
 - [VdbModel](docs/Model/VdbModel.md)
 - [VdbPerformance](docs/Model/VdbPerformance.md)
 - [VdbSearch](docs/Model/VdbSearch.md)
 - [VdbSearchInner](docs/Model/VdbSearchInner.md)
 - [VdbVehicleType](docs/Model/VdbVehicleType.md)
 - [VehicleEngine](docs/Model/VehicleEngine.md)
 - [VehicleGeneration](docs/Model/VehicleGeneration.md)
 - [VehicleManufacturer](docs/Model/VehicleManufacturer.md)
 - [VehicleModel](docs/Model/VehicleModel.md)
 - [VehicleReadTool](docs/Model/VehicleReadTool.md)
 - [VehicleRemaps](docs/Model/VehicleRemaps.md)
 - [VehicleTransmission](docs/Model/VehicleTransmission.md)
 - [VehicleType](docs/Model/VehicleType.md)

## Documentation For Authorization


## api_key

- **Type**: API key
- **API key parameter name**: x-api-key
- **Location**: HTTP header


## Author

support@tuningfiles.com

