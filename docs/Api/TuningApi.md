# Tuningfiles\TuningApi

All URIs are relative to *https://api.tuningfiles.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**attachmentUpload**](TuningApi.md#attachmentupload) | **POST** /attachments/upload | Upload attachment
[**creditsAmount**](TuningApi.md#creditsamount) | **GET** /credits/amount | Get available credits amount
[**fileDownload**](TuningApi.md#filedownload) | **GET** /files/download/{file_id}/{project_id} | Download file
[**filePurchase**](TuningApi.md#filepurchase) | **GET** /files/purchase/{file_id}/{project_id} | Purchase file
[**fileUpload**](TuningApi.md#fileupload) | **POST** /files/upload | Upload original file
[**notificationChannelsList**](TuningApi.md#notificationchannelslist) | **GET** /notification-channels | List notification channels
[**projectView**](TuningApi.md#projectview) | **GET** /projects/view/{project_id} | View project
[**projectsCreate**](TuningApi.md#projectscreate) | **POST** /projects | Create project
[**projectsList**](TuningApi.md#projectslist) | **GET** /projects | List projects
[**readToolsList**](TuningApi.md#readtoolslist) | **GET** /vehicles/read-tools | List available read tools
[**remapsList**](TuningApi.md#remapslist) | **GET** /vehicles/remaps/{vehicle_type_id} | List available remaps
[**tuningSubscription**](TuningApi.md#tuningsubscription) | **GET** /subscription | Check for active subscription
[**vehiclesEnginesList**](TuningApi.md#vehiclesengineslist) | **GET** /vehicles/engines/{generation_id} | List vehicle engines
[**vehiclesGenerationsList**](TuningApi.md#vehiclesgenerationslist) | **GET** /vehicles/generations/{model_id} | List vehicle model generations
[**vehiclesManufacturersList**](TuningApi.md#vehiclesmanufacturerslist) | **GET** /vehicles/manufacturers/{vehicle_type_id} | List vehicle manufacturers
[**vehiclesModelsList**](TuningApi.md#vehiclesmodelslist) | **GET** /vehicles/models/{manufacturer_id} | List vehicle models
[**vehiclesTransmissionsList**](TuningApi.md#vehiclestransmissionslist) | **GET** /vehicles/transmissions | List available vehicle transmissions
[**vehiclesTypesList**](TuningApi.md#vehiclestypeslist) | **GET** /vehicles/types | List vehicle types

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
 **file** | **string****string**|  | [optional]

### Return type

[**\Tuningfiles\Model\AttachmentsUpload**](../Model/AttachmentsUpload.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **creditsAmount**
> \Tuningfiles\Model\CreditsAmount creditsAmount()

Get available credits amount

This method allows you to check how many credits do you have in your account

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
    $result = $apiInstance->creditsAmount();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->creditsAmount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Tuningfiles\Model\CreditsAmount**](../Model/CreditsAmount.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fileDownload**
> \Tuningfiles\Model\DownloadFile fileDownload($file_id, $project_id)

Download file

Download tuned or original file from your project.  Returns json data where \"filename\" will be the name of the file and \"data\" will be the Base64-encoded contents of the file.     ### Response example:      ```    {      \"filename\": \"The name of the file\",      \"data\": \"UEsDBBQABgAIAAAAIQBi7p1oXgEAAJAEA...iAAAAAA==\",      \"size\": 9508    }    ```  **Remember to base64 decode the content of the data key when assembling the file.**

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
    $result = $apiInstance->fileDownload($file_id, $project_id);
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

### Return type

[**\Tuningfiles\Model\DownloadFile**](../Model/DownloadFile.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

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
 - **Accept**: application/json

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
 **file** | **string****string**|  | [optional]

### Return type

[**\Tuningfiles\Model\FilesUpload**](../Model/FilesUpload.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **notificationChannelsList**
> \Tuningfiles\Model\NotificationChannel[] notificationChannelsList()

List notification channels

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

[**\Tuningfiles\Model\NotificationChannel[]**](../Model/NotificationChannel.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectView**
> \Tuningfiles\Model\Project projectView($project_id)

View project

View info about specific project.     ### Project object:  ```  {    \"id\": 146356, // Project ID (Sedox ID).    \"uuid\": \"07b2402b-00cd-4d61-9bc4-13b85a1849fb\", // Project v4 UUID.    \"name\": \"Audi A3 8P 2.0 TDI 136hp 320Nm 2017\", // Project name.    \"status\": \"Finished\", // Project status. Can be: \"Waiting\", \"In Progress\", \"Finished\".    \"status_code\": 2, // Project status code. Can be: 0 = \"Waiting\"; 1 = \"In Progress\"; 2 = \"Finished\".    \"vehicle_data\": {      \"id\": 1,      \"type\": \"Cars & LCV\",      \"producer\": \"Audi\",      \"producer_id\": 1088,      \"series\": null,      \"build\": null,      \"model\": \"A3\",      \"model_id\": 7733,      \"model_year\": 2017,      \"generation\": \"8P\",      \"generation_id\": 1234,      \"engine_name\": \"2.0 TDI 136hp 320Nm\",      \"engine_id\": 1133,      \"engine_output_ps\": null,      \"engine_transmission\": \"Automatic transmission\",      \"engine_transmission_id\": 3,      \"ecu_producer\": \"Bosch\",      \"ecu_build\": \"EDC16C39\",      \"ecu_oem_number\": null,      \"ecu_hardware_number\": \"A123456789\",      \"ecu_software_number\": \"B123456789\",      \"ecu_software_upgrade_version\": null,      \"ecu_name\": \"Bosch EDC16C39\"    },    \"read_tool\": \"Alientech K-Tag\", // Read tool used for reading the ECU.    \"read_tool_id\": 4,    \"dtc_codes\": [      \"P123456\",\"P789102\" // Array with DTC codes requested for removal.    ],    \"license_plate\": \"AB1234BA\",    \"notification_channels\": [      /_*       * Notification channels used for this project.       * Array of notification channel objects.       * See \"List notification channels\" (/notification-channels).       *_/    ],    \"comment\": \"Simple comment\", // Customer comment.    \"remap_data\": {      \"remap\": \"Stage 1\", // Requested remap.      \"remap_id\": 1, // Requested remap ID.      \"addons\": [        /_*         * Array with all special requests (addons), requested by customer.         *_/        {          \"id\": 4,          \"code\": \"Vmax OFF\",          \"help\": \"Vmax Removal, if possible write down current vmax.\",          \"name\": \"Vmax\",          \"price\": 1,          \"tier_price\": true        }      ],    },    \"started_on\": \"2019-03-21T14:29:42+00:00\", // Date on which project was started by our developers.    \"finished_on\": \"2019-03-21T14:42:43+00:00\", // Date on which project was finished by our developers.    \"added\": \"2019-03-21T14:29:35+00:00\", // Date on which project was added into the queue.    \"uploaded\": \"2019-03-21T14:29:35+00:00\", // Date on which project was created.    \"updated\": \"2019-03-21T14:42:43+00:00\", // Last update date.    \"attachments\": [      /_*       * Array of attachment objects       *_/    ],    \"files\": [      /_*       * Array of file objects       *_/    ]  }  ```    ### File object:  ```  {    \"id\": 246810, // File ID.    \"uuid\": \"3dbb36a1-d50f-4327-8100-83a8c2f1b869\", // File v4 UUID.    \"project\": 146356, // Project ID (Sedox ID).    /_*     * Type of the file.     * For original files it can be: \"ID File\" or \"Original\".     * For tuned files it can be \"Stage 1, 2, 3, etc\".     * For files with special requests only (like DPF Off,     * Vmax Off, etc) it can be \"Decativation Only\".     *_/    \"type\": \"Stage 1\",    \"ecu_number\": 1, // ECU number. Some cars have more than one ECU.    \"ecu_label\": null, // ECU label.    \"remap_id\": 1, // ID of the remap.    \"remap_name\": \"Stage 1\", // Name of the remap.    \"remap_addons\": [      /_*       * Array with all special requests (addons) added into the file.       *_/      {       \"id\": 0, // ID of the addon. When creating a tuning project, you may supply this id.        \"code\": \"DPF OFF\", // This code is added into the file name (eg. Audi A4 .... DPF OFF, EGR OFF...mod)       \"help\": \"Removal of DPF, always write down DTC codes if present in ECU.\",       \"name\": \"DPF\", // Name of the addon       \"price\": 5, // Price for the addon       \"tier_price\": true // Shows if addon is tier price eligible     }    ],    \"size\": 706, // Actual file size in bytes.    \"md5sum\": \"e119c4a83885f8709b551378ed894d16\", // MD5 sum of the file.    \"is_checksum_updated\": false, // Shows either checksum was updated (corrected) or not.    \"user_id\": 12345, // Owner of the file.    \"uploaded_by\": 12345, // Uploader of the file (may be a sub-account).    \"is_original\": false, // Shows either this is an original file or not.    /_*     * Shows if file is stack (archive).     * Archive contains more than one file.     * If car is with 2 ECUs you will receive stacked file (archive) with 2 modified files (one for each ECU).     *_/    \"is_stack\": false,    \"stack\": null, // Stack ID (if this file is part of stack/archive).    \"is_cmdencrypted\": false, // Shows either this is CMD Encrypted file.    \"is_cmddecrypted\": false, // Shows either this is CMD Decrypted file.    \"is_id\": false, // Shows either this is an ID file.    \"comment\": null, // Comment left by developer.    \"pricing\": {      \"is_billable\": true, // Shows either this file is billable or not.      \"is_paid\": true, // Shows either this file has been paid or not.      \"regular_price\": 15, // The regular price of the file.      \"final_price\": 0, // The final price of the file.      /_*       * Shows either customer is permitted to download this file or not.       * If file is billable and download_permitted = false, then it should be purchased first.       *_/      \"download_permitted\": true,       \"purchase_url\": null // If file needs to be purchased, this will contain the API url to purchase the file.    },    \"payment\": {      /_*       * Payment object.       * Will be `null` if there is no active payment for this file.       *_/      \"id\": 123456, // Payment ID.      \"fullfillment_id\": 7891011, // Fulfillment ID.      \"file_id\": 246810, // File ID.      \"project_id\": 146356, // Project ID (Sedox ID).      \"buyer_id\": 12345, // Customer who made the payment.      \"amount\": 10, // Payment amount.      \"is_refunded\": false, // Is payment refunded.      \"date\": \"2019-03-05T20:47:37+00:00\", // Payment date.      /_*       * After this date payment won't be active anymore.       * In this case, file should be purcased again.       *_/      \"end_date\": \"2019-06-05T20:47:37+00:00\"    },    \"added\": \"2019-03-05T20:47:37+00:00\", // Date-time file was uploaded.    \"updated\": \"2019-03-05T20:47:37+00:00\" // Date-time file was updated.  }  ```

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
$project_id = 56; // int | Project ID

try {
    $result = $apiInstance->projectView($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->projectView: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**| Project ID |

### Return type

[**\Tuningfiles\Model\Project**](../Model/Project.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectsCreate**
> \Tuningfiles\Model\Projects projectsCreate($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment)

Create project

Create new remap project.  Prior of creating a project, you will need to upload the original file using the  [/files/upload](#operation/file_upload) method and obtain `File ID`.

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
$ecu1_file = 56; // int | 
$ecu1_label = "ecu1_label_example"; // string | 
$ecu2_file = 56; // int | 
$ecu2_label = "ecu2_label_example"; // string | 
$vehicle_type_id = 56; // int | 
$vehicle_manufacturer_id = 56; // int | 
$vehicle_model_id = 56; // int | 
$vehicle_model = "vehicle_model_example"; // string | 
$vehicle_generation_id = 56; // int | 
$vehicle_generation = "vehicle_generation_example"; // string | 
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
    $result = $apiInstance->projectsCreate($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->projectsCreate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ecu1_file** | **int**|  |
 **ecu1_label** | **string**|  |
 **ecu2_file** | **int**|  |
 **ecu2_label** | **string**|  |
 **vehicle_type_id** | **int**|  |
 **vehicle_manufacturer_id** | **int**|  |
 **vehicle_model_id** | **int**|  |
 **vehicle_model** | **string**|  |
 **vehicle_generation_id** | **int**|  |
 **vehicle_generation** | **string**|  |
 **vehicle_engine** | **string**|  |
 **vehicle_engine_id** | **int**|  |
 **vehicle_year** | **int**|  |
 **vehicle_gearbox** | **int**|  |
 **vehicle_ecu** | **string**|  |
 **hardware_number** | **string**|  |
 **software_number** | **string**|  |
 **read_tool** | **string**|  |
 **remap** | **int**|  |
 **addons** | [**int[]**](../Model/int.md)|  |
 **dtc_codes** | [**string[]**](../Model/string.md)|  |
 **notification_channel** | [**int[]**](../Model/int.md)|  |
 **file_attachment** | **int**|  |
 **ref** | **string**|  |
 **customer_comment** | **string**|  |

### Return type

[**\Tuningfiles\Model\Projects**](../Model/Projects.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectsList**
> \Tuningfiles\Model\Projects projectsList($per_page, $page)

List projects

Returns a list of all projects.  If response contains more than 1 page, there will be a  `pagination` object with `current_page`, `next_page` and `last_page` numbers.  By default system will return 20 projects per page. This can be changed using the `per_page` parameter.   ### Response legend (with pagination):  ```  {    \"projects\": [],    \"pagination\": {      \"current_page\": 1,      \"next_page\": 2,      \"last_page\": 4    }  }  ```    ### Response legend (without pagination):  ```  {    \"projects\": []  }  ```    ### Project object:  ```  {    \"id\": 146356, // Project ID (Sedox ID).    \"uuid\": \"07b2402b-00cd-4d61-9bc4-13b85a1849fb\", // Project v4 UUID.    \"name\": \"Audi A3 8P 2.0 TDI 136hp 320Nm 2017\", // Project name.    \"status\": \"Finished\", // Project status. Can be: \"Waiting\", \"In Progress\", \"Finished\".    \"status_code\": 2, // Project status code. Can be: 0 = \"Waiting\"; 1 = \"In Progress\"; 2 = \"Finished\".    \"vehicle_data\": {      \"id\": 1,      \"type\": \"Cars & LCV\",      \"producer\": \"Audi\",      \"producer_id\": 1088,      \"series\": null,      \"build\": null,      \"model\": \"A3\",      \"model_id\": 7733,      \"model_year\": 2017,      \"generation\": \"8P\",      \"generation_id\": 1234,      \"engine_name\": \"2.0 TDI 136hp 320Nm\",      \"engine_id\": 1133,      \"engine_output_ps\": null,      \"engine_transmission\": \"Automatic transmission\",      \"engine_transmission_id\": 3,      \"ecu_producer\": \"Bosch\",      \"ecu_build\": \"EDC16C39\",      \"ecu_oem_number\": null,      \"ecu_hardware_number\": \"A123456789\",      \"ecu_software_number\": \"B123456789\",      \"ecu_software_upgrade_version\": null,      \"ecu_name\": \"Bosch EDC16C39\"    },    \"read_tool\": \"Alientech K-Tag\", // Read tool used for reading the ECU.    \"read_tool_id\": 4,    \"dtc_codes\": [      \"P123456\",\"P789102\" // Array with DTC codes requested for removal.    ],    \"license_plate\": \"AB1234BA\",    \"notification_channels\": [      /_*       * Notification channels used for this project.       * Array of notification channel objects.       * See \"List notification channels\" (/notification-channels).       *_/    ],    \"comment\": \"Simple comment\", // Customer comment.    \"remap_data\": {      \"remap\": \"Stage 1\", // Requested remap.      \"remap_id\": 1, // Requested remap ID.      \"addons\": [        /_*         * Array with all special requests (addons), requested by customer.         *_/        {          \"id\": 4,          \"code\": \"Vmax OFF\",          \"help\": \"Vmax Removal, if possible write down current vmax.\",          \"name\": \"Vmax\",          \"price\": 1,          \"tier_price\": true        }      ],    },    \"started_on\": \"2019-03-21T14:29:42+00:00\", // Date on which project was started by our developers.    \"finished_on\": \"2019-03-21T14:42:43+00:00\", // Date on which project was finished by our developers.    \"added\": \"2019-03-21T14:29:35+00:00\", // Date on which project was added into the queue.    \"uploaded\": \"2019-03-21T14:29:35+00:00\", // Date on which project was created.    \"updated\": \"2019-03-21T14:42:43+00:00\", // Last update date.    \"attachments\": [      /_*       * Array of attachment objects       *_/    ],    \"files\": [      /_*       * Array of file objects       *_/    ]  }  ```    ### File object:  ```  {    \"id\": 246810, // File ID.    \"uuid\": \"3dbb36a1-d50f-4327-8100-83a8c2f1b869\", // File v4 UUID.    \"project\": 146356, // Project ID (Sedox ID).    /_*     * Type of the file.     * For original files it can be: \"ID File\" or \"Original\".     * For tuned files it can be \"Stage 1, 2, 3, etc\".     * For files with special requests only (like DPF Off,     * Vmax Off, etc) it can be \"Decativation Only\".     *_/    \"type\": \"Stage 1\",    \"ecu_number\": 1, // ECU number. Some cars have more than one ECU.    \"ecu_label\": null, // ECU label.    \"remap_id\": 1, // ID of the remap.    \"remap_name\": \"Stage 1\", // Name of the remap.    \"remap_addons\": [      /_*       * Array with all special requests (addons) added into the file.       *_/      {          \"id\": 4,          \"code\": \"Vmax OFF\",          \"help\": \"Vmax Removal, if possible write down current vmax.\",          \"name\": \"Vmax\",          \"price\": 1,          \"tier_price\": true        }    ],    \"size\": 706, // Actual file size in bytes.    \"md5sum\": \"e119c4a83885f8709b551378ed894d16\", // MD5 sum of the file.    \"is_checksum_updated\": false, // Shows either checksum was updated (corrected) or not.    \"user_id\": 12345, // Owner of the file.    \"uploaded_by\": 12345, // Uploader of the file (may be a sub-account).    \"is_original\": false, // Shows either this is an original file or not.    /_*     * Shows if file is stack (archive).     * Archive contains more than one file.     * If car is with 2 ECUs you will receive stacked file (archive) with 2 modified files (one for each ECU).     *_/    \"is_stack\": false,    \"stack\": null, // Stack ID (if this file is part of stack/archive).    \"is_cmdencrypted\": false, // Shows either this is CMD Encrypted file.    \"is_cmddecrypted\": false, // Shows either this is CMD Decrypted file.    \"is_id\": false, // Shows either this is an ID file.    \"comment\": null, // Comment left by developer.    \"pricing\": {      \"is_billable\": true, // Shows either this file is billable or not.      \"is_paid\": true, // Shows either this file has been paid or not.      \"regular_price\": 15, // The regular price of the file.      \"final_price\": 0, // The final price of the file.      /_*       * Shows either customer is permitted to download this file or not.       * If file is billable and download_permitted = false, then it should be purchased first.       *_/      \"download_permitted\": true,       \"purchase_url\": null // If file needs to be purchased, this will contain the API url to purchase the file.    },    \"payment\": {      /_*       * Payment object.       * Will be `null` if there is no active payment for this file.       *_/      \"id\": 123456, // Payment ID.      \"fullfillment_id\": 7891011, // Fulfillment ID.      \"file_id\": 246810, // File ID.      \"project_id\": 146356, // Project ID (Sedox ID).      \"buyer_id\": 12345, // Customer who made the payment.      \"amount\": 10, // Payment amount.      \"is_refunded\": false, // Is payment refunded.      \"date\": \"2019-03-05T20:47:37+00:00\", // Payment date.      /_*       * After this date payment won't be active anymore.       * In this case, file should be purcased again.       *_/      \"end_date\": \"2019-06-05T20:47:37+00:00\"    },    \"added\": \"2019-03-05T20:47:37+00:00\", // Date-time file was uploaded.    \"updated\": \"2019-03-05T20:47:37+00:00\" // Date-time file was updated.  }  ```

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
$per_page = 20; // int | Projects per page
$page = 789; // int | Page number

try {
    $result = $apiInstance->projectsList($per_page, $page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->projectsList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **per_page** | **int**| Projects per page | [optional] [default to 20]
 **page** | **int**| Page number | [optional]

### Return type

[**\Tuningfiles\Model\Projects**](../Model/Projects.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **readToolsList**
> \Tuningfiles\Model\VehicleReadTool[] readToolsList()

List available read tools

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

[**\Tuningfiles\Model\VehicleReadTool[]**](../Model/VehicleReadTool.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **remapsList**
> \Tuningfiles\Model\Remap[] remapsList($vehicle_type_id)

List available remaps

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

[**\Tuningfiles\Model\Remap[]**](../Model/Remap.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **tuningSubscription**
> \Tuningfiles\Model\Subscription tuningSubscription()

Check for active subscription

This method allows you to check if authenticated API Key have access to the Tuning API

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
    $result = $apiInstance->tuningSubscription();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->tuningSubscription: ', $e->getMessage(), PHP_EOL;
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

# **vehiclesEnginesList**
> \Tuningfiles\Model\VehicleEngine[] vehiclesEnginesList($generation_id)

List vehicle engines

List engines for specific model generation

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
$generation_id = 789; // int | Generation ID

try {
    $result = $apiInstance->vehiclesEnginesList($generation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesEnginesList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **generation_id** | **int**| Generation ID |

### Return type

[**\Tuningfiles\Model\VehicleEngine[]**](../Model/VehicleEngine.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vehiclesGenerationsList**
> \Tuningfiles\Model\VehicleGeneration[] vehiclesGenerationsList($model_id)

List vehicle model generations

List all generations for specific model

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
$model_id = 789; // int | Model ID

try {
    $result = $apiInstance->vehiclesGenerationsList($model_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesGenerationsList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **model_id** | **int**| Model ID |

### Return type

[**\Tuningfiles\Model\VehicleGeneration[]**](../Model/VehicleGeneration.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vehiclesManufacturersList**
> \Tuningfiles\Model\VehicleManufacturer[] vehiclesManufacturersList($vehicle_type_id)

List vehicle manufacturers

List all manufacturers based on vehicle type

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
$vehicle_type_id = 789; // int | Vehicle type ID

try {
    $result = $apiInstance->vehiclesManufacturersList($vehicle_type_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesManufacturersList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **vehicle_type_id** | **int**| Vehicle type ID |

### Return type

[**\Tuningfiles\Model\VehicleManufacturer[]**](../Model/VehicleManufacturer.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vehiclesModelsList**
> \Tuningfiles\Model\VehicleModel[] vehiclesModelsList($manufacturer_id)

List vehicle models

List all models from specific manufacturer

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
$manufacturer_id = 789; // int | Manufacturer ID

try {
    $result = $apiInstance->vehiclesModelsList($manufacturer_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesModelsList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **manufacturer_id** | **int**| Manufacturer ID |

### Return type

[**\Tuningfiles\Model\VehicleModel[]**](../Model/VehicleModel.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vehiclesTransmissionsList**
> \Tuningfiles\Model\VehicleTransmission[] vehiclesTransmissionsList()

List available vehicle transmissions

Shows all available vehicle transmission boxes.

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
    $result = $apiInstance->vehiclesTransmissionsList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesTransmissionsList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Tuningfiles\Model\VehicleTransmission[]**](../Model/VehicleTransmission.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **vehiclesTypesList**
> \Tuningfiles\Model\VehicleType[] vehiclesTypesList()

List vehicle types

Shows all vehicle types.

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
    $result = $apiInstance->vehiclesTypesList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TuningApi->vehiclesTypesList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Tuningfiles\Model\VehicleType[]**](../Model/VehicleType.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

