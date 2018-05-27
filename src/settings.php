<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Database Settings
        // 'db' => [
        // 'host' => 'localhost',
        // 'user' => 'root',
        // 'pass' => 'rahasia',
        // 'dbname' => 'gofood_kw',
        // 'driver' => 'mysql'
        // ],

        'db' => [
        'host' => 'ec2-54-204-39-46.compute-1.amazonaws.com',
        'user' => 'apmvmykbxnmchr',
        'pass' => '750e5562b6fa1011409ee45601a1d394467908c2397f900b3122f6e0fb7acfeb',
        'dbname' => 'd5uucr416nlqru',
        'port' => '5432',
        'driver' => 'pgsql'

        ],

        // 'db' => [
        // 'host' => 'localhost',
        // 'user' => 'id2860958_root',
        // 'pass' => 'rahasia',
        // 'dbname' => 'id2860958_gowarkop',
        // 'driver' => 'mysql'
        // ],

    ],
];
