
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Search client</title>
</head>
<body>
<navbar>

    <ul>
        <li><a href="ujkonyv.php">+ Book</a></li>
        <li><a href="newclient.php">+ Client</a></li>
        <li><a href="books.php">Books</a></li>
        <li><a href="Clients.php" class="active">Clients</a></li>
        <li><a href="borrow.php" >Borrow</a></li>
        <li><a href="borrows.php">Return</a></li>
        <li><a href="clientcard.php">Client card</a></li>
    </ul>
</navbar>
<h1>Search client</h1>
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
                <input type="date" name="reg" class="" id="teg">
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
                <label for="hard">Can borrow</label>

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
            <button class="primarybtn" onclick="ClientSRC(0)">Search</button>
        </div>


    </section>



</div>

<table id="result_table">


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
    function ClientSRC(id) {

        var Uurl =
            "libsrc.php?from=client"+"&selectbtn=false"

        +"&email="+document.getElementById('email').value+
        "&name="+document.getElementById("fullname").value+

        "&address="+ (document.getElementById('address').value)+
        "&comment="+ (document.getElementById('comment').value);

        if (id !=0){
            Uurl+="&id="+id
        }
        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                //console.log(res);
                document.getElementById('result_table').innerHTML="";
                document.getElementById('result_table').innerHTML="<thead> <tr><th>ID</th><th>Name</th><th>Address</th><th>E-mail</th><th>Tel</th><th></th></tr></thead>";
                document.getElementById('result_table').innerHTML+=res;


            })

    }
</script>

