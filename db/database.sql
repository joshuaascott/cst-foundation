-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Oct 21, 2022 at 03:03 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cst`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `ID` int UNSIGNED NOT NULL,
  `JOBREQ_ID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `EMAIL` varchar(100)  NOT NULL,
  `RESUME` varchar(255)  DEFAULT NULL,
  `DATE_APPLIED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ARCHIVE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`ID`, `JOBREQ_ID`, `EMAIL`, `RESUME`, `DATE_APPLIED`, `ARCHIVE`) VALUES
(1, 00009, 'ddanilowicz0@statcounter.com', 'resume.pdf', '2021-12-02 14:55:34', 1),
(2, 00002, 'lbrimmell1@pcworld.com', 'resume.pdf', '2021-12-02 20:14:40', 1),
(3, 00002, 'dsouthwell4@google.ca', 'resume.pdf', '2021-12-02 20:19:09', 1),
(4, 00003, 'noone@intheirrightmind.com', 'resume.pdf', '2021-12-15 23:59:40', 1),
(5, 00003, 'otamlett5@nytimes.com', 'resume.pdf', '2021-12-16 01:08:32', 1),
(6, 00016, 'michael@jackson.com', 'resume.rtf', '2021-12-16 18:39:23', 1),
(7, 00016, 'awinthrop13@opera.com', 'resume.rtf', '2021-12-16 18:59:39', 1),
(8, 00016, 'ospoffordz@va.gov', 'resume.pdf', '2021-12-16 20:29:45', 1),
(9, 00016, 'hleedal1a@zdnet.com', 'resume.pdf', '2021-12-16 20:30:53', 1),
(10, 00016, 'clindm@hud.gov', 'resume.docx', '2021-12-16 20:42:14', 1),
(11, 00016, 'rdoogans@tinyurl.com', 'resume.docx', '2021-12-16 20:42:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobreqs`
--

