<?php

declare(strict_types = 1);

namespace CBot;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Telegram\LogHelpers\LengthProcessor;
use Telegram\API\API as TelegramAPI;

require_once __DIR__ . '/vendor/autoload.php';

date_default_timezone_set('Europe/Amsterdam');

echo "Daemon is starting" . PHP_EOL;

$myBot = '';

$logger = new Logger('CBotLogger');
$format = "%datetime% | %level_name% | %context.botname% | %message% %context% %extra%\n";
$formatter = new LineFormatter($format, NULL, FALSE, TRUE);
$processor = new LengthProcessor([
    'level_name' => 8
], [
    'botname' => 8
]);
$logger->pushProcessor($processor);
$cliLog = new StreamHandler(STDOUT, Logger::DEBUG);
$cliLog->setFormatter($formatter);
$logger->pushHandler($cliLog);

$fileLog = new StreamHandler(__DIR__ . '/CBot.log', Logger::DEBUG);
$fileLog->setFormatter($formatter);
$fileLog->pushProcessor($processor);
$logger->pushHandler($fileLog);

$apiLogger = new Logger('ApiLog');
$apiLogger->pushProcessor($processor);
$apiStream = new StreamHandler(__DIR__ . '/TelegramAPI.log', Logger::INFO);
$apiLogger->pushHandler($apiStream);

TelegramAPI::SetLogger($apiLogger);

$bot = new Bot($myBot);
$bot->setLogger($logger);
$bot->init();
$bot->run(FALSE);
