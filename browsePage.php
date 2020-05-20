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
        }
        input{
            opacity:40%;
        }
        input:focus{
            opacity:90%;
        }
    #search_area{
        display:flex;
        flex-direction:column;
        margin-top: 2%;
        width: 90%;
        height: 100%;
    }
    #overall{
        display:flex;
        flex-direction:row;
        height: 100%;
        width: 100%;
    }
    #buttons_area{
        display:flex;
        flex-direction:column;
        width: 10%;
        background-color: #220033;
    }
    .search_text{
        margin-left: 23%;
        font-size: 130%;
    }
    #searchBar_fill{
        display:flex;
        flex-direction:row;
        justify-content: center;
    }
    #search_input_area{
        width: 50%;
    }
    #searchButton{
        width: 5%;
        border-width: 3px;
        border-style: solid;
        border-radius: 7%;

    }
    #filter_area{
        margin-top: 1%;
        display:flex;
        flex-direction:row;
        justify-content: center;
    }
    #search_filter_options{
        width: 30%;
        height: 25%;
    }
    #table_area{
        width: 100%;
        display:flex;
        flex-direction:row;
        justify-content: center;
    }
    #media_files{
        width: 70%;
        border-style: solid;
        border-size: 3px;
    }
    table {
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

    td {
            text-align: left;
            padding: 16px;
        }
    th {
            background-color: #220033;
            color: gold;
            text-align: left;
            padding: 16px;
        }
    tr:hover, tr:focus {
        background-color: #220033;
        color: gold;
    }
    .button_area_button{
        background-color: #220033;
        width: 100%;
        color: gold;
        height: 5%;
        border-color: gold;
        border-radius:7px;
    }
    .button_area_button:hover,
    .button_area_button:focus {
        background: gold;
        color: #220033;
        }
    .button_area_button:active {
        transform: scale(0.5);
        }
    #previous_filter{
        padding-left:40%;
    }
    </style>
    <script>
        var prevFilter = "";
        var prevSearch = "";
        function populate(){
            var xmlhttp = new XMLHttpRequest();
                 xmlhttp.onreadystatechange = function(){
                    console.log("begin populate");
                    if(this.readyState == 4 && this.status == 200)
                     {
                         resultTable = "<table id = \"file_table\"><tr><th>ID</th><th>Title</th><th>Type</th><th>Genre</th><th>Path</th></tr>";
                         var data;
                         try{
                            data = JSON.parse(this.responseText);
                            len = a.length;
                            }
                         catch(err){
                             console.log("An error at json parsing from server occured");
                         }
                         for(var i in data){
                            resultTable += "<tr>" + "<td>" + data[i][0] + "</td>" + "<td>" + data[i][1] + "</td>" + "<td>" + data[i][2] + "</td>" + "<td>" + data[i][3] + "</td>" + "<td>" + data[i][4] + "</td>";
                            resultTable += "</tr>";
                         }
                         resultTable += "</table>";
                         document.getElementById("media_files").innerHTML = resultTable;
                     }
                 };
                 xmlhttp.open("GET", "retriveData.php", true);
                     xmlhttp.send();
                     console.log(this.responseText);
                     console.log("end");
        }
        function fill(){
            document.getElementById("media_files").innerHTML = "";
            var xmlhttp = new XMLHttpRequest();
                 xmlhttp.onreadystatechange = function(){
                    console.log("begin");
                    if(this.readyState == 4 && this.status == 200)
                     {
                         resultTable = "<table id = \"file_table\"><tr><th>ID</th><th>Title</th><th>Type</th><th>Genre</th><th>Path</th></tr>";
                         var data;
                         try{
                             console.log(this.responseText)
                            data = JSON.parse(this.responseText);
                            }
                         catch(err){
                             console.log("An error at json parsing from server occured");
                             console.log(err);
                         }
                         for(var i in data){
                            resultTable += "<tr>" + "<td>" + data[i][0] + "</td>" + "<td>" + data[i][1] + "</td>" + "<td>" + data[i][2] + "</td>" + "<td>" + data[i][3] + "</td>" + "<td>" + data[i][4] + "</td>";
                            resultTable += "</tr>";
                         }
                         resultTable += "</table>";
                         document.getElementById("media_files").innerHTML = resultTable;

                         
                     }
                 };
                 var val = document.getElementById("search_input_area").value;
                 prevSearch = val;
                 var selct = "";
                 var filter;
                 try{
                    selct = document.getElementById("search_filter_options");
                    filter = selct.options[selct.selectedIndex].text;
                    prevFilter = filter;
                 }
                 catch(err){
                            console.log("no filter was selected, previous one will be run");
                            filter = prevFilter;
                         }
                 xmlhttp.open("GET", "retriveCertainFiles.php?val=" + val + "&where=" + filter, true);
                     xmlhttp.send();
                     console.log(this.responseText);
                     console.log("uuuuhhhhh plang mergi");
                     document.getElementById("previous_filter").innerHTML = "The previous filter used was filter by " + prevFilter;
        }
        function addButton()
        {
            window.open("http://localhost/lab7/dataInputPage.php", "_self");
        }
        function deleteButton()
        {
            window.open("http://localhost/lab7/deletePage.php", "_self");
        }
        function updateButton(){
            window.open("http://localhost/lab7/updateDate.php", "_self");
        }
    </script>
    </head>
    
    <body onload="populate()">
        <div id="overall">
            <div id="buttons_area">
                <button class="button_area_button" onclick="populate()">Refresh</button>
                <button class="button_area_button" onclick="addButton()">Add</button>
                <button class="button_area_button" onclick="deleteButton()">Delete</button>
                <button class="button_area_button" onclick="updateButton()">Update</button>
            </div>
            <div id="search_area">   
                <label class = "search_text">Search</label>
                <div id="searchBar_fill">
                <input type = "text" id = "search_input_area" name = "search">
                <button onclick="fill()" id = "searchButton">Go</button>
                </div>
                <div id="filter_area">
                    <label id="select_text">Choose a filter:</label>
                    <select id="search_filter_options" name="filter_picker" multiple class="form-control selectpicker">
                        <option value="Type">Type</option>
                        <option value="Genre">Genre</option>
                    </select>
                </div>
                <p id="previous_filter"><p>
                <div id="table_area">
                <p id="media_files" onclick=""></p>
                <div>
            </div>
    </div>
    </body>
</html>