CREATE TABLE `jobreqs` (
  `ID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `TITLE` varchar(50)  NOT NULL,
  `LOCATION` varchar(50)  NOT NULL,
  `JOB_TYPE` enum('Part Time','Full Time')  NOT NULL,
  `JOB_STATUS` enum('Contingent','Funded')  NOT NULL,
  `CLEARANCE` enum('None','Public Trust','Secret','Top Secret')  NOT NULL,
  `DESCRIPTION` mediumtext  NOT NULL,
  `RESPONSIBILITY` mediumtext  NOT NULL,
  `EXPERIENCE` mediumtext  NOT NULL,
  `EDUCATION` mediumtext  NOT NULL,
  `DATE_CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_FILLED` date DEFAULT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `jobreqs`
--

INSERT INTO `jobreqs` (`ID`, `TITLE`, `LOCATION`, `JOB_TYPE`, `JOB_STATUS`, `CLEARANCE`, `DESCRIPTION`, `RESPONSIBILITY`, `EXPERIENCE`, `EDUCATION`, `DATE_CREATED`, `DATE_FILLED`) VALUES
(00001, 'Blackboard Administrator ', 'Fort Eustis, VA', 'Full Time', 'Funded', 'Secret', 'Choisys Technology is looking for a Blackboard SME to provide technical support for the US Army Training and Doctrine Command (TRADOC) Proponent-Lifelong Learning Center (LLC). The Blackboard SME will be responsible for the management of LLC Blackboard LearnTM domains. They will also work with the customer to provide training to users, and instructors. Candidate must have strong communication skills and the ability to work in a team environment. Eligibility for Secret clearance is required.', 'Responsible for management of Blackboard LearnTM domains, IHs and VCs, content collection library, and building blocks used to extend functionality.\r\nDevelops and documents processes to identify best use of tools and features for various training and education materials and courseware\r\nDevelops and documents processes and routines to effectively load various training and education materials, and courseware into Blackboard LearnTM\r\nProvides staff/faculty training, process improvement\r\nDrafts policies and procedures for Blackboard LearnTM operations\r\nConduct remote site training, local training, and virtual training sessions on the LLC applications\r\nConduct training sessions for various end-user groups\r\nIntegrate existing tutorials into targeted end-user training packages, recognizing that different users will have different functional requirements', 'Eligible for Secret Clearance\r\nSignificant on-the-job experience with Blackboard 9.x\r\nBlackboard Certified Trainer desired\r\nQuality Matters Certification preferred\r\nExperience with Microsoft SQL Server or Oracle desired', 'DoD Directive 8570 Information Assurance Technical (IAT) Level II certification required', '2021-11-29 03:31:34', NULL),
(00002, 'Functional Specialist', 'Warner Robins, GA', 'Full Time', 'Funded', 'Secret', 'The Functional Specialist is responsible for assessing and adapting IT operations to maintain compliance with all relevant Federal, Department of Defense (DoD), Air Force (AF), Air Force Reserve Command (AFRC), and Financial Management (FM) regulations, instructions, policy, and procedures. Provides tiers II and III support on standard computer applications and applications designed for the United States - Air Force’s Reserve Center (US - AFRC) at Robins AF Base, Georgia. Position requires a Secret clearance.', 'Answers, evaluates, and prioritizes incoming telephone, voice mail, e-mail, and in-person requests for assistance from users experiencing problems with hardware, software, networking, and other computer-related technologies\r\nHandles problem recognition, research, isolation, resolution and follow-up for routine user problems, referring more complex problems to supervisor or technical staff\r\nLogs and tracks calls using problem management database, and maintains history records and related problem documentation\r\nPrepares standard statistical reports, such as help desk incident reports\r\nAnalyzes and evaluates incident reports and makes recommendations to reduce help line incident rate\r\nConsults with programmers to explain software errors or to recommend changes to programs\r\nWrites software and hardware evaluations and recommendations for management review\r\nWrites or revises user training manuals and procedures\r\nTrains users on software and hardware on-site or in classroom, or recommends outside contractors to provide training\r\nInstalls personal computers, software, and peripheral equipment\r\nProvide support and data as requested for administrative purposes and in support of the Quality Management System\r\nMust perform other duties as assigned at the discretion of management', 'Must have experience with Air Force and Air Force Reserve Financial systems', 'Associate\'s degree or equivalent from two-year college or technical school; or six months to one year related experience and/or training required\r\nBachelor’s degree in business, finance, accounting, information systems, computer science, or directly related field preferred\r\nDoD 8570.1 IAT Level I certification preferred', '2021-11-29 03:57:12', '2021-12-28'),
(00003, 'IT Security Analyst', 'Kearneysville, WV', 'Full Time', 'Funded', 'Secret', 'Choisys Technology is recruiting for an IT Security Analyst to provide technical support for the US Coast Guard\'Â’s Application Product Lines Enterprise Services (APLES) program. The successful candidate will support the organization\'Â’s Application Security Service Line performing security operations activities and reporting. Will support the customer organization\'Â’s effort to implement the DoD\'Â’s Cybersecurity Discipline Implementation Plan (CDIP). The candidate must have strong oral and written communication skills. An active DoD Secret clearance is required.', 'Research, evaluate, and provide feedback and/or documentation on security issues\r\nLiaison between the organization and IA for security audits and compliance\r\nSupport internal and external audit efforts as well as validate security compliance\r\nValidate and verify remediation of the organization\'Â’s current security issues from multiple sources.\r\nProvide recommendations and interpretations on implementing vulnerability scans, STIGs, Security Assessment Process (SAP) controls, Plan of Actions and Milestones (POA&Ms), TCTO/Task Orders, and Information Assurance Vulnerability Alerts (IAVA) compliance', 'Secret Clearance\r\nMust possess an extensive knowledge Department of Defense (DoD) security processes\r\nKeeps abreast of operational support technologies and industry trends\r\nFamiliarity with Scripting, Linux, Systems Administration and Database Administration', 'Associate of Arts (AA)/Associate of Science (AS) Degree in Computer Science, Information Technology, or equivalent\r\nCompTIA Security+ CE is required\r\nCISSP certification is desired', '2021-11-29 03:59:34', '2021-12-28'),
(00004, 'Project Systems Analyst', 'Warner Robins, GA', 'Full Time', 'Funded', 'Secret', 'The Project Systems Analyst (PSA) provides project support for the United States - Air Force Reserve Center (US-AFRC) financial systems. The PSA analyzes project requirements in the areas of financial management, program scheduling, support requirements, and performs other related analyst/management activities required for successful completion of the task/project. Conducts project tracking methodologies to ensure the success and efficiency of projects. Provide AFRC HQs and field units with information technology and procedural solutions to support specific functionality requirements. Position requires a Secret clearance.', 'Assume project level responsibility for planning, development, implementation and maintenance of the AFRC’s Project applications using the current application programming and relational database management system tool set\r\nWork independently on development of program specifications, and development and execution of test plans.\r\nLocate sources of and solve a variety of system problems and malfunctions; participate in program and system development reviews\r\nConsult with customers on system requirements, schedules, and implementation strategy; analyze customer requests to determine scope of operational and informational needs; familiarize customers with capabilities and limitations of information technology; maintain a continuing liaison with customers to ensure implementation and maintenance of systems\r\nWork on overall project planning through reporting on project schedules and deliverables\r\nPerform feasibility studies and prepare project proposals; prepare specifications, cost benefit analyses and schedules\r\nCreate system and end-user documentation of new and changed applications in accordance with established standards and procedures\r\nPrepare progress reports and apprise management of problems or unexpected resource requirements.\r\nPerform related duties as assigned\r\nProvide support and data as requested for administrative purposes and in support of the Quality Management System\r\nMust perform other duties as assigned at the discretion of management', 'Proven experience in providing technical, functional, and administrative direction for problem definition, analysis, requirements development and implementation for complex to extremely complex systems may be considered as relevant experience in lieu of the education requirements listed above\r\nA minimum of eight (8) years of recent, progressively responsible experience in systems development of major applications\r\nExperience in strategic planning, risk management, change management\r\nExperience performing mathematical and analytical functions required to capture and produce meaningful metrics\r\nHigh degree of technical knowledge regarding computers, systems, databases, general use software programs and office equipment\r\nMust possess an excellent understanding of technical issues, ability to communicate verbally and in written form effectively\r\nMust have an understanding of all relevant Federal, Department of Defense (DOD), Air Force (AF), Air Force Reserve Command (AFRC), Financial Management (FM) regulations, instructions, and procedures\r\nExperience with DoD Travel and Pay Systems, or equivalent', 'Bachelor’s degree in business, finance, accounting, information systems, computer science, or directly related field from an accredited university or college. Relevant experience may be considered as substitution for education\r\nPMP certification desired', '2021-11-29 04:01:13', NULL),
(00005, 'Requirements Analyst', 'Alexandria, VA', 'Full Time', 'Funded', 'None', 'Choisys Technology is recruiting for a Requirements Analyst who will support the program business operations with technical writing, metrics monitoring and collection. The candidate must have experience in requirements gathering, documentation for IT systems, and SharePoint documentation. The role requires a disciplined and self-motivated individual, as well as a fast learner with exceptional follow-through and capable of working independently or with team members. ', 'Utilize best practices to design and write all forms of end-user documentation: user guides, online help, training materials, quick-reference guides, etc.\r\nDeliver quality materials under tight deadlines.\r\nSupport the written aspects of technical development (implementing master pages, views, forms, templates, external lists, external content types, custom lists, web parts, master pages and other SharePoint components).\r\nProvide support for Business Communications, Compliance Documents, Installation Guides, Standard Operating Procedures, Policies, Process Guides, Programmer Reference, Project\r\nCommunications, Quick Reference Guides, Service Manuals, Standards, System Documentation, Test Scripts, User Guides, and Websites/web-content.\r\nSupport Program Management in Quality Control Reporting and Quality Control Planning documentation, as well as other aspects of professional and polished program reporting.\r\nSupport technical team members by providing formatted templates as frameworks for professional delivery, identify improvements to written and visual presentation methods.\r\nSupport the client in both written and visual aspects of Web Service end-user content delivery.\r\nExperience working with Remedy Ticketing system', 'Experience in data analysis and requirements analysis.\r\nAnalyze business and user needs, document requirements, and translate into proper system requirement specifications.\r\nDocument requirements and specifications in accordance with program and enterprise level standard operating procedures.', 'High School Diploma with three years IT experience\r\nCollege degree with one-year IT experience in IT', '2021-11-29 04:03:38', NULL),
(00006, 'Senior Help Desk Specialist', 'Warner Robins, GA', 'Full Time', 'Funded', 'Secret', 'The Senior Help Desk Specialist provides direct support to the service desk and client user base with IT incident resolution and problem management activities. Provides tiers II and III support on standard computer applications and applications designed for the United States - Air Force’s Reserve Center (US - AFRC) at Robins AF Base, Georgia. Position requires a Secret clearance.', 'Answers, evaluates, and prioritizes incoming telephone, voice mail, e-mail, and in-person requests for assistance from users experiencing problems with hardware, software, networking, and other computer-related technologies.\r\nInterviews user to collect information about problem and leads user through diagnostic procedures to determine source of error.\r\nDetermines whether problem is caused by hardware such as modem, printer, cables, or telephone.\r\nHandles problem recognition, research, isolation, resolution and follow-up for routine user problems, referring more complex problems to supervisor or technical staff.\r\nLogs and tracks calls using problem management database, and maintains history records and related problem documentation.\r\nPrepares standard statistical reports, such as help desk incident reports.\r\nAnalyzes and evaluates incident reports and makes recommendations to reduce help line incident rate.\r\nConsults with programmers to explain software errors or to recommend changes to programs.\r\nCalls software and hardware vendors to request service regarding defective products.\r\nTests software and hardware to evaluate ease of use and whether product will aid user in performing work.\r\nWrites software and hardware evaluation and recommendation for management review.\r\nWrites or revises user training manuals and procedures.\r\nDevelops training materials such as exercises and visual displays.\r\nTrains users on software and hardware on-site or in classroom, or recommends outside contractors to provide training.\r\nInstalls personal computers, software, and peripheral equipment.\r\nProvide support and data as requested for administrative purposes and in support of the Quality Management System\r\nMust perform other duties as assigned at the discretion of management', '3 – 5 years of experience supporting IT operations\r\nExperience in an AF Financial Management organization preferred', 'Associate\'s degree or equivalent from two-year college or technical school; or six months to one year related experience and/or training\r\nDoD 8570.1 IAT Level I certification preferred', '2021-11-29 04:05:06', NULL),
(00007, 'Senior Desktop Administrator', 'Alexandria, VA', 'Full Time', 'Funded', 'Secret', 'Choisys Technology, Inc. is seeking a Senior Desktop Administrator to join a team of IT professionals, supporting the DefenseManpower Data Center (DMDC) HQ facility at the Mark Center. The successful candidate will provide end-user device services and support to DMDC users in the National Capital Region. The candidate must have strong oral and written communication skills. An active DoD Secret clearance is required.', 'Manage and maintain all user Desktops and Laptops on the external (NIPR) network\r\nManage and maintain all user Desktops on the internal (IIRR) network\r\nProvide daily IIRR file support by moving files from IIRR network to the OPM network\r\nProvide routine DRS file updates\r\nLog, update and track classified media database\r\nCreate and manage standard desktop images for Windows 7\r\nEnsure that all security requirements are met and infrastructure is compliant to DoD standards\r\nProvides technical, operational, business and/or managerial subject matter expertise\r\nPerform the installation, configuration and tuning as well as ongoing maintenance of Client and third-party product components and subsystems for all client organizations\r\nParticipates as a member of an IT technical team; Performs basic analysis of functional or service requirements using fundamental understanding of IT process or problems\r\nApply Information Technology Infrastructure Library (ITIL) principles to resolve customer incidents\r\nRespond to system failures and work with the vendor to resolve issues related to servers, switches and routers\r\nManage configuration and patching of the desktop and laptop images at client site\r\nMaintain and enhance personal technical skills (breadth and depth) to support the test lab computing needs of the IT Infrastructure at site\r\nProvide systems administration support to cross-functional product development teams\r\nMonitor system resource usage and ensure adequate resources are available to meet the IT requirements through\r\nresource scheduling and new resource acquisition\r\nPrepare detailed systems administration plans and level of effort estimates for meeting product roadmap release requirements; provide detailed bill of materials and cost estimates for new hardware and software or upgrades to and maintenance of existing hardware and software\r\nControl and administer hardware and operating software configurations\r\nDetect, diagnose, isolate and correct device operational failures (e.g. Desktops, phones, fax, printers, audio visual devices, etc.)\r\nSupport Incident and Problem Management activities with device expertise and troubleshooting', 'Must have at least 5+ years of experience administering MS Windows OS and desktops\r\nProficient in Microsoft Outlook experience required; Basic Exchange server knowledge is preferred\r\nStrong understanding of Microsoft Office 2010 products\r\nProven and progressive Citrix enterprise services infrastructure support and implementation experience preferred\r\nWorking knowledge of SharePoint preferred\r\nSolid experience in Virtual Desktop Infrastructure (VDI), XenApp, XenServer, XenDesktop, Provisioning Server, Citrix EdgeSite and AppSense Management Suite preferred\r\nExperience supporting servers in a LAN/WAN environment\r\nMust have working knowledge of SQL Server operation, tuning, backup and recovery activities', 'Bachelor’s degree or equivalent in management information systems, computer science engineering, business and/or related technical field or equivalent experience\r\nDoD Directive 8570 Information Assurance Technical (IAT) Level II certification required\r\nMS Certification preferred', '2021-11-29 04:09:50', NULL),
(00008, 'Web Content Manager', 'Quantico, VA', 'Full Time', 'Funded', 'Secret', 'The Web Content Manager works with Tech Writers and Product Development teams to design, develop, produce and sustain the content for the customer organization\'s websites. Must be highly creative and have solid design skills. This position requires a Secret clearance.', 'Collaborate with Tech Writers, Product Developers and the user community to implement changes to design, layout, navigation and functionality in order to continually improve usability and accessibility\r\nWork closely with policy and advocacy team members to ensure web structure and presentation is consistent with policy and organizational objectives\r\nTest and evaluate updated content to identify and resolve any broken links, typos or functionality errors\r\nEnsure Web structure and content conform with organization\'s configuration management policies\r\nUtilize best practices to design and write all forms of end-user documentation: user guides, online help, training materials, quick-reference guides, etc.\r\nSupport the written aspects of technical development (implementing master pages, views, forms, templates, external lists, external content types, custom lists, web parts, and other SharePoint components\r\nProvide support for Business Communications, Compliance Documents, Installation Guides, Standard Operating Procedures, Policies, Process Guides, Programmer Reference, Project Communications, Quick Reference Guides, Service Manuals, Standards, System Documentation, Test Scripts, User Guides, and Web content\r\nSupport Program Management in Quality Control Reporting and Quality Control Planning documentation\r\nCreate a uniform style and language documentation\r\nDeliver quality material under tight deadlines', '3+ years of IT technical writing experience, to include 3 SharePoint experience\r\nExperience at gathering business and functional requirements and translating them into functional technical requirements\r\nIntermediate knowledge and experience with CSS, HTML and JavaScript\r\n1 year of novice experience with graphic design or Photoshop\r\nUnderstanding of System Engineering concepts and practices\r\nExperience using MS Visio and InfoPath\r\nClient focus a must', 'Bachelor\'s Degree in English and/or Computer Science/Information Technology is preferred\r\nCompTIA Security + CE certification is required\r\nWindows or SharePoint computing environment (CE) certification within 6 months of starting', '2021-11-29 04:12:06', NULL),
(00009, 'AV/VTC Technician', 'Washington, DC', 'Full Time', 'Funded', 'Secret', 'Choisys is currently seeking to hire AV/VTC Technician to provide Audio Visual (AV)/Video Teleconferencing (VTC) support services for a Federal Government customer on a long-term contract in the DC metro area.\r\n\r\nProvides technical support for VTC conference call monitoring, performance reports, (Senior Level) troubleshooting of AV/VTC issues and audio/video conferencing related issues. Works directly with customers to assist in setup/break down and operation of electronic presentations, via audio/video conference equipment. Schedules, setup, monitor point-to-point, multipoint, dry run, and ad-hoc audio/video conferences. Analyzes requirements for audio/video and multimedia technologies and services, and recommends preferred solutions to customer. Performs video camera and audio recordings. Performs media editing for customer playback, archiving, and publishing final formats to support special events and conferences as video production team. Setup and operates audio system for live events and ceremonies, and assist video production requirements. Performs (Junior Level) troubleshooting and problem solving of all audiovisual/VTC technical equipment issues. Train techs and end users to operate AV/VTC equipment. Performs field reporting in assisting the project manager as required. ', 'Determines equipment operational status and maintenance warranty service status reports.\r\nPerforms preventive maintenance on AV/VTC systems and equipment climbing ladders, lift devise and proficient with normal working tools.\r\nResolves system operational problems by troubleshooting and performing fault isolation.\r\nRepairs, replaces, or reprograms faulty equipment, as required.\r\nPerforms intricate alignment and calibration procedures to ensure maximum AV/VTC systems are operating efficiently.\r\nSchedules VTC sessions, maintains a call schedule and coordinates reservation and scheduling of VTC services with outside agencies.\r\nPerforms setup, test, adjustment, operation, and shutdown of equipment in support of VTC sessions.\r\nProvides client consulting and training on control, interfaces, and use of the audio/visual and VTC equipment.\r\nActs as equipment custodian and performs inventory asset management and accountability functions.\r\nEstablishes solutions to moderately complex operation problems within the capacity and operational limitations of installed equipment.\r\nExperience with programming software for AMX, Crestron & Cisco/Tandberg and Polycom VTC equipment.\r\nPerforms troubleshooting and problem solving of all audiovisual/VTC technical equipment issues.\r\nFull working knowledge of commercial construction methods such as ceiling deck construction, wall framing and structural engineering.\r\nTrains technicians and end users to operate AV/VTC equipment.\r\nProvides field reporting to project manager as required.\r\nFamiliar and compliant with the Defense Information Systems Agency (DISA) operational guidelines.\r\nAssists team with life cycle refresh projections for VTC infrastructure and AV equipment build out projects.\r\nConducts site surveys to establish VTC/AV equipment customer requirements.\r\nMust be able to lift and/or carry no more than 70 pounds of AV/VTC equipment.', 'Performs setups, maintains, operates, schedules, removes, and modifies video teleconferencing (VTC) Bridge & TMS systems and AV equipment.\r\nConduct site survey of audio visual equipment installation.\r\nSome skills on operating AMX/Creston controller and touch panels', 'Computer Skills: Microsoft Office, Project, Access, Visio, MAC & PC Audio/video editing software especially Final Cut Pro.\r\nCertifications desired: InfoComm, Crestron, Cisco/Tandberg, Polycom, AMX, and Biamp', '2021-11-29 04:13:53', NULL),
(00016, 'UX Designer', 'Ashburn, VA', 'Full Time', 'Funded', 'Public Trust', 'A User Experience Architect (UXA) will work with both business and technical stakeholders along with other members of our team to develop UXA documentation (wireframes, work flows, prototypes, etc.) The ideal candidate will have interaction design and information architecture experience for websites and web-based applications of all glass sizes. The UXA works jointly with the business analyst to elicit, analyze, communicate and validate requirements for changes to business processes, policies and information systems. The key functionality will be the ownership of the wireframe design and solicitation of stakeholder feedback to ensure the user interaction fits the business need.', 'Have experience designing for or working with multiple IDEs\r\nHave experience with standard User Experience methodologies and techniques\r\nQuickly design and produce wireframes for new features using Balsamiq or Sketch\r\nCreate mid-fidelity prototypes for use in customer research and usability testing\r\nValidate concepts and designs at all stages with customers and partners\r\nEnjoy working on complex, enterprise applications\r\nBe comfortable operating in an Agile development environment\r\nEnjoy collaborating with other UX designers\r\nPartner with PM and Developer stakeholders\r\nProvide feedback to and receive feedback from peers in design reviews\r\nHave experience with multiple user research methods (walkthroughs, testing, interviews, surveys)', '4+ years of experience working in Creative Design as an Information Architect, Interaction Designer, or User Experience Designer\r\nExcellent analytical skills\r\nExperience working with dynamic websites and content management systems\r\nExperience creating and documenting process flows\r\nFluency and expertise in Axure, Visio, Balsamiq, Adobe CS and/or Omnigraffe\r\nAbility to excel in a collaborative environment and deliver work against tight deadlines\r\nGreat communication and presentation skills and experience with directly with clients\r\nCreative and design oriented background\r\nAttention to detail and the ability to handle multiple projects/assignments at one time\r\nAbility to research and utilize best user experience and design practices\r\nVisual and user-centered design experience is a plus\r\nExperience in prototyping is a plus\r\nResponsive design experience is also a plus', 'Must have masters in Psychology, Human Factors, or related field\r\nMust have HFI CUA (Certified Usability Analyst)', '2021-12-16 14:27:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int UNSIGNED NOT NULL,
  `NAME` varchar(50)  NOT NULL,
  `EMAIL` varchar(50)  NOT NULL,
  `CATEGORY` varchar(10)  NOT NULL,
  `MESSAGE` mediumtext  NOT NULL,
  `DATE_SENT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MESSAGE_READ` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UQ_APPLICATIONS` (`JOBREQ_ID`);

--
-- Indexes for table `jobreqs`
--
ALTER TABLE `jobreqs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobreqs`
--
ALTER TABLE `jobreqs`
  MODIFY `ID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `FK_JOBREQS` FOREIGN KEY (`JOBREQ_ID`) REFERENCES `jobreqs` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
