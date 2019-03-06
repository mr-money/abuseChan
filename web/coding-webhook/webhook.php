<?php

error_reporting(1);

$target = '/www/abuseChan/'; // 生产环境web目录

$token = 'abusechan';
$wwwUser = 'www';
$wwwGroup = 'www';

$json = json_decode(file_get_contents('php://input'), true);

if (empty($json['token']) || $json['token'] !== $token) {
    exit('error request');
}

$repo = $json['repository']['name'];

$cmd = "cd $target && git pull";

$res = shell_exec($cmd);
file_put_contents('gitWebhook.log',$res);
