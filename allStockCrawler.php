<?php
include_once('simple_html_dom.php');

$urls = [
    'https://www.tej.com.tw/webtej/doc/uid.htm'
];

foreach ($urls as $url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_URL, $url);
    $html = curl_exec($curl);
    $dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);
    $html = $dom->load($html, true, true);

    foreach ($html->find('tr td[class="xl24"]') as $a) {
        $text = preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/", " ", strip_tags($a->plaintext));
        echo($text . " ");
        echo "\n";
    }


}
