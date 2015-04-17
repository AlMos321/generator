<?php

set_time_limit(0);
//ini_set('memory_limit', '-1');

$dbhost = "localhost"; // Имя хоста БД
$dbusername = "root"; // Пользователь БД
$dbpass = "111"; // Пароль к базе
$database = "generate";

$dbconnect = @mysql_connect($dbhost, $dbusername, $dbpass);
if (!$dbconnect) {
    echo("Не могу подключиться к серверу базы данных!");
} else echo "db connect!";
mysql_select_db($database) or die("Не могу подключиться к базе.");



//$file = fopen("/var/lib/mysql/generate/file.csv", "w");

$file = fopen("/var/lib/mysql/generate/export.CSV", 'a'); //Открываем файл в режиме записи
ftruncate($file, 0); // очищаем файл
fclose($file);

$a = time(); //Start timer time

//$mas = array();
//$random_val = '';
$chars = '12345ABCDEFGHIJKLMNOPQRSTUVWXYZ67890qwertyuiopasdfghjklzxcvbnm';

do {
    //unset($random_val);
    $random_val = '';
    for ($ichars = 0; $ichars < 6; ++$ichars) {

        $random = str_shuffle($chars);
        $random_val .= $random[0];
        //unset($random);
   }
    //fwrite($file, $hashpromo."\r");
    $mas[$random_val] = $random_val;
   // $mas[$random_val] = serialize($mas[$random_val]);
} while (count($mas) < 10000000);

$file = fopen("/var/lib/mysql/generate/export.CSV", "w");
fputcsv($file, $mas, "\r");
fclose($file);

$b = time();
echo "time: " . ($b - $a) / 60;

$strSQL = "
                LOAD DATA INFILE 'file.csv'
                INTO TABLE `export`
                FIELDS TERMINATED BY ','
                LINES TERMINATED BY '\r'
                STARTING BY ''

            ";

//mysql_query($strSQL) or die(mysql_error());

$b = time();
echo "time: " . ($b - $a) / 60; // time left




//fputcsv($file, $mas ,"\r");

/*$handle = fopen("/var/lib/mysql/generate/file.csv", "a");

for ($i = 0; $i < 4000000; $i++){
    fwrite($handle,generate(6)."\r");
}*/








/*ini_set('memory_limit', '-1');
set_time_limit(1000);
$dbhost = "localhost"; // Имя хоста БД
$dbusername = "root"; // Пользователь БД
$dbpass = "111"; // Пароль к базе
$database = "generate";

$dbconnect = @mysql_connect ($dbhost, $dbusername, $dbpass);
if (!$dbconnect) { echo ("Не могу подключиться к серверу базы данных!"); } else echo "db connect!";
mysql_select_db($database) or die("Не могу подключиться к базе.");


function generate_code($length){
    $code = '';
    $symbols = '0123456789abcdefghijklmnopqrstuvwxyz';
    for( $i = 0; $i < (int)$length; $i++ )
    {
        $num = rand(1, strlen($symbols));
        $code .= substr( $symbols, $num, 1 );
    }
    //echo $code . "<br>";
    return $code;
}

$len = 40000000;
is_float($mas[] = array());
for ($i = 0; $i<$len; $i++){
    file_put_contents( '/var/lib/mysql/generate/file.csv',generate_code(6)."\r", FILE_APPEND );
}*/

/*
foreach($mas as $key => $val){
    //echo $key;
    file_put_contents( '/var/lib/mysql/generate/file.csv', $key."\r", FILE_APPEND );
}
//file_put_contents( '/var/lib/mysql/generate/file.csv', $str."\r", FILE_APPEND );*/

/*function generate($leng){
    $dict = '1234567890qwertyuipasdfghjklzxcvbnm';
    $totalLength = $leng;
    $codeLength = 6;
    $dictLength = strlen($dict) - 1;

    $codes   = array();
    while (count($codes) <$totalLength){
        $res = '';
        for ($n = 0; $n < $codeLength; $n++){
            $res .= $dict[mt_rand(0, $dictLength)];
        }
        //$codes[$res] = NULL;
        file_put_contents( '/var/lib/mysql/generate/file.csv', $res."\r", FILE_APPEND );
        //echo $res . "<br>";
    }
    return $codes;
}

$codes = generate(40000000);
echo "input in file....";
echo "<br>";*/
/*foreach($codes as $key => $val){
    //echo $key;
    file_put_contents( '/var/lib/mysql/generate/file.csv', $key."\r", FILE_APPEND );
}
*/

