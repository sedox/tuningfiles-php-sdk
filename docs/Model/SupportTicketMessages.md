# SupportTicketMessages

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Message ID. UUIDv4 format. | [optional] 
**text** | **string** | Message text body. | [optional] 
**display_name** | **string** | Message display name. Name of the person who wrote the message. | [optional] 
**display_email** | **string** | Message display email. Email of the person who wrote the message. | [optional] 
**is_from_staff** | **bool** | Shows if message was written by the stagff. | [optional] 
**attachments** | [**\Tuningfiles\Model\SupportTicketMessagesAttachments[]**](SupportTicketMessagesAttachments.md) |  | [optional] 
**added** | [**\DateTime**](\DateTime.md) | Date on which message was created | [optional] 
**updated** | [**\DateTime**](\DateTime.md) | Date on which message was updated | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

