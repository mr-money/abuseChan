<?php
error_reporting(1);

$target = '/www/abuseChan/'; // 目录

$token = 'abuseChan';
$wwwUser = 'www';
$wwwGroup = 'www';

$json = json_decode(file_get_contents('php://input'), true);

// 从请求头中获取签名
$headers = [];
foreach ($_SERVER as $name => $value) {
    if (substr($name, 0, 5) == 'HTTP_') {
        $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
    }
}


$signature = "sha1=".hash_hmac('sha1', file_get_contents('php://input'),  $token );

if (empty($headers['X-Hub-Signature']) || $headers['X-Hub-Signature'] !== '111111') {
    header('HTTP/1.1 403 Forbidden');
    exit('error request '.$signature);
}

$repo = $json['repository'];

$cmd = "sudo cd $target && git pull";

echo shell_exec($cmd);
file_put_contents('gitWebhook.log',$repo);
