# Tuningfiles\SupportApi

All URIs are relative to *https://api.tuningfiles.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**supportCloseTicket**](SupportApi.md#supportcloseticket) | **GET** /support/tickets/close/{ticket_id} | Close/Resolve ticket
[**supportCreateMessage**](SupportApi.md#supportcreatemessage) | **POST** /support/messages/{ticket_id} | Create message
[**supportCreateTicket**](SupportApi.md#supportcreateticket) | **POST** /support/tickets | Create ticket
[**supportListDepartments**](SupportApi.md#supportlistdepartments) | **GET** /support/departments | List support departments
[**supportListMessages**](SupportApi.md#supportlistmessages) | **GET** /support/messages/{ticket_id} | List ticket messages
[**supportListTickets**](SupportApi.md#supportlisttickets) | **GET** /support/tickets | List tickets
[**supportReopenTicket**](SupportApi.md#supportreopenticket) | **GET** /support/tickets/reopen/{ticket_id} | Re-open ticket
[**supportUploadAttachment**](SupportApi.md#supportuploadattachment) | **POST** /support/messages/attachment | Upload file attachment
[**supportViewTicket**](SupportApi.md#supportviewticket) | **GET** /support/tickets/{ticket_id} | View ticket

# **supportCloseTicket**
> \Tuningfiles\Model\InlineResponse201 supportCloseTicket($ticket_id)

Close/Resolve ticket

Set the status of the support request (ticket) to \"Closed/Resolved\".

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\SupportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticket_id = "ticket_id_example"; // string | Tciket ID

try {
    $result = $apiInstance->supportCloseTicket($ticket_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupportApi->supportCloseTicket: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticket_id** | **string**| Tciket ID |

### Return type

[**\Tuningfiles\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supportCreateMessage**
> \Tuningfiles\Model\SupportTicketMessages[] supportCreateMessage($message, $display_name, $display_email, $attachments, $ticket_id)

Create message

Write message into a ticket

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\SupportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$message = "message_example"; // string | 
$display_name = "display_name_example"; // string | 
$display_email = "display_email_example"; // string | 
$attachments = array(56); // int[] | 
$ticket_id = "ticket_id_example"; // string | Ticket ID

try {
    $result = $apiInstance->supportCreateMessage($message, $display_name, $display_email, $attachments, $ticket_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupportApi->supportCreateMessage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **message** | **string**|  |
 **display_name** | **string**|  |
 **display_email** | **string**|  |
 **attachments** | [**int[]**](../Model/int.md)|  |
 **ticket_id** | **string**| Ticket ID |

### Return type

[**\Tuningfiles\Model\SupportTicketMessages[]**](../Model/SupportTicketMessages.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supportCreateTicket**
> \Tuningfiles\Model\InlineResponse201 supportCreateTicket($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments)

Create ticket

Create support requests (ticket)

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\SupportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$department = 56; // int | 
$subject = "subject_example"; // string | 
$message = "message_example"; // string | 
$message_display_name = "message_display_name_example"; // string | 
$message_display_email = "message_display_email_example"; // string | 
$project = 56; // int | 
$attachments = array(56); // int[] | 

try {
    $result = $apiInstance->supportCreateTicket($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupportApi->supportCreateTicket: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **department** | **int**|  |
 **subject** | **string**|  |
 **message** | **string**|  |
 **message_display_name** | **string**|  |
 **message_display_email** | **string**|  |
 **project** | **int**|  |
 **attachments** | [**int[]**](../Model/int.md)|  |

### Return type

[**\Tuningfiles\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supportListDepartments**
> \Tuningfiles\Model\SupportDepartments supportListDepartments()

List support departments

This method allows you to obtain a list with all available support departments.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\SupportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->supportListDepartments();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupportApi->supportListDepartments: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Tuningfiles\Model\SupportDepartments**](../Model/SupportDepartments.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supportListMessages**
> \Tuningfiles\Model\SupportTicketMessages[] supportListMessages($ticket_id)

List ticket messages

Lists all the messages in the requested ticket

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\SupportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticket_id = "ticket_id_example"; // string | Ticket ID

try {
    $result = $apiInstance->supportListMessages($ticket_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupportApi->supportListMessages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticket_id** | **string**| Ticket ID |

### Return type

[**\Tuningfiles\Model\SupportTicketMessages[]**](../Model/SupportTicketMessages.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supportListTickets**
> \Tuningfiles\Model\SupportTickets supportListTickets($per_page, $page, $start_date, $end_date, $filter)

List tickets

Returns a list of all your support requests/tickets.  If response contains more than 1 page, there will be a  `pagination` object with `current_page`, `next_page` and `last_page` numbers.  By default system will return 20 tickets per page. This can be changed using the `per_page` parameter.   ### Response legend (with pagination):  ```  {    \"tickets\": [],    \"pagination\": {      \"current_page\": 1,      \"next_page\": 2,      \"last_page\": 4    }  }  ```    ### Response legend (without pagination):  ```  {    \"tickets\": []  }  ```

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\SupportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$per_page = 20; // int | Tickets per page
$page = 789; // int | Page number
$start_date = 789; // int | Start date period. As unix timestamp in **seconds**. If this parameter is set then `end_date` parameter must also be specified.
$end_date = 789; // int | End date period. As unix timestamp in **seconds**. If this parameter is set then `start_date` parameter must also be specified.
$filter = "filter_example"; // string | Filter as json object: `{\"key\":\"value\", \"key\":\"value\", …}`. Allowed keys: `status`, `department`, `project`

try {
    $result = $apiInstance->supportListTickets($per_page, $page, $start_date, $end_date, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupportApi->supportListTickets: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **per_page** | **int**| Tickets per page | [optional] [default to 20]
 **page** | **int**| Page number | [optional]
 **start_date** | **int**| Start date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;end_date&#x60; parameter must also be specified. | [optional]
 **end_date** | **int**| End date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;start_date&#x60; parameter must also be specified. | [optional]
 **filter** | **string**| Filter as json object: &#x60;{\&quot;key\&quot;:\&quot;value\&quot;, \&quot;key\&quot;:\&quot;value\&quot;, …}&#x60;. Allowed keys: &#x60;status&#x60;, &#x60;department&#x60;, &#x60;project&#x60; | [optional]

### Return type

[**\Tuningfiles\Model\SupportTickets**](../Model/SupportTickets.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supportReopenTicket**
> \Tuningfiles\Model\InlineResponse201 supportReopenTicket($ticket_id)

Re-open ticket

Set the status of the support request (ticket) to \"Open\".

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\SupportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticket_id = "ticket_id_example"; // string | Tciket ID

try {
    $result = $apiInstance->supportReopenTicket($ticket_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupportApi->supportReopenTicket: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticket_id** | **string**| Tciket ID |

### Return type

[**\Tuningfiles\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **supportUploadAttachment**
> \Tuningfiles\Model\AttachmentsUpload supportUploadAttachment($file)

Upload file attachment

Allows you to upload files and use them as attachments when creating tickets or write messages.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\SupportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$file = "file_example"; // string | 

try {
    $result = $apiInstance->supportUploadAttachment($file);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupportApi->supportUploadAttachment: ', $e->getMessage(), PHP_EOL;
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

# **supportViewTicket**
> \Tuningfiles\Model\InlineResponse201 supportViewTicket($ticket_id)

View ticket

View full ticket metadata (including messages) for specific ticket.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');
// Configure API key authorization: api_key
$config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = Tuningfiles\Configuration::getDefaultConfiguration()->setApiKeyPrefix('x-api-key', 'Bearer');

$apiInstance = new Tuningfiles\Api\SupportApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ticket_id = "ticket_id_example"; // string | Ticket ID

try {
    $result = $apiInstance->supportViewTicket($ticket_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SupportApi->supportViewTicket: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ticket_id** | **string**| Ticket ID |

### Return type

[**\Tuningfiles\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

