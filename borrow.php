<!DOCTYPE html>
 <html lang='en'>
 <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel="stylesheet" href="style.css">
    <title>Borrow</title>
 </head>
 <body>
 <div class="container">
 <navbar>

     <ul>
         <li><a href="ujkonyv.php">+ Book</a></li>
         <li><a href="newclient.php">+ Client</a></li>
         <li><a href="books.php">Books</a></li>
         <li><a href="Clients.php">Clients</a></li>
         <li><a href="borrow.php" class="active">Borrow</a></li>
         <li><a href="borrows.php">Return</a></li>
         <li><a href="clientcard.php">Client card</a></li>
     </ul>
 </navbar>




    <section>
        <h1>Borrow books</h1>
    <div class="inprow">
        <div class="">
        <button class="secondarybtn" onclick="AddBookToBorrow()">Select Book</button>
        </div>
        <div class="">
        <button class="secondarybtn" onclick="AddClientToBorrow()">Select client</button>
        </div>
    </div>
        <div class="inprow">
            <div class="">
                <input  type="text" placeholder="ISBN" onchange="BookSRC(this.value)">
            </div>
            <div class="">
                <input  type="text" placeholder="id" onchange="ClientSRC(this.value)">
            </div>
        </div>

    <div class="inprow">
            <div class="tablestuff2">

                <table >
                    <thead><tr><th>ID</th><th>Author</th><th>Title</th><th>ISBN</th><th>+</th><th>Days</th></tr></thead>
                    </thead>
                    <tbody id="book_select_table"></tbody>


                </table>
            </div>
            <div class="">
            <table >
                <thead> <tr><th>ID</th><th>Name</th><th>E-mail</th><th>Phnone</th><th>+</th</tr></thead>
                <tbody id="client_select_table"></tbody>

                </table>
            </div>
        </div>
        <div class="inprow">
        <div class="">
        <input class="" type="number" placeholder="Expire..." id="maxdays">
        </div>
        <div class="">
        <textarea class=""  placeholder="Comment..." id="comment"></textarea>
        </div>
        
    </div>
    <div class="inprow">
    <button class="primarybtn" onclick="NewBorrow()">Save</button>
    </div>
    <table id="result_table">

    </table>
</section>
</div>




 </body>
 </html>
<script>
    var bookid=null;
    var clientid=null;
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
    function NewBorrow(params) {
        var Uurl =
            "libadd.php?into=kolcsonzes&book_id="+bookid
            +"&client_id="+clientid+"&maxdays="+ (document.getElementById('maxdays').value)+"&comment="+ (document.getElementById('comment').value);


        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                console.log(res);
                window.alert("Client added succefully!")
            })

    }
    
function AddBookToBorrow(params){
     //bookid = prompt("Please enter the borrowed book's id:", "Book's id...");
    bookid=params;
    BookSRC(0);
     GetBookById(params);


}
function AddClientToBorrow(params){
    //clientid = prompt("Please enter the borrower client's id:", "Client's id...");
    clientid=params;
    ClientSRC(0);
    GetClientById(params);

}

function BookSRC(id) {
        var Uurl =
            "libsrc.php?from=book"+"&selectbtn=true"
            /*
            +"&title="+document.getElementById('title').value+
            "&author="+document.getElementById("author").value+
            "&isbn="+ (document.getElementById('isbn').value)+

            "&comment="+ (document.getElementById('comment').value);*/

    if (id !=0){
        Uurl+="&isbn="+id
    }
        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                //console.log(res);
                document.getElementById('result_table').innerHTML="<thead><tr><th>ID</th><th>Author</th><th>Title</th><th>ISBN</th><th>Comment</th><th>Hard cover</th><th>Pages</th><th>Borrow days</th><th>Registrated</th><th>Publish date</th><th></th></tr></thead>";
                document.getElementById('result_table').innerHTML+=res;
                
                
            })

    }

    function ClientSRC(id) {

        var Uurl =
            "libsrc.php?from=client"+"&selectbtn=true"
            /*
            +"&title="+document.getElementById('title').value+
            "&author="+document.getElementById("author").value+

            "&isbn="+ (document.getElementById('isbn').value)+
            "&comment="+ (document.getElementById('comment').value);*/

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

    function GetBookById(params) {
        var Uurl =
            "libsrc.php?from=book&id="+params+"&selectbtn=false";


        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                console.log(res);
                document.getElementById('book_select_table').innerHTML="";
                document.getElementById('book_select_table').innerHTML+=res;


            })
    }
    function GetClientById(params) {
        var Uurl =
            "libsrc.php?from=client&id="+params+"&selectbtn=false";


        console.log(Uurl);
        HTTPRequest(Uurl, 'GET',
            (res)=>{

                console.log(res);
                document.getElementById('client_select_table').innerHTML="";
                document.getElementById('client_select_table').innerHTML+=res;


            })
    }
</script>