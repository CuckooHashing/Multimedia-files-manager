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
            height: 120%;
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
            height:20%;
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
        function addData(){
            var xmlhttp = new XMLHttpRequest();
                 xmlhttp.onreadystatechange = function(){

                 };
                 var id = document.getElementById("id_input_area").value;
                 var title = document.getElementById("title_input_area").value;
                 var type = document.getElementById("type_input_area").value;
                 var genre = document.getElementById("genre_input_area").value;
                 var path = document.getElementById("path_input_area").value;
                 
                 xmlhttp.open("GET", "addData.php?id=" + id + "&title=" + title + "&type="+type+"&genre="+genre+"&path="+path, true);
                     xmlhttp.send();
                     console.log(this.responseText);
                     console.log("uuuuhhhhh plang mergi");
                
                window.open("http://localhost/lab7/browsePage.php", "_self");
        }
    </script>
    </head>

    <body>
    <div id="data_input_area">
    <p style="font-size:250%;">Please input the correspounding information</p>
        <div class="stuff">
            <label class = "id_text">ID</label>
            <input type = "text" id = "id_input_area" name = "id">
        </div>
        <div class="stuff">
            <label class = "title_text">Title</label>
            <input type = "text" id = "title_input_area" name = "title">
        </div>
        <div class="stuff">
            <label class = "type_text">Type</label>
            <input type = "text" id = "type_input_area" name = "type">
        </div>
        <div class="stuff">
            <label class = "genre_text">Genre</label>
            <input type = "text" id = "genre_input_area" name = "genre">
        </div>
        <div class="stuff">
            <label class = "path_text">Path</label>
            <input type = "text" id = "path_input_area" name = "path">
        </div>
        <div class="stuff">
    <button id="add_button" onclick="addData()">Done</button>
        </div>
    </div>
    </body>
</html>