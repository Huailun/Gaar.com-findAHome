<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>DataDesignPhase1</title>
	</head>
	<body>
		<a href="http://distil.flexmls.com/cgi-bin/mainmenu.cgi">Original example863535</a>
		<header><img src="images/gaar.jpg" alt="house" height="200" width="300"/></header>
		<ol>
			<p>A. The persona is potential house buyers & investors</p>
			<p>B. The main goal is to give buyers a thorough information of the house they are interested in & provide payment plans or find a realtor.</p>
			<p>C. Steps to arriving goal-useCase</p>
				<ol>
					<li>Buyers open the gaar.com with their computers or mobile phones.</li>
				  	<li>User inputs his/her ideas to search</li>
				</ol>
		</ol>
		<h2>Entities</h2>
		<h3>...& Attributes of entities</h3>
		<ol>
				<li>propertyHighlights</li>
					<ul>
						<li>physicalAddress</li>
						<li>price</li>
						<li>propertySize & floorPlan</li>
					</ul>
				<li>propertyPaymentTools</li>
					<ul>
						<li>DownPaymentHelp</li>
						<li>mortgageCalculator</li>
					</ul>
				<li>propertyDescription</li>
					<ul>
						<li>propertyFeatures</li>
						<li>neighborhoodOutlines</li>
					</ul>
				<li>propertyBasicInformation</li>
					<ul>
						<li>area</li>
						<li>stories</li>
						<li>county</li>
						<li>yearBuilt</li>
						<li>lotSize</li>
						<li>onMarketDays</li>
						<li>pricePerSquarefeet</li>
					</ul>
				<li>propertyRoomInformation</li>
					<ul>
						<li>mainLivingArea</li>
						<li>masterBedroom</li>
						<li>kitchen</li>
						<li>diningRoom</li>
					</ul>
				<li>propertyRealtorConnection</li>
					<ul>
						<li>contact</li>
						<li>actions</li>
						<li>requestShowing</li>
					</ul>
		</ol>
		<h2>Primary key and foreign keys</h2>
		  <ul>
			  <li>propertyId</li>
		  </ul>


	</body>



</html>