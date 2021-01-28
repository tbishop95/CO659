-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2021 at 04:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KSBportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ksb`
--

CREATE TABLE `ksb` (
  `id` varchar(11) NOT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `skill_description` longtext DEFAULT NULL,
  `evidence` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ksb`
--

INSERT INTO `ksb` (`id`, `skill`, `skill_description`, `evidence`) VALUES
('B1', NULL, 'Fluent in written communications and able to articulate complex issues. ', 'Re-use the evidence you collected in WB502 CW1 and/or any additional evidence which demonstrates further development of this behavioural skills. Also should be demonstrated in your final year project.'),
('B2', NULL, 'Makes concise, engaging and well-structured verbal presentations, arguments and explanations. ', 'Re-use the evidence you collected in WB502 CW1 and/or any additional evidence which demonstrates further development of this behavioural skills. Also should be demonstrated in your final year project.'),
('B3', NULL, 'Able to deal with different, competing interests within and outside the organisation with excellent negotiation skills.', 'Re-use the evidence you collected in WB502 CW1 and/or any additional evidence which demonstrates further development of this behavioural skills. Also should be demonstrated in your final year project.'),
('B4', NULL, 'Is able to identify the preferences, motivations, strengths and limitations of other people and apply these insights to work more effectively with and to motivate others. ', 'Re-use the evidence you collected in WB502 CW1 and/or any additional evidence which demonstrates further development of this behavioural skills. Also should be demonstrated in your final year project.'),
('B5', NULL, 'Competent in active listening and in leading, influencing and persuading others. ', 'Re-use the evidence you collected in WB502 CW1 and/or any additional evidence which demonstrates further development of this behavioural skills. Also should be demonstrated in your final year project.'),
('B6', NULL, 'Able to give and receive feedback constructively and incorporate it into his/her own development and life-long learning. ', 'Re-use the evidence you collected in WB502 CW1 and/or any additional evidence which demonstrates further development of this behavioural skills. Also should be demonstrated in your final year project.'),
('B7', '', 'Applies analytical and critical thinking skills to Technology Solutions development and to systematically analyse and apply structured problem solving techniques to complex systems and situations.', 'Re-use the evidence you collected in WB502 CW1 and/or any additional evidence which demonstrates further development of this behavioural skills. Also should be demonstrated in your final year project.'),
('B8', '', 'Able to put forward, demonstrate value and gain commitment to a moderately complex technology-oriented solution, demonstrating understanding of business need, using open questions and summarising skills and basic negotiating skills.', 'Re-use the evidence you collected in WB502 CW1 and/or any additional evidence which demonstrates further development of this behavioural skills. Also should be demonstrated in your final year project.'),
('B9', '', 'Able to conduct effective research, using literature and other media, into IT and business related topics.', 'Re-use the evidence you collected in WB502 CW1 and/or any additional evidence which demonstrates further development of this behavioural skills. Also should be demonstrated in your final year project.'),
('K1', NULL, 'How business exploits technology solutions for competitive advantage.', 'Highlight any relevant experience from your modules or workplace to demonstrate an understanding of this'),
('K10', NULL, 'The issues of quality, cost and time for projects, including contractual obligations and resource constraints.', 'Final year project evidence, other project-based modules that involved time constraints (e.g. Enterprise Systems Development team-project), or workplace experience'),
('K2', NULL, 'The value of technology investments and how to formulate a business case for a new technology solution, including estimation of both costs and benefits.', 'Highlight \"Strategic Rationale & Business Case\" from final year project'),
('K3', NULL, 'Contemporary techniques for design, developing, testing, correcting, deploying and documenting software systems from specifications, using agreed standards and tools.', 'Highlight any relevant experience from your modules or workplace to demonstrate this. Would include use of GitHub, ways of coding collaboratively, system design tools e.g. ERD, Class Diagrams, etc..'),
('K4', NULL, 'How teams work effectively to produce technology solutions.', 'Highlight any evidence from team-based projects e.g. Web Applications or Enterprise Systems Development and any workplace experience'),
('K5', NULL, 'The role of data management systems in managing organisational data and information.', 'Final year project evidence, other project-based modules that involved data management, or workplace experience'),
('K6', NULL, 'Common vulnerabilities in computer networks including unsecure coding and unprotected networks.', 'Highlight security issues covered and mitigated in \"Web Applications\" module, your final year project security audit, and any workplace experience in network/code vulnerabilities'),
('K7', NULL, 'The various roles, functions and activities related to technology solutions within an organisation.', 'Any relevant evidence from your WB501/WB502 research and/or general workplace experience of roles and responsibilities with the teams you have worked in'),
('K8', NULL, 'How strategic decisions are made concerning acquiring technology solutions resources and capabilities including the ability to evaluate the different sourcing options.', 'Highlight \"Strategic Rationale & Business Case\" from final year project'),
('K9', NULL, 'How to deliver a technology solutions project accurately consistent with business needs.', 'Final year project evidence and/or other project-based modules'),
('S1', 'Information Systems', 'Is able to critically analyse a business domain in order to identify the role of information systems, highlight issues and identify opportunities for improvement through evaluating information systems in relation to their intended purpose and effectiveness', 'Highlight strongest evidence from any of the following modules: Enterprise Systems Development, Web Applications, Mobile Systems, OOSD'),
('S2', 'Systems Development ', 'Systems Development: analyses business and technical requirements to select and specify appropriate technology solutions. Designs, implements, tests, and debugs software to meet requirements using contemporary methods including agile development. Manages the development and assurance of software artefacts applying secure development practises to ensure system ', 'Most modules involved this. Highlight your strongest evidence.'),
('S3', 'Data', 'Identifies organisational information requirements and can model data solutions using conceptual data modelling techniques. Is able to implement a database solution using an industry standard database management system (DBMS). Can perform database administration tasks and is cognisant of the key concepts of data quality and data security. Is able to manage data effectively and undertake data analysis.', 'Highlight your strongest evidence that demonstrated your ability to design and implement a database (e.g. Web Applications)'),
('S4', 'Cyber Security ', 'Can undertake a security risk assessment for a simple IT system and propose resolution advice. Can identify, analyse and evaluate security threats and hazards to planned and installed information systems or services (e.g. Cloud services).\r\n\r\n', 'Highlight the \"Testing & Security Audit\" section of your final year project'),
('S5', 'Business Organisations', 'Can apply organisational theory, change management, marketing, strategic practice, human resource management and IT service management to technology solutions development. Develops well-reasoned investment proposals and provides business insights.', 'Highlight the organisational theory learned in WB502 and how you have been able to apply this to your own workplace. Also highlight the business context of your final year project and any other evidence from your day to day role which may be relevant.'),
('S6', 'IT Project Management ', 'Follows a systematic methodology for initiating, planning, executing, controlling, and closing technology solutions projects. Applies industry standard processes, methods, techniques and tools to execute projects. Is able to manage a project (typically less than six months, no inter-dependency with other projects and no strategic impact) including identifying and resolving deviations and the management of problems and escalation processes.', 'Most modules involved this, including your final year project. Highlight your strongest evidence.'),
('S7', 'Computer and Network Infrastructure ', 'Can plan, design and manage computer networks with an overall focus on the services and capabilities that network infrastructure solutions enable in an organisational context. Identifies network security risks and their resolution.\r\n\r\n', 'Highlight any evidence relating to systems architecture, devops, microservices that you have from your modules and/or workplace experience'),
('SE1', NULL, 'Create effective and secure software solutions using contemporary software development languages to deliver the full range of functional and non-functional requirements using relevant development methodologies.', 'Highlight strongest evidence from final year project and/or other modules relevant to this skill'),
('SE10', NULL, 'How teams work effectively to develop software solutions embracing agile and other development approaches.', 'Highlight evidence of understanding of Agile/Scrum from modules, final year project, or workplace experience'),
('SE11', NULL, 'How to apply software analysis and design approaches.', 'Highlight evidence of understanding from relevant modules such as \"Software Development\" or \"OOSD\" as well as general final year project'),
('SE12', NULL, 'How to interpret and implement a design, compliant with functional, non-functional and security requirements.', 'As above'),
('SE13', NULL, 'How to perform functional and unit testing.', 'Highlight evidence of testing from any project-based modules, your final year project or workplace testing frameworks you may interact with'),
('SE14', NULL, 'How to use and apply the range of software tools used in software engineering.', 'Highlight the tools used (and how) in relevant modules and final year project'),
('SE15', NULL, 'The business environment and business issues related to software development', 'Highlight evidence of understanding from your work on WB501 and WB502'),
('SE2', NULL, 'Undertake analysis and design to create artefacts, such as use cases to produce robust software designs.', 'As above (particularly \"Requirements & Design\" section of final year project)'),
('SE3', NULL, 'Produce high quality code with sound syntax in at least one language following best practices and standards.', 'As above (highlight the different languages you used throughout the degree programme)'),
('SE4', NULL, 'Perform code reviews, debugging and refactoring to improve code quality and efficiency.', 'As above (also include any evidence from workplace experience)'),
('SE5', NULL, 'Test code to ensure that the functional and non-functional requirements have been met.', 'As above (particularly \"Testing & Security Audit\" section of final year project)'),
('SE6', NULL, 'Deliver software solutions using industry standard build processes, and tools for configuration management, version control and software build, release and deployment into enterprise environments.', 'As above'),
('SE7', NULL, 'Work collaboratively and professionally with others in cross functional teams', 'As above (particularly highlight workplace experience and team-based project modules e.g. \"Enterprise Systems Development\" and \"Web Applications\")'),
('SE8', NULL, 'Apply secure and robust development principles to ensure software resilience', 'As above'),
('SE9', NULL, 'How to operate at all stages of the software development lifecycle.', 'Highlight evidence of understanding from relevant modules such as \"Software Development\" or \"OOSD\" as well as general final year project');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ksb`
--
ALTER TABLE `ksb`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
