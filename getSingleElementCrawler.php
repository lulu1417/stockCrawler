<?php
include_once('simple_html_dom.php');
$urls = [
    'http://jsjustweb.jihsun.com.tw/z/zc/zcp/zcpa/zcpa0.djhtm?b=Y&a=2330', //資產負債年表
    'http://jsjustweb.jihsun.com.tw/z/zc/zcp/zcpa/zcpa0.djhtm?b=Q&a=2330', //資產負債季表
    'http://jsjustweb.jihsun.com.tw/z/zc/zcq/zcq0.djhtm?b=Y&a=2330', //損益年表
    'http://jsjustweb.jihsun.com.tw/z/zc/zcq/zcq0.djhtm?b=Q&a=2330', //損益季表
    'http://jsjustweb.jihsun.com.tw/z/zc/zc30.djhtm?b=Y&a=2330', //現金流量年表
    'http://jsjustweb.jihsun.com.tw/z/zc/zc30.djhtm?b=Q&a=2330' //現金流量表
];

foreach ($urls as $url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_URL, $url);
    $html = curl_exec($curl);
    $dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);
    $html = $dom->load($html, true, true);
    echo "\n";
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
