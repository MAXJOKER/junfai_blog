<?php
//注意，请不要在这里配置SAE的数据库，配置你本地的数据库就可以了。
return array(
    //'配置项'=>'配置值'
	'APP_GROUP_LIST'        => 'Home,Admin',//项目分组设定，多个分组之间用逗号分隔

	'DEFAULT_GROUP'         => 'Home',  // 默认分组
    'DEFAULT_MODULE'        => 'Index', // 默认模块名称
    'DEFAULT_ACTION'        => 'index', // 默认操作名称

    /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'blog',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '',          // 密码
    'DB_PORT'               => '3306',        // 端口
    'DB_PREFIX'             => 'blog_',    // 数据库表前缀
    'DB_CHARSET'            => 'utf8',      // 数据库编码默认采用utf8

    // 'SHOW_PAGE_TRACE'		=> true,

    'TMPL_FILE_DEPR'        => '_',//分组模板下面模块和操作的分隔符，默认值为“/”

    'URL_MODEL'             => 0,
    //'URL_HTML_SUFFIX'		=> '.html',
    'DEFAULT_FILTER'        => 'htmlspecialchars',

    'BLOG_NAME'             => '关于钧辉的一切',

    
    

);
?>