
<?php // Example 21-3: setup.php
include_once 'includes/header.php';
$searchq = $_GET['ID'];
$var1 = $_GET['searchq'];
$var2 = $_GET['searchc'];

$result = queryMySQL("SELECT * FROM job,address WHERE job.PID=$searchq and job.PID=address.PID") or die("could not search");
$count = mysqli_num_rows($result);


if($count == 0)
{
  $_SESSION['reterror'] = 'No Employees Found';
}
else{

while($row = $result->fetch_assoc())
{
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
}
  
$php_var= $address;
$php_var.= " ";
$php_var.= $city;
$php_var.= " ";
$php_var.= $state;
if ($description==NULL) {
    $desc = "No Description Available";
}
else{$desc = $row["description"];}
}
?>



    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt7wRfwzWlPYXgMSMfsjiFtcxCxTEqWIA">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
var addressm="<?php echo $php_var; ?>"; 
var cname="<?php echo $cname; ?>";   
var title="<?php echo $title; ?>"; 
var category="<?php echo $category; ?>"; 
var salary="<?php echo $salary; ?>";
var type="<?php echo $type; ?>";
var desc="<?php echo $desc; ?>";
var geocoder;
var map;
        var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">' + cname + '</h1>'+
      '<div id="bodyContent">'+
      '<p><b>Position Title: </b>' + title + '</p>' +
	  '<p><b>Salary :</b>' + salary + '</p>'+
      '<p><b>Category: </b>'+ category + '</p>' +
	  '<p><b>Type: </b>'+ type + '</p>' +
	  '<p><b>Description: </b>' + desc + '</p>' +
      '</div>'+
      '</div>';
        var infowindow = new google.maps.InfoWindow;
function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var mapOptions = {
    zoom: 8,
    center: latlng
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}

function codeAddress() {
  address = addressm;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    map.setCenter(results[0].geometry.location);
      
      
  var marker = new google.maps.Marker({
      position: results[0].geometry.location,
      map: map,
      
  });
  
   google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString);
       infowindow.open(map,marker);
  });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}
      

        

google.maps.event.addDomListener(window, 'load', initialize);


    </script>

  <body onLoad="codeAddress()">
  	<div id="field">
    	<h2>Job Description</h2>
        <form form method="post" action="search.php" onsubmit=codeAddress()>
        <input type=hidden   name="search" value="<?php echo htmlspecialchars($var1); ?>" />
        <input type=hidden   name="city" value="<?php echo htmlspecialchars($var2); ?>" />
        <?php
         
         
		echo "<table cellspacing='10'>".
			 "<tr><td><b>Company Name: </b></td><td>". $cname ."</td></tr>".
			 "<tr><td><b>Position Title: </b></td><td>". $title ."</td></tr>".
			 "<tr><td><b>Category: </b></td><td>". $category ."</td></tr>".
			 "<tr><td><b>Salary: </b></td><td>". $salary ."</td></tr>".
			 "<tr><td><b>Job Type: </b></td><td>". $type ."</td></tr>".
		     "<tr><td><b>Address: </b></td><td>". $address ."</td></tr>".
			 "<tr><td><b>         </b></td><td>". $address2 ."</td></tr>".
			 "<tr><td><b>City: </b></td><td>". $city ."</td></tr>".
			 "<tr><td><b>State: </b></td><td>". $state ."</td></tr>".
			 "<tr><td><b>Zip Code: </b></td><td>". $zip ."</td></tr>".		 
			 "<tr><td><b>Details and Requirements: </b></td><td>". $description ."</td></tr>".
             "<tr><td colspan='2'><button type='button' onClick='myFunction()'> Apply Now </button></td>".
 			"<td><input type='submit' value='Go Back'></td></tr>".
			 "</table>";
        
		?>

  
	  
  
            
        </form>
    <p id="demo"></p>  <script>function myFunction() {
    document.getElementById("demo").innerHTML = "You have applied succesfully";
}</script>
 
    </div>
      
    <div id="map-canvas"/>
  </body>
</html>

