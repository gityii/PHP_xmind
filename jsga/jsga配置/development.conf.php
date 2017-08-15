<?php

/**
 * 开发环境配置信息
 *
 * @author nikoniu
 * @version $Id$
 */
return [

    // 首页URL
    'homeUrl' => 'http://local.jsga.qq.com',

    // 别名
    'aliases' => [
        '@yii/gii' => '@wii/wii2/vendor/yiisoft/yii2-gii',
        '@bower' => '@wii/wii2/vendor/bower'
    ], 

    // 模块配置
    'modules' => [
        'sample' => [
            'class' => 'app\modules\sample\Module'
        ],
        'wii' => [
            'class' => 'wii\wau\Module' 
        ],
        'gii' => [
            'class' => 'yii\gii\Module',
            'allowedIPs' => [
                '61.135.172.68',
                '14.17.22.32',
                '14.17.22.33',
                '222.180.148.74',
                '14.17.22.34',
                '127.0.0.1'
            ],
            'generators' => [
                'waucrud' => [
                    'class' => 'wii\wiigii\waucrud\Generator',
                    'templates' => [
                        'my' => '@wii/wiigii/waucrud/default'
                    ]
                ],
                'api' => [
                    'class' => 'wii\wiigii\api\Generator',
                    'templates' => [
                        'my' => '@wii/wiigii/api/default'
                    ]
                ],
                'wiimodel' => [
                    'class' => 'wii\wiigii\wiimodel\Generator',
                    'templates' => [
                        'my' => '@wii/wiigii/wiimodel/default'
                    ]
                ],
            ]
        ]
    ],

    // 组件
    'components' => [
        // DB - 数据库
        'db' => array(
            'class' => 'wii\db\Connection',
            'tablePrefix' => 'tbl_',
            'charset' => 'utf8',
//            'dsn' => 'mysql:host=182.254.149.73;port=3306;dbname=db_jsga',
//            'username' => 'admin',
//            'password' => '1234qwer',
            'dsn' => 'mysql:host=101.200.151.231;port=3306;dbname=jsga.wii.qq.com_data',
            'username' => 'user_car',
            'password' => 'user_car',
            'enableSchemaCache' => false,
            'schemaCacheDuration' => 0,
        ),

        // Cache - 缓存
        'cache' => [
            'class' => 'hybase\cache\redis\Cache',
            'redis' => [
                'hostname' => '182.254.149.73',
                'port' => 6380,
                'password'=>'1234qwer',
                'database' => 0
            ]
        ],

        // Redis - Redis
        'redis' => [
            'class' => 'wii\redis\Connection',
            'hostname' => '182.254.149.73',
            'port' => 6380,
            'password'=>'1234qwer',
            'database' => 0
        ],

        'mongodb' => [
            'class' => 'wii\mongodb\Connection',
            "dsn" => "mongodb://hytd:hytd@101.200.151.231:27017/admin"
        ],

        'elasticsearch' => [
            'class' => 'yii\elasticsearch\Connection',
            'autodetectCluster' => false,
            'nodes' => [
                ['http_address' => '118.89.59.79:9200'],
                // configure more hosts if you have a cluster
            ],
        ],

//        'cache' => [
//            'class' => 'hybase\cache\redis\Cache',
//            'redis' => [
//                'hostname' => '182.254.149.73',
//                'port' => 6380,
//                'password'=>'1234qwer',
//                'database' => 0
//            ]
//        ],
//
//        // Redis - Redis
//        'redis' => [
//            'class' => 'wii\redis\Connection',
//            'hostname' => '182.254.149.73',
//            'port' => 6380,
//            'password'=>'1234qwer',
//            'database' => 0
//        ],
//
//        // Redis - Redis
//        'mongodb' => [
//            'class' => 'wii\mongodb\Connection',
//            "dsn" => "mongodb://admin:1234qweR@182.254.149.73:27017/admin"
//        ],

        // Redis - Redis
//        'mongodb' => [
//            'class' => 'wii\mongodb\Connection',
//            "dsn" => "mongodb://admin:1234qweR@182.254.149.73:27017/admin"
//        ],

        // Asset - 资源管理
        'assetManager' => [
            // 支持文件夹软链，注意：IDC机房正式环境已把创建软链命令禁止了，不能使用软链模式。
            'linkAssets' => true
        ],

        // Log - 日志
        'log' => [
            // 'traceLevel' => WII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'wii\log\FileTarget',
                    'levels' => [],
                    'logFile' => '@runtime/logs/' . date("Ymd") . '/all.log'
                ],
                [
                    'class' => 'wii\log\FileTarget',
                    'levels' => [
                        'error',
                        'warning'
                    ],
                    'logFile' => '@runtime/logs/' . date("Ymd") . '/error.log'
                ]
            ]
        ],

        // WiiApp
        'app' => [
            'class' => 'wii\api\base\App',
            'appId' => 'JsgaDev',
            'appKey' => '0a26da19d13aa55aef6ae7baebe71935',
            'platformAppId' => '10000088',
            'apiConfig' => []
        ],
        'fwWxPubAccount' => [
            'class' => 'hybase\weixin\FwWxPubAccount',
            'appId' =>  'wx48f001ea8380ea0e',
            'secret' => '657f0b02f94b856c868fdd8d783feb14'
        ]
    ]
];
