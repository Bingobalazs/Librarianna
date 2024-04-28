<?php
require("dbcon.php");
if($_GET['from']=='book'){

    $sql ="SELECT * FROM konyv ";
    

    if ($_GET['id']!="") {
        $sql .= "WHERE id = '{$_GET['id']}' ";
    } 
    if ($_GET['isbn']!="") {
        $sql .= "WHERE isbn LIKE '%{$_GET['isbn']}%' ";
    } 
    else{
        if ($_GET['author']!="") {
            $sql .= "WHERE szerzo LIKE '%{$_GET['author']}%' ";
            if ($_GET['title']!="") {
                $sql .= "AND cim LIKE '%{$_GET['title']}%' ";
            }
            if ($_GET['comment']!="") {
                $sql .= "AND megjegyzes LIKE '%{$_GET['comment']}%' ";
            }
        } else if ($_GET['title']!="") {
            $sql .= "WHERE cim LIKE '%{$_GET['title']}%' ";
            if ($_GET['comment']!="") {
                $sql .= "AND megjegyzes LIKE '%{$_GET['comment']}%' ";
            }
        } else if ($_GET['comment']!="") {
            $sql .= "WHERE megjegyzes LIKE '%{$_GET['title']}%' ";
            if ($_GET['comment']!="") {
                $sql .= "AND megjegyzes LIKE '%{$_GET['comment']}%' ";
            }
        }
    
    }

$r=mysqli_query($con, $sql);

if (mysqli_num_rows($r)==0) {
    echo "<h1>Nincs találat</h1>";
}


    while ($row=mysqli_fetch_assoc($r)) {
    if ($_GET['selectbtn']=='true'){
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['szerzo']}</td>
    <td>{$row['cim']}</td>
    <td>{$row['isbn']}</td>
    
    <td>{$row['megjegyzes']}</td>
    <td>{$row['kemenykotes']}</td>
    <td>{$row['oldalak']}</td>
    <td>{$row['maxnapok']}</td>
    <td>{$row['rog_dt']}</td>
    <td>{$row['kiadas_dt']}</td>
    <td><button class='secondarybtn' onclick='AddBookToBorrow({$row['id']})'>Select</button></td>


    </tr>";
        } else if($_GET['fullinfo']=='true'){
    echo"    
        <tr>
    <td>{$row['id']}</td>
    <td>{$row['szerzo']}</td>
    <td>{$row['cim']}</td>
    <td>{$row['isbn']}</td>
    
    <td>{$row['megjegyzes']}</td>
    <td>{$row['kemenykotes']}</td>
    <td>{$row['oldalak']}</td>
    <td>{$row['maxnapok']}</td>
    <td>{$row['rog_dt']}</td>
    <td>{$row['kiadas_dt']}</td>
    
    

    </tr>";
    }
        else{
            echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['szerzo']}</td>
    <td>{$row['cim']}</td>
    <td>{$row['isbn']}</td>
    <td>{$row['megjegyzes']}</td>


    <td>{$row['maxnapok']}</td>

    
    </tr>";
        }
}






}


