<?php

if (! function_exists('show_res')) {
    function show_res($status, $msg = '', $res ='')
    {
        $result = array(
            'status' => $status,
            'msg' => $msg,
            'data' => $res,
        );
        return response()->json($result);
    }
}



?>