<?php
//V1.2.5版本

//数据库地址
$DB_HOST="127.0.0.1";
//数据库名
$DB_NAME="loveway";
//数据库登录用户名
$DB_USER="loveway";
//数据库登录密码
$DB_PASS="trmLrmj3CkpS7G62";
//管理后台账号
$ADMIN_USER="kagamine";
//管理后台密码
$ADMIN_PASS="kagamine1234";
//是否开启伪静态（请先配置伪静态规则后再开启，否则可能导致404）
$REWRITE=false;
/*
伪静态规则
当前只支持nginx，apache规则的话...实在不会写，热心的童鞋可以帮忙写一下啊（谢谢各位大佬了）
location /
{
	 try_files $uri $uri/ /index.php?uri=$uri&args=$args;
}
*/
?>