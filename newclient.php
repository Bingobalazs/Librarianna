<?php



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Add client</title>
</head>
<body>
<navbar>

    <ul>
        <li><a href="ujkonyv.php">+ Book</a></li>
        <li><a href="newclient.php" class="active">+ Client</a></li>
        <li><a href="books.php">Books</a></li>
        <li><a href="Clients.php">Clients</a></li>
        <li><a href="borrow.php" >Borrow</a></li>
        <li><a href="borrows.php">Return</a></li>
        <li><a href="clientcard.php">Client card</a></li>
    </ul>
</navbar>
<h1>Add client</h1>
<div class="container">
    <section>
        <div class="inprow">
            <div class="inppair-lg">
                <label for="fullname">Full name</label>
                <input type="text" name="fullname" class="" id="fullname">
            </div>
            <div class="inppair-sm">
                <label for="birth">Birth</label>
                <input type="date" name="birth" class="" id="birth">
            </div>
        </div>



        <div class="inprow">
            <div class="inppair-lg">
                <label for="address">Address</label>
                <input type="text" name="address" class="" id="address">
            </div>
            <div class="inppair-sm">
                <label for="reg">Reg. date</label>
                <input type="date" name="reg" class="" id="reg">
            </div>
        </div>



        <div class="inprow">
            <div class="inppair-lg">
                <label for="email">E-mail</label>
                <input type="text" name="email" class="" id="email">
            </div>
            <div class="inppair-sm">
                <label for="sex">Sex</label>
                <select name="sex" id="sex">
                    <option value="" selected disabled>Choose</option>
                    <option value="f">Female</option>
                    <option value="m">Male</option>
                    <option value="o">Other</option>
                </select>
            </div>
        </div>



        <div class="inprow">
            <div class="inppair-lg">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="" id="phone">
            </div>
            <div class="inppair-sm">
                <label for="borrow">Can borrow</label>
                <select name="borrow" id="borrow">
                    <option value="0">No</option>
                    <option value="1" selected >Yes</option>
                </select>
            </div>
        </div>
        <div class="inprow">
            <div class="inppair-lg">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <div class="inppair-sm">

            </div>
        </div>

        <div class="inprow">
            <button class="primarybtn" onclick="u()">Add</button>
        </div>

    </section>
</div>

</body>
</html>
<script>
    function HTTPRequest(url, method, callback) {
        var xhttp = new XMLHttpRequest()
        xhttp.onreadystatechange=function(){
            if (xhttp.readyState == 4 && xhttp.status ==200) {
                let res =this.responseText;
                callback(res);
            }
        }
        xhttp.open(method, url);
        xhttp.send();
    }

    function u(params) {
        var Uurl =
            "libadd.php?into=olvaso"+
            "&name="+document.getElementById('fullname').value
            +"&birth="+document.getElementById("birth").value+"&address="+ (document.getElementById('address').value)+
            "&sex="+ (document.getElementById('sex').value)+
            "&phone="+ (document.getElementById('phone').value)+
            "&comment="+ (document.getElementById('comment').value)+
            "&borrow="+ (document.getElementById('borrow').value)+
            "&reg_dt="+ (document.getElementById('reg').value)+
            "&email="+(document.getElementById('email').value);


        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                console.log(res);
                window.alert("Client added succefully!")
            })

    }
</script>
