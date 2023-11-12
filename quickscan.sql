-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2023 at 08:28 PM
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
(1, 'Driving Revenue Growth', 'One of your goals of AI is to drive revenue growth. For this, you can leverage AI to analyze customer data for insights, optimize pricing strategies, enhance customer experiences, and personalize marketing campaigns, while continually measuring the impact on revenue and adjusting strategies accordingly to maximize growth.', 2),
(2, 'Enhancing Competitive Advantage', 'One of your goals of AI is enhancing your competitive advantage. For this, utilize AI to analyze market trends, customer behaviors, and competitor strategies, enabling you to identify unique value propositions and stay ahead in the market.', 1),
(3, 'Expanding Market Reach', 'One of your goals of AI is expanding market reach. For this, employ AI-powered analytics to identify new market opportunities and leverage AI-driven marketing campaigns to engage wider audiences.', 7),
(4, 'Accelerating Time-to-Market', 'One of your goals of AI is accellerating time-to-market. For this, implement AI in product development and project management to streamline processes, making real-time adjustments to accelerate the go-to-market timeline.', 8),
(5, 'Improving Decision-Making', 'One of your goals of AI is improving decision-making in your organization. For this, integrate AI in analyzing large datasets to derive actionable insights, supporting data-driven decision-making across the organization.', 4),
(6, 'Enhancing Data Analytics and Insights', 'One of your goals of AI is enhancing data analytics and insights. For this, utilize AI algorithms to delve deeper into your data, uncovering advanced insights that can drive strategic initiatives.', 5),
(7, 'Boosting Innovation and Creativity', 'One of your goals of AI is to boost innovation and creativity in your organization. For this, foster a culture of innovation by leveraging AI to automate routine tasks, freeing up time for creative thinking and exploration.', 9),
(8, 'Enhancing Product or Service Quality', 'One of your goals of AI is to enhance product and/or service quality. For this, apply AI for continuous monitoring and analysis of product quality, enabling timely improvements.', 10),
(9, 'Enhancing Customer Experience', 'One of your goals of AI is to enhance customer experience. For this, employ AI in personalizing customer interactions, providing real-time support, and understanding customer preferences to enhance satisfaction.', 6),
(10, 'Increasing Efficiency and Productivity', 'One of your goals of AI is to increase efficiency and productivity. For this, implement AI to automate repetitive processes and optimize operational workflows.', 3),
(11, 'Cost Reduction', 'One of your goals of AI is cost reduction. For this, utilize AI to optimize resource allocation, reduce waste, and automate routine tasks to significantly cut operational costs.', 11),
(12, 'Automating Routine Tasks', 'One of your goals of AI is automating routine tasks. For this, deploy AI-driven automation tools to handle routine and repetitive tasks, freeing up human resources for more challenging, creative and client-centric activities, adding value where it counts the most.', 13),
(13, 'Improving Supply Chain Management', 'One of your goals of AI is to improve your supply chain management. For this, implement AI for real-time monitoring and analytics to optimize supply chain operations and predict demand accurately.', 12),
(14, 'Improving Accuracy and Reducing Errors', 'One of your goals of AI is to improve accuracy and reduce errors within your processes. For this, examint the use of AI to automate data entry and processing, significantly reducing errors and improving accuracy in operations.', 14),
(15, 'Enhancing Employee Engagement and Satisfaction', 'One of your goals of AI is to enhance employee engagement and satisfaction. For this, you could leverage AI to automate mundane tasks, provide better work tools, thereby setting up a more creative work environment, boosting employee satisfaction.', 15),
(16, 'Compliance and Risk Management', 'One of your goals of AI is to aid with compliance and risk management processes. For this, assess the utilization of AI to continuously monitor the compliance status of your organization and identify potential risks early, enabling proactive mitigation.', 16),
(17, 'Enhancing Security and Fraud Detection', 'One of your goals of AI is to enhance security and fraud detection. For this, assess the applicability to deploy AI for real-time monitoring and anomaly detection to enhance security measures and detect fraudulent activities swiftly.', 17),
(18, 'Improving Sustainability and Environmental Impact', 'One of your goals of AI is to improve sustainability and environmental impact. For this, assess the applicability of employing AI to monitor and analyze environmental impact of your organization\'s processes, and optimize operations for better sustainability.', 18);

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
(1, 1, 'I am fully aware of the latest AI trends relevant to my industry.', 3),
(2, 1, 'My organization actively monitors competitors\' AI initiatives.', 2),
(3, 1, 'We adapt our business strategy based on emerging AI market trends.', 5),
(4, 1, 'Our organization has dedicated resources for researching and adopting emerging AI technologies.', 5),
(5, 1, 'Our organization has a structured approach to staying updated on the latest AI trends relevant to our industry.', 5),
(6, 2, 'Our AI strategy is well-aligned with our broader business and digital transformation goals.', 5),
(7, 2, 'The primary objective for implementing AI in my organization is clearly defined.', 5),
(8, 2, 'We have a detailed roadmap for our AI initiatives that fits into our overall business strategy.', 4),
(9, 2, 'Our organization has a continuous focus on AI on board level.', 5),
(10, 2, 'Our AI strategy is well-articulated, aligning with broader business and digital transformation goals.', 2),
(11, 3, 'My organization is structurally prepared to integrate AI technologies.', 3),
(12, 3, 'Our operational processes are adaptable to AI-driven changes.', 4),
(13, 3, 'We have a change management strategy specifically for AI transformation.', 4),
(14, 3, 'For our core processes, we have well-defined work instructions in place.', 5),
(15, 4, 'Our organizational culture is receptive to AI transformation. ', 3),
(16, 4, 'We have a skills development plan to prepare our workforce for AI technologies.', 2),
(17, 4, 'There is sufficient and active leadership support on AI transformation within our organization.', 5),
(18, 4, 'We have channels for continuous learning and sharing AI-related knowledge within our organization.', 4),
(19, 4, 'Leadership is actively supporting and driving AI initiatives.', 5),
(20, 5, 'Our data strategy is robust and supports AI implementation effectively.', 3),
(21, 5, 'We have efficient data management practices in place.', 3),
(22, 5, 'Our organization has a clear understanding of the data requirements for successful AI implementation.', 5),
(23, 5, 'Data security and privacy are top priorities in our AI initiatives.', 5),
(24, 6, 'We have identified the key performance indicators (KPIs) that will be used to measure the success, effectiveness and ROI of future AI initiatives.', 5),
(25, 6, 'We have identified quality control metrics and benchmarks to evaluate the performance and accuracy of future AI initiatives.', 4),
(26, 6, 'There is a clear communication plan to keep key stakeholders informed about the progress and outcomes of AI initiatives.', 5),
(28, 7, 'We are committed to the ethical use of AI in our organization.', 5),
(29, 7, 'We are prepared for any regulatory changes that may affect our AI initiatives.', 5),
(30, 7, 'We have internal policies that guide responsible AI practices and these policies are properly articulated towards the workforce.', 4),
(31, 7, 'Our organization has a transparent approach to how AI decisions are made and can explain them to stakeholders.', 5),
(32, 2, 'Our AI strategy includes a process for regular review and adjustment to leverage emerging AI technologies and market opportunities', 4),
(33, 3, 'We have evaluated how AI will transform our value chain and have a strategic plan to adapt and capitalize on these changes.', 3),
(34, 5, 'Our organization excels in utilizing big data and advanced analytics for predictive insights, directly informing our AI initiatives.', 3);

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
  `contactPermission` tinyint(4) NOT NULL DEFAULT 0,
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
(1, 'AITrends', 'pillar1_lowscore', '\"How are you adapting to the latest AI trends, stay informed and ahead of your competitors?\"\r\nA low score indicates the need to improve awareness of AI trends. Start with comprehensive market research to understand current trends and competitors\' AI applications. Create a team or designate individuals to monitor and report on AI advancements and competitor strategies. Participate in forums, workshops, and collaborations to proactively adapt. Use these insights to develop a strategy that integrates beneficial AI trends into your organization.'),
(2, 'AITrends', 'pillar1_highscore', '\"How are you adapting to the latest AI trends, stay informed and ahead of your competitors?\"\r\nHaving a high score suggests a keen understanding of the evolving landscape and the potential effect of AI. Leverage this knowledge to pioneer innovative solutions that keep your organization ahead of market evolutions. Share your insights across different departments to foster a culture of continual learning and adaptation. Engage in thought leadership to position your organization as a front-runner in harnessing AI trends.'),
(3, 'AI Strategy', 'pillar2_lowscore', '\"What is your organization\'s AI strategy and how does it align with your business\'s digital transformation goals?\"\r\nWithout a clear AI strategy, navigating the transformation journey can be chaotic and ad-hoc. Establish a solid AI strategy that aligns with your business goals and digital transformation objectives. What is your intent with AI? Once set-up, ensure that your strategy is well-communicated across all levels of the organization. Regularly review and adjust the strategy based on feedback from implementation experiences.'),
(4, 'AI Strategy', 'pillar2_highscore', '\"What is your organization\'s AI strategy and how does it align with your business\'s digital transformation goals?\"\r\nYour high score indicates a well-defined AI strategy and a clear goal with AI. Continually refine it to ensure alignment with evolving business objectives and market dynamics. Encourage feedback from various departments to identify areas of improvement. Explore opportunities to expand your AI initiatives to new areas that align with the overarching strategy and business goals.'),
(5, 'Organization', 'pillar3_lowscore', '\"What is your organizational readiness to seamlessly integrate AI-driven changes?\"\r\nAssess the readiness of your operational processes and technical infrastructure to support AI integration. Identify bottlenecks and areas that require improvement to ensure a smooth AI transformation journey. Engage experts to revamp outdated systems and workflows hindering AI integration. Establish a change management plan to guide the organization through the necessary adjustments.'),
(6, 'Organization', 'pillar3_highscore', '\"What is your organizational readiness to seamlessly integrate AI-driven changes?\"\r\nYour organizational readiness shows to be a strong foundation for accelerating AI-driven initiatives. Continue this route by fostering a culture of innovation and continuous improvement to leverage AI in enhancing operational efficiency. Share success stories and lessons learned to encourage broader AI adoption across the organization.'),
(7, 'People', 'pillar4_lowscore', '\"How can culture and leadership drive AI integration success, and what actions are necessary for this transformation?\"\r\nA low score in this segment suggests a need to enhance AI adoption through human dynamics. Cultivate an AI-friendly culture, develop upskilling and reskilling programs to address skill gaps, and engage leadership to drive change. Identify AI ambassadors within your organization and create awareness programs to alleviate fears and highlight AI benefits, facilitating a smoother transition.'),
(8, 'People', 'pillar4_highscore', '\"How can culture and leadership drive AI integration success, and what actions are necessary for this transformation?\"\r\nWith a culture already receptive to AI, focus on enhancing skills further and exploring new ways to leverage AI for organizational growth. Encourage knowledge sharing and celebrate success stories to maintain enthusiasm and drive continuous innovation.'),
(9, 'Data', 'pillar5_lowscore', '\"How is your data strategy shaping up to address the complexities and demands of an AI-centric future?\"\r\nEstablish a robust data management framework to ensure data quality, privacy, and security, addressing siloed and inefficient data storage. Consult with experts to improve your data structure and quality, providing a strong foundation for AI implementation. This strategic top-down approach will streamline your data processes and aid AI transformation overall.'),
(10, 'Data', 'pillar5_highscore', '\"How is your data strategy shaping up to address the complexities and demands of an AI-centric future?\"\r\nYou most likely have a solid data strategy in place, which is a significant asset. Explore more advanced AI applications and encourage data-driven decision-making across the organization. Use available data in more ways than previously thought of, by combining different siloed data sources. Continually review and update your data management practices to stay aligned with evolving data governance standards. '),
(11, 'Controls', 'pillar6_lowscore', '\"How does your organization keep grip on its AI initiatives and take informed decisions on next steps?\"\r\nYour lower score on Controls suggests a need for more robust monitoring and management of AI initiatives. To address this, implement strong quality control mechanisms with clear metrics and consider adopting a risk management framework to ensure the effectiveness and trustworthiness of AI solutions. Additionally, establish reporting mechanisms to effectively track the progress and impact of AI initiatives.'),
(12, 'Controls', 'pillar6_highscore', '\"How does your organization keep grip on its AI initiatives and take informed decisions on next steps?\"\r\nUtilize established controls to manage AI initiatives effectively, ensuring alignment with business goals. Explore opportunities for enhancing these controls further to accommodate scaling up of AI projects. Share best practices across the organization to maintain a high standard of control and validation.'),
(13, 'Responsible AI', 'pillar7_lowscore', '\"How is your organization positioning itself for the future by means of adopting sound AI practices?\"\r\nTo improve your Responsible AI posture, draft robust internal policies to promote ethical AI practices, aligning with emerging regulations. Involve stakeholders in discussions on AI ethics to establish and regularly update guidelines for responsible AI use within your organization. This approach ensures compliance and fosters an ethical AI environment.'),
(14, 'Responsible AI', 'pillar7_highscore', '\"How is your organization positioning itself for the future by means of adopting sound AI practices?\"\r\nContinue to uphold and advocate for responsible AI practices, setting a standard in ethical AI implementations. Keep abreast of evolving regulations and ethical considerations in AI, ensuring your organization remains a leader in responsible AI practices.'),
(16, 'knowledge_intensity', 'Very Low', 'Given your knowledge intensity is very low, AI adoption might face more hurdles, yet automating manual tasks could be a starting point for gradual transformation.'),
(17, 'knowledge_intensity', 'Low', 'Considering your knowledge intensity is low, AI implementation may be less disruptive; begin by targeting select manual tasks for automation to ease the transition.'),
(18, 'knowledge_intensity', 'Moderate', 'With a moderate knowledge intensity, your organization has a balanced foundation to explore AI\'s disruptive potential in both operational and knowledge-driven tasks.'),
(19, 'knowledge_intensity', 'High', 'Given your knowledge intensity is high, AI can be significantly disruptive by enhancing decision-making and optimizing knowledge work processes.'),
(20, 'knowledge_intensity', 'Very High', 'Considering your knowledge intensity is very high, AI holds the promise of profound disruption, especially in analytical and decision-making domains.'),
(21, 'sector_specific', 'Agriculture and Natural Resources', 'In your sector, AI can optimize crop yields and resource management through predictive analytics and automated machinery.'),
(22, 'sector_specific', 'Automotive and Transportation', 'In your sector, AI can enhance safety and efficiency in vehicle design, traffic management, and autonomous vehicle technology.'),
(23, 'sector_specific', 'Banking, Financial Services, and Insurance', 'In your sector, AI can aid in risk assessment, fraud detection, personalized financial advice, and process automation.'),
(24, 'sector_specific', 'Construction and Real Estate', 'In your sector, AI can streamline project management, improve design through simulations, and enhance real estate market analysis.'),
(25, 'sector_specific', 'Education and Research', 'In your sector, AI can personalize learning experiences and accelerate research through data analysis and pattern recognition.'),
(26, 'sector_specific', 'Energy, Utilities, and Mining', 'In your sector, AI can optimize energy distribution, predict maintenance needs, and improve safety protocols.'),
(27, 'sector_specific', 'Healthcare and Pharmaceuticals', 'In your sector, AI can enhance diagnostic accuracy, personalize treatment plans, and accelerate drug discovery.'),
(28, 'sector_specific', 'Information Technology and Telecommunications', 'In your sector, AI can drive innovation in network optimization, cybersecurity, and data management.'),
(29, 'sector_specific', 'Manufacturing and Engineering', 'In your sector, AI can predict maintenance needs, reducing equipment downtime.'),
(30, 'sector_specific', 'Media and Entertainment', 'In your sector, AI can personalize content recommendations and streamline content creation and distribution processes.'),
(31, 'sector_specific', 'Retail, Wholesale, and Consumer Goods', 'In your sector, AI can enhance customer experience through personalized marketing, inventory management, and sales forecasting.'),
(32, 'sector_specific', 'Public Sector and Non-Profit', 'In your sector, AI can aid in resource allocation, public service delivery optimization, and policy analysis.'),
(33, 'sector_specific', 'Other', ''),
(34, 'ai_knowledge_board', 'Very limited knowledge', 'As your response indicates, the lack of Board-level understanding may obstruct strategic alignment in the AI Strategy and Leadership Support pillars, posing challenges in driving a successful AI transformation.'),
(35, 'ai_knowledge_board', 'Basic understanding', 'As your response indicates, a basic understanding can initiate AI discussions, yet advancing knowledge is essential to effectively govern AI initiatives and foster a conducive AI culture.'),
(36, 'ai_knowledge_board', 'Moderate understanding', 'As your response indicates, this level of understanding is a positive step, yet continuous education can better align board decisions with AI transformation goals across all pillars.'),
(37, 'ai_knowledge_board', 'Advanced understanding', 'As your response indicates, advanced understanding at the Board level will significantly bolster the AI Strategy and Leadership Support pillars, promoting a well-guided AI transformation journey.'),
(38, 'ai_knowledge_board', 'Expert knowledge', 'As your response indicates, expert knowledge facilitates insightful governance, propelling all seven pillars, especially in strategizing, ensuring responsible AI practices, and cultivating a competitive edge in AI trends.'),
(39, 'AITrends', 'lowscore_result', 'You scored lower on AI Trends, indicating gaps in understanding and leveraging current AI advancements in your industry. To enhance this, start by establishing a routine process for monitoring and understanding the latest AI trends relevant to your sector. This could involve dedicated resources for research and adopting new AI technologies. Additionally, actively monitor your competitors\' AI initiatives to stay competitive. Integrating insights from these trends into your business strategy will ensure that your approach to AI is contemporary and aligned with market movements. This structured approach to staying updated will significantly benefit your strategic planning and innovation efforts.'),
(40, 'AITrends', 'highscore_result', 'You\'re adeptly navigating the ever-evolving AI landscape, staying ahead of market shifts and competitor movements. Continue to capitalize on this momentum by persistently monitoring and adapting to new AI (tooling) developments and market trends to maintain your competitive edge.'),
(41, 'AI Strategy', 'lowscore_result', 'Your lower score on AI Strategy might indicate a need for a more defined and integrated approach in this area. To improve, start by clearly defining your AI objectives and ensuring they align with your broader business and digital transformation goals. Next, develop a detailed roadmap for your AI initiatives, incorporating specific milestones, timelines, and resources, making sure it\'s integrated with your overall business strategy. Finally, establish a regular process for reviewing and adjusting your AI strategy, allowing you to stay current with emerging AI technologies and market opportunities. This approach will create a more focused and effective AI strategy.'),
(42, 'AI Strategy', 'highscore_result', 'Your AI strategy is a key driver of success and your high score indicates that your organization is well underway. Continue ensuring it\'s tightly integrated with your business goals and digital transformation initiatives to maximize the potential of AI.'),
(43, 'Organization', 'lowscore_result', 'You scored lower on Organization, indicating that your company\'s current structure and processes might not be optimally configured for AI integration. To address this, initiate structural changes that facilitate AI adoption, such as establishing dedicated AI teams or a task force team. Additionally, review and modify your operational processes to ensure they are flexible and can integrate AI solutions smoothly. This might include redefining roles, responsibilities, and workflows to accommodate AI-driven operations.'),
(44, 'Organization', 'highscore_result', 'Your organization\'s readiness and adaptability to AI-driven changes are commendable as your high score on the pillar Organization indicates. Keep reinforcing this by continuously assessing and evolving your operational processes, change management capabilities, and technical infrastructure.'),
(45, 'People', 'lowscore_result', 'Scoring lower in the People segment of the AI Readiness Quickscan indicates challenges in cultivating an AI-ready culture and workforce within your organization. To address this, first, focus on nurturing an organizational culture that is receptive to AI transformation. This involves active leadership support in driving AI initiatives and establishing channels for continuous learning and sharing AI-related knowledge. Additionally, develop a comprehensive skills development plan to prepare your workforce for AI technologies. By emphasizing these areas, you can foster a more AI-literate and supportive environment, enabling smoother AI integration and adoption across your organization.'),
(46, 'People', 'highscore_result', 'A high score on the People segment indicates that your organization\'s culture and leadership are well-aligned with your AI initiatives. Maintain this by continuing to cultivate a forward-thinking mindset and upskilling programs for your workforce.'),
(47, 'Data', 'lowscore_result', 'Scoring lower in the Data segment suggests that your organization may need to strengthen its approach to data management and utilization in AI initiatives. To improve, begin by developing a robust data strategy that effectively supports AI implementation. This includes establishing efficient data management practices and ensuring a clear understanding of the data requirements for successful AI implementation. Prioritize data security and privacy in all AI initiatives to maintain trust and comply with regulations. Additionally, work towards excelling in utilizing big data and advanced analytics for predictive insights, which are key to informed decision-making in AI projects. Enhancing these aspects of data management and strategy will provide a solid foundation for your AI initiatives.'),
(48, 'Data', 'highscore_result', 'Having a solid data strategy is a core strength - and your high score on this segment indicates that you have this well under control. Keep prioritizing data quality, efficient management, and robust security to support the complex demands of AI solutions. These demands will shift over time, likely fostered by internal demands and external forces, for example by newly developed applications of AI.'),
(49, 'Controls', 'lowscore_result', 'Scoring lower on Controls in the AI Readiness Quickscan suggests a need to enhance how your organization measures and manages the success of AI initiatives - or that you did not have the need yet for having solid controls in place as there are not many AI initiatives ongoing yet. In case of the former, identify and establish clear key performance indicators (KPIs) that will measure the success, effectiveness, and ROI of your future AI initiatives. Alongside this, develop quality control metrics and benchmarks to evaluate the performance and accuracy of these initiatives. Also, ensure there is a clear communication plan in place to keep key stakeholders informed about the progress and outcomes of AI initiatives. This approach will help in creating a more structured and transparent environment for monitoring and communicating the impact of your AI projects.'),
(50, 'Controls', 'highscore_result', 'You\'ve established strong controls and oversight for your AI projects as your high score indicates. Keep expanding and refining these underlying processes and resulting metrics to maintain high-quality standards and responsible AI implementation.'),
(51, 'Responsible AI', 'lowscore_result', 'Scoring lower on Responsible AI suggests a need for strengthening your organization\'s commitment to ethical and regulatory aspects of AI. To improve in this area, begin by reinforcing your commitment to the ethical use of AI. This includes understanding and preparing for any regulatory changes that may affect your AI initiatives. Develop and articulate clear internal policies that guide responsible AI practices throughout your workforce. Additionally, ensure that your organization adopts a transparent approach to AI decision-making and can effectively explain these decisions to stakeholders. This will help in building trust and ensuring compliance with ethical standards and regulations.'),
(52, 'Responsible AI', 'highscore_result', 'Your overall scoring on Responsible AI is high: Your commitment to ethical AI practices is exemplary. Continue to build on this by staying ahead of regulatory shifts and fostering a culture of transparency and accountability.'),
(53, 'AI_trends_suggestion', 'lowscore', 'Research emerging AI technologies; educate your executive staff.'),
(54, 'AI_trends_suggestion', 'highscore', 'Stay updated on AI advancements; structurally monitor competitors.'),
(55, 'AI_strategy_suggestion', 'lowscore', 'Develop an AI Strategy; clarify your digital transformation objectives; create an AI roadmap.'),
(56, 'AI_strategy_suggestion', 'highscore', 'Explore new AI use cases; ensure AI initiatives align with overarching business goals.'),
(57, 'Organization_suggestion', 'lowscore', 'Evaluate your organization\'s AI readiness; identify processes suitable for AI transformation.'),
(58, 'Organization_suggestion', 'highscore', 'Further optimize processes for AI integration; ensure change management readiness.'),
(59, 'People_suggestion', 'lowscore', 'Cultivate AI-positive culture; upskill/reskill employees; earmark informal AI-leaders.'),
(60, 'People_suggestion', 'highscore', 'Foster AI innovation; encourage continuous learning; engage employees in AI initiatives.'),
(61, 'Data_suggestion', 'lowscore', 'Improve data quality; enhance your data management; prepare data for AI readiness.'),
(62, 'Data_suggestion', 'highscore', 'Further optimize data strategies; explore new data sources within your organization.'),
(63, 'Controls_suggestion', 'lowscore', 'Establish basic metrics for tracking AI initiatives; validate AI pilot outcomes.'),
(64, 'Controls_suggestion', 'highscore', 'Refine and expand metrics of your AI initiatives; monitor and validate AI outcomes.'),
(65, 'Responsible_AI_suggestion', 'lowscore', 'Construct compliance policies for your workforce; ensure responsible AI practices by embedding an ethical framework ensuring fairness and transparency.'),
(66, 'Responsible_AI_suggestion', 'highscore', 'Foster ethical AI innovation; ensure continuous compliance; engage in responsible AI practices.'),
(67, 'end_quote', '', 'When it comes to Artificial Intelligence, every organization has its unique profile and will be affected in their own unique ways. The key is to understand this, and approach the topic in a multidimensional way. Organizations should foster continuous learning, innovative curiosity and agile adaptation to cater for the upcoming paradigm shift which AI brings.'),
(68, 'sector_specific', 'Hospitality and Tourism', 'In your sector, AI can improve personalized guest experiences, optimizes bookings, and enhances operational efficiency.'),
(69, 'sector_specific', 'E-commerce and Online Retail', 'In your sector, AI can have a profound effect when it comes to customer intimacy, with hyper-customized and client-centric shopping experiences.'),
(70, 'sector_specific', 'Logistics and Supply Chain', 'In your sector, AI can have a profound effect when it comes to optimalization of logistical processes and supply chains.'),
(71, 'sector_specific', 'Environmental and Sustainability', 'In your sector, AI can have a profound effect when it comes to finding resource convervation optimalizations and reducing waste in processes.');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `surveydata`
--
ALTER TABLE `surveydata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `textblobs`
--
ALTER TABLE `textblobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
