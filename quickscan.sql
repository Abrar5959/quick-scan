-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 06:05 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickscan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pillars`
--

CREATE TABLE `pillars` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pillars`
--

INSERT INTO `pillars` (`id`, `name`) VALUES
(1, 'Pillar1'),
(2, 'Pillar2'),
(3, 'Pillar3'),
(4, 'Pillar4'),
(5, 'Pillar5'),
(6, 'Pillar6'),
(7, 'Pillar7');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `pillar_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `weight` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `pillar_id`, `question`, `weight`) VALUES
(1, 1, 'I am fully aware of the latest AI trends relevant to my industry.', 5),
(2, 1, 'My organization actively monitors competitors\' AI initiatives.', 5),
(3, 1, 'We adapt our business strategy based on emerging AI market trends.', 5),
(4, 1, 'Our organization has dedicated resources for researching and adopting emerging AI technologies.', 5),
(5, 1, 'Our organization has a structured approach to staying updated on the latest AI trends relevant to our industry.', 5),
(6, 2, ' Our AI strategy is well-aligned with our broader business and digital transformation goals.', 5),
(7, 2, 'The primary objective for implementing AI in my organization is clearly defined.', 5),
(8, 2, 'We have a detailed roadmap for our AI initiatives that fits into our overall business strategy.', 5),
(9, 2, 'Our organization has a continuous focus on AI on board level.', 5),
(10, 2, 'Our AI strategy is well-articulated, aligning with broader business and digital transformation goals.', 5),
(11, 3, 'My organization is structurally prepared to integrate AI technologies.', 5),
(12, 3, 'Our operational processes are adaptable to AI-driven changes.', 5),
(13, 3, 'We have a change management strategy specifically for AI transformation.', 5),
(14, 3, 'For our core processes, we have well-defined work instructions in place.', 5),
(15, 4, 'Our organizational culture is receptive to AI transformation. ', 5),
(16, 4, 'We have a skills development plan to prepare our workforce for AI technologies.', 5),
(17, 4, 'There is sufficient and active leadership support on AI transformation within our organization.', 5),
(18, 4, 'We have channels for continuous learning and sharing AI-related knowledge within our organization.', 5),
(19, 4, 'Leadership is actively supporting and driving AI initiatives.', 5),
(20, 5, 'Our data strategy is robust and supports AI implementation effectively.', 5),
(21, 5, 'We have efficient data management practices in place.', 5),
(22, 5, 'Our organization has a clear understanding of the data requirements for successful AI implementation.', 5),
(23, 5, 'Data security and privacy are top priorities in our AI initiatives.', 5),
(24, 6, 'We have identified the key performance indicators (KPIs) that will be used to measure the success, effectiveness and ROI of future AI initiatives.', 5),
(25, 6, 'We have identified quality control metrics and benchmarks to evaluate the performance and accuracy of future AI initiatives.', 5),
(26, 6, 'There is a clear communication plan to keep key stakeholders informed about the progress and outcomes of AI initiatives.', 5),
(28, 7, 'We are committed to the ethical use of AI in our organization.', 5),
(29, 7, 'We are prepared for any regulatory changes that may affect our AI initiatives.', 5),
(30, 7, 'We have internal policies that guide responsible AI practices and these policies are properly articulated towards the workforce.', 5),
(31, 7, 'Our organization has a transparent approach to how AI decisions are made and can explain them to stakeholders.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `surveydata`
--

CREATE TABLE `surveydata` (
  `id` int(11) NOT NULL,
  `pillars` text NOT NULL,
  `email` varchar(300) NOT NULL,
  `companyName` varchar(300) NOT NULL,
  `ph` varchar(300) NOT NULL,
  `business_sector` varchar(300) NOT NULL,
  `rate_your_brand` varchar(300) NOT NULL,
  `organization_knowledge_intensity` varchar(300) NOT NULL,
  `strategic_advancement` varchar(300) NOT NULL,
  `operational_efficiency` varchar(300) NOT NULL,
  `quality_enhancement` varchar(300) NOT NULL,
  `other` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `surveydata`
--

INSERT INTO `surveydata` (`id`, `pillars`, `email`, `companyName`, `ph`, `business_sector`, `rate_your_brand`, `organization_knowledge_intensity`, `strategic_advancement`, `operational_efficiency`, `quality_enhancement`, `other`) VALUES
(1, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"3\";i:4;s:1:\"3\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"5\";i:4;s:1:\"5\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"5\";i:1;s:1:\"4\";i:2;s:1:\"4\";i:3;s:1:\"3\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"4\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"2\";}}', 'dummy@mail.com', 'dummy company', '', 'energyUtilitiesMining', 'moderateUnderstanding', 'moderate', 'a:6:{s:22:\"Driving Revenue Growth\";i:1;s:31:\"Enhancing Competitive Advantage\";i:1;s:22:\"Expanding Market Reach\";i:0;s:27:\"Accelerating Time-to-Market\";i:0;s:25:\"Improving Decision-Making\";i:1;s:37:\"Enhancing Data Analytics and Insights\";i:1;}', 'a:5:{s:38:\"Increasing Efficiency and Productivity\";i:1;s:14:\"Cost Reduction\";i:1;s:24:\"Automating Routine Tasks\";i:1;s:33:\"Improving Supply Chain Management\";i:0;s:38:\"Improving Accuracy and Reducing Errors\";i:0;}', 'a:3:{s:34:\"Boosting Innovation and Creativity\";i:0;s:36:\"Enhancing Product or Service Quality\";i:1;s:29:\"Enhancing Customer Experience\";i:1;}', 'a:4:{s:46:\"Enhancing Employee Engagement and Satisfaction\";i:1;s:30:\"Compliance and Risk Management\";i:0;s:38:\"Enhancing Security and Fraud Detection\";i:0;s:49:\"Improving Sustainability and Environmental Impact\";i:1;}'),
(2, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"5\";i:4;s:1:\"4\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"4\";i:1;s:1:\"4\";i:2;s:1:\"4\";i:3;s:1:\"3\";i:4;s:1:\"4\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"5\";i:1;s:1:\"4\";i:2;s:1:\"3\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"5\";}}', 'admin@gmail.com', 'xyz', '', 'publicSectorNonProfit', 'moderateUnderstanding', 'high', 'a:6:{s:22:\"Driving Revenue Growth\";i:0;s:31:\"Enhancing Competitive Advantage\";i:1;s:22:\"Expanding Market Reach\";i:1;s:27:\"Accelerating Time-to-Market\";i:0;s:25:\"Improving Decision-Making\";i:0;s:37:\"Enhancing Data Analytics and Insights\";i:0;}', 'a:5:{s:38:\"Increasing Efficiency and Productivity\";i:0;s:14:\"Cost Reduction\";i:0;s:24:\"Automating Routine Tasks\";i:0;s:33:\"Improving Supply Chain Management\";i:0;s:38:\"Improving Accuracy and Reducing Errors\";i:0;}', 'a:3:{s:34:\"Boosting Innovation and Creativity\";i:1;s:36:\"Enhancing Product or Service Quality\";i:0;s:29:\"Enhancing Customer Experience\";i:0;}', 'a:4:{s:46:\"Enhancing Employee Engagement and Satisfaction\";i:0;s:30:\"Compliance and Risk Management\";i:0;s:38:\"Enhancing Security and Fraud Detection\";i:0;s:49:\"Improving Sustainability and Environmental Impact\";i:1;}'),
(3, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"3\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"3\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"4\";i:2;s:1:\"3\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"3\";}}', '', '', '', '', '', '', '', '', '', ''),
(4, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"3\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"1\";i:2;s:1:\"5\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', 'abrarniazi5959@gmail.com', 'xyz', '', 'agricultureNaturalResources', 'noKnowledge', 'veryLow', 'a:6:{s:22:\"Driving Revenue Growth\";i:0;s:31:\"Enhancing Competitive Advantage\";i:0;s:22:\"Expanding Market Reach\";i:0;s:27:\"Accelerating Time-to-Market\";i:0;s:25:\"Improving Decision-Making\";i:0;s:37:\"Enhancing Data Analytics and Insights\";i:0;}', 'a:5:{s:38:\"Increasing Efficiency and Productivity\";i:0;s:14:\"Cost Reduction\";i:0;s:24:\"Automating Routine Tasks\";i:0;s:33:\"Improving Supply Chain Management\";i:0;s:38:\"Improving Accuracy and Reducing Errors\";i:0;}', 'a:3:{s:34:\"Boosting Innovation and Creativity\";i:0;s:36:\"Enhancing Product or Service Quality\";i:0;s:29:\"Enhancing Customer Experience\";i:0;}', 'a:4:{s:46:\"Enhancing Employee Engagement and Satisfaction\";i:0;s:30:\"Compliance and Risk Management\";i:0;s:38:\"Enhancing Security and Fraud Detection\";i:0;s:49:\"Improving Sustainability and Environmental Impact\";i:0;}'),
(5, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', ''),
(6, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', ''),
(7, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', ''),
(8, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', ''),
(9, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', ''),
(10, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', ''),
(11, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', ''),
(12, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"2\";i:4;s:1:\"3\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"3\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"3\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"1\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"5\";i:3;s:1:\"5\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"4\";i:1;s:1:\"1\";i:2;s:1:\"1\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"3\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"3\";}}', '', '', '', '', '', '', '', '', '', ''),
(13, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"3\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"4\";i:3;s:1:\"1\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', ''),
(14, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"1\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"3\";i:3;s:1:\"3\";}}', '', '', '', '', '', '', '', '', '', ''),
(15, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"5\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `textblobs`
--

CREATE TABLE `textblobs` (
  `id` int(11) NOT NULL,
  `main_heading` varchar(300) NOT NULL,
  `sub_heading` varchar(300) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `textblobs`
--

INSERT INTO `textblobs` (`id`, `main_heading`, `sub_heading`, `text`) VALUES
(1, 'AITrends', '[pillar1_lowscore]', 'Begin by conducting thorough market research to understand current AI trends and how competitors are leveraging them. Establish a dedicated team or assign personnel to continually monitor and report on AI advancements and competitor strategies. Engage in forums, workshops, and collaborations to foster a proactive adaptation approach. Utilize insights gathered to devise a strategy to integrate beneficial AI trends within your organization.'),
(2, 'AITrends', '[pillar1_highscore]', 'Having a high score in AI trends suggests a keen understanding of the evolving landscape. Leverage this knowledge to pioneer innovative solutions that keep your organization ahead of market evolutions. Share your insights across different departments to foster a culture of continual learning and adaptation. Engage in thought leadership to position your organization as a front-runner in harnessing AI trends.'),
(3, 'AI Strategy', '[pillar2_lowscore]', 'Without a clear AI strategy, navigating the transformation journey can be chaotic. Establish a solid AI strategy that aligns with your business goals and digital transformation objectives. Ensure that the strategy is well-communicated across all levels of the organization. Regularly review and adjust the strategy based on feedback from implementation experiences and changing market dynamics.'),
(4, 'AI Strategy', '[pillar2_highscore]', 'Your high score indicates a well-defined AI strategy. Continually refine it to ensure alignment with evolving business objectives and market dynamics. Encourage feedback from various departments to identify areas of improvement. Explore opportunities to expand your AI initiatives to new areas that align with the overarching strategy.'),
(5, 'Organization', '[pillar3_lowscore]', 'Assess the readiness of your operational processes and technical infrastructure to support AI integration. Identify bottlenecks and areas that require improvement to ensure a smooth AI transformation journey. Engage experts to revamp outdated systems and workflows hindering AI integration. Establish a change management plan to guide the organization through the necessary adjustments.'),
(6, 'Organization', '[pillar3_highscore]', 'Your organizational readiness is a strong foundation for accelerating AI-driven initiatives. Foster a culture of innovation and continuous improvement to leverage AI in enhancing operational efficiency. Share success stories and lessons learned to encourage broader AI adoption across the organization.'),
(7, 'People', '[pillar4_lowscore]', 'Address the human dynamics by cultivating an AI-friendly culture and developing a comprehensive upskilling and reskilling program to bridge the existing skills gap. Engage leadership and identify AI ambassadors within your organization to drive the change. Create awareness programs to alleviate fears and showcase the benefits of AI, making the transition smoother.'),
(8, 'People', '[pillar4_highscore]', 'With a culture already receptive to AI, focus on enhancing skills further and exploring new ways to leverage AI for organizational growth. Encourage knowledge sharing and celebrate success stories to maintain enthusiasm and drive continuous innovation.'),
(9, 'Data', '[pillar5_lowscore]', 'Establish a robust data management framework ensuring data quality, privacy, and security. Address issues of siloed data and inefficient data storage. Engage experts to evaluate and enhance the structure and quality of your data, laying a solid foundation for AI implementation.'),
(10, 'Data', '[pillar5_highscore]', 'Your solid data strategy is a significant asset. Explore more advanced AI applications and encourage data-driven decision-making across the organization. Continually review and update your data management practices to stay aligned with evolving data governance standards. '),
(11, 'Controls', '[pillar6_lowscore]', 'Implement robust validation, quality control mechanisms, and a risk management framework to ensure the effectiveness and trustworthiness of AI solutions. Establish clear metrics and transparent reporting mechanisms to track the progress and impact of AI initiatives.'),
(12, 'Controls', '[pillar6_highscore]', 'Utilize established controls to manage AI initiatives effectively, ensuring alignment with business goals. Explore opportunities for enhancing these controls further to accommodate scaling up of AI projects. Share best practices across the organization to maintain a high standard of control and validation.'),
(13, 'Responsible AI', 'Responsible AI', 'Draft robust internal policies promoting ethical AI practices and ensure compliance with emerging regulations. Engage in discussions on AI ethics, and involve stakeholders in establishing guidelines for responsible AI use within your organization.'),
(14, 'Responsible AI', '[pillar8_highscore]', 'Continue to uphold and advocate for responsible AI practices, setting a standard in ethical AI implementations. Keep abreast of evolving regulations and ethical considerations in AI, ensuring your organization remains a leader in responsible AI practices.\r\n\r\nBlobs of text in the lower part of the one-pager, given below.\r\n\r\n\r\nVariable text, built up by combining (appending) different variable fields, one text blob directly after the other:\r\n[ai_goals], [knowledge_intensity], [sector_specific], [ai_knowledge_board], [end_quote].\r\nBased on the input provided by the respondent, different blobs are displayed, making this total field \'unique\' for each respondent.\r\n'),
(16, '[knowledge_intensity]', 'Very Low', 'Given your knowledge intensity is very low, AI adoption might face more hurdles, yet automating manual tasks could be a starting point for gradual transformation.'),
(17, '[knowledge_intensity]', 'Low', 'Considering your knowledge intensity is low, AI implementation may be less disruptive; begin by targeting select manual tasks for automation to ease the transition.'),
(18, '[knowledge_intensity]', 'Moderate', 'With a moderate knowledge intensity, your organization has a balanced foundation to explore AI\'s disruptive potential in both operational and knowledge-driven tasks.'),
(19, '[knowledge_intensity]', 'High', 'Given your knowledge intensity is high, AI can be significantly disruptive by enhancing decision-making and optimizing knowledge work processes.'),
(20, '[knowledge_intensity]', 'Very High', 'Considering your knowledge intensity is very high, AI holds the promise of profound disruption, especially in analytical and decision-making domains.'),
(21, '[sector_specific]', 'Agriculture and Natural Resources', 'In your sector, AI can improve irrigation efficiency based on weather predictions, saving resources.'),
(22, '[sector_specific]', 'Automotive and Transportation', 'In your sector, AI can enhance predictive maintenance, reducing downtime of vehicles and machinery.'),
(23, '[sector_specific]', 'Banking, Financial Services, and Insurance', 'In your sector, AI can streamline fraud detection, protecting assets.'),
(24, '[sector_specific]', 'Construction and Real Estate', 'In your sector, AI can optimize project scheduling, ensuring timely completions.'),
(25, '[sector_specific]', 'Education and Research', 'In your sector, AI can personalize online learning paths, improving engagement.'),
(26, '[sector_specific]', 'Energy, Utilities, and Mining', 'In your sector, AI can optimize energy distribution, reducing operational costs.'),
(27, '[sector_specific]', 'Healthcare and Pharmaceuticals', 'In your sector, AI can enhance diagnostic speed and accuracy, improving patient care.'),
(28, '[sector_specific]', 'Information Technology and Telecommunications', 'In your sector, AI can bolster cybersecurity measures, protecting data.'),
(29, '[sector_specific]', 'Manufacturing and Engineering', 'In your sector, AI can predict maintenance needs, reducing equipment downtime.'),
(30, '[sector_specific]', 'Media, Entertainment, and Hospitality', 'In your sector, AI can personalize content recommendations, enhancing user engagement.'),
(31, '[sector_specific]', 'Retail, Wholesale, and Consumer Goods', 'In your sector, AI can optimize inventory levels, reducing carrying costs.'),
(32, '[sector_specific]', 'Public Sector and Non-Profit', 'In your sector, AI can automate routine administrative tasks, freeing up resources for critical services.'),
(33, '[sector_specific]', 'Other', 'In your sector, AI can automate data analysis, providing timely insights for decision-making.'),
(34, '[ai_knowledge_board]', 'Very limited knowledge', 'As your response indicates, the lack of Board-level understanding may obstruct strategic alignment in the AI Strategy and Leadership Support pillars, posing challenges in driving a successful AI transformation.'),
(35, '[ai_knowledge_board]', 'Basic understanding', 'As your response indicates, a basic understanding can initiate AI discussions, yet advancing knowledge is essential to effectively govern AI initiatives and foster a conducive AI culture.'),
(36, '[ai_knowledge_board]', 'Moderate understanding', 'As your response indicates, this level of understanding is a positive step, yet continuous education can better align board decisions with AI transformation goals across all pillars.'),
(37, '[ai_knowledge_board]', 'Advanced understanding', 'As your response indicates, advanced understanding at the Board level will significantly bolster the AI Strategy and Leadership Support pillars, promoting a well-guided AI transformation journey.'),
(38, '[ai_knowledge_board]', 'Expert knowledge', 'As your response indicates, expert knowledge facilitates insightful governance, propelling all seven pillars, especially in strategizing, ensuring responsible AI practices, and cultivating a competitive edge in AI trends.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pillars`
--
ALTER TABLE `pillars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveydata`
--
ALTER TABLE `surveydata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textblobs`
--
ALTER TABLE `textblobs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pillars`
--
ALTER TABLE `pillars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `surveydata`
--
ALTER TABLE `surveydata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `textblobs`
--
ALTER TABLE `textblobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
