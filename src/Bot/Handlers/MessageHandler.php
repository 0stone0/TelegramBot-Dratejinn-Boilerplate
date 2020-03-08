<?php

declare(strict_types = 1);

namespace CBot\Bot\Handlers;

use Telegram\Bot\Handler\AMessageHandler;

class MessageHandler extends AMessageHandler {

    protected $_commandHandlers = [
        Command\Message::class,
        Command\Keyboard::class
    ];

    public function handleText(string $text) {

        $bot = $this->_bot;
        $from = $this->_message->chat->id;

        if (!isset($this->_message->replyToMessage)) {
            $this->sendTextMessage("/Status\n/AllInfo\n/Mute");
        }
    }
}
