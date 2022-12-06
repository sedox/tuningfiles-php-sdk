# Project

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Project ID (Sedox ID). | [optional] 
**uuid** | **string** | Project v4 UUID. | [optional] 
**name** | **string** | Project name. | [optional] 
**status** | **string** | Project status. Can be: \&quot;Waiting\&quot;, \&quot;In Progress\&quot;, \&quot;Finished\&quot;. | [optional] 
**status_code** | **int** | Project status code. Can be: 0 &#x3D; \&quot;Waiting\&quot;; 1 &#x3D; \&quot;In Progress\&quot;; 2 &#x3D; \&quot;Finished\&quot;. | [optional] 
**vehicle_data** | [**\Tuningfiles\Model\ProjectVehicleData**](ProjectVehicleData.md) |  | [optional] 
**read_tool** | **string** | Read tool used for reading the ECU. | [optional] 
**read_tool_id** | **int** |  | [optional] 
**dtc_codes** | **string[]** | Array with DTC codes requested for removal. | [optional] 
**license_plate** | **string** |  | [optional] 
**notification_channels** | [**\Tuningfiles\Model\NotificationChannel[]**](NotificationChannel.md) | Notification channels used for this project. | [optional] 
**comment** | **string** | Customer comment. | [optional] 
**remap_data** | [**\Tuningfiles\Model\ProjectRemapData**](ProjectRemapData.md) |  | [optional] 
**started_on** | [**\DateTime**](\DateTime.md) | Date on which project was started by our developers. | [optional] 
**finished_on** | [**\DateTime**](\DateTime.md) | Date on which project was finished by our developers. | [optional] 
**added** | [**\DateTime**](\DateTime.md) | Date on which project was added into the queue. | [optional] 
**uploaded** | [**\DateTime**](\DateTime.md) | Date on which project was created. | [optional] 
**updated** | [**\DateTime**](\DateTime.md) | Last update date. | [optional] 
**attachments** | [**\Tuningfiles\Model\Attachment[]**](Attachment.md) | Array of attachment objects. All the attachments in this project. | [optional] 
**files** | [**\Tuningfiles\Model\ProjectFile[]**](ProjectFile.md) | Array of file objects. All the files in this project. | [optional] 
**metadata** | **map[string,string]** | You can use this parameter to attach arbitrary key-value data to be sent. Metadata is useful for storing additional, structured information such as your user&#x27;s corresponding unique identifier from your system. By default, metadata is acessible, but not used by our developers, but you may use it for your reference. You can specify up to 10 keys, with key names up to 20 characters long and values up to 500 characters long. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

