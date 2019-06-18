# Tuningfiles\VehicleDatabaseApi

All URIs are relative to *https://api.tuningfiles.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**vdbEnginesSearch**](VehicleDatabaseApi.md#vdbEnginesSearch) | **GET** /vdb/engines/search | Search engine
[**vdbListEngines**](VehicleDatabaseApi.md#vdbListEngines) | **GET** /vdb/engines/{model_id} | List engines
[**vdbListManufacturers**](VehicleDatabaseApi.md#vdbListManufacturers) | **GET** /vdb/manufacturers/{vehicle_type_id} | List manufacturers
[**vdbListModels**](VehicleDatabaseApi.md#vdbListModels) | **GET** /vdb/models/{manufacturer_id} | List models
[**vdbListTypes**](VehicleDatabaseApi.md#vdbListTypes) | **GET** /vdb/types | List vehicle types
[**vdbSearch**](VehicleDatabaseApi.md#vdbSearch) | **GET** /vdb/search | Search
[**vdbSubscription**](VehicleDatabaseApi.md#vdbSubscription) | **GET** /vdb/subscription | Check for active subscription
[**vdbViewEngine**](VehicleDatabaseApi.md#vdbViewEngine) | **GET** /vdb/engines/view/{engine_id} | View engine
[**vdbViewManufacturer**](VehicleDatabaseApi.md#vdbViewManufacturer) | **GET** /vdb/manufacturers/view/{manufacturer_id} | View manufacturer
[**vdbViewModel**](VehicleDatabaseApi.md#vdbViewModel) | **GET** /vdb/models/view/{model_id} | View model
[**vdbViewPerformance**](VehicleDatabaseApi.md#vdbViewPerformance) | **GET** /vdb/performance/{model_id}/{engine_id} | View vehicle performance
[**vdbViewType**](VehicleDatabaseApi.md#vdbViewType) | **GET** /vdb/types/{type_id} | View vehicle type

# **vdbEnginesSearch**
> \Tuningfiles\Model\VdbEngine[] vdbEnginesSearch($query, $fuel)

Search engine

Search for engine

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$query = "query_example"; // string | Search query (minimum 3 characters)
$fuel = "fuel_example"; // string | Fuel type (optional)

try {
    $result = $apiInstance->vdbEnginesSearch($query, $fuel);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbEnginesSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **query** | **string**| Search query (minimum 3 characters) |
 **fuel** | **string**| Fuel type (optional) | [optional]

### Return type

[**\Tuningfiles\Model\VdbEngine[]**](../Model/VdbEngine.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbListEngines**
> \Tuningfiles\Model\VdbEngine[] vdbListEngines($model_id)

List engines

List engines for specific model

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$model_id = 789; // int | Model ID

try {
    $result = $apiInstance->vdbListEngines($model_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbListEngines: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **model_id** | **int**| Model ID |

### Return type

[**\Tuningfiles\Model\VdbEngine[]**](../Model/VdbEngine.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbListManufacturers**
> \Tuningfiles\Model\VdbManufacturer[] vdbListManufacturers($vehicle_type_id)

List manufacturers

List manufacturers based on vehicle type

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$vehicle_type_id = 789; // int | Vehicle type ID

try {
    $result = $apiInstance->vdbListManufacturers($vehicle_type_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbListManufacturers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vehicle_type_id** | **int**| Vehicle type ID |

### Return type

[**\Tuningfiles\Model\VdbManufacturer[]**](../Model/VdbManufacturer.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbListModels**
> \Tuningfiles\Model\VdbModel[] vdbListModels($manufacturer_id)

List models

List models based on manufacturer

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$manufacturer_id = 789; // int | Manufacturer ID

try {
    $result = $apiInstance->vdbListModels($manufacturer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbListModels: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **manufacturer_id** | **int**| Manufacturer ID |

### Return type

[**\Tuningfiles\Model\VdbModel[]**](../Model/VdbModel.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbListTypes**
> \Tuningfiles\Model\VdbVehicleType[] vdbListTypes()

List vehicle types

Returns a list of all available vehicle types

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->vdbListTypes();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbListTypes: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Tuningfiles\Model\VdbVehicleType[]**](../Model/VdbVehicleType.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbSearch**
> \Tuningfiles\Model\VdbSearch vdbSearch($query)

Search

Searches through: manufacturer, model, engine names for the possible match and outputs a list of all found information.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$query = "query_example"; // string | Search query (minimum 2 characters)

try {
    $result = $apiInstance->vdbSearch($query);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **query** | **string**| Search query (minimum 2 characters) |

### Return type

[**\Tuningfiles\Model\VdbSearch**](../Model/VdbSearch.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbSubscription**
> \Tuningfiles\Model\Subscription vdbSubscription()

Check for active subscription

This method allows you to check if authenticated API Key have access to the Vehicle Database API

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->vdbSubscription();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbSubscription: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Tuningfiles\Model\Subscription**](../Model/Subscription.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbViewEngine**
> \Tuningfiles\Model\VdbEngineInfo vdbViewEngine($engine_id)

View engine

Returns information about specific engine

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$engine_id = 789; // int | Engine ID

try {
    $result = $apiInstance->vdbViewEngine($engine_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbViewEngine: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **engine_id** | **int**| Engine ID |

### Return type

[**\Tuningfiles\Model\VdbEngineInfo**](../Model/VdbEngineInfo.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbViewManufacturer**
> \Tuningfiles\Model\VdbManufacturer vdbViewManufacturer($manufacturer_id)

View manufacturer

Returns information about specific manufacturer

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$manufacturer_id = 789; // int | Manufacturer ID

try {
    $result = $apiInstance->vdbViewManufacturer($manufacturer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbViewManufacturer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **manufacturer_id** | **int**| Manufacturer ID |

### Return type

[**\Tuningfiles\Model\VdbManufacturer**](../Model/VdbManufacturer.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbViewModel**
> \Tuningfiles\Model\VdbModel vdbViewModel($model_id)

View model

Returns information about specific model

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$model_id = 789; // int | Model ID

try {
    $result = $apiInstance->vdbViewModel($model_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbViewModel: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **model_id** | **int**| Model ID |

### Return type

[**\Tuningfiles\Model\VdbModel**](../Model/VdbModel.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbViewPerformance**
> \Tuningfiles\Model\VdbPerformance vdbViewPerformance($model_id, $engine_id)

View vehicle performance

Getting data of vehicle performance per model and engine

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$model_id = 789; // int | Model ID
$engine_id = 789; // int | Engine ID

try {
    $result = $apiInstance->vdbViewPerformance($model_id, $engine_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbViewPerformance: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **model_id** | **int**| Model ID |
 **engine_id** | **int**| Engine ID |

### Return type

[**\Tuningfiles\Model\VdbPerformance**](../Model/VdbPerformance.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vdbViewType**
> \Tuningfiles\Model\VdbVehicleType vdbViewType($type_id)

View vehicle type

Returns information about specific vehicle type

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\VehicleDatabaseApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type_id = 789; // int | Vehicle type ID

try {
    $result = $apiInstance->vdbViewType($type_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VehicleDatabaseApi->vdbViewType: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type_id** | **int**| Vehicle type ID |

### Return type

[**\Tuningfiles\Model\VdbVehicleType**](../Model/VdbVehicleType.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

