<?php
/**
 * Created by PhpStorm.
 * User: Seba
 * Date: 2017-02-20
 * Time: 17:13
 */

require_once("include/ts3admin.class.php");

echo "BOT TS3";

$ts = new ts3admin('localhost',10011);

try{
    if($ts->getElement('success',$ts->connect())){
        $ts->login('serveradmin','ZE3CqxD2');
        $ts->selectServer(9987);
        $ts->setName("TnTBOT");

        while (1){
            $core = $ts->getElement('data',$ts->whoAmI());
            $ts->clientMove($core['client_id'],1);
            sleep(1);

            $users = $ts->getElement('data',$ts->clientList('-groups -voice -away -times'));

            $user_groups = explode(',',$client['client_servergroups']);

        }
    };
}
catch (Exception $e){
    echo "bład";
}