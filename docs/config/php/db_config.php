<?php
/**
 * @author xiaoxia xu <xiaoxa.xuxx@aliyun-inc.com> 2011-3-8
 * @link http://www.phpwind.com
 * @copyright Copyright &copy; 2003-2110 phpwind.com
 * @license 
 */
#db的配置也支持两种格式
##一种是单链接，只能配置一个链接
##一种是有连接池能力的多链接配置，同时支持读写分离和主从配置的能力


/** 第一种：单链接模式 **/
#WIND:db.WindConnection 配置格式，适合单链接应用，同时不支持连接池
return array(
	//链接的DSN，方式：类型:name=value;   链接类型mysql  host为localhost，链接的数据库名字为test,  链接端口为3306 
	'dsn' => 'mysql:host=localhost;dbname=test',
	//链接数据库的用户名
	'user' => 'root',
	//链接数据库的密码
	'pwd' => 'root',
	//存取数据库的链接字符集
	'charset' => 'utf8',
	//表前缀，需要“{}”符号，将表名进行标识，才能进行正确替换
	'tablePrefix' => 'pw_'
);

/** 第二种：多链接支持 **/
#WIND:db.WindConnectionManager 配置格式 ，支持链接池，允许配置多个链接
return array(
	'connections' => array(
		//except: 配置多链接的分配规则
		##每组规则将会以;号分割，*为通配符，：号则表示规则中的表名和链接分割
		##比如如下： 所有的表名都将走db1链接，user开头的表和tablename2表将会走主db1 从db2的策略
		'except' => '*:db1;user*,tablename2:db1|db2;',
		//各个链接的配置，配置格式如单个链接的配置
		'db1' => array(
			'dsn' => 'mysql:host=localhost;dbname=test',
			'user' => 'root',
			'pwd' => 'root',
			'charset' => 'utf8',
			'tablePrefix' => 'pw_'
		),
		'db2' => array(
			'dsn' => 'mysql:host=192.168.1.12;dbname=test;port=3305',
			'user' => 'test',
			'pwd' => 'test',
			'charset' => 'utf8',
			'tablePrefix' => 'pw_'
		),
	),
);