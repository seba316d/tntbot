<?php
/**
 * Created by PhpStorm.
 * User: s.manczak
 * Date: 05.06.2017
 * Time: 14:00
 */

//require_once ('config/config.php');
//require_once ('include/ts3admin.class.php');

function poke()
{

    global $ts3;
    global $config;
    static $count=0;

    $poke = false;
    $time = time() + 5;
    $clients = $ts3->getElement('data', $ts3->clientList('-groups -uid'));
    $channel = $ts3->getElement('data', $ts3->channelClientList($config['poke']['channel'], '-ip'));

    if (!empty($channel)) {
        foreach ($clients as $users) {

            $user_group_id = explode(',', $users['client_servergroups']);

            if ($users['client_nickname'] != $config['bot']['name']) {

                    if (isInGroup($user_group_id, $config['poke']['group'])) {
                        if($count==0) {
                            $ts3->clientPoke($users['clid'], "Ktoś czeka na kanale POMOCY !");
                            $count++;
                        }
                }


            }
        }


    }
    else{
        $count=0;
    }

    unset($ts3);
    unset($config);
    unset($count);
    unset($clients);
    unset($channel);
    unset($users);
    unset($user_group_id);
}

function isInGroup($a, $b){
    for ($i=0; $i<count($a); $i++){

        if (in_array($a[$i],$b)){
            return 1;
        }
        else{
            return 0;
        }
    }

}

