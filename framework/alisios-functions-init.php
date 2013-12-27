<?php

$extensionsDirectory = get_template_directory() . '/framework/extensions';

/* LESS */
require_once( $extensionsDirectory . '/less/init.php' );

/* Bootstrap */
require_once( $extensionsDirectory . '/bootstrap/init.php' );

/* Languages */
require_once( $extensionsDirectory . '/languages/init.php' );