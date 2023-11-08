<?php
require_once('db.php');
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
			<div class="clear mb-5"></div>
			<div class="clear"></div>
			<div id="section-content" class="page-section pt-5 mb-0">
				<div class="container" style="padding-bottom: 120px;">
					<p>
					<h2 class="text-start text-md-center font-body mb-6">Quickscan: Check your organization's AI Transformation Readiness</h2>
					</p>
					<div class="row">
						<div class="col-9">
							<p>
								Embark on a successful AI transformation journey with our Quicksan. Grounded in the 7 Pillars of Successful AI Transformation framework, filling out the survey below will offer a tailored quickscan of your organization’s AI readiness. Obtain a high-level, yet comprehensive overview of the AI transformation readiness of your organization, within a few minutes by providing an answer to 30 statements.
							</p>
							<p>
								Additionally, you will be presented the option for a free Quickscan Report: a one-pager provided in PDF, tailored to your organization and its sector. It offers a set of quick wins suitable for your organization. See the example one-pager to the right what to expect.
							</p>
							<p>
								The online Quickscan is anonymous and directly viewable in your browser. The more extensive customized Quickscan Report will be sent to your mail address.
						</div>
						<div class="col-3">
							<img src="images/quickscan-report-demo.png" alt="Dynaminds Quickscan Report" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
						</div>
					</div>
					<div class="row col-mb-50">
						<div class="col-12">
							<form id="surveyForm" action="quickscan-results.php" method="post">
								<div id="questions">
									<div class="container">
										<p>
										<h3>30 Statements on AI Readiness</h3>
										Indicate for each statement whether you (strongly) disagree, or (strongly) agree. All questions need to be filled out for the Quickscan to be generated. The statements are split up into 7 segments, offering a holistic overview of the state of your AI readiness.
										</p>
										<!-- Pillar 1: AI Trends -->
										<p>
										<div class="pillar" data-pillar="Pillar1">
											<div class="row">
												<div class="col-6 text-left">
													<h3>AI Trends</h3>
												</div>
												<div class="col-6">
													<div class="row text-center">
														<div class="col">Strongly Disagree</div>
														<div class="col"></div>
														<div class="col">Neutral</div>
														<div class="col"></div>
														<div class="col">Strongly Agree</div>
													</div>
												</div>
											</div>
											<?php
											// Query the database to fetch questions for Pillar1
											$sql = "SELECT * FROM questions WHERE pillar_id = 1";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
												$counter = 0;
												// Loop through the results and generate HTML for each question
												while ($row = $result->fetch_assoc()) {
													$counter = $counter + 1;
													$questionId = $row['id'];
													$questionText = $row['question'];
													$questionWeight = $row['weight'];

													// Determine the class for the question based on its order
													$questionClass = $counter % 2 === 0 ? 'question-light' : 'question-dark';

													// Generate HTML for the question using the fetched data
													echo '
														<div class="row align-items-center question ' . $questionClass . '" data-question="q' . $questionId . '">
															<div class="col-6">
																<label>' . $questionText . '</label>
															</div>
															<div class="col-6">
																<div class="row">
																	<div class="col text-center"><input checked type="radio" id="Pillar1_q' . $questionId . '" name="Pillar1_q' . $questionId . '_' . $questionWeight . '" 	value="1" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar1_q' . $questionId . '" name="Pillar1_q' . $questionId . '_' . $questionWeight . '"  value="2" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar1_q' . $questionId . '" name="Pillar1_q' . $questionId . '_' . $questionWeight . '"  value="3" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar1_q' . $questionId . '" name="Pillar1_q' . $questionId . '_' . $questionWeight . '"  value="4" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar1_q' . $questionId . '" name="Pillar1_q' . $questionId . '_' . $questionWeight . '"  value="5" required></div>
																</div>
															</div>
														</div>
														';
												}
											} else {
												echo "<h3 class='text-center'>No questions found for Pillar1</h3>";
											}
											?>

										</div>
										</p>
										<p>
											<!-- Pillar 2: AI Strategy -->
										<div class="pillar" data-pillar="Pillar2">
											<div class="row">
												<div class="col-6 text-left">
													<h3>AI Strategy</h3>
												</div>
												<div class="col-6">
													<div class="row text-center">
														<div class="col">Strongly Disagree</div>
														<div class="col"></div>
														<div class="col"><br>Neutral</div>
														<div class="col"></div>
														<div class="col">Strongly Agree</div>
													</div>
												</div>
											</div>
											<?php
											// Query the database to fetch questions for Pillar2
											$sql = "SELECT * FROM questions WHERE pillar_id = 2";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
												$counter = 0;
												// Loop through the results and generate HTML for each question
												while ($row = $result->fetch_assoc()) {
													$counter = $counter + 1;
													$questionId = $row['id'];
													$questionText = $row['question'];

													// Determine the class for the question based on its order
													$questionClass = $counter % 2 === 0 ? 'question-light' : 'question-dark';

													// Generate HTML for the question using the fetched data
													echo '
														<div class="row align-items-center question ' . $questionClass . '" data-question="q' . $questionId . '">
															<div class="col-6">
																<label>' . $questionText . '</label>
															</div>
															<div class="col-6">
																<div class="row">
																	<div class="col text-center"><input checked type="radio" id="Pillar2_q' . $questionId . '" name="Pillar2_q' . $questionId . '_' . $questionWeight . '" 	value="1" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar2_q' . $questionId . '" name="Pillar2_q' . $questionId . '_' . $questionWeight . '"  value="2" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar2_q' . $questionId . '" name="Pillar2_q' . $questionId . '_' . $questionWeight . '"  value="3" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar2_q' . $questionId . '" name="Pillar2_q' . $questionId . '_' . $questionWeight . '"  value="4" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar2_q' . $questionId . '" name="Pillar2_q' . $questionId . '_' . $questionWeight . '"  value="5" required></div>
																</div>
															</div>
														</div>
														';
												}
											} else {
												echo "<h3 class='text-center'>No questions found for Pillar2</h3>";
											}
											?>

										</div>
										</p>
										<p>
											<!-- Pillar 3: Organization -->
										<div class="pillar" data-pillar="Pillar3">
											<div class="row">
												<div class="col-6 text-left">
													<h3>Organization</h3>
												</div>
												<div class="col-6">
													<div class="row text-center">
														<div class="col">Strongly Disagree</div>
														<div class="col"></div>
														<div class="col"><br>Neutral</div>
														<div class="col"></div>
														<div class="col">Strongly Agree</div>
													</div>
												</div>
											</div>
											<?php
											// Query the database to fetch questions for Pillar3
											$sql = "SELECT * FROM questions WHERE pillar_id = 3";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
												$counter = 0;
												// Loop through the results and generate HTML for each question
												while ($row = $result->fetch_assoc()) {
													$counter = $counter + 1;
													$questionId = $row['id'];
													$questionText = $row['question'];

													// Determine the class for the question based on its order
													$questionClass = $counter % 2 === 0 ? 'question-light' : 'question-dark';

													// Generate HTML for the question using the fetched data
													echo '
														<div class="row align-items-center question ' . $questionClass . '" data-question="q' . $questionId . '">
															<div class="col-6">
																<label>' . $questionText . '</label>
															</div>
															<div class="col-6">
																<div class="row">
																	<div class="col text-center"><input checked type="radio" id="Pillar3_q' . $questionId . '" name="Pillar3_q' . $questionId . '_' . $questionWeight . '" 	value="1" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar3_q' . $questionId . '" name="Pillar3_q' . $questionId . '_' . $questionWeight . '"  value="2" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar3_q' . $questionId . '" name="Pillar3_q' . $questionId . '_' . $questionWeight . '"  value="3" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar3_q' . $questionId . '" name="Pillar3_q' . $questionId . '_' . $questionWeight . '"  value="4" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar3_q' . $questionId . '" name="Pillar3_q' . $questionId . '_' . $questionWeight . '"  value="5" required></div>
																</div>
															</div>
														</div>
														';
												}
											} else {
												echo "<h3 class='text-center'>No questions found for Pillar3</h3>";
											}
											?>

										</div>
										</p>
										<p>
											<!-- Pillar 4: People -->
										<div class="pillar" data-pillar="Pillar4">
											<div class="row">
												<div class="col-6 text-left">
													<h3>People</h3>
												</div>
												<div class="col-6">
													<div class="row text-center">
														<div class="col">Strongly Disagree</div>
														<div class="col"></div>
														<div class="col"><br>Neutral</div>
														<div class="col"></div>
														<div class="col">Strongly Agree</div>
													</div>
												</div>
											</div>
											<?php
											// Query the database to fetch questions for Pillar4
											$sql = "SELECT * FROM questions WHERE pillar_id = 4";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
												$counter = 0;
												// Loop through the results and generate HTML for each question
												while ($row = $result->fetch_assoc()) {
													$counter = $counter + 1;
													$questionId = $row['id'];
													$questionText = $row['question'];

													// Determine the class for the question based on its order
													$questionClass = $counter % 2 === 0 ? 'question-light' : 'question-dark';

													// Generate HTML for the question using the fetched data
													echo '
														<div class="row align-items-center question ' . $questionClass . '" data-question="q' . $questionId . '">
															<div class="col-6">
																<label>' . $questionText . '</label>
															</div>
															<div class="col-6">
																<div class="row">
																	<div class="col text-center"><input checked type="radio" id="Pillar4_q' . $questionId . '" name="Pillar4_q' . $questionId . '_' . $questionWeight . '" 	value="1" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar4_q' . $questionId . '" name="Pillar4_q' . $questionId . '_' . $questionWeight . '"  value="2" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar4_q' . $questionId . '" name="Pillar4_q' . $questionId . '_' . $questionWeight . '"  value="3" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar4_q' . $questionId . '" name="Pillar4_q' . $questionId . '_' . $questionWeight . '"  value="4" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar4_q' . $questionId . '" name="Pillar4_q' . $questionId . '_' . $questionWeight . '"  value="5" required></div>
																</div>
															</div>
														</div>
														';
												}
											} else {
												echo "<h3 class='text-center'>No questions found for Pillar4</h3>";
											}
											?>

										</div>
										</p>
										<p>
											<!-- Pillar 5: Data -->
										<div class="pillar" data-pillar="Pillar5">
											<div class="row">
												<div class="col-6 text-left">
													<h3>Data</h3>
												</div>
												<div class="col-6">
													<div class="row text-center">
														<div class="col">Strongly Disagree</div>
														<div class="col"></div>
														<div class="col"><br>Neutral</div>
														<div class="col"></div>
														<div class="col">Strongly Agree</div>
													</div>
												</div>
											</div>
											<?php
											// Query the database to fetch questions for Pillar5
											$sql = "SELECT * FROM questions WHERE pillar_id = 5";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
												$counter = 0;
												// Loop through the results and generate HTML for each question
												while ($row = $result->fetch_assoc()) {
													$counter = $counter + 1;
													$questionId = $row['id'];
													$questionText = $row['question'];

													// Determine the class for the question based on its order
													$questionClass = $counter % 2 === 0 ? 'question-light' : 'question-dark';

													// Generate HTML for the question using the fetched data
													echo '
														<div class="row align-items-center question ' . $questionClass . '" data-question="q' . $questionId . '">
															<div class="col-6">
																<label>' . $questionText . '</label>
															</div>
															<div class="col-6">
																<div class="row">
																	<div class="col text-center"><input checked type="radio" id="Pillar5_q' . $questionId . '" name="Pillar5_q' . $questionId . '_' . $questionWeight . '" 	value="1" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar5_q' . $questionId . '" name="Pillar5_q' . $questionId . '_' . $questionWeight . '"  value="2" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar5_q' . $questionId . '" name="Pillar5_q' . $questionId . '_' . $questionWeight . '"  value="3" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar5_q' . $questionId . '" name="Pillar5_q' . $questionId . '_' . $questionWeight . '"  value="4" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar5_q' . $questionId . '" name="Pillar5_q' . $questionId . '_' . $questionWeight . '"  value="5" required></div>
																</div>
															</div>
														</div>
														';
												}
											} else {
												echo "<h3 class='text-center'>No questions found for Pillar5</h3>";
											}
											?>

										</div>
										</p>
										<p>
											<!-- Pillar 6: Controls -->
										<div class="pillar" data-pillar="Pillar6">
											<div class="row">
												<div class="col-6 text-left">
													<h3>Controls</h3>
												</div>
												<div class="col-6">
													<div class="row text-center">
														<div class="col">Strongly Disagree</div>
														<div class="col"></div>
														<div class="col"><br>Neutral</div>
														<div class="col"></div>
														<div class="col">Strongly Agree</div>
													</div>
												</div>
											</div>
											<?php
											// Query the database to fetch questions for Pillar6
											$sql = "SELECT * FROM questions WHERE pillar_id = 6";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
												$counter = 0;
												// Loop through the results and generate HTML for each question
												while ($row = $result->fetch_assoc()) {
													$counter = $counter + 1;
													$questionId = $row['id'];
													$questionText = $row['question'];

													// Determine the class for the question based on its order
													$questionClass = $counter % 2 === 0 ? 'question-light' : 'question-dark';

													// Generate HTML for the question using the fetched data
													echo '
														<div class="row align-items-center question ' . $questionClass . '" data-question="q' . $questionId . '">
															<div class="col-6">
																<label>' . $questionText . '</label>
															</div>
															<div class="col-6">
																<div class="row">
																	<div class="col text-center"><input checked type="radio" id="Pillar6_q' . $questionId . '" name="Pillar6_q' . $questionId . '_' . $questionWeight . '" 	value="1" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar6_q' . $questionId . '" name="Pillar6_q' . $questionId . '_' . $questionWeight . '"  value="2" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar6_q' . $questionId . '" name="Pillar6_q' . $questionId . '_' . $questionWeight . '"  value="3" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar6_q' . $questionId . '" name="Pillar6_q' . $questionId . '_' . $questionWeight . '"  value="4" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar6_q' . $questionId . '" name="Pillar6_q' . $questionId . '_' . $questionWeight . '"  value="5" required></div>
																</div>
															</div>
														</div>
														';
												}
											} else {
												echo "<h3 class='text-center'>No questions found for Pillar6</h3>";
											}
											?>

										</div>
										</p>
										<p>
											<!-- Pillar 7: Responsible AI -->
										<div class="pillar" data-pillar="Pillar7">
											<div class="row">
												<div class="col-6 text-left">
													<h3>Responsible AI</h3>
												</div>
												<div class="col-6">
													<div class="row text-center">
														<div class="col">Strongly Disagree</div>
														<div class="col"></div>
														<div class="col"><br>Neutral</div>
														<div class="col"></div>
														<div class="col">Strongly Agree</div>
													</div>
												</div>
											</div>
											<?php
											// Query the database to fetch questions for Pillar7
											$sql = "SELECT * FROM questions WHERE pillar_id = 7";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
												$counter = 0;
												// Loop through the results and generate HTML for each question
												while ($row = $result->fetch_assoc()) {
													$counter = $counter + 1;
													$questionId = $row['id'];
													$questionText = $row['question'];

													// Determine the class for the question based on its order
													$questionClass = $counter % 2 === 0 ? 'question-light' : 'question-dark';

													// Generate HTML for the question using the fetched data
													echo '
														<div class="row align-items-center question ' . $questionClass . '" data-question="q' . $questionId . '">
															<div class="col-6">
																<label>' . $questionText . '</label>
															</div>
															<div class="col-6">
																<div class="row">
																	<div class="col text-center"><input checked type="radio" id="Pillar7_q' . $questionId . '" name="Pillar7_q' . $questionId . '_' . $questionWeight . '" 	value="1" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar7_q' . $questionId . '" name="Pillar7_q' . $questionId . '_' . $questionWeight . '"  value="2" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar7_q' . $questionId . '" name="Pillar7_q' . $questionId . '_' . $questionWeight . '"  value="3" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar7_q' . $questionId . '" name="Pillar7_q' . $questionId . '_' . $questionWeight . '"  value="4" required></div>
																	<div class="col text-center"><input type="radio" id="Pillar7_q' . $questionId . '" name="Pillar7_q' . $questionId . '_' . $questionWeight . '"  value="5" required></div>
																</div>
															</div>
														</div>
														';
												}
											} else {
												echo "<h3 class='text-center'>No questions found for Pillar7</h3>";
											}
											?>

										</div>
									</div>
								</div>
								<div class="row" style="padding-top: 20px;">
									<div class="col-md-9">
										<p>
											<i>
												Please note that by hitting the "Show the results" button to the right, your input will be stored in our database.
											</i>
										</p>
									</div>
									<div class="col-md-3" style="text-align: right;">
										<button type="submit" class="btn btn-secondary btn-lg" name="step1" id="showGraphButton">Show the results</button>
									</div>
								</div>
							</form> <!-- Closing form tag -->
						</div>
					</div>
				</div>
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