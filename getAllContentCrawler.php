<?php
include_once('simple_html_dom.php');
$stockNumbers = [2330, 2331];
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
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        $html = curl_exec($curl);
        $dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);
        $html = $dom->load($html, true, true);

        foreach ($html->find('tr') as $a) {
            echo($a->plaintext." ");
            echo "\n";
        }


    }
}

