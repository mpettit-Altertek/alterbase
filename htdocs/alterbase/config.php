<?php
// URL
define('HTTP_SERVER',	'http://office-nas:8000/alterbase/'	);
define('HTTPS_SERVER',	'http://office-nas:8000/alterbase/'	);

define('DIR_ROOT', '/var/www/html/htdocs/alterbase/');

// DIR
define('DIR_APPLICATION', 	DIR_ROOT 						);
define('DIR_SYSTEM',		DIR_ROOT . 'system/'			);
define('DIR_IMAGE',			DIR_ROOT . 'image/'				);
define('DIR_LANGUAGE',		DIR_ROOT . 'language/'			);
define('DIR_TEMPLATE',		DIR_ROOT . 'view/template/'		);

define('DIR_STORAGE',		DIR_SYSTEM . 'storage/'			);
define('DIR_CONFIG',		DIR_SYSTEM . 'config/'			);

define('DIR_CACHE',			DIR_STORAGE . 'cache/'			);
define('DIR_DOWNLOAD',		DIR_STORAGE . 'download/'		);
define('DIR_LOGS',			DIR_STORAGE . 'logs/'			);
define('DIR_MODIFICATION',	DIR_STORAGE . 'modification/'	);
define('DIR_SESSION',		DIR_STORAGE . 'session/'		);
define('DIR_UPLOAD',		DIR_STORAGE . 'upload/'			);

// DB
define('DB_DRIVER',		'mysqli'	);
define('DB_HOSTNAME',	'192.168.1.10'	);
define('DB_USERNAME',	'alterbaseDock'	);
define('DB_PASSWORD',	'@cZvZZFdEWUyQO1mW'	);
define('DB_DATABASE',	'alterbase'	);
define('DB_PORT',		'3307'		);
define('DB_PREFIX',		'alt_'		);

