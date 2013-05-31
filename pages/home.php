<!DOCTYPE HTML>
<html lang="en">
	<head>

    <script src="../assets/js/jQuery.js"></script>
    <meta charset="utf-8">
    <title>Sign in · Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  <style type="text/css"></style><script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script></head>

  <body>

    <div class="container">

	<div class="span2 offset4 input-append">
      <form name="address">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Address">
        <button class="btn btn-primary" type="submit"><i class="icon-search icon-white"></i></button>
      </form>
	</div>
	<div id="Output"></div>

<script>
var output;
var ex;
var why;
$(document).load(getLocation());
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(getPermits);
    }
  else{$('#Output').text="Geolocation is not supported by this browser.";}
  }
function getPermits(position){
ex=position.coords.latitude;
why=position.coords.longitude;
$.ajax({
        url:"http://maps.raleighnc.gov/arcgis/rest/services/Utilities/Geometry/GeometryServer/buffer",
        dataType:"jsonp",
        type:"POST",       
        data:{geometries:JSON.stringify({geometryType:"esriGeometryPoint",geometries:[{x:position.coords.longitude,y:position.coords.latitude}]}),
        //data:{geometries:JSON.stringify({geometryType:"esriGeometryPoint",geometries:[{x:-78.64,y:35.78}]}),
        inSr:4326,
        outSr:4326,
        distances:"3000",
        unit:9002,
        f:"json"},
        success:function(data){
          $.ajax({
            url:"http://maps.raleighnc.gov/arcgis/rest/services/Planning/Permit_History/MapServer/0/query",
            type:"POST",
            dataType:"json",
            data:{
              geometry:JSON.stringify(data.geometries[0]),
              geometryType:"esriGeometryPolygon",
              returnGeometry:true,
              where:"1=1",
              outFields:"*",
              inSr:4326,
              f:"json"
            },
 
            success:function(data){
		for(var i=0; i < data.features.length; i++){
			permit = new Object();
			permit.x = data.features;
		}
	    output = data;
            }
          });
        },
        error:function(error){
          alert(error);
        }
      });
}
</script>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  

</body></html>
<?php 
?>
