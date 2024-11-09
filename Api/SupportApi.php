<?php
/**
 * SupportApi
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
 * Welcome to the TuningFiles API documentation.  # Language  All API methods accept language parameter, which can be set via the `X-LANG` custom header. Content of the header should be the code of the language you are requesting.  Available languages:    * English (`en`)   * Chinese traditional (`zh-hant`)   * Chinese simplified (`zh-hans`)   * Russian (`ru`)   * Norwegian Bokmål (`nb`)   * Latvian (`lv`)   * Lithuanian (`lt`)   * Croatian (`hr`)   * Spanish (`es`)  Set language to English: ``` curl -X GET \"https://api.tuningfiles.com/method\" -H \"x-lang: en\" ```  # Errors If there is an error, API will return appropriate error code and message like so:  ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  HTTP status code will be the same as the error code. In the case above, returned http status code will be 404.   Failed API authentication: ```json {   \"error\": {     \"code\": 403,     \"message\": \"Invalid API key\"   } } ```  API Key doesn't have enough permissions to access requested resource (some API methods require a paid subscription): ```json {   \"error\": {     \"code\": 401,     \"message\": \"This API key does not have enough permissions\"   } } ```  Not found: ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  Bad request: ```json {   \"error\": {     \"code\": 400,     \"message\": \"Bad request / Wrong parameters\"   } } ```  Server error: ```json {   \"error\": {     \"code\": 500,     \"message\": \"Internal server error\"   } } ``` # Rate limits To protect from flood and abuse, this API implements rate limiting. Currently, only requests made to the Vehicle Database REST API are limited. All the requests made to the File Tuning REST API are not rate-limited (this may change in the future).  **Vehicle Database REST API limits:**   - All methods: *3600 calls/hour*  **File Tuning REST API limits:**   - All methods: *no limits*  **Support REST API limits:**   - All methods: *3600 calls/hour*    Limits are per API Key and are reset every hour. If your app hits those limits, API will return error code `429` with message `This API key has reached the time limit for this method`        # Webhooks You can use webhook to receive notifications about particular events. When you enable webhook in your [API settings page](https://app.tuningfiles.com/api), you can let your app execute code immediately after specific events occur, instead of having to make API calls periodically. For example, you can rely on webhooks to trigger an action in your app when project is created, it's status is updated or when file is purchased.  Webhook notification is using `POST` as http request method and contains a JSON payload, and HTTP headers that provide context.      For example, when project is created, webhook will contains the following headers:    **X-TF-EVENT**: project_create     **X-TF-HMAC-SHA256**: aV95gkmXR75CFvdeIn9DwOmpTCBndDqo/70uJWiYtaY=    and JSON body:   ```   {     \"id\": 146356,     \"uuid\": \"07b2402b-00cd-4d61-9bc4-13b85a1849fb\",     \"name\": \"Audi A3 8P 2.0 TDI 136hp 320Nm 2017\",      \"status\": \"Waiting\",     \"status_code\": 0,     ...     \"files\": [       {         \"id\": 246810,         \"uuid\": \"3dbb36a1-d50f-4327-8100-83a8c2f1b869\",         \"project\": 146356,         \"type\": \"Original\",         ...       }     ]   }   ```    ## Headers Webhook notifications are using following custom http headers:      `X-TF-EVENT`: Event which triggered this webhook     `X-TF-HMAC-SHA256`: Webhook verification hash  ## Events Each webhook will contain `X-TF-EVENT` header. This header represents the event which triggered this webhook.  File Tuning REST API event types:   - `project_create` - Project is created. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    - `project_update` - Project is updated. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)   - `file_purchase` - File is purchased. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    Support REST API event types:   - `ticket_created` - Support request (ticket) was created. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_opened` - Support request (ticket) status was set to \"Opened\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_pending` - Support request (ticket) status was set to \"Pending\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_reopened` - Support request (ticket) status was set to \"Opened\". This event is triggered when a \"closed\" ticket has been re-opened again. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_answered` - Support request (ticket) status was set to \"Answered\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_closed` - Support request (ticket) status was set to \"Closed\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `message_created` - Triggered when a new message (reply) is added into the ticket. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)    ## Verification To allow a client to verify a webhook message has in fact come from TuningFiles, an `X-TF-HMAC-SHA256` header is included in each webhook POST message. The contents of this header is the Base64 encoded output of the HMAC SHA256 encoding of the JSON body of the message, using your API Secret as the encryption key.   Following psuedo PHP example shows how we generate the `X-TF-HMAC-SHA256` value: ```php   base64_encode(hash_hmac('sha256', $webhook_json, $your_api_secret, true)); ```  To verify the authenticity of the webhook message, you should calculate this value yourself and verify it equals the value contained in the header. # SDKs TuningFiles offers a PHP SDK to help interact with the API.  However, no SDK is required to use the API. ## PHP SDK [PHP SDK](https://github.com/sedox/tuningfiles-php-sdk) is hosted on [Github](https://github.com/sedox/tuningfiles-php-sdk). For all PHP SDK examples provided in these docs you will need to configure the `$apiInstance`. You may do it like this:   - For Vehicle Database API:      ```php       $apiInstance = new Tuningfiles\\Api\\VehicleDatabaseApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```    - For Tuning API:          ```php       $apiInstance = new Tuningfiles\\Api\\TuningApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```
 *
 * OpenAPI spec version: 1.2.4
 * Contact: support@tuningfiles.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.33
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Tuningfiles\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Tuningfiles\ApiException;
use Tuningfiles\Configuration;
use Tuningfiles\HeaderSelector;
use Tuningfiles\ObjectSerializer;

/**
 * SupportApi Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SupportApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation supportCloseTicket
     *
     * Close/Resolve ticket
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\InlineResponse201
     */
    public function supportCloseTicket($ticket_id)
    {
        list($response) = $this->supportCloseTicketWithHttpInfo($ticket_id);
        return $response;
    }

    /**
     * Operation supportCloseTicketWithHttpInfo
     *
     * Close/Resolve ticket
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\InlineResponse201, HTTP status code, HTTP response headers (array of strings)
     */
    public function supportCloseTicketWithHttpInfo($ticket_id)
    {
        $returnType = '\Tuningfiles\Model\InlineResponse201';
        $request = $this->supportCloseTicketRequest($ticket_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\InlineResponse201',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorBadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorInvalidKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\Error404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supportCloseTicketAsync
     *
     * Close/Resolve ticket
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportCloseTicketAsync($ticket_id)
    {
        return $this->supportCloseTicketAsyncWithHttpInfo($ticket_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supportCloseTicketAsyncWithHttpInfo
     *
     * Close/Resolve ticket
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportCloseTicketAsyncWithHttpInfo($ticket_id)
    {
        $returnType = '\Tuningfiles\Model\InlineResponse201';
        $request = $this->supportCloseTicketRequest($ticket_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'supportCloseTicket'
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supportCloseTicketRequest($ticket_id)
    {
        // verify the required parameter 'ticket_id' is set
        if ($ticket_id === null || (is_array($ticket_id) && count($ticket_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticket_id when calling supportCloseTicket'
            );
        }

        $resourcePath = '/support/tickets/close/{ticket_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($ticket_id !== null) {
            $resourcePath = str_replace(
                '{' . 'ticket_id' . '}',
                ObjectSerializer::toPathValue($ticket_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation supportCreateMessage
     *
     * Create message
     *
     * @param  string $message message (required)
     * @param  string $display_name display_name (required)
     * @param  string $display_email display_email (required)
     * @param  int[] $attachments attachments (required)
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\SupportTicketMessages[]
     */
    public function supportCreateMessage($message, $display_name, $display_email, $attachments, $ticket_id)
    {
        list($response) = $this->supportCreateMessageWithHttpInfo($message, $display_name, $display_email, $attachments, $ticket_id);
        return $response;
    }

    /**
     * Operation supportCreateMessageWithHttpInfo
     *
     * Create message
     *
     * @param  string $message (required)
     * @param  string $display_name (required)
     * @param  string $display_email (required)
     * @param  int[] $attachments (required)
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\SupportTicketMessages[], HTTP status code, HTTP response headers (array of strings)
     */
    public function supportCreateMessageWithHttpInfo($message, $display_name, $display_email, $attachments, $ticket_id)
    {
        $returnType = '\Tuningfiles\Model\SupportTicketMessages[]';
        $request = $this->supportCreateMessageRequest($message, $display_name, $display_email, $attachments, $ticket_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\SupportTicketMessages[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorBadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorInvalidKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\Error404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supportCreateMessageAsync
     *
     * Create message
     *
     * @param  string $message (required)
     * @param  string $display_name (required)
     * @param  string $display_email (required)
     * @param  int[] $attachments (required)
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportCreateMessageAsync($message, $display_name, $display_email, $attachments, $ticket_id)
    {
        return $this->supportCreateMessageAsyncWithHttpInfo($message, $display_name, $display_email, $attachments, $ticket_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supportCreateMessageAsyncWithHttpInfo
     *
     * Create message
     *
     * @param  string $message (required)
     * @param  string $display_name (required)
     * @param  string $display_email (required)
     * @param  int[] $attachments (required)
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportCreateMessageAsyncWithHttpInfo($message, $display_name, $display_email, $attachments, $ticket_id)
    {
        $returnType = '\Tuningfiles\Model\SupportTicketMessages[]';
        $request = $this->supportCreateMessageRequest($message, $display_name, $display_email, $attachments, $ticket_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'supportCreateMessage'
     *
     * @param  string $message (required)
     * @param  string $display_name (required)
     * @param  string $display_email (required)
     * @param  int[] $attachments (required)
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supportCreateMessageRequest($message, $display_name, $display_email, $attachments, $ticket_id)
    {
        // verify the required parameter 'message' is set
        if ($message === null || (is_array($message) && count($message) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $message when calling supportCreateMessage'
            );
        }
        // verify the required parameter 'display_name' is set
        if ($display_name === null || (is_array($display_name) && count($display_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $display_name when calling supportCreateMessage'
            );
        }
        // verify the required parameter 'display_email' is set
        if ($display_email === null || (is_array($display_email) && count($display_email) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $display_email when calling supportCreateMessage'
            );
        }
        // verify the required parameter 'attachments' is set
        if ($attachments === null || (is_array($attachments) && count($attachments) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $attachments when calling supportCreateMessage'
            );
        }
        // verify the required parameter 'ticket_id' is set
        if ($ticket_id === null || (is_array($ticket_id) && count($ticket_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticket_id when calling supportCreateMessage'
            );
        }

        $resourcePath = '/support/messages/{ticket_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($ticket_id !== null) {
            $resourcePath = str_replace(
                '{' . 'ticket_id' . '}',
                ObjectSerializer::toPathValue($ticket_id),
                $resourcePath
            );
        }

        // form params
        if ($message !== null) {
            $formParams['message'] = ObjectSerializer::toFormValue($message);
        }
        // form params
        if ($display_name !== null) {
            $formParams['display_name'] = ObjectSerializer::toFormValue($display_name);
        }
        // form params
        if ($display_email !== null) {
            $formParams['display_email'] = ObjectSerializer::toFormValue($display_email);
        }
        // form params
        if ($attachments !== null) {
            $formParams['attachments[]'] = ObjectSerializer::toFormValue($attachments);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation supportCreateTicket
     *
     * Create ticket
     *
     * @param  int $department department (required)
     * @param  string $subject subject (required)
     * @param  string $message message (required)
     * @param  string $message_display_name message_display_name (required)
     * @param  string $message_display_email message_display_email (required)
     * @param  int $project project (required)
     * @param  int[] $attachments attachments (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\InlineResponse201
     */
    public function supportCreateTicket($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments)
    {
        list($response) = $this->supportCreateTicketWithHttpInfo($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments);
        return $response;
    }

    /**
     * Operation supportCreateTicketWithHttpInfo
     *
     * Create ticket
     *
     * @param  int $department (required)
     * @param  string $subject (required)
     * @param  string $message (required)
     * @param  string $message_display_name (required)
     * @param  string $message_display_email (required)
     * @param  int $project (required)
     * @param  int[] $attachments (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\InlineResponse201, HTTP status code, HTTP response headers (array of strings)
     */
    public function supportCreateTicketWithHttpInfo($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments)
    {
        $returnType = '\Tuningfiles\Model\InlineResponse201';
        $request = $this->supportCreateTicketRequest($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\InlineResponse201',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorBadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorInvalidKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supportCreateTicketAsync
     *
     * Create ticket
     *
     * @param  int $department (required)
     * @param  string $subject (required)
     * @param  string $message (required)
     * @param  string $message_display_name (required)
     * @param  string $message_display_email (required)
     * @param  int $project (required)
     * @param  int[] $attachments (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportCreateTicketAsync($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments)
    {
        return $this->supportCreateTicketAsyncWithHttpInfo($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supportCreateTicketAsyncWithHttpInfo
     *
     * Create ticket
     *
     * @param  int $department (required)
     * @param  string $subject (required)
     * @param  string $message (required)
     * @param  string $message_display_name (required)
     * @param  string $message_display_email (required)
     * @param  int $project (required)
     * @param  int[] $attachments (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportCreateTicketAsyncWithHttpInfo($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments)
    {
        $returnType = '\Tuningfiles\Model\InlineResponse201';
        $request = $this->supportCreateTicketRequest($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'supportCreateTicket'
     *
     * @param  int $department (required)
     * @param  string $subject (required)
     * @param  string $message (required)
     * @param  string $message_display_name (required)
     * @param  string $message_display_email (required)
     * @param  int $project (required)
     * @param  int[] $attachments (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supportCreateTicketRequest($department, $subject, $message, $message_display_name, $message_display_email, $project, $attachments)
    {
        // verify the required parameter 'department' is set
        if ($department === null || (is_array($department) && count($department) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $department when calling supportCreateTicket'
            );
        }
        // verify the required parameter 'subject' is set
        if ($subject === null || (is_array($subject) && count($subject) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subject when calling supportCreateTicket'
            );
        }
        // verify the required parameter 'message' is set
        if ($message === null || (is_array($message) && count($message) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $message when calling supportCreateTicket'
            );
        }
        // verify the required parameter 'message_display_name' is set
        if ($message_display_name === null || (is_array($message_display_name) && count($message_display_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $message_display_name when calling supportCreateTicket'
            );
        }
        // verify the required parameter 'message_display_email' is set
        if ($message_display_email === null || (is_array($message_display_email) && count($message_display_email) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $message_display_email when calling supportCreateTicket'
            );
        }
        // verify the required parameter 'project' is set
        if ($project === null || (is_array($project) && count($project) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project when calling supportCreateTicket'
            );
        }
        // verify the required parameter 'attachments' is set
        if ($attachments === null || (is_array($attachments) && count($attachments) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $attachments when calling supportCreateTicket'
            );
        }

        $resourcePath = '/support/tickets';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($department !== null) {
            $formParams['department'] = ObjectSerializer::toFormValue($department);
        }
        // form params
        if ($subject !== null) {
            $formParams['subject'] = ObjectSerializer::toFormValue($subject);
        }
        // form params
        if ($message !== null) {
            $formParams['message'] = ObjectSerializer::toFormValue($message);
        }
        // form params
        if ($message_display_name !== null) {
            $formParams['message_display_name'] = ObjectSerializer::toFormValue($message_display_name);
        }
        // form params
        if ($message_display_email !== null) {
            $formParams['message_display_email'] = ObjectSerializer::toFormValue($message_display_email);
        }
        // form params
        if ($project !== null) {
            $formParams['project'] = ObjectSerializer::toFormValue($project);
        }
        // form params
        if ($attachments !== null) {
            $formParams['attachments[]'] = ObjectSerializer::toFormValue($attachments);
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/x-www-form-urlencoded']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation supportListDepartments
     *
     * List support departments
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\SupportDepartments[]
     */
    public function supportListDepartments()
    {
        list($response) = $this->supportListDepartmentsWithHttpInfo();
        return $response;
    }

    /**
     * Operation supportListDepartmentsWithHttpInfo
     *
     * List support departments
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\SupportDepartments[], HTTP status code, HTTP response headers (array of strings)
     */
    public function supportListDepartmentsWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\SupportDepartments[]';
        $request = $this->supportListDepartmentsRequest();

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\SupportDepartments[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supportListDepartmentsAsync
     *
     * List support departments
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportListDepartmentsAsync()
    {
        return $this->supportListDepartmentsAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supportListDepartmentsAsyncWithHttpInfo
     *
     * List support departments
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportListDepartmentsAsyncWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\SupportDepartments[]';
        $request = $this->supportListDepartmentsRequest();

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'supportListDepartments'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supportListDepartmentsRequest()
    {

        $resourcePath = '/support/departments';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation supportListMessages
     *
     * List ticket messages
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\SupportTicketMessages[]
     */
    public function supportListMessages($ticket_id)
    {
        list($response) = $this->supportListMessagesWithHttpInfo($ticket_id);
        return $response;
    }

    /**
     * Operation supportListMessagesWithHttpInfo
     *
     * List ticket messages
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\SupportTicketMessages[], HTTP status code, HTTP response headers (array of strings)
     */
    public function supportListMessagesWithHttpInfo($ticket_id)
    {
        $returnType = '\Tuningfiles\Model\SupportTicketMessages[]';
        $request = $this->supportListMessagesRequest($ticket_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\SupportTicketMessages[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorInvalidKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\Error404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supportListMessagesAsync
     *
     * List ticket messages
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportListMessagesAsync($ticket_id)
    {
        return $this->supportListMessagesAsyncWithHttpInfo($ticket_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supportListMessagesAsyncWithHttpInfo
     *
     * List ticket messages
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportListMessagesAsyncWithHttpInfo($ticket_id)
    {
        $returnType = '\Tuningfiles\Model\SupportTicketMessages[]';
        $request = $this->supportListMessagesRequest($ticket_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'supportListMessages'
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supportListMessagesRequest($ticket_id)
    {
        // verify the required parameter 'ticket_id' is set
        if ($ticket_id === null || (is_array($ticket_id) && count($ticket_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticket_id when calling supportListMessages'
            );
        }

        $resourcePath = '/support/messages/{ticket_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($ticket_id !== null) {
            $resourcePath = str_replace(
                '{' . 'ticket_id' . '}',
                ObjectSerializer::toPathValue($ticket_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation supportListTickets
     *
     * List tickets
     *
     * @param  int $per_page Tickets per page (optional, default to 20)
     * @param  int $page Page number (optional)
     * @param  int $start_date Start date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;end_date&#x60; parameter must also be specified. (optional)
     * @param  int $end_date End date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;start_date&#x60; parameter must also be specified. (optional)
     * @param  string $filter Filter as json object: &#x60;{\&quot;key\&quot;:\&quot;value\&quot;, \&quot;key\&quot;:\&quot;value\&quot;, …}&#x60;. Allowed keys: &#x60;status&#x60;, &#x60;department&#x60;, &#x60;project&#x60; (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\SupportTickets
     */
    public function supportListTickets($per_page = '20', $page = null, $start_date = null, $end_date = null, $filter = null)
    {
        list($response) = $this->supportListTicketsWithHttpInfo($per_page, $page, $start_date, $end_date, $filter);
        return $response;
    }

    /**
     * Operation supportListTicketsWithHttpInfo
     *
     * List tickets
     *
     * @param  int $per_page Tickets per page (optional, default to 20)
     * @param  int $page Page number (optional)
     * @param  int $start_date Start date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;end_date&#x60; parameter must also be specified. (optional)
     * @param  int $end_date End date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;start_date&#x60; parameter must also be specified. (optional)
     * @param  string $filter Filter as json object: &#x60;{\&quot;key\&quot;:\&quot;value\&quot;, \&quot;key\&quot;:\&quot;value\&quot;, …}&#x60;. Allowed keys: &#x60;status&#x60;, &#x60;department&#x60;, &#x60;project&#x60; (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\SupportTickets, HTTP status code, HTTP response headers (array of strings)
     */
    public function supportListTicketsWithHttpInfo($per_page = '20', $page = null, $start_date = null, $end_date = null, $filter = null)
    {
        $returnType = '\Tuningfiles\Model\SupportTickets';
        $request = $this->supportListTicketsRequest($per_page, $page, $start_date, $end_date, $filter);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\SupportTickets',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorBadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorInvalidKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\Error404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supportListTicketsAsync
     *
     * List tickets
     *
     * @param  int $per_page Tickets per page (optional, default to 20)
     * @param  int $page Page number (optional)
     * @param  int $start_date Start date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;end_date&#x60; parameter must also be specified. (optional)
     * @param  int $end_date End date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;start_date&#x60; parameter must also be specified. (optional)
     * @param  string $filter Filter as json object: &#x60;{\&quot;key\&quot;:\&quot;value\&quot;, \&quot;key\&quot;:\&quot;value\&quot;, …}&#x60;. Allowed keys: &#x60;status&#x60;, &#x60;department&#x60;, &#x60;project&#x60; (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportListTicketsAsync($per_page = '20', $page = null, $start_date = null, $end_date = null, $filter = null)
    {
        return $this->supportListTicketsAsyncWithHttpInfo($per_page, $page, $start_date, $end_date, $filter)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supportListTicketsAsyncWithHttpInfo
     *
     * List tickets
     *
     * @param  int $per_page Tickets per page (optional, default to 20)
     * @param  int $page Page number (optional)
     * @param  int $start_date Start date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;end_date&#x60; parameter must also be specified. (optional)
     * @param  int $end_date End date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;start_date&#x60; parameter must also be specified. (optional)
     * @param  string $filter Filter as json object: &#x60;{\&quot;key\&quot;:\&quot;value\&quot;, \&quot;key\&quot;:\&quot;value\&quot;, …}&#x60;. Allowed keys: &#x60;status&#x60;, &#x60;department&#x60;, &#x60;project&#x60; (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportListTicketsAsyncWithHttpInfo($per_page = '20', $page = null, $start_date = null, $end_date = null, $filter = null)
    {
        $returnType = '\Tuningfiles\Model\SupportTickets';
        $request = $this->supportListTicketsRequest($per_page, $page, $start_date, $end_date, $filter);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'supportListTickets'
     *
     * @param  int $per_page Tickets per page (optional, default to 20)
     * @param  int $page Page number (optional)
     * @param  int $start_date Start date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;end_date&#x60; parameter must also be specified. (optional)
     * @param  int $end_date End date period. As unix timestamp in **seconds**. If this parameter is set then &#x60;start_date&#x60; parameter must also be specified. (optional)
     * @param  string $filter Filter as json object: &#x60;{\&quot;key\&quot;:\&quot;value\&quot;, \&quot;key\&quot;:\&quot;value\&quot;, …}&#x60;. Allowed keys: &#x60;status&#x60;, &#x60;department&#x60;, &#x60;project&#x60; (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supportListTicketsRequest($per_page = '20', $page = null, $start_date = null, $end_date = null, $filter = null)
    {

        $resourcePath = '/support/tickets';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($per_page !== null) {
            $queryParams['per_page'] = ObjectSerializer::toQueryValue($per_page, 'int64');
        }
        // query params
        if ($page !== null) {
            $queryParams['page'] = ObjectSerializer::toQueryValue($page, 'int64');
        }
        // query params
        if ($start_date !== null) {
            $queryParams['start_date'] = ObjectSerializer::toQueryValue($start_date, 'int64');
        }
        // query params
        if ($end_date !== null) {
            $queryParams['end_date'] = ObjectSerializer::toQueryValue($end_date, 'int64');
        }
        // query params
        if ($filter !== null) {
            $queryParams['filter'] = ObjectSerializer::toQueryValue($filter, null);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation supportReopenTicket
     *
     * Re-open ticket
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\InlineResponse201
     */
    public function supportReopenTicket($ticket_id)
    {
        list($response) = $this->supportReopenTicketWithHttpInfo($ticket_id);
        return $response;
    }

    /**
     * Operation supportReopenTicketWithHttpInfo
     *
     * Re-open ticket
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\InlineResponse201, HTTP status code, HTTP response headers (array of strings)
     */
    public function supportReopenTicketWithHttpInfo($ticket_id)
    {
        $returnType = '\Tuningfiles\Model\InlineResponse201';
        $request = $this->supportReopenTicketRequest($ticket_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\InlineResponse201',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorBadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorInvalidKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\Error404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supportReopenTicketAsync
     *
     * Re-open ticket
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportReopenTicketAsync($ticket_id)
    {
        return $this->supportReopenTicketAsyncWithHttpInfo($ticket_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supportReopenTicketAsyncWithHttpInfo
     *
     * Re-open ticket
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportReopenTicketAsyncWithHttpInfo($ticket_id)
    {
        $returnType = '\Tuningfiles\Model\InlineResponse201';
        $request = $this->supportReopenTicketRequest($ticket_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'supportReopenTicket'
     *
     * @param  string $ticket_id Tciket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supportReopenTicketRequest($ticket_id)
    {
        // verify the required parameter 'ticket_id' is set
        if ($ticket_id === null || (is_array($ticket_id) && count($ticket_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticket_id when calling supportReopenTicket'
            );
        }

        $resourcePath = '/support/tickets/reopen/{ticket_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($ticket_id !== null) {
            $resourcePath = str_replace(
                '{' . 'ticket_id' . '}',
                ObjectSerializer::toPathValue($ticket_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation supportUploadAttachment
     *
     * Upload file attachment
     *
     * @param  string $file file (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\AttachmentsUpload
     */
    public function supportUploadAttachment($file = null)
    {
        list($response) = $this->supportUploadAttachmentWithHttpInfo($file);
        return $response;
    }

    /**
     * Operation supportUploadAttachmentWithHttpInfo
     *
     * Upload file attachment
     *
     * @param  string $file (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\AttachmentsUpload, HTTP status code, HTTP response headers (array of strings)
     */
    public function supportUploadAttachmentWithHttpInfo($file = null)
    {
        $returnType = '\Tuningfiles\Model\AttachmentsUpload';
        $request = $this->supportUploadAttachmentRequest($file);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\AttachmentsUpload',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorBadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorInvalidKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\Error500',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supportUploadAttachmentAsync
     *
     * Upload file attachment
     *
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportUploadAttachmentAsync($file = null)
    {
        return $this->supportUploadAttachmentAsyncWithHttpInfo($file)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supportUploadAttachmentAsyncWithHttpInfo
     *
     * Upload file attachment
     *
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportUploadAttachmentAsyncWithHttpInfo($file = null)
    {
        $returnType = '\Tuningfiles\Model\AttachmentsUpload';
        $request = $this->supportUploadAttachmentRequest($file);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'supportUploadAttachment'
     *
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supportUploadAttachmentRequest($file = null)
    {

        $resourcePath = '/support/messages/attachment';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation supportViewTicket
     *
     * View ticket
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\InlineResponse201
     */
    public function supportViewTicket($ticket_id)
    {
        list($response) = $this->supportViewTicketWithHttpInfo($ticket_id);
        return $response;
    }

    /**
     * Operation supportViewTicketWithHttpInfo
     *
     * View ticket
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\InlineResponse201, HTTP status code, HTTP response headers (array of strings)
     */
    public function supportViewTicketWithHttpInfo($ticket_id)
    {
        $returnType = '\Tuningfiles\Model\InlineResponse201';
        $request = $this->supportViewTicketRequest($ticket_id);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\InlineResponse201',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorBadRequest',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\ErrorInvalidKey',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Tuningfiles\Model\Error404',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supportViewTicketAsync
     *
     * View ticket
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportViewTicketAsync($ticket_id)
    {
        return $this->supportViewTicketAsyncWithHttpInfo($ticket_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supportViewTicketAsyncWithHttpInfo
     *
     * View ticket
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supportViewTicketAsyncWithHttpInfo($ticket_id)
    {
        $returnType = '\Tuningfiles\Model\InlineResponse201';
        $request = $this->supportViewTicketRequest($ticket_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'supportViewTicket'
     *
     * @param  string $ticket_id Ticket ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supportViewTicketRequest($ticket_id)
    {
        // verify the required parameter 'ticket_id' is set
        if ($ticket_id === null || (is_array($ticket_id) && count($ticket_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ticket_id when calling supportViewTicket'
            );
        }

        $resourcePath = '/support/tickets/{ticket_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($ticket_id !== null) {
            $resourcePath = str_replace(
                '{' . 'ticket_id' . '}',
                ObjectSerializer::toPathValue($ticket_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('x-api-key');
        if ($apiKey !== null) {
            $headers['x-api-key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
