<?php
include 'init.php';
$urls = [
    'http://jsjustweb.jihsun.com.tw/z/zc/zcp/zcpa/zcpa0.djhtm?b=Y&a=2330', //資產負債年表
    'http://jsjustweb.jihsun.com.tw/z/zc/zcp/zcpa/zcpa0.djhtm?b=Q&a=2330', //資產負債季表
    'http://jsjustweb.jihsun.com.tw/z/zc/zcq/zcq0.djhtm?b=Y&a=2330', //損益年表
    'http://jsjustweb.jihsun.com.tw/z/zc/zcq/zcq0.djhtm?b=Q&a=2330', //損益季表
    'http://jsjustweb.jihsun.com.tw/z/zc/zc30.djhtm?b=Y&a=2330', //現金流量年表
    'http://jsjustweb.jihsun.com.tw/z/zc/zc30.djhtm?b=Q&a=2330' //現金流量表
];

foreach ($urls as $url) {
    $html = $curl::initCurl($url);
    foreach ($html->find('td[class=t10]') as $a) {
        $title = $a->plaintext;
        echo($title . "\n");
    }
    $i = 1;
    foreach ($html->find('td[class=t2]') as $a) {
        $column = $a->plaintext;
        echo($column . " ");
        if ($i == 9) {
            echo "\n";
        }
        $i++;
    }
    echo "\n";

    $j = 0;
    foreach ($html->find('td[class=t3n1]') as $b) {
        $content[$j] = $b->plaintext;
        $j++;
    }
    $j = 0;
    $row = 1;
    foreach ($html->find('td[class=t4t1]') as $a) {
        echo($a->plaintext . " ");
        while (isset($content[$j]) && ($j < 7 * $row + $row - 1) || $j == 0) {
            echo($content[$j] . " ");
            $j++;
        }
        echo($content[$j]);
        $j++;
        $row++;
        echo "\n";
    }


}

