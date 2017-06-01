<?php
include "SQL2.php";
$pdo = new pdo($dsn, $user, $passwd, $opt);
//$sql="select * from member";

$json=file_get_contents(
    'http://data.coa.gov.tw/Service/OpenData/ODwsv/ODwsvTravelFood.aspx');
$data=json_decode($json);
//var_dump($data);
foreach ($data as $row){
    $fid=$row->ID;
    $fname=$row->Name;
    $addr=$row->Address;
    $tel=$row->Tel;
    $host=$row->HostWords;


    $sql="insert into food (fid,fname,addr,tel,host) values (?,?,?,?,?)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$fid,$fname,$addr,$tel,$host]);
}








//$json = '{
//            "id":"123",
//            "name": "brad",
//            "lang": [
//                {"name":"Java",
//                 "level": "1"
//                },
//                {"name":"PHP",
//                 "level": "2"
//                },
//                {"name":"Android",
//                 "level": "3"
//                },
//                {"name":"iOS",
//                 "level": "4"
//                }
//            ]}';
//$root=json_decode($json);
//var_dump($root);
//echo "<br> $root->lang[0]->name";