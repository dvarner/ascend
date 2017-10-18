<?php
// php -S localhost:8888 boot-temp.php
if (preg_match('/\.(?:png|jpg|jpeg|gif|js|css)$/', $_SERVER["REQUEST_URI"], $matches)) {
    $DS = DIRECTORY_SEPARATOR;
    $file = __DIR__ . $DS . 'public ' . $DS . $_SERVER['REQUEST_URI'];
    if ($matches[0] == '.css') { header('Content-Type: text/css'); }
    if ($matches[0] == '.js') { header('Content-Type: application/javascript'); }
    if ($matches[0] == '.png') { header('Content-Type: image/png'); }
    if ($matches[0] == '.jpg') { header('Content-Type: image/jpeg'); }
    if ($matches[0] == '.jpeg') { header('Content-Type: image/jpeg'); }
    if ($matches[0] == '.gif') { header('Content-Type: image/gif'); }
    echo file_get_contents($file);
    exit;
} else {
    include __DIR__ . '/bootstrap.php';
}