<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db.php');

if (isset($_SESSION['id'])) {
}
else{
    // echo "<script>window.location.replace('quickscan.php')</script>";
}

// print_r($_SESSION['weighted_sum']);

// Include library files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function get_blob($conn,$main_heading,$sub_heading){
	$query = "SELECT * FROM textblobs WHERE `main_heading` = ? AND `sub_heading`= ? ";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ss", $main_heading,$sub_heading);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

	return $row['text'];
}
// Custom function to insert the PDF cells
function insert_cell($pdf, $X = 0, $Y = 0, $CellWidth = 0, $CellHeight = 0, $text = "", $border = 0, $alignment = 'L', $fill = false)
{
    $pdf->SetY($Y);
    $pdf->SetX($X);
    $pdf->Cell($CellWidth, $CellHeight, $text, $border, 0, $alignment, $fill);
}
function insert_MultiCell($pdf, $X = 0, $Y = 0, $width=0 ,$height=0 ,$text='' ,$border=0 ,$alignment='J' ,$fill=false)
{
    $pdf->SetXY($X,$Y);
    $pdf->MultiCell($width, $height, $text, $border,$alignment,$fill);
}


$id = $_SESSION['id'];

$query = "SELECT * FROM surveydata WHERE `id` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();

$id              = $row['id'];
$companyName     = $row['companyName'];
$receiver_mail   = $row['email'];
$date            = date("d-m-Y"); // DD-MM-YYYY format


$business_sector                    = $row['business_sector'];
$sector                             = $row['business_sector'];
$ai_knowledge_board                 = $row['ai_knowledge_board'];
$organization_knowledge_intensity   = $row['organization_knowledge_intensity'];



$strategic_advancement  = unserialize($row['strategic_advancement']);
$operational_efficiency = unserialize($row['operational_efficiency']);
$quality_enhancement    = unserialize($row['quality_enhancement']);
$other                  = unserialize($row['other']);

$choices = [];

// Check if unserialization was successful
if ($strategic_advancement !== false) {
    // Iterate over the unserialized data
    // echo "<pre>";
    // print_r($strategic_advancement);
    // echo "</pre>";
    foreach ($strategic_advancement as $key => $item) {
        if($item ==1)
        {
            array_push($choices,$key);
        }
    }
}
if ($operational_efficiency !== false) {
    foreach ($operational_efficiency as $key => $item) {
        if($item ==1)
        {
            array_push($choices,$key);
        }
    }
}
if ($quality_enhancement !== false) {
    foreach ($quality_enhancement as $key => $item) {
        if($item ==1)
        {
            array_push($choices,$key);
        }
    }
}
if ($other !== false) {
    foreach ($other as $key => $item) {
        if($item ==1)
        {
            array_push($choices,$key);
        }
    }
}
// echo "<pre>";
// print_r($choices);
// echo "</pre>";

$ai_goals_high_rank = 0;
$ai_goals_text = "";
foreach ($choices as $choice) {
    $query = "SELECT * FROM ai_goals WHERE `choice` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $choice);
    $stmt->execute();
    $result = $stmt->get_result();    
    $row = $result->fetch_assoc();

    if($row['rank'] > $ai_goals_high_rank)
    {
        $ai_goals_high_rank = $row['rank'];
        $ai_goals_text = $row['text'];
    }

}

$sub_heading        = $business_sector;
$main_heading       = 'sector_specific';
$business_sector    = get_blob($conn,$main_heading,$sub_heading);

$sub_heading        = $ai_knowledge_board;
$main_heading       = 'ai_knowledge_board';
$ai_knowledge_board = get_blob($conn,$main_heading,$sub_heading);

$sub_heading                        = $organization_knowledge_intensity;
$main_heading                       = 'knowledge_intensity';
$organization_knowledge_intensity   = get_blob($conn,$main_heading,$sub_heading);

// echo "<pre>";
// print_r($_SESSION['weighted_sum']);
// echo "</pre>";


$pillar_blobs       = array();
$suggestion_blobs   = array();

// AI Trends
$sub_heading            = ($_SESSION['weighted_sum'][0]*10)<35 ? "pillar1_lowscore" : "pillar1_highscore";
$pillar_blob_text       = get_blob($conn,"AITrends",$sub_heading);
array_push($pillar_blobs,$pillar_blob_text);
$sub_heading            = ($_SESSION['weighted_sum'][0]*10)<35 ? "lowscore" : "highscore";
$suggestion_blob_text   = get_blob($conn,"AI_trends_suggestion",$sub_heading);
array_push($suggestion_blobs,$suggestion_blob_text);


