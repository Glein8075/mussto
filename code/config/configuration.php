<?php 

// Accès base de données
const BD_HOST = 'tassageb.fr';
const BD_DBNAME = 'mussto';
const BD_USER = 'mussto';
const BD_PWD = 'sae-mussto';

//dossiers racines du site
define('PATH_CONTROLLERS','./controllers/c_');
define('PATH_ASSETS','./assets/');
define('PATH_MODELS','./models/m_');
define('PATH_VIEWS','./views/v_');

//passerelle temporaire
define('PATH_TMP',"./code_temp/");
define('PATH_TMP_CSS', PATH_TMP.'style/');
define('PATH_TMP_SCRIPTS',PATH_TMP.'scripts/');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'style/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_SCRIPTS',PATH_ASSETS.'scripts/');