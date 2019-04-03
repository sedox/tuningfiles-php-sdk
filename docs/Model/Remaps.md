# Remaps

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**name** | **string** |  | [optional] 
**vehicle_type_id** | **int** |  | [optional] 
**base_price** | **int** | The base price of the remap. Base price can be &#x60;0&#x60; (for example: \&quot;deactivation only\&quot; remaps). In this case, at least one addon must be selected. | [optional] 
**max_tier_price** | **int** | Maximum price for the remap when used with tier eligible (tier_price &#x3D; true) addons. | [optional] 
**addons** | [**\Tuningfiles\Model\RemapsAddons[]**](RemapsAddons.md) |  | [optional] 
**updated** | **string** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

