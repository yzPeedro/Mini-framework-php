<?php

/**
 * ===================================
 * Get the autoload file from PSR-4
 * ===================================
 */
require_once("../vendor/autoload.php");

/**
 * ===================================
 * Get the config file from project
 * to run custom functions
 * ===================================
 **/
require_once("../config/config.php");

/**
 * ===================================
 * Get the database configs, it must
 * be renamed to configure your
 * database
 * ===================================
 */
require_once("../config/database.example.php");

/**
 * ===================================
 * Initiate Router class to run the
 * application
 * ===================================
 */
(new \app\http\core\RouterCore);