<?php
$directory = TMM_THEME_PATH."/scss/";
require TMM_THEME_PATH.'/admin/theme_options/scss.inc.php';

$scss = new scssc();

if (TMM::get_option('compress_css')){
    $scss->setFormatter("scss_formatter_compressed");
}

$scss->setImportPaths($directory);

//$handle = fopen(TMM_THEME_PATH . '/css/log.log', 'a');
//fwrite($handle, "\r\ncustom_css1.php 13");
//fclose($handle);

// will search for `assets/stylesheets/mixins.scss'
echo $scss->compile('@import "styles.scss"');