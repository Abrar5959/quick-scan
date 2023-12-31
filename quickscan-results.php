<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db.php');


// Generate CSRF token
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

function get_blob($conn, $main_heading, $sub_heading)
{
	$query = "SELECT * FROM textblobs WHERE `main_heading` = ? AND `sub_heading`= ? ";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ss", $main_heading, $sub_heading);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	return $row['text'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate-quickscan-submit'])) {
	if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        // Invalid CSRF token, handle accordingly (e.g., show an error message, log the incident)
        die('Invalid CSRF Token');
    } else if (isset($_SESSION['pillarArray'])) {

		// Regenerate CSRF token
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

		$email 					= $_POST["email"];
		$phone 					= isset($_POST['phone']) ? $_POST['phone'] : '';
		$business_sector 		= $_POST["sector"];
		$companyName 			= $_POST["companyName"];
		$ai_knowledge_board 	= $_POST["ai_knowledge_board"];
		$knowledge_intensity 	= $_POST["knowledge_intensity"];
		$contactPermission 		= isset($_POST["contactPermission"]) ? 1 : 0; // Store 1 if checked, 0 if not checked

		//Process and group the objectives into arrays with 1 for selected and 0 for unselected options
		$strategicAdvancement 		= isset($_POST["strategic_advancement"]) ? array_fill_keys($_POST["strategic_advancement"], 1) : [];
		$operationalEfficiency 		= isset($_POST["operational_efficiency"]) ? array_fill_keys($_POST["operational_efficiency"], 1) : [];
		$productServiceInnovation 	= isset($_POST["quality_enhancement"]) ? array_fill_keys($_POST["quality_enhancement"], 1) : [];

		$other = isset($_POST["other"]) ? array_fill_keys($_POST["other"], 1) : [];

		//Create arrays with all options and set unselected options to 0
		$allStrategicAdvancement = [
			"Driving Revenue Growth" => 0,
			"Enhancing Competitive Advantage" => 0,
			"Expanding Market Reach" => 0,
			"Accelerating Time-to-Market" => 0,
			"Improving Decision-Making" => 0,
			"Enhancing Data Analytics and Insights" => 0
		];
		$allOperationalEfficiency = [
			"Increasing Efficiency and Productivity" => 0,
			"Cost Reduction" => 0,
			"Automating Routine Tasks" => 0,
			"Improving Supply Chain Management" => 0,
			"Improving Accuracy and Reducing Errors" => 0
		];
		$allProductServiceInnovation = [
			"Boosting Innovation and Creativity" => 0,
			"Enhancing Product or Service Quality" => 0,
			"Enhancing Customer Experience" => 0
		];
		$allOther = [
			"Enhancing Employee Engagement and Satisfaction" => 0,
			"Compliance and Risk Management" => 0,
			"Enhancing Security and Fraud Detection" => 0,
			"Improving Sustainability and Environmental Impact" => 0
		];

		//Merge user selections with default arrays
		$strategicAdvancement = array_merge($allStrategicAdvancement, $strategicAdvancement);
		$operationalEfficiency = array_merge($allOperationalEfficiency, $operationalEfficiency);
		$productServiceInnovation = array_merge($allProductServiceInnovation, $productServiceInnovation);
		$other = array_merge($allOther, $other);

		//Serialize the arrays to store in the database
		$strategicAdvancementSerialized = serialize($strategicAdvancement);
		$operationalEfficiencySerialized = serialize($operationalEfficiency);
		$productServiceInnovationSerialized = serialize($productServiceInnovation);
		$otherSerialized = serialize($other);

		$sql = "UPDATE surveydata 
			SET email = ?, 
			companyName = ?, 
			ph = ?, 
			business_sector = ?, 
			ai_knowledge_board = ?, 
			organization_knowledge_intensity = ?, 
			strategic_advancement = ?, 
			operational_efficiency = ?, 
			quality_enhancement = ?, 
			contactPermission = ?, 
			other = ?
			WHERE id = ?";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("sssssssssisi", $email, $companyName, $phone, $business_sector, $ai_knowledge_board, $knowledge_intensity, $strategicAdvancementSerialized, $operationalEfficiencySerialized, $productServiceInnovationSerialized, $contactPermission, $otherSerialized, $_SESSION['id']);

		if ($stmt->execute()) {
			unset($_SESSION['pillarArray']);
			$stmt->close();
			// $conn->close();
			// unset($_SESSION['id']);

			// Update was successful.
			echo "<script>window.location.replace('pdf.php')</script>";
			// echo "<script>alert('Your form has been successfully submitted!');</script>";
		} else {
			echo "Error: " . $stmt->error;
			$stmt->close();
			// $conn->close();
		}
	} else {
		echo "<script>window.location.href='index.php';</script>";
	}
}

