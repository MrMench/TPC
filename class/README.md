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



How To SendPhoto?<br>

<code>$tg->__sendPhoto("http://magicode.ir/photo.png", "Caption");</code><br>


How To SendVideo?<br>

<code>$tg->__sendVideo("http://magicode.ir/video.mp4", "Caption");</code><br>


How To SendDocument?<br>

<code>$tg->__sendDocument("http://magicode.ir/document.docx", "Caption");</code><br>

How To SendAudio?<br>

<code>$tg->__sendAudio("http://magicode.ir/audio.mp3", "Caption");</code><br>

How To SendVideoNote(video message)?<br>

<code>$tg->__sendVideoNote("http://magicode.ir/video.mp4");</code><br>

How To SendVoice?<br>

<code>$tg->__sendVoice("http://magicode.ir/voice.ogg", "Caption");</code><br>


How To Force Reply?<br>

<code>$tg->setReplyMarkup($tg->___KeyboardMode("force_reply"));</code><br>



Str On The Text<br>
<code>$tg->___telegramStr("TEXT");</code><br>
| Parameter    | Description           |<br>
| :---         |          ---:         |<br>
| FROM_FNAME   | first name            |<br>
| FROM_LNAME   | last  name            |<br>
| FROM_USERNAME| username              |<br>
| FROM_IS_BOT  | user is bot bool      |<br>
| FROM_IS_BOT  | user is bot bool      |<br>
| FROM_ID      | user id               |<br>
