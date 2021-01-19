# ProjectFilePricing

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**is_billable** | **bool** | Shows either this file is billable or not. | [optional] 
**is_paid** | **bool** | Shows either this file has been paid or not. | [optional] 
**regular_price** | **int** | The regular price of the file. | [optional] 
**final_price** | **int** | The final price of the file. | [optional] 
**download_permitted** | **bool** | Shows either customer is permitted to download this file or not. If file is billable and download_permitted &#x3D; false, then it should be purchased first. | [optional] 
**purchase_url** | **string** | If file needs to be purchased, this will contain the API url to purchase the file. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