if (isset($_POST['step1']) or isset($_SESSION['pillarArray'])) {
	if (isset($_SESSION['pillarArray'])) {
	} else {
		$finalArray = array();
		$p1_values 	= array();
		$p2_values 	= array();
		$p3_values 	= array();
		$p4_values 	= array();
		$p5_values 	= array();
		$p6_values 	= array();
		$p7_values 	= array();

		// new code

		$quesVal_mul_weight	= array();
		$weightSum = array();

		// end

		foreach ($_POST as $key => $value) {
			if (strpos($key, 'Pillar1_') === 0) {
				// This input name starts with 'p1_'
				array_push($p1_values, $value);


				$split_weight = explode("_", $key);
				$ques_weight = end($split_weight);

				if (isset($quesVal_mul_weight[0])) {
					$res		=	$ques_weight * $value;
					$p1Weight	=	$quesVal_mul_weight[0] + $res;
					$quesVal_mul_weight[0]	=	$p1Weight;

					$fetchSum = $weightSum[0] + $ques_weight;
					$weightSum[0] = $fetchSum;
				} else {
					$res		=	$ques_weight * $value;
					$quesVal_mul_weight[0]	=	$res;
					$weightSum[0] = $ques_weight;
				}
			} elseif (strpos($key, 'Pillar2_') === 0) {
				// This input name starts with 'p2_'
				array_push($p2_values, $value);

				$split_weight = explode("_", $key);
				$ques_weight = end($split_weight);

				if (isset($quesVal_mul_weight[1])) {
					$res		=	$ques_weight * $value;
					$p2Weight	=	$quesVal_mul_weight[1] + $res;
					$quesVal_mul_weight[1]	=	$p2Weight;

					$fetchSum = $weightSum[1] + $ques_weight;
					$weightSum[1] = $fetchSum;
				} else {
					$res		=	$ques_weight * $value;
					$quesVal_mul_weight[1]	=	$res;
					$weightSum[1] = $ques_weight;
				}
			} elseif (strpos($key, 'Pillar3_') === 0) {
				// This input name starts with 'p3_'
				array_push($p3_values, $value);

				$split_weight = explode("_", $key);
				$ques_weight = end($split_weight);

				if (isset($quesVal_mul_weight[2])) {
					$res		=	$ques_weight * $value;
					$p3Weight	=	$quesVal_mul_weight[2] + $res;
					$quesVal_mul_weight[2]	=	$p3Weight;

					$fetchSum = $weightSum[2] + $ques_weight;
					$weightSum[2] = $fetchSum;
				} else {
					$res		=	$ques_weight * $value;
					$quesVal_mul_weight[2]	=	$res;
					$weightSum[2] = $ques_weight;
				}
			} elseif (strpos($key, 'Pillar4_') === 0) {
				// This input name starts with 'p4_'
				array_push($p4_values, $value);

				$split_weight = explode("_", $key);
				$ques_weight = end($split_weight);

				if (isset($quesVal_mul_weight[3])) {
					$res		=	$ques_weight * $value;
					$p4Weight	=	$quesVal_mul_weight[3] + $res;
					$quesVal_mul_weight[3]	=	$p4Weight;

					$fetchSum = $weightSum[3] + $ques_weight;
					$weightSum[3] = $fetchSum;
				} else {
					$res		=	$ques_weight * $value;
					$quesVal_mul_weight[3]	=	$res;
					$weightSum[3] = $ques_weight;
				}
			} elseif (strpos($key, 'Pillar5_') === 0) {
				// This input name starts with 'p5_'
				array_push($p5_values, $value);
				$split_weight = explode("_", $key);
				$ques_weight = end($split_weight);

				if (isset($quesVal_mul_weight[4])) {
					$res		=	$ques_weight * $value;
					$p5Weight	=	$quesVal_mul_weight[4] + $res;
					$quesVal_mul_weight[4]	=	$p5Weight;

					$fetchSum = $weightSum[4] + $ques_weight;
					$weightSum[4] = $fetchSum;
				} else {
					$res		=	$ques_weight * $value;
					$quesVal_mul_weight[4]	=	$res;
					$weightSum[4] = $ques_weight;
				}
			} elseif (strpos($key, 'Pillar6_') === 0) {
				// This input name starts with 'p6_'

				$split_weight = explode("_", $key);
				$ques_weight = end($split_weight);

				if (isset($quesVal_mul_weight[5])) {
					$res		=	$ques_weight * $value;
					$p6Weight	=	$quesVal_mul_weight[5] + $res;
					$quesVal_mul_weight[5]	=	$p6Weight;

					$fetchSum = $weightSum[5] + $ques_weight;
					$weightSum[5] = $fetchSum;
				} else {
					$res		=	$ques_weight * $value;
					$quesVal_mul_weight[5]	=	$res;
					$weightSum[5] = $ques_weight;
				}
				array_push($p6_values, $value);
			} elseif (strpos($key, 'Pillar7_') === 0) {
				// This input name starts with 'p7_'
				array_push($p7_values, $value);
				$split_weight = explode("_", $key);
				$ques_weight = end($split_weight);

				if (isset($quesVal_mul_weight[6])) {
					$res		=	$ques_weight * $value;
					$p7Weight	=	$quesVal_mul_weight[6] + $res;
					$quesVal_mul_weight[6]	=	$p7Weight;

					$fetchSum = $weightSum[6] + $ques_weight;
					$weightSum[6] = $fetchSum;
				} else {
					$res		=	$ques_weight * $value;
					$quesVal_mul_weight[6]	=	$res;
					$weightSum[6] = $ques_weight;
				}
			}
		}

		$_SESSION['quesVal_mul_weight'] = $quesVal_mul_weight;
		$_SESSION['weightSum'] = $weightSum;
		// echo "<pre>";
		// print_r($quesVal_mul_weight);
		// echo "</pre>";

		// echo "<pre>";
		// print_r($weightSum);
		// echo "</pre>";
		// exit;


		$finalArray = array(
			'Pillar1' => $p1_values,
			'Pillar2' => $p2_values,
			'Pillar3' => $p3_values,
			'Pillar4' => $p4_values,
			'Pillar5' => $p5_values,
			'Pillar6' => $p6_values,
			'Pillar7' => $p7_values
		);
		$serializedFinalArray = serialize($finalArray);

		$sql = "INSERT INTO surveydata (pillars) VALUES (?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s", $serializedFinalArray);
		if ($stmt->execute()) {
			$stmt->close();
			$_SESSION['id']	=	$conn->insert_id;
			$_SESSION['pillarArray'] = $serializedFinalArray;
		} else {
			echo "Error: " . $stmt->error;
		}
		// $conn->close();
	}

	$weighted_sum = array();

	array_push($weighted_sum, $_SESSION['quesVal_mul_weight'][0] / $_SESSION['weightSum'][0]);
	array_push($weighted_sum, $_SESSION['quesVal_mul_weight'][1] / $_SESSION['weightSum'][1]);
	array_push($weighted_sum, $_SESSION['quesVal_mul_weight'][2] / $_SESSION['weightSum'][2]);
	array_push($weighted_sum, $_SESSION['quesVal_mul_weight'][3] / $_SESSION['weightSum'][3]);
	array_push($weighted_sum, $_SESSION['quesVal_mul_weight'][4] / $_SESSION['weightSum'][4]);
	array_push($weighted_sum, $_SESSION['quesVal_mul_weight'][5] / $_SESSION['weightSum'][5]);
	array_push($weighted_sum, $_SESSION['quesVal_mul_weight'][6] / $_SESSION['weightSum'][6]);

	$_SESSION['weighted_sum'] = $weighted_sum;

	// echo "<pre>";
	// print_r($_SESSION['weighted_sum']);
	// echo "</pre>";

	$graph_val_0 = $_SESSION['weighted_sum'][0] * 10;
	$graph_val_1 = $_SESSION['weighted_sum'][1] * 10;
	$graph_val_2 = $_SESSION['weighted_sum'][2] * 10;
	$graph_val_3 = $_SESSION['weighted_sum'][3] * 10;
	$graph_val_4 = $_SESSION['weighted_sum'][4] * 10;
	$graph_val_5 = $_SESSION['weighted_sum'][5] * 10;
	$graph_val_6 = $_SESSION['weighted_sum'][6] * 10;

	$AITrends 		= $graph_val_0;
	$AIStrategy 	= $graph_val_1;
	$Organization 	= $graph_val_2;
	$People	 		= $graph_val_3;
	$Data 			= $graph_val_4;
	$Controls 		= $graph_val_5;
	$ResponsibleAI 	= $graph_val_6;

	$average_of_all = ($graph_val_0 + $graph_val_1 + $graph_val_2 + $graph_val_3 + $graph_val_4 + $graph_val_5 + $graph_val_6) / 7;

	$lowscore_blobs  = array();
	$highscore_blobs = array();

	$sub_heading = $AITrends < 35 ? "lowscore_result" : "highscore_result";
	$AITrends_blob = get_blob($conn, "AITrends", $sub_heading);
	$AITrends < 35 ? array_push($lowscore_blobs, $AITrends_blob) : array_push($highscore_blobs, $AITrends_blob);

	$sub_heading = $AIStrategy < 35 ? "lowscore_result" : "highscore_result";
	$AIStrategy_blob = get_blob($conn, "AI Strategy", $sub_heading);
	$AIStrategy < 35 ? array_push($lowscore_blobs, $AIStrategy_blob) : array_push($highscore_blobs, $AIStrategy_blob);

	$sub_heading = $Organization < 35 ? "lowscore_result" : "highscore_result";
	$Organization_blob = get_blob($conn, "Organization", $sub_heading);
	$Organization < 35 ? array_push($lowscore_blobs, $Organization_blob) : array_push($highscore_blobs, $Organization_blob);

	$sub_heading = $People < 35 ? "lowscore_result" : "highscore_result";
	$People_blob = get_blob($conn, "People", $sub_heading);
	$People < 35 ? array_push($lowscore_blobs, $People_blob) : array_push($highscore_blobs, $People_blob);

	$sub_heading = $Data < 35 ? "lowscore_result" : "highscore_result";
	$Data_blob = get_blob($conn, "Data", $sub_heading);
	$Data < 35 ? array_push($lowscore_blobs, $Data_blob) : array_push($highscore_blobs, $Data_blob);

	$sub_heading = $Controls < 35 ? "lowscore_result" : "highscore_result";
	$Controls_blob = get_blob($conn, "Controls", $sub_heading);
	$Controls < 35 ? array_push($lowscore_blobs, $Controls_blob) : array_push($highscore_blobs, $Controls_blob);

	$sub_heading = $ResponsibleAI < 35 ? "lowscore_result" : "highscore_result";
	$ResponsibleAI_blob = get_blob($conn, "Responsible AI", $sub_heading);
	$ResponsibleAI < 35 ? array_push($lowscore_blobs, $ResponsibleAI_blob) : array_push($highscore_blobs, $ResponsibleAI_blob);
} else {
	echo "<script>window.location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="description" content="Dynaminds | Quickscan Results">
	<!-- Font Imports -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Montserrat:wght@400;700&family=Merriweather&display=swap" rel="stylesheet">
	<!-- Core Style -->
	<link rel="stylesheet" href="style2.css">
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
	<title>Dynaminds | AI Readiness Quickscan Results</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="stretched">
		<canvas class="myChart" style="display: none;width:500px;height:500px"></canvas>
		<!-- Header

		============================================= -->

		<section id="slider2" class="slider-element include-header" style="height: 200px; z-index: 0; position: absolute;">
			<div class="slider-inner" id="vanta-output"></div>
		</section>


		<header id="header" class="transparent-header dark" data-sticky-class="not-dark" data-responsive-class="not-dark" data-sticky-logo-height="80" data-sticky-menu-padding="29">

			<div id="header-wrap">

				<div class="container">

					<div class="header-row justify-content-lg-between">


						<!-- Logo

						============================================= -->

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



						<!-- Primary Navigation

						============================================= -->

						<nav class="primary-menu with-arrows col-lg-5 order-lg-1 px-0">



							<ul class="menu-container one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="160">
							
								<li class="menu-item"><a class="menu-link" href="index.html"><div>Home</div></a></li>

								<li class="menu-item"><a class="menu-link" href="index.html#section-bridging-the-gap"><div>Bridging the gap</div></a></li>

								<li class="menu-item"><a class="menu-link" href="index.html#section-our-approach"><div>Our Approach</div></a></li>

							</ul>



						</nav>



						<nav class="primary-menu col-lg-5 order-lg-3 px-0">



							<ul class="menu-container justify-content-lg-end one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="160">
							
							<li class="menu-item"><a class="menu-link"><div>Services</div></a>

									<ul class="sub-menu-container" data-class="up-lg:not-dark">

										<li class="menu-item"><a class="menu-link" href="state-of-ai-workshop.html"><div>State of AI Workshop</div></a></li>

										<!-- <li class="menu-item"><a class="menu-link" href="#" data-href="#section-stunning-graphics"><div>AI Impact Assessment</div></a></li> -->

										<li class="menu-item"><a class="menu-link" href="ai-advisor-to-the-board.html"><div>AI Advisor to the Board</div></a></li>
										
										<!-- <li class="menu-item"><a class="menu-link" href="#" data-href="#section-secured-solutions"><div>AI Audit Services</div></a></li> -->

									</ul>

								</li>

								<!-- <li class="menu-item"><a class="menu-link" href="blog.html"><div>Our Blog</div></a></li> -->
								
								<li class="menu-item contact-item">
									<div class="desktop-text" style="font-size: 15px; padding-right: 10px; padding-left: 12px;">Let's get in touch: +31 345 79 5005</div>  <!-- Plain text for desktop -->
									<a class="menu-link mobile" href="tel:+31345795005" style="font-size: 15px;"><div>Let's get in touch: +31 345 79 5005</div></a>  <!-- Link for mobile -->
								</li>
								<!--
								<li class="menu-item language-selector" style="white-space: nowrap;">
									<a class="menu-link" href="/index.html" style="display: inline-block; font-weight: bold;">
										<div class="short-lang">EN</div>
										<div class="full-lang">English</div>
									</a>
								</li>
								<span class="language-separator">|</span>
								<li class="menu-item language-selector" style="white-space: nowrap;">	
									<a class="menu-link" href="nl/index.html" style="display: inline-block;">
										<div class="short-lang">NL</div>
										<div class="full-lang">Nederlands</div>
									</a>
								</li>
								-->


							</ul>



						</nav><!-- #primary-menu end -->



					</div>

				</div>

			</div>

			<div class="header-wrap-clone"></div>

		</header><!-- #header end -->
	<!-- Content ============================================= -->
	<form action="" method="post" onsubmit="return validateForm()">
		<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
		<input type="hidden" id="data-input" value="
			<?= $graph_val_0 ?>,
			<?= $graph_val_1; ?>,
			<?= $graph_val_2; ?>,
			<?= $graph_val_3; ?>,
			<?= $graph_val_4; ?>,
			<?= $graph_val_5; ?>,
			<?= $graph_val_6; ?>">
		<!-- <input type="hidden" id="data-input" value="12,49,18,25,33,29,45"> -->
		<section id="content">
			<div class="content-wrap">
				<div class="clear mb-5"></div>
				<div class="clear"></div>
				<div id="section-content" class="page-section pt-5 mb-0">
					<div class="container" style="padding-bottom: 120px;">
						<p>
						<h2 class="text-start text-md-center font-body mb-6">AI Readiness Quickscan Results: Your organization's AI Transformation Readiness</h2>
						</p>
						<div class="row">
							<div class="col-sm-7">
								<?php
								if ($average_of_all < 35) {
									$score_blob = "
										<h4>Low Average Scores overall: This is where you can Improve</h4>
										<p>On average, your scores indicate there is room for improvement. Below, we will provide some areas to focus on.</p>
										";
									echo $score_blob;
									if (!empty($lowscore_blobs)) {
										echo "<p>- {$lowscore_blobs[0]}</p>";
										// echo "<p>- {$lowscore_blobs[1]}</p>";
										echo "<p>";
										echo isset($lowscore_blobs[1])?"- ".$lowscore_blobs[1]:'';
										echo "</p>";
										
									}
									// foreach ($lowscore_blobs as $blob) {
									// 	echo "<p>- {$blob}</p>";
									// }
									if (!empty($highscore_blobs)) {
										echo "<p><strong>Some scores can be considered sufficient in terms of maturity:</strong></p>";
										// foreach ($highscore_blobs as $blob) {
										// 	echo "<p>- {$blob}</p>";
										// }
										echo "<p>- {$highscore_blobs[0]}</p>";
										// echo "<p>- {$highscore_blobs[1]}</p>";
										echo "<p>";
										echo isset($highscore_blobs[1])?"- ".$highscore_blobs[1]:'';
										echo "</p>";
									}
								} else if ($average_of_all > 35) {
									$score_blob = "
										<h4>High Averages overall: Your Organization is ready for AI Transformation</h4>
										<p>On average, your scores can be considered sufficient in terms of maturity. Below, we will provide some highlights and some areas you can consider to improve.</p>
										";
									echo $score_blob;
									if (!empty($highscore_blobs)) {
										echo "<p>- {$highscore_blobs[0]}</p>";
										echo "<p>";
										echo isset($highscore_blobs[1])?"- ".$highscore_blobs[1]:'';
										echo "</p>";
									}
									// foreach ($highscore_blobs as $blob) {
									// 	echo "<p>- {$blob}</p>";
									// }
									if (!empty($lowscore_blobs)) {
										echo "<p><strong>Some segments scored lower, indicating room for improvement:</strong></p>";
										// foreach ($lowscore_blobs as $blob) {
										// 	echo "<p>- {$blob}</p>";
										// }
										echo "<p>- {$lowscore_blobs[0]}</p>";
										echo "<p>";
										echo isset($lowscore_blobs[1])?"- ".$lowscore_blobs[1]:'';
										echo "</p>";
									}
								}

								?>
										<p>
											The above provides an initial grasp of the AI Readiness within your organization. For a free and more detailed AI Readiness Quickscan Report tailored to your organization, please follow the instructions below.
										</p>
							</div>
							<div class="col-sm-5">
								<canvas class="myChart"></canvas>
								<!-- <img src="images/quickscan-chart-demo.png" alt="Polar Chart"> -->
							</div>
						</div>
						<div class="row col-mb-50">
							<div class="col-12">
								<h3>A Complementary AI Readiness Quickscan Report</h3>
								<p>Dynaminds offers a tailored, complementary AI Readiness Quickscan Report when you complete the questions in the section below. This personalized report, delivered as a one-pager PDF, is constructed based on the input provided by you, ensuring a reflective analysis of your responses.</p>
								<p>The report not only encapsulates your input but also integrates sector-specific information, offering a contextual understanding in terms of AI. Furthermore, the report highlights quick wins, actionable insights that can be readily implemented to garner immediate benefits.</p>
								<p>By investing a few minutes in answering the questions, you receive a resource rich with actionable insights tailored to your unique operational context. Take advantage of this opportunity to gain a clearer perspective on your position within your sector and identify quick wins to propel your operations forward.</p>
								<p>
									We're curious if you found the AI Readiness Quickscan Report a useful starting point in your AI transformation journey. We'll provide you an option to let us know if you'd like us to reach out and follow up to discuss your Quickscan after you've received it in your mailbox from us.
								</p>
							</div>
						</div>
						<div class="col-12">
							<div class="card-body">
								<div class="card bg-light p-3">
									<div class="row">
										<div style="padding-top: 10px; padding-bottom: 5px;">
											<strong>Tell us a bit more about your company</strong>
										</div>
										<div class="col-md-6">
											<p>
												<label for="companyName">Company Name:</label><br>
												<input type="text" id="companyName" class="form-control" name="companyName" placeholder="Enter company name" required maxlength="40">
											</p>

										</div>
										<div class="col-md-6">
											<p>
												<label for="sector">Which sector or industry is your business primarily active in?</label>
												<select class="form-select" name="sector" id="sector" style="max-width: 300px;" required>
													<option value="" selected disabled>Pick an option</option>
													<option value="Agriculture and Natural Resources">Agriculture and Natural Resources</option>
													<option value="Automotive and Transportation">Automotive and Transportation</option>
													<option value="Banking, Financial Services, and Insurance">Banking, Financial Services, and Insurance</option>
													<option value="Construction and Real Estate">Construction and Real Estate</option>
													<option value="E-commerce and Online Retail">E-commerce and Online Retail</option>
													<option value="Education and Research">Education and Research</option>
													<option value="Energy, Utilities, and Mining">Energy, Utilities, and Mining</option>
													<option value="Environmental and Sustainability">Environmental and Sustainability</option>
													<option value="Healthcare and Pharmaceuticals">Healthcare and Pharmaceuticals</option>
													<option value="Hospitality and Tourism">Hospitality and Tourism</option>
													<option value="Information Technology and Telecommunications">Information Technology and Telecommunications</option>
													<option value="Logistics and Supply Chain">Logistics and Supply Chain</option>
													<option value="Manufacturing and Engineering">Manufacturing and Engineering</option>
													<option value="Media and Entertainment">Media and Entertainment</option>
													<option value="Retail, Wholesale, and Consumer Goods">Retail, Wholesale, and Consumer Goods</option>
													<option value="Public Sector and Non-Profit">Public Sector and Non-Profit</option>
													<option value="Other">Other</option>
												</select>
											</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<p>
												<label for="email">Email Address to send your Quickscan report to:</label><br>
												<input type="email" class="form-control" id="email" name="email" placeholder="Enter your business email address" required>
											</p>
										</div>
										<div class="col-md-6">
											<p>
												<label for="ai-knowledge-board">How would you rate your board's AI knowledge?</label>
												<select class="form-select" name="ai_knowledge_board" id="ai-knowledge-board" style="max-width: 300px;" required>
													<option value="" selected disabled>Pick an option</option>
													<option value="Very limited knowledge">Very limited knowledge</option>
													<option value="Basic understanding">Basic understanding</option>
													<option value="Moderate understanding">Moderate understanding</option>
													<option value="Advanced understanding">Advanced understanding</option>
													<option value="Expert knowledge">Expert knowledge</option>
												</select>
											</p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<p>
												<label for="phone">Your phone number: (e.g : 0612345678 or +31 6 123 456 78)</label><br>

												<input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone number">
												(optional)<br>
												<input type="checkbox" id="contactPermission" name="contactPermission">
												<label for="contactPermission"><i>Dynaminds may reach out to discuss the results of my Quickscan.</i></label>

											</p>
										</div>
										<div class="col-md-6">
											<p>
												<label for="knowledge_intensity">How would you describe your organization's knowledge intensity?</label>
												<select class="form-select" name="knowledge_intensity" id="knowledge_intensity" style="max-width: 300px;" required>
													<option value="" selected disabled>Pick an option</option>
													<option value="Very Low">Very Low - Primarily manual or task-oriented operations.</option>
													<option value="Low">Low - Limited knowledge work, focused on manual tasks.</option>
													<option value="Moderate">Moderate - Balanced mix of knowledge-intensive and operational tasks.</option>
													<option value="High">High - Substantial knowledge work balanced with other tasks.</option>
													<option value="Very High">Very High - Predominantly knowledge-based with analytical and decision-making tasks.</option>
												</select>
											</p>
										</div>
									</div>
									<div>
										<div style="padding-top: 10px; padding-bottom: 5px;">
											<strong>
												Your AI Objectives and Intent
											</strong>
										</div>
										<label for="ai_goals">What is/are the anticipated goal(s) of AI transformation within your organization? Multiple answers are allowed.</label>
									</div>

									<div class="row">
										<div class="col-md-6 p-3">
											<div style="padding-bottom: 5px;">
												<i class="i-plain icon-et-strategy inline-block" style="color: #999; cursor: default; margin-left: -8px;"></i>
												<i>
													Strategic Advancement
												</i>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="revenue_growth" name="strategic_advancement[]" value="Driving Revenue Growth">
												<label class="form-check-label" for="revenue_growth">Driving Revenue Growth</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="competitive_advantage" name="strategic_advancement[]" value="Enhancing Competitive Advantage">
												<label class="form-check-label" for="competitive_advantage">Enhancing Competitive Advantage</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="market_reach" name="strategic_advancement[]" value="Expanding Market Reach">
												<label class="form-check-label" for="market_reach">Expanding Market Reach</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="time_to_market" name="strategic_advancement[]" value="Accelerating Time-to-Market">
												<label class="form-check-label" for="time_to_market">Accelerating Time-to-Market</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="decision_making" name="strategic_advancement[]" value="Improving Decision-Making">
												<label class="form-check-label" for="decision_making">Improving Decision-Making</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="data_analytics" name="strategic_advancement[]" value="Enhancing Data Analytics and Insights">
												<label class="form-check-label" for="data_analytics">Enhancing Data Analytics and Insights</label>
											</div>
											<div style="padding-top: 10px; padding-bottom: 5px;">
												<i class="i-plain icon-et-lightbulb inline-block" style="color: #999; cursor: default; margin-left: -8px;"></i>
												<i>
													Product/Service Innovation and Quality Enhancement
												</i>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="innovation" name="quality_enhancement[]" value="Boosting Innovation and Creativity">
												<label class="form-check-label" for="innovation">Boosting Innovation and Creativity</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="product_quality" name="quality_enhancement[]" value="Enhancing Product or Service Quality">
												<label class="form-check-label" for="product_quality">Enhancing Product or Service Quality</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="customer_experience" name="quality_enhancement[]" value="Enhancing Customer Experience">
												<label class="form-check-label" for="customer_experience">Enhancing Customer Experience</label>
											</div>
										</div>
										<div class="col-md-6 p-3">
											<div style="padding-top: 10px; padding-bottom: 5px;">
												<i class="i-plain icon-et-gears inline-block" style="color: #999; cursor: default; margin-left: -8px;"></i>
												<i>
													Operational Efficiency
												</i>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="efficiency" name="operational_efficiency[]" value="Increasing Efficiency and Productivity">
												<label class="form-check-label" for="efficiency">Increasing Efficiency and Productivity</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="cost_reduction" name="operational_efficiency[]" value="Cost Reduction">
												<label class="form-check-label" for="cost_reduction">Cost Reduction</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="routine_tasks" name="operational_efficiency[]" value="Automating Routine Tasks">
												<label class="form-check-label" for="routine_tasks">Automating Routine Tasks</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="supply_chain" name="operational_efficiency[]" value="Improving Supply Chain Management">
												<label class="form-check-label" for="supply_chain">Improving Supply Chain Management</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="accuracy" name="operational_efficiency[]" value="Improving Accuracy and Reducing Errors">
												<label class="form-check-label" for="accuracy">Improving Accuracy and Reducing Errors</label>
											</div>
											<div style="padding-top: 10px; padding-bottom: 5px;">
												<i class="i-plain icon-et-puzzle inline-block" style="color: #999; cursor: default; margin-left: -8px;"></i>
												<i>
													Other
												</i>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="employee_engagement" name="other[]" value="Enhancing Employee Engagement and Satisfaction">
												<label class="form-check-label" for="employee_engagement">Enhancing Employee Engagement and Satisfaction</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="compliance" name="other[]" value="Compliance and Risk Management">
												<label class="form-check-label" for="compliance">Compliance and Risk Management</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="security" name="other[]" value="Enhancing Security and Fraud Detection">
												<label class="form-check-label" for="security">Enhancing Security and Fraud Detection</label>
											</div>
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="environmental_impact" name="other[]" value="Improving Sustainability and Environmental Impact">
												<label class="form-check-label" for="environmental_impact">Improving Sustainability and Environmental Impact</label>
											</div>
										</div>
									</div>



								</div>
							</div>


							<div class="row">
								<div class="col-md-7" style="text-align: top;">
									<div style="padding-top: 10px; padding-bottom: 5px;">
										Your data will be stored in our database. By submitting your input, you agree with our <a href="privacy-policy.html">Privacy Policy</a>. We promise not share your information with third parties.
									</div>
								</div>
								<div class="col-md-5" style="text-align: right;">
									<button type="submit" name="generate-quickscan-submit" class="btn btn-secondary btn-lg mt-3">Generate my Quickscan Report ></button>
								</div>

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
	</form>
		<!-- Footer

		============================================= -->

		<footer id="footer" style="background-color: #FFF;">



			<div class="container">




				<!-- Footer Widgets

				============================================= -->

				<div class="footer-widgets-wrap">

					<div class="row">



						<div class="col-lg-4">



							<div class="widget">

								<div class="row">

									<div class="col-lg-8 mb-4" style="color:#888; padding-top: 7px;">

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



						<div class="col-lg-8">

							<div class="row g-5">

								<div class="col-6 col-lg-3">

									<div class="widget widget_links widget-li-noicon app_landing_widget_link">

										<h4>About</h4>

										<ul>

											<li><a href="about.html">Our Mission and Values</a></li>

											<li><a href=mailto:info@dynaminds.ai>Mail us</a></li>
											
											<li><a href="tel:+31345795005">Call us</a></li>
											
											<li style="margin-left: -10px;">
												<a href="https://www.linkedin.com/company/dynaminds-ai" class="social-icon border-transparent si-small me-0 h-bg-linkedin">

												<i class="fa-brands fa-linkedin"></i>

												<i class="fa-brands fa-linkedin"></i>
												
												</a>
												
												&nbsp;
												
												<a href="https://twitter.com/Dynaminds_ai" class="social-icon border-transparent si-small me-0 h-bg-linkedin">

												<i class="fa-brands fa-x-twitter"></i>

												<i class="fa-brands fa-x-twitter"></i>

												</a>
												
												&nbsp;
												
												<a href="https://wa.me/0649767419" class="social-icon border-transparent si-small me-0 h-bg-linkedin">
													<i class="fa-brands fa-square-whatsapp"></i>
													<i class="fa-brands fa-square-whatsapp"></i>
												</a>
											</li>
												
										</ul>

									</div>

								</div>

								<div class="col-6 col-lg-3">

									<div class="widget widget_links widget-li-noicon app_landing_widget_link">

										<h4>Our Solutions</h4>

										<ul>
										
											<li><a href="state-of-ai-workshop.html">State of AI Workshop</a></li>
											
											<li><a href="download/State of AI Workshop - Factsheet (English).pdf">State of AI Workshop: Factsheet</a></li>
											
											<li><a href="ai-advisor-to-the-board.html">AI Advisor to the Board</a></li>

											<li><a href="download/AI Advisor to the Board - Factsheet (English).pdf">AI Advisor to the Board: Factsheet</a></li>

										</ul>
										
									</div>

								</div>

								<div class="col-6 col-lg-3">

									<div class="widget widget_links widget-li-noicon app_landing_widget_link">

										<h4>Deeper Dive</h4>

										<ul>
										
											<li><a href="7-pillars-of-successful-ai-transformation-framework.html">7 Pillars Framework: Explained in Detail</a></li>

											<li><a href="download/7-pillars-framework-one-pager.pdf">7 Pillars Framework: PDF One-pager</a></li>

											<!-- <li><a href="blog.html">Our Blog</a></li> -->

										</ul>
										
									</div>

								</div>

								<div class="col-6 col-lg-3">

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


	<!-- Go To Top
						
					============================================= -->

	<div id="gotoTop" class="uil uil-angle-up"></div>



	<!-- JavaScripts
						
					============================================= -->


	<script src="js/jquery.js"></script>
	<script>
		function saveChartAsImage(imageData) {
			// console.log("checkpoint 2");
			$.ajax({
				type: 'POST',
				url: 'ajax_api.php', // Change this to the path of your PHP script
				data: {
					image: imageData
				},
				success: function(response) {
					// Handle the response from the PHP script
					console.log(response);
				}
			});


			// myChart.render(); // Render the chart
			// console.log("checkpoint 2.1");
			// myChart.toBase64Image('image/png', 1.0, 1000, 1000, function(imageData) {
			// console.log("checkpoint 2.2");
			// // imageData contains the base64 encoded image
			// $.ajax({
			//     type: 'POST',
			//     url: 'ajax_api.php', // Change this to the path of your PHP script
			//     data: { image: imageData },
			//     success: function (response) {
			// 		console.log("checkpoint 2.3");
			//         // Handle the response from the PHP script
			//         console.log(response);
			//     }
			// });
			// });

		}




		const dataInput = document.getElementById('data-input').value;
		const dataValues = dataInput.split(',').map(Number);

		const data = {
			labels: ['AI Trends', 'AI Strategy', 'Organization', 'People', 'Data', 'Controls', 'Responsible AI'],
			datasets: [{
					label: 'Dataset 1',
					data: dataValues.map(value => value > 10 ? 10 : value), // This line computes the value for each segment
					backgroundColor: [
						'rgba(0, 32, 96)',
						'rgba(0, 32, 96)',
						'rgba(0, 32, 96)',
						'rgba(0, 32, 96)',
						'rgba(0, 32, 96)',
						'rgba(0, 32, 96)',
						'rgba(0, 32, 96)'
					]
				},
				{
					label: 'Dataset 2',
					data: dataValues.map(value => (value > 20 ? 20 : value)),

					backgroundColor: [
						'rgba(45, 72, 128)',
						'rgba(45, 72, 128)',
						'rgba(45, 72, 128)',
						'rgba(45, 72, 128)',
						'rgba(45, 72, 128)',
						'rgba(45, 72, 128)',
						'rgba(45, 72, 128)'
					]
				},
				{
					label: 'Dataset 3',
					data: dataValues.map(value => (value > 30 ? 30 : value)),
					backgroundColor: [
						'rgba(91, 111, 160)',
						'rgba(91, 111, 160)',
						'rgba(91, 111, 160)',
						'rgba(91, 111, 160)',
						'rgba(91, 111, 160)',
						'rgba(91, 111, 160)',
						'rgba(91, 111, 160)'
					]
				},
				{
					label: 'Dataset 4',
					data: dataValues.map(value => (value > 40 ? 40 : value)),
					backgroundColor: [
						'rgba(136, 151, 192)',
						'rgba(136, 151, 192)',
						'rgba(136, 151, 192)',
						'rgba(136, 151, 192)',
						'rgba(136, 151, 192)',
						'rgba(136, 151, 192)',
						'rgba(136, 151, 192)',
						'rgba(136, 151, 192)'
					]
				},
				{
					label: 'Dataset 5',
					data: dataValues.map(value => (value >= 40 && value <= 50 ? value : null)),
					backgroundColor: [
						'rgba(182, 191, 209)',
						'rgba(182, 191, 209)',
						'rgba(182, 191, 209)',
						'rgba(182, 191, 209)',
						'rgba(182, 191, 209)',
						'rgba(182, 191, 209)',
						'rgba(182, 191, 209)'
					]
				},
			]
		};

		const config1 = {
			type: 'polarArea',
			data: data,
			options: {
				maintainAspectRatio: false,
		        responsive: false,
				animation: {
					onComplete: function() {
						// imageData = myChart.toBase64Image();
						imageData = myChart1.toBase64Image('image/png', 1);
						
						saveChartAsImage(imageData);
					}
				},
				// responsive: true,
				scales: {
					r: {
						max: 50,
						ticks: {
							display: false,
							stepSize: 10 // This will show grid lines at intervals of 10
						},
						pointLabels: {
							display: true,
							centerPointLabels: true,
							font: {
								family: 'Poppins',  // Set the font family to Poppins
								size: 16
							}
						}
					}
				},
				plugins: {
					legend: {
						display: false,
					},
					tooltip: {  // Note the change here from 'tooltips' to 'tooltip' in Chart.js 3.x
						enabled: false  // Disabling tooltips
					}
				}
			},
		};
		const config2 = {
			type: 'polarArea',
			data: data,
			options: {
				// animation: {
				// 	onComplete: function() {
				// 		// imageData = myChart.toBase64Image();
				// 		imageData = myChart.toBase64Image('image/png', 1);
						
				// 		saveChartAsImage(imageData);
				// 	}
				// },
				responsive: true,
				scales: {
					r: {
						max: 50,
						ticks: {
							display: false,
							stepSize: 10 // This will show grid lines at intervals of 10
						},
						pointLabels: {
							display: true,
							centerPointLabels: true,
							font: {
								family: 'Poppins',  // Set the font family to Poppins
								size: 16
							}
						}
					}
				},
				plugins: {
					legend: {
						display: false,
					},
					tooltip: {  // Note the change here from 'tooltips' to 'tooltip' in Chart.js 3.x
						enabled: false  // Disabling tooltips
					}
				}
			},
		};

		const ctx1 = document.getElementsByClassName('myChart')[0].getContext('2d');
		const ctx2 = document.getElementsByClassName('myChart')[1].getContext('2d');
		const myChart1 = new Chart(ctx1, config1);
		const myChart2 = new Chart(ctx2, config2);
	</script>

	<script src="js/functions.js"></script>

	<script src="js/vanta-config-top.js"></script>
	<script src="js/three.min.js"></script>
	<script src="js/vanta.waves.min.js"></script>
	<script>
		VANTA.WAVES(vantaConfig);
	</script>
	<script>
		function validatePhoneNumber(phoneNumber) {
			if(phoneNumber=='')
			{
				return true;
			}
			// var pattern = /(\([0-9]{3}\)|[0-9]{3})[ -]?[0-9]{3}[ -]?[0-9]{4}/;
			var pattern = /^\+?[0-9 ]{1,20}$/;
			return pattern.test(phoneNumber);
		}
		function validateCompanyName(companyName) {
			// Add your company name validation logic here
			// For example, check if the company name is not empty
			return companyName.trim() !== '';
		}
		function validateForm() {
			var phoneNumber = document.getElementById("phone").value;
			var companyName = document.getElementById("companyName").value;
			if (validatePhoneNumber(phoneNumber) && validateCompanyName(companyName)) {
				return true; // Form will be submitted
			} else {
				if (!validatePhoneNumber(phoneNumber)) {
				alert("Invalid phone number. Phone number must match the pattern.");
			}
			if (!validateCompanyName(companyName)) {
				alert("Invalid company name. Please enter a valid company name.");
			}
				return false; // Form submission will be prevented
			}
		}
	</script>
</body>
</html>