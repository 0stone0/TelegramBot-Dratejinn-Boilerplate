# TelegramBot-Dratejinn-Boilerplate
Telegram Bot Boilerplate based on Dratejinn's awesome Bot API!

## Getting started

### Private token/ID
 1. Place your bot token in `Daemon.php`
 2. Replace your private telgram ID in `src/Bot/Bot.php`

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
