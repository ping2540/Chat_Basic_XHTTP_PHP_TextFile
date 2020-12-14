<?php
date_default_timezone_set("Asia/Bangkok");

if (isset($_SERVER['CONTENT_TYPE'])) {
    $incom_contentType = $_SERVER['CONTENT_TYPE'];
    
    if ($incom_contentType == 'application/json') {
        $content = trim(file_get_contents("php://input"));
        $arr = json_decode($content, true);

        $myfile = fopen("../Chat/chat.txt", "a+") or die("Unable to open file!");
        
        $txt = $arr['username'] . "\n";
        fwrite($myfile, $txt);
        $txt = $arr['message'] . "\n";
        fwrite($myfile, $txt);
        $txt = date("H:i:a") . "\n";
        fwrite($myfile, $txt);
        fclose($myfile);
        
    } else if ($incom_contentType == 'application/read') {

        $count = 1;
        $myfile = fopen("../Chat/chat.txt", "r") or die("Unable to open file!");
        while (!feof($myfile)) {
            if ($count == 1) {
                echo '<div id=text><b>' . fgets($myfile) . '</b>';
                $count++;
            } elseif ($count == 2) {
                echo  '<p>' . fgets($myfile) . '<span>';
                $count++;
            } else {
                echo  fgets($myfile) . '</span></p></div>';
                $count = 1;
            }
        }
        fclose($myfile);
        exit();
    }
}
