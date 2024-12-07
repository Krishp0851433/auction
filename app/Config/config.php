<?php
//Database Configuration
define("DB_HOST", "localhost");
define("DB_USER", "kpatel4");
define("DB_PASSWORD", "10d0q10d0q");
define("DB_NAME", "kpatel4auction");

// Add your name below
define("CONFIG_ADMIN", "Krish Patel");
define("CONFIG_ADMINEMAIL", "W0851433@myscc.ca");
// Add the location of your forums below
define("CONFIG_URL", "https://kpatel4.scweb.ca/auction");
// Add your blog name below
define("CONFIG_AUCTIONNAME", "Web Guys Online Auction");
// The currency used on the auction
define("CONFIG_CURRENCY", "$");

//Set Timezone
date_default_timezone_set("America/Toronto");

//Log Location
define("LOG_LOCATION", __DIR__ . "/../../logs/app.log");

//File Upload Location
define("FILE_UPLOADLOC", "imgs/");


define("CLIENT_ID", "AVVTxK5CCeDFSOWSJGYC5Xz4uWGMadcswh6kMt9bUynzGkK4onmiPbT2UrLSlz593NTmdfLEGQAoYT47");
define("CLIENT_SECRET", "EKMP3eD0nNVI0-qYDDALhpmx2wJ3ryw2obP8P3K1ayrwapKe9esNJDa0t9uHJOkFVZ4UGzjZkBzHaM12");
define("WEBHOOK_ID" , "56V75045RM774744M");
define("PAYPAL_CURRENCY","CAD");
define("PAYPAL_RETURNURL", CONFIG_URL . "/payment-successful.php");
define("PAYPAL_CANCELURL", CONFIG_URL . "/payment-cancelled.php");
?>