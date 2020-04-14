<?php
include 'init.php';
include 'allStockNumbers.php';
$getNumbers = new AllStockNumbers();
$stockNumbers = $getNumbers->getAllStockNumbers();
foreach ($stockNumbers as $stockNumber){
    $urls = [
        'http://jsjustweb.jihsun.com.tw/z/zc/zcp/zcpa/zcpa0.djhtm?b=Y&a='.$stockNumber, //資產負債年表
        'http://jsjustweb.jihsun.com.tw/z/zc/zcp/zcpa/zcpa0.djhtm?b=Q&a='.$stockNumber, //資產負債季表
        'http://jsjustweb.jihsun.com.tw/z/zc/zcq/zcq0.djhtm?b=Y&a='.$stockNumber, //損益年表
        'http://jsjustweb.jihsun.com.tw/z/zc/zcq/zcq0.djhtm?b=Q&a='.$stockNumber, //損益季表
        'http://jsjustweb.jihsun.com.tw/z/zc/zc30.djhtm?b=Y&a='.$stockNumber, //現金流量年表
        'http://jsjustweb.jihsun.com.tw/z/zc/zc30.djhtm?b=Q&a='.$stockNumber //現金流量季表
    ];

    foreach ($urls as $url) {
        $html = $curl::initCurl($url);
        foreach ($html->find('tr') as $a) {
            echo($a->plaintext." ");
            echo "\n";
        }


    }
}

