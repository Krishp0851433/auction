<?php

namespace App\Lib;

use Monolog\Handler\ErrorLogHandler;
use Monolog\Handler\NativeMailerHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger as Monolog;
class Logger{
    private static $logger = null;
    private $log = null;

    /**
     * @return null
     */
    public static function getLogger()
    {   if(!self::$logger)
        self::$logger = new self();
        return self::$logger;
    }
    /**
     * Logger constructor.
     */
    public function __construct() {
        try {
            $channels = [
                new ErrorLogHandler(ErrorLogHandler::OPERATING_SYSTEM, Monolog::DEBUG),
                new StreamHandler(LOG_LOCATION, Monolog::DEBUG),
                new NativeMailerHandler(CONFIG_ADMINEMAIL, "Critical Error", CONFIG_ADMINEMAIL, Monolog::ALERT),
            ];
            $this->log = new Monolog('Auction');
            foreach ($channels as $channel) {
                $this->log->pushHandler($channel);
            }
        } catch (\Exception $e) {
            error_log("Critical Failure");
            die();
        }
    }

    public function emergency($message,array $context = [])
    {
        $this->writeLog(__FUNCTION__, $message, $context);
    }

    public function alert($message, array $context = [])
        {
            $this->writeLog(__FUNCTION__, $message, $context);

        }
        public function critical($message, array $context = [])
        {
            $this->writeLog(__FUNCTION__, $message, $context);

        }
        public function error($message, array $context = [])
        {
            $this->writeLog(__FUNCTION__, $message, $context);

        }
        public function warning($message, array $context = [])
        {
            $this->writeLog(__FUNCTION__, $message, $context);

        }
        public function notice($message, array $context = [])
        {
            $this->writeLog(__FUNCTION__, $message, $context);

        }
        public function info($message, array $context = [])
        {
            $this->writeLog(__FUNCTION__, $message, $context);

        }


    public function log($level,$message,array $context = []){
        $this->writeLog($level,$message,$context);
    }
    public function write($level,$message,array $context = []){
        $this->writelog($level,$message,$context);
    }
    protected function writeLog($level,$message,array $context = []){
        $message = $this->formatMessage($message);
        $this->log->{$level}($message,$context);
    }
    protected function formatMessage($message){
        if (is_array($message)) {
            return var_export($message, true);
        }
        return $message;
    }
}
?>