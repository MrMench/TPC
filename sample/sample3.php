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
$tg->setToken("TELEGRAM:BOTTOKEN");
$tg->setUpdate($update);
$tg->setParseMode("html");
$tg->setIsTyping(true);
$tg->setReplyMarkup([
    "inline_keyboard" => [
        [["text" => "Update", "callback_data" => "update"]]
    ]
]);

$more_function = new MoreFunction();
$JalaliDate = new JalaliDate();

if (isset($update->message)) {
    if (strtolower($tg->variable()["text"]) == "/start") {
        $tg->__sendMessage("Hello :) \n " . $JalaliDate->jdate("Y/m/d H:i:s"));
    }
} else {
    if ($tg->variable()["data"] == "update") {
        $tg->__editMessageText("Hello :) \n " . $JalaliDate->jdate("Y/m/d H:i:s"), $tg->variable()["from"]["id"], $tg->variable()["message_id"]);
    }
}
