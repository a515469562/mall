<?php
namespace App\Http\Controllers\Api;


class WxController extends CommonController
{

    protected static function apiSuccess($result)
    {
        $result = [
            'errno' => SUCCESS,
            'errmsg' => CODE_MAP[SUCCESS],
            'data' => $result
        ];
        return response()->json($result);
    }

    protected static function apiError($errMessage, $errCode = FAIL)
    {
        $result = [
            'code' => $errCode,
            'message' => CODE_MAP[$errCode],
            'data' => []
        ];
        return response()->json($result);
    }


}
