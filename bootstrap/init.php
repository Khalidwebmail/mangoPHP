<?php

/**
 * Load env file
 */
require_once __DIR__."/../app/Config/settings.php";

/**
 * Load route file
 */
require_once __DIR__."/../routes/web.php";

/**
 * Database object
 */
new \App\Classes\Database();