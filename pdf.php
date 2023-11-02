<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['id'])) {
}
else{
    // echo "<script>window.location.replace('quickscan.php')</script>";
}


require_once('db.php');

// Include library files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



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
$date            =  date("d-m-Y"); // DD-MM-YYYY format


$business_sector                    = $row['business_sector'];
$sector                             = $row['business_sector'];
$ai_knowledge_board                    = $row['ai_knowledge_board'];
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



$sub_heading = $business_sector;
$main_heading    = 'sector_specific';
$query = "SELECT * FROM textblobs WHERE `main_heading` = ? AND `sub_heading`= ? ";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $main_heading,$sub_heading);
$stmt->execute();
$result = $stmt->get_result();    
$row = $result->fetch_assoc();
$business_sector = $row['text'];


$sub_heading = $ai_knowledge_board;
$main_heading    = 'ai_knowledge_board';
$query = "SELECT * FROM textblobs WHERE `main_heading` = ? AND `sub_heading`= ? ";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $main_heading,$sub_heading);
$stmt->execute();
$result = $stmt->get_result();    
$row = $result->fetch_assoc();
$ai_knowledge_board = $row['text'];


$sub_heading = $organization_knowledge_intensity;
$main_heading  = 'knowledge_intensity';
$query = "SELECT * FROM textblobs WHERE `main_heading` = ? AND `sub_heading`= ? ";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $main_heading,$sub_heading);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$organization_knowledge_intensity = $row['text'];



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
$text = "This quickscan holistic snapshot of your organization's readiness to integrate AI. The quickscan evaluates 7 aspects of your organization and is based on your responses, combined with the expertise of Dynaminds and current sector-specific trends.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.7 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);




$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = 65;
$text = "AI Trends";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/telescope.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Our organization is leveraging AI, enhancing efficiency, innovation, and customer experience. Utilizing machine learning and deep learning, we turn data into actionable insights for informed decision-making. A dedicated AI team crafts custom solutions, ensuring we stay ahead in the digital age.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                 Invest in ongoing AI education to equip your team with the skills needed to maximize AI's potential.";
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "AI Strategy";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/strategy.png',$x-10,$y+0,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Our AI strategy is rooted in innovation, efficiency, and adaptability. We're focused on harnessing machine learning and AI technologies to process data, gain insights, and enhance decision-making. Custom AI solutions are developed to meet specific organizational needs, ensuring scalability and flexibility. We're committed to staying abreast of AI trends, ensuring our strategy evolves with the technology landscape.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                 Prioritize a data-centric culture to bolster AI initiatives.";
insert_MultiCell($pdf, $X = $x, $Y = $y+0.3, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Organization";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/gears.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Our organization is a nexus of innovation, efficiency, and adaptability, seamlessly integrating cutting-edge technologies to drive growth. We prioritize a collaborative, data-driven culture, fostering an environment where creativity and technology converge for optimal solutions. Our strategic initiatives are tailored, scalable, and flexible, ensuring we not only meet but exceed our objectives. Our strategic initiatives are tailored, scalable, and flexible, ensuring we not only meet but exceed our objectives.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                Foster cross-functional collaboration to amplify innovation.";
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "People";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/profile-female.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Our people are our greatest asset, embodying a blend of creativity, expertise, and dedication. We foster an environment that encourages continuous learning and innovation. Each member is empowered with the tools and opportunities to excel, contributing to our collective growth and success. Diversity and inclusion are our strengths, driving a rich exchange of ideas and perspectives. Diversity and inclusion are our strengths, driving a rich exchange of ideas and perspectives.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                                Implement regular skill development programs to enhance team capabilities.";
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Data";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/layers.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Data is the cornerstone of our organization, driving informed decisions and innovative solutions. We harness a wealth of data, transforming it into actionable insights through advanced analytics and AI. Our focus on data integrity, security, and privacy ensures robust, reliable outcomes. Data agility enables us to adapt, offering tailored, efficient solutions to complex challenges. Data agility enables us to adapt, offering tailored, efficient solutions to complex challenges. ";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                               Adopt a comprehensive data governance framework to enhance quality and security within your organization.";
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Controls";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/speedometer.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Controls are integral in our organization, ensuring efficiency, security, and compliance. We implement rigorous protocols, utilizing advanced technologies to monitor, analyze, and optimize operations. Our controls are adaptive, evolving with emerging risks and opportunities, safeguarding assets and data. They are meticulously designed to enhance transparency, accountability, and performance.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                               Regularly update and test control mechanisms to ensure their effectiveness and adaptability.";
insert_MultiCell($pdf, $X = $x, $Y = $y+0.2, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Poppins", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Responsible AI";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/heart.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Poppins", "", "6");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Responsible AI is at the core of our ethos, ensuring that our AI initiatives are ethical, fair, and transparent. We prioritize the development and deployment of AI technologies that respect human rights, privacy, and equality. Our guidelines are stringent, ensuring AI applications are designed and used in ways that are just, unbiased, and accountable. We continuously monitor and refine our AI practices to uphold the highest ethical standards.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Poppins", "B", "6");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Poppins", "", "6");
$text = "                               Embed ethical reviews in AI development processes to ensure fairness and transparency.";
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
$text = "Get grip and direction on your AI transformation journey.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=190 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

$pdf->SetFont("Poppins", "", "5");
$y = $pdf->GetY()+2;
$text = " Explanation of the levels used: Level 1 - Initial: Minimal engagement with AI, characterized by a lack of awareness or understanding. Level 2 - Aware: Basic awareness of AI exists, but no structured initiatives are in place. Level 3 - Operational: AI initiatives are operational with a defined strategy, delivering initial value. Level 4 - Integrated: AI is well-integrated across functions, with growing expertise and value realization. Level 5 - Optimized: AI is optimized, driving innovation, and is a core part of organizational strategy, delivering significant value.";
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

//$mail->addCC('cc@example.com'); 
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
