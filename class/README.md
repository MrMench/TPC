# TPC - Class

How To Start ?

<b>STEP 1 - Download TPC Class</b><br>
<b>STEP 2 - include Class File Into Code</b><br>
<b>STEP 3 - Add The Below Code After Include TPC<br>
    <code>
        $update = json_decode(file_get_contents("php://input"));
    </code><br>
    <code>
        $tg = new TPC_MB();
    </code>
    <br><code>
        $tg->setToken("XXX:XXX");
    </code><br>
    <code>
        $tg->setUpdate($update);
    </code>
    <br>
    <code>
        $tg->setParseMode("html");
    </code>
    <br>
    <code>
    $tg->setIsTyping(true)
    </code>
    <br>
</b><br>
<b>STEP 4 - Everything is awesome</b><br>

<br>
How To SendMessage?<br>

<code>$tg->__sendMessage("Message TEXT");</code><br>


How To Force Reply?<br>

<code>$tg->setReplyMarkup($tg->___KeyboardMode("force_reply"));</code><br>
