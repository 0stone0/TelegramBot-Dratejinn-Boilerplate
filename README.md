# TelegramBot-Dratejinn-Boilerplate
Telegram Bot Boilerplate based on [Dratejinn's awesome Bot API](https://github.com/Dratejinn/telegrambot/)!

## Getting started

### Private token
Place your bot token in `Daemon.php`
```
19      $myBotToken = '723458UYTHTAR....';
```
or, directly in the bot constructor; `src/Bot/Bot.php`
```
28      public function __construct(string $token = NULL) {
29          if ($token === NULL) {
30              $token = '723458UYTHTAR....';
31          }
32          parent::__construct($token);
33      }
```

### Private Chat ID
Set your private telgram Chat ID in `src/Bot/Bot.php`
```
17      protected $myChatId = 1234567;
```

### Start bot
Direct:
```
php Daemon.php
```

Screen session:
```
screen -S myBot -d -m php ./Daemon.php
```

Systemd:
```
// TODO
```
