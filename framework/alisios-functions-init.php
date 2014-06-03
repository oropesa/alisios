<?php

// ~~ VARS

//bool
define( 'ALISIOS_USE_LESS', true );

//textdomain
define( 'ALISIOS_I18N', 'alisios' );

//urls
define( 'ALISIOS_URL_STYLE',     get_stylesheet_uri()                );
define( 'ALISIOS_URL_THEME',     get_template_directory_uri()        );
define( 'ALISIOS_URL_FRAMEWORK', ALISIOS_URL_THEME . '/framework'    );
define( 'ALISIOS_URL_FONTS',     ALISIOS_URL_FRAMEWORK . '/fonts'    );
define( 'ALISIOS_URL_CSS',       ALISIOS_URL_FRAMEWORK . '/css'      );
define( 'ALISIOS_URL_JS_LIB',    ALISIOS_URL_FRAMEWORK . '/js/jslib' );
define( 'ALISIOS_URL_JS',        ALISIOS_URL_FRAMEWORK . '/js'       );
define( 'ALISIOS_URL_LESS',      ALISIOS_URL_FRAMEWORK . '/less'     );


//dir
define( 'ALISIOS_DIR_THEME',     get_template_directory());
define( 'ALISIOS_DIR_FRAMEWORK', ALISIOS_DIR_THEME . '/framework'    );
define( 'ALISIOS_DIR_INC',       ALISIOS_DIR_FRAMEWORK . '/includes' );
define( 'ALISIOS_DIR_FRONT',     ALISIOS_DIR_FRAMEWORK . '/front'    );
define( 'ALISIOS_DIR_ADMIN',     ALISIOS_DIR_FRAMEWORK . '/admin'    );

// ~~ LOAD FRONT FUNCTIONS

require_once( ALISIOS_DIR_FRAMEWORK . '/alisios-hooks.php'  );
require_once( ALISIOS_DIR_FRAMEWORK . '/alisios-setup.php'  );

require_once( ALISIOS_DIR_FRONT . '/front-head.php'     );
require_once( ALISIOS_DIR_FRONT . '/front-header.php'   );
require_once( ALISIOS_DIR_FRONT . '/front-content.php'  );
require_once( ALISIOS_DIR_FRONT . '/front-sidebar.php'  );
require_once( ALISIOS_DIR_FRONT . '/front-footer.php'   );
require_once( ALISIOS_DIR_FRONT . '/front-social.php'   );

// ~~ LOAD ADMIN FUNCTIONS
require_once( ALISIOS_DIR_ADMIN . '/alisios-admin.php'      );
require_once( ALISIOS_DIR_ADMIN . '/class-social.php'       );
require_once( ALISIOS_DIR_ADMIN . '/class-seoconnection.php');

// ~~ LOAD ACTIONS

require_once( ALISIOS_DIR_FRAMEWORK . '/alisios-actions.php');