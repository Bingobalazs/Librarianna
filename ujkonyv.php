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
    <title>Add book</title>
</head>
<body>
<navbar>

    <ul>
        <li><a href="ujkonyv.php" class="active">+ Book</a></li>
        <li><a href="newclient.php">+ Client</a></li>
        <li><a href="books.php">Books</a></li>
        <li><a href="Clients.php">Clients</a></li>
        <li><a href="borrow.php" >Borrow</a></li>
        <li><a href="borrows.php">Return</a></li>
        <li><a href="clientcard.php">Client card</a></li>
    </ul>
</navbar>
<h1>Add book</h1>
<div class="container">
    <section>
        <div class="inprow">
            <div class="inppair-lg">
                <label for="author">Author</label>
                <input type="text" name="author" class="" id="author">
            </div>
            <div class="inppair-sm">
                <label for="pages">Pages</label>
                <input type="text" name="pages" class="" id="pages">
            </div>
        </div>



        <div class="inprow">
            <div class="inppair-lg">
                <label for="title">Title</label>
                <input type="text" name="title" class="" id="title">
            </div>
            <div class="inppair-sm">
                <label for="Quantity">Quantity</label>
                <input type="text" name="Quantity" class="" id="quant">
            </div>
        </div>



        <div class="inprow">
            <div class="inppair-lg">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" class="" id="isbn">
            </div>
            <div class="inppair-sm">
                <label for="maxdays">Max borrow days</label>
                <input type="text" name="maxdays" class="" id="maxdays">
            </div>
        </div>



        <div class="inprow">
            <div class="inppair-lg">
                <label for="author">Edition</label>
                <input type="text" name="edition" class="" id="edition">
            </div>
            <div class="inppair-sm">
                <label for="hard">Hard cover</label>
                <select name="hard" id="hard">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        </div>
        <div class="inprow">
            <div class="inppair-lg">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <div class="inppair-sm">
                <label for="type">Type</label>
                <select name="type" id="">

                </select>
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
            "libadd.php?into=konyv"+
            "&title="+document.getElementById('title').value+
            "&author="+document.getElementById("author").value+
            "&pages="+ (document.getElementById('pages').value)+
            "&quant="+ (document.getElementById('quant').value)+
            "&isbn="+ (document.getElementById('isbn').value)+
            "&comment="+ (document.getElementById('comment').value)+
            "&maxdays="+ (document.getElementById('maxdays').value)+
            "&edition="+ (document.getElementById('edition').value)+
            "&hard="+(document.getElementById('hard').value);


        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                console.log(res);
                window.alert("Book added succefully!")
            })

    }
</script>