// AI Strategy
$sub_heading            = ($_SESSION['weighted_sum'][1]*10)<35 ? "pillar2_lowscore" : "pillar2_highscore";
$pillar_blob_text       = get_blob($conn,"AI Strategy",$sub_heading);
array_push($pillar_blobs,$pillar_blob_text);
$sub_heading            = ($_SESSION['weighted_sum'][1]*10)<35 ? "lowscore" : "highscore";
$suggestion_blob_text   = get_blob($conn,"AI_strategy_suggestion",$sub_heading);
array_push($suggestion_blobs,$suggestion_blob_text);


// Organization
$sub_heading            = ($_SESSION['weighted_sum'][2]*10)<35 ? "pillar3_lowscore" : "pillar3_highscore";
$pillar_blob_text       = get_blob($conn,"Organization",$sub_heading);
array_push($pillar_blobs,$pillar_blob_text);
$sub_heading            = ($_SESSION['weighted_sum'][2]*10)<35 ? "lowscore" : "highscore";
$suggestion_blob_text   = get_blob($conn,"Organization_suggestion",$sub_heading);
array_push($suggestion_blobs,$suggestion_blob_text);

// People
$sub_heading            = ($_SESSION['weighted_sum'][3]*10)<35 ? "pillar4_lowscore" : "pillar4_highscore";
$pillar_blob_text       = get_blob($conn,"People",$sub_heading);
array_push($pillar_blobs,$pillar_blob_text);
$sub_heading            = ($_SESSION['weighted_sum'][3]*10)<35 ? "lowscore" : "highscore";
$suggestion_blob_text   = get_blob($conn,"People_suggestion",$sub_heading);
array_push($suggestion_blobs,$suggestion_blob_text);

// Data
$sub_heading            = ($_SESSION['weighted_sum'][4]*10)<35 ? "pillar5_lowscore" : "pillar5_highscore";
$pillar_blob_text       = get_blob($conn,"Data",$sub_heading);
array_push($pillar_blobs,$pillar_blob_text);
$sub_heading            = ($_SESSION['weighted_sum'][4]*10)<35 ? "lowscore" : "highscore";
$suggestion_blob_text   = get_blob($conn,"Data_suggestion",$sub_heading);
array_push($suggestion_blobs,$suggestion_blob_text);

// Controls
$sub_heading            = ($_SESSION['weighted_sum'][5]*10)<35 ? "pillar6_lowscore" : "pillar6_highscore";
$pillar_blob_text       = get_blob($conn,"Controls",$sub_heading);
array_push($pillar_blobs,$pillar_blob_text);
$sub_heading            = ($_SESSION['weighted_sum'][5]*10)<35 ? "lowscore" : "highscore";
$suggestion_blob_text   = get_blob($conn,"Controls_suggestion",$sub_heading);
array_push($suggestion_blobs,$suggestion_blob_text);

// Responsible AI
$sub_heading            = ($_SESSION['weighted_sum'][6]*10)<35 ? "pillar7_lowscore" : "pillar7_highscore";
$pillar_blob_text       = get_blob($conn,"Responsible AI",$sub_heading);
array_push($pillar_blobs,$pillar_blob_text);
$sub_heading            = ($_SESSION['weighted_sum'][6]*10)<35 ? "lowscore" : "highscore";
$suggestion_blob_text   = get_blob($conn,"Responsible_AI_suggestion",$sub_heading);
array_push($suggestion_blobs,$suggestion_blob_text);

// echo "<pre>";
// print_r($pillar_blobs);
// echo "</pre>";

// echo "<pre>";
// print_r($suggestion_blobs);
// echo "</pre>";



require_once('fpdf/fpdf.php');
require_once('fpdf/extension.php');

$pdf = new PDF('P', 'mm', 'A4');

$pdf->AddFont('Poppins', '', 'Poppins-Regular.php');
$pdf->AddFont('Poppins', 'B', 'Poppins-Bold.php');
$pdf->AddFont('Poppins', 'M', 'Poppins-Medium.php');

$pdf->AddPage();
$pdf->SetAutoPageBreak(true,0);
$pdf->SetMargins(0,0,0);

$x = 10;
$y = 10;
$pdf->SetXY($x,$y);
$pdf->SetFont("Poppins", "M", "15");
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth = 0, $CellHeight = 0, $text = "AI Readiness Quickscan", $border = 0, $alignment = 'L', $fill = false);

$pdf->Image('output-graph/chart.png',130,6,60,0);

$pdf->SetFont("Poppins", "", "7");

