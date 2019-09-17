<?php
/**
 * Yihai CMS
 *
 * Copyright (c) 2019, CodeUP.
 * @author  Upik Saleh <upik@codeup.id>
 */

Yihai::setAlias('@yihai', dirname(__DIR__));
if(file_exists(__DIR__.'/bootstrap-local.php')){
    require __DIR__.'/bootstrap-local.php';
}