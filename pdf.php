<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['id'])) {
    echo "<script>window.location.replace(quickscan.php)</script>";
}
require_once('db.php');


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


require_once('fpdf/fpdf.php');
require_once('fpdf/extension.php');

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,0);
$pdf->SetMargins(0,0,0);

$x = 7;
$y = 10;
$pdf->SetXY($x,$y);
$pdf->SetFont("Arial", "", "15");
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth = 0, $CellHeight = 0, $text = "AI Readiness Quickscan", $border = 0, $alignment = 'L', $fill = false);

$pdf->Image('images/onepager-polarchart.png',130,10,70,0);

$pdf->SetFont("Arial", "", "8");

// $x = 10;
// $y = 20;
// $pdf->SetXY($x,$y);
// $text = "Report for: [company name]";
// $pdf->MultiCell(100,6,$text,1);

$x = 10;
$y = 20;
$text = "Report for: [company name]";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=100 ,$height=6 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

$x = 10;
$y = $pdf->GetY();
$text = "Sector: [sector]";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=100 ,$height=6 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

$x = 10;
$y = $pdf->GetY();
$text = "Date generated: [date]";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=100 ,$height=6 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

$x = 10;
$y = $pdf->GetY()+2;
$text = "This quickscan holistic snapshot of your organization's readiness to integrate AI. The quickscan evaluates 7 aspects of your organization and is based on your responses, combined with the expertise of Dynaminds and current sector-specific trends.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.7 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);




$pdf->SetFont("Arial", "", "10");
$x = 18;
$y = 70;
$text = "AI Trends";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/telescope.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Arial", "", "7");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Our organization is leveraging AI, enhancing efficiency, innovation, and customer experience. Utilizing machine learning and deep learning, we turn data into actionable insights for informed decision-making. A dedicated AI team crafts custom solutions, ensuring we stay ahead in the digital age.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Arial", "B", "7");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Arial", "", "7");
$text = "                               Invest in ongoing AI education to equip your team with the skills needed to maximize AI's potential.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

// ===============================

$pdf->SetFont("Arial", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "AI Strategy";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/strategy.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Arial", "", "7");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Our AI strategy is rooted in innovation, efficiency, and adaptability. We're focused on harnessing machine learning and AI technologies to process data, gain insights, and enhance decision-making. Custom AI solutions are developed to meet specific organizational needs, ensuring scalability and flexibility. We're committed to staying abreast of AI trends, ensuring our strategy evolves with the technology landscape.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Arial", "B", "7");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Arial", "", "7");
$text = "                               Prioritize a data-centric culture to bolster AI initiatives.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);

// ===============================

$pdf->SetFont("Arial", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Organization";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/gears.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Arial", "", "7");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Our organization is a nexus of innovation, efficiency, and adaptability, seamlessly integrating cutting-edge technologies to drive growth. We prioritize a collaborative, data-driven culture, fostering an environment where creativity and technology converge for optimal solutions. Our strategic initiatives are tailored, scalable, and flexible, ensuring we not only meet but exceed our objectives. Our strategic initiatives are tailored, scalable, and flexible, ensuring we not only meet but exceed our objectives.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Arial", "B", "7");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Arial", "", "7");
$text = "                               Foster cross-functional collaboration to amplify innovation.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Arial", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "People";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/profile-female.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Arial", "", "7");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Our people are our greatest asset, embodying a blend of creativity, expertise, and dedication. We foster an environment that encourages continuous learning and innovation. Each member is empowered with the tools and opportunities to excel, contributing to our collective growth and success. Diversity and inclusion are our strengths, driving a rich exchange of ideas and perspectives. Diversity and inclusion are our strengths, driving a rich exchange of ideas and perspectives.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Arial", "B", "7");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Arial", "", "7");
$text = "                               Implement regular skill development programs to enhance team capabilities.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Arial", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Data";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/layers.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Arial", "", "7");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Data is the cornerstone of our organization, driving informed decisions and innovative solutions. We harness a wealth of data, transforming it into actionable insights through advanced analytics and AI. Our focus on data integrity, security, and privacy ensures robust, reliable outcomes. Data agility enables us to adapt, offering tailored, efficient solutions to complex challenges. Data agility enables us to adapt, offering tailored, efficient solutions to complex challenges. ";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Arial", "B", "7");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Arial", "", "7");
$text = "                               Adopt a comprehensive data governance framework to enhance quality and security within your organization.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Arial", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Controls";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/speedometer.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Arial", "", "7");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Controls are integral in our organization, ensuring efficiency, security, and compliance. We implement rigorous protocols, utilizing advanced technologies to monitor, analyze, and optimize operations. Our controls are adaptive, evolving with emerging risks and opportunities, safeguarding assets and data. They are meticulously designed to enhance transparency, accountability, and performance.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Arial", "B", "7");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Arial", "", "7");
$text = "                               Regularly update and test control mechanisms to ensure their effectiveness and adaptability.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


