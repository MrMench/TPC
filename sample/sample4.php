<?php
/**
 * Created By @Mench
 * Powered By @PHPBots, @Mench, magicode.ir
 * Copy Right 2017
 * User : Morteza
 */

include "../class/tpc.php";
$update = json_decode(file_get_contents("php://input"));
$tg = new TPC_MB();
$tg->setToken("Token");
$tg->setUpdate($update);
$tg->setParseMode("html");
$tg->setReplyMarkup($tg->___KeyboardMode("force_reply"));

if (isset($update->message->forward_from)) {
    $msg = $tg->___telegramStr("First Name : FOR_FNAME\n");
    $i = $tg->___telegramStr("FOR_LNAME");
    if (!empty($i)) {
        $msg .= $tg->___telegramStr("Last Name : FOR_LNAME\n");
    }
    $i = $tg->___telegramStr("FOR_ID");
    if (!empty($i)) {
        $msg .= $tg->___telegramStr("ID : FOR_ID\n");
    }
    $i = $tg->___telegramStr("FOR_USERNAME");
    if (!empty($i)) {
        $msg .= $tg->___telegramStr("Username : @FOR_USERNAME\n");
    }

    if (!empty($tg->_getUserProfilePhoto($update->message->forward_from->id))) {
        $tg->__sendPhoto($tg->_getUserProfilePhoto($update->message->forward_from->id), "github.com/MrMench/TPC");
        $tg->__sendMessage($msg);
    } else {
        $tg->__sendMessage($msg);
    }
} else {
    $msg = $tg->___telegramStr("First Name : FROM_FNAME\n");
    $i = $tg->___telegramStr("FROM_LNAME");
    if (!empty($i)) {
        $msg .= $tg->___telegramStr("Last Name : FROM_LNAME\n");
    }
    $i = $tg->___telegramStr("FROM_ID");
    if (!empty($i)) {
        $msg .= $tg->___telegramStr("ID : FROM_ID\n");
    }
    $i = $tg->___telegramStr("FROM_USERNAME");
    if (!empty($i)) {
        $msg .= $tg->___telegramStr("Username : @FROM_USERNAME\n");
    }

    if (!empty($tg->_getUserProfilePhoto($tg->variable()["from"]["id"]))) {
        $tg->__sendPhoto($tg->_getUserProfilePhoto($tg->variable()["from"]["id"]), "github.com/MrMench/TPC");
        $tg->__sendMessage($msg);
    } else {
        $tg->__sendMessage($msg);
    }
}

