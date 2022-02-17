# SupportTicketsBody

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**department** | **int** | ID of the selected department. Obtained from the [/support/departments](#operation/support_list_departments) method. | 
**subject** | **string** | Brief ticket subject. | 
**message** | **string** | Ticket message. | 
**message_display_name** | **string** | Name of the person who wrote the message. If not supplied, system will show the name of the customer instead. | [optional] 
**message_display_email** | **string** | Email of the person who wrote the message. If not supplied, system will show the email of the customer instead. | [optional] 
**project** | **int** | ID of the selected project. This parameter is required if department requires a project. | [optional] 
**attachments** | **int[]** | File attachments. Must be an array with attachment identifiers obtained from the [/support/messages/attachment](#operation/support_upload_attachment) method. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

