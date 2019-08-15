<?php

echo "IP : ".$_SERVER['REMOTE_ADDR']."<br>";
$ip = htmlspecialchars_decode($_SERVER['REMOTE_ADDR']);
echo "IP : ".$ip."<br>";
$ip = preg_replace('# {2,}#', ' ', str_replace(',', ' ', $ip));
echo "IP : ".$ip."<br>";
$u_ip = implode('.', array_slice(explode('.', $ip), 0, 3));
echo "IP : ".$u_ip."<br>";