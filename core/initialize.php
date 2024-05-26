<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'phprest');
// C:\xampp\htdocs\phprest\includes
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'includes');
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT . DS . 'core');

// Carregar o arquivo de configuração primeiro
require_once(INC_PATH . DS . "config.php");

// Carregar classes principais
require_once(CORE_PATH . DS . "post.php");

// Carregar classes principais
require_once(CORE_PATH . DS . "category.php");
