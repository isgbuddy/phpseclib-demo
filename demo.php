<?php

//phpinfo();exit;

require_once 'vendor/autoload.php';

use phpseclib\Crypt\RSA;

$rsa = new RSA;

$m_private_key_file = 'keys/m_private_key.txt';
$m_public_key_file = 'keys/m_public_key.txt'; 

$p_private_key_file = 'keys/p_private_key.txt';
$p_public_key_file = 'keys/p_public_key.txt'; 

/*生成公私钥
$m_keys = $rsa->createKey();

file_put_contents($m_private_key_file, $m_keys['privatekey']);
file_put_contents($m_public_key_file, $m_keys['publickey']);
*/

/* 加、解密 DEMO */
$m_barCcode = 'Data from server';
$c_barCcode = 'Data from client';

$m_private_key = file_get_contents($m_private_key_file);

//私钥加密数据
$m_rsa = new RSA;

$m_ret = $m_rsa->loadKey($m_private_key);

$es = $m_rsa->encrypt($m_barCcode);

//公钥解密数据
$p_rsa = new RSA;

$m_public_key = file_get_contents($m_public_key_file);

$p_ret = $p_rsa->loadKey($m_public_key);

$ds = $p_rsa->decrypt($es);

echo $ds;

echo '<br>';

//公钥加密数据

$es = $p_rsa->encrypt($c_barCcode);

//私钥解密数据

$ds = $m_rsa->decrypt($es);

echo $ds;

?>
