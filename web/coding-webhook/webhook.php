<?php
error_reporting(1);

$cmd = "git pull";
$res = shell_exec($cmd);
$res = shell_exec($cmd);
die;

$token = 'abuseChan';

// 从请求头中获取签名
$headers = [];
foreach ($_SERVER as $name => $value) {
    if (substr($name, 0, 5) == 'HTTP_') {
        $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
    }
}

$content = file_get_contents('php://input');

$signature = "sha1=" . hash_hmac('sha1', $content, $token);

if (empty($headers['X-Hub-Signature']) || $headers['X-Hub-Signature'] !== $signature) {
    header('HTTP/1.1 403 Forbidden');
    exit('error request ' . $signature);
}

$json = json_decode($content, true);
$repo = $json['commits'];

$cmd = "git pull";

$res = shell_exec($cmd);
print_r($res);
file_put_contents('gitWebhook.log', json_decode($repo).'\r\n', FILE_APPEND);
