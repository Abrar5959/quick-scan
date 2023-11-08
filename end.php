<?php
require_once('db.php');
if (!isset($_SESSION['msg-type']) || !isset($_SESSION['msg-text'])) {
    echo '<script>window.location.replace("index.php")</script>';
}
if (isset($_SESSION['pillarArray'])) {
	unset($_SESSION['pillarArray']);
	unset($_SESSION['id']);
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="description" content="Dynaminds | Quickscan">
	<!-- Font Imports -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Montserrat:wght@400;700&family=Merriweather&display=swap" rel="stylesheet">
	<!-- Core Style -->
	<link rel="stylesheet" href="style2.css">
	<style>
		.likert-scale {
			display: flex;
			justify-content: space-between;
		}
		.likert-option {
			flex: 1;
			text-align: center;
		}
		.question-light {
			background-color: #f9f9f9;
			/* Light grey background */
		}
		.question-dark {
			background-color: #e9e9e9;
			/* Darker grey background */
		}
	</style>
	<!-- Font Icons -->
	<link rel="stylesheet" href="css/font-icons.css">
	<link rel="stylesheet" href="one-page/css/et-line.css">
	<!-- Plugins/Components CSS -->
	<link rel="stylesheet" href="css/components/bs-switches.css">
	<!-- Niche Demos -->
	<link rel="stylesheet" href="demos/app-landing/app-landing2.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<!-- Document Title ============================================= -->
	<title>Dynaminds | Quickscan</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="stretched">
	<!-- Header ============================================= -->
	<section id="slider2" class="slider-element include-header" style="height: 200px; z-index: 0; position: absolute;">
		<div class="slider-inner" id="vanta-output"></div>
	</section>
	<header id="header" class="transparent-header dark" data-sticky-class="not-dark" data-responsive-class="not-dark" data-sticky-logo-height="80" data-sticky-menu-padding="29">
		<div id="header-wrap">
			<div class="container">
				<div class="header-row justify-content-lg-between">
					<!-- Logo ============================================= -->
					<div id="logo" class="col-auto order-lg-2 me-lg-0 px-0">
						<a href="index.html">
							<img class="logo-default" srcset="images/logo.png, images/logo@2x.png 2x" src="images/logo@2x.png" alt="Dynaminds Logo">
							<img class="logo-dark" srcset="images/logo-dark.png, images/logo-dark@2x.png 2x" src="images/logo-dark@2x.png" alt="Dynaminds Logo">
						</a>
					</div><!-- #logo end -->
					<div class="primary-menu-trigger">
						<button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
							<span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
						</button>
					</div>
					<!-- Primary Navigation	 ============================================= -->
					<nav class="primary-menu with-arrows col-lg-5 order-lg-1 px-0">
						<ul class="menu-container one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="160">
							<li class="menu-item"><a class="menu-link" href="index.html">
									<div>Home</div>
								</a></li>
							<li class="menu-item"><a class="menu-link" href="index.html#section-bridging-the-gap">
									<div>Bridging the gap</div>
								</a></li>
							<li class="menu-item"><a class="menu-link" href="index.html#section-our-approach">
									<div>Our Approach</div>
								</a></li>
						</ul>
					</nav>
					<nav class="primary-menu col-lg-5 order-lg-3 px-0">
						<ul class="menu-container justify-content-lg-end one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="160">
							<li class="menu-item"><a class="menu-link">
									<div>Services</div>
								</a>
								<ul class="sub-menu-container" data-class="up-lg:not-dark">
									<li class="menu-item"><a class="menu-link" href="state-of-ai-workshop.html">
											<div>State of AI Workshop</div>
										</a></li>
									<li class="menu-item"><a class="menu-link" href="ai-advisor-to-the-board.html">
											<div>AI Advisor to the Board</div>
										</a></li>
								</ul>
							</li>
							<!-- <li class="menu-item"><a class="menu-link" href="blog.html"><div>Our Blog</div></a></li> -->
							<li class="menu-item contact-item">
								<!-- <div class="desktop-text" style="font-size: 15px; padding-right: 10px; padding-left: 12px;">Let's get in touch: +31 649767419</div>  Plain text for desktop -->
								<a class="menu-link mobile" href="tel:+31649767419" style="font-size: 15px;">
									<div>Let's get in touch: +31 649767419</div>
								</a> <!-- Link for mobile -->
							</li>
						</ul>
					</nav><!-- #primary-menu end -->
				</div>
			</div>
		</div>
		<div class="header-wrap-clone"></div>
	</header><!-- #header end -->
	<!-- Content ============================================= -->
	<section id="content">
		<div class="content-wrap">
			<div class="clear"></div>
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="text-center">
                        <div class="alert alert-<?=$_SESSION['msg-type']?>"><?=$_SESSION['msg-text']?></div>
                        <a href="index.php" class="btn btn-secondary btn-lg">Go to Home Page</a>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
			<div class="clear"></div>
		</div>
		<div class="section mt-0 footer-stick" style="padding: 10px 0; background-color: #F7F8FA; border-top: 1px solid #E5E5E5; border-bottom: 1px solid #E5E5E5;">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="app-footer-features"><i class="bi-compass"></i>
							<h5 class="font-body">Holistic <span> business approach.</span></h5>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="app-footer-features"><i class="bi-ui-checks"></i>
							<h5 class="font-body">Continuous grip<span> on AI transformation.</span></h5>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="app-footer-features"><i class="bi-bar-chart-line"></i>
							<h5 class="font-body">Scale<span> AI initiatives responsibly.</span></h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section><!-- #content end -->
	<!-- Footer ============================================= -->
	<footer id="footer" style="background-color: #FFF;">
		<div class="container">
			<!-- Footer Widgets ============================================= -->
			<div class="footer-widgets-wrap">
				<div class="row">
					<div class="col-lg-5">
						<div class="widget">
							<div class="row">
								<div class="col-lg-8 mb-5" style="color:#888; padding-top: 7px;">
									<img src="images/logo-footer.png" alt="Dynaminds Logo" class="d-block mb-4">
									<p>Dynaminds.ai | The Netherlands
										<br>
										Copyright &copy; 2023<br>
										<br>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="row g-5">
							<div class="col-6 col-lg-4">
								<div class="widget widget_links widget-li-noicon app_landing_widget_link">
									<h4>About Dynaminds</h4>
									<ul>
										<li><a href="about.html">Our Mission and Values</a></li>
										<li><a href=mailto:info@dynaminds.ai>Mail us</a></li>
										<li><a href="tel:+31649767419">Call us</a></li>
										<li style="margin-left: -10px;"><a href="https://www.linkedin.com/company/dynaminds-ai" class="social-icon border-transparent si-small me-0 h-bg-linkedin">
												<i class="fa-brands fa-linkedin"></i>
												<i class="fa-brands fa-linkedin"></i>
												<a href="https://twitter.com/Dynaminds_ai" class="social-icon border-transparent si-small me-0 h-bg-linkedin">
													<i class="fa-brands fa-x-twitter"></i>
													<i class="fa-brands fa-x-twitter"></i>
												</a>
									</ul>
								</div>
							</div>
							<div class="col-6 col-lg-4">
								<div class="widget widget_links widget-li-noicon app_landing_widget_link">
									<h4>Deeper Dive</h4>
									<ul>
										<li><a href="state-of-ai-workshop.html">State of AI Workshop</a></li>
										<li><a href="ai-advisor-to-the-board.html">AI Advisor to the Board</a></li>
										<li><a href="7-pillars-of-successful-ai-transformation-framework.html">7 Pillars Framework: Explained in Detail</a></li>
										<li><a href="download/7-pillars-framework-one-pager.pdf">7 Pillars Framework: PDF One-pager</a></li>
										<!-- <li><a href="blog.html">Our Blog</a></li> -->
									</ul>
								</div>
							</div>
							<div class="col-6 col-lg-4">
								<div class="widget widget_links widget-li-noicon app_landing_widget_link">
									<h4>Essentials</h4>
									<ul>
										<li><a href="privacy-policy.html">Privacy Policy</a></li>
										<li><a href="terms-and-conditions.html">Terms & Conditions</a></li>
										<li><a href="disclaimer.html">Disclaimer</a></li>
										<li><a href="non-disclosure.html">Non-Disclosure</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #footer end -->
	<!-- Go To Top ============================================= -->
	<div id="gotoTop" class="uil uil-angle-up"></div>
	<!-- JavaScripts ============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/functions.js"></script>
	<script src="js/vanta-config-top.js"></script>
	<script src="js/three.min.js"></script>
	<script src="js/vanta.waves.min.js"></script>
	<script>
		VANTA.WAVES(vantaConfig);
	</script>
</body>
</html>
<?php
unset($_SESSION['msg-type']);
unset($_SESSION['msg-text']);
?>