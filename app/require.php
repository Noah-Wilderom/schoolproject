<?php
// Require libraries van de folder libraries

require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/Database.php';

require_once 'config/config.php';

require_once 'helpers/StudentHelper.class.php';
require_once 'helpers/Log.class.php';
require_once 'helpers/Helpers.class.php';
require_once 'helpers/Mail.class.php';
require_once 'helpers/File.class.php';
require_once 'helpers/Notification.class.php';


// Laad de Core class in

$init = new Core;
if(!isset($_SESSION)) session_start();