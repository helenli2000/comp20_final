<!doctype html>
<html>
<head>
	<title>Gallery</title>
	<meta charset="utf-8"/>
	
	<!--css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant&family=News+Cycle&display=swap" rel="stylesheet">
    <!-- <link href="./assets/css/style.css" type="text/css" rel="stylesheet" /> -->

    <!--JQuery & Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	<style>
        .parallax {
			background-image: url("banner.jpg");
			height: 500px; 			
			/* Create the parallax scrolling effect */
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
		
		.centered {
			position: absolute;
			top: 65%;
			left: 50%;
			color:#ffffff;
			transform: translate(-50%, -50%);
			border-color: #ffffff;
			border-style: solid;
			/* border-width: thick; */
		}
		
		
		/************* CHANGE CSS BELOW LATER! THIS IS FROM SAMPLE ********/
		h1, h2, h3 {
		    font-family: 'Cormorant';
		}

		h6, li {
		    font-family: 'News Cycle';
		}

		p {
		    font-family: 'News Cycle';
		    font-size: 20px;
		}

		a {
		    font-family: 'Cormorant';
		    font-size: 20px;
		}

		a:hover {
		    color: #DB7018 !important;
		}

		a:active {
		    background-color: #DB7018 !important;
		}

		div.dropdown-menu {
		    font-family: 'Cormorant';
		    font-size: 20px;
		}

		button {
		    border: 1px solid #DB7018 !important;
		    color: #DB7018 !important;
		    background-color: #FFFFFF !important;
		    font-family: 'Cormorant';
		}

		button:hover {
		    color: #FFFFFF !important;
		    background-color: #DB7018 !important;
		}

		#exampleDropdownFormEmail1 {
		    width: 200px;
		}

		.masthead {
		  height: 100vh;
		  min-height: 500px;
		  background-image: url('../img/mastheadphotocropped.jpg');
		  background-size: cover;
		  background-position: center;
		  background-repeat: no-repeat;
		  color: #FFFFFF;
		}

		.masthead h1 {
		    font-size: 135px;
		}

		.masthead h2 {
		    font-size: 80px;
		}

		.masthead p {
		    font-family: 'News Cycle';
		    font-size: 28px;
		}

		.carousel-item {
		    background-color: #DB7018;
		    height: 500px;
		    color: #FFFFFF;
		}

		#bottomid {
		    background-color: #DB7018;
		    color: #FFFFFF !important;
		}

		.carousel-item h1 {
		  position: absolute;
		  margin: 0;
		  left: 50%;
		  top: 50%;
		  transform: translate(-50%, -50%);
		}

		.card-img-overlay {
		    padding-top: 565px;
		    padding-left: 30px;
		}

		label {
		    font-family: 'Cormorant';
		    font-size: 20px;
		}

		.dropdown .active {
		    background-color: #DB7018 !important;
		    color: #FFFFFF !important;
		}

		.jumbotron {
		    background-image: url('../img/mastheadphotothin.jpg');
		    background-size: cover;
		    color: #FFFFFF;
		    font-size: 135px;
		}
		/************* CHANGE CSS ABOVE LATER! THIS IS FROM SAMPLE ********/

		
	</style>
	
	<script>

		/* to display the gallery of painting */
		/* parameter is a json object of all artworks */
		function displayArtworks(artob) {
			var display = document.getElementById("artworks");
			var num_artworks = artob["num_results"]; //change num_results to the total number of image to display according to database
			var artwork_list = artob["results"]["artworks"]; // change this variable to = the array of all artworks in database
			// alert(artwork_list); //testing
			var results = "";
			
			for (i = 0; i < num_artworks; i++) {
				if (i == 0 || i % 4 == 0) {
				  	results += "<div class='row'>";
				}
				iart = {
					title: artwork_list[i]["title"],
					department_title: artwork_list[i]["department_title"], //department_title is same as genre
					material_title: artwork_list[i]["material_title"], //material_title can be used as medium. 
					artist_title: artwork_list[i]["artist_title"],
					thumbnail: artwork_list[i]["thumbnail"], //the image of the artwork here
				};
				// console.log(iart); //testing
				results +=
					"<div class='col-sm-6 col-md-3'><div class='card h-100'><img class='card-img-top img-thumbnail img-fluid' src='" +
					artwork_list[i]["thumbnail"] +
					"alt='Card image cap'><div class='card-body'><h3 class='card-title font-weight-bold'>" +
					artwork_list[i]["title"] +
					"</h3></div><ul class='list-group list-group-flush'><li class='list-group-item font-weight-bold'>" +
					artwork_list[i]["artist_title"] +
					"</li><li class='list-group-item'>" +
					artwork_list[i]["department_title"] +
					"</li><li class='list-group-item'>Current Rank: " +
					artwork_list[i]["material_title"] +
					"</li></ul></div></div>";

				if ((i + 1) % 4 == 0) {
					results += "</div>";
				}
			}
			display.innerHTML = results;
		}

		
		function favGenre() {  
			var mylist = document.getElementById("genreList");  
			document.getElementById("favouriteGenre").value = genreList.options[genreList.selectedIndex].text;  
		}  
		function favMedium() {  
			var mylist = document.getElementById("mediumList");  
			document.getElementById("favouriteMedium").value = mediumList.options[mediumList.selectedIndex].text;  
		}

	</script>
