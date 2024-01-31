-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2024 at 10:14 AM
-- Server version: 5.7.40-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efqlckyo_ttep`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventscol` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `posted_by` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `eventscol`, `start_date`, `end_date`, `posted_by`) VALUES
(1, 'Appointment', 'Ahmad Rezaiee : Piruzi cafe', NULL, '2023-08-21', '2023-08-22', 'navid'),
(2, 'ca', 'asdas', NULL, '2024-01-11', '2024-01-12', 'navid');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) DEFAULT NULL,
  `privacy` varchar(100) NOT NULL DEFAULT 'private'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `slug`, `posted_by`, `date`, `username`, `privacy`) VALUES
(12, 'Enhance Your Teaching Efficiency with Our All-in-One Web Application', '<p>Introduction:</p><p>In today\'s fast-paced digital world, teachers face numerous challenges in managing their classes, students, payments, websites, and ensuring a smooth learning experience. Our all-in-one web application is designed specifically to address these challenges and empower teachers to become more efficient in their day-to-day tasks. In this blog post, we will explore the various features of our web application and how they can revolutionize the way teachers manage their teaching responsibilities.</p><p><br></p><p>1. Streamlined Class Management:</p><p>&nbsp; &nbsp;Our web application provides a centralized platform for teachers to manage their classes effortlessly. From creating class schedules to organizing lesson plans, our intuitive interface simplifies the process, saving valuable time and effort. Teachers can easily track attendance, grades, and assignments, enabling them to stay on top of their students\' progress and provide timely feedback.</p><p><br></p><p>1. Student Management Made Easy:</p><p>&nbsp; &nbsp;Keeping track of students\' information, performance, and progress can be a daunting task. Our web application offers comprehensive student management features, allowing teachers to maintain detailed profiles, monitor individual progress, and generate insightful reports. With just a few clicks, teachers can access crucial student data, enabling personalized instruction and fostering student success.</p><p><br></p><p>1. Hassle-Free Payment Management:</p><p>&nbsp; &nbsp;Handling payments can be a significant administrative burden for teachers. Our web application includes a user-friendly payment management system, streamlining the process of collecting fees and managing financial transactions. Teachers can generate invoices, track payments, and send automated reminders, ensuring a smooth and efficient payment workflow.</p><p><br></p><p>1. Empowering Website Management:</p><p>&nbsp; &nbsp;In today\'s digital era, having a professional and engaging website is essential for teachers. Our web application simplifies website management, allowing teachers to create and customize their websites without any technical knowledge. With a wide range of templates, themes, and content management tools, teachers can showcase their expertise, share resources, and communicate effectively with students and parents.</p><p><br></p><p>1. Student Dashboard for Enhanced Engagement:</p><p>&nbsp; &nbsp;Our web application includes a student dashboard feature, providing students with a personalized learning experience. Students can access course materials, submit assignments, track their progress, and communicate with teachers, fostering engagement and enabling self-paced learning. The student dashboard promotes collaboration, accountability, and empowers students to take ownership of their education.</p><p><br></p><p>Conclusion:</p><p>Our all-in-one web application is a game-changer for teachers, revolutionizing the way they manage their classes, students, payments, websites, and student engagement. By leveraging our intuitive and efficient features, teachers can streamline their administrative tasks, save time, and focus on what they do best: teaching. Embrace the power of our web application and experience a new level of efficiency in your teaching journey. Join our community of empowered teachers today and unlock your true potential in the classroom!</p>', 'enhance-your-teaching-efficiency-with-our-all-in-one-web-application', 'navid', '2023-09-15 12:50:59', NULL, 'site'),
(13, 'Introducing Our New Online Whiteboard Feature - Collaborative Learning at Your Fingertips!', '<p>We are thrilled to announce the latest addition to our web application - the Online Whiteboard feature! This powerful tool is designed to revolutionize the way teachers and students collaborate and engage in real-time. In this news post, we will dive into the details of this exciting feature and explore how it enhances the teaching and learning experience.</p><p><br></p><p>Interactive and Collaborative Learning:</p><p>The Online Whiteboard brings the traditional classroom whiteboard to the digital realm, offering an interactive and collaborative space for teachers and students. With its intuitive interface, users can draw, write, and annotate directly on the whiteboard using various tools such as pens, shapes, colors, and text. This feature promotes active participation, creativity, and problem-solving skills among students.</p><p><br></p><p>Real-Time Sharing and Collaboration:</p><p>The Online Whiteboard enables real-time sharing, allowing teachers to present concepts, explain complex ideas, and brainstorm with students regardless of their physical location. Teachers can share the whiteboard with students during live virtual classes or even outside class hours, fostering continuous learning and engagement. Students can actively participate by contributing their ideas, solving problems together, and receiving immediate feedback.</p><p><br></p><p>Versatile Teaching and Learning Opportunities:</p><p>The Online Whiteboard opens up a world of possibilities for teachers to create dynamic and engaging lessons. They can illustrate concepts, write equations, draw diagrams, and visualize content in a way that captures students\' attention and enhances comprehension. This feature is particularly beneficial for subjects like mathematics, science, art, and geography, where visual representation plays a crucial role in understanding complex topics.</p><p><br></p><p>Seamless Integration with Existing Tools:</p><p>Our Online Whiteboard seamlessly integrates with other features of our web application, creating a cohesive and efficient teaching environment. Teachers can easily import documents, presentations, or images onto the whiteboard, making it an all-in-one platform for lesson delivery. Additionally, teachers can save and share whiteboard sessions for future reference or for students who may have missed the live session.</p><p><br></p><p>Enhancing Student Engagement and Participation:</p><p>The interactive nature of the Online Whiteboard encourages active student participation. Students can join live sessions, interact with the whiteboard in real-time, ask questions, and collaborate with their peers. This feature promotes a sense of community, encourages critical thinking, and fosters student engagement, even in virtual or remote learning environments.</p><p><br></p><p>Conclusion:</p><p>With the introduction of the Online Whiteboard feature, our web application takes collaboration and engagement to new heights. By leveraging this innovative tool, teachers can create dynamic lessons, foster interactivity, and empower students to learn collaboratively. We believe that this feature will greatly enhance the teaching and learning experience, bringing a sense of connection and creativity to the virtual classroom. Stay ahead of the curve and explore the possibilities of our Online Whiteboard feature today! Upgrade your teaching and unlock a world of interactive learning experiences for you and your students.</p>  ', 'introducing-our-new-online-whiteboard-feature---collaborative-learning-at-your-fingertips', 'navid', '2023-10-07 07:45:03', NULL, 'private'),
(14, 'Empower Your Teaching Journey with Your Own Website, Admin Panel, and Student Dashboard!', '<p>We are excited to introduce our comprehensive service designed exclusively for teachers - a one-stop solution that provides you with your own website, an admin panel, and a student dashboard. With this powerful combination of tools, you can create a professional online presence, efficiently manage your teaching responsibilities, and foster student engagement like never before. In this news post, we will explore the features and benefits of this all-in-one service, and how it can revolutionize your teaching experience.</p><p><br></p><p>Your Professional Website:</p><p>Our service allows you to have your own personalized website that reflects your unique teaching style and expertise. With a variety of customizable templates and themes, you can create a professional online presence that showcases your qualifications, experience, and teaching philosophy. Your website becomes a hub for students, parents, and colleagues to access important information, resources, and updates.</p><p><br></p><p>Admin Panel for Efficient Management:</p><p>Managing various aspects of your teaching responsibilities can be a time-consuming task. Our service provides you with an intuitive admin panel, empowering you to efficiently handle administrative tasks such as class management, student records, scheduling, and communication. With a centralized platform, you can save valuable time and streamline your administrative processes, allowing you to focus on what you do best - teaching!</p><p><br></p><p>Student Dashboard for Enhanced Engagement:</p><p>The student dashboard feature enhances student engagement and creates an interactive learning environment. Students can access their personalized dashboards, where they can view upcoming assignments, access course materials, participate in discussions, and track their progress. The dashboard promotes self-paced learning, collaboration, and accountability, fostering a supportive and engaging educational experience.</p><p><br></p><p>Seamless Integration and Collaboration:</p><p>Our service seamlessly integrates your website, admin panel, and student dashboard, providing a cohesive and efficient teaching ecosystem. You can effortlessly share resources, announcements, and assignments with your students through your website and admin panel, ensuring clear communication and easy access to educational materials. This integrated approach simplifies your workflow and enhances collaboration among teachers, students, and parents.</p><p><br></p><p>Customization and Flexibility:</p><p>We understand that every teacher has unique needs and requirements. Our service offers extensive customization options, allowing you to tailor your website, admin panel, and student dashboard to suit your preferences. From branding and design elements to functionality and features, you have the flexibility to create an online environment that truly represents your teaching style and meets the specific needs of your students.</p><p><br></p><p>Conclusion:</p><p>With our all-in-one service providing you with your own website, an admin panel, and a student dashboard, you can take your teaching to new heights. Establish a professional online presence, efficiently manage your teaching responsibilities, and create an engaging learning experience for your students. This comprehensive service empowers you to focus on what matters most - delivering impactful education and fostering student success. Embrace the possibilities and unlock the full potential of your teaching journey with our integrated service today!</p> ', 'empower-your-teaching-journey-with-your-own-website-admin-panel-and-student-dashboard', 'navid', '2023-10-06 21:08:19', NULL, 'site'),
(15, 'The most important problem I have ever had', '<p><strong style=\"\"><sub><em><del>This is&nbsp;</del></em></sub></strong></p><p><strong><sub></sub></strong></p><p><a href=\"sasfasd\"></a></p><p xmlns=\"http://www.w3.org/1999/xhtml\"><a href=\"sasfasd\"><strong>a sample post which&nbsp;</strong></a></p><p>is very important.&nbsp;</p>      ', 'the-most-important-problem-i-have-ever-had', 'reza', '2023-09-15 13:49:29', NULL, 'teacher'),
(16, 'asffsfsdsfd', 'asfasfasasd', 'asffsfsdsfd', 'reza', '2023-09-15 13:34:00', NULL, 'all'),
(17, 'gnfgnfgfn', 'gfghgghf', 'gnfgnfgfn', 'reza', '2023-09-15 13:35:00', NULL, 'private');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_announcement`
--

CREATE TABLE `ttep_announcement` (
  `id_ttep_announcement` int(11) NOT NULL,
  `ttep_teacher_username` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttep_student_username` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `date` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci,
  `all_s` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ttep_announcement`
--

INSERT INTO `ttep_announcement` (`id_ttep_announcement`, `ttep_teacher_username`, `ttep_student_username`, `description`, `date`, `title`, `all_s`) VALUES
(1, 'navid', 'nn', ' hkjkjk', '2023-08-02', ' ghkhjj', 'no'),
(2, 'navid', 'ali', ' Please transfer the payment ASP', '2023-08-09', ' Payment due', 'no'),
(3, 'navid', 'reza', 'Study more  focus on Grammar', '2024-01-10', ' Notice', 'no'),
(4, 'navid', 'reza', ' asdasd', '2024-01-01', ' asdas', 'no'),
(5, 'navid', 'reza', ' asdasd', '', ' asdasas', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_city`
--

