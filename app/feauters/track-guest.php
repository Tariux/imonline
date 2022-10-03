<?php

require_once(dirname(__DIR__) . "/inc/functions.php");
require_once(__DIR__ . "/database-func.php");


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
date_default_timezone_set("Asia/Tehran");

$db = new MyDataBase;

session_start();
//print_r(questIp());
//print_r(questSessionId());
//print_r(seprateArray(['mamad', 'reza', 'dude'], "db", " ,"));

//var_dump($db->MySqlInsert("quests" , ['session' , 'ip_addr' ] , [questSessionId() , questIp() ]));

// find   Beauty   in   the   code!