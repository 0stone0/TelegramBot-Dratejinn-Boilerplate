<?php

declare(strict_types = 1);

namespace CBot\Bot\Handlers\Command;

use Telegram\Bot\Handler\ACommandHandler;
use Telegram\API\Method\SendMessage;

class Message extends ACommandHandler {
    /**
     * @inheritdoc
     */
    public function handleCommand(string $command) {

        $bot = $this->_bot;
        $from = $this->_message->from->id;
        $from_chat = $this->_message->chat->id;
        $from_name = $this->_message->from->firstName;

        $message = new SendMessage;
        $message->text = $msg;
        $message->chatId = $from_chat;
        $this->sendMessage($message);
    }

    /**
     * @inheritdoc
     */
    public static function GetRespondsTo() : array {
        return [
            'Message',
            'message'
        ];
    }
}