CREATE TABLE `ttep_city` (
  `id_ttep_city` int(11) NOT NULL,
  `city` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ttep_class_time`
--

CREATE TABLE `ttep_class_time` (
  `id_ttep_class_time` int(11) NOT NULL,
  `student` mediumtext COLLATE utf8mb4_unicode_ci,
  `ttep_teacher_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttep_day_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ttep_class_time`
--

INSERT INTO `ttep_class_time` (`id_ttep_class_time`, `student`, `ttep_teacher_username`, `ttep_day_time`) VALUES
(1, 'Ù†ÙˆÛŒØ¯ Ù†ØµØ±Ø§Ù„Ù‡ÛŒ Ø´Ù‡Ø±ÛŒ', 'navid', 'On Monday from  to '),
(2, 'Ù†ÙˆÛŒØ¯ Ù†ØµØ±Ø§Ù„Ù‡ÛŒ Ø´Ù‡Ø±ÛŒ', 'navid', 'On Thursday from 22:05 to 17:11'),
(3, 'Ù†ÙˆÛŒØ¯ Ù†ØµØ±Ø§Ù„Ù‡ÛŒ Ø´Ù‡Ø±ÛŒ', 'navid', 'On Sunday from  to '),
(4, 'Ù†ÙˆÛŒØ¯ Ù†ØµØ±Ø§Ù„Ù‡ÛŒ Ø´Ù‡Ø±ÛŒ', 'navid', 'On Monday from  to ');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_community`
--

CREATE TABLE `ttep_community` (
  `id_ttep_community` int(11) NOT NULL,
  `community` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ttep_education`
--

CREATE TABLE `ttep_education` (
  `id_ttep_education` int(11) NOT NULL,
  `date` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `major` longtext COLLATE utf8mb4_unicode_ci,
  `ttep_teacher_username` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ttep_education`
--

INSERT INTO `ttep_education` (`id_ttep_education`, `date`, `institute`, `degree`, `major`, `ttep_teacher_username`) VALUES
(2, '2023-08-08', ' Ferdowsi university', ' Masaters degree', 'TEFL', 'navid'),
(3, '2024-01-04', ' sfdsd 3244', ' ds', ' ewrtw4', 'navid');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_experience`
--

CREATE TABLE `ttep_experience` (
  `id_ttep_experience` int(11) NOT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttep_teacher_username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ttep_experience`
--

INSERT INTO `ttep_experience` (`id_ttep_experience`, `date`, `title`, `description`, `subtitle`, `ttep_teacher_username`) VALUES
(2, '2023-08-02', ' Teacher trainer', ' Advanced levels', ' Kish inst', 'navid'),
(3, '2024-01-04', ' 3sfdsfd', ' dvsfd', ' asdas', 'navid');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_gender`
--

CREATE TABLE `ttep_gender` (
  `id_ttep_gender` int(11) NOT NULL,
  `gender` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ttep_location`
--

CREATE TABLE `ttep_location` (
  `id_ttep_location` int(11) NOT NULL,
  `id_ttep_teacher` int(11) DEFAULT NULL,
  `address` longtext,
  `place_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ttep_messages`
--

CREATE TABLE `ttep_messages` (
  `id` int(11) NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `readstatus` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ttep_messages`
--

INSERT INTO `ttep_messages` (`id`, `receiver`, `sender`, `message`, `readstatus`) VALUES
(30, 'Gholi -message from site visitor - contact: 0932000399', 'navid', 'xc', '1'),
(33, 'navid', 'navid', 'jnjjk', '0'),
(35, 'navid', 'Navid', 'xx', '0'),
(36, 'navid', 'Navid', 'njjnjn', '0'),
(37, 'navid', 'navid', 'domain request: jnjjk', '0'),
(38, 'navid', 'navid', 'domain request: . domain request: xxx', '0'),
(39, 'navid', 'navid', 'domain request: lklkl', '0'),
(40, 'navid', 'navid', 'domain request: xxc', '0'),
(42, 'navid', 'navid', ' nmmj', '0'),
(43, 'navid', 'Helia Rezvanzadeh -message from site visitor - contact: 099999', 'I love you', '0'),
(44, 'navid', 'MUHAMMAD', 'domain request: masood', '0'),
(45, 'navid', 'MUHAMMAD', 'domain request: masood', '0'),
(47, 'MUHAMMAD', 'Ghl -message from site visitor - contact: 093888883', 'boto ', '1'),
(48, '', 'sadaasdas', 'asdasd', '1'),
(49, '', 'ssaasd', 'asd', '1'),
(50, 'navid', 'ssnavid.nasrollahi@yahoo.com', 'jnjjk', '0'),
(51, 'navid', 'ss contact: navid.nasrollahi@yahoo.com', 'jnjjk', '0'),
(52, 'navid', 'ss contact: ss', 'ss', '1'),
(53, 'navid', 'ff contact: dd', 'dd', '0'),
(54, 'navid', 'ffsa contact: ddsa', 'ddsa', '0'),
(56, 'navid', 'sfasd contact: asas', 'asdasdas', '0'),
(57, 'navid', 'Leonardo Da Costa contact: hello@chatgptpromptpacks.net', 'Hello there\r\n\r\nWere delighted to share our free book The Ultimate ChatGPT-4 Training Guide Its packed with insights on leveraging AI for impactful discussions\r\n\r\nBenefit Once you download the e-book youll also get ChatGPT prompts once a week for 4 weeks These prompts have been meticulously curated by our experts and will certainly act as an outstanding companion to your e-book\r\n\r\nhttpschatgptpromptpacksnetfree-chatgpt-4-ebook\r\n\r\nAnd for those prepared to elevate their game our special ChatGPT prompt packs await Handcrafted for specific niches these packs redefine content production putting you miles ahead of the competitors Take action towards success Grab a prompt pack today\r\n\r\nhttpschatgptpromptpacksnetprompt-packs\r\n\r\nBest regards\r\n\r\nLeonardo\r\nCEO\r\nChatGPT Prompt Packs\r\n\r\nWe respect your right to say no\r\nIf you want us to stop using your contact form you can opt out right here\r\nhttpscontactwebsitesnetchatgptpromptpacks', '0'),
(58, 'navid', 'Navid contact: 09395095857', '12345', '0'),
(59, 'Navid contact: 09395095857', 'navid', 'Kii', '1'),
(60, 'navid', 'navid', 'domain request: ', '1'),
(61, 'navid', 'Hayden Santoro contact: santoro.hayden@gmail.com', 'Hey do you want teacherstribenet on the Google Play Store\r\n\r\nWe dont charge thousands of dollars to get you listed\r\n\r\nWe have a promo running where we turn your entire website into an Android App\r\n\r\nFor wait for it 129\r\n\r\nSign up here\r\n\r\nhttpsformsgleF4G8gJsdEqnh1amh9', '0'),
(62, 'navid', 'Modesto Titus contact: titus.modesto@hotmail.com', 'Its finally possible to get top quality buyer clicks for just mere pennies\r\n\r\nWe have a large network of global traffic in each country and we are looking to distribute that traffic\r\n\r\nVisit us here awolfservicescom to find out more', '1'),
(63, 'navid', 'Melva Nicholson contact: melva.nicholson78@gmail.com', 'Hello\r\n\r\nWe noticed teacherstribenet is only listed in 8 out of 2500 directories\r\n\r\nThis severly impacts your backlinks and search engine rankings\r\n\r\nCome get listed in all 2500 directories on DirectoryBumpcom', '1'),
(64, 'navid', 'Felica Dodery contact: dodery.felica@googlemail.com', 'Is this your website teacherstribenet I just sent you a message via the contact form on your site and was wondering if you wanted to try some unique advertising that reaches business owners worldwide How do we do it Well you just witnessed our process We send your ad text to contact forms on websites worldwide Plans start at a hundred dollars for posting your ad to one million sites Reach out to me via Email and lets dicuss what we can do for your business My Skype ID is  livecid303294bd15a81bc7', '0'),
(65, 'navid', 'Gino Scroggins contact: gino.scroggins@gmail.com', 'If youre reading this message right now then you have just proved that contact form advertising works I can advertise your product or service to millions for just a few hundred bucks Skype me for info contactformmarketing2023', '1'),
(66, 'navid', '9.01hekja3c26ry5fq295zm9ayzt@mail5u.xyz contact: 9.01hekja3c26ry5fq295zm9ayzt@mail5u.xyz', '901hekja3c26ry5fq295zm9ayztmail5uxyz', '1'),
(67, 'navid', 'mDIjiSmJedERyifaqTWSYL contact: DfujFE.tqbjtjp@monochord.xyz', '54', '1'),
(68, 'navid', 'Collette Kuefer contact: collette.kuefer@msn.com', 'You dont have to spend a dime on advertising to get more customers Check Out httpCollettetg4xyz', '1'),
(69, 'navid', 'Joie Nickson contact: joie.nickson99@gmail.com', 'Do you do contact form blasts I have a list of over 30 million website contact forms for sale all fully tested with gsa and confirmed working Dont do any blasts Why not I can either provide the service for you or show you how to do it and where to buy the best software for doing this Shoot me an email or Skype me at my contact info below\r\n\r\nP Stewart\r\nSkype livecide169e59bb6e6d159\r\nEmail ps1131 Cegomail2xyz', '1'),
(70, 'navid', 'wmltus contact: wmltu2oo@catcasinostyle.ru', '', '1'),
(71, 'navid', 'wmltus contact: wmltu2oo@catcasinostyle.ru', '', '1'),
(72, 'navid', 'Guest Posting Service at a Premium Level contact: beaulieu.valentin80@gmail.com', 'Is your business set to soar to unprecedented heights in the digital realm Your exploration ends here Introducing our Exclusive Guest Posting Services  your ticket to a virtual journey that will revolutionize your brand into a powerful force\r\n\r\n Unearth Your New Possibilities  httpstinyurlcomaicopify\r\n\r\nHeres why opting for our service guarantees your complete satisfaction\r\n\r\n- High-Grade Backlinks Gain access to an extensive network of 30611 websites providing top-notch backlinks that can elevate your websites search engine ranking These arent just links they are powerful endorsements from reputable sites with authentic traffic and credibility\r\n  \r\n- Satisfaction Guarantee We are so confident in our service that we offer a singular satisfaction guarantee You only pay when you are thoroughly content with the results Your happiness is our utmost priority and we are committed to keeping our promises\r\n\r\n- Drive More Traffic Leads and Sales Placing your content on contextual websites is the key to reaching your target audience attracting dedicated customers and boosting your sales Its a foolproof strategy to ensure the prosperity of your business\r\n\r\n- Affordable Marketing Solution Guest blogging is not only highly effective but also budget-friendly It serves as a cost-effective alternative to traditional paid advertising methods Save money while unlocking extraordinary outcomes for your business\r\n\r\n- Conquer the Search Engine Rankings Observe your website ascend on Google as you secure top-notch backlinks from trusted websites Watch your website climb the search engine rankings and gain the exposure youve always envisioned\r\n\r\nDont miss out on this fantastic opportunity to overhaul your online presence and reap the advantages that come with it Our Top-Tier Guest Blogging Solutions will showcase your business and the optimal part is it starts at just 399 Take the initial step toward online triumph today\r\n\r\nTo get started or learn more simply click here  httpstinyurlcomaicopify', '1'),
(73, 'navid', 'wmltus contact: wmltu2oo@catcasinostyle.ru', '', '1'),
(74, 'navid', 'Amber Eisenhower contact: amber.eisenhower@gmail.com', 'Hi \r\n\r\nWe want to know if your company is still open because we ran a backlink report and found your website is not listed in many directories\r\n\r\nWe have a black friday deal going on at the moment to get your website listed for 1995\r\n\r\nVisit us on DirectoryBumpcom', '1'),
(75, 'navid', 'wmltus contact: wmltu2oo@catcasinostyle.ru', '', '1'),
(76, 'navid', 'Andrea Thompkins contact: andreat1989@gmail.com', 'the macbook i bought from your amazon store is not working this model httpsamznto49whgF0\r\n\r\namazon said to contact you directly for tech support or returns \r\n\r\nthis was purchased as a gift plz get back to me asap\r\n\r\nthanks andrea ', '1'),
(77, 'navid', 'FICEpHEtySVqRXyvXfkKxkSIfWQ contact: LyAtXH.qhwhhtm@scranch.shop', '54', '1'),
(78, 'navid', 'Steve Bourassa contact: steve82991@gmail.com', ' Im really frustrated with the laptop I ordered from your Amazon store Its not functioning at all Heres the model Im talking about httpsamznto46pmr71 Amazon directed me to you for any technical help or return issues This was a gift and its really important I get this sorted quickly Please respond soon - Steve ', '1'),
(79, 'navid', 'wmltus contact: wmltu2oo@catcasinostyle.ru', '', '1'),
(80, 'navid', 'wmltus contact: wmltu2oo@catcasinostyle.ru', '', '1'),
(81, 'navid', 'wmltus contact: wmltu2oo@catcasinostyle.ru', '', '1'),
(82, 'navid', 'Thorsten Barry contact: barry.thorsten@gmail.com', 'Do you do contact form blasts I have a list of over 30 million website contact forms for sale all fully tested with gsa and confirmed working Dont do any blasts Why not I can either provide the service for you or show you how to do it and where to buy the best software for doing this Shoot me an email or Skype me at my contact info below\r\n\r\nP Stewart\r\nSkype livecide169e59bb6e6d159\r\nEmail ps2283gomail2xyz', '0'),
(83, 'navid', 'Octavia Mckinney contact: QrLAFh.mdpdcd@sandcress.xyz', '19', '1'),
(84, 'navid', 'Andrea Mello contact: sheila.%rnd.lname%@gmail.com', 'am i ever going to get any support here you dont answer phones or emails im going to just file a chargeback if you cant get back to me\r\n\r\nyou guys are listed as support on this amazon listing httpsamznto49whgF0 - please get back to me asap\r\n\r\n-andrea', '0'),
(85, 'navid', 'Verna Brier contact: brier.verna@hotmail.com', 'Do you do contact form blasts I have a list of over 30 million website contact forms for sale all fully tested with gsa and confirmed working Dont do any blasts Why not I can either provide the service for you or show you how to do it and where to buy the best software for doing this Shoot me an email or Skype me at my contact info below\r\n\r\nP Stewart\r\nSkype livecide169e59bb6e6d159\r\nEmail ps37120gomail2xyz', '0'),
(86, 'navid', 'wmltus contact: wmltu2oo@catcasinostyle.ru', '', '1'),
(87, 'navid', 'Ulysses Varghese contact: varghese.ulysses71@msn.com', '\r\nAutoblogging Pro has Arrived and now makes creating Blog Content for your site teacherstribenet is easier than ever and affordable\r\n\r\nAutoblogging Pro combined with ChatGPT API can create a range of content based on your specifications and usig their WorPress plugin \r\nautomatically uploads the new article complete with image ready to edit an go live quicklly\r\nWordPress Not Required Articles can be downloaded from AutobloggingPro\r\n\r\nChat GPT API Key also NOT Required Now\r\n\r\nAutoblogging Pro now offers Top Up with integrated API\r\n\r\nIn todays competive SEO markets blogs drive ranking and traffic Even small local business dominate search results by having blogs on the topics of their services\r\n\r\nThats why blooging is so important but now you can automate high quailty aritcles without the skills needed to write creatively\r\n\r\nGoogle is a Fat Cat and hungrry for new content Thats why Autoblooging Pro is so effective\r\n\r\nKeep your content growing and active with Autoblogging Pro\r\n\r\nAutoblogging Pro offers a variety of packages to suit your needs or use Top Up for just micro pennies to generate the content your website needs\r\n\r\nLIFETIME FREE   -  FREE- 4 Articles permonth\r\nBASIC PLAN          29 - 70 Articles permonth\r\nPRO PLAN             49 - 135 Articles permonth\r\nPRO PLUS PLAN    89 - 135290\r\n\r\nbitly3NHFSSy\r\n\r\nBuild Your Ad Revenues and SEO Market Share with Autoblooging Pro\r\n\r\nSet Up is Fast an Easy with Great Technical Support\r\n\r\nTry it FREE\r\n', '1'),
(88, 'navid', 'Kristine Sellwood contact: kristine.sellwood@seo-depot.email', 'Dear Sir\r\n\r\nIm an SEO specialist at SEO Depot and we provide the Highest Quality AI powered Backlinking that builds expanded keyword ranking to your site \r\nOur unique approach to analyzing your market share and eco system your site competes in and inflate that process providing powerful increases in SEO\r\nwhile providing greater stability against Googles constant algorithm changes with quicker rebound times\r\n\r\nWe provide SEO training and advice tailored to your websites SEO needs\r\n\r\nSEO Depot\r\nhttpsseo-depotcomoffer\r\n\r\nWe  also offer website audits for a technical analysis of your site and customized SEO best coaching practices for your site and more so you can maximize SEO results\r\n\r\nOur services work for the local SEO business to Global SEO Requirements inflating websites precedence and responses to searches more broadly\r\nand with greater performance\r\n\r\nExperience a new approach to SEO\r\n\r\nLet us show you what we can do for your businesss website promotion Request a Free SEO Audit\r\n\r\nHope you find this useful\r\n\r\nRay\r\n', '0'),
(89, 'navid', 'wmltus contact: wmltu2oo@catcasinostyle.ru', '', '1'),
(90, 'navid', 'Kandice Balcombe contact: kandice.balcombe@yahoo.com', 'If your company uses promotional products I have awesome products that your marketing team should know about Shoot me an email or Skype me at my contact info below\r\nMember PPAI  Promotional Products Association International\r\n\r\n \r\n\r\nStuFeldman\r\nEmail salespromoblvdcom\r\n\r\ntext 661-702-9030\r\n\r\nSkype livestu816', '1'),
(91, 'navid', 'Jensen Owens contact: xlIoOV.qhtwcww@wisefoot.club', '38', '1'),
(92, 'navid', 'Jonna Lim contact: lim.jonna87@outlook.com', 'With keyword targeted PPV ads I can get you qualified website visitors for less than a penny per click This method works for both local and online businesses Very easy to get started Just sign up give me your website and Ill provide the traffic\r\n\r\nFor details shoot me an email or Skype me at my contact info below\r\n\r\nP Stewart\r\nSkype livecidad0ee8f191cd36b4\r\nEmail ps55596gomail2xyz', '1'),
(93, 'navid', 'Wesley Sims contact: wesley.sims@outlook.com', 'I now offer contact form blasting service With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide Prices start at just 50 to reach 500000 bulk sites Contact me at my email or skype below for details\r\n\r\nP Stewart\r\nSkype livecide169e59bb6e6d159\r\nEmail ps2426gomail2xyz', '1'),
(94, 'navid', 'wmeesus contact: wmlsuwo@catcasinostyle.ru', '', '0'),
(95, 'navid', 'Ingrid Leary contact: ingrid.leary@yahoo.com', 'Hey online entrepreneur\r\n\r\nWhat if you can generate 1000s\r\nof leads everyday  PAMPER them \r\nto sales without actually talking\r\nto them\r\n\r\nSimultaneously talk to 1000s \r\nof them understand their queries \r\nmake them feel special  most \r\nimportantly close sales 24x7 \r\nwithout actually being present\r\n\r\nhttpschidwacomklever\r\n\r\nThis brand new app combined \r\nthe 2 MOST POWERFUL platforms\r\non the internet today - ChatGPT4 \r\n Whatsapp and created a monster\r\n\r\nCollect leads follow up answer \r\nqueries and close sales on autopilot \r\n- with minimum effort  no risk\r\n\r\nhttpschidwacomklever\r\n\r\n-no more wasting time or money \r\n-no need to hire a team \r\n-no more struggling to get sales \r\n-get results 24x7 even when you sleep \r\n\r\nHurry This amazing app is available \r\nfor a limited period of time - and its \r\na one-time offer \r\n\r\nAfter the launch it will be turning \r\ninto monthly subscription model \r\n\r\n Get your copy and \r\nstart getting results NOW \r\n\r\nhttpschidwacomklever\r\n\r\nHave a great day\r\nTake care', '0'),
(96, 'navid', 'wmeesus contact: wmlsuwo@catcasinostyle.ru', '', '1'),
(97, 'navid', 'Ryker Rhodes contact: iEBLVf.hpbhpjh@bakling.click', '18', '0'),
(98, 'navid', 'Phil Stewart contact: noreplyhere@aol.com', 'I now offer contact form blasting service With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide Prices start at just 50 to reach 500000 bulk sites Contact me at my email or skype below for details\r\n\r\nP Stewart\r\nSkype livecide169e59bb6e6d159\r\nEmail ps37706-036gomail2xyz', '0'),
(99, 'navid', 'wmeesus contact: wmlsuwo@catcasinostyle.ru', '', '1'),
(100, 'navid', 'Myla Elliott contact: JtHHqw.bbjhbbw@paravane.biz', '42', '1'),
(101, 'navid', 'Dick Brumbaugh contact: dick.brumbaugh@yahoo.com', 'Boost your websites visibility with our classified ad blasting service Well promote your links on 2000 classified ad pages 500 blogs and 150 social sites in the US and Canada Our manual submission ensures targeted exposure and you can track and optimize your ads performance Reach a broader audience and enhance your websites SEO today\r\n\r\nFor details shoot me an email or Skype me at my contact info below\r\n\r\nP Stewart\r\nSkype livecidad0ee8f191cd36b4\r\nEmail psN9a 1h9gomail2xyz\r\n', '1'),
(102, 'navid', 'Louisa McCorkle contact: louisa.mccorkle@yahoo.com', 'Dont pay full retail price for Microsoft McAfee AVG Kaspersky AutoCAD and VMware licenses We offer 100 genuine licences at a fraction of the retail price Check out httpssistemasrjdcom', '0'),
(103, 'navid', 'Phil Stewart contact: noreplyhere@aol.com', 'I now offer contact form blasting service With my DFY service you can either do a targeted blast to only websites that match your criteria or bulk blast large volumes of sites worldwide Prices start at just 50 to reach 500000 bulk sites Contact me at my email or skype below for details\r\n\r\nP Stewart\r\nSkype livecide169e59bb6e6d159\r\nEmail ps85378gomail2xyz', '1'),
(104, 'muhammad', 'navid', 'hi there\r\n', '1'),
(105, 'navid', 'navid', 'go to hell', '0'),
(106, 'navid', 'navid', 'where are yhou', '0'),
(107, 'navid', 'Mikayla Virgo contact: mikayla.virgo@gmail.com', 'Who is 4U2 Inc Visit our website at 4u2inccom  Suppliers Manufacturers Wholesalers Re Sellers etc Increase your Gross Sales BIG TIME PurchasersBuyers Save Time  Money Account ExecutiveSales People FullPart Time Recruit Suppliers PurchasersBuyers other Account Executives Sales people Potential Team Leaders and work from home Earn up to 60000 - USD  Questions Visit our website at 4u2inccom or contact us via email 4u2inc123gmailcom', '1'),
(108, 'navid', 'Tammi Forde contact: tammi.forde@googlemail.com', 'Hey\r\n\r\nI found this AI Video Bundle and its incredible  it has all the tools and courses you could want Its perfect for us video buffs Check it out httpswwwsocialsurgeairecommendsai-video-bundle-3\r\n\r\nI instantly had the thought of you guys at teacherstribenet as soon as I saw this', '1'),
(109, 'navid', 'Phil Stewart contact: noreplyhere@aol.com', 'The same way I just sent you this message I can also post your ad message to millions of sites Dont worry it doesnt cost much Hit me up via email or skype for details\r\n\r\n\r\nP Stewart\r\nSkype livecide169e59bb6e6d159\r\nEmail ps155gomail2xyz', '1'),
(110, 'navid', 'Forest Weeks contact: weeks.forest@yahoo.com', 'Hello\r\n\r\nIf you ever need Negative SEO or a de-rank strategy you can hire us here\r\n\r\nhttpswwwspeed-seonetproductnegative-seo-service\r\n\r\n', '1'),
(111, 'navid', 'Abi contact: contentwriting011994@outlook.com', 'Hello\r\n\r\nIm Abi an English SEO copywriter and content writer I excel in crafting blogs articles e-commerce product descriptions SEO content website content business service descriptions newsletter content brochures proofreading social media captions LinkedIn content and SOPs\r\n\r\nMy rate is USD 20 for every 1000 words of content If you dont have time to plan out your content we can help you with that \r\n\r\nFeel free to email me at Contentwriting011994outlookcom with any current requirements\r\n\r\nThanks\r\n\r\nAbi\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '1'),
(112, 'navid', 'Muriel McWilliam contact: mcwilliam.muriel@googlemail.com', 'START YOUR DAY is a daily newsletter that shows you easy ways to make money gives you ideas to easily learn new skills as well as giving you helpful ways to lose weight and just about anything else you can think of - DAILY\r\n\r\nLEARN MORE httpsStartYourDayIdeascom', '1'),
(113, 'navid', 'Stephanie Oaks contact: hello@socialbusybee.com', 'Hey Im Natalie from Social Busy Bee here Ive discovered a revolutionary tool for Instagram growth and just had to share it with you\r\n\r\nSocial Growth Engine introduces an extraordinary tool that skyrockets Instagram engagement Its easy\r\n- Focus on producing incredible content\r\n- Affordable at just below 36month\r\n- Secure effective and compliant with Instagram\r\n\r\nWitnessing fantastic results and I know you will too Upgrade your Instagram game right away httpgetsocialbuzzzycominstagrambooster\r\n\r\nBest wishes your success\r\nYour friend Natalie\r\n', '1'),
(114, 'navid', 'Valentin Coppin contact: coppin.valentin@gmail.com', 'Imagine running a 7-figure business through smart email marketing This guide I found makes it a reality Dive inhttpsbitly424kH2q\r\n\r\nI know that this app will be  priceless for teacherstribenet\r\n\r\nHeres to a bright year full of growth\r\n\r\nCheers\r\nValentin', '1'),
(115, 'navid', 'Glory Junkins contact: glory.junkins@yahoo.com', 'Resell rights included AI Commissions 2024 offers a fast track to AI profits Dont miss out visit httpswwwsocialsurgeairecommendsmaking-money-with-ai-2024\r\n\r\nStay ahead of the curve at  teacherstribenet\r\n\r\n- Glory', '1'),
(116, 'navid', 'Charlotte Hetherington contact: charlotte.hetherington56@hotmail.com', 'This message got to you and I can help you get your ad message to millions of websites just like this Its a bargain compared to regular advertisingIf you are interested you can reach me via email or skype below\r\n\r\nP Stewart\r\nEmail z6v8lqgomail2xyz\r\nSkype livecid37ffc6c14225a4a8', '1'),
(117, 'navid', 'Shelia Duncombe contact: shelia.duncombe@icloud.com', 'Heres a way to maximize your business profits with minimal effort This guide focuses on strategic email marketing Get the detailshttpsbitly48K97Mr\r\n\r\nI know that this book will be invaluable to teacherstribenet\r\n\r\nLet me know if you check it out\r\n\r\nCheers\r\nShelia', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_premium`
--

CREATE TABLE `ttep_premium` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `trans_id` int(30) NOT NULL,
  `id_get` int(30) NOT NULL,
  `plan` varchar(50) COLLATE utf8mb4_bin DEFAULT 'a'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `ttep_premium`
--

INSERT INTO `ttep_premium` (`id`, `username`, `trans_id`, `id_get`, `plan`) VALUES
(1, 'navid', 18524275, 18518573, 'a'),
(2, 'navid', 18524275, 18518573, 'a'),
(3, 'navid', 18524275, 18518573, 'a'),
(4, 'navid', 12, 2, 'a'),
(5, 'navid', 12, 2, 'a'),
(6, 'navid', 12, 2, 'a'),
(7, 'navid', 1, 2, 'a'),
(8, 'navid', 1, 2, 'a'),
(9, 'navid', 1, 2, 'a'),
(10, 'navid', 1, 2, 'a'),
(11, 'navid', 1, 2, 'a'),
(12, 'navid', 1, 2, 'a'),
(13, 'navid', 1, 2, 'a'),
(14, 'navid', 1, 2, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_project`
--

CREATE TABLE `ttep_project` (
  `id_ttep_projects` int(11) NOT NULL,
  `title` longtext,
  `detail` longtext,
  `ttep_teacher_username` varchar(255) NOT NULL,
  `time` varchar(45) DEFAULT NULL,
  `importance` varchar(45) DEFAULT NULL,
  `required` longtext,
  `progress` int(100) NOT NULL DEFAULT '10',
  `extra_information` longtext,
  `short_long` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ttep_project`
--

INSERT INTO `ttep_project` (`id_ttep_projects`, `title`, `detail`, `ttep_teacher_username`, `time`, `importance`, `required`, `progress`, `extra_information`, `short_long`) VALUES
(4, 'Finish reading the BOOK', 'midnight library', 'navid', ' to ', 'Trivial', '10 minutes a day', 83, 'go for it', 'Long term'),
(5, 'Practice French', ' Every day I need to practice more ', 'MUHAMMAD', '2023-08-30 to 2023-08-26', 'It is needed to be done in due time', ' Grammar for french book French with Vincent youtube ', 62, 'It should happen everyday', 'Long term');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_reminder`
--

CREATE TABLE `ttep_reminder` (
  `id_ttep_reminder` int(11) NOT NULL,
  `ttep_teacher_username` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `title` longtext,
  `done` varchar(45) DEFAULT NULL,
  `detail` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ttep_reminder`
--

INSERT INTO `ttep_reminder` (`id_ttep_reminder`, `ttep_teacher_username`, `date`, `title`, `done`, `detail`) VALUES
(1, 'navid', '2023-08-18', 'Pleasecallreza', NULL, 'hisnumbersis23212312312'),
(2, 'navid', '2024-01-05', 'please remember', NULL, 'It i good to kniw');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_session`
--

CREATE TABLE `ttep_session` (
  `id_ttep_session` int(11) NOT NULL,
  `id_ttep_student` int(11) NOT NULL,
  `ttep_teacher_username` varchar(100) NOT NULL,
  `time` varchar(450) DEFAULT NULL,
  `location` varchar(70) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `assignment` varchar(650) DEFAULT NULL,
  `extra_information` varchar(450) DEFAULT NULL,
  `day` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ttep_session`
--

INSERT INTO `ttep_session` (`id_ttep_session`, `id_ttep_student`, `ttep_teacher_username`, `time`, `location`, `date`, `assignment`, `extra_information`, `day`) VALUES
(3, 6, 'navid', '19:12 to 21:10', 'MCI', '', 'Page 54 mindset 2', '', 'Sundays'),
(4, 8, 'MUHAMMAD', '20:28 to 18:31', 'MCIc', '2023-09-06', 'Page 54 mindset 2', 'Not cool today', 'Wednesdays');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_student`
--

CREATE TABLE `ttep_student` (
  `id_ttep_student` int(11) NOT NULL,
  `ttep_teacher_username` varchar(100) NOT NULL,
  `purpose` varchar(200) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `firstname` varchar(450) DEFAULT NULL,
  `lastname` varchar(450) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `needed_sessions` varchar(20) DEFAULT NULL,
  `extra_information` varchar(450) DEFAULT NULL,
  `start_date` varchar(45) DEFAULT NULL,
  `books` varchar(450) DEFAULT NULL,
  `extra1` varchar(45) DEFAULT NULL,
  `base_pay` varchar(45) DEFAULT NULL,
  `day` varchar(450) DEFAULT NULL,
  `extra2` varchar(45) DEFAULT NULL,
  `mobile_number` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL,
  `st_username` varchar(100) DEFAULT NULL,
  `st_password` varchar(45) DEFAULT NULL,
  `material` varchar(800) DEFAULT NULL,
  `link1` varchar(450) DEFAULT NULL,
  `link2` varchar(450) DEFAULT NULL,
  `link3` varchar(450) DEFAULT NULL,
  `link4` varchar(450) DEFAULT NULL,
  `focus1` varchar(450) DEFAULT NULL,
  `focus2` varchar(450) DEFAULT NULL,
  `focus3` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ttep_student`
--

INSERT INTO `ttep_student` (`id_ttep_student`, `ttep_teacher_username`, `purpose`, `time`, `firstname`, `lastname`, `age`, `needed_sessions`, `extra_information`, `start_date`, `books`, `extra1`, `base_pay`, `day`, `extra2`, `mobile_number`, `email`, `active`, `st_username`, `st_password`, `material`, `link1`, `link2`, `link3`, `link4`, `focus1`, `focus2`, `focus3`) VALUES
(1, 'navid', 'IELTS 6.5 or 7', '', 'Ù†ÙˆÛŒØ¯', 'Ù†ØµØ±Ø§Ù„Ù‡ÛŒ Ø´Ù‡Ø±ÛŒ', '11', '3', 'asdasd', '22323', 'book', NULL, '', '', NULL, '09395095856', 'navid.nasrollahi@yahoo.com', NULL, 'nn', 'nn', '', '', '', '', '', '', '', ''),
(4, 'navid', 'WritingandSpeaking', '', 'Reza', 'Ahmadi', '44', '5', '', '20/20/23', 'Materials', NULL, '', '', NULL, '09395095856', 'navid.nasrollahi@yahoo.com', NULL, 'reza', 'reza', 'FactsandfiguresIeltsFoundationslevel1Essentialgrammar', 'wwww.google.com', 'www.mail.yahoo.com', 'www.interesting.com', '', 'IELTS', 'IELTS', 'IELTS'),
(5, 'navid', 'WritingandSpeaking', '', 'Ali', 'Gona', '44', '5', 'assholess', '20/20/23', 'Materials', NULL, '', '', NULL, '09395095856', 'navid.nasrollahi@yahoo.com', NULL, 'ali', 'ali', 'Facts and figures Ielts Foundations level1  Essential grammar', 'wwww.google.com', 'www.mail.yahoo.com', '', '', 'Writing', 'Writing', 'Writing'),
(6, 'navid', 'GeneralwritingIELTS8', NULL, 'Gholi', 'nOr', '44', '5', 'ee', '20/20/23', 'Materials', NULL, '22222', NULL, NULL, '09395095856', 'navid.nasrollahi@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'navid', '', NULL, 'Ù†ÙˆÛŒØ¯', 'Ù†ØµØ±Ø§Ù„Ù‡ÛŒ Ø´Ù‡Ø±ÛŒ', '', '', '', '2023-08-17', '', NULL, '', NULL, NULL, '09395095856', 'navid.nasrollahi@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'MUHAMMAD', 'IELTS 65 or 7', '', 'Reza', 'Asgharlu', '11', '2', 'Not cool', '2023-08-25', 'Facts and Figures', NULL, '200', '', NULL, '09395095856', 'navid.nasrollahi@yahoo.com', NULL, 'reza12', 'reza12', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_student_announcement`
--

CREATE TABLE `ttep_student_announcement` (
  `id_ttep_student_announcement` int(11) NOT NULL,
  `id_ttep_student` int(11) DEFAULT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ttep_student_assignment`
--

CREATE TABLE `ttep_student_assignment` (
  `id_ttep_student_assignment` int(11) NOT NULL,
  `id_student` int(11) DEFAULT NULL,
  `assignment_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment description` longtext COLLATE utf8mb4_unicode_ci,
  `date` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ttep_teacher`
--

CREATE TABLE `ttep_teacher` (
  `id_ttep_teacher` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `expertise` longtext,
  `email` varchar(100) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address_country` varchar(45) DEFAULT NULL,
  `address_address` longtext,
  `signiture` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `website` varchar(45) DEFAULT NULL,
  `contact_number` varchar(45) DEFAULT NULL,
  `id_ttep_community` int(11) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `image_path` longtext,
  `nativelang` varchar(45) DEFAULT NULL,
  `teachlang` varchar(45) DEFAULT NULL,
  `status` longtext,
  `days_left` varchar(45) DEFAULT '15',
  `sitetitle` varchar(100) DEFAULT NULL,
  `about_me` longtext,
  `duration` varchar(45) DEFAULT NULL,
  `hobby` longtext,
  `interest_1` varchar(100) DEFAULT NULL,
  `interest_2` varchar(100) DEFAULT NULL,
  `born` varchar(45) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `skill_1` varchar(255) DEFAULT NULL,
  `skill_2` varchar(255) DEFAULT NULL,
  `skill_3` varchar(255) DEFAULT NULL,
  `currency` varchar(100) DEFAULT 'Thousand Tomans',
  `create_date` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ttep_teacher`
--

INSERT INTO `ttep_teacher` (`id_ttep_teacher`, `firstname`, `lastname`, `age`, `expertise`, `email`, `city`, `address_country`, `address_address`, `signiture`, `username`, `website`, `contact_number`, `id_ttep_community`, `gender`, `password`, `image_path`, `nativelang`, `teachlang`, `status`, `days_left`, `sitetitle`, `about_me`, `duration`, `hobby`, `interest_1`, `interest_2`, `born`, `instagram`, `linkedin`, `facebook`, `twitter`, `skill_1`, `skill_2`, `skill_3`, `currency`, `create_date`) VALUES
(77, 'Nassvid', 'Nasrssollahi', 32, 'Exam preperation General Writing Speaking Teacher Training Reading Listening Specific purposes Specific purposes', 'navid.nasrollahssi@yahoo.com', 'Mashxad', 'Irxan', 'Shariati xblvd.', 'Admin', 'navid', 'http://navid1233.teacherstribe.net/', '0932295095856', NULL, 'male', '1234', 'images/937056.jpg', 'Persian', 'English', 'It is today', '-20', 'The professional page of Navid Nasrollahis', 'I am a huge fan of improvement.', NULL, 'I work', 'Music', 'Football', '1991-03-08', '', '', '', '', 'Programming', 'Teaching ', 'Research', 'Thousand Tomans', '2023-12-09 20:30:00.000000'),
(78, 'digitus', 'digitusHL', 41, 'Specific purposes', 'digitu2oo@gadania.site', 'New York', 'New York', 'New York', '', 'digitus', 'https://digitabs.wmlogs.com', NULL, NULL, NULL, '55xz3uSox1I', NULL, 'French', 'Doutch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Thousand Tomans', '2023-09-15 11:32:51.105860'),
(79, 'Muhammad', 'Aligholami', 34, 'Teacher Training Specific purposes', 'muhammad_aligholami@yahoo.com', 'Mashhad', 'Iran', 'Shariati blvd.', 'Learn to practice more!', 'muhammad', '', '09395095856', NULL, 'male', '1234', 'images/960520.jpg', 'Persian', 'English', NULL, NULL, 'Muhammad Eghbali', 'I am a huge fan of improvement', NULL, 'I work very much everyday', 'Music', 'Football', '2023-08-08', '', '', '', '', 'Programming', 'Teaching ', 'Researchs', 'Thousand Tomans', '2023-09-15 11:32:51.105860'),
(80, 'Reza', 'Tavabakhsh', 17, 'Exam preperation Specific purposes', 'Reza_iuy_tol@yahoo.com', 'Tehran', 'Iran', 'Azadi sq.', 'empower yourself!', 'Reza', 'www.rezatavabakhsh.net', '09385024545', NULL, 'male', '12345', 'images/242447.png', 'Persian', 'English', 'Practice more', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Thousand Tomans', '2023-09-15 11:48:01.221275'),
(81, 'Okeygorandom https:/', 'Okeygorandom https:/', 33, 'Specific purposes', 'patadmiz@mail.ru', 'Ð ÑšÐ Ñ•Ð¡ÐƒÐ Ñ”Ð Ð†Ð Â°', 'Ð ÑšÐ Ñ•Ð¡ÐƒÐ Ñ”Ð Ð†Ð Â°', 'Ð ÑšÐ Ñ•Ð¡ÐƒÐ Ñ”Ð Ð†Ð Â°', '', 'Okeygorandom https:/', 'Okeygorandom https:/', NULL, NULL, NULL, '', NULL, 'Manderian', 'Arabic', NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Thousand Tomans', '2023-11-18 15:37:32.832137'),
(82, 'navid', 'nasrollahi', 25, 'Exam preperation Specific purposes', 'Navid.nasrollahi@yahoo.com', 'mashhad', 'iran', 'shariati blvd', '', 'navid77', 'www.navidnasrollahi.ir', '09395095856', NULL, 'male', '1234', 'images/274171.jpg', 'Persian', 'English', NULL, '-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Thousand Tomans', '2024-01-29 06:25:10.555915');

-- --------------------------------------------------------

--
-- Table structure for table `ttep_time`
--

CREATE TABLE `ttep_time` (
  `ttep_time` int(11) NOT NULL,
  `id_ttep_teacher` int(11) DEFAULT NULL,
  `time_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ttep_tuition`
--

CREATE TABLE `ttep_tuition` (
  `id_ttep_payment` int(11) NOT NULL,
  `ttep_teacher_username` varchar(450) NOT NULL,
  `id_ttep_student` int(11) NOT NULL,
  `date` date NOT NULL,
  `extra_information` longtext,
  `amount` int(11) NOT NULL,
  `image_path` longtext,
  `sessioncount` varchar(45) DEFAULT NULL,
  `reason` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ttep_tuition`
--

INSERT INTO `ttep_tuition` (`id_ttep_payment`, `ttep_teacher_username`, `id_ttep_student`, `date`, `extra_information`, `amount`, `image_path`, `sessioncount`, `reason`) VALUES
(1, 'navid', 1, '2023-08-14', 'asdasssd', 200000, NULL, '20', 'Class_sessions'),
(3, 'MUHAMMAD', 8, '2023-08-15', '', 800, NULL, '3', 'Writing_correction'),
(4, 'navid', 1, '2024-01-29', 'ee', 232333, NULL, '3', 'Writing_correction');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_name` (`page_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttep_announcement`
--
ALTER TABLE `ttep_announcement`
  ADD PRIMARY KEY (`id_ttep_announcement`);

--
-- Indexes for table `ttep_city`
--
ALTER TABLE `ttep_city`
  ADD PRIMARY KEY (`id_ttep_city`);

--
-- Indexes for table `ttep_class_time`
--
ALTER TABLE `ttep_class_time`
  ADD PRIMARY KEY (`id_ttep_class_time`);

--
-- Indexes for table `ttep_community`
--
ALTER TABLE `ttep_community`
  ADD PRIMARY KEY (`id_ttep_community`),
  ADD UNIQUE KEY `id_ttep_community_UNIQUE` (`id_ttep_community`);

--
-- Indexes for table `ttep_education`
--
ALTER TABLE `ttep_education`
  ADD PRIMARY KEY (`id_ttep_education`);

--
-- Indexes for table `ttep_experience`
--
ALTER TABLE `ttep_experience`
  ADD PRIMARY KEY (`id_ttep_experience`);

--
-- Indexes for table `ttep_gender`
--
ALTER TABLE `ttep_gender`
  ADD PRIMARY KEY (`id_ttep_gender`);

--
-- Indexes for table `ttep_location`
--
ALTER TABLE `ttep_location`
  ADD PRIMARY KEY (`id_ttep_location`),
  ADD UNIQUE KEY `id_ttep_location_UNIQUE` (`id_ttep_location`);

--
-- Indexes for table `ttep_messages`
--
ALTER TABLE `ttep_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttep_premium`
--
ALTER TABLE `ttep_premium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttep_project`
--
ALTER TABLE `ttep_project`
  ADD PRIMARY KEY (`id_ttep_projects`),
  ADD UNIQUE KEY `id_ttep_purpose_UNIQUE` (`id_ttep_projects`);

--
-- Indexes for table `ttep_reminder`
--
ALTER TABLE `ttep_reminder`
  ADD PRIMARY KEY (`id_ttep_reminder`);

--
-- Indexes for table `ttep_session`
--
ALTER TABLE `ttep_session`
  ADD PRIMARY KEY (`id_ttep_session`),
  ADD UNIQUE KEY `id_ttep_sessions_UNIQUE` (`id_ttep_session`);

--
-- Indexes for table `ttep_student`
--
ALTER TABLE `ttep_student`
  ADD PRIMARY KEY (`id_ttep_student`),
  ADD UNIQUE KEY `id_ttep_students_UNIQUE` (`id_ttep_student`);

--
-- Indexes for table `ttep_student_announcement`
--
ALTER TABLE `ttep_student_announcement`
  ADD PRIMARY KEY (`id_ttep_student_announcement`);

--
-- Indexes for table `ttep_student_assignment`
--
ALTER TABLE `ttep_student_assignment`
  ADD PRIMARY KEY (`id_ttep_student_assignment`);

--
-- Indexes for table `ttep_teacher`
--
ALTER TABLE `ttep_teacher`
  ADD PRIMARY KEY (`id_ttep_teacher`),
  ADD UNIQUE KEY `id_ttep_teacher_UNIQUE` (`id_ttep_teacher`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `ttep_time`
--
ALTER TABLE `ttep_time`
  ADD PRIMARY KEY (`ttep_time`),
  ADD UNIQUE KEY `ttep_time_UNIQUE` (`ttep_time`);

--
-- Indexes for table `ttep_tuition`
--
ALTER TABLE `ttep_tuition`
  ADD PRIMARY KEY (`id_ttep_payment`),
  ADD UNIQUE KEY `id_ttep_payment_UNIQUE` (`id_ttep_payment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ttep_announcement`
--
ALTER TABLE `ttep_announcement`
  MODIFY `id_ttep_announcement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ttep_city`
--
ALTER TABLE `ttep_city`
  MODIFY `id_ttep_city` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ttep_class_time`
--
ALTER TABLE `ttep_class_time`
  MODIFY `id_ttep_class_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ttep_community`
--
ALTER TABLE `ttep_community`
  MODIFY `id_ttep_community` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ttep_education`
--
ALTER TABLE `ttep_education`
  MODIFY `id_ttep_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ttep_experience`
--
ALTER TABLE `ttep_experience`
  MODIFY `id_ttep_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ttep_location`
--
ALTER TABLE `ttep_location`
  MODIFY `id_ttep_location` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ttep_messages`
--
ALTER TABLE `ttep_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `ttep_premium`
--
ALTER TABLE `ttep_premium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ttep_project`
--
ALTER TABLE `ttep_project`
  MODIFY `id_ttep_projects` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ttep_reminder`
--
ALTER TABLE `ttep_reminder`
  MODIFY `id_ttep_reminder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ttep_session`
--
ALTER TABLE `ttep_session`
  MODIFY `id_ttep_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ttep_student`
--
ALTER TABLE `ttep_student`
  MODIFY `id_ttep_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ttep_student_announcement`
--
ALTER TABLE `ttep_student_announcement`
  MODIFY `id_ttep_student_announcement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ttep_student_assignment`
--
ALTER TABLE `ttep_student_assignment`
  MODIFY `id_ttep_student_assignment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ttep_teacher`
--
ALTER TABLE `ttep_teacher`
  MODIFY `id_ttep_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `ttep_time`
--
ALTER TABLE `ttep_time`
  MODIFY `ttep_time` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ttep_tuition`
--
ALTER TABLE `ttep_tuition`
  MODIFY `id_ttep_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
