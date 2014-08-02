<?php  
mysql_connect("localhost",'root','');
mysql_select_db("xoso");
$thu = date('l',time());
if(date("H",time())<16 || (date("H",time())==16 && date("i",time()) <=20)){
   $thu = date("l",time() - 86400);
}
$rs = mysql_query("select * from calendar where thu = '".$thu."'");
$row = mysql_fetch_array($rs);
$tinh = explode(',',$row['nam']);

$nam = array('1'=>'an-giang','2'=>'bac-lieu','3'=>'ben-tre','4'=>'binh-duong','5'=>'binh-phuoc',
           '6'=>'binh-thuan','7'=>'ca-mau','8'=>'can-tho','9'=>'da-lat','10'=>'dong-nai',
           '11'=>'dong-thap','12'=>'hau-giang','13'=>'kien-giang','14'=>'long-an',
           '15'=>'soc-trang','16'=>'tay-ninh','41'=>'tien-giang','17'=>'tp-hcm','18'=>'tra-vinh','19'=>'vinh-long','20'=>'vung-tau');

include('simple_html_dom.php');
$html = new simple_html_dom();
function fc($string,$class){
    return trim(str_replace('</td>','',str_replace('<td class="giai'.$class.'">','',$string)));
}
foreach($tinh as $item){
    $content = file_get_contents('http://www.minhngoc.com.vn/getkqxs/'.$nam[$item].'.js');
    $content = htmlentities($content);
    $html->load($content);
    $explode = explode("'&lt;div&gt;&lt;div class=&quot;box_kqxs_mini&quot;&gt;	&lt;div class=&quot;top&quot;&gt;		&lt;div class=&quot;bkl&quot;&gt;			&lt;div class=&quot;bkr&quot;&gt;				&lt;div class=&quot;bkm&quot;&gt;										&lt;div class=&quot;title&quot;&gt;",$html);
    $b1 = explode('&lt;/table&gt;',$explode[1]);
    $table = htmlspecialchars_decode($b1[0]);
    $dateexp = explode('</div>',$table);
    preg_match_all('/<td class="giai8">(.*?)<\/td>/', $table, $result);
    $giai8= fc($result[0][0],'8');
    preg_match_all('/<td class="giai7">(.*?)<\/td>/', $table, $result);
    $giai7= fc($result[0][0],'7');
    preg_match_all('/<td class="giai6">(.*?)<\/td>/', $table, $result);
    $giai6= fc($result[0][0],'6');
    $giai6 = explode(' - ',$giai6);
    preg_match_all('/<td class="giai5">(.*?)<\/td>/', $table, $result);
    $giai5= fc($result[0][0],'5');
    preg_match_all('/<td class="giai4">(.*?)<\/td>/', $table, $result);
    $giai4= fc($result[0][0],'4');
    $giai4 = explode(' - ',$giai4);
    preg_match_all('/<td class="giai3">(.*?)<\/td>/', $table, $result);
    $giai3= fc($result[0][0],'3');
    $giai3 = explode(' - ',$giai3);
    preg_match_all('/<td class="giai2">(.*?)<\/td>/', $table, $result);
    $giai2= fc($result[0][0],'2');
    preg_match_all('/<td class="giai1">(.*?)<\/td>/', $table, $result);
    $giai1=fc($result[0][0],'1');
    preg_match_all('/<td class="giaidb">(.*?)<\/td>/', $table, $result);
    $db = fc($result[0][0],'db');
    preg_match_all('/<td class="ngay">(.*?)<\/td>/', $table, $result);
    $loaive = str_replace('</td>','',str_replace('<td class="ngay">Lo&aacute;&ordm;&iexcl;i v&eacute;:','',$result[0][0]));
    $loaive = trim($loaive);
    preg_match_all('/(\d{2})\/(\d{2})\/(\d{4})/', $dateexp[0], $result);
    $ngay = str_replace("/","-",$result[0][0]);
    
    
    $query = "INSERT INTO `kqxs_nam` (`date`, `provice`, `loaive`, `image`, `db`, `nhat`, `nhi`, `ba1`, `ba2`, `tu1`, `tu2`, `tu3`, `tu4`, `tu7`, `tu5`, `tu6`, `nam`, `sau1`, `sau2`, `sau3`, `bay`, `tam`) ";
    $query .=               "VALUES ('".$ngay."', '".$item."', '".$loaive."', '', '".$db."', '".$giai1."', '".$giai2."', '".$giai3[0]."', '".$giai3[1]."', '".$giai4[0]."', '".$giai4[1]."', '".$giai4[2]."', '".$giai4[3]."', '".$giai4[4]."', '".$giai4[5]."', '".$giai4[6]."', '".$giai5."', '".$giai6[0]."', '".$giai6[1]."', '".$giai6[2]."', '".$giai7."', '".$giai8."')";
    echo $nam[$item].' : '.$query ."<br>";
    $result = mysql_query($query);
    if($result)
        echo $nam[$item]." : ok <br>";
    else
        echo $nam[$item]." : false <br>";
}