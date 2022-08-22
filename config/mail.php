<?php



return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers to be used while
    | sending an e-mail. You will specify which one you are using for your
    | mailers below. You are free to add additional mailers as required.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses",
    |            "postmark", "log", "array"
    |
    */
    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('SMTP1_MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('SMTP1_MAIL_PORT', 587),
            'encryption' => env('SMTP1_MAIL_ENCRYPTION', 'tls'),
            'username' => env('SMTP1_MAIL_USERNAME'),
            'password' => env('SMTP1_MAIL_PASSWORD'),
            'from' => [
                'address' => env('SMTP1_MAIL_FROM_ADDRESS', 'hello@example.com'),
                'name' => env('SMTP1_MAIL_FROM_NAME', 'Example'),
            ],
            'timeout' => null,
            'auth_mode' => null,
        ],
        'smtp2' => [
            'transport' => 'smtp',
            'host' => env('SMTP2_MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('SMTP2_MAIL_PORT', 587),
            'encryption' => env('SMTP2_MAIL_ENCRYPTION', 'tls'),
            'username' => env('SMTP2_MAIL_USERNAME'),
            'password' => env('SMTP2_MAIL_PASSWORD'),
            'from' => [
                'address' => env('SMTP2_MAIL_FROM_ADDRESS', 'hello@example.com'),
                'name' => env('SMTP2_MAIL_FROM_NAME', 'Example'),
            ],
            'timeout' => null,
            'auth_mode' => null,
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'mailgun' => [
            'transport' => 'mailgun',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => '/usr/sbin/sendmail -bs',
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */
    // 'from' => [
    //     'address' => env('SMTP1_MAIL_FROM_ADDRESS', 'hello@example.com'),
    //     'name' => env('SMTP1_MAIL_FROM_NAME', 'Example'),
    // ],

    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];