-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2021 at 12:31 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitfam`
--
CREATE DATABASE IF NOT EXISTS `vitfam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `vitfam`;

-- --------------------------------------------------------

--
-- Table structure for table `clue`
--

CREATE TABLE `clue` (
  `clue_id` int(255) NOT NULL,
  `clue_title` varchar(255) NOT NULL,
  `clue_content` longtext NOT NULL,
  `clue_story_id` int(255) NOT NULL,
  `clue_number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clue`
--

INSERT INTO `clue` (`clue_id`, `clue_title`, `clue_content`, `clue_story_id`, `clue_number`) VALUES
(1, 'Every Link', 'https://linktr.ee/theritiktiwari', 1, 1),
(2, 'Codingwalls IG', 'https://instagram.com/codingwalls', 1, 2),
(3, 'Instagram Handle', 'https://instagram.com/theritiktiwari', 1, 3),
(4, 'Twitter', 'https://twitter.com/theritiktiwari', 1, 4),
(5, 'LinkedIn', 'https://linkedin.com/in/theritiktiwari', 1, 5),
(6, 'Codepen', 'https://codepen.com/theritiktiwari', 1, 6),
(7, 'GitHub', 'https://github.com/theritiktiwari', 1, 7),
(8, 'GitHub Organization', 'https://github.com/codingwalls', 1, 8),
(9, 'Buy Me A Coffee', 'https://buymeacoffee.com/theritiktiwari', 1, 9),
(10, 'Paypal', 'https://www.paypal.com/paypalme/theritiktiwari', 1, 10),
(11, 'Telegram', 'https://telegram.me/theritiktiwari', 1, 11),
(12, 'Free Content', 'https://telegram.me/theritiktiwari_bot', 1, 12),
(13, 'LinkedIn Company', 'https://linkedin.com/company/theritiktiwari', 1, 13),
(14, 'YouTube Channel', 'https://www.youtube.com/channel/UCaTiS60yVc1MJods9sFFtuw', 1, 14),
(15, 'Facebook Page', 'https://facebook.com/theritiktiwari', 1, 15),
(16, 'Every Link', 'https://linktr.ee/theritiktiwari', 2, 1),
(17, 'Codingwalls IG', 'https://instagram.com/codingwalls', 2, 2),
(18, 'Instagram Handle', 'https://instagram.com/theritiktiwari', 2, 3),
(19, 'Twitter', 'https://twitter.com/theritiktiwari', 2, 4),
(20, 'LinkedIn', 'https://linkedin.com/in/theritiktiwari', 2, 5),
(21, 'Codepen', 'https://codepen.com/theritiktiwari', 2, 6),
(22, 'GitHub', 'https://github.com/theritiktiwari', 2, 7),
(23, 'GitHub Organization', 'https://github.com/codingwalls', 2, 8),
(24, 'Buy Me A Coffee', 'https://buymeacoffee.com/theritiktiwari', 2, 9),
(25, 'Paypal', 'https://www.paypal.com/paypalme/theritiktiwari', 2, 10),
(26, 'Telegram', 'https://telegram.me/theritiktiwari', 2, 11),
(27, 'Free Content', 'https://telegram.me/theritiktiwari_bot', 2, 12),
(28, 'LinkedIn Company', 'https://linkedin.com/company/theritiktiwari', 2, 13),
(29, 'YouTube Channel', 'https://www.youtube.com/channel/UCaTiS60yVc1MJods9sFFtuw', 2, 14),
(30, 'Facebook Page', 'https://facebook.com/theritiktiwari', 2, 15),
(31, 'Every Link', 'https://linktr.ee/theritiktiwari', 3, 1),
(32, 'Codingwalls IG', 'https://instagram.com/codingwalls', 3, 2),
(33, 'Instagram Handle', 'https://instagram.com/theritiktiwari', 3, 3),
(34, 'Twitter', 'https://twitter.com/theritiktiwari', 3, 4),
(35, 'LinkedIn', 'https://linkedin.com/in/theritiktiwari', 3, 5),
(36, 'Codepen', 'https://codepen.com/theritiktiwari', 3, 6),
(37, 'GitHub', 'https://github.com/theritiktiwari', 3, 7),
(38, 'GitHub Organization', 'https://github.com/codingwalls', 3, 8),
(39, 'Buy Me A Coffee', 'https://buymeacoffee.com/theritiktiwari', 3, 9),
(40, 'Paypal', 'https://www.paypal.com/paypalme/theritiktiwari', 3, 10),
(41, 'Telegram', 'https://telegram.me/theritiktiwari', 3, 11),
(42, 'Free Content', 'https://telegram.me/theritiktiwari_bot', 3, 12),
(43, 'LinkedIn Company', 'https://linkedin.com/company/theritiktiwari', 3, 13),
(44, 'YouTube Channel', 'https://www.youtube.com/channel/UCaTiS60yVc1MJods9sFFtuw', 3, 14),
(45, 'Facebook Page', 'https://facebook.com/theritiktiwari', 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE `final` (
  `final_id` int(255) NOT NULL,
  `final_content` longtext NOT NULL,
  `final_question1` longtext NOT NULL,
  `final_question2` longtext NOT NULL,
  `final_question3` longtext NOT NULL,
  `final_story_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`final_id`, `final_content`, `final_question1`, `final_question2`, `final_question3`, `final_story_id`) VALUES
(1, 'Congratulations!! You completed Story 1', 'Give the answer of Question 1 \r\nStory 1', 'Give the answer of Question 2\r\nStory 1', 'Give the answer of Question 3\r\nStory 1', 1),
(2, 'Congratulations!! You completed Story 2', 'Give the answer of Question 1\r\nStory 2', 'Give the answer of Question 2\r\nStory 2', 'Give the answer of Question 3\r\nStory 2', 2),
(3, 'Congratulations!! You completed Story 3', 'Give the answer of Question 1\r\nStory 3', 'Give the answer of Question 2\r\nStory 3', 'Give the answer of Question 3\r\nStory 3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(255) NOT NULL,
  `question_content` longtext NOT NULL,
  `stage1_question` longtext NOT NULL,
  `stage2_question` longtext NOT NULL,
  `stage3_question` longtext NOT NULL,
  `question_story_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_content`, `stage1_question`, `stage2_question`, `stage3_question`, `question_story_id`) VALUES
(1, 'Congratulations!! You completed Stage 1', 'Stage 1 Question S1', 'Stage 2 Question S1', 'Stage 3 Question S1', 1),
(2, 'Congratulations!! You completed Stage 2', 'Stage 1 Question S2', 'Stage 2 Question S2', 'Stage 3 Question S2', 2),
(3, 'Congratulations!! You completed Stage 3', 'Stage 1 Question S3', 'Stage 2 Question S3', 'Stage 3 Question S3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `story_id` int(255) NOT NULL,
  `story_title` varchar(255) NOT NULL,
  `story_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`story_id`, `story_title`, `story_content`) VALUES
(1, 'Story 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolorem. Non magni ducimus voluptates, eaque eligendi possimus itaque aspernatur maiores dignissimos, distinctio consequatur! Quo, natus quis! Nobis cupiditate neque itaque sit officiis harum asperiores, eaque quis ex, voluptatibus error sunt mollitia, deserunt nemo ad dignissimos rem sed labore eligendi necessitatibus magni nisi. <br/>\r\n\r\nBeatae nisi quae esse unde perspiciatis maiores incidunt natus, nemo repellendus earum sunt necessitatibus minima, quod labore pariatur, velit illo? Quaerat, ad ea quasi id corrupti nobis rerum quis, quas magnam culpa qui asperiores eum, delectus ab ex expedita dicta nam numquam repellendus natus? <br/>\r\n\r\nOfficia atque illum, consectetur voluptatem aliquam hic ad blanditiis, accusantium dolor iusto asperiores dignissimos ipsum temporibus autem quasi quae ex non earum aspernatur ducimus officiis reiciendis. Fugiat facilis ut blanditiis, magnam tempora, consequuntur, quos doloremque recusandae facere quo totam! Veniam maiores vitae nihil optio consectetur labore consequuntur est provident vero. <br/>\r\n\r\nCum porro qui amet velit, autem praesentium ipsa molestiae nobis, sed voluptatibus asperiores dignissimos, facere saepe blanditiis unde recusandae sint quibusdam. Sapiente iure reprehenderit nesciunt? Illo enim cumque ratione sequi sed accusamus in! Nesciunt dolor veniam id, dignissimos excepturi quia iure illum fugit assumenda nisi minus quibusdam possimus adipisci suscipit nostrum! <br/>\r\n\r\nProvident dolor alias hic placeat quibusdam adipisci quidem dicta iure nulla asperiores at, in odio sequi nesciunt, earum repellendus perspiciatis mollitia? Excepturi dolor, esse quos enim voluptatum ullam quas eius, ex ipsam rerum alias tempora ut! Possimus deleniti nemo in cupiditate nostrum. Maxime, sapiente possimus ducimus sed ex facere aliquam error deserunt eos itaque facilis illo nemo illum molestiae architecto cum. <br/>\r\n\r\nPerspiciatis ullam asperiores sint iste placeat reiciendis, tempore delectus, ex sunt qui dolor commodi nobis, eos iure veniam a facilis incidunt! Eum officia voluptatem ipsam facilis quidem molestiae eos incidunt, nulla iure quia. Animi veniam atque rerum unde iure eveniet cupiditate in accusamus commodi. Illo accusantium iure ipsa quos eum? Cumque rerum quaerat, tempora ullam, commodi exercitationem quam sunt modi labore aspernatur quos eos neque! Nam ex numquam animi. <br/>\r\n\r\nMagni quae assumenda ad labore accusamus itaque deleniti alias iure. Error similique minima laudantium dolore quasi fugit, dolor aut accusantium earum a est et, asperiores in quaerat magni quos nisi tempore quas? Ad illo optio soluta accusantium maxime sunt eius dolorum, dignissimos natus officia earum distinctio eveniet sit necessitatibus nisi tempora beatae ratione animi reprehenderit nostrum veritatis perferendis. Aut minus assumenda veritatis, voluptates deserunt provident fugiat molestias nostrum, placeat pariatur obcaecati unde similique iste optio dolore et dicta vitae iusto commodi explicabo blanditiis nihil ad fugit mollitia! <br/>\r\n\r\nError ut commodi quo accusamus aliquam, eveniet dolor minima deleniti molestiae itaque aut laboriosam. Nobis, eos numquam! Quis tenetur nesciunt, sint odio dolorum quae veniam. Doloribus dolorum exercitationem nihil sed vel pariatur minima iure quibusdam nisi error quasi consequatur in cumque, officiis rem blanditiis unde odio! Quod voluptas eos reiciendis explicabo necessitatibus! Temporibus nesciunt consectetur voluptas? Molestiae, repellat rerum sequi sint in vel debitis distinctio ab cumque necessitatibus voluptate similique aspernatur eos totam quisquam fuga ratione officia maxime quod consequuntur deserunt. Nisi, illum consectetur! <br/>\r\n\r\nPariatur magni obcaecati aliquid vel dicta ab, id debitis inventore aperiam! Id eius, earum commodi illum magni ab nihil suscipit eaque aliquid consectetur minima rem ex nam assumenda voluptatem odit repellendus quasi, soluta doloremque quisquam repellat eum tempore dolores? Vel, quibusdam quae? Possimus iste nam ad nostrum officia dolor cumque quia ipsam. A ad ipsa dolore reprehenderit harum distinctio! Provident officia inventore, error laudantium rerum iste omnis dolorum aperiam labore saepe fugit ipsum modi natus? <br/>\r\n\r\nEius porro ipsam sunt fugiat assumenda, at et exercitationem, beatae officia impedit eum quae quisquam modi enim eos quasi voluptatibus nesciunt autem ullam, magni eveniet reiciendis! Eveniet, tempore. Et, unde numquam laudantium, in maiores dicta officia laborum odio asperiores itaque nemo aliquam dolores deleniti molestiae eum quas. Porro, cum numquam iure expedita illo autem quaerat consectetur iusto provident sed excepturi ullam eos asperiores nisi quam maxime saepe beatae vel quae aperiam labore aliquid quisquam voluptate? <br/>\r\n\r\nItaque accusamus sequi beatae debitis iste porro cumque voluptatem accusantium in, nemo, atque saepe exercitationem! Ullam a mollitia hic sed culpa? Enim, tenetur modi! Esse distinctio voluptatum praesentium commodi impedit. Quidem dolorem saepe temporibus labore dolores eum beatae laborum possimus nobis nesciunt. Error reprehenderit quibusdam ipsam aliquam placeat, quia ullam aut quae? Neque voluptates vitae earum dolorem eius rem qui eos magnam exercitationem architecto laudantium totam, velit nisi beatae recusandae. <br/>\r\n\r\nDoloribus nam quis consequatur eveniet at consectetur nostrum distinctio sapiente nobis deserunt adipisci in ipsa corporis, quia debitis atque, esse provident sed ad, pariatur quo? Fuga neque, assumenda fugiat placeat rerum est illo voluptas minus reiciendis accusantium pariatur. Deserunt minus nobis, velit modi pariatur delectus, atque laudantium corporis suscipit eligendi qui, dolore amet sequi iure omnis aspernatur ipsa incidunt accusantium? <br/>\r\n\r\nQuos magni debitis molestias labore, fugit ratione quo eaque hic saepe harum, vero ea unde quas exercitationem aperiam rerum provident adipisci. Cum magnam, quae illum eveniet minus quod! Dolore reiciendis necessitatibus ea eos. Repudiandae porro beatae vero deserunt laudantium illo magnam assumenda perferendis reprehenderit rem ad cum velit aliquam cupiditate praesentium, quibusdam commodi qui ullam debitis culpa aut sequi? Beatae possimus sequi, maxime ut facilis cumque est ipsa voluptatem eveniet sapiente distinctio. Nemo officia, accusantium inventore exercitationem nam maiores ex magni? <br/>\r\n\r\nDelectus dolorum excepturi eos voluptas perspiciatis minus consequuntur accusantium voluptatum adipisci aut, voluptates nulla fuga beatae tempore est ratione porro exercitationem natus? Voluptatem facilis delectus doloribus impedit, excepturi tempore rem recusandae omnis alias itaque mollitia velit libero quis, atque soluta. Rerum molestias ex itaque odio voluptas error reprehenderit accusantium facere quo cumque dignissimos excepturi laboriosam, quaerat porro deserunt quibusdam suscipit expedita veritatis dicta nulla quam amet in! Nisi, doloribus libero! <br/>\r\n\r\nCulpa, soluta odio consequuntur cum temporibus debitis. Repudiandae incidunt reprehenderit suscipit placeat molestiae magni optio commodi culpa modi illo ea, a numquam iusto sed sint nam odio rem adipisci! Assumenda at atque optio soluta, aliquam ut perferendis fugiat eum, provident mollitia placeat blanditiis explicabo cumque debitis corrupti animi voluptatem voluptate amet magnam labore! Numquam eius voluptates maxime, modi consequuntur, quas architecto quos eaque recusandae officia repellendus pariatur repudiandae dignissimos beatae accusantium! <br/>'),
(2, 'Story 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolorem. Non magni ducimus voluptates, eaque eligendi possimus itaque aspernatur maiores dignissimos, distinctio consequatur! Quo, natus quis! Nobis cupiditate neque itaque sit officiis harum asperiores, eaque quis ex, voluptatibus error sunt mollitia, deserunt nemo ad dignissimos rem sed labore eligendi necessitatibus magni nisi. <br/>\r\n\r\nBeatae nisi quae esse unde perspiciatis maiores incidunt natus, nemo repellendus earum sunt necessitatibus minima, quod labore pariatur, velit illo? Quaerat, ad ea quasi id corrupti nobis rerum quis, quas magnam culpa qui asperiores eum, delectus ab ex expedita dicta nam numquam repellendus natus? <br/>\r\n\r\nOfficia atque illum, consectetur voluptatem aliquam hic ad blanditiis, accusantium dolor iusto asperiores dignissimos ipsum temporibus autem quasi quae ex non earum aspernatur ducimus officiis reiciendis. Fugiat facilis ut blanditiis, magnam tempora, consequuntur, quos doloremque recusandae facere quo totam! Veniam maiores vitae nihil optio consectetur labore consequuntur est provident vero. <br/>\r\n\r\nCum porro qui amet velit, autem praesentium ipsa molestiae nobis, sed voluptatibus asperiores dignissimos, facere saepe blanditiis unde recusandae sint quibusdam. Sapiente iure reprehenderit nesciunt? Illo enim cumque ratione sequi sed accusamus in! Nesciunt dolor veniam id, dignissimos excepturi quia iure illum fugit assumenda nisi minus quibusdam possimus adipisci suscipit nostrum! <br/>\r\n\r\nProvident dolor alias hic placeat quibusdam adipisci quidem dicta iure nulla asperiores at, in odio sequi nesciunt, earum repellendus perspiciatis mollitia? Excepturi dolor, esse quos enim voluptatum ullam quas eius, ex ipsam rerum alias tempora ut! Possimus deleniti nemo in cupiditate nostrum. Maxime, sapiente possimus ducimus sed ex facere aliquam error deserunt eos itaque facilis illo nemo illum molestiae architecto cum. <br/>\r\n\r\nPerspiciatis ullam asperiores sint iste placeat reiciendis, tempore delectus, ex sunt qui dolor commodi nobis, eos iure veniam a facilis incidunt! Eum officia voluptatem ipsam facilis quidem molestiae eos incidunt, nulla iure quia. Animi veniam atque rerum unde iure eveniet cupiditate in accusamus commodi. Illo accusantium iure ipsa quos eum? Cumque rerum quaerat, tempora ullam, commodi exercitationem quam sunt modi labore aspernatur quos eos neque! Nam ex numquam animi. <br/>\r\n\r\nMagni quae assumenda ad labore accusamus itaque deleniti alias iure. Error similique minima laudantium dolore quasi fugit, dolor aut accusantium earum a est et, asperiores in quaerat magni quos nisi tempore quas? Ad illo optio soluta accusantium maxime sunt eius dolorum, dignissimos natus officia earum distinctio eveniet sit necessitatibus nisi tempora beatae ratione animi reprehenderit nostrum veritatis perferendis. Aut minus assumenda veritatis, voluptates deserunt provident fugiat molestias nostrum, placeat pariatur obcaecati unde similique iste optio dolore et dicta vitae iusto commodi explicabo blanditiis nihil ad fugit mollitia! <br/>\r\n\r\nError ut commodi quo accusamus aliquam, eveniet dolor minima deleniti molestiae itaque aut laboriosam. Nobis, eos numquam! Quis tenetur nesciunt, sint odio dolorum quae veniam. Doloribus dolorum exercitationem nihil sed vel pariatur minima iure quibusdam nisi error quasi consequatur in cumque, officiis rem blanditiis unde odio! Quod voluptas eos reiciendis explicabo necessitatibus! Temporibus nesciunt consectetur voluptas? Molestiae, repellat rerum sequi sint in vel debitis distinctio ab cumque necessitatibus voluptate similique aspernatur eos totam quisquam fuga ratione officia maxime quod consequuntur deserunt. Nisi, illum consectetur! <br/>\r\n\r\nPariatur magni obcaecati aliquid vel dicta ab, id debitis inventore aperiam! Id eius, earum commodi illum magni ab nihil suscipit eaque aliquid consectetur minima rem ex nam assumenda voluptatem odit repellendus quasi, soluta doloremque quisquam repellat eum tempore dolores? Vel, quibusdam quae? Possimus iste nam ad nostrum officia dolor cumque quia ipsam. A ad ipsa dolore reprehenderit harum distinctio! Provident officia inventore, error laudantium rerum iste omnis dolorum aperiam labore saepe fugit ipsum modi natus? <br/>\r\n\r\nEius porro ipsam sunt fugiat assumenda, at et exercitationem, beatae officia impedit eum quae quisquam modi enim eos quasi voluptatibus nesciunt autem ullam, magni eveniet reiciendis! Eveniet, tempore. Et, unde numquam laudantium, in maiores dicta officia laborum odio asperiores itaque nemo aliquam dolores deleniti molestiae eum quas. Porro, cum numquam iure expedita illo autem quaerat consectetur iusto provident sed excepturi ullam eos asperiores nisi quam maxime saepe beatae vel quae aperiam labore aliquid quisquam voluptate? <br/>\r\n\r\nItaque accusamus sequi beatae debitis iste porro cumque voluptatem accusantium in, nemo, atque saepe exercitationem! Ullam a mollitia hic sed culpa? Enim, tenetur modi! Esse distinctio voluptatum praesentium commodi impedit. Quidem dolorem saepe temporibus labore dolores eum beatae laborum possimus nobis nesciunt. Error reprehenderit quibusdam ipsam aliquam placeat, quia ullam aut quae? Neque voluptates vitae earum dolorem eius rem qui eos magnam exercitationem architecto laudantium totam, velit nisi beatae recusandae. <br/>\r\n\r\nDoloribus nam quis consequatur eveniet at consectetur nostrum distinctio sapiente nobis deserunt adipisci in ipsa corporis, quia debitis atque, esse provident sed ad, pariatur quo? Fuga neque, assumenda fugiat placeat rerum est illo voluptas minus reiciendis accusantium pariatur. Deserunt minus nobis, velit modi pariatur delectus, atque laudantium corporis suscipit eligendi qui, dolore amet sequi iure omnis aspernatur ipsa incidunt accusantium? <br/>\r\n\r\nQuos magni debitis molestias labore, fugit ratione quo eaque hic saepe harum, vero ea unde quas exercitationem aperiam rerum provident adipisci. Cum magnam, quae illum eveniet minus quod! Dolore reiciendis necessitatibus ea eos. Repudiandae porro beatae vero deserunt laudantium illo magnam assumenda perferendis reprehenderit rem ad cum velit aliquam cupiditate praesentium, quibusdam commodi qui ullam debitis culpa aut sequi? Beatae possimus sequi, maxime ut facilis cumque est ipsa voluptatem eveniet sapiente distinctio. Nemo officia, accusantium inventore exercitationem nam maiores ex magni? <br/>\r\n\r\nDelectus dolorum excepturi eos voluptas perspiciatis minus consequuntur accusantium voluptatum adipisci aut, voluptates nulla fuga beatae tempore est ratione porro exercitationem natus? Voluptatem facilis delectus doloribus impedit, excepturi tempore rem recusandae omnis alias itaque mollitia velit libero quis, atque soluta. Rerum molestias ex itaque odio voluptas error reprehenderit accusantium facere quo cumque dignissimos excepturi laboriosam, quaerat porro deserunt quibusdam suscipit expedita veritatis dicta nulla quam amet in! Nisi, doloribus libero! <br/>\r\n\r\nCulpa, soluta odio consequuntur cum temporibus debitis. Repudiandae incidunt reprehenderit suscipit placeat molestiae magni optio commodi culpa modi illo ea, a numquam iusto sed sint nam odio rem adipisci! Assumenda at atque optio soluta, aliquam ut perferendis fugiat eum, provident mollitia placeat blanditiis explicabo cumque debitis corrupti animi voluptatem voluptate amet magnam labore! Numquam eius voluptates maxime, modi consequuntur, quas architecto quos eaque recusandae officia repellendus pariatur repudiandae dignissimos beatae accusantium! <br/>'),
(3, 'Story 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, dolorem. Non magni ducimus voluptates, eaque eligendi possimus itaque aspernatur maiores dignissimos, distinctio consequatur! Quo, natus quis! Nobis cupiditate neque itaque sit officiis harum asperiores, eaque quis ex, voluptatibus error sunt mollitia, deserunt nemo ad dignissimos rem sed labore eligendi necessitatibus magni nisi. <br/>\r\n\r\nBeatae nisi quae esse unde perspiciatis maiores incidunt natus, nemo repellendus earum sunt necessitatibus minima, quod labore pariatur, velit illo? Quaerat, ad ea quasi id corrupti nobis rerum quis, quas magnam culpa qui asperiores eum, delectus ab ex expedita dicta nam numquam repellendus natus? <br/>\r\n\r\nOfficia atque illum, consectetur voluptatem aliquam hic ad blanditiis, accusantium dolor iusto asperiores dignissimos ipsum temporibus autem quasi quae ex non earum aspernatur ducimus officiis reiciendis. Fugiat facilis ut blanditiis, magnam tempora, consequuntur, quos doloremque recusandae facere quo totam! Veniam maiores vitae nihil optio consectetur labore consequuntur est provident vero. <br/>\r\n\r\nCum porro qui amet velit, autem praesentium ipsa molestiae nobis, sed voluptatibus asperiores dignissimos, facere saepe blanditiis unde recusandae sint quibusdam. Sapiente iure reprehenderit nesciunt? Illo enim cumque ratione sequi sed accusamus in! Nesciunt dolor veniam id, dignissimos excepturi quia iure illum fugit assumenda nisi minus quibusdam possimus adipisci suscipit nostrum! <br/>\r\n\r\nProvident dolor alias hic placeat quibusdam adipisci quidem dicta iure nulla asperiores at, in odio sequi nesciunt, earum repellendus perspiciatis mollitia? Excepturi dolor, esse quos enim voluptatum ullam quas eius, ex ipsam rerum alias tempora ut! Possimus deleniti nemo in cupiditate nostrum. Maxime, sapiente possimus ducimus sed ex facere aliquam error deserunt eos itaque facilis illo nemo illum molestiae architecto cum. <br/>\r\n\r\nPerspiciatis ullam asperiores sint iste placeat reiciendis, tempore delectus, ex sunt qui dolor commodi nobis, eos iure veniam a facilis incidunt! Eum officia voluptatem ipsam facilis quidem molestiae eos incidunt, nulla iure quia. Animi veniam atque rerum unde iure eveniet cupiditate in accusamus commodi. Illo accusantium iure ipsa quos eum? Cumque rerum quaerat, tempora ullam, commodi exercitationem quam sunt modi labore aspernatur quos eos neque! Nam ex numquam animi. <br/>\r\n\r\nMagni quae assumenda ad labore accusamus itaque deleniti alias iure. Error similique minima laudantium dolore quasi fugit, dolor aut accusantium earum a est et, asperiores in quaerat magni quos nisi tempore quas? Ad illo optio soluta accusantium maxime sunt eius dolorum, dignissimos natus officia earum distinctio eveniet sit necessitatibus nisi tempora beatae ratione animi reprehenderit nostrum veritatis perferendis. Aut minus assumenda veritatis, voluptates deserunt provident fugiat molestias nostrum, placeat pariatur obcaecati unde similique iste optio dolore et dicta vitae iusto commodi explicabo blanditiis nihil ad fugit mollitia! <br/>\r\n\r\nError ut commodi quo accusamus aliquam, eveniet dolor minima deleniti molestiae itaque aut laboriosam. Nobis, eos numquam! Quis tenetur nesciunt, sint odio dolorum quae veniam. Doloribus dolorum exercitationem nihil sed vel pariatur minima iure quibusdam nisi error quasi consequatur in cumque, officiis rem blanditiis unde odio! Quod voluptas eos reiciendis explicabo necessitatibus! Temporibus nesciunt consectetur voluptas? Molestiae, repellat rerum sequi sint in vel debitis distinctio ab cumque necessitatibus voluptate similique aspernatur eos totam quisquam fuga ratione officia maxime quod consequuntur deserunt. Nisi, illum consectetur! <br/>\r\n\r\nPariatur magni obcaecati aliquid vel dicta ab, id debitis inventore aperiam! Id eius, earum commodi illum magni ab nihil suscipit eaque aliquid consectetur minima rem ex nam assumenda voluptatem odit repellendus quasi, soluta doloremque quisquam repellat eum tempore dolores? Vel, quibusdam quae? Possimus iste nam ad nostrum officia dolor cumque quia ipsam. A ad ipsa dolore reprehenderit harum distinctio! Provident officia inventore, error laudantium rerum iste omnis dolorum aperiam labore saepe fugit ipsum modi natus? <br/>\r\n\r\nEius porro ipsam sunt fugiat assumenda, at et exercitationem, beatae officia impedit eum quae quisquam modi enim eos quasi voluptatibus nesciunt autem ullam, magni eveniet reiciendis! Eveniet, tempore. Et, unde numquam laudantium, in maiores dicta officia laborum odio asperiores itaque nemo aliquam dolores deleniti molestiae eum quas. Porro, cum numquam iure expedita illo autem quaerat consectetur iusto provident sed excepturi ullam eos asperiores nisi quam maxime saepe beatae vel quae aperiam labore aliquid quisquam voluptate? <br/>\r\n\r\nItaque accusamus sequi beatae debitis iste porro cumque voluptatem accusantium in, nemo, atque saepe exercitationem! Ullam a mollitia hic sed culpa? Enim, tenetur modi! Esse distinctio voluptatum praesentium commodi impedit. Quidem dolorem saepe temporibus labore dolores eum beatae laborum possimus nobis nesciunt. Error reprehenderit quibusdam ipsam aliquam placeat, quia ullam aut quae? Neque voluptates vitae earum dolorem eius rem qui eos magnam exercitationem architecto laudantium totam, velit nisi beatae recusandae. <br/>\r\n\r\nDoloribus nam quis consequatur eveniet at consectetur nostrum distinctio sapiente nobis deserunt adipisci in ipsa corporis, quia debitis atque, esse provident sed ad, pariatur quo? Fuga neque, assumenda fugiat placeat rerum est illo voluptas minus reiciendis accusantium pariatur. Deserunt minus nobis, velit modi pariatur delectus, atque laudantium corporis suscipit eligendi qui, dolore amet sequi iure omnis aspernatur ipsa incidunt accusantium? <br/>\r\n\r\nQuos magni debitis molestias labore, fugit ratione quo eaque hic saepe harum, vero ea unde quas exercitationem aperiam rerum provident adipisci. Cum magnam, quae illum eveniet minus quod! Dolore reiciendis necessitatibus ea eos. Repudiandae porro beatae vero deserunt laudantium illo magnam assumenda perferendis reprehenderit rem ad cum velit aliquam cupiditate praesentium, quibusdam commodi qui ullam debitis culpa aut sequi? Beatae possimus sequi, maxime ut facilis cumque est ipsa voluptatem eveniet sapiente distinctio. Nemo officia, accusantium inventore exercitationem nam maiores ex magni? <br/>\r\n\r\nDelectus dolorum excepturi eos voluptas perspiciatis minus consequuntur accusantium voluptatum adipisci aut, voluptates nulla fuga beatae tempore est ratione porro exercitationem natus? Voluptatem facilis delectus doloribus impedit, excepturi tempore rem recusandae omnis alias itaque mollitia velit libero quis, atque soluta. Rerum molestias ex itaque odio voluptas error reprehenderit accusantium facere quo cumque dignissimos excepturi laboriosam, quaerat porro deserunt quibusdam suscipit expedita veritatis dicta nulla quam amet in! Nisi, doloribus libero! <br/>\r\n\r\nCulpa, soluta odio consequuntur cum temporibus debitis. Repudiandae incidunt reprehenderit suscipit placeat molestiae magni optio commodi culpa modi illo ea, a numquam iusto sed sint nam odio rem adipisci! Assumenda at atque optio soluta, aliquam ut perferendis fugiat eum, provident mollitia placeat blanditiis explicabo cumque debitis corrupti animi voluptatem voluptate amet magnam labore! Numquam eius voluptates maxime, modi consequuntur, quas architecto quos eaque recusandae officia repellendus pariatur repudiandae dignissimos beatae accusantium! <br/>');

-- --------------------------------------------------------

--
-- Table structure for table `superuser`
--

CREATE TABLE `superuser` (
  `sno` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` char(1) NOT NULL,
  `timestamp()` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superuser`
--

INSERT INTO `superuser` (`sno`, `username`, `email`, `password`, `type`, `timestamp()`) VALUES
(1, 'VITFAM\'s SUPERUSER', 'superuser@vitfam.com', 'superpower', 'A', '2021-09-24 15:58:49'),
(2, 'VITFAM\'s ADMIN', 'admin@vitfam.com', 'admin', 'C', '2021-09-24 15:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `story_id` int(255) NOT NULL,
  `user_login_check` int(1) NOT NULL DEFAULT 0,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `password`, `story_id`, `user_login_check`, `timestamp`) VALUES
(1, 'Dummy 1', 'dummy1@vitfam.com', 'dummy123', 1, 0, '2021-09-25 22:30:40'),
(2, 'Dummy 2', 'dummy2@vitfam.com', 'dummy123', 1, 0, '2021-09-25 22:30:40'),
(3, 'Dummy 3', 'dummy3@vitfam.com', 'dummy123', 1, 0, '2021-09-25 22:30:40'),
(4, 'Dummy 4', 'dummy4@vitfam.com', 'dummy123', 1, 0, '2021-09-25 22:30:40'),
(5, 'Dummy 5', 'dummy5@vitfam.com', 'dummy123', 1, 0, '2021-09-25 22:30:40'),
(6, 'Dummy 6', 'dummy6@vitfam.com', 'dummy123', 2, 0, '2021-09-25 22:30:40'),
(7, 'Dummy 7', 'dummy7@vitfam.com', 'dummy123', 2, 0, '2021-09-25 22:30:40'),
(8, 'Dummy 8', 'dummy8@vitfam.com', 'dummy123', 2, 0, '2021-09-25 22:30:40'),
(9, 'Dummy 9', 'dummy9@vitfam.com', 'dummy123', 2, 0, '2021-09-25 22:30:40'),
(10, 'Dummy 10', 'dummy10@vitfam.com', 'dummy123', 2, 0, '2021-09-25 22:30:40'),
(11, 'Dummy 11', 'dummy11@vitfam.com', 'dummy123', 3, 0, '2021-09-25 22:30:40'),
(12, 'Dummy 12', 'dummy12@vitfam.com', 'dummy123', 3, 0, '2021-09-25 22:30:40'),
(13, 'Dummy 13', 'dummy13@vitfam.com', 'dummy123', 3, 0, '2021-09-25 22:30:40'),
(14, 'Dummy 14', 'dummy14@vitfam.com', 'dummy123', 3, 0, '2021-09-25 22:30:40'),
(15, 'Dummy 15', 'dummy15@vitfam.com', 'dummy123', 3, 0, '2021-09-25 22:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_final`
--

CREATE TABLE `user_final` (
  `user_id` int(255) NOT NULL,
  `final_id` int(255) NOT NULL,
  `final_answer1` longtext NOT NULL,
  `final_answer2` longtext NOT NULL,
  `final_answer3` longtext NOT NULL,
  `final_logout` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_final`
--

INSERT INTO `user_final` (`user_id`, `final_id`, `final_answer1`, `final_answer2`, `final_answer3`, `final_logout`) VALUES
(1, 1, '', '', '', 0),
(2, 1, '', '', '', 0),
(3, 1, '', '', '', 0),
(4, 1, '', '', '', 0),
(5, 1, '', '', '', 0),
(6, 2, '', '', '', 0),
(7, 2, '', '', '', 0),
(8, 2, '', '', '', 0),
(9, 2, '', '', '', 0),
(10, 2, '', '', '', 0),
(11, 3, '', '', '', 0),
(12, 3, '', '', '', 0),
(13, 3, '', '', '', 0),
(14, 3, '', '', '', 0),
(15, 3, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_ques`
--

CREATE TABLE `user_ques` (
  `user_id` int(255) NOT NULL,
  `question_id` int(255) NOT NULL,
  `stage1_answer` longtext NOT NULL,
  `stage2_answer` longtext NOT NULL,
  `stage3_answer` longtext NOT NULL,
  `ques_increment` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_ques`
--

INSERT INTO `user_ques` (`user_id`, `question_id`, `stage1_answer`, `stage2_answer`, `stage3_answer`, `ques_increment`) VALUES
(1, 1, '', '', '', 1),
(2, 1, '', '', '', 1),
(3, 1, '', '', '', 1),
(4, 1, '', '', '', 1),
(5, 1, '', '', '', 1),
(6, 2, '', '', '', 1),
(7, 2, '', '', '', 1),
(8, 2, '', '', '', 1),
(9, 2, '', '', '', 1),
(10, 2, '', '', '', 1),
(11, 3, '', '', '', 1),
(12, 3, '', '', '', 1),
(13, 3, '', '', '', 1),
(14, 3, '', '', '', 1),
(15, 3, '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clue`
--
ALTER TABLE `clue`
  ADD PRIMARY KEY (`clue_id`);

--
-- Indexes for table `final`
--
ALTER TABLE `final`
  ADD PRIMARY KEY (`final_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clue`
--
ALTER TABLE `clue`
  MODIFY `clue_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `final`
--
ALTER TABLE `final`
  MODIFY `final_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `story_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `superuser`
--
ALTER TABLE `superuser`
  MODIFY `sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
