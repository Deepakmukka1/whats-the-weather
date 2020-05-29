<?php
$weather="";
$city="";
if(array_key_exists('city',$_GET))
{
    $city=str_replace(' ','',$_GET['city']);
$headers = @get_headers("https://www.weather-forecast.com/locations/".$_GET['city']."/forecasts/latest"); 
  
// Use condition to check the existence of URL 
if(!($headers && strpos( $headers[0], '200'))) { 
    
    echo '<div class="alert alert-danger" role="alert" style="text-align:center;">City Does not Exist or Try captilizing first letter</div>'; 
} 
else {
    
$string1= file_get_contents("https://www.weather-forecast.com/locations/".$_GET['city']."/forecasts/latest");
$string2=explode('Weather Today</h2> (1–3 days):</div>',$string1);
$string3=explode('</span><!-- <span id="ezoic-pub-ad-placeholder-124" class="ezoic-adpicker-ad" data-ezadblocked=\'true\'></span> --><!-- placeholder 124 blocked.  Reason : no sizes --></p></div>',$string2[1]);
//echo $string3[0];
$weather=$string3[0];

}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>scraping</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<style type="text/css">
		html { 
  background: url(unspla.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body{

 background: none;
	}
	.container{

		text-align: center;
		margin-top: 240px;
		width: 450px;
	}
	#weather{

		margin-top: 20px;
		color:black;
		font-weight:bold;
	}
	@media screen and (max-width:400px){
	    	.container{
	    width:auto;
	    	}
	    
	}

	</style>


</head>
<body method="GET">
	<div class="container">
		
    <h1>What's the weather?</h1>
    <form>
  <div class="form-group">
    <label for="city" style="font-weight:bold;">Enter city name</label>
    <input type="text" class="form-control" id="city" name="city"  placeholder="Eg. London,Khammam">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
 <div id="weather"><?php
     if($weather)
     {
         echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
     }
  /*   else if($weather==""){
         
         echo '<div style="display:none;"></div>';
     }
     else{
           echo '<div class="alert alert-danger" role="alert">'.$status.'</div>';
     }*/
   
 ?></div>
	</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
