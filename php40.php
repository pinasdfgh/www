<?php
$passwd='123456';

echo "$passwd<br>";

$hash1=password_hash("$passwd",PASSWORD_DEFAULT);

echo "$hash1<br>";

if(password_verify($passwd,$hash1)){
    echo 'ok';
}else{
    echo 'ng';
}