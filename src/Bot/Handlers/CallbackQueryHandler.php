<?php

declare(strict_types = 1);

namespace CBot\Bot\Handlers;

use Telegram\API\Base\InputFile;
use Telegram\API\Type\Chat;
use Telegram\API\Type\InlineKeyboardButton;
use Telegram\API\Type\InlineKeyboardMarkup;
use Telegram\API\Method\SendVideo;
use Telegram\API\Method\SendMessage;
use Telegram\API\Method\SendPhoto;
use Telegram\API\Method\EditMessageText;
use Telegram\Bot\Handler\ACallbackQueryHandler;

class CallbackQueryHandler extends ACallbackQueryHandler {

    public function handle() {

        $bot = $this->_bot;
        $shouldDisableKeyboard = TRUE;

        $from_group     = $this->_callbackQuery->message->chat->id;
        $from_user      = $this->_callbackQuery->from->id;
        $telegram_name  = $this->_callbackQuery->from->firstName ?? '????';
        $data = $this->_callbackQuery->data;
        $dataObj = json_decode($data);

        // Send message
        $message = new SendMessage;
        $message->text = "CallBack: {$data}";
        $message->chatId = $from_group;
        $this->sendMessage($message);

        // Remove keybard
        if ($shouldDisableKeyboard) {
            $this->_removeInlineKeyboard();
        }
    }
}
