<?php
return array(
	//'配置项'=>'配置值'
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'shop',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123456',          // 密码
    'DB_PREFIX'             =>  'shop_',    // 数据库表前缀
    'SHOW_PAGE_TRACE' =>true, 		//开启Trace调试模式

    'URL_MODEL' 	=> 	2,//设置url模式为rewrite重写模式
    'TMPL_PARSE_STRING' =>  array(

        '__PUB__'=>__ROOT__."/App/Home/Public",

        '__JQ__'=>__ROOT__."/App/Home/Public/js",

        '__ADMINPUB__'=>__ROOT__."/App/Admin/Public",

        '__ADMINJQ__'=>__ROOT__."/App/Admin/Public/js"

        // '__BSP__'=>"<script src='../project1/Public/pcss/bootstrap/js/bootstrap.js'></script>",

        ),


    'MAIL_HOST'     => 'smtp.qq.com',          /*smtp服务器的名称、smtp.126.com*/
    'MAIL_SMTPAUTH' => TRUE,                    /*启用smtp认证*/
    'MAIL_DEBUG'    => TRUE,                    /*是否开启调试模式*/
    'MAIL_USERNAME' => '775743976@qq.com',      /*邮箱名称*/
    'MAIL_FROM'     => '775743976@qq.com',      /*发件人邮箱*/
    'MAIL_FROMNAME' => '小问询',                 /*发件人昵称*/
    'MAIL_PASSWORD' => 'fttiphwxvroobdeh',      /*发件人邮箱的密码*/
    'MAIL_CHARSET'  => 'utf-8',                 /*字符集*/
    'MAIL_ISHTML'   => TRUE,                    /*是否HTML格式邮件*/
    'MAIL_PORT'     => 465,                     /*邮箱服务器端口*/
    'MAIL_SECURE'   => 'ssl',                   /*smtp服务器的验证方式，注意：要开启PHP中的openssl扩展*/

    /* 数据缓存设置 */
    'DATA_CACHE_TIME'       =>  0,      // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_TYPE'       =>  'memcache',
    'MEMCACHE_HOST' => '127.0.0.1',
    'MEMCACHE_PORT' => 11211,

    'SHOW_PAGE_TRACE'=>TRUE,

);