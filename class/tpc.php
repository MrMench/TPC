<?php
/**
 * Created By @Mench
 * Powered By @PHPBots, @Mench, magicode.ir
 * Copy Right 2017
 * User : Morteza
 */

class TPC_MB
{
    private $token;
    private $update;
    private $parse_mode;
    private $reply_markup;
    private $disable_web_page_preview;
    private $isTyping;

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $update
     */
    public function setUpdate($update)
    {
        $this->update = $update;
    }

    /**
     * @return mixed
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * @param string $parse_mode
     */
    public function setParseMode($parse_mode)
    {
        $this->parse_mode = $parse_mode;
    }

    /**
     * @return string
     */
    public function getParseMode()
    {
        return $this->parse_mode;
    }

    /**
     * @param array $reply_markup
     */
    public function setReplyMarkup($reply_markup)
    {
        $this->reply_markup = $reply_markup;
    }

    /**
     * @return array
     */
    public function getReplyMarkup()
    {
        return $this->reply_markup;
    }

    /**
     * @param mixed $disable_web_page_preview
     */
    public function setDisableWebPagePreview($disable_web_page_preview)
    {
        $this->disable_web_page_preview = $disable_web_page_preview;
    }

    /**
     * @return mixed
     */
    public function getDisableWebPagePreview()
    {
        return $this->disable_web_page_preview;
    }

    /**
     * @param mixed $isTyping
     */
    public function setIsTyping($isTyping)
    {
        $this->isTyping = $isTyping;
    }

    /**
     * @return mixed
     */
    public function getisTyping()
    {
        return $this->isTyping;
    }

    /**
     * @param $message_text
     * @param $chat_id
     * @return mixed
     */
    public function __sendMessage($message_text = "RESEND", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["chat"]["id"];
        }

        if ($message_text == "RESEND") {
            $message_text = $this->update->message->text;
        }

