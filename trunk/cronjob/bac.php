<?php 

mysql_connect("localhost",'root','');
mysql_select_db("xoso");

//mysql_connect("db01.serverhosting.vn",'nov4b52d_admin','noveradmin!@12');
//mysql_select_db("nov4b52d_nover");

$thu = date('l',time());
if(date("H",time())<16 || (date("H",time())==16 && date("i",time()) <=20)){
   $thu = date("l",time() - 86400);
}
$rs = mysql_query("select * from calendar where thu = '".$thu."'");
$row = mysql_fetch_array($rs);
$tinh = explode(',',$row['bac']);

$bac = array(   '21'=>'mien-bac','22'=>'mien-bac','23'=>'mien-bac',
                '24'=>'mien-bac','25'=>'mien-bac','26'=>'mien-bac');


$date = date("d-m-Y",time());
include('simple_html_dom.php');
$html = new simple_html_dom();
$html1 = new simple_html_dom();
function fc($string,$class){
    return trim(str_replace('</td>','',str_replace('<td class="giai'.$class.'">','',$string)));
}

foreach($tinh as $item){
    $content = file_get_contents('http://www.minhngoc.com.vn/getkqxs/mien-bac.js');
    $content = htmlentities($content);
    $html->load($content);
    $explode = explode("'&lt;div&gt;&lt;div class=&quot;box_kqxs_mini&quot;&gt;	&lt;div class=&quot;top&quot;&gt;		&lt;div class=&quot;bkl&quot;&gt;			&lt;div class=&quot;bkr&quot;&gt;				&lt;div class=&quot;bkm&quot;&gt;					&lt;div class=&quot;title&quot;&gt;",$html);
    $b1 = explode('&lt;/table&gt;',$explode[1]);
    $table = htmlspecialchars_decode($b1[0]);
    
    preg_match_all('/<td class="giai7">(.*?)<\/td>/', $table, $result);
    $giai7 = fc($result[0][0],'7');
    $giai7 = explode(' - ',$giai7);
    preg_match_all('/<td class="giai6">(.*?)<\/td>/', $table, $result);
    $giai6 = fc($result[0][0],'6');
    $giai6 = explode(' - ',$giai6);
    preg_match_all('/<td class="giai5">(.*?)<\/td>/', $table, $result);
    $giai5 = fc($result[0][0],'5');
    $giai5 = explode(' - ',$giai5);
    preg_match_all('/<td class="giai4">(.*?)<\/td>/', $table, $result);
    $giai4 = fc($result[0][0],'4');
    $giai4 = explode(' - ',$giai4);
    preg_match_all('/<td class="giai3">(.*?)<\/td>/', $table, $result);
    $giai3 = fc($result[0][0],'3');
    $giai3 = explode(' - ',$giai3);
    preg_match_all('/<td class="giai2">(.*?)<\/td>/', $table, $result);
    $giai2 = fc($result[0][0],'2');
    $giai2 = explode(' - ',$giai2);
    preg_match_all('/<td class="giai1">(.*?)<\/td>/', $table, $result);
    $giai1 = fc($result[0][0],'1');
    preg_match_all('/<td class="giaidb">(.*?)<\/td>/', $table, $result);
    $giaidb = fc($result[0][0],'db');
    preg_match_all('/<td class="ngay">(.*?)<\/td>/', $table, $result);
    $loaive = str_replace('</td>','',str_replace('<td class="ngay">						Ng&agrave;y:','',$result[0][0]));
    $ngay = trim($loaive); 
    $ngay = str_replace("/","-",$ngay);
    $query = "INSERT INTO `kqxs_bac` (`date`, `provice`, `image`, `db`, `nhat`, `nhi1`, `nhi2`, `ba1`, `ba2`, `ba3`, `ba4`, `ba5`, `ba6`, `tu1`, `tu2`, `tu3`, `tu4`, `nam1`, `nam2`, `nam3`, `nam4`, `nam5`, `nam6`, `sau1`, `sau2`, `sau3`, `bay1`, `bay2`, `bay3`, `bay4`) ";
    $query .= "VALUES ('".$ngay."', '".$item."', '', '".$giaidb."', '".$giai1."', '".$giai2[0]."', '".$giai2[1]."', '".$giai3[0]."', '".$giai3[1]."', '".$giai3[2]."', '".$giai3[3]."', '".$giai3[4]."', '".$giai3[5]."', '".$giai4[0]."', '".$giai4[1]."', '".$giai4[2]."', '".$giai4[3]."', '".$giai5[0]."', '".$giai5[1]."', '".$giai5[2]."', '".$giai5[3]."', '".$giai5[4]."', '".$giai5[5]."', '".$giai6[0]."', '".$giai6[1]."', '".$giai6[2]."', '".$giai7[0]."', '".$giai7[1]."', '".$giai7[2]."', '".$giai7[3]."')";
    
    echo $bac[$item].' : '.$query ."<br>";
    $result = mysql_query($query);
    if($result)
        echo $bac[$item]." : ok <br>";
    else
        echo $bac[$item]." : false <br>";
}