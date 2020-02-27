# File

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | File ID. | [optional] 
**uuid** | **string** | File v4 UUID. | [optional] 
**project** | **int** | Project ID (Sedox ID). | [optional] 
**type** | **string** | Type of the file.  For original files it can be: &#x60;ID File&#x60; or &#x60;Original&#x60;. For tuned files it can be &#x60;Stage 1, 2, 3, etc&#x60;. For files with special requests only (like &#x60;DPF Off&#x60;, &#x60;Vmax Off&#x60;, etc) it can be &#x60;Decativation Only&#x60;. | [optional] 
**ecu_number** | **int** | ECU number. Some cars have more than one ECU. | [optional] 
**ecu_label** | **string** | ECU label. | [optional] 
**remap_id** | **int** | ID of the remap. | [optional] 
**remap_name** | **string** | Name of the remap. | [optional] 
**remap_addons** | **string[]** | Array with all special requests (addons) added into the file. | [optional] 
**size** | **int** | Actual file size in bytes. | [optional] 
**md5sum** | **string** | MD5 sum of the file. | [optional] 
**is_checksum_updated** | **bool** | Shows either checksum was updated (corrected) or not | [optional] 
**user_id** | **int** | Owner of the file. | [optional] 
**uploaded_by** | **int** | Uploader of the file (may be a sub-account) | [optional] 
**is_original** | **bool** | Shows either this is an original file or not. | [optional] 
**is_stack** | **bool** | Shows if file is stack (archive). Archive contains more than one file. If car is with 2 ECUs you will receive stacked file (archive) with 2 modified files (one for each ECU). | [optional] 
**stack** | **int** | Stack ID (if this file is part of stack/archive). | [optional] 
**is_cmdencrypted** | **bool** | Shows either this is a CMD Encrypted file. | [optional] 
**is_cmddecrypted** | **bool** | Shows either this is a CMD Decrypted file. | [optional] 
**is_id** | **bool** | Shows either this is an ID file. | [optional] 
**comment** | **string** | Comment left by developer. | [optional] 
**pricing** | [**\Tuningfiles\Model\FilePricing**](FilePricing.md) |  | [optional] 
**payment** | [**\Tuningfiles\Model\FilePayment**](FilePayment.md) |  | [optional] 
**added** | [**\DateTime**](\DateTime.md) | Date-time file was uploaded. | [optional] 
**updated** | [**\DateTime**](\DateTime.md) | Date-time file was updated. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

