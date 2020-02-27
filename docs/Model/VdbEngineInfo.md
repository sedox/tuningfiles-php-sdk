# VdbEngineInfo

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | Engine ID. | [optional] 
**name** | **string** | Engine name. | [optional] 
**slug** | **string** | URL-friendly name (slug). | [optional] 
**type** | **string** | Engine type. Diesel, Petrol, Turbo Diesel, Turbo Petrol, Heavy Diesel, Heavy Turbo Diesel, Marine Diesel, Marine Petrol, Marine Turbo Diesel, Hybrid, Other. | [optional] 
**capacity** | **int** | Engine capacity in cubic cm. | [optional] 
**power** | **int** | Engine horse power (metric). | [optional] 
**torque** | **int** | Engine torque in Nm. | [optional] 
**cylinders** | **int** | Number of cylinders. | [optional] 
**year** | **int** | Manufacture year. | [optional] 
**ecu** | **string** | ECU used | [optional] 
**tcu** | **string** | Transmission control unit. | [optional] 
**hp_values** | **string** | HP values for plotting a dyno chart. | [optional] 
**nm_values** | **string** | Nm values for plotting a dyno chart. | [optional] 
**rpm_values** | **string** | RPM values for plotting a dyno chart. | [optional] 
**engine_code** | **string** | Engine code. | [optional] 
**fuel_name** | **string** | Type of the fuel used. Diesel, Petrol, Ethanol, LPG, Hybrid. | [optional] 
**options** | [**\Tuningfiles\Model\VdbEngineInfoOptions[]**](VdbEngineInfoOptions.md) | Available remap options for this engine. This is only informational. When creating a project for tuning you should use the &#x60;addons&#x60; from [/vehicles/remaps/{vehicle_type_id}](#operation/remaps_list) method. | [optional] 
**remap_stages** | [**\Tuningfiles\Model\VdbEngineInfoRemapStages[]**](VdbEngineInfoRemapStages.md) | Available remaps for this engine. | [optional] 
**read_tools** | [**\Tuningfiles\Model\VdbEngineInfoReadTools[]**](VdbEngineInfoReadTools.md) | Tuning tools which can be used to read this engine. | [optional] 
**read_methods** | [**\Tuningfiles\Model\VdbEngineInfoReadMethods[]**](VdbEngineInfoReadMethods.md) | Method to use when reading this engine. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

