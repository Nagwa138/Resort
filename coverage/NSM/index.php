<?php include 'header.php'; ?>

<body>
<!--CAROUSEL -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="overlay"></div>
		<div class="carousel-item active">
			<img src="images/alex.jpg" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>Comfortable Choice</h5>
			</div>
		</div>
		<div class="carousel-item">
			<img src="images/matroh.jpg" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>Excellant Organization</h5>
			</div>
		</div>
		<div class="carousel-item">
			<img src="images/ismalia.jpg" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
				<h5>Special Offers</h5>
			</div>
		</div>
	</div>
</div>  

<!--WELCOME-->
<div class="welcome align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="welcome-content">
					<h1>Welcome to <span>NSM Tours</span></h1>
					<p>Duis vel nisl lacinia, facilisis in, consectetur leon vestibulum et ullamcorper tortor leon placerat mauris tincidunt ut non velit faucibus nam a pretium sapien nunc quis congue purus nunc feugiat nec purus a ultricies suspendisse in fringilla est sodales dui, non mattis tortor volutpat vitae.</p>
					<a class="btn">View Details</a>
				</div>
			</div>
			<div class="col-md-4">
				<img class="img-responsive" src="images/3.jpg" alt="welcome">
			</div>
		</div>
	</div>
</div> 

<!--DESTINATION-->
<div class="destination">
	<div class="container">
		<h1>Egypt Destination</h1>
		<div class="row">
			<div class="col-md-4">
				<div class="dest">
					<a href="alex.php">
						<h2 class="dest-head">Alex</h2>
						<div class="overlay"></div>
						<figure><img src="images/alex1.jpg"></figure>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dest">
					<a href="">
						<h2 class="dest-head">Marsa Matroh</h2>
						<div class="overlay"></div>
						<figure><img src="images/matroh1.jpg"></figure>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dest">
					<a href="">
						<h2 class="dest-head">Ras El-Bar</h2>
						<div class="overlay"></div>
						<figure><img src="images/rasbar1.png"></figure>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="dest">
					<a href="">
						<h2 class="dest-head">Ismaila</h2>
						<div class="overlay"></div>
						<figure><img src="images/ismaila1.jpg"></figure>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dest">
					<a href="">
						<h2 class="dest-head">Baltem</h2>
						<div class="overlay"></div>
						<figure><img src="images/bltem1.jpg"></figure>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="dest">
					<a href="">
						<h2 class="dest-head">Others</h2>
						<div class="overlay"></div>
						<figure><img src="images/sahel.jpg"></figure>
					</a>
				</div>
			</div>
		</div>
		<a href="" class="btn">View All </a>	

	</div>
</div>

<div class="contact mr-auto">
		<div class="overlay"></div>
		<div class="container">
			<h1>Contact Us</h1>
			<form>
				<div class="row">
					<div class="offset-2 col-3">
						<input type="text" class="form-control" placeholder="Your Name">
					</div>
					<div class="col-3 offset-2">
						<input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Your Email">
					</div>
				</div>
				<div class="form-row">
					<div class="offset-2 col-8">
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Your Message"></textarea>
					</div>
				</div>
				<button type="submit" class="btn">Send Your Message</button>

			</form>
		</div>
</div>

<?php include 'footer.php'; ?>


 