
<!------------- contact us ---------------->
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


 <!---------------- Recent Blog ------------------->
<div class="recent text-center">
	<div class="container">
		<h1>Recent Blog post</h1>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil sed laudantium quaerat
		dolore magnam ad veritatis ipsa laboriosam voluptatem. Nesciunt sed blanditiis voluptas 
		sapiente! Sapiente enim nobis ab eaque placeat?</p>
		<div class="row">
			<div class="col mb-4">
				<div class="card">
					<img src="{{ asset('images/dest.jpg') }}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Blog 1</h5>
						<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					</div>
				</div>
			</div>
			<div class="col mb-4">
				<div class="card">
					<img src="{{ asset('images/dest.jpg') }}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Blog 2</h5>
						<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					</div>
				</div>
			</div>
			<div class="col mb-4">
				<div class="card">
					<img src="{{ asset('images/dest.jpg') }}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Blog 3</h5>
						<p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--------------Footer -------------------->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="about-foot">
					<h3>About</h3>
					<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi
						ullam mollitia obcaecati magnam amet, officia, error aperiam voluptates
						dignissimos quidem itaque hic. 
					</p>
					<a class="btn">Read More</a>
				</div>
			</div>
			<div class="col-md-3">
				<div class="quick-foot">
					<h3>Quick menu</h3>
					<ul class="list-unstyled">
						<li><a href="">Home</a></li>
						<li><a href="">About</a></li>
						<li><a href="">page</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="quick-foot">
					<h3>Destination</h3>
					<ul class="list-unstyled">
						<li><a href="">Alex</a></li>
						<li><a href="">Ras El-Bar</a></li>
						<li><a href="">Matroh</a></li>
						<li><a href="">Ismaila</a></li>
					</ul>
				</div>	
			</div>
			<div class="col-md-3">
				<div class="social-foot">
					<h3>Social Media</h3>
					<ul class="list-unstyled">
						<li><a href=""><i class="fab fa-facebook fa-2x"></i></a></li>
						<li><a href=""><i class="fab fa-twitter-square fa-2x"></i></a></li>
						<li><a href=""><i class="fab fa-instagram-square fa-2x"></i></a></li>
						<li><a href=""><i class="fab fa-youtube-square fa-2x"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="subcribe">
			<h3>Stay up To Date</h3>
			<input class="" type="email" placeholder="Enter Your Email">
			<button class="btn">Subscribe</button>
		</div>
	</div>
</div>

<div class="copyright text-center">
	<p>Copyright All Rights Reserved © 2020</p>
</div>

{{-- Scripts --}}


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/backend.js')}}"></script>

</body>
</html>
