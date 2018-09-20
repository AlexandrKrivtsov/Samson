<?php
function substringSearch($string){
    if(iconv_strlen($string)==0){
        exit('Строка не задана');
    }
    if(iconv_strlen($string)<4){
        exit('Строка должна содержать не мене 4 символов');
    }
    $arrayStr = mb_str_split($string);
    $strLenght = count($arrayStr);
    $i=0;
    $substrCount = 0;
    while ($i < $strLenght-1 && $substrCount < 2) {
        $substr = $arrayStr[$i]. $arrayStr[$i+1];
        $substrCount = mb_substr_count($string, $substr);
        $i++;
    }
    if ($substrCount==1){
        exit('Подстрока не найдена');
    }
    if ($substrCount == 2) {
        $substrPos = mb_strpos($string, $substr);
        $j=$substrPos+2;
        do{ $substrPos2 = mb_strpos($string, $substr, $i);
            $substrLenght = iconv_strlen($substr);
            $maxSubstrLenght = $strLenght - ($substrLenght+$substrPos);
            $substr2=$substr;
            $substr = $substr . $arrayStr[$j];
            $substrCount2 = mb_substr_count($string, $substr);
            $i++;
            $j++;
        }while ($substrCount2==2 && $maxSubstrLenght>=0);
    } else exit('Количество вхождений подстроки = '. $substrCount);
    return($arraySubstr2=array($substr2, $substrPos2));
}
function stringRev($string){
    $substrArray = substringSearch($string);
    $substr = $substrArray[0];
    $substrLenght = iconv_strlen($substr);
    $substrPos = $substrArray[1];
    $substr = mb_strrev($substr);
    $string = mb_substr_replace($string,$substr,$substrPos,$substrLenght);
    return $string;
}
function mb_str_split($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}
function mb_substr_replace ($string, $replacement, $start, $length=null, $encoding=null){
    if ($encoding == null) $encoding = mb_internal_encoding();
    if ($length == null) {
        return mb_substr($string, 0, $start, $encoding) . $replacement;
    }
    else {
        if($length < 0) $length = mb_strlen($string, $encoding) - $start + $length;
        return
            mb_substr($string, 0, $start, $encoding) .
            $replacement . mb_substr($string, $start + $length, mb_strlen($string, $encoding), $encoding);
    }
}
function mb_strrev($str){
    $r = '';
    for ($i = mb_strlen($str); $i>=0; $i--) {
        $r .= mb_substr($str, $i, 1);
    }
    return $r;
}