if($_GET['from']=='borrows'){

    $sql ="SELECT *, kolcsonzes.id AS id, kolcsonzes.rog_dt AS kol_dt
    FROM ((kolcsonzes
    INNER JOIN konyv ON kolcsonzes.konyv_id = konyv.id)
    INNER JOIN olvaso ON kolcsonzes.olvaso_id = olvaso.id)";
    

    if ($_GET['id']!="") {
        $sql .= "WHERE id = {$_GET['id']} ";
    }

    if ($_GET['book_id']!="") {
        $sql .= "WHERE konyv_id = {$_GET['book_id']} ";
    }

    if ($_GET['client_id']!="") {
        $sql .= "WHERE olvaso_id = {$_GET['client_id']} ";
    }
    if ($_GET['isbn']!="") {
        $sql .= "WHERE konyv.isbn LIKE '%{$_GET['isbn']}%' ";
    } 
    else{
        if ($_GET['author']!="") {
            $sql .= "WHERE konyv.szerzo LIKE '%{$_GET['author']}%' ";
            if ($_GET['title']!="") {
                $sql .= "AND konyv.cim LIKE '%{$_GET['title']}%' ";
            }
            if ($_GET['comment']!="") {
                $sql .= "AND konyv.megjegyzes LIKE '%{$_GET['comment']}%' ";
            }
        } else if ($_GET['title']!="") {
            $sql .= "WHERE konyv.cim LIKE '%{$_GET['title']}%' ";
            if ($_GET['comment']!="") {
                $sql .= "AND konyv.megjegyzes LIKE '%{$_GET['comment']}%' ";
            }
            if ($_GET['author']!="") {
                $sql .= "AND konyv.szerzo LIKE '%{$_GET['author']}%' ";
            }
        } else if ($_GET['comment']!="") {
            $sql .= "WHERE konyv.megjegyzes LIKE '%{$_GET['comment']}%' ";
            if ($_GET['title']!="") {
                $sql .= "AND konyv.cim LIKE '%{$_GET['title']}%' ";
            }
            if ($_GET['author']!="") {
                $sql .= "AND konyv.szerzo LIKE '%{$_GET['author']}%' ";
            }
        }
    
    }
    $sql.=';';
    


$r=mysqli_query($con, $sql);

if (mysqli_num_rows($r)==0) {
    echo "<h1>Nincs találat</h1>";
}


    while ($row=mysqli_fetch_assoc($r)) {
        if ($_GET['deletebtn']=="true") {

            echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['kol_dt']}</td>
    <td>{$row['konyv_id']}</td>
    
    <td>{$row['szerzo']}</td>
    <td>{$row['cim']}</td>
    <td>{$row['isbn']}</td>
    <td>{$row['napok']}</td>
    
    <td>{$row['olvaso_id']}</td>
    <td>{$row['nev']}</td>
    <td><a href='tel:{$row['tel']}'>Call</a></td>
    <td><a href='mailto:{$row['email']}'>Mail</a></td>
        <td><button class='secondarybtn' onclick='Delete({$row['id']})'>Returned</button></td>

    
        
    </tr>";
        } else{
         echo   "<tr>
    <td>{$row['id']}</td>
    <td>{$row['konyv_id']}</td>
    <td>{$row['olvaso_id']}</td>
    <td>{$row['szerzo']}</td>
    <td>{$row['cim']}</td>
    <td>{$row['isbn']}</td>
    <td>{$row['megjegzyes']}</td>
    <td>{$row['napok']}</td>
    <td>{$row['kol_dt']}</td>
    <td>{$row['nev']}</td>
    <td><a href='tel:{$row['tel']}'>Call</a></td>
    <td>{$row['email']}</td>
    
        
    </tr>";
        }
}

}








if($_GET['from']=='client'){

    $sql ="SELECT * FROM olvaso ";
    

    if ($_GET['id']!="") {
        $sql .= "WHERE id = '{$_GET['id']}' ";
    } 
    if ($_GET['name']!="") {
        $sql .= "WHERE nev LIKE '%{$_GET['name']}%' ";
    } 
    else{
        if ($_GET['address']!="") {
            $sql .= "WHERE cim LIKE '%{$_GET['address']}%' ";
            if ($_GET['email']!="") {
                $sql .= "AND email LIKE '%{$_GET['email']}%' ";
            }
            if ($_GET['comment']!="") {
                $sql .= "AND megjegyzes LIKE '%{$_GET['comment']}%' ";
            }

        } else if ($_GET['email']!="") {
            $sql .= "WHERE email LIKE '%{$_GET['email']}%' ";
            if ($_GET['comment']!="") {
                $sql .= "AND megjegyzes LIKE '%{$_GET['comment']}%' ";
            }
            if ($_GET['address']!="") {
                $sql .= "AND cim LIKE '%{$_GET['address']}%' ";
            }
        } else if ($_GET['comment']!="") {
            $sql .= "WHERE megjegyzes LIKE '%{$_GET['comment']}%' ";
            if ($_GET['email']!="") {
                $sql .= "AND email LIKE '%{$_GET['email']}%' ";
            }
            if ($_GET['address']!="") {
                $sql .= "AND cim LIKE '%{$_GET['address']}%' ";
            }
        }
    
    }
    $sql.=';';

$r=mysqli_query($con, $sql);

if (mysqli_num_rows($r)==0) {
    echo "<h1>Nincs találat</h1>";
}


    while ($row=mysqli_fetch_assoc($r)) {

        if ($_GET['selectbtn']=="true"){

            echo "<tr>
    <td>{$row['id']}</td>
    
    <td>{$row['nev']}</td>
    <td><a href='tel:{$row['tel']}'>Call</a></td>
    <td>{$row['email']}</td>
    <td>{$row['megjegzyes']}</td>
    <td><button class='secondarybtn' onclick='AddClientToBorrow({$row['id']})'>Select</button></td>

    </tr>";}
        else{
            echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['nev']}</td>
    <td><a href='tel:{$row['tel']}'>Call</a></td>
    <td><a href='mailto:{$row['email']}'>Mail</a></td>
    <td>{$row['megjegzyes']}</td>
    

    </tr>";
        }
}

}









