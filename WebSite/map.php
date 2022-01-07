<?php include 'include/header.php';?>
<?php 
    $id = $_GET['id'];
    $query = "SELECT * FROM tourist_place WHERE id=$id";
    $excute=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($excute);
?>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    /*Various edits stop bootstrap*/
p, li {
    font-size: 1em !important;
    line-height: 1.15 !important;
    margin: 10px 0 0 0 !important;
}

p.btn {
    margin-top: 1em;
    display: inline-block;
}
.container.body-content {
    padding: 8px 0;
    width: 90%;
    margin: 0 auto;
}

label, input, button {
    display: block;
}

input[type="text"]{
    padding: 10px;
    width: 100%;
}

button {
    margin: 10px 0 !important;
    padding: 10px 20px;
}

#error-msg {
  color: #C50707; 
}

table {
    margin-top: -20px;
}
  th {
        color: white;
        padding: 10px;}
    .type {
      background-color: #65686C;
    }
    
    .std-prem {
      background-color: #6DA6F3;
    }
  

  td {
      padding: 10px;  
      border-bottom: 1px solid #000;
      vertical-align: top;}
    p {
      margin: 0;
    }
    
    a {
      color: #666 !important;    
    }
    
    .type {
      background-color: #ccc;
      color: black;
      width: 30%;
    }
    
    .std-prem {
      background-color: #E5F3FE;
      color: black;
    }
  
.container .jumbotron {
  padding: 10px;
}
    h1 {
      font-size: 45px !important; 
      margin: 0 0 10px 0;
    }
    p {font-size: 14px;}
    

/*Map Styling*/
#map-canvas{
    border: groove 3px #ccc;
    height: 400px; 
    width: 100%;
}

</style>
<body>

<div class="container mt-5 body-content" data-name="<?php echo $row['nameplace'] ?> ">
<form action="#" onsubmit="showAddress(this.address.value); return false">
    <div class="row">
        <div class="col-md-6">
            <!-- <label for="address">Address</label> -->
            <input id="address" type="text" placeholder="Enter an address"  />
            <button type="button" id="submit">Locate!</button>
          <p id="error-msg"></p>
        </div>
        <div class="col-md-6 the-map">
          <iframe id="map-canvas" src="" allowfullscreen></iframe>
        </div>

    </div>
</form>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" ;
var zoom = 14;
var defaultLoc = "Amman";

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
        
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var name = $(".body-content").attr("data-name");
var srcContent = linkKey + "&q=" + name + "&zoom=" + zoom;
alert(srcContent);alert('ahmad');
$("#map-canvas").attr("src", srcContent);


//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#submit').on('keypress click', function (e) {
        if ($('#address').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address').val();
        }
        srcContent = linkKey + "&q=" + name+ "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas").attr("src", srcContent);
        }

    });
});</script>
</body>