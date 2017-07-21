
<?php // Example 21-3: setup.php
include_once 'header.php';



// escape variables for security
    $cname = sanitizeString($_POST['cname']);
    $title = sanitizeString($_POST['title']);
    $salary = sanitizeString($_POST['salary']);
    $address = sanitizeString($_POST['address']);
    $address2 = sanitizeString($_POST['address2']);
    $city = sanitizeString($_POST['city']);
    $state = sanitizeString($_POST['state']);
    $zip = sanitizeString($_POST['zip']);
    $category = sanitizeString($_POST['category']);
 $type = sanitizeString($_POST['type']);
    $description = sanitizeString($_POST['description']);
   


queryMysql("INSERT INTO job (cname, title, category, salary, type, description) VALUES('$cname', '$title', '$category', '$salary', '$type', '$description')");
queryMysql("INSERT INTO address (address, address2, city, state, zip) VALUES('$address', '$address2', '$city', '$state', '$zip')");

$php_var= $_POST['address'];
    			$php_var.= " ";
    			$php_var.= $_POST['city'];
    			$php_var.= " ";
    			$php_var.= $_POST['state'];


?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="style.css" type="text/css">
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
var type="<?php echo $type;?>";
var desc="<?php echo $description; ?>";  
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
  </head>
  <body onLoad="codeAddress()">
  	<div id="field">
    	<p>Your job has been posted!!</p><br>
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
			 "</table>";
		?>
        
    </div>
    <div id="map-canvas"/>
  </body>
</html>

