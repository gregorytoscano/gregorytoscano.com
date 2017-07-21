<?php
include 'includes/header_pages.php';

$output="";
if(isset($_POST['search'])) 
{
  $searchq = $_POST['search'];
  $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
  $searchc = $_POST['city'];
  $searchc = preg_replace("#[^0-9a-z]#i","",$searchc);

  $query = "SELECT * FROM job, address WHERE job.PID = address.PID and ((title LIKE '%$searchq%' or cname LIKE '%$searchq%' or title='%$searchq%')and(city LIKE '%$searchc%' or city ='%$searchc%'))";
  $results = $connection->query($query);

  if(!$results)
  {
    die($connection->error);
  }
  
  $count = $results->num_rows;

  if($count > 0)
  {
    $a = 0;
    $b = 0;

    echo "<table class='table table-hover' id='resultTable'>
          <thead class='thead-inverse'>
          <tr>
          <th><h3>Company Name</h3></th>
          <th><h3>Title</h3></th>
          <th><h3>Salary</h3></th>
          <th><h3>City</h3></th>
          </tr>
          </thead>";
    while($row = $results->fetch_assoc())
    {
      $ID = $row["PID"];
      $cname=$row["cname"];
      $title=$row["title"];
      $category=$row["category"];
      $salary=$row["salary"];
      $type=$row["type"];
      $description=$row["description"];
      $address=$row["address"];
      $address2 = $row["address2"];
      $city = $row["city"];
      $state = $row["state"];
      $zip = $row["zip"];

      echo "<tbody>";
      echo "<tr>";
      echo "<td> <div id='lin'><a href='jobdes.php?ID=$ID&searchq=$searchq&searchc=$searchc'>" . $cname . "</a></div></td>";
      echo "<td>" . $title . "</td>";
      echo "<td>" . $salary . "</td>";
      echo "<td>" . $city . "</td>";
      echo "</tr>";
      
      //address into array
      $php_var= $row['address'];
      $php_var.= " ";
      $php_var.= $row['city'];
      $php_var.= " ";
      $php_var.= $row['state'];
      $myarry[$a]= $php_var;
          
          
          
      $company[$a]=$cname;
      $tlt[$a]=$title;
      $cat[$a]=$category;
      $sal[$a]=$salary;
      $typ[$a]=$type;
      $desc[$a]=$description;
            
      ++$a;
    }

  } 
  else 
  {
    $output = 'There are no results';
  }
  $connection->close(); 
}
?>


<!--------------------------------------------  BEGIN GOOGLE MAP JAVASCRIPT -------------------------------------------------------->


<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt7wRfwzWlPYXgMSMfsjiFtcxCxTEqWIA">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
var jArray= <?php echo json_encode($myarry); ?>;
var Acomp= <?php echo json_encode($company); ?>;
var Atitle= <?php echo json_encode($tlt); ?>;
var Acategory= <?php echo json_encode($cat); ?>;
var Asal= <?php echo json_encode($sal); ?>;
var Atype= <?php echo json_encode($typ); ?>;
var Adesc= <?php echo json_encode($desc); ?>;
var geocoder;
var map;
var info_window = new google.maps.InfoWindow();       
    
 
        
         
         
        
function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(37.6,-95.665);
  var mapOptions = {
    zoom: 4,
    center: latlng
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    
}
        
function codeAddress(){
    
    for(var j = 0; j < jArray.length; j++){

  var address = jArray[j];
  var cname = Acomp[j]
  var title = Atitle[j];
  var salary = Asal[j];
  var category = Acategory[j];
  var type = Atype[j];
  var desc = Adesc[j];

 var content = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">' + Acomp[j] + '</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Position Title: </b>' + title + '</p>' +
    '<p><b>Salary :</b>' + salary + '</p>'+
      '<p><b>Category: </b>'+ category + '</p>' +
    '<p><b>Type: </b>'+ type + '</p>' +
    '<p><b>Description: </b>' + desc + '</p>' +
      '</div>'+
      '</div>'; 
        geocodeAddress(address,content);
}
        
        

function geocodeAddress(address,contentString) {
   /*var infowindow =null;
    
    var infowindow = new google.maps.InfoWindow({
      content: "holding"
  });*/
      
 
     
    geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    //map.setCenter(results[0].geometry.location);
    createMarker(results[0].geometry.location, contentString);

   
    
    
    
      
/*
  var marker = new google.maps.Marker({
      position: results[0].geometry.location,
      map: map,
      title: cname
  });
    
*/
        /*
    google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(contentString);
    infowindow.open(map,marker);
  });
      */
   
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });

}
}
      
        
function createMarker(latlng, html)
{
  var marker = new google.maps.Marker
                ({
                    map: map, 
                    position: latlng
                });
  google.maps.event.addListener(marker, 'click', function() {
                    info_window.setContent(html);
                    info_window.open(map, marker);
                });
 
}

        

google.maps.event.addDomListener(window, 'load', initialize);


    </script>
<body onLoad="codeAddress()">  </body>

<?php 
  print("$output");
  print("<div class='col-lg-6' id='map-canvas'/>");
?>