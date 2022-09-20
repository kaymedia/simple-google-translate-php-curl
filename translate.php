<?php
//KURNIA ADIYOGA
//kurniaadiyoga1337@gmail.com
//github.com/kaymedia
//gitlab.com/kurniaadiyoga
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $return = curl_exec($ch);
    curl_close ($ch);
    return $return;
}
function translate($text,$d = 'en',$s = 'id',$f='text')
{
        $test = str_replace(' ', '', $text); //replace white space to nothing
        $str = "https://translate.google.com/m?sl=id&tl=$d&hl=$s&q=".$test; //get html content translate
        $html = curl($str); //call curl function
        $start = stripos($html, '<div class="result-container">'); //find start words
        $end = stripos($html, '</div>', $offset = $start); //end words
        $length = $end - $start; //find length for 
        $htmlSection = substr($html, $start, $length); //cut result 
        return $result =  str_replace('<div class="result-container">', '', $htmlSection); //replace result to get clear text
   

}
echo translate("Hallo, Nama Saya Kurnia, Apa Kabar Anda ?");
?>
