<?php
function getUrl()
{
    return config('app.url');
}


function getResponse($status = true, $msg, $data = null, $code = 200, $exc = null, $info = [])
{
    $ret = [
        'status' => $status,
        'code' => $code,
        'message' => $msg,
    ];
    if (!empty($info)) {
        $n = intval(count($info) / 2);
        $nn = 0;
        for ($i = 0; $i < $n; $i++) {
            $ret[$info[$nn++]] =  $info[$nn++];
        }
        // $ret[$info[0]] = $info[1];
    }
    try {
        $ret['count'] = count($data);
    } catch (Exception $e) {
    }
    $ret['data'] = $data;
    if ($exc) {
        $ret['exc'] = (is_string($exc) ? $exc : return_exc($exc));
    }
    return $ret;
}

// return exception try catch
function return_exc(Exception $ex)
{
    return $ex->getMessage() . ' , File: ' . $ex->getFile() . ' , Line: ' . $ex->getLine();
}

// getstatusclamav
function getClamav()
{
    return config('app.clamav') ? 'clamav' : '';
}
