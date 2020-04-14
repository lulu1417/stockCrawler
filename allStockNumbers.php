<?php

class allStockNumbers extends initializeCurl
{
    function getAllStockNumbers()
    {

        $urls = ['https://www.tej.com.tw/webtej/doc/uid.htm'];

        foreach ($urls as $url) {
            $html = $this->initCurl($url);
            $i = 0;
            foreach ($html->find('tr td[class="xl24"]') as $a) {
                $number = filter_var($a->plaintext, FILTER_SANITIZE_NUMBER_INT);
                $stockNumbers[$i] = $number;
//                echo($i . " " . $number . " ");
//                echo "\n";
                $i++;
            }

        }
        return $stockNumbers;
    }
}
