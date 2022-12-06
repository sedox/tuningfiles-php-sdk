# Remap

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** | ID of the remap. When creating a tuning project, you may supply this id | [optional] 
**name** | **string** | Name of the remap. E.g. &#x60;Stage 1&#x60;, &#x60;Stage 2&#x60;, etc. | [optional] 
**vehicle_type_id** | **int** | ID of the vehicle type. 1 - Cars &amp; LCV, 2 - Trucks &amp; Buses, 3 - Agriculture, 4 - Marine, 5 - Motorcycles &amp; ATVs | [optional] 
**base_price** | **int** | The base price of the remap. No addons are included in this price. Base price can be &#x60;0&#x60; (for example: \&quot;deactivation only\&quot; remaps). In this case, at least one addon must be selected. | [optional] 
**max_tier_price** | **int** | Maximum price for the remap when used with tier eligible (&#x60;tier_price &#x3D; true&#x60;) addons. | [optional] 
**addons** | [**\Tuningfiles\Model\RemapAddon[]**](RemapAddon.md) | Special requests (addons) available for this remap. | [optional] 
**require_addon** | **bool** | Indicates if this remap type requires at least one addon to be selected. | [optional] 
**updated** | [**\DateTime**](\DateTime.md) | Date when this remap data was updated. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

