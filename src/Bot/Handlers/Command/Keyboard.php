<?php

declare(strict_types = 1);

namespace CBot\Bot\Handlers\Command;

use Telegram\API\Type\{Chat, InlineKeyboardButton, InlineKeyboardMarkup};
use Telegram\Bot\Handler\ACommandHandler;
use Telegram\API\Method\SendMessage;

class Mute extends ACommandHandler {
    /**
     * @inheritdoc
     */
    public function handleCommand(string $command) {

        $bot = $this->_bot;
        $from = $this->_message->from->id;
        $from_chat = $this->_message->chat->id;
        $from_name = $this->_message->from->firstName;

        // Btn 1
        $button_yes = new InlineKeyboardButton;
        $button_yes->text = 'Yes';
        $button_yes->callbackData = 1;

        // Btn 2
        $button_no = new InlineKeyboardButton;
        $button_no->text = 'No';
        $button_no->callbackData = 0;

        // Keyboard
        $keyboard = new InlineKeyboardMarkup;
        $keyboard->inlineKeyboard = [ [ $button_yes, $button_no ] ];

        // Message
        $message = new SendMessage;
        $message->text = 'Yes or No ?';
        $message->chatId = $from_chat;
        $this->sendMessage($message);
    }

    /**
     * @inheritdoc
     */
    public static function GetRespondsTo() : array {
        return [
            'Keyboard',
            'keyboard'
        ];
    }
}