$x = 10;
$y = 20;
$pdf->SetXY($x,$y);
$text = "Report for: {$companyName}";
$pdf->MultiCell(100,6,$text,0);

$x = 10;
$y = $pdf->GetY();
$text = "Sector: {$sector}";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=100 ,$height=3.5 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

$x = 10;
$y = $pdf->GetY();
$text = "Date generated: {$date}";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=100 ,$height=6 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

$x = 10;
$y = $pdf->GetY();
$text = "This quickscan offers a holistic snapshot of your organization's readiness to integrate AI. The quickscan evaluates 7 aspects of your organization and is based on your responses, combined with the expertise of Dynaminds and your current sector-specific trends.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.7 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);




$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = 65;
$text = "AI Trends";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/aitrends-icon.png',$x-10,$y+2,8,0);
$number = $_SESSION['weighted_sum'][0];
$image_num = is_int($number)? $number : number_format($number, 1);
$pdf->Image("progress_bar_images/{$image_num}.png",$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = $pillar_blobs[0];
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                ".$suggestion_blobs[0];
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "AI Strategy";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/strategy-icon.png',$x-10,$y+0,8,0);
$number = $_SESSION['weighted_sum'][1];
$image_num = is_int($number)? $number : number_format($number, 1);
$pdf->Image("progress_bar_images/{$image_num}.png",$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = $pillar_blobs[1];
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                ".$suggestion_blobs[1];
insert_MultiCell($pdf, $X = $x, $Y = $y+0.3, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Organization";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/organization-icon.png',$x-10,$y+2,8,0);
$number = $_SESSION['weighted_sum'][2];
$image_num = is_int($number)? $number : number_format($number, 1);
$pdf->Image("progress_bar_images/{$image_num}.png",$x,$y+4,50,0);

$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = $pillar_blobs[2];
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                ".$suggestion_blobs[2];
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "People";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/people-icon.png',$x-10,$y+2,8,0);
$number = $_SESSION['weighted_sum'][3];
$image_num = is_int($number)? $number : number_format($number, 1);
$pdf->Image("progress_bar_images/{$image_num}.png",$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = $pillar_blobs[3];
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                ".$suggestion_blobs[3];
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Data";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/data-icon.png',$x-10,$y+2,8,0);
$number = $_SESSION['weighted_sum'][4];
$image_num = is_int($number)? $number : number_format($number, 1);
$pdf->Image("progress_bar_images/{$image_num}.png",$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = $pillar_blobs[4];
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                ".$suggestion_blobs[4];
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Controls";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/controls-icon.png',$x-10,$y+2,8,0);
$number = $_SESSION['weighted_sum'][5];
$image_num = is_int($number)? $number : number_format($number, 1);
$pdf->Image("progress_bar_images/{$image_num}.png",$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = $pillar_blobs[5];
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                ".$suggestion_blobs[5];
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Responsible AI";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/responsibleai-icon.png',$x-10,$y+2,8,0);
$number = $_SESSION['weighted_sum'][6];
$image_num = is_int($number)? $number : number_format($number, 1);
$pdf->Image("progress_bar_images/{$image_num}.png",$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = $pillar_blobs[6];
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                ".$suggestion_blobs[6];
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

$pdf->SetFont("Poppins", "B", "10");
$x = 8;
$y = $pdf->GetY()+4;
$text = "AI Impact on your organization";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$y = $pdf->GetY()+6;
$pdf->SetFont("Poppins", "", "6");
$text = "";
$text  = $ai_goals_text;
$text .= $business_sector;
$text .= $ai_knowledge_board;
$text .= $organization_knowledge_intensity;
$text .= mb_convert_encoding($text, 'ISO-8859-1', 'UTF-8');
// $text .= mb_convert_encoding("Your organization is adeptly navigating the AI landscape, integrating intelligent solutions that enhance efficiency and innovation. AI is a catalyst in our sector, driving personalized customer experiences and streamlined operations. We've adopted AI to analyze complex data, yielding insights for strategic decisions. Office work intensity has escalated due to AI. Automation optimizes tasks, allowing focus on value-added activities and innovation. AI's role is pivotal; we're evolving with this technology, ensuring alignment with trends and ethical standards. We're committed to evolving with AI, ensuring our strategies align with emerging trends, prioritizing ethical and transparent AI applications. The continuous learning and adaptation fostered by AI is nurturing a culture of perpetual improvement within our organization, stimulating a forward-thinking mindset among our teams. By closely monitoring the evolving AI landscape and actively engaging in community dialogues around responsible AI, we are not only staying ahead of technological advancements but also fostering a robust ethical foundation that underscores our AI-driven initiatives.", 'ISO-8859-1', 'UTF-8');
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=190 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
$y = $pdf->GetY()+1;
$text = "The continuous learning and adaptation fostered by AI is nurturing a culture of perpetual improvement within our organization, stimulating a forward-thinking mindset among our teams. By closely monitoring the evolving AI landscape and actively engaging in community dialogues around responsible AI, we are not only staying ahead of technological advancements but also fostering a robust ethical foundation that underscores our AI-driven initiatives.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=190 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

$pdf->SetFont("Poppins", "B", "7");
$y = $pdf->GetY()+2;
$text = "Give direction to your AI transformation journey.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=190 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

$pdf->SetFont("Poppins", "", "5");
$y = $pdf->GetY()+2;
$text = "Explanation of the maturity levels used in the graph above: Level 1 - Initial: Minimal engagement with AI, characterized by a lack of awareness or understanding. Level 2 - Aware: Basic awareness of AI exists, but no structured initiatives are in place. Level 3 - Operational: AI initiatives are operational with a defined strategy, delivering initial value. Level 4 - Integrated: AI is well-integrated across functions, with growing expertise and value realization. Level 5 - Optimized: AI within your organization is optimized, driving innovation, and is a core part of organizational strategy, delivering significant value.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=150 ,$height=2.8 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


$pdf->Image('images/logo.png',168,$y-7,30);
// $y = $pdf->GetY()+2;
$pdf->SetFont("Poppins", "", "6");
$text = " A holistic approach to AI Transformation within your business.
www.dynaminds.ai | info@dynaminds.ai ";
insert_MultiCell($pdf, $X = 160, $Y = $y+7, $width=45 ,$height=2.8 ,$text=$text ,$border=0 ,$alignment='C' ,$fill=false);


$filename = 'outputs/Dynaminds_AI_Quickcan.pdf';
$pdf->Output("F", $filename);



// Create an instance; Pass `true` to enable exceptions 
$mail = new PHPMailer;

// Server settings 
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output
//    $mail->SMTPDebug = 4; 
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication


// ======= C R E D E N T I A L S ======= 
$mail->Username = 'sender@gmail.com';  // SMTP sender's username
$mail->Password = 'password';         // SMTP sender's password

// $receiver_mail = 'sender@gmail.com';   // Receiver's Mail

$mail->setFrom('sender@gmail.com', 'PDF test');
// =====================================



$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
//    $mail->Port = 465;                          // TCP port to connect to

// Sender info 
//    $mail->addReplyTo('reply@example.com', 'SenderName'); 

// Add a recipient 
$mail->addAddress($receiver_mail);

// $mail->addCC('info@dynaminds.ai',"Carbon Copy"); 
//$mail->addBCC('bcc@example.com'); 

// Set email format to HTML 
$mail->isHTML(true);

// Mail subject 
$mail->Subject = 'Test Mail with Attachment';

// Mail body content 
$bodyContent = '<p>Dear Reader,</p><br>';
$bodyContent .= "<p>I hope this message finds you well. Herewith, you’ll receive the AI Quickscan results based on the input you provided us. The Quickscan is a one-pager that outlines key insights and potential opportunities tailored for you.</p>";
$bodyContent .= "<p><strong>Attachment:</strong> Dynaminds_AI_Quickcan.pdf</p>";
$bodyContent .= "<p>This one-pager is designed to give you a concise yet comprehensive view of the current AI landscape as it applies to your specific context.</p>";
$bodyContent .= "<p>We believe that the AI Quickscan will provide you with valuable insights and a clear direction on how to proceed with AI initiatives in your organization. It is formatted for easy sharing, should you wish to discuss the contents with your team.</p>";
$bodyContent .= "<p>Should you have any questions, or if you would like to schedule a follow-up discussion to delve deeper into any aspect of the report, do not hesitate to contact us. If you indicated you would like us to contact you to discuss the results, we will do so in the following 3 workdays. </p>";
$bodyContent .= "<p>We are here to assist you in unlocking the full potential of AI for your business.</p>";
$bodyContent .= "<p>Thank you for engaging with our services. We look forward to supporting you on your AI journey.</p><br>";

$bodyContent .= "<p>Warm regards,</p>";
$bodyContent .= "<p>Rob Braun</p>";
$bodyContent .= "<p>CEO Dynaminds</p>";

$mail->Body    = $bodyContent;


// Add the attachment
$mail->addAttachment($filename);

// Send email 
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    // return false;
} else {
    echo 'Message has been sent.'; 
    // return true;
}
