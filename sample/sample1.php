<?php
/**
 * Created By @Mench
 * Powered By @PHPBots, @Mench, magicode.ir
 * Copy Right 2017
 * User : Morteza
 */

include "../class/tpc.php";

$update = json_decode(file_get_contents("php://input"));
$tg = new TCP_MB();
$tg->setToken("TELEGRAM:BOTTOKEN");
$tg->setUpdate($update);
$tg->setParseMode("Markdown");
$tg->setIsTyping(true);

$tg->__sendMessage("RESEND");
$tg->__sendAudio("RESEND");
$tg->__sendVoice("RESEND");
$tg->__sendVideo("RESEND");
$tg->__sendDocument("RESEND");
$tg->__sendPhoto("RESEND");
$tg->__sendVideoNote("RESEND");
$tg->__sendSticker("RESEND");
$tg->__sendLocation("RESEND", "RESEND");
$tg->__sendVenue("RESEND", "RESEND");
$tg->__sendContact("RESEND");
