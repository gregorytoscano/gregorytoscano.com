<!-- Body Content -->
<div class="container container-table">
	<div class="row vertical-center-row">
		<div class="col-md-3"></div>
		<div class="text-center col-lg-6">
			<img src="images/logo.png" \>
			<form method="post" action="./search.php" onsubmit=codeAddress()>  
     			<input type="text" name="search" style="font-size:14pt;height:35px" value="<?php echo isset($_POST['search'])?$_POST['search']:''?>" placeholder="Job Title" autofocus>
				  <input type="text" name="city" style="font-size:14pt;height:35px" placeholder="Location"><br /><br /><p></p>
        		<input type="submit" name="submit" value="Find Jobs" class="classname">
    		</form>
    	</div>
    	<div class="col-md-3"></div>
    	</div>
    </div>
</div>
<!-- End of Body Content -->
