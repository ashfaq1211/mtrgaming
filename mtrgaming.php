<?php
    session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<title>MTR Gaming</title>
	<meta name="description" content="AOS - Animate On Scroll library using CSS3">
	<meta name="keywords" content="AOS, animate on scroll, css3 scroll animations, simple scroll animations">
	<meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
	<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
	<!-- <link rel="stylesheet" href="http://localhost:3002/dist/aos.css" /> -->
	<link rel="stylesheet" href="dist/css/styles.css">
    <link rel="stylesheet" type="text/css" href="dist/css/text.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body data-aos-easing="ease-out-back" data-aos-duration="1000" data-aos-delay="0">

	<div class="backgrounds overlay">
		<div class="background aos-init aos-animate" data-aos="fade-in" data-aos-duration="1500" data-aos-anchor=".section--hero" style="background-image: url('images/bg1.jpg');"></div>
	</div>

	<header class="hero">
		<div class="hero-center">
			<h1 class="hero__logo aos-init aos-animate" data-aos="zoom-in" style="color: white;">MON THEKE RADIANTS</h1>
		</div>
		<span class="hero__scroll aos-init aos-animate" data-aos="fade-up" data-aos-easing="ease" data-aos-delay="800">
			Scroll down <br>
			<i class="chevron bottom"></i>
		</span>
		<a href="https://www.facebook.com/mTregaming" target="_blank" class="octocat aos-init aos-animate" data-aos="zoom-out" data-aos-delay="1500" style="position: fixed;">
			<img src="images/logo.png" alt="" >
		</a>
        <audio class="audio" src="audio/valorant.mp3" controls="" style = "position: fixed; left: 0.5%; top: 1.5%; width: 8%; opacity: 0.2;"></audio>
	</header>

    <!-- START OF PLAYER CARDS -->

    <div class="container">

        <?php
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,"mtr");
            $query = "SELECT * FROM users";
            $result = mysqli_query($connection,$query);
            $dataAOS = array("fade-up","fade-down","fade-right","fade-left","fade-up-right","fade-up-left","fade-down-right","fade-down-left","flip-left","flip-up","flip-down","zoom-in","zoom-in-up","zoom-in-down","zoom-in-left","zoom-in-right","zoom-out","zoom-out-up","zoom-out-down","zoom-out-right","zoom-out-left");
            // "flip-right",
            shuffle($dataAOS);
            $iter = 0;
            $leftRight = "right";
            // INSERT INTO `users`(`playernumber`, `ign`, 'username', `designation`, `description`, `agent`) VALUES ('','','','','','')
            // use the above sql query to add new players
            // use capitalized agent names, like "Killjoy"

            // PLAYER CARDS THAT ARE BEING PLACED DYNAMICALLY WITH RANDOMIZED AOS STYLES

            while($row = mysqli_fetch_array($result)){

                if ($iter % 2 == 0) {
                    $leftRight  = "code--right";
                } else {
                    $leftRight = "code--left";
                }

                $iter = $iter + 1;

                if ($leftRight == "code--right") {
                    $style = "width: 100%";
                } else {
                    $style = "width: 100%; margin-left: 64.5%";
                }

                $imgRef = "images/agents/".$row['agent'].".jpg";
                $dImg = "images/players/".$row['uid'].".jpeg";

                ?>

                <div class="<?php echo("$leftRight") ?> aos-init aos-animate" data-aos="<?php echo("$dataAOS[$iter]") ?>" data-aos-anchor-placement="bottom-bottom" data-aos-duration="2000" style="<?php echo("$style") ?>">
          
                    <!-- Team member -->
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" >
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card" style="background-color: #ffffff05;">
                                        <div class="card-body text-center">
                                        	<br>
                                            <p><img class=" img-fluid" src="<?php echo("$dImg") ;?>" alt="card image"></p>
                                            <h4 class="card-title"><?php echo $row['username'];?></h4>
                                            <h6 class="card-title"><?php echo $row['ign'];?></h6>
                                            <p class="card-text"><?php echo $row['designation'];?></p>
                                            <p class="card-text"><?php echo $row['agent'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card" style="background-image: url('<?php echo("$imgRef") ?>'); background-color: #ffffff00 !important; background-size: 348px 310px; opacity: 0.6;">
                                        <div class="card-body text-center mt-4">
                                            <h4 class="card-title">Bio</h4>
                                            <p class="card-text"><?php echo $row['description'];?></p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank" href="<?php echo $row['fb_link'];?>">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

    </div>

	<!-- END OF PLAYERS SECTION -->

	<section class="section section--more" style="margin-top: 20%">

		<div class="container">

			<div class="section-group">
				<h3>Contact us or become a part of MTR</h3>

				<a href="https://github.com/michalsnik/aos/archive/master.zip" class="btn"><span>Facebook</span></a>
                <a href="https://github.com/michalsnik/aos/archive/master.zip" class="btn"><span></span></a>
				
			</div>

            <div class="section-group">

                <p>© 2021 <a href="https://www.linkedin.com/in/ashfaq136/">Ashfaqul Islam</a>, <a href="https://www.facebook.com/webstruct.co">Webstruct</a></p>
                
            </div>

		</div>

	</section>

    <!-- FOOTER -->

	<footer class="footer">
		<div class="container">

		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<!-- <script src="http://localhost:3002/dist/aos.js"></script> -->

	<script>
		AOS.init({
			easing: 'ease-out-back',
			duration: 1000
		});
	</script>

	<script>
		hljs.initHighlightingOnLoad();

		$('.hero__scroll').on('click', function(e) {
			$('html, body').animate({
				scrollTop: $(window).height()
			}, 1200);
		});
	</script>

</body>
</html>