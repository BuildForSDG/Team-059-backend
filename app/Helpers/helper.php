<?php

/*
|--------------------------------------------------------------------------
| HTTP SUCCESS & FAILURE RESPONSE HELPER
| 
| Below are reusable functions for handling response types like
| - success - error - notFound - badRequest - unAuthenticated - unAuthorized 
| - tooManyRequest - methodNotAllowed - failedValidation - serviceUnavailable 
|--------------------------------------------------------------------------
*/

/**
 * Handles general success, and can be reused in other http 
 * success code level response (2..) 
 * 200 - success, 201 - created 202 - accepted & processing
 * 
 * @param string $message = 'Request completed successfully'
 * @param array $data = []
 * @param int $statusCode
 * 
 * @return Response
 */
if(!function_exists('success'))
{
    function success(string $message = 'Request completed successfully', array $data = [], int $statusCode = 200){
        return response()->json(['status'=>'success', 'message'=>$message, 'data'=>$data], $statusCode);
    }
}

/**
 * Handles general failures, and can be reused in other http 
 * error code level responses (4.. 5..)
 * 
 * @param string $message = 'Something went wrong', 
 * @param int $errorCode = null, 
 * @param int $statusCode = 400
 * 
 * @return Response
 */
if(!function_exists('error'))
{
    function error(string $message = 'Something went wrong', int $errorCode = null, int $statusCode = 400){
        return response()->json(['status'=>'failed', 'message'=>$message, 'errorCode'=>$errorCode], $statusCode);
    }  
}

/**
 * Response to users attempting to access an invalid resource
 * 
 * @param string $message = 'The requested resource was not found.', 
 * @param int $errorCode = null, 
 * @param int $statusCode = 404
 * 
 * @return Response (404)
 */
if(!function_exists('notFound'))
{
    function notFound(string $message = 'The requested resource was not found.', int $errorCode = null, int $statusCode = 404){
        return response()->json(['status'=>'failed', 'message'=>$message, 'errorCode'=>$errorCode], $statusCode);
    }
}

/**
 * Response to users making a malformed request or passed a wrong
 * payload
 * 
 * @param string $message = 'Invalid Request', 
 * @param int $errorCode = null, 
 * @param int $statusCode = 400
 * 
 * @return Response 400
 */
if(!function_exists('badRequest'))
{
    function badRequest(string $message = 'Invalid Request', int $errorCode = null, int $statusCode = 400){
        return response()->json(['status'=>'failed', 'message'=>$message, 'errorCode'=>$errorCode], $statusCode);
    }
}

/**
 * Response to unauthenticated users trying to access an
 * authenticated resource
 * 
 * @param string $message = 'Authentication required to access this feature', 
 * @param int $errorCode = null, 
 * @param int $statusCode = 401
 * 
 * @return Response 401
 */
if(!function_exists('unAuthenticated'))
{
    function unAuthorized(string $message = 'Authentication required to access this feature', int $errorCode = null, int $statusCode = 401){
        return response()->json(['status'=>'failed', 'message'=>$message, 'errorCode'=>$errorCode], $statusCode);
    }
}


/**
 * Response to authenticated users trying to access a
 * forbidden or restricted resource
 * 
 * @param string $message = 'You are not authorized to access this feature', 
 * @param int $errorCode = null, 
 * @param int $statusCode = 403
 * 
 * @return Response 403
 */
if(!function_exists('unAuthorized'))
{
    function unAuthorized(string $message = 'You are not authorized to access this feature', int $errorCode = null, int $statusCode = 403){
        return response()->json(['status'=>'failed', 'message'=>$message, 'errorCode'=>$errorCode], $statusCode);
    }
}

/**
 * Response to users who have made multiple requests
 * to a trottled endpoint
 * 
 * @param string $message = 'You have reached your request limit.', 
 * @param int $errorCode = null, 
 * @param int $statusCode = 429
 * 
 * @return Response 429
 */
if(!function_exists('tooManyRequest'))
{
    function tooManyRequest(string $message = 'You have reached your request limit.', int $errorCode = null, int $statusCode = 429){
        return response()->json(['status'=>'failed', 'message'=>$message, 'errorCode'=>$errorCode], $statusCode);
    }
}

/**
 * Response to users using wrong HTTP methods to attempt
 * accessing a URI
 * 
 * @param string $message = 'The HTTP method used is not allowed', 
 * @param int $errorCode = null, 
 * @param int $statusCode = 405
 * 
 * @return Response 405
 */
if(!function_exists('methodNotAllowed'))
{
    function methodNotAllowed(string $message = 'The HTTP method used is not allowed', int $errorCode = null, int $statusCode = 405){
        return response()->json(['status'=>'failed', 'message'=>$message, 'errorCode'=>$errorCode], $statusCode);
    }
}

/**
 * Response to users who has input values that are considered 
 * Unprocessable or have failed some validation checks
 * 
 * @param string $message = 'Your request has failed at least one validation check.', 
 * @param int $errorCode = null, 
 * @param int $statusCode = 422
 * 
 * @return Response 422
 */
if(!function_exists('failedValidation'))
{
    function failedValidation(string $message = 'Your request has failed at least one validation check.', int $errorCode = null, int $statusCode = 422){
        return response()->json(['status'=>'failed', 'message'=>$message, 'errorCode'=>$errorCode], $statusCode);
    }
}


/**
 * Response to users accessing a request that is offline or
 * unavailable at the moment.
 * 
 * @param string $message = 'Something went wrong', 
 * @param int $errorCode = null, 
 * @param int $statusCode = 503
 * 
 * @return Response 503
 */
if(!function_exists('serviceUnavailable'))
{
    function serviceUnavailable(string $message = 'Something went wrong', int $errorCode = null, int $statusCode = 503){
        return response()->json(['status'=>'failed', 'message'=>$message, 'errorCode'=>$errorCode], $statusCode);
    }
}