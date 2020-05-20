<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "mediafiles");
    if(!$connection){
        die('Nem connection -> ' . mysqli_error());
    }
?>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        body{
            background-color:#C3B2D0;
            color:#220033;
            font-weight: 777;
            font-family:"Times New Roman", Times, serif;
            font-size:120%;
        }
        input{
            opacity:40%;
            width: 70%;
            height: 100%;
            border-radius: 10%;
        }
        input:focus{
            opacity:90%;
        }
        #data_input_area{
            border-style: solid;
            border-color: white;
            display:flex;
            flex-direction:column;
            margin-top: 2%;
            width: 90%;
            height: 100%;
        }
        .stuff{
            padding-top:5%;
            width: 100%;
            height:5%;
            display:flex;
            flex-direction:column;
        }
        button{
            background-color: #220033;
            width: 7%;
            height: 100%;
            color: gold;
            height: 100%;
            border-color: gold;
            border-radius:7px;
        }
        button:hover{
            background: gold;
            color: #220033;
        }
        button:active{
            transform: scale(0.5);
        }
    </style>
    <script>
        function deleteData(){
            var xmlhttp = new XMLHttpRequest();
                 xmlhttp.onreadystatechange = function(){

                 };
                 var id = document.getElementById("id_input_area").value;
                 xmlhttp.open("GET", "deleteData.php?id=" + id, true);
                     xmlhttp.send();
                     console.log(this.responseText);
                     console.log("uuuuhhhhh plang mergi");
                
                window.open("http://localhost/lab7/browsePage.php", "_self");
        }
    </script>
    </head>

    <body>
    <div id="data_input_area">
    <p style="font-size:250%;">Please input the ID of the file you want to delete</p>
        <div class="stuff">
            <label class = "id_text">ID</label>
            <input type = "text" id = "id_input_area" name = "id">
        </div>
        <div class="stuff">
    <button id="delete_button" onclick="deleteData()">Done</button>
        </div>
    </div>
    </body>
</html>