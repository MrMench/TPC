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
            "reply_markup" => $this->reply_markup,
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
            "reply_markup" => $this->reply_markup,
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
                "reply_markup" => $this->reply_markup,
            ]);
        } else {
            return $this->mench("editMessageText", [
                "chat_id" => $chat_id,
                "text" => $text,
                "parse_mode" => $this->parse_mode,
                "inline_message_id" => $message_id_or_inline_message_id,
                "reply_markup" => $this->reply_markup,
            ]);
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
            "reply_markup" => $this->reply_markup,
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
            "reply_markup" => $this->reply_markup,
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
            "reply_markup" => $this->reply_markup,
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
            "reply_markup" => $this->reply_markup,
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
            "reply_markup" => $this->reply_markup,
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
            "reply_markup" => $this->reply_markup,
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
            "reply_markup" => $this->reply_markup,
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
            "reply_markup" => $this->reply_markup,
        ]);
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
            "reply_markup" => $this->reply_markup,
        ]);
    }

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
            $response["inline_message_id"] = $message->inline_message_id;
            $message = $update->callback_query->message;
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

class MoreFunction extends TPC_MB {

    /**
     * @param $length
     * @param string $keyspace
     * @return string
     * @throws Exception
     */
    public function generateRandomStr(
        $length = 8,
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ) {
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
