<?php
/**
 * TuningApi
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
 * Welcome to the TuningFiles API documentation.  # Language  All API methods accept language parameter, which can be set via the `X-LANG` custom header. Content of the header should be the code of the language you are requesting.  Available languages:    * English (`en`)   * Chinese traditional (`zh-hant`)   * Chinese simplified (`zh-hans`)   * Russian (`ru`)   * Norwegian Bokmål (`nb`)   * Latvian (`lv`)   * Lithuanian (`lt`)   * Croatian (`hr`)   * Spanish (`es`)  Set language to English: ``` curl -X GET \"https://api.tuningfiles.com/method\" -H \"x-lang: en\" ```  # Errors If there is an error, API will return appropriate error code and message like so:  ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  HTTP status code will be the same as the error code. In the case above, returned http status code will be 404.   Failed API authentication: ```json {   \"error\": {     \"code\": 403,     \"message\": \"Invalid API key\"   } } ```  API Key doesn't have enough permissions to access requested resource (some API methods require a paid subscription): ```json {   \"error\": {     \"code\": 401,     \"message\": \"This API key does not have enough permissions\"   } } ```  Not found: ```json {   \"error\": {     \"code\": 404,     \"message\": \"Resource doesn't exist\"   } } ```  Bad request: ```json {   \"error\": {     \"code\": 400,     \"message\": \"Bad request / Wrong parameters\"   } } ```  Server error: ```json {   \"error\": {     \"code\": 500,     \"message\": \"Internal server error\"   } } ``` # Rate limits To protect from flood and abuse, this API implements rate limiting. Currently, only requests made to the Vehicle Database REST API are limited. All the requests made to the File Tuning REST API are not rate-limited (this may change in the future).  **Vehicle Database REST API limits:**   - All methods: *3600 calls/hour*  **File Tuning REST API limits:**   - All methods: *no limits*  **Support REST API limits:**   - All methods: *3600 calls/hour*    Limits are per API Key and are reset every hour. If your app hits those limits, API will return error code `429` with message `This API key has reached the time limit for this method`        # Webhooks You can use webhook to receive notifications about particular events. When you enable webhook in your [API settings page](https://app.tuningfiles.com/api), you can let your app execute code immediately after specific events occur, instead of having to make API calls periodically. For example, you can rely on webhooks to trigger an action in your app when project is created, it's status is updated or when file is purchased.  Webhook notification is using `POST` as http request method and contains a JSON payload, and HTTP headers that provide context.      For example, when project is created, webhook will contains the following headers:    **X-TF-EVENT**: project_create     **X-TF-HMAC-SHA256**: aV95gkmXR75CFvdeIn9DwOmpTCBndDqo/70uJWiYtaY=    and JSON body:   ```   {     \"id\": 146356,     \"uuid\": \"07b2402b-00cd-4d61-9bc4-13b85a1849fb\",     \"name\": \"Audi A3 8P 2.0 TDI 136hp 320Nm 2017\",      \"status\": \"Waiting\",     \"status_code\": 0,     ...     \"files\": [       {         \"id\": 246810,         \"uuid\": \"3dbb36a1-d50f-4327-8100-83a8c2f1b869\",         \"project\": 146356,         \"type\": \"Original\",         ...       }     ]   }   ```    ## Headers Webhook notifications are using following custom http headers:      `X-TF-EVENT`: Event which triggered this webhook     `X-TF-HMAC-SHA256`: Webhook verification hash  ## Events Each webhook will contain `X-TF-EVENT` header. This header represents the event which triggered this webhook.  File Tuning REST API event types:   - `project_create` - Project is created. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    - `project_update` - Project is updated. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)   - `file_purchase` - File is purchased. JSON body will contain the full project and it's file(s) object(s) as [follows.](#operation/project_view)    Support REST API event types:   - `ticket_created` - Support request (ticket) was created. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_opened` - Support request (ticket) status was set to \"Opened\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_reopened` - Support request (ticket) status was set to \"Opened\". This event is triggered when a \"closed\" ticket has been re-opened again. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_answered` - Support request (ticket) status was set to \"Answered\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `ticket_closed` - Support request (ticket) status was set to \"Closed\". JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)   - `message_created` - Triggered when a new message (reply) is added into the ticket. JSON body will contain the full ticket and it's messages metadata as [follows.](#operation/support_view_ticket)    ## Verification To allow a client to verify a webhook message has in fact come from TuningFiles, an `X-TF-HMAC-SHA256` header is included in each webhook POST message. The contents of this header is the Base64 encoded output of the HMAC SHA256 encoding of the JSON body of the message, using your API Secret as the encryption key.   Following psuedo PHP example shows how we generate the `X-TF-HMAC-SHA256` value: ```php   base64_encode(hash_hmac('sha256', $webhook_json, $your_api_secret, true)); ```  To verify the authenticity of the webhook message, you should calculate this value yourself and verify it equals the value contained in the header. # SDKs TuningFiles offers a PHP SDK to help interact with the API.  However, no SDK is required to use the API. ## PHP SDK [PHP SDK](https://github.com/sedox/tuningfiles-php-sdk) is hosted on [Github](https://github.com/sedox/tuningfiles-php-sdk). For all PHP SDK examples provided in these docs you will need to configure the `$apiInstance`. You may do it like this:   - For Vehicle Database API:      ```php       $apiInstance = new Tuningfiles\\Api\\VehicleDatabaseApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```    - For Tuning API:          ```php       $apiInstance = new Tuningfiles\\Api\\TuningApi(         new GuzzleHttp\\Client(['timeout' => 6.0, 'connect_timeout' => 6.0]),         Tuningfiles\\Configuration::getDefaultConfiguration()->setApiKey('x-api-key', 'YOUR_API_KEY')       );     ```
 *
 * OpenAPI spec version: 1.2.3
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
 * TuningApi Class Doc Comment
 *
 * @category Class
 * @package  Tuningfiles
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TuningApi
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
     * Operation attachmentUpload
     *
     * Upload attachment
     *
     * @param  string $file file (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\AttachmentsUpload
     */
    public function attachmentUpload($file = null)
    {
        list($response) = $this->attachmentUploadWithHttpInfo($file);
        return $response;
    }

    /**
     * Operation attachmentUploadWithHttpInfo
     *
     * Upload attachment
     *
     * @param  string $file (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\AttachmentsUpload, HTTP status code, HTTP response headers (array of strings)
     */
    public function attachmentUploadWithHttpInfo($file = null)
    {
        $returnType = '\Tuningfiles\Model\AttachmentsUpload';
        $request = $this->attachmentUploadRequest($file);

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
     * Operation attachmentUploadAsync
     *
     * Upload attachment
     *
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function attachmentUploadAsync($file = null)
    {
        return $this->attachmentUploadAsyncWithHttpInfo($file)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation attachmentUploadAsyncWithHttpInfo
     *
     * Upload attachment
     *
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function attachmentUploadAsyncWithHttpInfo($file = null)
    {
        $returnType = '\Tuningfiles\Model\AttachmentsUpload';
        $request = $this->attachmentUploadRequest($file);

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
     * Create request for operation 'attachmentUpload'
     *
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function attachmentUploadRequest($file = null)
    {

        $resourcePath = '/attachments/upload';
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
     * Operation creditsAmount
     *
     * Get available credits amount
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\CreditsAmount
     */
    public function creditsAmount()
    {
        list($response) = $this->creditsAmountWithHttpInfo();
        return $response;
    }

    /**
     * Operation creditsAmountWithHttpInfo
     *
     * Get available credits amount
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\CreditsAmount, HTTP status code, HTTP response headers (array of strings)
     */
    public function creditsAmountWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\CreditsAmount';
        $request = $this->creditsAmountRequest();

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
                        '\Tuningfiles\Model\CreditsAmount',
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
     * Operation creditsAmountAsync
     *
     * Get available credits amount
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function creditsAmountAsync()
    {
        return $this->creditsAmountAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation creditsAmountAsyncWithHttpInfo
     *
     * Get available credits amount
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function creditsAmountAsyncWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\CreditsAmount';
        $request = $this->creditsAmountRequest();

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
     * Create request for operation 'creditsAmount'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function creditsAmountRequest()
    {

        $resourcePath = '/credits/amount';
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
     * Operation fileDownload
     *
     * Download file
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\DownloadFile
     */
    public function fileDownload($file_id, $project_id)
    {
        list($response) = $this->fileDownloadWithHttpInfo($file_id, $project_id);
        return $response;
    }

    /**
     * Operation fileDownloadWithHttpInfo
     *
     * Download file
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\DownloadFile, HTTP status code, HTTP response headers (array of strings)
     */
    public function fileDownloadWithHttpInfo($file_id, $project_id)
    {
        $returnType = '\Tuningfiles\Model\DownloadFile';
        $request = $this->fileDownloadRequest($file_id, $project_id);

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
                        '\Tuningfiles\Model\DownloadFile',
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
     * Operation fileDownloadAsync
     *
     * Download file
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function fileDownloadAsync($file_id, $project_id)
    {
        return $this->fileDownloadAsyncWithHttpInfo($file_id, $project_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation fileDownloadAsyncWithHttpInfo
     *
     * Download file
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function fileDownloadAsyncWithHttpInfo($file_id, $project_id)
    {
        $returnType = '\Tuningfiles\Model\DownloadFile';
        $request = $this->fileDownloadRequest($file_id, $project_id);

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
     * Create request for operation 'fileDownload'
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function fileDownloadRequest($file_id, $project_id)
    {
        // verify the required parameter 'file_id' is set
        if ($file_id === null || (is_array($file_id) && count($file_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file_id when calling fileDownload'
            );
        }
        // verify the required parameter 'project_id' is set
        if ($project_id === null || (is_array($project_id) && count($project_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_id when calling fileDownload'
            );
        }

        $resourcePath = '/files/download/{file_id}/{project_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($file_id !== null) {
            $resourcePath = str_replace(
                '{' . 'file_id' . '}',
                ObjectSerializer::toPathValue($file_id),
                $resourcePath
            );
        }
        // path params
        if ($project_id !== null) {
            $resourcePath = str_replace(
                '{' . 'project_id' . '}',
                ObjectSerializer::toPathValue($project_id),
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
     * Operation filePurchase
     *
     * Purchase file
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\FilesPurchase
     */
    public function filePurchase($file_id, $project_id)
    {
        list($response) = $this->filePurchaseWithHttpInfo($file_id, $project_id);
        return $response;
    }

    /**
     * Operation filePurchaseWithHttpInfo
     *
     * Purchase file
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\FilesPurchase, HTTP status code, HTTP response headers (array of strings)
     */
    public function filePurchaseWithHttpInfo($file_id, $project_id)
    {
        $returnType = '\Tuningfiles\Model\FilesPurchase';
        $request = $this->filePurchaseRequest($file_id, $project_id);

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
                        '\Tuningfiles\Model\FilesPurchase',
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
     * Operation filePurchaseAsync
     *
     * Purchase file
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function filePurchaseAsync($file_id, $project_id)
    {
        return $this->filePurchaseAsyncWithHttpInfo($file_id, $project_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation filePurchaseAsyncWithHttpInfo
     *
     * Purchase file
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function filePurchaseAsyncWithHttpInfo($file_id, $project_id)
    {
        $returnType = '\Tuningfiles\Model\FilesPurchase';
        $request = $this->filePurchaseRequest($file_id, $project_id);

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
     * Create request for operation 'filePurchase'
     *
     * @param  int $file_id File ID (required)
     * @param  int $project_id Project ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function filePurchaseRequest($file_id, $project_id)
    {
        // verify the required parameter 'file_id' is set
        if ($file_id === null || (is_array($file_id) && count($file_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file_id when calling filePurchase'
            );
        }
        // verify the required parameter 'project_id' is set
        if ($project_id === null || (is_array($project_id) && count($project_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_id when calling filePurchase'
            );
        }

        $resourcePath = '/files/purchase/{file_id}/{project_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($file_id !== null) {
            $resourcePath = str_replace(
                '{' . 'file_id' . '}',
                ObjectSerializer::toPathValue($file_id),
                $resourcePath
            );
        }
        // path params
        if ($project_id !== null) {
            $resourcePath = str_replace(
                '{' . 'project_id' . '}',
                ObjectSerializer::toPathValue($project_id),
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
     * Operation fileUpload
     *
     * Upload original file
     *
     * @param  string $file file (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\FilesUpload
     */
    public function fileUpload($file = null)
    {
        list($response) = $this->fileUploadWithHttpInfo($file);
        return $response;
    }

    /**
     * Operation fileUploadWithHttpInfo
     *
     * Upload original file
     *
     * @param  string $file (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\FilesUpload, HTTP status code, HTTP response headers (array of strings)
     */
    public function fileUploadWithHttpInfo($file = null)
    {
        $returnType = '\Tuningfiles\Model\FilesUpload';
        $request = $this->fileUploadRequest($file);

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
                        '\Tuningfiles\Model\FilesUpload',
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
     * Operation fileUploadAsync
     *
     * Upload original file
     *
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function fileUploadAsync($file = null)
    {
        return $this->fileUploadAsyncWithHttpInfo($file)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation fileUploadAsyncWithHttpInfo
     *
     * Upload original file
     *
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function fileUploadAsyncWithHttpInfo($file = null)
    {
        $returnType = '\Tuningfiles\Model\FilesUpload';
        $request = $this->fileUploadRequest($file);

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
     * Create request for operation 'fileUpload'
     *
     * @param  string $file (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function fileUploadRequest($file = null)
    {

        $resourcePath = '/files/upload';
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
     * Operation notificationChannelsList
     *
     * List notification channels
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\NotificationChannel[]
     */
    public function notificationChannelsList()
    {
        list($response) = $this->notificationChannelsListWithHttpInfo();
        return $response;
    }

    /**
     * Operation notificationChannelsListWithHttpInfo
     *
     * List notification channels
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\NotificationChannel[], HTTP status code, HTTP response headers (array of strings)
     */
    public function notificationChannelsListWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\NotificationChannel[]';
        $request = $this->notificationChannelsListRequest();

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
                        '\Tuningfiles\Model\NotificationChannel[]',
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
     * Operation notificationChannelsListAsync
     *
     * List notification channels
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationChannelsListAsync()
    {
        return $this->notificationChannelsListAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation notificationChannelsListAsyncWithHttpInfo
     *
     * List notification channels
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationChannelsListAsyncWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\NotificationChannel[]';
        $request = $this->notificationChannelsListRequest();

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
     * Create request for operation 'notificationChannelsList'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function notificationChannelsListRequest()
    {

        $resourcePath = '/notification-channels';
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
     * Operation projectView
     *
     * View project
     *
     * @param  int $project_id Project ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\Project
     */
    public function projectView($project_id)
    {
        list($response) = $this->projectViewWithHttpInfo($project_id);
        return $response;
    }

    /**
     * Operation projectViewWithHttpInfo
     *
     * View project
     *
     * @param  int $project_id Project ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\Project, HTTP status code, HTTP response headers (array of strings)
     */
    public function projectViewWithHttpInfo($project_id)
    {
        $returnType = '\Tuningfiles\Model\Project';
        $request = $this->projectViewRequest($project_id);

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
                        '\Tuningfiles\Model\Project',
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
     * Operation projectViewAsync
     *
     * View project
     *
     * @param  int $project_id Project ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function projectViewAsync($project_id)
    {
        return $this->projectViewAsyncWithHttpInfo($project_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation projectViewAsyncWithHttpInfo
     *
     * View project
     *
     * @param  int $project_id Project ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function projectViewAsyncWithHttpInfo($project_id)
    {
        $returnType = '\Tuningfiles\Model\Project';
        $request = $this->projectViewRequest($project_id);

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
     * Create request for operation 'projectView'
     *
     * @param  int $project_id Project ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function projectViewRequest($project_id)
    {
        // verify the required parameter 'project_id' is set
        if ($project_id === null || (is_array($project_id) && count($project_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $project_id when calling projectView'
            );
        }

        $resourcePath = '/projects/view/{project_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($project_id !== null) {
            $resourcePath = str_replace(
                '{' . 'project_id' . '}',
                ObjectSerializer::toPathValue($project_id),
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
     * Operation projectsCreate
     *
     * Create project
     *
     * @param  int $ecu1_file ecu1_file (required)
     * @param  string $ecu1_label ecu1_label (required)
     * @param  int $ecu2_file ecu2_file (required)
     * @param  string $ecu2_label ecu2_label (required)
     * @param  int $vehicle_type_id vehicle_type_id (required)
     * @param  int $vehicle_manufacturer_id vehicle_manufacturer_id (required)
     * @param  int $vehicle_model_id vehicle_model_id (required)
     * @param  string $vehicle_model vehicle_model (required)
     * @param  int $vehicle_generation_id vehicle_generation_id (required)
     * @param  string $vehicle_generation vehicle_generation (required)
     * @param  string $vehicle_engine vehicle_engine (required)
     * @param  int $vehicle_engine_id vehicle_engine_id (required)
     * @param  int $vehicle_year vehicle_year (required)
     * @param  int $vehicle_gearbox vehicle_gearbox (required)
     * @param  string $vehicle_ecu vehicle_ecu (required)
     * @param  string $hardware_number hardware_number (required)
     * @param  string $software_number software_number (required)
     * @param  string $read_tool read_tool (required)
     * @param  int $remap remap (required)
     * @param  int[] $addons addons (required)
     * @param  string[] $dtc_codes dtc_codes (required)
     * @param  int[] $notification_channel notification_channel (required)
     * @param  int $file_attachment file_attachment (required)
     * @param  string $ref ref (required)
     * @param  string $customer_comment customer_comment (required)
     * @param  map[string,string] $metadata metadata (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\Projects
     */
    public function projectsCreate($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment, $metadata)
    {
        list($response) = $this->projectsCreateWithHttpInfo($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment, $metadata);
        return $response;
    }

    /**
     * Operation projectsCreateWithHttpInfo
     *
     * Create project
     *
     * @param  int $ecu1_file (required)
     * @param  string $ecu1_label (required)
     * @param  int $ecu2_file (required)
     * @param  string $ecu2_label (required)
     * @param  int $vehicle_type_id (required)
     * @param  int $vehicle_manufacturer_id (required)
     * @param  int $vehicle_model_id (required)
     * @param  string $vehicle_model (required)
     * @param  int $vehicle_generation_id (required)
     * @param  string $vehicle_generation (required)
     * @param  string $vehicle_engine (required)
     * @param  int $vehicle_engine_id (required)
     * @param  int $vehicle_year (required)
     * @param  int $vehicle_gearbox (required)
     * @param  string $vehicle_ecu (required)
     * @param  string $hardware_number (required)
     * @param  string $software_number (required)
     * @param  string $read_tool (required)
     * @param  int $remap (required)
     * @param  int[] $addons (required)
     * @param  string[] $dtc_codes (required)
     * @param  int[] $notification_channel (required)
     * @param  int $file_attachment (required)
     * @param  string $ref (required)
     * @param  string $customer_comment (required)
     * @param  map[string,string] $metadata (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\Projects, HTTP status code, HTTP response headers (array of strings)
     */
    public function projectsCreateWithHttpInfo($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment, $metadata)
    {
        $returnType = '\Tuningfiles\Model\Projects';
        $request = $this->projectsCreateRequest($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment, $metadata);

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
                        '\Tuningfiles\Model\Projects',
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
     * Operation projectsCreateAsync
     *
     * Create project
     *
     * @param  int $ecu1_file (required)
     * @param  string $ecu1_label (required)
     * @param  int $ecu2_file (required)
     * @param  string $ecu2_label (required)
     * @param  int $vehicle_type_id (required)
     * @param  int $vehicle_manufacturer_id (required)
     * @param  int $vehicle_model_id (required)
     * @param  string $vehicle_model (required)
     * @param  int $vehicle_generation_id (required)
     * @param  string $vehicle_generation (required)
     * @param  string $vehicle_engine (required)
     * @param  int $vehicle_engine_id (required)
     * @param  int $vehicle_year (required)
     * @param  int $vehicle_gearbox (required)
     * @param  string $vehicle_ecu (required)
     * @param  string $hardware_number (required)
     * @param  string $software_number (required)
     * @param  string $read_tool (required)
     * @param  int $remap (required)
     * @param  int[] $addons (required)
     * @param  string[] $dtc_codes (required)
     * @param  int[] $notification_channel (required)
     * @param  int $file_attachment (required)
     * @param  string $ref (required)
     * @param  string $customer_comment (required)
     * @param  map[string,string] $metadata (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function projectsCreateAsync($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment, $metadata)
    {
        return $this->projectsCreateAsyncWithHttpInfo($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment, $metadata)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation projectsCreateAsyncWithHttpInfo
     *
     * Create project
     *
     * @param  int $ecu1_file (required)
     * @param  string $ecu1_label (required)
     * @param  int $ecu2_file (required)
     * @param  string $ecu2_label (required)
     * @param  int $vehicle_type_id (required)
     * @param  int $vehicle_manufacturer_id (required)
     * @param  int $vehicle_model_id (required)
     * @param  string $vehicle_model (required)
     * @param  int $vehicle_generation_id (required)
     * @param  string $vehicle_generation (required)
     * @param  string $vehicle_engine (required)
     * @param  int $vehicle_engine_id (required)
     * @param  int $vehicle_year (required)
     * @param  int $vehicle_gearbox (required)
     * @param  string $vehicle_ecu (required)
     * @param  string $hardware_number (required)
     * @param  string $software_number (required)
     * @param  string $read_tool (required)
     * @param  int $remap (required)
     * @param  int[] $addons (required)
     * @param  string[] $dtc_codes (required)
     * @param  int[] $notification_channel (required)
     * @param  int $file_attachment (required)
     * @param  string $ref (required)
     * @param  string $customer_comment (required)
     * @param  map[string,string] $metadata (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function projectsCreateAsyncWithHttpInfo($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment, $metadata)
    {
        $returnType = '\Tuningfiles\Model\Projects';
        $request = $this->projectsCreateRequest($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment, $metadata);

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
     * Create request for operation 'projectsCreate'
     *
     * @param  int $ecu1_file (required)
     * @param  string $ecu1_label (required)
     * @param  int $ecu2_file (required)
     * @param  string $ecu2_label (required)
     * @param  int $vehicle_type_id (required)
     * @param  int $vehicle_manufacturer_id (required)
     * @param  int $vehicle_model_id (required)
     * @param  string $vehicle_model (required)
     * @param  int $vehicle_generation_id (required)
     * @param  string $vehicle_generation (required)
     * @param  string $vehicle_engine (required)
     * @param  int $vehicle_engine_id (required)
     * @param  int $vehicle_year (required)
     * @param  int $vehicle_gearbox (required)
     * @param  string $vehicle_ecu (required)
     * @param  string $hardware_number (required)
     * @param  string $software_number (required)
     * @param  string $read_tool (required)
     * @param  int $remap (required)
     * @param  int[] $addons (required)
     * @param  string[] $dtc_codes (required)
     * @param  int[] $notification_channel (required)
     * @param  int $file_attachment (required)
     * @param  string $ref (required)
     * @param  string $customer_comment (required)
     * @param  map[string,string] $metadata (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function projectsCreateRequest($ecu1_file, $ecu1_label, $ecu2_file, $ecu2_label, $vehicle_type_id, $vehicle_manufacturer_id, $vehicle_model_id, $vehicle_model, $vehicle_generation_id, $vehicle_generation, $vehicle_engine, $vehicle_engine_id, $vehicle_year, $vehicle_gearbox, $vehicle_ecu, $hardware_number, $software_number, $read_tool, $remap, $addons, $dtc_codes, $notification_channel, $file_attachment, $ref, $customer_comment, $metadata)
    {
        // verify the required parameter 'ecu1_file' is set
        if ($ecu1_file === null || (is_array($ecu1_file) && count($ecu1_file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ecu1_file when calling projectsCreate'
            );
        }
        // verify the required parameter 'ecu1_label' is set
        if ($ecu1_label === null || (is_array($ecu1_label) && count($ecu1_label) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ecu1_label when calling projectsCreate'
            );
        }
        // verify the required parameter 'ecu2_file' is set
        if ($ecu2_file === null || (is_array($ecu2_file) && count($ecu2_file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ecu2_file when calling projectsCreate'
            );
        }
        // verify the required parameter 'ecu2_label' is set
        if ($ecu2_label === null || (is_array($ecu2_label) && count($ecu2_label) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ecu2_label when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_type_id' is set
        if ($vehicle_type_id === null || (is_array($vehicle_type_id) && count($vehicle_type_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_type_id when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_manufacturer_id' is set
        if ($vehicle_manufacturer_id === null || (is_array($vehicle_manufacturer_id) && count($vehicle_manufacturer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_manufacturer_id when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_model_id' is set
        if ($vehicle_model_id === null || (is_array($vehicle_model_id) && count($vehicle_model_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_model_id when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_model' is set
        if ($vehicle_model === null || (is_array($vehicle_model) && count($vehicle_model) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_model when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_generation_id' is set
        if ($vehicle_generation_id === null || (is_array($vehicle_generation_id) && count($vehicle_generation_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_generation_id when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_generation' is set
        if ($vehicle_generation === null || (is_array($vehicle_generation) && count($vehicle_generation) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_generation when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_engine' is set
        if ($vehicle_engine === null || (is_array($vehicle_engine) && count($vehicle_engine) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_engine when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_engine_id' is set
        if ($vehicle_engine_id === null || (is_array($vehicle_engine_id) && count($vehicle_engine_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_engine_id when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_year' is set
        if ($vehicle_year === null || (is_array($vehicle_year) && count($vehicle_year) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_year when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_gearbox' is set
        if ($vehicle_gearbox === null || (is_array($vehicle_gearbox) && count($vehicle_gearbox) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_gearbox when calling projectsCreate'
            );
        }
        // verify the required parameter 'vehicle_ecu' is set
        if ($vehicle_ecu === null || (is_array($vehicle_ecu) && count($vehicle_ecu) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_ecu when calling projectsCreate'
            );
        }
        // verify the required parameter 'hardware_number' is set
        if ($hardware_number === null || (is_array($hardware_number) && count($hardware_number) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $hardware_number when calling projectsCreate'
            );
        }
        // verify the required parameter 'software_number' is set
        if ($software_number === null || (is_array($software_number) && count($software_number) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $software_number when calling projectsCreate'
            );
        }
        // verify the required parameter 'read_tool' is set
        if ($read_tool === null || (is_array($read_tool) && count($read_tool) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $read_tool when calling projectsCreate'
            );
        }
        // verify the required parameter 'remap' is set
        if ($remap === null || (is_array($remap) && count($remap) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $remap when calling projectsCreate'
            );
        }
        // verify the required parameter 'addons' is set
        if ($addons === null || (is_array($addons) && count($addons) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $addons when calling projectsCreate'
            );
        }
        // verify the required parameter 'dtc_codes' is set
        if ($dtc_codes === null || (is_array($dtc_codes) && count($dtc_codes) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dtc_codes when calling projectsCreate'
            );
        }
        // verify the required parameter 'notification_channel' is set
        if ($notification_channel === null || (is_array($notification_channel) && count($notification_channel) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $notification_channel when calling projectsCreate'
            );
        }
        // verify the required parameter 'file_attachment' is set
        if ($file_attachment === null || (is_array($file_attachment) && count($file_attachment) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file_attachment when calling projectsCreate'
            );
        }
        // verify the required parameter 'ref' is set
        if ($ref === null || (is_array($ref) && count($ref) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $ref when calling projectsCreate'
            );
        }
        // verify the required parameter 'customer_comment' is set
        if ($customer_comment === null || (is_array($customer_comment) && count($customer_comment) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $customer_comment when calling projectsCreate'
            );
        }
        // verify the required parameter 'metadata' is set
        if ($metadata === null || (is_array($metadata) && count($metadata) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $metadata when calling projectsCreate'
            );
        }

        $resourcePath = '/projects';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($ecu1_file !== null) {
            $formParams['ecu1-file'] = ObjectSerializer::toFormValue($ecu1_file);
        }
        // form params
        if ($ecu1_label !== null) {
            $formParams['ecu1-label'] = ObjectSerializer::toFormValue($ecu1_label);
        }
        // form params
        if ($ecu2_file !== null) {
            $formParams['ecu2-file'] = ObjectSerializer::toFormValue($ecu2_file);
        }
        // form params
        if ($ecu2_label !== null) {
            $formParams['ecu2-label'] = ObjectSerializer::toFormValue($ecu2_label);
        }
        // form params
        if ($vehicle_type_id !== null) {
            $formParams['vehicle-type-id'] = ObjectSerializer::toFormValue($vehicle_type_id);
        }
        // form params
        if ($vehicle_manufacturer_id !== null) {
            $formParams['vehicle-manufacturer-id'] = ObjectSerializer::toFormValue($vehicle_manufacturer_id);
        }
        // form params
        if ($vehicle_model_id !== null) {
            $formParams['vehicle-model-id'] = ObjectSerializer::toFormValue($vehicle_model_id);
        }
        // form params
        if ($vehicle_model !== null) {
            $formParams['vehicle-model'] = ObjectSerializer::toFormValue($vehicle_model);
        }
        // form params
        if ($vehicle_generation_id !== null) {
            $formParams['vehicle-generation-id'] = ObjectSerializer::toFormValue($vehicle_generation_id);
        }
        // form params
        if ($vehicle_generation !== null) {
            $formParams['vehicle-generation'] = ObjectSerializer::toFormValue($vehicle_generation);
        }
        // form params
        if ($vehicle_engine !== null) {
            $formParams['vehicle-engine'] = ObjectSerializer::toFormValue($vehicle_engine);
        }
        // form params
        if ($vehicle_engine_id !== null) {
            $formParams['vehicle-engine-id'] = ObjectSerializer::toFormValue($vehicle_engine_id);
        }
        // form params
        if ($vehicle_year !== null) {
            $formParams['vehicle-year'] = ObjectSerializer::toFormValue($vehicle_year);
        }
        // form params
        if ($vehicle_gearbox !== null) {
            $formParams['vehicle-gearbox'] = ObjectSerializer::toFormValue($vehicle_gearbox);
        }
        // form params
        if ($vehicle_ecu !== null) {
            $formParams['vehicle-ecu'] = ObjectSerializer::toFormValue($vehicle_ecu);
        }
        // form params
        if ($hardware_number !== null) {
            $formParams['hardware-number'] = ObjectSerializer::toFormValue($hardware_number);
        }
        // form params
        if ($software_number !== null) {
            $formParams['software-number'] = ObjectSerializer::toFormValue($software_number);
        }
        // form params
        if ($read_tool !== null) {
            $formParams['read-tool'] = ObjectSerializer::toFormValue($read_tool);
        }
        // form params
        if ($remap !== null) {
            $formParams['remap'] = ObjectSerializer::toFormValue($remap);
        }
        // form params
        if ($addons !== null) {
            $formParams['addons[]'] = ObjectSerializer::toFormValue($addons);
        }
        // form params
        if ($dtc_codes !== null) {
            $formParams['dtc-codes[]'] = ObjectSerializer::toFormValue($dtc_codes);
        }
        // form params
        if ($notification_channel !== null) {
            $formParams['notification-channel[]'] = ObjectSerializer::toFormValue($notification_channel);
        }
        // form params
        if ($file_attachment !== null) {
            $formParams['file-attachment'] = ObjectSerializer::toFormValue($file_attachment);
        }
        // form params
        if ($ref !== null) {
            $formParams['ref'] = ObjectSerializer::toFormValue($ref);
        }
        // form params
        if ($customer_comment !== null) {
            $formParams['customer-comment'] = ObjectSerializer::toFormValue($customer_comment);
        }
        // form params
        if ($metadata !== null) {
            $formParams['metadata'] = ObjectSerializer::toFormValue($metadata);
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
     * Operation projectsList
     *
     * List projects
     *
     * @param  int $per_page Projects per page (optional, default to 20)
     * @param  int $page Page number (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\Projects
     */
    public function projectsList($per_page = '20', $page = null)
    {
        list($response) = $this->projectsListWithHttpInfo($per_page, $page);
        return $response;
    }

    /**
     * Operation projectsListWithHttpInfo
     *
     * List projects
     *
     * @param  int $per_page Projects per page (optional, default to 20)
     * @param  int $page Page number (optional)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\Projects, HTTP status code, HTTP response headers (array of strings)
     */
    public function projectsListWithHttpInfo($per_page = '20', $page = null)
    {
        $returnType = '\Tuningfiles\Model\Projects';
        $request = $this->projectsListRequest($per_page, $page);

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
                        '\Tuningfiles\Model\Projects',
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
     * Operation projectsListAsync
     *
     * List projects
     *
     * @param  int $per_page Projects per page (optional, default to 20)
     * @param  int $page Page number (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function projectsListAsync($per_page = '20', $page = null)
    {
        return $this->projectsListAsyncWithHttpInfo($per_page, $page)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation projectsListAsyncWithHttpInfo
     *
     * List projects
     *
     * @param  int $per_page Projects per page (optional, default to 20)
     * @param  int $page Page number (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function projectsListAsyncWithHttpInfo($per_page = '20', $page = null)
    {
        $returnType = '\Tuningfiles\Model\Projects';
        $request = $this->projectsListRequest($per_page, $page);

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
     * Create request for operation 'projectsList'
     *
     * @param  int $per_page Projects per page (optional, default to 20)
     * @param  int $page Page number (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function projectsListRequest($per_page = '20', $page = null)
    {

        $resourcePath = '/projects';
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
     * Operation readToolsList
     *
     * List available read tools
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\VehicleReadTool[]
     */
    public function readToolsList()
    {
        list($response) = $this->readToolsListWithHttpInfo();
        return $response;
    }

    /**
     * Operation readToolsListWithHttpInfo
     *
     * List available read tools
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\VehicleReadTool[], HTTP status code, HTTP response headers (array of strings)
     */
    public function readToolsListWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\VehicleReadTool[]';
        $request = $this->readToolsListRequest();

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
                        '\Tuningfiles\Model\VehicleReadTool[]',
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
     * Operation readToolsListAsync
     *
     * List available read tools
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readToolsListAsync()
    {
        return $this->readToolsListAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation readToolsListAsyncWithHttpInfo
     *
     * List available read tools
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function readToolsListAsyncWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\VehicleReadTool[]';
        $request = $this->readToolsListRequest();

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
     * Create request for operation 'readToolsList'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function readToolsListRequest()
    {

        $resourcePath = '/vehicles/read-tools';
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
     * Operation remapsList
     *
     * List available remaps
     *
     * @param  int $vehicle_type_id Vehicle type (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\Remap[]
     */
    public function remapsList($vehicle_type_id)
    {
        list($response) = $this->remapsListWithHttpInfo($vehicle_type_id);
        return $response;
    }

    /**
     * Operation remapsListWithHttpInfo
     *
     * List available remaps
     *
     * @param  int $vehicle_type_id Vehicle type (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\Remap[], HTTP status code, HTTP response headers (array of strings)
     */
    public function remapsListWithHttpInfo($vehicle_type_id)
    {
        $returnType = '\Tuningfiles\Model\Remap[]';
        $request = $this->remapsListRequest($vehicle_type_id);

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
                        '\Tuningfiles\Model\Remap[]',
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
     * Operation remapsListAsync
     *
     * List available remaps
     *
     * @param  int $vehicle_type_id Vehicle type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function remapsListAsync($vehicle_type_id)
    {
        return $this->remapsListAsyncWithHttpInfo($vehicle_type_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation remapsListAsyncWithHttpInfo
     *
     * List available remaps
     *
     * @param  int $vehicle_type_id Vehicle type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function remapsListAsyncWithHttpInfo($vehicle_type_id)
    {
        $returnType = '\Tuningfiles\Model\Remap[]';
        $request = $this->remapsListRequest($vehicle_type_id);

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
     * Create request for operation 'remapsList'
     *
     * @param  int $vehicle_type_id Vehicle type (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function remapsListRequest($vehicle_type_id)
    {
        // verify the required parameter 'vehicle_type_id' is set
        if ($vehicle_type_id === null || (is_array($vehicle_type_id) && count($vehicle_type_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_type_id when calling remapsList'
            );
        }

        $resourcePath = '/vehicles/remaps/{vehicle_type_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($vehicle_type_id !== null) {
            $resourcePath = str_replace(
                '{' . 'vehicle_type_id' . '}',
                ObjectSerializer::toPathValue($vehicle_type_id),
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
     * Operation tuningSubscription
     *
     * Check for active subscription
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\Subscription
     */
    public function tuningSubscription()
    {
        list($response) = $this->tuningSubscriptionWithHttpInfo();
        return $response;
    }

    /**
     * Operation tuningSubscriptionWithHttpInfo
     *
     * Check for active subscription
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\Subscription, HTTP status code, HTTP response headers (array of strings)
     */
    public function tuningSubscriptionWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\Subscription';
        $request = $this->tuningSubscriptionRequest();

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
                        '\Tuningfiles\Model\Subscription',
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
     * Operation tuningSubscriptionAsync
     *
     * Check for active subscription
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function tuningSubscriptionAsync()
    {
        return $this->tuningSubscriptionAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation tuningSubscriptionAsyncWithHttpInfo
     *
     * Check for active subscription
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function tuningSubscriptionAsyncWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\Subscription';
        $request = $this->tuningSubscriptionRequest();

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
     * Create request for operation 'tuningSubscription'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function tuningSubscriptionRequest()
    {

        $resourcePath = '/subscription';
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
     * Operation vehiclesEnginesList
     *
     * List vehicle engines
     *
     * @param  int $generation_id Generation ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\VehicleEngine[]
     */
    public function vehiclesEnginesList($generation_id)
    {
        list($response) = $this->vehiclesEnginesListWithHttpInfo($generation_id);
        return $response;
    }

    /**
     * Operation vehiclesEnginesListWithHttpInfo
     *
     * List vehicle engines
     *
     * @param  int $generation_id Generation ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\VehicleEngine[], HTTP status code, HTTP response headers (array of strings)
     */
    public function vehiclesEnginesListWithHttpInfo($generation_id)
    {
        $returnType = '\Tuningfiles\Model\VehicleEngine[]';
        $request = $this->vehiclesEnginesListRequest($generation_id);

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
                        '\Tuningfiles\Model\VehicleEngine[]',
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
     * Operation vehiclesEnginesListAsync
     *
     * List vehicle engines
     *
     * @param  int $generation_id Generation ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesEnginesListAsync($generation_id)
    {
        return $this->vehiclesEnginesListAsyncWithHttpInfo($generation_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vehiclesEnginesListAsyncWithHttpInfo
     *
     * List vehicle engines
     *
     * @param  int $generation_id Generation ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesEnginesListAsyncWithHttpInfo($generation_id)
    {
        $returnType = '\Tuningfiles\Model\VehicleEngine[]';
        $request = $this->vehiclesEnginesListRequest($generation_id);

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
     * Create request for operation 'vehiclesEnginesList'
     *
     * @param  int $generation_id Generation ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function vehiclesEnginesListRequest($generation_id)
    {
        // verify the required parameter 'generation_id' is set
        if ($generation_id === null || (is_array($generation_id) && count($generation_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $generation_id when calling vehiclesEnginesList'
            );
        }

        $resourcePath = '/vehicles/engines/{generation_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($generation_id !== null) {
            $resourcePath = str_replace(
                '{' . 'generation_id' . '}',
                ObjectSerializer::toPathValue($generation_id),
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
     * Operation vehiclesGenerationsList
     *
     * List vehicle model generations
     *
     * @param  int $model_id Model ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\VehicleGeneration[]
     */
    public function vehiclesGenerationsList($model_id)
    {
        list($response) = $this->vehiclesGenerationsListWithHttpInfo($model_id);
        return $response;
    }

    /**
     * Operation vehiclesGenerationsListWithHttpInfo
     *
     * List vehicle model generations
     *
     * @param  int $model_id Model ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\VehicleGeneration[], HTTP status code, HTTP response headers (array of strings)
     */
    public function vehiclesGenerationsListWithHttpInfo($model_id)
    {
        $returnType = '\Tuningfiles\Model\VehicleGeneration[]';
        $request = $this->vehiclesGenerationsListRequest($model_id);

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
                        '\Tuningfiles\Model\VehicleGeneration[]',
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
     * Operation vehiclesGenerationsListAsync
     *
     * List vehicle model generations
     *
     * @param  int $model_id Model ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesGenerationsListAsync($model_id)
    {
        return $this->vehiclesGenerationsListAsyncWithHttpInfo($model_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vehiclesGenerationsListAsyncWithHttpInfo
     *
     * List vehicle model generations
     *
     * @param  int $model_id Model ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesGenerationsListAsyncWithHttpInfo($model_id)
    {
        $returnType = '\Tuningfiles\Model\VehicleGeneration[]';
        $request = $this->vehiclesGenerationsListRequest($model_id);

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
     * Create request for operation 'vehiclesGenerationsList'
     *
     * @param  int $model_id Model ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function vehiclesGenerationsListRequest($model_id)
    {
        // verify the required parameter 'model_id' is set
        if ($model_id === null || (is_array($model_id) && count($model_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $model_id when calling vehiclesGenerationsList'
            );
        }

        $resourcePath = '/vehicles/generations/{model_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($model_id !== null) {
            $resourcePath = str_replace(
                '{' . 'model_id' . '}',
                ObjectSerializer::toPathValue($model_id),
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
     * Operation vehiclesManufacturersList
     *
     * List vehicle manufacturers
     *
     * @param  int $vehicle_type_id Vehicle type ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\VehicleManufacturer[]
     */
    public function vehiclesManufacturersList($vehicle_type_id)
    {
        list($response) = $this->vehiclesManufacturersListWithHttpInfo($vehicle_type_id);
        return $response;
    }

    /**
     * Operation vehiclesManufacturersListWithHttpInfo
     *
     * List vehicle manufacturers
     *
     * @param  int $vehicle_type_id Vehicle type ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\VehicleManufacturer[], HTTP status code, HTTP response headers (array of strings)
     */
    public function vehiclesManufacturersListWithHttpInfo($vehicle_type_id)
    {
        $returnType = '\Tuningfiles\Model\VehicleManufacturer[]';
        $request = $this->vehiclesManufacturersListRequest($vehicle_type_id);

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
                        '\Tuningfiles\Model\VehicleManufacturer[]',
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
     * Operation vehiclesManufacturersListAsync
     *
     * List vehicle manufacturers
     *
     * @param  int $vehicle_type_id Vehicle type ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesManufacturersListAsync($vehicle_type_id)
    {
        return $this->vehiclesManufacturersListAsyncWithHttpInfo($vehicle_type_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vehiclesManufacturersListAsyncWithHttpInfo
     *
     * List vehicle manufacturers
     *
     * @param  int $vehicle_type_id Vehicle type ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesManufacturersListAsyncWithHttpInfo($vehicle_type_id)
    {
        $returnType = '\Tuningfiles\Model\VehicleManufacturer[]';
        $request = $this->vehiclesManufacturersListRequest($vehicle_type_id);

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
     * Create request for operation 'vehiclesManufacturersList'
     *
     * @param  int $vehicle_type_id Vehicle type ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function vehiclesManufacturersListRequest($vehicle_type_id)
    {
        // verify the required parameter 'vehicle_type_id' is set
        if ($vehicle_type_id === null || (is_array($vehicle_type_id) && count($vehicle_type_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vehicle_type_id when calling vehiclesManufacturersList'
            );
        }

        $resourcePath = '/vehicles/manufacturers/{vehicle_type_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($vehicle_type_id !== null) {
            $resourcePath = str_replace(
                '{' . 'vehicle_type_id' . '}',
                ObjectSerializer::toPathValue($vehicle_type_id),
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
     * Operation vehiclesModelsList
     *
     * List vehicle models
     *
     * @param  int $manufacturer_id Manufacturer ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\VehicleModel[]
     */
    public function vehiclesModelsList($manufacturer_id)
    {
        list($response) = $this->vehiclesModelsListWithHttpInfo($manufacturer_id);
        return $response;
    }

    /**
     * Operation vehiclesModelsListWithHttpInfo
     *
     * List vehicle models
     *
     * @param  int $manufacturer_id Manufacturer ID (required)
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\VehicleModel[], HTTP status code, HTTP response headers (array of strings)
     */
    public function vehiclesModelsListWithHttpInfo($manufacturer_id)
    {
        $returnType = '\Tuningfiles\Model\VehicleModel[]';
        $request = $this->vehiclesModelsListRequest($manufacturer_id);

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
                        '\Tuningfiles\Model\VehicleModel[]',
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
     * Operation vehiclesModelsListAsync
     *
     * List vehicle models
     *
     * @param  int $manufacturer_id Manufacturer ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesModelsListAsync($manufacturer_id)
    {
        return $this->vehiclesModelsListAsyncWithHttpInfo($manufacturer_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vehiclesModelsListAsyncWithHttpInfo
     *
     * List vehicle models
     *
     * @param  int $manufacturer_id Manufacturer ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesModelsListAsyncWithHttpInfo($manufacturer_id)
    {
        $returnType = '\Tuningfiles\Model\VehicleModel[]';
        $request = $this->vehiclesModelsListRequest($manufacturer_id);

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
     * Create request for operation 'vehiclesModelsList'
     *
     * @param  int $manufacturer_id Manufacturer ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function vehiclesModelsListRequest($manufacturer_id)
    {
        // verify the required parameter 'manufacturer_id' is set
        if ($manufacturer_id === null || (is_array($manufacturer_id) && count($manufacturer_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $manufacturer_id when calling vehiclesModelsList'
            );
        }

        $resourcePath = '/vehicles/models/{manufacturer_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($manufacturer_id !== null) {
            $resourcePath = str_replace(
                '{' . 'manufacturer_id' . '}',
                ObjectSerializer::toPathValue($manufacturer_id),
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
     * Operation vehiclesTransmissionsList
     *
     * List available vehicle transmissions
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\VehicleTransmission[]
     */
    public function vehiclesTransmissionsList()
    {
        list($response) = $this->vehiclesTransmissionsListWithHttpInfo();
        return $response;
    }

    /**
     * Operation vehiclesTransmissionsListWithHttpInfo
     *
     * List available vehicle transmissions
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\VehicleTransmission[], HTTP status code, HTTP response headers (array of strings)
     */
    public function vehiclesTransmissionsListWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\VehicleTransmission[]';
        $request = $this->vehiclesTransmissionsListRequest();

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
                        '\Tuningfiles\Model\VehicleTransmission[]',
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
     * Operation vehiclesTransmissionsListAsync
     *
     * List available vehicle transmissions
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesTransmissionsListAsync()
    {
        return $this->vehiclesTransmissionsListAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vehiclesTransmissionsListAsyncWithHttpInfo
     *
     * List available vehicle transmissions
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesTransmissionsListAsyncWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\VehicleTransmission[]';
        $request = $this->vehiclesTransmissionsListRequest();

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
     * Create request for operation 'vehiclesTransmissionsList'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function vehiclesTransmissionsListRequest()
    {

        $resourcePath = '/vehicles/transmissions';
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
     * Operation vehiclesTypesList
     *
     * List vehicle types
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Tuningfiles\Model\VehicleType[]
     */
    public function vehiclesTypesList()
    {
        list($response) = $this->vehiclesTypesListWithHttpInfo();
        return $response;
    }

    /**
     * Operation vehiclesTypesListWithHttpInfo
     *
     * List vehicle types
     *
     *
     * @throws \Tuningfiles\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Tuningfiles\Model\VehicleType[], HTTP status code, HTTP response headers (array of strings)
     */
    public function vehiclesTypesListWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\VehicleType[]';
        $request = $this->vehiclesTypesListRequest();

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
                        '\Tuningfiles\Model\VehicleType[]',
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
     * Operation vehiclesTypesListAsync
     *
     * List vehicle types
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesTypesListAsync()
    {
        return $this->vehiclesTypesListAsyncWithHttpInfo()
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation vehiclesTypesListAsyncWithHttpInfo
     *
     * List vehicle types
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function vehiclesTypesListAsyncWithHttpInfo()
    {
        $returnType = '\Tuningfiles\Model\VehicleType[]';
        $request = $this->vehiclesTypesListRequest();

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
     * Create request for operation 'vehiclesTypesList'
     *
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function vehiclesTypesListRequest()
    {

        $resourcePath = '/vehicles/types';
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
