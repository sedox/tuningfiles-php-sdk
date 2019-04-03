# Tuningfiles\TuningApi

All URIs are relative to *https://api.tuningfiles.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**attachmentUpload**](TuningApi.md#attachmentUpload) | **POST** /attachments/upload | Upload attachment
[**fileDownload**](TuningApi.md#fileDownload) | **GET** /files/download/{file_id}/{project_id} | Download file
[**filePurchase**](TuningApi.md#filePurchase) | **GET** /files/purchase/{file_id}/{project_id} | Purchase file
[**fileUpload**](TuningApi.md#fileUpload) | **POST** /files/upload | Upload original file
[**notificationChannelsList**](TuningApi.md#notificationChannelsList) | **GET** /notification-channels | View notification channels
[**readToolsList**](TuningApi.md#readToolsList) | **GET** /read-tools | View available read tools
[**remapsList**](TuningApi.md#remapsList) | **GET** /remaps/{vehicle_type_id} | View available remaps

# **attachmentUpload**
> \Tuningfiles\Model\AttachmentsUpload attachmentUpload($file)

Upload attachment

Upload file which can be used as attachment when creating project.  When creating a tuning project, you can supply the `id` of the uploaded file.

### Example
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
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **string**|  | [optional]

### Return type

[**\Tuningfiles\Model\AttachmentsUpload**](../Model/AttachmentsUpload.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileDownload**
> string fileDownload($file_id, $project_id, $json)

Download file

Download tuned or original file from your project.  By default response will return a file. If you wish to return json data instead, set `json=true` query parameter. In this case, API will return json data where \"filename\" will be the name of the file and \"data\" will be the Base64-encoded contents of the file.     ### Response example (if json is returned /json=true/):      ```    {      \"filename\": \"The name of the file\",      \"data\": \"UEsDBBQABgAIAAAAIQBi7p1oXgEAAJAEA...iAAAAAA==\",      \"size\": 9508    }    ```      ### Response headers (if file is returned):    ```    Content-Type: application/octet-stream    Content-Length: 194    X-Filename: 123456 - 98765 - Audi A3 8P 2.0 TDI 136hp 320Nm 2017 st1.tune    Content-Transfer-Encoding: Binary    Content-disposition: attachment; filename=\"123456 - 98765 - Audi A3 8P 2.0 TDI 136hp 320Nm 2017 st1.tune\"    ```

### Example
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
$file_id = 789; // int | File ID
$project_id = 789; // int | Project ID
$json = true; // bool | By default response will return a file. If you wish to return json data, use this parameter. In this case, API will return json data where \"filename\" will be the name of the file and \"data\" will be the Base64-encoded contents of the file.

try {
    $result = $apiInstance->fileDownload($file_id, $project_id, $json);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->fileDownload: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file_id** | **int**| File ID |
 **project_id** | **int**| Project ID |
 **json** | **bool**| By default response will return a file. If you wish to return json data, use this parameter. In this case, API will return json data where \&quot;filename\&quot; will be the name of the file and \&quot;data\&quot; will be the Base64-encoded contents of the file. | [optional]

### Return type

**string**

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream, application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **filePurchase**
> \Tuningfiles\Model\FilesPurchase filePurchase($file_id, $project_id)

Purchase file

Purchase original or tuned file

### Example
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
$file_id = 789; // int | File ID
$project_id = 789; // int | Project ID

try {
    $result = $apiInstance->filePurchase($file_id, $project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->filePurchase: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file_id** | **int**| File ID |
 **project_id** | **int**| Project ID |

### Return type

[**\Tuningfiles\Model\FilesPurchase**](../Model/FilesPurchase.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileUpload**
> \Tuningfiles\Model\FilesUpload fileUpload($file)

Upload original file

Upload original file to be tuned.  When creating a tuning project, you will need to supply the `id` of the  uploaded file.

### Example
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
    $result = $apiInstance->fileUpload($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->fileUpload: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **file** | **string**|  | [optional]

### Return type

[**\Tuningfiles\Model\FilesUpload**](../Model/FilesUpload.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **notificationChannelsList**
> \Tuningfiles\Model\NotificationChannels notificationChannelsList()

View notification channels

Notification channels can be used for receiving notifications when project status is updated.  When creating a tuning project, you will need to supply the `id` of at least one notification channel.\" ### Notification channel types:   - `email` - Used for receiving email notifications   - `sms` - Used for receiving SMS notifications   - `pushover` - Used for receiving mobile push notifications. You must have Pushovover.net mobile APP installed.

### Example
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

try {
    $result = $apiInstance->notificationChannelsList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->notificationChannelsList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Tuningfiles\Model\NotificationChannels**](../Model/NotificationChannels.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readToolsList**
> \Tuningfiles\Model\ReadTools readToolsList()

View available read tools

Shows all available read tools.  When creating a tuning project, you will need to supply the `id` of the  read tool you used for reading.

### Example
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

try {
    $result = $apiInstance->readToolsList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->readToolsList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Tuningfiles\Model\ReadTools**](../Model/ReadTools.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **remapsList**
> \Tuningfiles\Model\Remaps[] remapsList($vehicle_type_id)

View available remaps

Shows all remaps and addons (special requests) which are available for specified vehicle type.      ### Vehicle type IDs:    - `1` - Cars & LCV    - `2` - Trucks & Buses    - `3` - Agriculture    - `4` - Marine    - `5` - Motorcycles & ATVs          ### Response legend:    ```    {      \"id\": 1, // ID of the remap. When creating a tuning project, you may supply this id.       \"name\": \"Stage 1\",      \"vehicle_type_id\": 1,      \"base_price\": 10, // The base price for the remap. No addons are included in this price.      \"max_tier_price\": 15, // Maximum price for the remap when used with tier eligible (tier_price = true) addons.      \"addons\": [        {          \"id\": 0, // ID of the addon. When creating a tuning project, you may supply this id.           \"code\": \"DPF OFF\", // This code is added into the file name (eg. Audi A4 .... DPF OFF, EGR OFF...mod)          \"help\": \"Removal of DPF, always write down DTC codes if present in ECU.\",          \"name\": \"DPF\", // Name of the addon          \"price\": 5, // Price for the addon          \"tier_price\": true // Shows if addon is tier price eligible        }      ],      \"updated\": \"2019-03-05T12:11:50+00:00\"    }    ```

### Example
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
$vehicle_type_id = 789; // int | Vehicle type

try {
    $result = $apiInstance->remapsList($vehicle_type_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->remapsList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vehicle_type_id** | **int**| Vehicle type |

### Return type

[**\Tuningfiles\Model\Remaps[]**](../Model/Remaps.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json, application/xml

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

