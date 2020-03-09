# TelegramBot-Dratejinn-Boilerplate
Telegram Bot Boilerplate based on Dratejinn's awesome Bot API!

## Getting started

### Private token/ID
Place your bot token in `Daemon.php`
```
19      $myBot = '723458UYTHTAR....';
```
or
In directly in the bot construct; `src/Bot/Bot.php`
```
28      public function __construct(string $token = NULL) {
29          if ($token === NULL) {
30              $token = '723458UYTHTAR....';
31          }
32          parent::__construct($token);
33      }
```
Set your private telgram ID in `src/Bot/Bot.php`
```
17      protected $myChatId = 1234567;

```
### Start bot
```
php Daemon.php
```

Screen session;
```
screen -S myBot -d -m php ./Daemon.php
```

Systemd;
```
```
