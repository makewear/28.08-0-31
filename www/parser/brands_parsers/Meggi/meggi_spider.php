<?php
//==============================================================================
//			Meggi	10-42	         		
//==============================================================================
sleep(3);
$existUrl   = TRUE;
$pagination = array();

//Exist page
$arrayPagination = checkEmptyOrChangeSelector('.pager', $saw,
    'pagination - страницы');
//var_dump($arrayPagination);
if (isset($arrayPagination)) {
    foreach ($arrayPagination as $value) {
        $regexp = '/[0-9]/';
        if (preg_match($regexp, $value)) {
            $pagination[] = (int) $value;
        }
    }
    $pagination = max($pagination);
    if ($i == $pagination) {
        $existUrl = FALSE;
    }
} else {
    $existUrl = FALSE;
}
//var_dump($pagination);
//Get Links
$arrayLinks = checkEmptyOrChangeSelector($_SESSION["a_href"], $saw,
    'a_href - ссылки');
//var_dump($arrayLinks);

if (isset($arrayLinks)) {
    $countNewLinks = count($arrayLinks);
    echo "\nУРЛ текущей ссылки:  <a href={$curLink} target='_blank' >{$curLink}</a>\n";
    echo "Запарсено новыч ссылок: {$countNewLinks}\n";
    foreach ($arrayLinks as $key => $value) {
        $linksArr[] = "http://www.meggi.com.ua".trim($arrayLinks[$key]['href']);
    }
}
//var_dump($linksArr);
//var_dump($existUrl);
//die;


