# ProjectFilePayment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Payment ID. | [optional] 
**fullfillment_id** | **int** | Fulfillment ID. | [optional] 
**file_id** | **int** | File ID. | [optional] 
**project_id** | **int** | Project ID (Sedox ID). | [optional] 
**buyer_id** | **int** | Customer who made the payment. | [optional] 
**amount** | **int** | Payment amount. | [optional] 
**is_refunded** | **bool** | Is payment refunded. | [optional] 
**date** | [**\DateTime**](\DateTime.md) | Payment date. | [optional] 
**end_date** | [**\DateTime**](\DateTime.md) | After this date payment won&#x27;t be active anymore. In this case, file should be purcased again. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

