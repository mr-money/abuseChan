<?php
error_reporting(1);

$target = '/www/abuseChan/'; // 目录

$token = 'abuseChan';

$content = file_get_contents('php://input');

$json = json_decode($content, true);

// 从请求头中获取签名
$headers = [];
foreach ($_SERVER as $name => $value) {
    if (substr($name, 0, 5) == 'HTTP_') {
        $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
    }
}
//签名加密
$signature = "sha1=" . hash_hmac('sha1', $content, $token);

if (empty($headers['X-Hub-Signature']) || $headers['X-Hub-Signature'] !== $signature) {
    header('HTTP/1.1 403 Forbidden');
    exit('error request ' . $signature);
}

$repo = $json['commits'];

$cmd = "sudo cd $target && git pull";

echo shell_exec($cmd);
file_put_contents('gitWebhook.log', $repo, FILE_APPEND);
