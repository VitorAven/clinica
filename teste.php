<?php

require_once 'simple_html_dom_node.php';
$url = 'http://54.94.188.1/listapragas/pragas.php?pagina=all';
$html = file_get_html($url);
$espressao = "/<a href=\'(.*?)\'>(.*?)<\/a>/";
preg_match_all($espressao, $html, $result);
//echo '<pre>';
//print_r($result);
//die();

?>
<table>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
    </tr>
    
</table>
