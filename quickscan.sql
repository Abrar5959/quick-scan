-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2023 at 11:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `ai_goals`
--

CREATE TABLE `ai_goals` (
  `id` int(11) NOT NULL,
  `choice` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ai_goals`
--

INSERT INTO `ai_goals` (`id`, `choice`, `text`, `rank`) VALUES
(1, 'Driving Revenue Growth', 'Leverage AI to analyze customer data for insights, optimize pricing strategies, enhance customer experiences, and personalize marketing campaigns, while continually measuring the impact on revenue and adjusting strategies accordingly to maximize growth.', 1),
(2, 'Enhancing Competitive Advantage', 'Utilize AI to analyze market trends, customer behaviors, and competitor strategies, enabling you to identify unique value propositions and stay ahead in the market.', 2),
(3, 'Expanding Market Reach', 'Employ AI-powered analytics to identify new market opportunities and leverage AI-driven marketing campaigns to engage wider audiences.', 3),
(4, 'Accelerating Time-to-Market', 'Implement AI in product development and project management to streamline processes, making real-time adjustments to accelerate the go-to-market timeline.', 4),
(5, 'Improving Decision-Making', 'Integrate AI in analyzing large datasets to derive actionable insights, supporting data-driven decision-making across the organization.', 5),
(6, 'Enhancing Data Analytics and Insights', 'Utilize AI algorithms to delve deeper into your data, uncovering advanced insights that can drive strategic initiatives.', 6),
(7, 'Boosting Innovation and Creativity', 'Foster a culture of innovation by leveraging AI to automate routine tasks, freeing up time for creative thinking and exploration.', 7),
(8, 'Enhancing Product or Service Quality', 'Apply AI for continuous monitoring and analysis of product quality, enabling timely improvements.', 8),
(9, 'Enhancing Customer Experience', 'Employ AI in personalizing customer interactions, providing real-time support, and understanding customer preferences to enhance satisfaction.', 9),
(10, 'Increasing Efficiency and Productivity', 'Implement AI to automate repetitive processes and optimize operational workflows, boosting efficiency and productivity.', 10),
(11, 'Cost Reduction', 'Utilize AI to optimize resource allocation, reduce waste, and automate routine tasks to significantly cut operational costs.', 11),
(12, 'Automating Routine Tasks', 'Deploy AI-driven automation tools to handle routine and repetitive tasks, freeing up human resources for more strategic work.', 12),
(13, 'Improving Supply Chain Management', 'Implement AI for real-time monitoring and analytics to optimize supply chain operations and predict demand accurately.', 13),
(14, 'Improving Accuracy and Reducing Errors', 'Employ AI to automate data entry and processing, significantly reducing errors and improving accuracy in operations.', 14),
(15, 'Enhancing Employee Engagement and Satisfaction', 'Leverage AI to automate mundane tasks, provide better work tools, and create a conducive work environment, boosting employee satisfaction.', 15),
(16, 'Compliance and Risk Management', 'Utilize AI to continuously monitor compliance and identify potential risks early, enabling proactive mitigation.', 16),
(17, 'Enhancing Security and Fraud Detection', 'Deploy AI for real-time monitoring and anomaly detection to enhance security measures and detect fraudulent activities swiftly.', 17),
(18, 'Improving Sustainability and Environmental Impact', 'Employ AI to monitor and analyze environmental impact, and optimize operations for better sustainability.', 18);

-- --------------------------------------------------------

--
-- Table structure for table `pillars`
--

CREATE TABLE `pillars` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
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
  `question` text COLLATE utf8_unicode_ci NOT NULL,
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
  `pillars` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyName` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ph` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_sector` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ai_knowledge_board` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization_knowledge_intensity` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `strategic_advancement` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operational_efficiency` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quality_enhancement` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `textblobs`
--

CREATE TABLE `textblobs` (
  `id` int(11) NOT NULL,
  `main_heading` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `sub_heading` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `textblobs`
--

INSERT INTO `textblobs` (`id`, `main_heading`, `sub_heading`, `text`) VALUES
(1, 'AITrends', 'pillar1_lowscore', 'Begin by conducting thorough market research to understand current AI trends and how competitors are leveraging them. Establish a dedicated team or assign personnel to continually monitor and report on AI advancements and competitor strategies. Engage in forums, workshops, and collaborations to foster a proactive adaptation approach. Utilize insights gathered to devise a strategy to integrate beneficial AI trends within your organization.'),
(2, 'AITrends', 'pillar1_highscore', 'Having a high score in AI trends suggests a keen understanding of the evolving landscape. Leverage this knowledge to pioneer innovative solutions that keep your organization ahead of market evolutions. Share your insights across different departments to foster a culture of continual learning and adaptation. Engage in thought leadership to position your organization as a front-runner in harnessing AI trends.'),
(3, 'AI Strategy', 'pillar2_lowscore', 'Without a clear AI strategy, navigating the transformation journey can be chaotic. Establish a solid AI strategy that aligns with your business goals and digital transformation objectives. Ensure that the strategy is well-communicated across all levels of the organization. Regularly review and adjust the strategy based on feedback from implementation experiences and changing market dynamics.'),
(4, 'AI Strategy', 'pillar2_highscore', 'Your high score indicates a well-defined AI strategy. Continually refine it to ensure alignment with evolving business objectives and market dynamics. Encourage feedback from various departments to identify areas of improvement. Explore opportunities to expand your AI initiatives to new areas that align with the overarching strategy.'),
(5, 'Organization', 'pillar3_lowscore', 'Assess the readiness of your operational processes and technical infrastructure to support AI integration. Identify bottlenecks and areas that require improvement to ensure a smooth AI transformation journey. Engage experts to revamp outdated systems and workflows hindering AI integration. Establish a change management plan to guide the organization through the necessary adjustments.'),
(6, 'Organization', 'pillar3_highscore', 'Your organizational readiness is a strong foundation for accelerating AI-driven initiatives. Foster a culture of innovation and continuous improvement to leverage AI in enhancing operational efficiency. Share success stories and lessons learned to encourage broader AI adoption across the organization.'),
(7, 'People', 'pillar4_lowscore', 'Address the human dynamics by cultivating an AI-friendly culture and developing a comprehensive upskilling and reskilling program to bridge the existing skills gap. Engage leadership and identify AI ambassadors within your organization to drive the change. Create awareness programs to alleviate fears and showcase the benefits of AI, making the transition smoother.'),
(8, 'People', 'pillar4_highscore', 'With a culture already receptive to AI, focus on enhancing skills further and exploring new ways to leverage AI for organizational growth. Encourage knowledge sharing and celebrate success stories to maintain enthusiasm and drive continuous innovation.'),
(9, 'Data', 'pillar5_lowscore', 'Establish a robust data management framework ensuring data quality, privacy, and security. Address issues of siloed data and inefficient data storage. Engage experts to evaluate and enhance the structure and quality of your data, laying a solid foundation for AI implementation.'),
(10, 'Data', 'pillar5_highscore', 'Your solid data strategy is a significant asset. Explore more advanced AI applications and encourage data-driven decision-making across the organization. Continually review and update your data management practices to stay aligned with evolving data governance standards. '),
(11, 'Controls', 'pillar6_lowscore', 'Implement robust validation, quality control mechanisms, and a risk management framework to ensure the effectiveness and trustworthiness of AI solutions. Establish clear metrics and transparent reporting mechanisms to track the progress and impact of AI initiatives.'),
(12, 'Controls', 'pillar6_highscore', 'Utilize established controls to manage AI initiatives effectively, ensuring alignment with business goals. Explore opportunities for enhancing these controls further to accommodate scaling up of AI projects. Share best practices across the organization to maintain a high standard of control and validation.'),
(13, 'Responsible AI', 'pillar7_lowscore', 'Draft robust internal policies promoting ethical AI practices and ensure compliance with emerging regulations. Engage in discussions on AI ethics, and involve stakeholders in establishing guidelines for responsible AI use within your organization.'),
(14, 'Responsible AI', 'pillar7_highscore', 'Continue to uphold and advocate for responsible AI practices, setting a standard in ethical AI implementations. Keep abreast of evolving regulations and ethical considerations in AI, ensuring your organization remains a leader in responsible AI practices.\r\n\r\nBlobs of text in the lower part of the one-pager, given below.\r\n\r\n\r\nVariable text, built up by combining (appending) different variable fields, one text blob directly after the other:\r\n[ai_goals], [knowledge_intensity], [sector_specific], [ai_knowledge_board], [end_quote].\r\nBased on the input provided by the respondent, different blobs are displayed, making this total field \'unique\' for each respondent.\r\n'),
(16, 'knowledge_intensity', 'Very Low', 'Given your knowledge intensity is very low, AI adoption might face more hurdles, yet automating manual tasks could be a starting point for gradual transformation.'),
(17, 'knowledge_intensity', 'Low', 'Considering your knowledge intensity is low, AI implementation may be less disruptive; begin by targeting select manual tasks for automation to ease the transition.'),
(18, 'knowledge_intensity', 'Moderate', 'With a moderate knowledge intensity, your organization has a balanced foundation to explore AI\'s disruptive potential in both operational and knowledge-driven tasks.'),
(19, 'knowledge_intensity', 'High', 'Given your knowledge intensity is high, AI can be significantly disruptive by enhancing decision-making and optimizing knowledge work processes.'),
(20, 'knowledge_intensity', 'Very High', 'Considering your knowledge intensity is very high, AI holds the promise of profound disruption, especially in analytical and decision-making domains.'),
(21, 'sector_specific', 'Agriculture and Natural Resources', 'In your sector, AI can improve irrigation efficiency based on weather predictions, saving resources.'),
(22, 'sector_specific', 'Automotive and Transportation', 'In your sector, AI can enhance predictive maintenance, reducing downtime of vehicles and machinery.'),
(23, 'sector_specific', 'Banking, Financial Services, and Insurance', 'In your sector, AI can streamline fraud detection, protecting assets.'),
(24, 'sector_specific', 'Construction and Real Estate', 'In your sector, AI can optimize project scheduling, ensuring timely completions.'),
(25, 'sector_specific', 'Education and Research', 'In your sector, AI can personalize online learning paths, improving engagement.'),
(26, 'sector_specific', 'Energy, Utilities, and Mining', 'In your sector, AI can optimize energy distribution, reducing operational costs.'),
(27, 'sector_specific', 'Healthcare and Pharmaceuticals', 'In your sector, AI can enhance diagnostic speed and accuracy, improving patient care.'),
(28, 'sector_specific', 'Information Technology and Telecommunications', 'In your sector, AI can bolster cybersecurity measures, protecting data.'),
(29, 'sector_specific', 'Manufacturing and Engineering', 'In your sector, AI can predict maintenance needs, reducing equipment downtime.'),
(30, 'sector_specific', 'Media, Entertainment, and Hospitality', 'In your sector, AI can personalize content recommendations, enhancing user engagement.'),
(31, 'sector_specific', 'Retail, Wholesale, and Consumer Goods', 'In your sector, AI can optimize inventory levels, reducing carrying costs.'),
(32, 'sector_specific', 'Public Sector and Non-Profit', 'In your sector, AI can automate routine administrative tasks, freeing up resources for critical services.'),
(33, 'sector_specific', 'Other', 'In your sector, AI can automate data analysis, providing timely insights for decision-making.'),
(34, 'ai_knowledge_board', 'Very limited knowledge', 'As your response indicates, the lack of Board-level understanding may obstruct strategic alignment in the AI Strategy and Leadership Support pillars, posing challenges in driving a successful AI transformation.'),
(35, 'ai_knowledge_board', 'Basic understanding', 'As your response indicates, a basic understanding can initiate AI discussions, yet advancing knowledge is essential to effectively govern AI initiatives and foster a conducive AI culture.'),
(36, 'ai_knowledge_board', 'Moderate understanding', 'As your response indicates, this level of understanding is a positive step, yet continuous education can better align board decisions with AI transformation goals across all pillars.'),
(37, 'ai_knowledge_board', 'Advanced understanding', 'As your response indicates, advanced understanding at the Board level will significantly bolster the AI Strategy and Leadership Support pillars, promoting a well-guided AI transformation journey.'),
(38, 'ai_knowledge_board', 'Expert knowledge', 'As your response indicates, expert knowledge facilitates insightful governance, propelling all seven pillars, especially in strategizing, ensuring responsible AI practices, and cultivating a competitive edge in AI trends.'),
(39, 'AITrends', 'lowscore_result', 'It\'s vital to improve your awareness and adaptation to AI trends. Regularly assess emerging tools, and keep a close watch on how AI is shaping your industry and competitors\' actions to avoid being left behind.'),
(40, 'AITrends', 'highscore_result', 'You\'re adeptly navigating the ever-evolving AI landscape, staying ahead of market shifts and competitor movements. Continue to capitalize on this momentum by persistently monitoring and adapting to new AI tooling developments and market trends to maintain your competitive edge.'),
(41, 'AI Strategy', 'lowscore_result', 'A low score indicates that your AI strategy may not be fully aligned with your business objectives. It\'s crucial to define your intent and objectives clearly, ensuring your AI initiatives are strategically aligned with the broader goals of the organization.'),
(42, 'AI Strategy', 'highscore_result', 'Your AI strategy is a key driver of success. Continue ensuring it\'s tightly integrated with your business goals and digital transformation initiatives to maximize AI\'s potential.'),
(43, 'Organization', 'lowscore_result', 'Focus on strengthening your organizational structure, processes, and technical backbone to better support AI transformations.'),
(44, 'Organization', 'highscore_result', 'Your organization\'s readiness and adaptability to AI-driven changes are commendable. Keep reinforcing this by continuously assessing and evolving your operational processes, change management capabilities, and technical infrastructure.'),
(45, 'People', 'lowscore_result', 'To enhance your score, focus on fostering an AI-friendly culture and invest in upskilling your workforce. Leadership support is pivotal; ensure leaders are champions for AI, driving the transformation forward.'),
(46, 'People', 'highscore_result', 'Your organization\'s culture and leadership are well-aligned with AI initiatives. Maintain this by continuing to cultivate a forward-thinking mindset and upskilling programs for your team.'),
(47, 'Data', 'lowscore_result', 'A low score suggests you need to enhance your data management and strategy. Concentrate on improving data quality, governance, and infrastructure to fully harness AI\'s capabilities.'),
(48, 'Data', 'highscore_result', 'Your solid data strategy is a core strength. Keep prioritizing data quality, efficient management, and robust security to support the complex demands of AI solutions.'),
(49, 'Controls', 'lowscore_result', 'Improving control over your AI initiatives is essential. Develop rigorous validation, ROI assessment, and risk management processes to ensure your AI tools remain efficient and aligned with organizational standards.'),
(50, 'Controls', 'highscore_result', 'You\'ve established strong controls and oversight for your AI projects. Keep refining these processes to maintain high-quality standards and responsible AI implementation.'),
(51, 'Responsible AI', 'lowscore_result', 'Increasing your focus on responsible AI is crucial. Work towards embedding ethics, transparency, and regulatory compliance in all AI-related activities.'),
(52, 'Responsible AI', 'highscore_result', 'Your commitment to ethical AI practices is exemplary. Continue to build on this by staying ahead of regulatory shifts and fostering a culture of transparency and accountability.'),
(53, 'AI_trends_suggestion', 'lowscore', 'Research emerging AI technologies; adopt relevant trends; analyze competitors\' AI initiatives.'),
(54, 'AI_trends_suggestion', 'highscore', 'Stay updated on AI advancements; innovate with new AI trends; monitor competitors\' AI ventures.'),
(55, 'AI_strategy_suggestion', 'lowscore', 'Align AI with business goals; clarify digital transformation objectives; create a robust AI roadmap.'),
(56, 'AI_strategy_suggestion', 'highscore', 'Evolve AI strategy with business objectives; explore new AI use cases; ensure AI initiatives align with overarching goals.'),
(57, 'Organization_suggestion', 'lowscore', 'Assess AI readiness; enhance operational processes; prepare technical infrastructure for AI integration.'),
(58, 'Organization_suggestion', 'highscore', 'Optimize processes for AI integration; ensure change management readiness; continuously assess technical infrastructure.'),
(59, 'People_suggestion', 'lowscore', 'Cultivate AI-positive culture; upskill employees; foster AI readiness among staff.'),
(60, 'People_suggestion', 'highscore', 'Foster AI innovation; encourage continuous learning; engage employees in AI initiatives.'),
(61, 'Data_suggestion', 'lowscore', 'Improve data quality; enhance data management; prepare data for AI readiness.'),
(62, 'Data_suggestion', 'highscore', 'Optimize data strategies; explore new data sources; ensure data integrity for AI innovations.'),
(63, 'Controls_suggestion', 'lowscore', 'Establish metrics for AI initiatives; validate AI outcomes; ensure AI alignment with business goals.'),
(64, 'Controls_suggestion', 'highscore', 'Refine metrics; ensure continuous relevance of AI; monitor and validate AI outcomes.'),
(65, 'Responsible_AI_suggestion', 'lowscore', 'Build foundational ethics; establish compliance policies; ensure responsible AI practices.'),
(66, 'Responsible_AI_suggestion', 'highscore', 'Foster ethical AI innovation; ensure continuous compliance; engage in responsible AI practices.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_goals`
--
ALTER TABLE `ai_goals`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `ai_goals`
--
ALTER TABLE `ai_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `textblobs`
--
ALTER TABLE `textblobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
