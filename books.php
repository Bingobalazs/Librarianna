
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Search books</title>
</head>
<body>
<navbar>

    <ul>
        <li><a href="ujkonyv.php">+ Book</a></li>
        <li><a href="newclient.php">+ Client</a></li>
        <li><a href="books.php" class="active">Books</a></li>
        <li><a href="Clients.php">Clients</a></li>
        <li><a href="borrow.php" >Borrow</a></li>
        <li><a href="borrows.php">Return</a></li>
        <li><a href="clientcard.php">Client card</a></li>
    </ul>
</navbar>
<h1>Search books</h1>
<div class="container">
    <section>
        <div class="inprow">
            <div class="inppair-lg">
                <label for="author">Author</label>
                <input type="text" name="author" class="" id="author">
            </div>
            <div class="inppair-sm">
                
            </div>
        </div>



        <div class="inprow">
            <div class="inppair-lg">
                <label for="title">Title</label>
                <input type="text" name="title" class="" id="title">
            </div>
            <div class="inppair-sm">
                
            </div>
        </div>



        <div class="inprow">
            <div class="inppair-lg">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" class="" id="isbn">
            </div>
            <div class="inppair-sm">
                
            </div>
        </div>



        
        <div class="inprow">
            <div class="inppair-lg">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <div class="inppair-sm">
                

                </select>
            </div>
        </div>

        <div class="inprow">
            <button class="primarybtn" onclick="src()">Search</button>
        </div>

    </section>



</div>

<table id="result_table"   >
    
    
</table>

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

    function src(params) {
        var Uurl =
            "libsrc.php?from=book"+
            "&title="+document.getElementById('title').value+
            "&author="+document.getElementById("author").value+
            "&isbn="+ (document.getElementById('isbn').value)+
            "&fullinfo=true"+
            "&comment="+ (document.getElementById('comment').value);


        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                console.log(res);
                document.getElementById('result_table').innerHTML="<tr><th>ID</th><th>Author</th><th>Title</th><th>ISBN</th><th>Comment</th><th>Hard cover</th><th>Pages</th><th>Borrow days</th><th>Registrated</th><th>Publish date</th></tr>";
                document.getElementById('result_table').innerHTML+=res;
                
                
            })

    }

</script>

