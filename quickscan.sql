-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2023 at 01:28 AM
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
(13, 'a:7:{s:7:\"Pillar1\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"4\";i:2;s:1:\"2\";i:3;s:1:\"2\";i:4;s:1:\"2\";}s:7:\"Pillar2\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"3\";}s:7:\"Pillar3\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"2\";i:3;s:1:\"3\";}s:7:\"Pillar4\";a:5:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"4\";i:3;s:1:\"1\";i:4;s:1:\"2\";}s:7:\"Pillar5\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}s:7:\"Pillar6\";a:3:{i:0;s:1:\"2\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:7:\"Pillar7\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"2\";}}', '', '', '', '', '', '', '', '', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
