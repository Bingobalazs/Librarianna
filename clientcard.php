<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Client Card</title>
</head>
<body onload="ClientSRC(<?php echo $_GET['id']?>)">
<div class="ccard">
    <table>
        <thead></thead>
        <tbody id="result_table"></tbody>
    </table>
    <svg id="barcode"></svg>
    <table>
        <thead></thead>
        <tbody id="borrow_table" style="font-size: 0.8rem; "></tbody>
    </table>

</div>

</body>
</html>
<script src="JsBarcode.all.min.js"></script>
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
        console.log((<?php echo $_GET['id']?>))
        var Uurl = "libsrc.php?from=client&selectbtn=false&id="+id;


        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                //console.log(res);
                document.getElementById('result_table').innerHTML="";
                document.getElementById('result_table').innerHTML="<thead> <tr><th>ID</th><th>Name</th><th>Tel</th><th>E-mail</th><th>+</th></tr></thead>";
                document.getElementById('result_table').innerHTML+=res;


            })
        JsBarcode("#barcode", id);
        src();
    }






    function src(params) {
        var Uurl =
            "libsrc.php?from=borrows"+"&client_id="+<?php echo $_GET['id']?>+"&deletebtn=true";


        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                console.log(res);
                document.getElementById('borrow_table').innerHTML="<tr><th>ID</th><th>Borrowed</th><th>Book ID</th><th>Author</th><th>Title</th><th>ISBN</th><th>Days</th><th>Client ID</th><th>Client Name</th><th>Tel</th><th>E-mail</th><th></th></tr>";
                document.getElementById('borrow_table').innerHTML+=res;


            })

    }
    function Delete(params) {
        var Uurl =
            "libadd.php?into=return&id="+params;


        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                console.log(res);



            })
        src()
    }

</script>
<?php