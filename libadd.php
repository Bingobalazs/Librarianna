<?php


$con = mysqli_connect("localhost", "balgalazs", "thisIsMor1czCloudMF!?", "balgalazs_wp");

    if (!$con) {
        die("elkurtad");
    }

$today=date("Y-m-d");

if($_GET['into']=="konyv"){
    $usql = "INSERT INTO konyv (szerzo, cim , isbn, kemenykotes, megjegyzes, oldalak, maxnapok, kiadas_dt, rog_dt ) 
    VALUES ('{$_GET['author']}', '{$_GET['title']}' ,'{$_GET['isbn']}', '{$_GET['hard']}', '{$_GET['comment']}', '{$_GET['pages']}', '{$_GET['maxdays']}','{$_GET['edition']}','{$today}');";
} 
else if($_GET['into']=="olvaso"){
$usql = "INSERT INTO olvaso (nev, lakcim , email, tel, megjegyzes, nem, kolcsonozhet,szuletes_dt, reg_dt ) 
VALUES ('{$_GET['name']}', '{$_GET['address']}' ,'{$_GET['email']}', '{$_GET['phone']}', '{$_GET['comment']}', '{$_GET['sex']}', '{$_GET['borrow']}','{$_GET['birth']}','{$today}');";
} 
else if($_GET['into']=="kolcsonzes"){
    $usql = "INSERT INTO kolcsonzes (konyv_id, olvaso_id , megjegyzes, napok, rog_dt) 
VALUES ('{$_GET['book_id']}', '{$_GET['client_id']}', '{$_GET['comment']}', '{$_GET['days']}', '{$today}');";
}
else if($_GET['into']=="return"){
    $usql ="DELETE FROM kolcsonzes WHERE id = {$_GET['id']}; ";
}

echo $usql;

$f=mysqli_query($con, $usql) or die(mysqli_error($con));



/*
"libadd.php?into=konyv"+
            /&title="+document.getElementById('title').value+
            /"&author="+document.getElementById("author").value+
            "&pages="+ (document.getElementById('pages').value)+
            "&quant="+ (document.getElementById('quant').value)+
            "&isbn="+ (document.getElementById('isbn').value)+
            "&comment="+ (document.getElementById('comment').value)+
            "&maxdays="+ (document.getElementById('maxdays').value)+
            "&edition="+ (document.getElementById('edition').value)+
            "&hard="+(document.getElementById('hard').value);*/