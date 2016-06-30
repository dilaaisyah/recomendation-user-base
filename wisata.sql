-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2016 at 03:28 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dila_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `content`, `seen`, `user_id`, `post_id`) VALUES
(1, '2016-03-13 03:14:46', '2016-03-13 03:14:46', '<p>\nLorem ipsum praesent elit felis inceptos tellus inceptos, cubilia quis mattis faucibus sem non, odio fringilla class aliquam metus ipsum. \nLorem luctus pharetra dictum vehicula tempus in, venenatis gravida ut gravida proin orci, quis sed platea mi quisque. \nHendrerit semper hendrerit facilisis ante sapien faucibus ligula, commodo vestibulum rutrum pretium varius sem, aliquet himenaeos dolor cursus nunc habitasse. \nAliquam ut curabitur ipsum luctus ut rutrum, odio condimentum donec suscipit molestie est, etiam sit rutrum dui nostra. \nSem aliquet conubia nullam sollicitudin rhoncus venenatis vivamus, rhoncus netus risus tortor non mauris turpis, eget integer nibh dolor commodo venenatis. \n</p>\n<p>\nUt molestie semper adipiscing amet cras class donec, sapien malesuada auctor sapien arcu inceptos, aenean consequat metus litora mattis vivamus. \nFeugiat arcu adipiscing mauris primis ante ullamcorper ad nisi lobortis arcu, per orci malesuada blandit metus tortor urna turpis consectetur porttitor egestas, sed eleifend eget tincidunt pharetra varius tincidunt morbi malesuada. \nElementum mi torquent mollis eu lobortis curae purus amet vivamus amet nulla, torquent nibh eu diam aliquam pretium donec aliquam tempus lacus, tempus feugiat lectus cras non velit mollis sit et integer. \nEgestas habitant auctor integer sem at nam massa, himenaeos netus vel dapibus nibh malesuada, leo fusce tortor sociosqu semper facilisis. \n</p>', 0, 2, 1),
(2, '2016-03-13 03:14:47', '2016-03-13 03:14:47', '<p>\nLorem ipsum tristique in faucibus tristique duis eros cubilia quisque habitasse aliquam, fringilla orci non vel laoreet dolor enim justo facilisis. \nNeque accumsan in ad venenatis hac per dictumst nulla, ligula donec mollis massa porttitor ullamcorper risus eu, platea fringilla habitasse suscipit pellentesque donec est. \nHabitant vehicula tempor ultrices placerat sociosqu ultrices consectetur, ullamcorper tincidunt quisque tellus ante nostra, euismod nec suspendisse sem curabitur elit. \nMalesuada lacus viverra sagittis sit ornare orci augue nullam, adipiscing pulvinar libero aliquam vestibulum platea cursus, pellentesque leo dui lectus curabitur euismod ad. \n</p>\n<p>\nErat curae non elit ultrices placerat netus metus feugiat, non conubia fusce porttitor sociosqu diam commodo metus, in himenaeos vitae aptent consequat luctus purus. \nEleifend enim sollicitudin eleifend porta malesuada ac class conubia condimentum, mauris facilisis conubia quis scelerisque lacinia tempus nullam felis fusce, ac potenti netus ornare semper molestie iaculis fermentum. \nOrnare curabitur tincidunt imperdiet scelerisque imperdiet euismod scelerisque torquent curae, rhoncus sollicitudin tortor placerat aptent hac nec posuere, suscipit sed tortor neque urna hendrerit vehicula duis. \nLitora tristique congue nec auctor felis libero, ornare habitasse nec elit felis inceptos, tellus inceptos cubilia quis mattis. \n</p>\n<p>\nFaucibus sem non odio fringilla class, aliquam metus ipsum lorem luctus pharetra, dictum vehicula tempus in. \n</p>', 0, 2, 2),
(3, '2016-03-13 03:14:47', '2016-03-13 03:14:47', '<p>\nLorem ipsum elit gravida ut gravida proin orci, quis sed platea mi quisque hendrerit semper hendrerit, facilisis ante sapien faucibus ligula commodo. \nVestibulum rutrum pretium varius sem aliquet himenaeos dolor cursus nunc habitasse aliquam ut curabitur, ipsum luctus ut rutrum odio condimentum donec suscipit molestie est etiam. \nSit rutrum dui nostra sem aliquet conubia nullam sollicitudin rhoncus venenatis vivamus, rhoncus netus risus tortor non mauris turpis eget integer nibh, dolor commodo venenatis ut molestie semper adipiscing amet cras class. \nDonec sapien malesuada auctor sapien arcu inceptos aenean consequat metus litora mattis, vivamus feugiat arcu adipiscing mauris primis ante ullamcorper ad nisi, lobortis arcu per orci malesuada blandit metus tortor urna turpis. \n</p>\n<p>\nConsectetur porttitor egestas sed eleifend eget tincidunt, pharetra varius tincidunt morbi malesuada elementum mi, torquent mollis eu lobortis curae. \nPurus amet vivamus amet nulla torquent nibh, eu diam aliquam pretium donec aliquam, tempus lacus tempus feugiat lectus. \nCras non velit mollis sit et integer egestas, habitant auctor integer sem at nam massa, himenaeos netus vel dapibus nibh malesuada. \nLeo fusce tortor sociosqu semper facilisis, semper class tempus faucibus tristique duis, eros cubilia quisque habitasse. \nAliquam fringilla orci non vel laoreet, dolor enim justo facilisis neque, accumsan in ad venenatis. \n</p>', 0, 3, 1),
(4, '2016-03-13 03:38:42', '2016-03-13 03:38:42', '<p>test comment</p>\r\n', 0, 1, 1),
(5, '2016-03-16 07:48:50', '2016-03-16 07:48:50', 'test comment from admin', 0, 1, 1),
(6, '2016-03-22 05:33:01', '2016-03-22 05:33:01', 'test comment', 0, 1, 8),
(7, '2016-03-22 05:33:07', '2016-03-22 05:33:07', 'test kagi', 0, 1, 8),
(8, '2016-03-22 07:02:50', '2016-03-22 07:02:50', 'dendy comment', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `text`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'Dupont', 'dupont@la.fr', 'Lorem ipsum inceptos malesuada leo fusce tortor sociosqu semper, facilisis semper class tempus faucibus tristique duis eros, cubilia quisque habitasse aliquam fringilla orci non. Vel laoreet dolor enim justo facilisis neque accumsan, in ad venenatis hac per dictumst nulla ligula, donec mollis massa porttitor ullamcorper risus. Eu platea fringilla, habitasse.', 0, '2016-03-13 03:14:45', '2016-03-13 03:14:45'),
(2, 'Durand', 'durand@la.fr', ' Lorem ipsum erat non elit ultrices placerat, netus metus feugiat non conubia fusce porttitor, sociosqu diam commodo metus in. Himenaeos vitae aptent consequat luctus purus eleifend enim, sollicitudin eleifend porta malesuada ac class conubia, condimentum mauris facilisis conubia quis scelerisque. Lacinia tempus nullam felis fusce ac potenti netus ornare semper molestie, iaculis fermentum ornare curabitur tincidunt imperdiet scelerisque imperdiet euismod.', 0, '2016-03-13 03:14:45', '2016-03-13 03:14:45'),
(3, 'Martin', 'martin@la.fr', 'Lorem ipsum tempor netus aenean ligula habitant vehicula tempor ultrices, placerat sociosqu ultrices consectetur ullamcorper tincidunt quisque tellus, ante nostra euismod nec suspendisse sem curabitur elit. Malesuada lacus viverra sagittis sit ornare orci, augue nullam adipiscing pulvinar libero aliquam vestibulum, platea cursus pellentesque leo dui. Lectus curabitur euismod ad, erat.', 1, '2016-03-13 03:14:45', '2016-03-13 03:14:45'),
(4, 'test', 'test@test.com', 'test message', 0, '2016-03-15 07:36:05', '2016-03-15 07:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_21_105844_create_roles_table', 1),
('2014_10_21_110325_create_foreign_keys', 1),
('2014_10_24_205441_create_contact_table', 1),
('2014_10_26_172107_create_posts_table', 1),
('2014_10_26_172631_create_tags_table', 1),
('2014_10_26_172904_create_post_tag_table', 1),
('2014_10_26_222018_create_comments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wisata_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `vote` tinyint(1) NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `slug`, `summary`, `content`, `thumbnail`, `wisata_type`, `seen`, `active`, `vote`, `user_id`) VALUES
(1, '2016-03-13 03:14:45', '2016-03-22 06:56:07', 'Post 1', 'post-1', 'Lorem ipsum volutpat velit mollis sit et integer egestas, habitant auctor integer sem at nam massa himenaeos netus, vel dapibus nibh malesuada leo fusce tortor. \r\nSociosqu semper facilisis semper class tempus faucibus tristique duis, eros cubilia quisque habitasse aliquam fringilla orci non vel, laoreet dolor enim justo facilisis neque accumsan. \r\n</p>', '<p>Lorem ipsum turpis ad venenatis hac per dictumst nulla ligula donec mollis, massa porttitor ullamcorper risus eu platea fringilla habitasse suscipit pellentesque donec est, habitant vehicula tempor ultrices placerat sociosqu ultrices consectetur ullamcorper tincidunt. Quisque tellus ante nostra euismod nec suspendisse sem curabitur elit, malesuada lacus viverra sagittis sit ornare orci augue nullam, adipiscing pulvinar libero aliquam vestibulum platea cursus pellentesque. Leo dui lectus curabitur euismod ad erat curae non elit ultrices placerat netus metus feugiat non, conubia fusce porttitor sociosqu diam commodo metus in himenaeos vitae aptent consequat luctus.</p>\r\n\r\n<p>Purus eleifend enim sollicitudin eleifend porta malesuada ac class conubia condimentum mauris, facilisis conubia quis scelerisque lacinia tempus nullam felis fusce ac potenti, netus ornare semper molestie iaculis fermentum ornare curabitur tincidunt imperdiet. Scelerisque imperdiet euismod scelerisque torquent curae rhoncus sollicitudin tortor placerat aptent hac, nec posuere suscipit sed tortor neque urna hendrerit vehicula duis, litora tristique congue nec auctor felis libero ornare habitasse nec. Elit felis inceptos tellus inceptos cubilia quis mattis faucibus, sem non odio fringilla class aliquam metus ipsum, lorem luctus pharetra dictum vehicula tempus in.</p>\r\n\r\n<p>Venenatis gravida ut gravida proin orci quis sed platea, mi quisque hendrerit semper hendrerit facilisis ante, sapien faucibus ligula commodo vestibulum rutrum pretium. Varius sem aliquet himenaeos dolor cursus nunc habitasse aliquam ut curabitur, ipsum luctus ut rutrum odio condimentum donec suscipit molestie est etiam, sit rutrum dui nostra sem aliquet conubia nullam sollicitudin. Rhoncus venenatis vivamus rhoncus netus risus tortor, non mauris turpis eget integer nibh, dolor commodo venenatis ut molestie. Semper adipiscing amet cras class donec sapien malesuada, auctor sapien arcu inceptos aenean consequat, metus litora mattis vivamus feugiat arcu.</p>\r\n\r\n<p>Adipiscing mauris primis ante ullamcorper ad nisi lobortis, arcu per orci malesuada blandit metus tortor, urna turpis consectetur porttitor egestas sed. Eleifend eget tincidunt pharetra varius tincidunt morbi malesuada, elementum mi torquent mollis eu lobortis, curae purus amet vivamus amet nulla. Torquent nibh eu diam aliquam pretium donec aliquam tempus lacus, tempus feugiat lectus cras non velit mollis sit et integer, egestas habitant auctor integer sem at nam massa. Himenaeos netus vel dapibus nibh malesuada leo fusce tortor, sociosqu semper facilisis semper class tempus faucibus, tristique duis eros cubilia quisque habitasse aliquam.</p>\r\n\r\n<p>Fringilla orci non vel laoreet dolor enim justo facilisis neque accumsan, in ad venenatis hac per dictumst nulla ligula donec. Mollis massa porttitor ullamcorper risus eu platea fringilla habitasse suscipit pellentesque, donec est habitant vehicula tempor ultrices placerat sociosqu ultrices, consectetur ullamcorper tincidunt quisque tellus ante nostra euismod nec. Suspendisse sem curabitur elit malesuada lacus viverra sagittis sit ornare orci, augue nullam adipiscing pulvinar libero aliquam vestibulum platea cursus pellentesque leo, dui lectus curabitur euismod ad erat curae non elit. Ultrices placerat netus metus feugiat non conubia fusce porttitor, sociosqu diam commodo metus in himenaeos vitae aptent consequat, luctus purus eleifend enim sollicitudin eleifend porta.</p>\r\n\r\n<p>Malesuada ac class conubia condimentum mauris facilisis conubia, quis scelerisque lacinia tempus nullam felis fusce, ac potenti netus ornare semper molestie. Iaculis fermentum ornare curabitur tincidunt imperdiet scelerisque, imperdiet euismod scelerisque torquent.</p>\r\n', '91604.png', 'Religi', 0, 1, 0, 1),
(2, '2016-03-13 03:14:45', '2016-03-22 04:17:09', 'Post 2', 'post-2', 'Lorem ipsum congue rhoncus sollicitudin tortor placerat, aptent hac nec posuere suscipit, sed tortor neque urna hendrerit. \r\nVehicula duis litora tristique congue nec auctor felis libero ornare habitasse, nec elit felis inceptos tellus inceptos cubilia quis mattis, faucibus sem non odio fringilla class aliquam metus ipsum. \r\nLorem luctus pharetra, dictum. ', '<p>Lorem ipsum convallis ac curae non elit ultrices placerat netus metus feugiat, non conubia fusce porttitor sociosqu diam commodo metus in himenaeos, vitae aptent consequat luctus purus eleifend enim sollicitudin eleifend porta. Malesuada ac class conubia condimentum mauris facilisis conubia quis scelerisque lacinia, tempus nullam felis fusce ac potenti netus ornare semper. Molestie iaculis fermentum ornare curabitur tincidunt imperdiet scelerisque, imperdiet euismod scelerisque torquent curae rhoncus, sollicitudin tortor placerat aptent hac nec. Posuere suscipit sed tortor neque urna hendrerit vehicula duis litora tristique congue nec auctor felis libero, ornare habitasse nec elit felis inceptos tellus inceptos cubilia quis mattis faucibus sem non.</p>\r\n\r\n<p>Odio fringilla class aliquam metus ipsum lorem luctus pharetra dictum, vehicula tempus in venenatis gravida ut gravida proin orci, quis sed platea mi quisque hendrerit semper hendrerit. Facilisis ante sapien faucibus ligula commodo vestibulum rutrum pretium, varius sem aliquet himenaeos dolor cursus nunc habitasse, aliquam ut curabitur ipsum luctus ut rutrum. Odio condimentum donec suscipit molestie est etiam sit rutrum dui nostra, sem aliquet conubia nullam sollicitudin rhoncus venenatis vivamus rhoncus netus, risus tortor non mauris turpis eget integer nibh dolor. Commodo venenatis ut molestie semper adipiscing amet cras, class donec sapien malesuada auctor sapien arcu inceptos, aenean consequat metus litora mattis vivamus.</p>\r\n\r\n<pre>\r\n<code class="language-php">protected function getUserByRecaller($recaller)\r\n{\r\n  if ($this-&gt;validRecaller($recaller) &amp;&amp; ! $this-&gt;tokenRetrievalAttempted)\r\n  {\r\n   $this-&gt;tokenRetrievalAttempted = true;\r\n\r\n   list($id, $token) = explode("|", $recaller, 2);\r\n\r\n   $this-&gt;viaRemember = ! is_null($user = $this-&gt;provider-&gt;retrieveByToken($id, $token));\r\n\r\n   return $user;\r\n }\r\n}</code></pre>\r\n\r\n<p>Feugiat arcu adipiscing mauris primis ante ullamcorper ad nisi, lobortis arcu per orci malesuada blandit metus tortor, urna turpis consectetur porttitor egestas sed eleifend. Eget tincidunt pharetra varius tincidunt morbi malesuada elementum mi torquent mollis, eu lobortis curae purus amet vivamus amet nulla torquent, nibh eu diam aliquam pretium donec aliquam tempus lacus. Tempus feugiat lectus cras non velit mollis sit et integer, egestas habitant auctor integer sem at nam massa himenaeos, netus vel dapibus nibh malesuada leo fusce tortor. Sociosqu semper facilisis semper class tempus faucibus tristique duis eros, cubilia quisque habitasse aliquam fringilla orci non vel, laoreet dolor enim justo facilisis neque accumsan in.</p>\r\n\r\n<p>Ad venenatis hac per dictumst nulla ligula donec, mollis massa porttitor ullamcorper risus eu platea, fringilla habitasse suscipit pellentesque donec est. Habitant vehicula tempor ultrices placerat sociosqu ultrices consectetur ullamcorper tincidunt quisque tellus, ante nostra euismod nec suspendisse sem curabitur elit malesuada lacus. Viverra sagittis sit ornare orci augue nullam adipiscing pulvinar libero aliquam vestibulum platea cursus pellentesque leo dui lectus, curabitur euismod ad erat curae non elit ultrices placerat netus metus feugiat non conubia fusce porttitor. Sociosqu diam commodo metus in himenaeos vitae aptent consequat luctus purus eleifend enim sollicitudin eleifend, porta malesuada ac class conubia condimentum mauris facilisis conubia quis scelerisque lacinia.</p>\r\n\r\n<p>Tempus nullam felis fusce ac potenti netus ornare semper molestie iaculis, fermentum ornare curabitur tincidunt imperdiet scelerisque imperdiet euismod. Scelerisque torquent curae rhoncus sollicitudin tortor placerat aptent hac, nec posuere suscipit sed tortor neque urna hendrerit, vehicula duis litora tristique congue nec auctor. Felis libero ornare habitasse nec elit felis, inceptos tellus inceptos cubilia quis mattis, faucibus sem non odio fringilla. Class aliquam metus ipsum lorem luctus pharetra dictum vehicula, tempus in venenatis gravida ut gravida proin orci, quis sed platea mi quisque hendrerit semper.</p>\r\n', '16964.png', 'Populer', 0, 1, 0, 2),
(3, '2016-03-13 03:14:45', '2016-03-25 05:15:13', 'Post 3', 'post-3', 'Lorem ipsum sem tempus in venenatis gravida ut gravida proin, orci quis sed platea mi quisque hendrerit semper hendrerit facilisis, ante sapien faucibus ligula commodo vestibulum rutrum pretium. \r\nVarius sem aliquet himenaeos dolor cursus nunc habitasse, aliquam ut curabitur ipsum luctus ut rutrum odio, condimentum donec suscipit molestie est etiam. ', '<p><img alt="" src="/filemanager/userfiles/user2/bleu-luma.png" style="float:left; height:152px; width:152px" />Lorem ipsum aenean dui nostra sem aliquet, conubia nullam sollicitudin rhoncus venenatis. Vivamus rhoncus netus risus tortor non mauris turpis, eget integer nibh dolor commodo venenatis, ut molestie semper adipiscing amet cras. Class donec sapien malesuada auctor sapien arcu inceptos aenean consequat metus litora mattis, vivamus feugiat arcu adipiscing mauris primis ante ullamcorper ad nisi lobortis arcu per, orci malesuada blandit metus tortor urna turpis consectetur porttitor egestas sed. Eleifend eget tincidunt pharetra varius tincidunt morbi malesuada elementum mi torquent mollis eu, lobortis curae purus amet vivamus amet nulla torquent nibh eu diam.</p>\r\n\r\n<p>Aliquam pretium donec aliquam tempus lacus tempus feugiat lectus cras non, velit mollis sit et integer egestas habitant auctor integer sem, at nam massa himenaeos netus vel dapibus nibh malesuada. Leo fusce tortor sociosqu semper facilisis semper class tempus, faucibus tristique duis eros cubilia quisque habitasse aliquam fringilla, orci non vel laoreet dolor enim justo. Facilisis neque accumsan in ad venenatis hac, per dictumst nulla ligula donec mollis, massa porttitor ullamcorper risus eu. Platea fringilla habitasse suscipit pellentesque donec est habitant vehicula tempor ultrices placerat sociosqu, ultrices consectetur ullamcorper tincidunt quisque tellus ante nostra euismod nec suspendisse.</p>\r\n\r\n<p>Sem curabitur elit malesuada lacus viverra sagittis sit ornare orci augue nullam adipiscing pulvinar libero aliquam vestibulum, platea cursus pellentesque leo dui lectus curabitur euismod ad erat curae non elit ultrices placerat. Netus metus feugiat non conubia fusce porttitor sociosqu diam commodo metus in himenaeos vitae, aptent consequat luctus purus eleifend enim sollicitudin eleifend porta malesuada ac class. Conubia condimentum mauris facilisis conubia quis scelerisque, lacinia tempus nullam felis fusce, ac potenti netus ornare semper. Molestie iaculis fermentum ornare curabitur tincidunt imperdiet scelerisque imperdiet, euismod scelerisque torquent curae rhoncus sollicitudin tortor, placerat aptent hac nec posuere suscipit sed.</p>\r\n\r\n<p>Tortor neque urna hendrerit vehicula duis litora tristique, congue nec auctor felis libero ornare habitasse, nec elit felis inceptos tellus inceptos. Cubilia quis mattis faucibus sem non odio fringilla, class aliquam metus ipsum lorem luctus pharetra dictum, vehicula tempus in venenatis gravida ut. Gravida proin orci quis sed platea mi quisque hendrerit, semper hendrerit facilisis ante sapien faucibus ligula, commodo vestibulum rutrum pretium varius sem aliquet. Himenaeos dolor cursus nunc habitasse aliquam ut curabitur ipsum luctus ut rutrum odio condimentum, donec suscipit molestie est etiam sit rutrum dui nostra sem aliquet conubia.</p>\r\n\r\n<p>Nullam sollicitudin rhoncus venenatis vivamus rhoncus netus risus tortor non mauris turpis, eget integer nibh dolor commodo venenatis ut molestie semper adipiscing amet, cras class donec sapien malesuada auctor sapien arcu inceptos aenean. Consequat metus litora mattis vivamus feugiat arcu adipiscing mauris primis ante ullamcorper ad nisi, lobortis arcu per orci malesuada blandit metus tortor urna turpis consectetur. Porttitor egestas sed eleifend eget tincidunt pharetra varius, tincidunt morbi malesuada elementum mi torquent mollis eu, lobortis curae purus amet vivamus amet. Nulla torquent nibh eu diam aliquam pretium donec aliquam, tempus lacus tempus feugiat lectus cras non, velit mollis sit et integer egestas habitant.</p>\r\n\r\n<p>Auctor integer sem at nam massa himenaeos netus vel dapibus, nibh malesuada leo fusce tortor sociosqu semper.</p>\r\n', '71921.png', 'Kuliner', 0, 1, 0, 2),
(4, '2016-03-13 03:14:45', '2016-03-22 04:17:12', 'Post 4', 'post-4', 'Lorem ipsum diam semper class tempus faucibus tristique duis eros cubilia quisque habitasse, aliquam fringilla orci non vel laoreet dolor enim justo facilisis. \r\nNeque accumsan in ad venenatis hac per dictumst nulla ligula donec mollis massa porttitor ullamcorper, risus eu platea fringilla habitasse suscipit pellentesque donec est habitant vehicula tempor. ', '<p>Lorem ipsum donec placerat sociosqu ultrices consectetur ullamcorper tincidunt, quisque tellus ante nostra euismod nec suspendisse, sem curabitur elit malesuada lacus viverra sagittis. Sit ornare orci augue nullam adipiscing pulvinar libero aliquam vestibulum, platea cursus pellentesque leo dui lectus curabitur. Euismod ad erat curae non elit ultrices placerat netus metus feugiat, non conubia fusce porttitor sociosqu diam commodo metus in himenaeos, vitae aptent consequat luctus purus eleifend enim sollicitudin eleifend. Porta malesuada ac class conubia condimentum mauris facilisis conubia quis, scelerisque lacinia tempus nullam felis fusce ac potenti netus, ornare semper molestie iaculis fermentum ornare curabitur tincidunt.</p>\r\n\r\n<p>Imperdiet scelerisque imperdiet euismod scelerisque torquent curae rhoncus sollicitudin tortor placerat, aptent hac nec posuere suscipit sed tortor neque urna hendrerit, vehicula duis litora tristique congue nec auctor felis libero. Ornare habitasse nec elit felis inceptos tellus inceptos, cubilia quis mattis faucibus sem non odio, fringilla class aliquam metus ipsum lorem. Luctus pharetra dictum vehicula tempus in venenatis gravida ut gravida proin orci, quis sed platea mi quisque hendrerit semper hendrerit facilisis ante sapien faucibus, ligula commodo vestibulum rutrum pretium varius sem aliquet himenaeos dolor. Cursus nunc habitasse aliquam ut curabitur ipsum luctus ut rutrum, odio condimentum donec suscipit molestie est etiam sit, rutrum dui nostra sem aliquet conubia nullam sollicitudin.</p>\r\n\r\n<p>Rhoncus venenatis vivamus rhoncus netus risus tortor non mauris, turpis eget integer nibh dolor commodo venenatis ut, molestie semper adipiscing amet cras class donec. Sapien malesuada auctor sapien arcu inceptos aenean consequat metus, litora mattis vivamus feugiat arcu adipiscing mauris, primis ante ullamcorper ad nisi lobortis arcu. Per orci malesuada blandit metus tortor urna turpis consectetur porttitor egestas sed, eleifend eget tincidunt pharetra varius tincidunt morbi malesuada elementum mi. Torquent mollis eu lobortis curae purus amet vivamus, amet nulla torquent nibh eu diam aliquam pretium, donec aliquam tempus lacus tempus feugiat.</p>\r\n\r\n<p>Lectus cras non velit mollis sit et integer egestas habitant, auctor integer sem at nam massa himenaeos netus vel dapibus, nibh malesuada leo fusce tortor sociosqu semper facilisis. Semper class tempus faucibus tristique duis eros cubilia quisque habitasse aliquam fringilla orci non vel laoreet dolor, enim justo facilisis neque accumsan in ad venenatis hac per dictumst nulla ligula donec mollis. Massa porttitor ullamcorper risus eu platea fringilla habitasse suscipit pellentesque donec, est habitant vehicula tempor ultrices placerat sociosqu ultrices consectetur ullamcorper, tincidunt quisque tellus ante nostra euismod nec suspendisse sem.</p>\r\n\r\n<p>Curabitur elit malesuada lacus viverra sagittis sit ornare orci, augue nullam adipiscing pulvinar libero aliquam vestibulum platea, cursus pellentesque leo dui lectus curabitur euismod. Ad erat curae non elit ultrices placerat netus metus feugiat, non conubia fusce porttitor sociosqu diam commodo metus in, himenaeos vitae aptent consequat luctus purus eleifend enim. Sollicitudin eleifend porta malesuada ac class conubia condimentum mauris facilisis conubia quis, scelerisque lacinia tempus nullam felis fusce ac potenti netus. Ornare semper molestie iaculis fermentum ornare curabitur tincidunt imperdiet, scelerisque imperdiet euismod scelerisque torquent curae rhoncus sollicitudin, tortor placerat aptent hac nec posuere suscipit.</p>\r\n\r\n<p>Sed tortor neque urna hendrerit vehicula duis litora tristique, congue nec auctor felis libero ornare.</p>\r\n', '31830.png', 'Alam', 0, 1, 0, 2),
(8, '2016-03-21 08:04:33', '2016-03-22 04:17:13', 'test ting', 'test-ting', 'haha testing', '<p>haha testing haha testinghaha testing haha testing haha testing</p>\r\n', '', 'Populer', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3),
(6, 3, 1),
(7, 3, 2),
(8, 3, 4),
(15, 2, 4),
(16, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `post_vote`
--

CREATE TABLE `post_vote` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_vote`
--

INSERT INTO `post_vote` (`id`, `post_id`, `user_id`, `vote`) VALUES
(1, 3, 1, 5),
(2, 8, 1, 3),
(12, 8, 2, 1),
(13, 1, 1, 3),
(14, 4, 1, 5),
(15, 1, 2, 1),
(16, 2, 3, 2),
(17, 2, 1, 1),
(18, 2, 2, 1),
(19, 2, 5, 1),
(20, 8, 5, 5),
(21, 8, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2016-03-13 03:14:44', '2016-03-13 03:14:44'),
(2, 'Redactor', 'redac', '2016-03-13 03:14:44', '2016-03-13 03:14:44'),
(3, 'User', 'user', '2016-03-13 03:14:44', '2016-03-13 03:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `created_at`, `updated_at`, `title`, `content`, `thumbnail`, `seen`, `active`) VALUES
(2, '2016-03-21 07:55:45', '2016-03-22 06:27:44', 'slider 4', '<h1>Easy to customize</h1>\r\n<ul class="list-style-none">\r\n    <li>7 preprepared colour variations.</li>\r\n    <li>Easily to change fonts</li>\r\n</ul>', '14613.png', 0, 1),
(3, '2016-03-21 08:00:35', '2016-03-22 06:26:49', 'slider 3', '<h1>Design</h1>\r\n\r\n<ul>\r\n  <li>Clean and elegant design</li>\r\n <li>Full width and boxed mode</li>\r\n  <li>Easily readable Roboto font and awesome icons</li>\r\n  <li>7 preprepared colour variations</li>\r\n</ul>\r\n', '67404.png', 0, 0),
(4, '2016-03-21 08:02:37', '2016-03-22 06:25:20', 'slider 2', '<h2>46 HTML pages full of features</h2>\r\n<ul class="list-style-none">\r\n    <li>Sliders and carousels</li>\r\n    <li>4 Header variations</li>\r\n    <li>Google maps, Forms, Megamenu, CSS3 Animations and much more</li>\r\n    <li>+ 11 extra pages showing template features</li>\r\n</ul>', '67933.png', 0, 0),
(5, '2016-03-21 08:16:24', '2016-03-22 06:59:30', 'slider 1', '<h1>Multipurpose responsive theme</h1>\r\n\r\n<p>Business. Corporate. Agency.<br />\r\nPortfolio. Blog. E-commerce.</p>\r\n', '53369.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `created_at`, `updated_at`, `tag`) VALUES
(1, '2016-03-13 03:14:45', '2016-03-13 03:14:45', 'Tag1'),
(2, '2016-03-13 03:14:45', '2016-03-13 03:14:45', 'Tag2'),
(3, '2016-03-13 03:14:45', '2016-03-13 03:14:45', 'Tag3'),
(4, '2016-03-13 03:14:45', '2016-03-13 03:14:45', 'Tag4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `seen`, `valid`, `confirmed`, `confirmation_code`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'GreatAdmin', 'admin@la.fr', '$2y$10$l8EYCuAr4t5F/QNNr5NTxOIW.AfZL9zggwZb5VFXdJGP92Hl312dO', 1, 1, 1, 1, NULL, '2016-03-13 03:14:44', '2016-06-13 04:23:37', 'Z1Fg6KecuOL3dmxpcdt6o3A3Lz1TkeJ3jZdHouEuBB7UrqrLuhubqTYus8a0'),
(2, 'GreatRedactor', 'redac@la.fr', '$2y$10$ygjhkR2ApavKRjKWvlzGPOcgwkMLKSl0N.SOUK9TFAHhYlX6lhRg2', 2, 1, 1, 1, NULL, '2016-03-13 03:14:44', '2016-06-13 04:23:57', 'ZA4UUwnWLizYrL3G571LehIhYQyUCEcAtskhmWJxGmOiKYtkM13xmbTOyWl5'),
(3, 'Walker', 'walker@la.fr', '$2y$10$YaF1ozDqL6Snjh7B2f/bEeOHM6maccvhC6fUp9Yh7lH/oEFBmm.je', 3, 0, 0, 1, NULL, '2016-03-13 03:14:44', '2016-06-13 03:42:32', '5iNmk1tmrMBU4Dn6vgv4gWlov97T5K2ZJUfi5wkUu68yJAzVTFzj3VkZdUQh'),
(4, 'Slacker', 'slacker@la.fr', '$2y$10$hHPRyWYt9r.ApfXRHXve7uRxGxuK7Qrd/nXn4Ep7q38PxIGjTK2ia', 3, 1, 0, 0, NULL, '2016-03-13 03:14:45', '2016-03-13 03:18:03', NULL),
(5, 'dila', 'dzylar@gmail.com', '$2y$10$mnP8Dblm8hagjWfSlsatu.T5MygpmDKN5RpijEgI367JMCVJHnI46', 3, 0, 0, 1, NULL, '2016-05-19 07:18:20', '2016-06-13 04:22:44', 'cY9nLbOSKGhhrwYs2a9KbzYtf7q0gokGaQUUiJMYR78T6PFSbphneddnP3o8'),
(6, 'choirul', 'choimuhtadin@gmail.com', '$2y$10$mnP8Dblm8hagjWfSlsatu.T5MygpmDKN5RpijEgI367JMCVJHnI46', 3, 0, 0, 0, 'IqSYLGm3uuTMlcGgycAaOj8kTYNvys', '2016-05-19 07:22:20', '2016-05-19 07:22:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `post_vote`
--
ALTER TABLE `post_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_tag_unique` (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `post_vote`
--
ALTER TABLE `post_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