        if ($this->getisTyping() == true) {
            $this->isTyping($chat_id);
        }
        return $this->mench("sendMessage", [
            "chat_id" => $chat_id,
            "text" => $message_text,
            "parse_mode" => $this->getParseMode(),
            "reply_markup" => json_encode($this->reply_markup),
            "disable_web_page_preview" => $this->disable_web_page_preview,
        ]);
    }

    /**
     * @param $photo_url
     * @param $photo_caption
     * @param string $chat_id
     * @return mixed
     */
    public function __sendPhoto($photo_url = "RESEND", $photo_caption = "", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }

        if ($photo_url == "RESEND") {
            $photo = $this->update->message->photo;
            $photo_url = $photo[count($photo) - 1]->file_id;
        }
        return $this->mench("sendPhoto", [
            "chat_id" => $chat_id,
            "photo" => $photo_url,
            "caption" => $photo_caption,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param $chat_id
     * @param $from_chat_id
     * @param $message_id
     * @return mixed
     */
    public function __forwardMessage($chat_id, $from_chat_id, $message_id)
    {
        return $this->mench("forwardMessage", [
            "chat_id" => $chat_id,
            "from_chat_id" => $from_chat_id,
            "message_id" => $message_id,
        ]);
    }

    /**
     * @param $chat_id
     * @param $message_id
     * @return mixed
     */
    public function __deleteMessage($chat_id, $message_id)
    {
        return $this->mench("deleteMessage", [
            "chat_id" => $chat_id,
            "message_id" => $message_id,
        ]);
    }

    /**
     * @param $text
     * @param $chat_id
     * @param $message_id_or_inline_message_id
     * @param string $type
     * @return mixed
     */
    public function __editMessageText($text, $chat_id, $message_id_or_inline_message_id, $type = "message_id")
    {
        if ($type == "message_id") {
            return $this->mench("editMessageText", [
                "chat_id" => $chat_id,
                "text" => $text,
                "parse_mode" => $this->parse_mode,
                "message_id" => $message_id_or_inline_message_id,
                "reply_markup" => json_encode($this->reply_markup),
            ]);
        } else {
            return $this->mench("editMessageText", [
                "chat_id" => $chat_id,
                "text" => $text,
                "parse_mode" => $this->parse_mode,
                "inline_message_id" => $message_id_or_inline_message_id,
                "reply_markup" => json_encode($this->reply_markup),
            ]);
        }
    }

    /**
     * @param $caption
     * @param $chat_id
     * @param $message_id_or_inline_message_id
     * @param string $type
     * @return mixed
     */
    public function __editMessageCaption($caption, $chat_id, $message_id_or_inline_message_id, $type = "message_id")
    {
        if ($type == "message_id") {
            return $this->mench("editMessageCaption", [
                "chat_id" => $chat_id,
                "text" => $caption,
                "message_id" => $message_id_or_inline_message_id,
                "reply_markup" => json_encode($this->reply_markup),
            ]);
        } else {
            return $this->mench("editMessageCaption", [
                "chat_id" => $chat_id,
                "text" => $caption,
                "inline_message_id" => $message_id_or_inline_message_id,
                "reply_markup" => json_encode($this->reply_markup),
            ]);
        }
    }

    /**
     * @param $chat_id
     * @param $message_id_or_inline_message_id
     * @param string $type
     * @return mixed
     */
    public function __editMessageReplyMarkup($chat_id, $message_id_or_inline_message_id, $type = "message_id")
    {
        if ($type == "message_id") {
            return $this->mench("editMessageReplyMarkup", [
                "chat_id" => $chat_id,
                "message_id" => $message_id_or_inline_message_id,
                "reply_markup" => json_encode($this->reply_markup),
            ]);
        } else {
            return $this->mench("editMessageReplyMarkup", [
                "chat_id" => $chat_id,
                "inline_message_id" => $message_id_or_inline_message_id,
                "reply_markup" => json_encode($this->reply_markup),
            ]);
        }
    }

    public function ___KeyboardMode($mode = "NOMARKUP")
    {
        $mode = strtolower($mode);
        switch ($mode) {
            case "nomarkup":
                return ["remove_keyboard" => true];
                break;
            case "force_reply":
                return ["force_reply" => true];
                break;
        }
    }

    /**
     * @param $video_url
     * @param $video_caption
     * @param string $chat_id
     * @return mixed
     */
    public function __sendVideo($video_url = "RESEND", $video_caption = "", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        if ($video_url == "RESEND") {
            $video = $this->update->message->video;
            $video_url = $video->file_id;
        }
        return $this->mench("sendVideo", [
            "chat_id" => $chat_id,
            "video" => $video_url,
            "caption" => $video_caption,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param $video_note_url
     * @param string $chat_id
     * @return mixed
     */
    public function __sendVideoNote($video_note_url = "RESEND", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        if ($video_note_url == "RESEND") {
            $video_note = $this->update->message->video_note;
            $video_note_url = $video_note->file_id;
        }
        return $this->mench("sendVideoNote", [
            "chat_id" => $chat_id,
            "video_note" => $video_note_url,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param $image_url
     * @param string $chat_id
     * @return mixed
     */
    public function __sendSticker($image_url = "RESEND", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        if ($image_url == "RESEND") {
            $sticker = $this->update->message->sticker;
            $image_url = $sticker->file_id;
        }
        return $this->mench("sendSticker", [
            "chat_id" => $chat_id,
            "sticker" => $image_url,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param $audio_url
     * @param string $audio_caption
     * @param string $chat_id
     * @return mixed
     */
    public function __sendAudio($audio_url = "RESEND", $audio_caption = "", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        if ($audio_url == "RESEND") {
            $audio = $this->update->message->audio;
            $audio_url = $audio->file_id;
        }
        return $this->mench("sendAudio", [
            "chat_id" => $chat_id,
            "audio" => $audio_url,
            "caption" => $audio_caption,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param $voice_url
     * @param string $voice_caption
     * @param string $chat_id
     * @return mixed
     */
    public function __sendVoice($voice_url = "RESEND", $voice_caption = "", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        if ($voice_url == "RESEND") {
            $voice = $this->update->message->voice;
            $voice_url = $voice->file_id;
        }
        return $this->mench("sendVoice", [
            "chat_id" => $chat_id,
            "voice" => $voice_url,
            "caption" => $voice_caption,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param string $latitude
     * @param string $longitude
     * @param string $chat_id
     * @return mixed
     */
    public function __sendLocation($latitude = "RESEND", $longitude = "RESEND", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        if ($latitude == "RESEND" && $longitude == "RESEND") {
            $latitude = $this->update->message->location->latitude;
            $longitude = $this->update->message->location->longitude;
        }
        return $this->mench("sendLocation", [
            "chat_id" => $chat_id,
            "latitude" => $latitude,
            "longitude" => $longitude,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param string $latitude
     * @param string $longitude
     * @param string $title
     * @param string $addres
     * @param string $chat_id
     * @return mixed
     */
    public function __sendVenue($latitude = "RESEND", $longitude = "RESEND", $title = "Mr Mench", $addres = "Iran, Mench", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        if ($latitude == "RESEND" && $longitude == "RESEND") {
            $latitude = $this->update->message->venue->latitude;
            $longitude = $this->update->message->venue->longitude;
            $title = $this->update->message->venue->title;
            $addres = $this->update->message->venue->addres;
        }
        return $this->mench("sendVenue", [
            "chat_id" => $chat_id,
            "latitude" => $latitude,
            "longitude" => $longitude,
            "title" => $title,
            "addres" => $addres,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param string $phone_number
     * @param string $first_name
     * @param string $last_name
     * @param string $chat_id
     * @return mixed
     */
    public function __sendContact($phone_number = "RESEND", $first_name = "", $last_name = "", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        if ($phone_number == "RESEND") {
            $phone_number = $this->update->message->contact->phone_number;
            $first_name = $this->update->message->contact->first_name;
            $last_name = $this->update->message->contact->last_name;
        }
        return $this->mench("sendContact", [
            "chat_id" => $chat_id,
            "phone_number" => $phone_number,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param $message_text
     * @return mixed
     */
    public function ___telegramStr($message_text)
    {
        $str = str_replace("FROM_FNAME", $this->update->message->from->first_name, $message_text);
        $str = str_replace("FROM_LNAME", $this->update->message->from->last_name, $str);
        $str = str_replace("FROM_USERNAME", $this->update->message->from->username, $str);
        $str = str_replace("FROM_IS_BOT", $this->update->message->from->is_bot, $str);
        $str = str_replace("FROM_LANG_CODE", $this->update->message->from->language_code, $str);
        $str = str_replace("FROM_ID", $this->update->message->from->id, $str);

        $str = str_replace("CHAT_ID", $this->update->message->chat->id, $str);
        $str = str_replace("CHAT_TYPE", $this->update->message->chat->type, $str);
        $str = str_replace("CHAT_TITLE", $this->update->message->chat->title, $str);
        $str = str_replace("CHAT_USERNAME", $this->update->message->chat->username, $str);
        $str = str_replace("CHAT_FNAME", $this->update->message->chat->first_name, $str);
        $str = str_replace("CHAT_LNAME", $this->update->message->chat->last_name, $str);
        $str = str_replace("CHAT_AMAA", $this->update->message->chat->all_members_are_administrators, $str);
        $str = str_replace("CHAT_DESC", $this->update->message->chat->description, $str);
        $str = str_replace("CHAT_LINK", $this->update->message->chat->invite_link, $str);
        $str = str_replace("CHAT_MSGPINNED", $this->update->message->chat->pinned_message, $str);
        $str = str_replace("CHAT_BIG_PHOTO", $this->update->message->chat->photo->big_file_id, $str);
        $str = str_replace("CHAT_SMALL_PHOTO", $this->update->message->chat->photo->small_file_id, $str);

        return$str;
    }

    /**
     * @param string $action
     * @param string $chat_id
     * @return mixed
     */
    public function __sendChatAction($action = "typing", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        return $this->mench("sendChatAction", [
            "chat_id" => $chat_id,
            "action" => $action,
        ]);
    }


    /**
     * @param $document_url
     * @param $document_caption
     * @param string $chat_id
     * @return mixed
     */
    public function __sendDocument($document_url = "RESEND", $document_caption = "", $chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["from"]["id"];
        }
        if ($document_url == "RESEND") {
            $document = $this->update->message->document;
            $document_url = $document->file_id;
        }
        return $this->mench("sendDocument", [
            "chat_id" => $chat_id,
            "document" => $document_url,
            "caption" => $document_caption,
            "reply_markup" => json_encode($this->reply_markup),
        ]);
    }

    /**
     * @param string $chat_id
     * @return mixed
     */
    public function isTyping($chat_id = "")
    {
        if ($chat_id == "") {
            $chat_id = $this->variable()["chat"]["id"];
        }

        return $this->mench("sendChatAction", [
            "chat_id" => $chat_id,
            "action" => "typing"
        ]);
    }

    public function variable()
    {
        $update = $this->update;
        $response["update_id"] = $update->update_id;
        if (isset($update->message)) {
            $message = $update->message;
            $response["message_id"] = $message->message_id;
            $response["from"] = ["id" => $message->from->id, "is_bot" => $message->from->is_bot, "first_name" => $message->from->first_name, "last_name" => $message->from->last_name, "username" => $message->from->username, "language_code" => $message->from->language_code,];
            $response["date"] = $message->date;
            $response["chat"] = ["id" => $message->chat->id, "type" => $message->chat->type, "title" => $message->chat->title, "username" => $message->chat->username, "first_name" => $message->chat->first_name, "last_name" => $message->chat->last_name, "all_members_are_administrators" => $message->chat->all_members_are_administrators, "description" => $message->chat->description, "invite_link" => $message->chat->invite_link, "pinned_message" => $message->chat->pinned_message, "photo" => ["small_file_id" => $message->chat->small_file_id, "big_file_id" => $message->chat->big_file_id]];
            $response["forward_from"] = ["id" => $message->forward_from->id, "is_bot" => $message->forward_from->is_bot, "first_name" => $message->forward_from->first_name, "last_name" => $message->forward_from->last_name, "username" => $message->forward_from->username, "language_code" => $message->forward_from->language_code,];
            $response["forward_from_chat"] = ["id" => $message->forward_from_chat->id, "type" => $message->forward_from_chat->type, "title" => $message->forward_from_chat->title, "username" => $message->forward_from_chat->username, "first_name" => $message->forward_from_chat->first_name, "last_name" => $message->forward_from_chat->last_name, "all_members_are_administrators" => $message->forward_from_chat->all_members_are_administrators, "description" => $message->forward_from_chat->description, "invite_link" => $message->forward_from_chat->invite_link, "pinned_message" => $message->forward_from_chat->pinned_message, "photo" => ["small_file_id" => $message->forward_from_chat->small_file_id, "big_file_id" => $message->forward_from_chat->big_file_id]];
            $response["forward_from_message_id"] = $message->forward_from_message_id;
            $response["forward_signature"] = $message->forward_signature;
            $response["forward_date"] = $message->forward_date;
            $response["edit_date"] = $message->edit_date;
            $response["author_signature"] = $message->author_signature;
            $response["text"] = $message->text;
            $entites = $message->entities;
            $entites = $entites[count($entites) - 1];
            $response["entities"] = ["type" => $entites->type, "offset" => $entites->offset, "length" => $entites->length, "url" => $entites->url, "user" => ["id" => $entites->user->id, "is_bot" => $entites->user->is_bot, "first_name" => $entites->user->first_name, "last_name" => $entites->user->last_name, "username" => $entites->user->username, "language_code" => $entites->user->language_code,]];
            $response["audio"] = ["file_id" => $message->audio->file_id, "duration" => $message->audio->duration, "performer" => $message->audio->performer, "title" => $message->audio->title, "mime_type" => $message->audio->mime_type, "file_size" => $message->audio->file_size,];
            $response["document"] = ["file_id" => $message->document->file_id, "thumb" => $message->document->thumb, "file_name" => $message->document->file_name, "mime_type" => $message->document->mime_type, "file_size" => $message->document->file_size,];
            $response["game"] = ["title" => $message->game->title, "description" => $message->game->description, "text" => $message->game->text,];
        } else if (isset($update->callback_query)) {
            $message = $update->callback_query;
            $response["id"] = $message->id;
            $response["from"] = ["id" => $message->from->id, "is_bot" => $message->from->is_bot, "first_name" => $message->from->first_name, "last_name" => $message->from->last_name, "username" => $message->from->username, "language_code" => $message->from->language_code,];
            $response["data"] = $message->data;
            $response["message_id"] = $update->callback_query->message->message_id;
            $response["inline_message_id"] = $message->inline_message_id;
        }
        return $response;
    }


    /**
     * @param $method
     * @param array $datas
     * @return mixed
     */
    public function mench($method, $datas = [])
    {

        $url = "https://api.telegram.org/bot" . $this->getToken() . "/" . $method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
        $res = curl_exec($ch);
        if (curl_error($ch)) {
            return curl_error($ch);
        } else {
            return json_decode($res);
        }
    }
}

class MoreFunction extends TPC_MB
{

    /**
     * @param $length
     * @param string $keyspace
     * @return string
     * @throws Exception
     */
    public function generateRandomStr(
        $length = 8,
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    )
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        if ($max < 1) {
            throw new Exception('$keyspace must be at least two characters long');
        }
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }
}

class JalaliDate
{
    /**
     * @param $format
     * @param string $timestamp
     * @param string $none
     * @param string $time_zone
     * @param string $tr_num
     * @return string
     */
    public function jdate($format, $timestamp = '', $none = '', $time_zone = 'Asia/Tehran', $tr_num = 'en')
    {

        $T_sec = 0;/* <= رفع خطاي زمان سرور ، با اعداد '+' و '-' بر حسب ثانيه */

        if ($time_zone != 'local') date_default_timezone_set(($time_zone === '') ? 'Asia/Tehran' : $time_zone);
        $ts = $T_sec + (($timestamp === '') ? time() : $this->tr_num($timestamp));
        $date = explode('_', date('H_i_j_n_O_P_s_w_Y', $ts));
        list($j_y, $j_m, $j_d) = $this->gregorian_to_jalali($date[8], $date[3], $date[2]);
        $doy = ($j_m < 7) ? (($j_m - 1) * 31) + $j_d - 1 : (($j_m - 7) * 30) + $j_d + 185;
        $kab = (((($j_y % 33) % 4) - 1) == ((int)(($j_y % 33) * 0.05))) ? 1 : 0;
        $sl = strlen($format);
        $out = '';
        for ($i = 0; $i < $sl; $i++) {
            $sub = substr($format, $i, 1);
            if ($sub == '\\') {
                $out .= substr($format, ++$i, 1);
                continue;
            }
            switch ($sub) {

                case'E':
                case'R':
                case'x':
                case'X':
                    $out .= 'http://jdf.scr.ir';
                    break;

                case'B':
                case'e':
                case'g':
                case'G':
                case'h':
                case'I':
                case'T':
                case'u':
                case'Z':
                    $out .= date($sub, $ts);
                    break;

                case'a':
                    $out .= ($date[0] < 12) ? 'ق.ظ' : 'ب.ظ';
                    break;

                case'A':
                    $out .= ($date[0] < 12) ? 'قبل از ظهر' : 'بعد از ظهر';
                    break;

                case'b':
                    $out .= (int)($j_m / 3.1) + 1;
                    break;

                case'c':
                    $out .= $j_y . '/' . $j_m . '/' . $j_d . ' ،' . $date[0] . ':' . $date[1] . ':' . $date[6] . ' ' . $date[5];
                    break;

                case'C':
                    $out .= (int)(($j_y + 99) / 100);
                    break;

                case'd':
                    $out .= ($j_d < 10) ? '0' . $j_d : $j_d;
                    break;

                case'D':
                    $out .= $this->jdate_words(array('kh' => $date[7]), ' ');
                    break;

                case'f':
                    $out .= $this->jdate_words(array('ff' => $j_m), ' ');
                    break;

                case'F':
                    $out .= $this->jdate_words(array('mm' => $j_m), ' ');
                    break;

                case'H':
                    $out .= $date[0];
                    break;

                case'i':
                    $out .= $date[1];
                    break;

                case'j':
                    $out .= $j_d;
                    break;

                case'J':
                    $out .= $this->jdate_words(array('rr' => $j_d), ' ');
                    break;

                case'k';
                    $out .= $this->tr_num(100 - (int)($doy / ($kab + 365) * 1000) / 10, $tr_num);
                    break;

                case'K':
                    $out .= $this->tr_num((int)($doy / ($kab + 365) * 1000) / 10, $tr_num);
                    break;

                case'l':
                    $out .= $this->jdate_words(array('rh' => $date[7]), ' ');
                    break;

                case'L':
                    $out .= $kab;
                    break;

                case'm':
                    $out .= ($j_m > 9) ? $j_m : '0' . $j_m;
                    break;

                case'M':
                    $out .= $this->jdate_words(array('km' => $j_m), ' ');
                    break;

                case'n':
                    $out .= $j_m;
                    break;

                case'N':
                    $out .= $date[7] + 1;
                    break;

                case'o':
                    $jdw = ($date[7] == 6) ? 0 : $date[7] + 1;
                    $dny = 364 + $kab - $doy;
                    $out .= ($jdw > ($doy + 3) and $doy < 3) ? $j_y - 1 : (((3 - $dny) > $jdw and $dny < 3) ? $j_y + 1 : $j_y);
                    break;

                case'O':
                    $out .= $date[4];
                    break;

                case'p':
                    $out .= $this->jdate_words(array('mb' => $j_m), ' ');
                    break;

                case'P':
                    $out .= $date[5];
                    break;

                case'q':
                    $out .= $this->jdate_words(array('sh' => $j_y), ' ');
                    break;

                case'Q':
                    $out .= $kab + 364 - $doy;
                    break;

                case'r':
                    $key = $this->jdate_words(array('rh' => $date[7], 'mm' => $j_m));
                    $out .= $date[0] . ':' . $date[1] . ':' . $date[6] . ' ' . $date[4] . ' ' . $key['rh'] . '، ' . $j_d . ' ' . $key['mm'] . ' ' . $j_y;
                    break;

                case's':
                    $out .= $date[6];
                    break;

                case'S':
                    $out .= 'ام';
                    break;

                case't':
                    $out .= ($j_m != 12) ? (31 - (int)($j_m / 6.5)) : ($kab + 29);
                    break;

                case'U':
                    $out .= $ts;
                    break;

                case'v':
                    $out .= jdate_words(array('ss' => ($j_y % 100)), ' ');
                    break;

                case'V':
                    $out .= jdate_words(array('ss' => $j_y), ' ');
                    break;

                case'w':
                    $out .= ($date[7] == 6) ? 0 : $date[7] + 1;
                    break;

                case'W':
                    $avs = (($date[7] == 6) ? 0 : $date[7] + 1) - ($doy % 7);
                    if ($avs < 0) $avs += 7;
                    $num = (int)(($doy + $avs) / 7);
                    if ($avs < 4) {
                        $num++;
                    } elseif ($num < 1) {
                        $num = ($avs == 4 or $avs == ((((($j_y % 33) % 4) - 2) == ((int)(($j_y % 33) * 0.05))) ? 5 : 4)) ? 53 : 52;
                    }
                    $aks = $avs + $kab;
                    if ($aks == 7) $aks = 0;
                    $out .= (($kab + 363 - $doy) < $aks and $aks < 3) ? '01' : (($num < 10) ? '0' . $num : $num);
                    break;

                case'y':
                    $out .= substr($j_y, 2, 2);
                    break;

                case'Y':
                    $out .= $j_y;
                    break;

                case'z':
                    $out .= $doy;
                    break;

                default:
                    $out .= $sub;
            }
        }
        return ($tr_num != 'en') ? $this->tr_num($out, 'fa', '.') : $out;
    }

    /**
     * @param $format
     * @param string $timestamp
     * @param string $none
     * @param string $time_zone
     * @param string $tr_num
     * @return string
     */
    public function jstrftime($format, $timestamp = '', $none = '', $time_zone = 'Asia/Tehran', $tr_num = 'en')
    {

        $T_sec = 0;/* <= رفع خطاي زمان سرور ، با اعداد '+' و '-' بر حسب ثانيه */

        if ($time_zone != 'local') date_default_timezone_set(($time_zone === '') ? 'Asia/Tehran' : $time_zone);
        $ts = $T_sec + (($timestamp === '') ? time() : $this->tr_num($timestamp));
        $date = explode('_', date('h_H_i_j_n_s_w_Y', $ts));
        list($j_y, $j_m, $j_d) = $this->gregorian_to_jalali($date[7], $date[4], $date[3]);
        $doy = ($j_m < 7) ? (($j_m - 1) * 31) + $j_d - 1 : (($j_m - 7) * 30) + $j_d + 185;
        $kab = (((($j_y % 33) % 4) - 1) == ((int)(($j_y % 33) * 0.05))) ? 1 : 0;
        $sl = strlen($format);
        $out = '';
        for ($i = 0; $i < $sl; $i++) {
            $sub = substr($format, $i, 1);
            if ($sub == '%') {
                $sub = substr($format, ++$i, 1);
            } else {
                $out .= $sub;
                continue;
            }
            switch ($sub) {

                /* Day */
                case'a':
                    $out .= $this->jdate_words(array('kh' => $date[6]), ' ');
                    break;

                case'A':
                    $out .= $this->jdate_words(array('rh' => $date[6]), ' ');
                    break;

                case'd':
                    $out .= ($j_d < 10) ? '0' . $j_d : $j_d;
                    break;

                case'e':
                    $out .= ($j_d < 10) ? ' ' . $j_d : $j_d;
                    break;

                case'j':
                    $out .= str_pad($doy + 1, 3, 0, STR_PAD_LEFT);
                    break;

                case'u':
                    $out .= $date[6] + 1;
                    break;

                case'w':
                    $out .= ($date[6] == 6) ? 0 : $date[6] + 1;
                    break;

                /* Week */
                case'U':
                    $avs = (($date[6] < 5) ? $date[6] + 2 : $date[6] - 5) - ($doy % 7);
                    if ($avs < 0) $avs += 7;
                    $num = (int)(($doy + $avs) / 7) + 1;
                    if ($avs > 3 or $avs == 1) $num--;
                    $out .= ($num < 10) ? '0' . $num : $num;
                    break;

                case'V':
                    $avs = (($date[6] == 6) ? 0 : $date[6] + 1) - ($doy % 7);
                    if ($avs < 0) $avs += 7;
                    $num = (int)(($doy + $avs) / 7);
                    if ($avs < 4) {
                        $num++;
                    } elseif ($num < 1) {
                        $num = ($avs == 4 or $avs == ((((($j_y % 33) % 4) - 2) == ((int)(($j_y % 33) * 0.05))) ? 5 : 4)) ? 53 : 52;
                    }
                    $aks = $avs + $kab;
                    if ($aks == 7) $aks = 0;
                    $out .= (($kab + 363 - $doy) < $aks and $aks < 3) ? '01' : (($num < 10) ? '0' . $num : $num);
                    break;

                case'W':
                    $avs = (($date[6] == 6) ? 0 : $date[6] + 1) - ($doy % 7);
                    if ($avs < 0) $avs += 7;
                    $num = (int)(($doy + $avs) / 7) + 1;
                    if ($avs > 3) $num--;
                    $out .= ($num < 10) ? '0' . $num : $num;
                    break;

                /* Month */
                case'b':
                case'h':
                    $out .= $this->jdate_words(array('km' => $j_m), ' ');
                    break;

                case'B':
                    $out .= $this->jdate_words(array('mm' => $j_m), ' ');
                    break;

                case'm':
                    $out .= ($j_m > 9) ? $j_m : '0' . $j_m;
                    break;

                /* Year */
                case'C':
                    $tmp = (int)($j_y / 100);
                    $out .= ($tmp > 9) ? $tmp : '0' . $tmp;
                    break;

                case'g':
                    $jdw = ($date[6] == 6) ? 0 : $date[6] + 1;
                    $dny = 364 + $kab - $doy;
                    $out .= substr(($jdw > ($doy + 3) and $doy < 3) ? $j_y - 1 : (((3 - $dny) > $jdw and $dny < 3) ? $j_y + 1 : $j_y), 2, 2);
                    break;

                case'G':
                    $jdw = ($date[6] == 6) ? 0 : $date[6] + 1;
                    $dny = 364 + $kab - $doy;
                    $out .= ($jdw > ($doy + 3) and $doy < 3) ? $j_y - 1 : (((3 - $dny) > $jdw and $dny < 3) ? $j_y + 1 : $j_y);
                    break;

                case'y':
                    $out .= substr($j_y, 2, 2);
                    break;

                case'Y':
                    $out .= $j_y;
                    break;

                /* Time */
                case'H':
                    $out .= $date[1];
                    break;

                case'I':
                    $out .= $date[0];
                    break;

                case'l':
                    $out .= ($date[0] > 9) ? $date[0] : ' ' . (int)$date[0];
                    break;

                case'M':
                    $out .= $date[2];
                    break;

                case'p':
                    $out .= ($date[1] < 12) ? 'قبل از ظهر' : 'بعد از ظهر';
                    break;

                case'P':
                    $out .= ($date[1] < 12) ? 'ق.ظ' : 'ب.ظ';
                    break;

                case'r':
                    $out .= $date[0] . ':' . $date[2] . ':' . $date[5] . ' ' . (($date[1] < 12) ? 'قبل از ظهر' : 'بعد از ظهر');
                    break;

                case'R':
                    $out .= $date[1] . ':' . $date[2];
                    break;

                case'S':
                    $out .= $date[5];
                    break;

                case'T':
                    $out .= $date[1] . ':' . $date[2] . ':' . $date[5];
                    break;

                case'X':
                    $out .= $date[0] . ':' . $date[2] . ':' . $date[5];
                    break;

                case'z':
                    $out .= date('O', $ts);
                    break;

                case'Z':
                    $out .= date('T', $ts);
                    break;

                /* Time and Date Stamps */
                case'c':
                    $key = $this->jdate_words(array('rh' => $date[6], 'mm' => $j_m));
                    $out .= $date[1] . ':' . $date[2] . ':' . $date[5] . ' ' . date('P', $ts) . ' ' . $key['rh'] . '، ' . $j_d . ' ' . $key['mm'] . ' ' . $j_y;
                    break;

                case'D':
                    $out .= substr($j_y, 2, 2) . '/' . (($j_m > 9) ? $j_m : '0' . $j_m) . '/' . (($j_d < 10) ? '0' . $j_d : $j_d);
                    break;

                case'F':
                    $out .= $j_y . '-' . (($j_m > 9) ? $j_m : '0' . $j_m) . '-' . (($j_d < 10) ? '0' . $j_d : $j_d);
                    break;

                case's':
                    $out .= $ts;
                    break;

                case'x':
                    $out .= substr($j_y, 2, 2) . '/' . (($j_m > 9) ? $j_m : '0' . $j_m) . '/' . (($j_d < 10) ? '0' . $j_d : $j_d);
                    break;

                /* Miscellaneous */
                case'n':
                    $out .= "\n";
                    break;

                case't':
                    $out .= "\t";
                    break;

                case'%':
                    $out .= '%';
                    break;

                default:
                    $out .= $sub;
            }
        }
        return ($tr_num != 'en') ? $this->tr_num($out, 'fa', '.') : $out;
    }

    /**
     * @param string $h
     * @param string $m
     * @param string $s
     * @param string $jm
     * @param string $jd
     * @param string $jy
     * @param string $none
     * @param string $timezone
     * @return false|int
     */
    public function jmktime($h = '', $m = '', $s = '', $jm = '', $jd = '', $jy = '', $none = '', $timezone = 'Asia/Tehran')
    {
        if ($timezone != 'local') date_default_timezone_set($timezone);
        if ($h === '') {
            return time();
        } else {
            list($h, $m, $s, $jm, $jd, $jy) = explode('_', $this->tr_num($h . '_' . $m . '_' . $s . '_' . $jm . '_' . $jd . '_' . $jy));
            if ($m === '') {
                return mktime($h);
            } else {
                if ($s === '') {
                    return mktime($h, $m);
                } else {
                    if ($jm === '') {
                        return mktime($h, $m, $s);
                    } else {
                        $jdate = explode('_', $this->jdate('Y_j', '', '', $timezone, 'en'));
                        if ($jd === '') {
                            list($gy, $gm, $gd) = $this->jalali_to_gregorian($jdate[0], $jm, $jdate[1]);
                            return mktime($h, $m, $s, $gm);
                        } else {
                            if ($jy === '') {
                                list($gy, $gm, $gd) = $this->jalali_to_gregorian($jdate[0], $jm, $jd);
                                return mktime($h, $m, $s, $gm, $gd);
                            } else {
                                list($gy, $gm, $gd) = $this->jalali_to_gregorian($jy, $jm, $jd);
                                return mktime($h, $m, $s, $gm, $gd, $gy);
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * @param string $timestamp
     * @param string $none
     * @param string $timezone
     * @param string $tn
     * @return array
     */
    public function jgetdate($timestamp = '', $none = '', $timezone = 'Asia/Tehran', $tn = 'en')
    {
        $ts = ($timestamp === '') ? time() : $this->tr_num($timestamp);
        $jdate = explode('_', $this->jdate('F_G_i_j_l_n_s_w_Y_z', $ts, '', $timezone, $tn));
        return array(
            'seconds' => $this->tr_num((int)$this->tr_num($jdate[6]), $tn),
            'minutes' => $this->tr_num((int)$this->tr_num($jdate[2]), $tn),
            'hours' => $jdate[1],
            'mday' => $jdate[3],
            'wday' => $jdate[7],
            'mon' => $jdate[5],
            'year' => $jdate[8],
            'yday' => $jdate[9],
            'weekday' => $jdate[4],
            'month' => $jdate[0],
            0 => $this->tr_num($ts, $tn)
        );
    }

    /**
     * @param $jm
     * @param $jd
     * @param $jy
     * @return bool
     */
    public function jcheckdate($jm, $jd, $jy)
    {
        list($jm, $jd, $jy) = explode('_', $this->tr_num($jm . '_' . $jd . '_' . $jy));
        $l_d = ($jm == 12) ? ((((($jy % 33) % 4) - 1) == ((int)(($jy % 33) * 0.05))) ? 30 : 29) : 31 - (int)($jm / 6.5);
        return ($jm > 12 or $jd > $l_d or $jm < 1 or $jd < 1 or $jy < 1) ? false : true;
    }

    /**
     * @param $str
     * @param string $mod
     * @param string $mf
     * @return mixed
     */
    public function tr_num($str, $mod = 'en', $mf = '٫')
    {
        $num_a = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.');
        $key_a = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', $mf);
        return ($mod == 'fa') ? str_replace($num_a, $key_a, $str) : str_replace($key_a, $num_a, $str);
    }

    /**
     * @param $array
     * @param string $mod
     * @return string
     */
    public function jdate_words($array, $mod = '')
    {
        foreach ($array as $type => $num) {
            $num = (int)$this->tr_num($num);
            switch ($type) {

                case'ss':
                    $sl = strlen($num);
                    $xy3 = substr($num, 2 - $sl, 1);
                    $h3 = $h34 = $h4 = '';
                    if ($xy3 == 1) {
                        $p34 = '';
                        $k34 = array('ده', 'یازده', 'دوازده', 'سیزده', 'چهارده', 'پانزده', 'شانزده', 'هفده', 'هجده', 'نوزده');
                        $h34 = $k34[substr($num, 2 - $sl, 2) - 10];
                    } else {
                        $xy4 = substr($num, 3 - $sl, 1);
                        $p34 = ($xy3 == 0 or $xy4 == 0) ? '' : ' و ';
                        $k3 = array('', '', 'بیست', 'سی', 'چهل', 'پنجاه', 'شصت', 'هفتاد', 'هشتاد', 'نود');
                        $h3 = $k3[$xy3];
                        $k4 = array('', 'یک', 'دو', 'سه', 'چهار', 'پنج', 'شش', 'هفت', 'هشت', 'نه');
                        $h4 = $k4[$xy4];
                    }
                    $array[$type] = (($num > 99) ? str_replace(array('12', '13', '14', '19', '20')
                                , array('هزار و دویست', 'هزار و سیصد', 'هزار و چهارصد', 'هزار و نهصد', 'دوهزار')
                                , substr($num, 0, 2)) . ((substr($num, 2, 2) == '00') ? '' : ' و ') : '') . $h3 . $p34 . $h34 . $h4;
                    break;

                case'mm':
                    $key = array('فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند');
                    $array[$type] = $key[$num - 1];
                    break;

                case'rr':
                    $key = array('یک', 'دو', 'سه', 'چهار', 'پنج', 'شش', 'هفت', 'هشت', 'نه', 'ده', 'یازده', 'دوازده', 'سیزده'
                    , 'چهارده', 'پانزده', 'شانزده', 'هفده', 'هجده', 'نوزده', 'بیست', 'بیست و یک', 'بیست و دو', 'بیست و سه'
                    , 'بیست و چهار', 'بیست و پنج', 'بیست و شش', 'بیست و هفت', 'بیست و هشت', 'بیست و نه', 'سی', 'سی و یک');
                    $array[$type] = $key[$num - 1];
                    break;

                case'rh':
                    $key = array('یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنجشنبه', 'جمعه', 'شنبه');
                    $array[$type] = $key[$num];
                    break;

                case'sh':
                    $key = array('مار', 'اسب', 'گوسفند', 'میمون', 'مرغ', 'سگ', 'خوک', 'موش', 'گاو', 'پلنگ', 'خرگوش', 'نهنگ');
                    $array[$type] = $key[$num % 12];
                    break;

                case'mb':
                    $key = array('حمل', 'ثور', 'جوزا', 'سرطان', 'اسد', 'سنبله', 'میزان', 'عقرب', 'قوس', 'جدی', 'دلو', 'حوت');
                    $array[$type] = $key[$num - 1];
                    break;

                case'ff':
                    $key = array('بهار', 'تابستان', 'پاییز', 'زمستان');
                    $array[$type] = $key[(int)($num / 3.1)];
                    break;

                case'km':
                    $key = array('فر', 'ار', 'خر', 'تی‍', 'مر', 'شه‍', 'مه‍', 'آب‍', 'آذ', 'دی', 'به‍', 'اس‍');
                    $array[$type] = $key[$num - 1];
                    break;

                case'kh':
                    $key = array('ی', 'د', 'س', 'چ', 'پ', 'ج', 'ش');
                    $array[$type] = $key[$num];
                    break;

                default:
                    $array[$type] = $num;
            }
        }
        return ($mod === '') ? $array : implode($mod, $array);
    }

    /**
     * @param $gy
     * @param $gm
     * @param $gd
     * @param string $mod
     * @return array|string
     */
    public function gregorian_to_jalali($gy, $gm, $gd, $mod = '')
    {
        list($gy, $gm, $gd) = explode('_', $this->tr_num($gy . '_' . $gm . '_' . $gd));/* <= Extra :اين سطر ، جزء تابع اصلي نيست */
        $g_d_m = array(0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
        if ($gy > 1600) {
            $jy = 979;
            $gy -= 1600;
        } else {
            $jy = 0;
            $gy -= 621;
        }
        $gy2 = ($gm > 2) ? ($gy + 1) : $gy;
        $days = (365 * $gy) + ((int)(($gy2 + 3) / 4)) - ((int)(($gy2 + 99) / 100)) + ((int)(($gy2 + 399) / 400)) - 80 + $gd + $g_d_m[$gm - 1];
        $jy += 33 * ((int)($days / 12053));
        $days %= 12053;
        $jy += 4 * ((int)($days / 1461));
        $days %= 1461;
        $jy += (int)(($days - 1) / 365);
        if ($days > 365) $days = ($days - 1) % 365;
        if ($days < 186) {
            $jm = 1 + (int)($days / 31);
            $jd = 1 + ($days % 31);
        } else {
            $jm = 7 + (int)(($days - 186) / 30);
            $jd = 1 + (($days - 186) % 30);
        }
        return ($mod === '') ? array($jy, $jm, $jd) : $jy . $mod . $jm . $mod . $jd;
    }

    /**
     * @param $jy
     * @param $jm
     * @param $jd
     * @param string $mod
     * @return array|string
     */
    public function jalali_to_gregorian($jy, $jm, $jd, $mod = '')
    {
        list($jy, $jm, $jd) = explode('_', $this->tr_num($jy . '_' . $jm . '_' . $jd));/* <= Extra :اين سطر ، جزء تابع اصلي نيست */
        if ($jy > 979) {
            $gy = 1600;
            $jy -= 979;
        } else {
            $gy = 621;
        }
        $days = (365 * $jy) + (((int)($jy / 33)) * 8) + ((int)((($jy % 33) + 3) / 4)) + 78 + $jd + (($jm < 7) ? ($jm - 1) * 31 : (($jm - 7) * 30) + 186);
        $gy += 400 * ((int)($days / 146097));
        $days %= 146097;
        if ($days > 36524) {
            $gy += 100 * ((int)(--$days / 36524));
            $days %= 36524;
            if ($days >= 365) $days++;
        }
        $gy += 4 * ((int)(($days) / 1461));
        $days %= 1461;
        $gy += (int)(($days - 1) / 365);
        if ($days > 365) $days = ($days - 1) % 365;
        $gd = $days + 1;
        foreach (array(0, 31, ((($gy % 4 == 0) and ($gy % 100 != 0)) or ($gy % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31) as $gm => $v) {
            if ($gd <= $v) break;
            $gd -= $v;
        }
        return ($mod === '') ? array($gy, $gm, $gd) : $gy . $mod . $gm . $mod . $gd;
    }
}