</head>


<body>

	<!-- accessing SQL database. need to be changed based on our own databse -->
	<?php
        // $items = array();
		// 
		// $servername = "sql204.epizy.com";
        // $username = "epiz_27903188";
        // $password = "SNVY72z8eP4FB";
        // $db = "epiz_27903188_jade_delight";
		// 
        // // Create connection
        // $conn = new mysqli($servername, $username, $password);
		// 
        // // Check connection
        // if ($conn->connect_error) {
        //   die("Connection failed: " . $conn->connect_error);
        // }
		// echo "Connected success";
		// 
		// //select the Database
		// $conn->select_db($db);
		// 
        // $sql = "SELECT * FROM menu";
		// echo "<br />The query is: " . $sql . "<br />";
        // $result = $conn->query($sql);
		// 
		// if ($result->num_rows > 0) {
        //   // output data of each row
        //   while($row = $result->fetch_assoc()) {
		// 
		//   }
        // } else {
        //   echo "0 results";
        // }
		// 
        // $conn->close();
    ?>
	
	
	<!-- header -->
    <!-- <div class="parallax"></div>
	<div class="centered">
		<img src="slicename.png" alt="LogoTransparent" width="380">
	</div> -->
	
	
	<!-- nav bar SAMPLE-->
	<!-- <nav>
	  <div class="container">
	    <div class="grid">
	      <div class="column-xs-12 column-md-10">
	        <p id="highlight">Katherine Kato</p>
	      </div>
	      <div class="column-xs-12 column-md-2">
	        <ul>
	          <li><a href="#" class="active">Work</a></li>
	          <li><a href="#">About</a></li>
	        </ul>
	      </div>
	    </div>
	  </div>
	</nav> -->
	
	
	
	<!-- drop down menu -->
	<form>
		<select id = "genreList" onchange = "favGenre()" >  
			<option> ---Choose Genre--- </option>  
			<option> genre1 </option>  
			<option> genre2 </option>  
			<option> genre3 </option>  
			<option> genre4 </option> 
			<option> genre5 </option>  
		</select>  
		
		<select id = "mediumList" onchange = "favMedium()" >  
			<option> ---Choose Medium--- </option>  
			<option> med1 </option>  
			<option> med2 </option>  
			<option> med3 </option>  
			<option> med4 </option> 
			<option> med5 </option>  
		</select>  
		
		<input type = "text" id = "favouriteGenre" size = "20" </p>  
		<input type = "text" id = "favouriteMedium" size = "20" </p>  
		<input type= "submit" value = "Submit" onclick = displayBooks()</p>
	</form>
	
	
	<!-- Book Cards from js-->
	<div id="artworks" class="container">
	</div>
	
	
	<!-- footer starts SAMPLE -->
	<footer>
	  <div class="container">
	    <div class="grid">
	      <div class="column-xs-12">
	        <ul class="social">
	          <li><a href="https://twitter.com/kato_katherine" target="_blank" rel="noopener noreferrer"><span class="fab fa-twitter"></span></a></li>
	          <li><a href="https://codepen.io/kathykato" target="_blank" rel="noopener noreferrer"><span class="fab fa-codepen"></span></a></li>
	          <li><a href="https://github.com/kathykato" target="_blank" rel="noopener noreferrer"><span class="fab fa-github"></span></a></li>
	        </ul>
	        <p class="copyright">&copy; Copyright 2018 Katherine Kato</p>
	      </div>
	    </div>
	  </div>
	</footer>
	<!-- footer ends -->
	
	
	
	
	
	
</body>
</html>