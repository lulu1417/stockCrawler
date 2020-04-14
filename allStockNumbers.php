<?php
//include 'init.php';

    $urls = ['https://www.tej.com.tw/webtej/doc/uid.htm'];

    foreach ($urls as $url) {
        $html = $curl::initCurl($url);
        $i = 0;
        foreach ($html->find('table border="1"') as $a) {
            foreach ($a->find('tr td[class="xl24"]') as $b){
                $number = filter_var($b->plaintext, FILTER_SANITIZE_NUMBER_INT);
                $stockNumbers[$i] = $number;
//                echo($i . " " . $number . " ");
//                echo "\n";
                $i++;
            }

        }

    }
