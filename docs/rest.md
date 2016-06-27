# rest

**Namespace**  : alphayax\rest

# Overview

- [Rest](rest.md#Rest)
- [Config](rest.md#Config)


<a name="Rest"></a>
## Rest

**Class**  : alphayax\rest\Rest

### Public methods

| Method | Description |
|---|---|
| `GET` | Perform a GET request | 
| `POST` | Perform a POST request | 
| `PUT` | Perform a PUT request | 
| `DELETE` | Perform a DELETE request | 
| `addHeader` | Add a specific Header | 
| `setContentType_XFormURLEncoded` | Define the content type as "application/x-www-form-urlencoded" | 
| `setContentType_MultipartFormData` | Define the content type as "multipart/form-data" | 
| `getHttpCode` | Return the HTTP Code | 
| `getCurlResponse` | Return the response of the request Will be empty until a call at exec (via GET, POST, DELETE or PUT) | 
| `setReturnAsArray` | Force return as assoc array instead of \stdClass | 
| `setIsJson` | Perform a json_decode on the request result | 
| `getConfig` | Return the config object to specify preferences about sending and receiving | 

<a name="Config"></a>
## Config

**Class**  : alphayax\rest\Config

### Public methods

| Method | Description |
|---|---|
| `isRequestToJsonEncode` | If true, perform a json_encode before sending the request | 
| `setIsRequestToJsonEncode` | Perform a json_encode before sending the request | 
| `isReturnToJsonDecode` | If true, perform a json_decode on the result | 
| `setIsReturnToJsonDecode` | Perform a json_decode on the result | 
| `isReturnObject` | If isReturnToJsonDecode is set to TRUE AND if isReturnObject is set to TRUE, result will be a stdClass | 
| `setIsReturnObject` | If isReturnToJsonDecode, Result will be a stdClass. Associative array otherwise | 
