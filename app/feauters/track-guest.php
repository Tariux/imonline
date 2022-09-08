<?php

require_once("./database-func.php");

$db = MyDataBase::MySqlDB();

function seprateArray($arr, $dataType = "index", $seprator = ",")
{
    if (empty($arr)) {
        return false;
    }
    $sepratedStr = "";

    switch ($dataType) {
        case "value":

            foreach ($arr as $str_section) {
                $sepratedStr = $sepratedStr . '"' . $str_section . '"' . $seprator;
            }

            $sepratedStr = substr($sepratedStr, 0, -1);

            break;

        case "db":

            foreach ($arr as $str_section) {
                $sepratedStr = $sepratedStr . '`' . $str_section . '`' . $seprator;
            }

            $sepratedStr = substr($sepratedStr, 0, -1);

            break;

        default:

            foreach ($arr as $str_section) {
                $sepratedStr = $sepratedStr . $str_section . $seprator;
            }

            $sepratedStr = substr($sepratedStr, 0, -1);

            break;
    }



    return $sepratedStr;
}
function questSessionId()
{
    $session_id = session_id() ? sha1(session_id()) : false;

    if ($session_id === false) {
        trigger_error("hey bro! please session_start() safe first!", E_USER_NOTICE);
        return false;
    }

    return $session_id;
}

function questIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (
        isset($_SERVER['REMOTE_ADDR'])
        && $_SERVER['REMOTE_ADDR'] != "127.0.0.1"
        && $_SERVER['REMOTE_ADDR'] != "192.168.1.1"
    ) {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip_address = "localhost";
    }

    return $ip_address;
}

session_start();
//print_r(questIp());
//print_r(questSessionId());
print_r(seprateArray(['mamad', 'reza', 'dude'], "db", " ,"));
// find   Beauty   in   the   code!