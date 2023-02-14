<?php

$prodConfig = require __DIR__ . '/config.php';

$prodConfig['example_option'] = 'OVERRIDE_VALUE';
$prodConfig['env'] = 'PRODUCTION';

return $prodConfig;
