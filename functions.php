<?php
foreach ( glob( get_template_directory()  . "/inc/*.php" ) as $file ) {
    include_once $file;
}