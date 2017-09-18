<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'CakePdf' => $baseDir . '/vendor/friendsofcake/cakepdf/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];