// ===============================

$pdf->SetFont("Arial", "", "10");
$x = 18;
$y = $pdf->GetY()+4;
$text = "Responsible AI";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->Image('icons/heart.png',$x-10,$y+2,8,0);
$pdf->Image('progress_bar_images/3.5.png',$x,$y+4,50,0);
$pdf->SetFont("Arial", "", "7");
$x = $pdf->GetX()+10;
$y = $pdf->GetY();
$text = "Responsible AI is at the core of our ethos, ensuring that our AI initiatives are ethical, fair, and transparent. We prioritize the development and deployment of AI technologies that respect human rights, privacy, and equality. Our guidelines are stringent, ensuring AI applications are designed and used in ways that are just, unbiased, and accountable. We continuously monitor and refine our AI practices to uphold the highest ethical standards.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $x = $pdf->GetX()+10;
$y = $pdf->GetY();
$pdf->SetFont("Arial", "B", "7");
$text = "Our suggestion:";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$pdf->SetFont("Arial", "", "7");
$text = "                               Embed ethical reviews in AI development processes to ensure fairness and transparency.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=120 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);



// $pdf->SetFont("Arial", "", "10");
// $x = 8;
// $y = $pdf->GetY()+4;
// $text = "AI Impact on your organization".$y;
// insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
// $y = $pdf->GetY()+6;
// $pdf->SetFont("Arial", "", "7");
// $text = "Your organization is adeptly navigating the AI landscape, integrating intelligent solutions that enhance efficiency and innovation. AI is a catalyst in our sector, driving personalized customer experiences and streamlined operations. We’ve adopted AI to analyze complex data, yielding insights for strategic decisions. Office work intensity has escalated due to AI. Automation optimizes tasks, allowing focus on value-added activities and innovation. AI’s role is pivotal; we’re evolving with this technology, ensuring alignment with trends and ethical standards. We’re committed to evolving with AI, ensuring our strategies align with emerging trends, prioritizing ethical and transparent AI applications. The continuous learning and adaptation fostered by AI is nurturing a culture of perpetual improvement within our organization, stimulating a forward-thinking mindset among our teams. By closely monitoring the evolving AI landscape and actively engaging in community dialogues around responsible AI, we are not only staying ahead of technological advancements but also fostering a robust ethical foundation that underscores our AI-driven initiatives.";
// insert_MultiCell($pdf, $X = $x, $Y = $y, $width=190 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
// $y = $pdf->GetY()+1;
// $text = "The continuous learning and adaptation fostered by AI is nurturing a culture of perpetual improvement within our organization, stimulating a forward-thinking mindset among our teams. By closely monitoring the evolving AI landscape and actively engaging in community dialogues around responsible AI, we are not only staying ahead of technological advancements but also fostering a robust ethical foundation that underscores our AI-driven initiatives.";
// insert_MultiCell($pdf, $X = $x, $Y = $y, $width=190 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);


$pdf->SetFont("Arial", "", "10");
$x = 8;
$y = $pdf->GetY()+4;
$text = "AI Impact on your organization";
insert_cell($pdf, $X = $x, $Y = $y, $CellWidth=50 ,$CellHeight=3.7 ,$text=$text ,$border=0 , $alignment='L' ,   $fill=false);
$y = $pdf->GetY()+6;
$pdf->SetFont("Arial", "", "7");
$text = "Your organization is adeptly navigating the AI landscape, integrating intelligent solutions that enhance efficiency and innovation. AI is a catalyst in our sector, driving personalized customer experiences and streamlined operations. We’ve adopted AI to analyze complex data, yielding insights for strategic decisions. Office work intensity has escalated due to AI. Automation optimizes tasks, allowing focus on value-added activities and innovation. AI’s role is pivotal; we’re evolving with this technology, ensuring alignment with trends and ethical standards. We’re committed to evolving with AI, ensuring our strategies align with emerging trends, prioritizing ethical and transparent AI applications. The continuous learning and adaptation fostered by AI is nurturing a culture of perpetual improvement within our organization, stimulating a forward-thinking mindset among our teams. By closely monitoring the evolving AI landscape and actively engaging in community dialogues around responsible AI, we are not only staying ahead of technological advancements but also fostering a robust ethical foundation that underscores our AI-driven initiatives.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=190 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);
$y = $pdf->GetY()+1;
$text = "The continuous learning and adaptation fostered by AI is nurturing a culture of perpetual improvement within our organization, stimulating a forward-thinking mindset among our teams. By closely monitoring the evolving AI landscape and actively engaging in community dialogues around responsible AI, we are not only staying ahead of technological advancements but also fostering a robust ethical foundation that underscores our AI-driven initiatives.";
insert_MultiCell($pdf, $X = $x, $Y = $y, $width=190 ,$height=3.2 ,$text=$text ,$border=0 ,$alignment='L' ,$fill=false);






$pdf->Output("I", 'output.pdf');