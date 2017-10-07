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

$more_function = new MoreFunction();

if (strtolower($tg->variable()["text"]) == "/start") {
    $tg->__sendMessage("Password Generated \n\n <code>".$more_function->generateRandomStr()."</code> \n\n Click The Password And Copy :)");
} else {
    if (is_numeric($tg->variable()["text"])) {
        $tg->__sendMessage("Password Generated \n\n <code>" . $more_function->generateRandomStr((int)$tg->variable()["text"]) . "</code> \n\n Click The Password And Copy :)");
    } else {
        $tg->__sendMessage("Please Send Password Lenght (int : 1-9)");
    }
}
