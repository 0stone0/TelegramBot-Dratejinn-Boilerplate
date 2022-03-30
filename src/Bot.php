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

    protected $myChatId = 1234567;

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
     * @inheritdoc
     */
    public function init() {
        parent::init();
        $myChat = new Chat;
        $myChat->id = $this->myChatId;
        $myChat->type = Chat::TYPE_PRIVATE;
        $this->_chats = [ $myChat->id => $this->myChatId ];
    }

    /**
     * @inheritdoc
     */
    public function handleUpdates(array $updates) {

        if (!$this->_messageSend) {
            $sendMessage = new SendMessage;
            $sendMessage->text = 'Starting Bot';
            $sendMessage->chatId = $this->myChatId;
            $sendMessage->call($this->_bot);
            $this->_messageSend = true;
        }

        parent::handleUpdates($updates);
    }
}
