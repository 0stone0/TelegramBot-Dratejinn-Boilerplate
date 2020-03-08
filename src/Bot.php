<?php

declare(strict_types = 1);

namespace CBot;

use Telegram\API\Method\SendMessage;
use Telegram\API\Method\SendVideo;
use Telegram\Bot\ABot as TBot;
use Telegram\API\Type\Chat;
use CBot\Bot\Handlers;

class Bot extends TBot {

    protected $_messageSend = FALSE;

    protected $_handlers = [
        'message' => Handlers\MessageHandler::class,
        'callbackQuery' => Handlers\CallbackQueryHandler::class
    ];

    /**
     * Bot constructor.
     * @inheritdoc
     */
    public function __construct(string $token = NULL) {
        if ($token === NULL) {
            $token = '';
        }
        parent::__construct($token);
    }

    /**
     * @inheritdocecho -e '\033]6;1;bg;red;brightness;255\a'e
     */
    public function init() {
        parent::init();

        $myChat = new Chat;
        $myChat->id = $this->myChat_id;
        $myChat->type = Chat::TYPE_PRIVATE;

        $this->_chats = [
            $myChat->id => 123456789,
        ];
    }

    /**
     * @inheritdoc
     */
    public function handleUpdates(array $updates) {

        if (!$this->_messageSend) {
            $sendMessage = new SendMessage;
            $sendMessage->text = 'Starting Bot';
            $sendMessage->chatId = 123456789;
            $sendMessage->call($this->_bot);
            $this->_messageSend = true;
        }

        parent::handleUpdates($updates);
    }
}
