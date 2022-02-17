# ProjectsBody

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**ecu1_file** | **int** | ID of the uploaded original file. Obtained from the [/files/upload](#operation/file_upload) method. | 
**ecu1_label** | **string** | Short description for the 1st original file. Eligable only if you upload 2 ECU files. | [optional] 
**ecu2_file** | **int** | ID of the second uploaded original file. Obtained from the [/files/upload](#operation/file_upload) method. | [optional] 
**ecu2_label** | **string** | Short description for the 2nd original file. Eligable only if you upload 2 ECU files. | [optional] 
**vehicle_type_id** | **int** | ID of the vehicle type. Obtained from the [/vehicles/types](#operation/vehicles_types_list) method. | 
**vehicle_manufacturer_id** | **int** | ID of the vehicle manufacturer. Obtained from the [/vehicles/manufacturers](#operation/vehicles_manufacturers_list) method. | 
**vehicle_model_id** | **int** | ID of the vehicle model. Obtained from the [/vehicles/models](#operation/vehicles_models_list) method. | 
**vehicle_generation_id** | **int** | ID of the model generation. Obtained from the [/vehicles/generations](#operation/vehicles_generations_list) method. | 
**vehicle_engine** | **string** | Name of the vehicle engine. E.g. &#x60;123d 204hp 400Nm&#x60;. This parameter is ***required*** if &#x60;vehicle-engine-id&#x60; is not used. | [optional] 
**vehicle_engine_id** | **int** | ID of the engine. Obtained from the [/vehicles/engines](#operation/vehicles_engines_list) method. This parameter is ***required*** if &#x60;vehicle-engine&#x60; is not used. | [optional] 
**vehicle_year** | **int** | Vehicle year of manufacturing. | 
**vehicle_gearbox** | **int** | ID of the vehicle transmission (gearbox). Can be obtained from [/vehicles/transmissions](#operation/vehicles_transmissions_list) method. | 
**vehicle_ecu** | **string** | ECU name. E.g. &#x60;Bosch EDC16C39&#x60;. | [optional] 
**hardware_number** | **string** | ECU hardware number | [optional] 
**software_number** | **string** | ECU software number | [optional] 
**read_tool** | **string** | Read tool used while reading the vehicle ECU. Can be ***integer*** (an ID obtained from [/vehicles/read-tools](#operation/read_tools_list)) or ***string*** with the name of the tool. | 
**remap** | **int** | ID of the selected remap. Obtained from the  [/vehicles/remaps](#operation/remaps_list) method. | 
**addons** | **int[]** | Special requests. Array of remap addon IDs. Obtained from the [/vehicles/remaps](#operation/remaps_list) method. | [optional] 
**dtc_codes** | **string[]** | Array with DTC codes to be removed. | [optional] 
**notification_channel** | **int[]** | Notification channels to be used for notification. Must be an array with notification channels identifiers obtained from the [/notification-channels](#operation/notification_channels_list) method. | [optional] 
**file_attachment** | **int** | ID of additional file to be attached. Obtained from the [/attachments/upload](#operation/attachment_upload) method. Please note that, this is not for referencing original files! | [optional] 
**ref** | **string** | License plate or Reference ID. | [optional] 
**customer_comment** | **string** | Comment for the developers. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

