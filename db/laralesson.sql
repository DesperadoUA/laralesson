-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 21 2021 г., 18:28
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laralesson`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog_meta`
--

CREATE TABLE `blog_meta` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog_meta`
--

INSERT INTO `blog_meta` (`post_id`, `author`) VALUES
(4, 'Толстой'),
(86, ''),
(87, 'Author'),
(89, 'new post blog ua'),
(91, 'fdsfds fsdfs'),
(92, 'Ne post blog ru test');

-- --------------------------------------------------------

--
-- Структура таблицы `bonus_casino`
--

CREATE TABLE `bonus_casino` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `relative_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bonus_casino`
--

INSERT INTO `bonus_casino` (`post_id`, `relative_id`) VALUES
(67, 24),
(67, 27),
(67, 39);

-- --------------------------------------------------------

--
-- Структура таблицы `bonus_meta`
--

CREATE TABLE `bonus_meta` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `bonus` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_wagering` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bonus_meta`
--

INSERT INTO `bonus_meta` (`post_id`, `bonus`, `bonus_wagering`, `rating`) VALUES
(50, 'bonus value 1', 'bonus wagering value', 59),
(51, 'bonus value 2', 'bonus wager 2', 92),
(52, '', '', 0),
(54, '', '', 0),
(55, '', '', 0),
(56, '', '', 0),
(57, '', '', 0),
(58, '', '', 0),
(59, '', '', 0),
(61, 'Add bonus new', 'Add bonus new', 90),
(64, 'New post bonus', 'New post bonus', 87),
(67, 'bonus valuev', 'bonus rating', 73);

-- --------------------------------------------------------

--
-- Структура таблицы `casino_meta`
--

CREATE TABLE `casino_meta` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_wagering` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freespins` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freespins_wagering` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `methods_pay` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `methods_payout` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_deposit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_payout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valuta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendors` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_iframe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_offers` tinyint(1) NOT NULL DEFAULT 1,
  `live_chat` tinyint(1) NOT NULL DEFAULT 1,
  `live_casino` tinyint(1) NOT NULL DEFAULT 1,
  `vip_program` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `casino_meta`
--

INSERT INTO `casino_meta` (`post_id`, `icon`, `license`, `bonus`, `bonus_wagering`, `freespins`, `freespins_wagering`, `currency`, `faq`, `faq_title`, `methods_pay`, `methods_payout`, `min_deposit`, `min_payout`, `rating`, `ref`, `sub_title`, `valuta`, `vendors`, `video_banner`, `video_iframe`, `regular_offers`, `live_chat`, `live_casino`, `vip_program`) VALUES
(2, '', '', 'casino bonus 1', '', '', '', 'casino currency', '[]', 'casino faq title', 'casino methods pay', 'casino methods payout', 'casino min deposit', 'casino min pay out', 20, '[\"Good day\",\"hrthrt\",\"sdadas\"]', 'Sub title casino', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video iframe', 1, 1, 1, 1),
(3, '', '', 'casino bonus 1', '', '', '', 'casino currency', '[{\"value_1\":\"fds\",\"value_2\":\"fsdfs\"},{\"value_1\":\"fsdfs\",\"value_2\":\"fsdfs\"}]', 'casino faq title', 'casino methods pay', 'casino methods payout', 'casino min deposit', 'casino min pay out', 40, '[]', 'Sub title casino', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video iframe', 1, 1, 1, 1),
(8, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 35, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(9, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 48, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(11, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 27, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(12, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 42, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(13, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 34, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(14, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 73, '/go/', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(15, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 65, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(16, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 38, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(17, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 94, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(18, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 46, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(19, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 75, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(20, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 66, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(21, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 55, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(22, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 43, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(23, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 53, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(24, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 78, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(25, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 36, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(26, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 88, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(27, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 45, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(28, '', '', 'Casino bonus', '', '', '', 'Casino currency', '[]', 'Faq Title', 'Methods pay', 'Methods payout', 'Min deposit', 'Min payout', 97, '[]', 'Sub title', '50 UAH / 10 USD / 250 RUB', 'Vendors', 'video banner link', 'video_iframe', 1, 1, 1, 1),
(30, '', '', '', '', '', '', '', '[]', '', '', '', '', '', 90, '', '', '', '', '', '', 1, 1, 1, 1),
(31, '', '', '', '', '', '', '', '[{\"value_1\":null,\"value_2\":null}]', '', '', '', '', '', 0, '[\"dfgd\",\"gdgd\"]', '', '', '', '', '', 1, 1, 1, 1),
(32, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1, 1, 1, 1),
(33, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1, 1, 1, 1),
(35, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1, 1, 1, 1),
(36, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1, 1, 1, 1),
(37, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1, 1, 1, 1),
(38, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1, 1, 1, 1),
(39, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1, 1, 1, 1),
(40, '', '', '', '', '', '', '', '[]', '', '', '', '', '', 0, '[]', '', '', '', '', '', 1, 1, 1, 1),
(41, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1, 1, 1, 1),
(42, '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 1, 1, 1, 1),
(44, '', '', '', '', '', '', '', '[]', '', '', '', '', '', 0, '[]', '', '', '', '', '', 1, 1, 1, 1),
(45, 'http://127.0.0.1:8000/img/default.jpg', 'test field licenses', 'Bonus value gg', 'Bonus wagering gg', 'Freespins value gg', 'Freespins wagering gg', '', '[{\"value_1\":\"fdsfs gg\",\"value_2\":\"fdsfs gg\"},{\"value_1\":\"Keywords main page New gg\",\"value_2\":\"khflsddhf fdhslkfhsd fidshfiosh gg\"},{\"value_1\":\"gffdg gg\",\"value_2\":\"gfdgd gg\"}]', 'Faq title Good day gg', '', '', '', '', 93, '[\"test link 1 gg\",\"test link 3 gg\",\"test link 4 gg\"]', '', '', '', '', '', 1, 0, 0, 1),
(63, 'http://127.0.0.1:8000/downloads/60a61739a2e50.jpeg', 'test license', 'New casino item Bonus value', 'New casino item Bonus wager', 'New casino item freespins', 'New casino item free spins', '', '[{\"value_1\":\"New casino item faq\",\"value_2\":\"New casino item faq\"},{\"value_1\":\"New casino item faq\",\"value_2\":\"New casino item faq\"}]', 'New casino item', '', '', '', '', 90, '[\"New casino item ref_link\",\"New casino item ref_link\"]', '', '', '', '', '', 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `casino_payment`
--

CREATE TABLE `casino_payment` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `relative_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `casino_payment`
--

INSERT INTO `casino_payment` (`post_id`, `relative_id`) VALUES
(44, 81),
(63, 82),
(63, 96);

-- --------------------------------------------------------

--
-- Структура таблицы `casino_vendor`
--

CREATE TABLE `casino_vendor` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `relative_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `casino_vendor`
--

INSERT INTO `casino_vendor` (`post_id`, `relative_id`) VALUES
(3, 83),
(3, 100),
(3, 103),
(44, 106),
(63, 99),
(63, 101),
(63, 103),
(45, 83),
(45, 103);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'category',
  `status` enum('public','hide','basket') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'category',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` int(11) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `post_type`, `status`, `permalink`, `slug`, `title`, `thumbnail`, `short_desc`, `h1`, `meta_title`, `description`, `keywords`, `content`, `lang`, `create_at`, `update_at`) VALUES
(1, 4, 'category', 'public', 'category_1', 'category', 'category_1 good', 'http://127.0.0.1:8000/downloads/609a8f6cccd9a.jpeg', 'Short desc main page', 'h1 main page', 'Meta title main page', 'Description main page', 'Keywords main page', '&lt;h2&gt;Скандальный рэпер внесен в перечень лиц, которые создают угрозу нацбезопасности Украины, из-за пропаганды насилия и наркотиков.&lt;/h2&gt;&lt;p&gt;Российский рэп-исполнитель Моргенштерн (Алишер Валеев) попал в список лиц, представляющих угрозу нацбезопасности Украины, из-за пропаганды насилия и жестокости. Об этом сообщила Служба безопасности Украины в ответ на запрос издания&amp;nbsp;&lt;a href=&amp;quot;https://ukranews.com/ua/news/774906-morgenshtern-zagrozu-natsbezpetsi-stanovyt-cherez-propagandu-kultu-nasylstva-i-zhorstokosti-sbu&amp;quot; rel=&amp;quot;noopener noreferrer&amp;quot; target=&amp;quot;_blank&amp;quot; style=&amp;quot;color: rgb(198, 3, 4);&amp;quot;&gt;Українські Новини&lt;/a&gt;.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2026-06-18 21:00:00', '2023-08-17 21:00:00'),
(2, 7, 'category', 'public', 'category_2', 'category', 'category_2', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '&lt;p&gt;Content page casino good day&lt;/p&gt;', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(3, 0, 'category', 'public', 'category_3', 'category', 'category_3', 'https://profimtk.ru/wp-content/uploads/2021/04/roxcasino.png', 'Short desc main page ua', 'h1 main page ua', 'Meta title main page ua', 'Description main page ua', 'Keywords main page ua', 'Content main page ua', 2, '2021-04-19 11:34:46', '2021-04-19 11:34:46'),
(4, 0, 'category', 'public', 'category_4', 'category', 'category_4', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(5, 0, 'category', 'public', 'category_5', 'category', 'category_5', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(6, 0, 'category', 'public', 'category_6', 'category', 'category_6', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(7, 0, 'category', 'public', 'category_7', 'category', 'category_7', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(8, 7, 'category', 'public', 'category_8', 'category', 'category_8', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '&lt;p&gt;Content page casino&lt;/p&gt;', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(9, 6, 'category', 'public', 'category_9', 'category', 'category_9', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '&lt;p&gt;Content page casino&lt;/p&gt;', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_04_07_093729_posts', 2),
(4, '2021_04_07_094942_posts', 3),
(5, '2021_04_07_125928_reviews', 4),
(6, '2021_04_07_131055_casino_meta', 5),
(7, '2021_04_07_131056_casino_meta', 6),
(8, '2021_04_07_125929_reviews', 7),
(9, '2021_04_07_125930_reviews', 8),
(10, '2021_04_07_131058_casino_meta', 9),
(11, '2021_04_07_131058_blog_meta', 10),
(12, '2014_10_15_000000_create_users_table', 11),
(13, '2021_04_07_094942_pages', 12),
(14, '2014_10_15_000000_create_options_table', 13),
(15, '2014_10_15_000001_create_settings_table', 14),
(16, '2014_03_07_131058_payment_meta', 15),
(17, '2014_03_07_131058_vendor_meta', 16),
(18, '2013_04_07_125930_post_category', 17),
(19, '2013_04_06_125930_casino_vendor', 18),
(20, '2013_04_05_125930_casino_payment', 19),
(21, '2013_04_04_125930_casino_bonus', 20),
(22, '2013_04_05_125930_bonus_casino', 21),
(23, '2013_04_04_125930_slot_casino', 22),
(24, '2013_04_03_125930_slot_vendor', 23);

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'options',
  `key_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `slug`, `key_id`, `value`, `title`, `editor`) VALUES
(1, 'options', 'logo', 'http://127.0.0.1:8000/downloads/609a468e53571.jpeg', 'Logo', 'image');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'static-pages',
  `status` enum('public','hide','basket') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'static-pages',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` int(11) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `post_type`, `status`, `permalink`, `slug`, `title`, `thumbnail`, `short_desc`, `h1`, `meta_title`, `description`, `keywords`, `content`, `lang`, `create_at`, `update_at`) VALUES
(1, 'static-pages', 'public', '/', 'static-pages', 'Main page Ru', 'http://127.0.0.1:8000/downloads/609a8f6cccd9a.jpeg', 'Short desc main page', 'h1 main page', 'Meta title main page', 'Description main page', 'Keywords main page', '&lt;pre class=&amp;quot;ql-syntax&amp;quot; spellcheck=&amp;quot;false&amp;quot;&gt;&amp;lt;h1&amp;gt;Our Team of Casino Experts Are Here For You!&amp;lt;/h1&amp;gt;\n&amp;lt;p&amp;gt;\nHere at CanadaCasino, we pride ourselves on providing honest casino reviews and guides, prepared for you by casino experts with years of experience in the gambling industry.\nWe know exactly what to look for in a casino, and our aim is to make it easier for you to discover those online platforms that offer variety, rewards and peace of mind.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;Save time and money as you treat yourself to an online casino experience that’s brimming with opportunities!&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;Our casino reviews are expertly researched, critical and balanced, and we provide insight on every aspect, bringing to our readers an honest casino review process.&amp;lt;/p&amp;gt;\n&amp;nbsp;&amp;lt;h2&amp;gt;The Legality of Online Casinos in Canada&amp;lt;/h2&amp;gt;\n&amp;lt;p&amp;gt;In Canada, the individual provinces regulate gambling at a local level. However, the current legislation does not cater to online casinos operated by offshore companies.&amp;nbsp;\n&amp;lt;/p&amp;gt;\n&amp;lt;h3&amp;gt;But this does not make playing at an offshore online casino illegal.&amp;lt;/h3&amp;gt;\n&amp;lt;p&amp;gt;\nThat said, Canadian players must be extra careful which casinos to join, since the consequences of depositing funds with an unlicensed casino can be dire indeed!\nAcross the gaming industry, there are various licencing bodies, which include the Malta Gaming Authority (MGA), Curacao eGaming, the Kahnawake Gaming Commission and the Alderney Gambling Control Commission.&amp;lt;/p&amp;gt;\n&amp;lt;p&amp;gt;\nWe always deal with online casinos that hold a license by at least one of these regulators.&amp;nbsp;\nSo what does it mean when a casino is licensed?&amp;lt;/p&amp;gt;\n&lt;/pre&gt;', 1, '2026-06-18 21:00:00', '2023-08-17 21:00:00'),
(2, 'static-pages', 'public', 'casino', 'static-pages', 'Page casino', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(3, 'static-pages', 'public', 'ua', 'static-pages', 'Main page Ua', 'https://profimtk.ru/wp-content/uploads/2021/04/roxcasino.png', 'Short desc main page ua', 'h1 main page ua', 'Meta title main page ua', 'Description main page ua', 'Keywords main page ua', 'Content main page ua', 2, '2021-04-19 11:34:46', '2021-04-19 11:34:46'),
(4, 'static-pages', 'public', 'casino-2', 'static-pages', 'Page casino 2', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(5, 'static-pages', 'public', 'casino-3', 'static-pages', 'Page casino 3', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(6, 'static-pages', 'public', 'casino-4', 'static-pages', 'Page casino 4', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(7, 'static-pages', 'public', 'casino-5', 'static-pages', 'Page casino 5', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(8, 'static-pages', 'public', 'casino-6', 'static-pages', 'Page casino 6', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(9, 'static-pages', 'public', 'casino-7', 'static-pages', 'Page casino 7', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '<p>Content page casino</p>', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19'),
(10, 'static-pages', 'public', 'casino-8', 'static-pages', 'Page casino 8', 'http://127.0.0.1:8000/downloads/60812e7a7c496.jpeg', 'Short desc page casino', 'h1 page casino', 'Meta title page casino', 'Description page casino', 'Keywords page casino', '&lt;p&gt;Content page casino&lt;/p&gt;', 1, '2021-04-19 11:47:19', '2021-04-19 11:47:19');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `payment_meta`
--

CREATE TABLE `payment_meta` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `faq` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_title` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `payment_meta`
--

INSERT INTO `payment_meta` (`post_id`, `faq`, `faq_title`) VALUES
(80, '[{\"value_1\":\"Add new payment\",\"value_2\":\"Add new payment\"}]', 'Add new payment'),
(81, '[{\"value_1\":\"Add new payment ua\",\"value_2\":\"Add new payment ua\"}]', 'Add new payment ua'),
(82, '[{\"value_1\":\"New payment post\",\"value_2\":\"New payment post\"}]', 'New payment post'),
(96, '[{\"value_1\":\"add new post payment\",\"value_2\":\"add new post payment\"}]', 'add new post payment');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('public','hide','basket') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public',
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` int(11) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `post_type`, `status`, `permalink`, `slug`, `title`, `thumbnail`, `short_desc`, `h1`, `meta_title`, `description`, `keywords`, `content`, `lang`, `create_at`, `update_at`) VALUES
(2, 'casino', 'public', 'novyy-url-dlya-novogo-kazino-privet', 'casino', 'ReelEmperor Update', 'http://127.0.0.1:8000/downloads/608a5b5ef38c1.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить королевский сервис.', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания New', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', '&lt;h1&gt;New content&lt;/h1&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Геймер, выбирающий азартные игры в качестве развлечения, желает получить королевский сервис, который обеспечивает современное, надежное, обладающие достаточным опытом &lt;a href=&amp;quot;//onlinecasino.kiev.ua/&amp;quot; rel=&amp;quot;noopener noreferrer&amp;quot; target=&amp;quot;_blank&amp;quot;&gt;онлайн казино на реальные деньги&lt;/a&gt; ReelEmperor. Ценителям азартных развлечений гарантировано высокое качество сессии, прозрачность игрового процесса, обилие выгодных предложений.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;h2&gt;Пользователям из стран бывшего СНГ стоит посетить сайт ReelEmperor&lt;/h2&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Пользователям из стран бывшего СНГ стоит посетить сайт ReelEmperor, отличающийся стильным дизайном. Логотип виртуального заведения известен опытным поклонникам гемблинга, визуализируя королевского пингвина и трио счастливых семерок. Казино отличается безупречной репутацией, гарантируя клиенту удовольствие от виртуального досуга. Игрока ждут разнообразные бонусы, грандиозный ассортимент развлечений.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;При первом взгляде на главную страницу ReelEmperor становится ясно, что в дизайне сделали ставку на нестареющую классику, используя классические цветовые схемы. Задний план выкрашен в насыщенно-синие оттенки, создающие впечатление респектабельности и вызывая ассоциации со стилистикой игровых клубов офлайн, безумно популярных в прошлом. Притягивают взгляд яркие превью и баннеры, приглашающие оценить разнообразие приятных сюрпризов от казино. Структура сайта доступна для понимания; навигация проста, радуя новичков, осваивающих территории гемблинга.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Регистрация обеспечивает гостю ReelEmperor больше прав и возможностей: создав и заполнив аккаунт, гемблер способен пополнять счёт, приступая к сессии на реальные средства; запрашивать бонус-коды. Представлен список социальных сетей, пригодных для быстрой идентификации. Игрокам предлагается и стандартная форма регистрации, в поля которой необходимо ввести контактную и персональную информацию; придумать уникальные логин, пароль. Затем последует выбор игровой валюты и подтверждение сведений о пользователе.&lt;/p&gt;&lt;h3&gt;&lt;br&gt;&lt;/h3&gt;&lt;h3&gt;Пользователям из стран бывшего СНГ стоит посетить сайт ReelEmperor&lt;/h3&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Общее число автоматов ReelEmperor превышает 300 моделей. Клиенты игрового ресурса будут впечатлены обилием симуляторов, среди которых значительный процент занимают видеослоты. Игры упомянутой категории легки в освоении, отличаясь лаконичной навигационной панелью, наличием специальных символов, дополнительных мини-игр. Правила игры на слотах предельно просты, что делает их отличным трамплином для освоения базовых принципов игрового процесса. Казино ReelEmperor предлагает продукцию молодых производителей и именитых брендов. Карточные забавы представлены в широком диапазоне: видеопокер, баккара, блэкджек и прочие увлекательные аппараты предлагаются в модифицированных версиях. Позволяется задействовать несколько боксов, что повышает шансы на успешное завершение партии. Не остались без внимания и поклонники Колеса Фортуны - рулетки.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Симуляторы покоряют детализированным оформлением, приближающим виртуальное развлечение к реальной сессии в казино. Новичку легко сориентироваться, предпочитая проверенные аппараты, формирующие раздел &amp;quot;Лучший выбор&amp;quot;. В некоторых моделях на кону стоит накопительный джек-пот. Можно активировать демонстрационные версии, изучая особенности автоматов. Заведение регулярно проводит турнирные состязания: ежедневно клиентам предлагается новая тематика; впечатляет внушительное количество призовых мест и хорошие выигрыши. Победители становятся обладателями компьютерных очков, пригодных для обмена и совершения ставок.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Казино ReelEmperor предлагает скрасить пребывание на сайте, заказывая бонус-коды. Геймер, пополняющий счёт, получает удвоенную сумму на баланс. По условиям бонуса кэшбэк возвращается 10-15% от не сыгравших ставок. Благодаря грамотной программе лояльности статус игрока растет в соответствии с набранными баллами. Периодически проводятся разнообразные акции, лотереи; рассылка тематической информации поступает на электронный ящик, указанный при регистрации. В качестве игровой валюты ReelEmperor принимает российский рубль, украинскую гривну, американский доллар. Пополниться можно с помощью карточек Visa/MasterCard; платежных систем Qiwi, Альфа-банк, WebMoney, с помощью мобильного банкинга при наличии российского номера. Сроки вывода средств не превышают двух рабочих дней.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Деятельность казино лицензирована; ReelEmperor функционирует на софте от Microgaming. Консультанты техподдержки, говорящие по-русски, оперативно решает любые проблемы, предлагая связь посредством электронной почты, телефонного звонка. Казино покоряет наличием русскоязычного сайта, обилием игровых предложений, наличием всевозможных бонусов, высоким качеством программного обеспечения и надежностью сессии.&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2022-03-17 22:00:00'),
(3, 'casino', 'public', 'reelemperor-2', 'casino', 'ReelEmperor-2', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить королевский сервис.', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title 2', 'ReelEmperor Description 2', 'ReelEmperor Keywords 2', '&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Геймер, выбирающий азартные игры в качестве развлечения, желает получить королевский сервис, который обеспечивает современное, надежное, обладающие достаточным опытом &lt;a title=&amp;quot;онлайн казино Украина&amp;quot; href=&amp;quot;//onlinecasino.kiev.ua/&amp;quot;&gt;онлайн казино на реальные деньги&lt;/a&gt; ReelEmperor. Ценителям азартных развлечений гарантировано высокое качество сессии, прозрачность игрового процесса, обилие выгодных предложений.&lt;/p&gt;\r\n\r\n&lt;h2 data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Пользователям из стран бывшего СНГ стоит посетить сайт ReelEmperor&lt;/h2&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Пользователям из стран бывшего СНГ стоит посетить сайт ReelEmperor, отличающийся стильным дизайном. Логотип виртуального заведения известен опытным поклонникам гемблинга, визуализируя королевского пингвина и трио счастливых семерок. Казино отличается безупречной репутацией, гарантируя клиенту удовольствие от виртуального досуга. Игрока ждут разнообразные бонусы, грандиозный ассортимент развлечений.&lt;/p&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;При первом взгляде на главную страницу ReelEmperor становится ясно, что в дизайне сделали ставку на нестареющую классику, используя классические цветовые схемы. Задний план выкрашен в насыщенно-синие оттенки, создающие впечатление респектабельности и вызывая ассоциации со стилистикой игровых клубов офлайн, безумно популярных в прошлом. Притягивают взгляд яркие превью и баннеры, приглашающие оценить разнообразие приятных сюрпризов от казино. Структура сайта доступна для понимания; навигация проста, радуя новичков, осваивающих территории гемблинга.&lt;/p&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Регистрация обеспечивает гостю ReelEmperor больше прав и возможностей: создав и заполнив аккаунт, гемблер способен пополнять счёт, приступая к сессии на реальные средства; запрашивать бонус-коды. Представлен список социальных сетей, пригодных для быстрой идентификации. Игрокам предлагается и стандартная форма регистрации, в поля которой необходимо ввести контактную и персональную информацию; придумать уникальные логин, пароль. Затем последует выбор игровой валюты и подтверждение сведений о пользователе.&lt;/p&gt;\r\n\r\n&lt;h3 data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Пользователям из стран бывшего СНГ стоит посетить сайт ReelEmperor&lt;/h3&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Общее число автоматов ReelEmperor превышает 300 моделей. Клиенты игрового ресурса будут впечатлены обилием симуляторов, среди которых значительный процент занимают видеослоты. Игры упомянутой категории легки в освоении, отличаясь лаконичной навигационной панелью, наличием специальных символов, дополнительных мини-игр. Правила игры на слотах предельно просты, что делает их отличным трамплином для освоения базовых принципов игрового процесса. Казино ReelEmperor предлагает продукцию молодых производителей и именитых брендов. Карточные забавы представлены в широком диапазоне: видеопокер, баккара, блэкджек и прочие увлекательные аппараты предлагаются в модифицированных версиях. Позволяется задействовать несколько боксов, что повышает шансы на успешное завершение партии. Не остались без внимания и поклонники Колеса Фортуны - рулетки. Симуляторы покоряют детализированным оформлением, приближающим виртуальное развлечение к реальной сессии в казино. Новичку легко сориентироваться, предпочитая проверенные аппараты, формирующие раздел &amp;quot;Лучший выбор&amp;quot;. В некоторых моделях на кону стоит накопительный джек-пот. Можно активировать демонстрационные версии, изучая особенности автоматов. Заведение регулярно проводит турнирные состязания: ежедневно клиентам предлагается новая тематика; впечатляет внушительное количество призовых мест и хорошие выигрыши. Победители становятся обладателями компьютерных очков, пригодных для обмена и совершения ставок.&lt;/p&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Казино ReelEmperor предлагает скрасить пребывание на сайте, заказывая бонус-коды. Геймер, пополняющий счёт, получает удвоенную сумму на баланс. По условиям бонуса кэшбэк возвращается 10-15% от не сыгравших ставок. Благодаря грамотной программе лояльности статус игрока растет в соответствии с набранными баллами. Периодически проводятся разнообразные акции, лотереи; рассылка тематической информации поступает на электронный ящик, указанный при регистрации.\r\nВ качестве игровой валюты ReelEmperor принимает российский рубль, украинскую гривну, американский доллар. Пополниться можно с помощью карточек Visa/MasterCard; платежных систем Qiwi, Альфа-банк, WebMoney, с помощью мобильного банкинга при наличии российского номера. Сроки вывода средств не превышают двух рабочих дней.&lt;/p&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Деятельность казино лицензирована; ReelEmperor функционирует на софте от Microgaming. Консультанты техподдержки, говорящие по-русски, оперативно решает любые проблемы, предлагая связь посредством электронной почты, телефонного звонка. Казино покоряет наличием русскоязычного сайта, обилием игровых предложений, наличием всевозможных бонусов, высоким качеством программного обеспечения и надежностью сессии.&lt;/p&gt;', 1, '2021-04-08 14:08:16', '2021-04-07 14:08:16'),
(4, 'blog', 'public', 'blog-1', 'blog', 'Blog 1', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Blog 1 Геймер, выбирающий азартные игры в качестве развлечения', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'Blog 1 Title', 'Blog 1 Description', 'Blog 1 Keywords', '&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Геймер, выбирающий азартные игры в качестве развлечения, желает получить королевский сервис, который обеспечивает современное, надежное, обладающие достаточным опытом &lt;a title=&amp;quot;онлайн казино Украина&amp;quot; href=&amp;quot;//onlinecasino.kiev.ua/&amp;quot;&gt;онлайн казино на реальные деньги&lt;/a&gt; ReelEmperor. Ценителям азартных развлечений гарантировано высокое качество сессии, прозрачность игрового процесса, обилие выгодных предложений.&lt;/p&gt;\r\n\r\n&lt;h2 data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Пользователям из стран бывшего СНГ стоит посетить сайт ReelEmperor&lt;/h2&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Пользователям из стран бывшего СНГ стоит посетить сайт ReelEmperor, отличающийся стильным дизайном. Логотип виртуального заведения известен опытным поклонникам гемблинга, визуализируя королевского пингвина и трио счастливых семерок. Казино отличается безупречной репутацией, гарантируя клиенту удовольствие от виртуального досуга. Игрока ждут разнообразные бонусы, грандиозный ассортимент развлечений.&lt;/p&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;При первом взгляде на главную страницу ReelEmperor становится ясно, что в дизайне сделали ставку на нестареющую классику, используя классические цветовые схемы. Задний план выкрашен в насыщенно-синие оттенки, создающие впечатление респектабельности и вызывая ассоциации со стилистикой игровых клубов офлайн, безумно популярных в прошлом. Притягивают взгляд яркие превью и баннеры, приглашающие оценить разнообразие приятных сюрпризов от казино. Структура сайта доступна для понимания; навигация проста, радуя новичков, осваивающих территории гемблинга.&lt;/p&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Регистрация обеспечивает гостю ReelEmperor больше прав и возможностей: создав и заполнив аккаунт, гемблер способен пополнять счёт, приступая к сессии на реальные средства; запрашивать бонус-коды. Представлен список социальных сетей, пригодных для быстрой идентификации. Игрокам предлагается и стандартная форма регистрации, в поля которой необходимо ввести контактную и персональную информацию; придумать уникальные логин, пароль. Затем последует выбор игровой валюты и подтверждение сведений о пользователе.&lt;/p&gt;\r\n\r\n&lt;h3 data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Пользователям из стран бывшего СНГ стоит посетить сайт ReelEmperor&lt;/h3&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Общее число автоматов ReelEmperor превышает 300 моделей. Клиенты игрового ресурса будут впечатлены обилием симуляторов, среди которых значительный процент занимают видеослоты. Игры упомянутой категории легки в освоении, отличаясь лаконичной навигационной панелью, наличием специальных символов, дополнительных мини-игр. Правила игры на слотах предельно просты, что делает их отличным трамплином для освоения базовых принципов игрового процесса. Казино ReelEmperor предлагает продукцию молодых производителей и именитых брендов. Карточные забавы представлены в широком диапазоне: видеопокер, баккара, блэкджек и прочие увлекательные аппараты предлагаются в модифицированных версиях. Позволяется задействовать несколько боксов, что повышает шансы на успешное завершение партии. Не остались без внимания и поклонники Колеса Фортуны - рулетки. Симуляторы покоряют детализированным оформлением, приближающим виртуальное развлечение к реальной сессии в казино. Новичку легко сориентироваться, предпочитая проверенные аппараты, формирующие раздел &amp;quot;Лучший выбор&amp;quot;. В некоторых моделях на кону стоит накопительный джек-пот. Можно активировать демонстрационные версии, изучая особенности автоматов. Заведение регулярно проводит турнирные состязания: ежедневно клиентам предлагается новая тематика; впечатляет внушительное количество призовых мест и хорошие выигрыши. Победители становятся обладателями компьютерных очков, пригодных для обмена и совершения ставок.&lt;/p&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Казино ReelEmperor предлагает скрасить пребывание на сайте, заказывая бонус-коды. Геймер, пополняющий счёт, получает удвоенную сумму на баланс. По условиям бонуса кэшбэк возвращается 10-15% от не сыгравших ставок. Благодаря грамотной программе лояльности статус игрока растет в соответствии с набранными баллами. Периодически проводятся разнообразные акции, лотереи; рассылка тематической информации поступает на электронный ящик, указанный при регистрации.\r\nВ качестве игровой валюты ReelEmperor принимает российский рубль, украинскую гривну, американский доллар. Пополниться можно с помощью карточек Visa/MasterCard; платежных систем Qiwi, Альфа-банк, WebMoney, с помощью мобильного банкинга при наличии российского номера. Сроки вывода средств не превышают двух рабочих дней.&lt;/p&gt;\r\n&lt;p class=&amp;quot;disclaimer&amp;quot; data-lead-id=&amp;quot;disclaimer&amp;quot;&gt;Деятельность казино лицензирована; ReelEmperor функционирует на софте от Microgaming. Консультанты техподдержки, говорящие по-русски, оперативно решает любые проблемы, предлагая связь посредством электронной почты, телефонного звонка. Казино покоряет наличием русскоязычного сайта, обилием игровых предложений, наличием всевозможных бонусов, высоким качеством программного обеспечения и надежностью сессии.&lt;/p&gt;', 1, '2021-04-08 14:08:16', '2021-04-07 14:08:16'),
(8, 'casino', 'public', 'casino-', 'casino', 'Title casino ', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:21:53', '2021-04-15 08:21:53'),
(9, 'casino', 'public', 'casino-0', 'casino', 'Title casino 0', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(11, 'casino', 'public', 'casino-2', 'casino', 'Title casino 2', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(12, 'casino', 'public', 'casino-3', 'casino', 'Title casino 3', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(13, 'casino', 'public', 'casino-4', 'casino', 'Title casino 4', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(14, 'casino', 'public', 'casino-5', 'casino', 'Title casino 5', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(15, 'casino', 'public', 'casino-6', 'casino', 'Title casino 6', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(16, 'casino', 'public', 'casino-7', 'casino', 'Title casino 7', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(17, 'casino', 'public', 'casino-8', 'casino', 'Title casino 8', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(18, 'casino', 'public', 'casino-9', 'casino', 'Title casino 9', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(19, 'casino', 'public', 'casino-10', 'casino', 'Title casino 10', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(20, 'casino', 'public', 'casino-11', 'casino', 'Title casino 11', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(21, 'casino', 'public', 'casino-12', 'casino', 'Title casino 12', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(22, 'casino', 'public', 'casino-13', 'casino', 'Title casino 13', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(23, 'casino', 'public', 'casino-14', 'casino', 'Title casino', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(24, 'casino', 'public', 'casino-15', 'casino', 'Title casino 15', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(25, 'casino', 'public', 'casino-16', 'casino', 'Title casino 16', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(26, 'casino', 'public', 'casino-17', 'casino', 'Title casino 17', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(27, 'casino', 'public', 'casino-18', 'casino', 'Title casino 18', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(28, 'casino', 'public', 'casino-19', 'casino', 'Title casino 19', 'https://profimtk.ru/wp-content/uploads/2021/03/reelemperor.png', 'Геймер, выбирающий азартные игры в качестве развлечения, желает получить', 'Международное казино ReelEmperor (Рил Эмперор) выгоды качественного обслуживания', 'ReelEmperor Title', 'ReelEmperor Description', 'ReelEmperor Keywords', 'Content', 1, '2021-04-15 08:29:24', '2021-04-15 08:29:24'),
(30, 'casino', 'public', 'new-post-casino', 'casino', 'New post casino', 'http://127.0.0.1:8000/downloads/608a7eea470ba.png', 'New post casino', 'New post casino', 'New post casino', 'New post casino', 'New post casino', '&lt;p&gt;New post casino&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(31, 'casino', 'public', 'good-day-text', 'casino', 'Good day text', '/img/default.jpg', 'Good day text', 'Good day text', 'Good day text', 'Good day text', 'Good day text', '&lt;p&gt;Good day text&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(32, 'casino', 'public', 'new-post-casino-1', 'casino', 'New post casino', 'http://127.0.0.1:8000/downloads/608a90f9afcb9.png', 'New post casino', 'New post casino', 'New post casino', 'New post casino', 'New post casino', '&lt;p&gt;New post casino&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(33, 'casino', 'public', 'new-post-casino-2', 'casino', 'New post casino', 'http://127.0.0.1:8000/downloads/608a90f9afcb9.png', 'New post casino', 'New post casino', 'New post casino', 'New post casino', 'New post casino', '&lt;p&gt;New post casino&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(35, 'casino', 'public', 'new-post-casino-4', 'casino', 'New post casino', 'http://127.0.0.1:8000/downloads/608a90f9afcb9.png', 'New post casino', 'New post casino', 'New post casino', 'New post casino', 'New post casino', '&lt;p&gt;New post casino&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(36, 'casino', 'public', 'new-post-casino-5', 'casino', 'New post casino', 'http://127.0.0.1:8000/downloads/608a90f9afcb9.png', 'New post casino', 'New post casino', 'New post casino', 'New post casino', 'New post casino', '&lt;p&gt;New post casino&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(37, 'casino', 'public', 'test-new-casino', 'casino', 'Test new casino', 'http://127.0.0.1:8000/downloads/608a94800363f.png', 'Test new casino', 'Test new casino', 'Test new casino', 'Test new casino', 'Test new casino', '&lt;p&gt;Test new casino&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(38, 'casino', 'public', 'new-post-casino-6', 'casino', 'New post casino', '/img/default.jpg', 'New post casino', 'New post casino', 'New post casino', 'New post casino', 'New post casino', '&lt;p&gt;New post casino&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(39, 'casino', 'public', 'new-post-casino-7', 'casino', 'New post casino Good', 'http://127.0.0.1:8000/downloads/608a961b5b990.png', 'New post casino', 'New post casino', 'New post casino', 'New post casino', 'New post casino', '&lt;p&gt;New post casino&lt;/p&gt;', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(40, 'casino', 'public', 'net-title-for-ua-casino', 'casino', 'Net title for ua casino', 'http://127.0.0.1:8000/downloads/608ad81c12246.png', 'Net title for ua casino', 'Net title for ua casino', 'Net title for ua casino', 'Net title for ua casino', 'Net title for ua casino', '&lt;p&gt;Net title for ua casino&lt;/p&gt;', 2, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(41, 'casino', 'public', 'new-post-test-thumbnail', 'casino', 'New post test thumbnail', 'http://127.0.0.1:8000/downloads/608ad89a440cb.jpeg', 'New post test thumbnail', 'New post test thumbnail', 'New post test thumbnail', 'New post test thumbnail', 'New post test thumbnail', '&lt;p&gt;New post test thumbnail&lt;/p&gt;', 2, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(42, 'casino', 'public', 'new-post', 'casino', 'New post', 'https://127.0.0.1:8000/img/default.jpg', 'New post', '', 'New post', 'New post', 'New post', '', 1, '2021-04-28 21:00:00', '2021-04-28 21:00:00'),
(44, 'casino', 'public', 'new-ua-casino-for-test', 'casino', 'New Ua casino for test', 'http://127.0.0.1:8000/img/default.jpg', 'New Ua casino for test', 'New Ua casino for test', 'New Ua casino for test', 'New Ua casino for test', 'New Ua casino for test', '&lt;p&gt;New Ua casino for test&lt;/p&gt;', 2, '2021-04-29 21:00:00', '2021-04-29 21:00:00'),
(45, 'casino', 'public', 'new-test-casino-for-dev', 'casino', 'New test casino for devb', 'http://127.0.0.1:8000/downloads/609a7d322aefe.jpeg', 'New test casino for dev gg', 'New test casino for dev gg', 'New test casino for dev gg', 'New test casino for dev gg', 'New test casino for dev gg', '&lt;p&gt;New test casino for dev New test casino for dev New test casino for dev gg&lt;/p&gt;', 1, '2021-04-29 21:00:00', '2021-04-29 21:00:00'),
(50, 'bonus', 'public', 'bonus-test-1', 'bonuses', 'Bonus test 1', 'http://127.0.0.1:8000/downloads/609e746da753b.jpeg', 'Bonus test 1', 'Bonus test 1', 'Bonus test 1', 'Bonus test 1', 'Bonus test 1', '&lt;p&gt;Bonus test 1&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(51, 'bonus', 'public', 'test-bonus-2', 'bonuses', 'Test bonus 2', 'http://127.0.0.1:8000/img/default.jpg', 'Test bonus 2', 'Test bonus 2', 'Test bonus 2', 'Test bonus 2', 'Test bonus 2', '&lt;p&gt;Test bonus 2&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(52, 'bonus', 'public', 'test-bonus-3', 'bonuses', 'Test bonus 3', 'http://127.0.0.1:8000/img/default.jpg', 'Test bonus 3', 'Test bonus 3', 'Test bonus 3', 'Test bonus 3', 'Test bonus 3', '&lt;p&gt;Test bonus 3&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(54, 'bonus', 'hide', 'test-bonus-4-1', 'bonuses', 'Test bonus 4', 'http://127.0.0.1:8000/img/default.jpg', 'Test bonus 4', 'Test bonus 4', 'Test bonus 4', 'Test bonus 4', 'Test bonus 4', '&lt;p&gt;Test bonus 4&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(55, 'bonus', 'public', 'test-bonus-5', 'bonuses', 'Test bonus 5', 'http://127.0.0.1:8000/img/default.jpg', 'Test bonus 5', 'Test bonus 5', 'Test bonus 5', 'Test bonus 5', 'Test bonus 5', '&lt;p&gt;Test bonus 5&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(56, 'bonus', 'public', 'test-bonus-6', 'bonuses', 'Test bonus 6', 'http://127.0.0.1:8000/img/default.jpg', 'Test bonus 6', 'Test bonus 6', 'Test bonus 6', 'Test bonus 6', 'Test bonus 6', '&lt;p&gt;Test bonus 6&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(57, 'bonus', 'public', 'test-bonus-7', 'bonuses', 'Test bonus 7', 'http://127.0.0.1:8000/img/default.jpg', 'Test bonus 7', 'Test bonus 7', 'Test bonus 7', 'Test bonus 7', 'Test bonus 7', '&lt;p&gt;Test bonus 7&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(58, 'bonus', 'public', 'test-bonus-9', 'bonuses', 'Test bonus 9', 'http://127.0.0.1:8000/img/default.jpg', 'Test bonus 9', 'Test bonus 9', 'Test bonus 9', 'Test bonus 9', 'Test bonus 9', '&lt;p&gt;Test bonus 9&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(59, 'bonus', 'public', 'test-bonus-1-ua', 'bonuses', 'Test bonus 1 ua', 'http://127.0.0.1:8000/img/default.jpg', 'Test bonus 1 ua', 'Test bonus 1 ua', 'Test bonus 1 ua', 'Test bonus 1 ua', 'Test bonus 1 ua', '&lt;p&gt;Test bonus 1 ua&lt;/p&gt;', 2, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(61, 'bonus', 'public', 'add-bonus-new', 'bonuses', 'Add bonus new', 'http://127.0.0.1:8000/img/default.jpg', 'Add bonus new', 'Add bonus new', 'Add bonus new', 'Add bonus new', 'Add bonus new', '&lt;p&gt;Add bonus new&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(63, 'casino', 'public', 'new-casino-item', 'casino', 'New casino item title', 'http://127.0.0.1:8000/downloads/60a6174a34009.png', 'New casino item short desc', 'New casino item h1', 'New casino item meta title', 'New casino item description', 'New casino item keywords', '&lt;p&gt;New casino item&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(64, 'bonus', 'public', 'new-post-bonus', 'bonuses', 'New post bonus', 'http://127.0.0.1:8000/img/default.jpg', 'New post bonus', 'New post bonus', 'New post bonus', 'New post bonus', 'New post bonus', '&lt;p&gt;New post bonus&lt;/p&gt;', 1, '2021-05-13 21:00:00', '2021-05-13 21:00:00'),
(67, 'bonus', 'public', 'new-bonus-add', 'bonuses', 'New bonus add', 'http://127.0.0.1:8000/downloads/60a21fc64f64a.png', 'New bonus add short desc', 'New bonus add h1', 'New bonus add meta title', 'New bonus add description', 'New bonus add keywords', '&lt;p&gt;New bonus add content&lt;/p&gt;', 1, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(69, 'slot', 'public', 'add-new-test-slot', 'slots', 'Add new test slot', 'http://127.0.0.1:8000/downloads/60a2281dd1b01.png', 'Add new test slot', 'Add new test slot', 'Add new test slot', 'Add new test slot', 'Add new test slot', '&lt;p&gt;Add new test slot content&lt;/p&gt;', 1, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(72, 'slot', 'public', 'add-new-post-slot', 'slots', 'Add new post slot', 'http://127.0.0.1:8000/img/default.jpg', 'Add new post slot short desc', 'Add new post slot h1', 'Add new post slot', 'Add new post slot', 'Add new post slot', '&lt;p&gt;Add new post slot h1&lt;/p&gt;', 1, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(80, 'payment', 'public', 'add-new-payment', 'payments', 'Add new payment', 'http://127.0.0.1:8000/img/default.jpg', 'Add new payment', 'Add new payment', 'Add new payment', 'Add new payment', 'Add new payment', '&lt;p&gt;Add new payment&lt;/p&gt;', 1, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(81, 'payment', 'public', 'add-new-payment-ua', 'payments', 'Add new payment ua', 'http://127.0.0.1:8000/img/default.jpg', 'Add new payment ua', '', 'Add new payment ua', 'Add new payment ua', 'Add new payment ua', '&lt;p&gt;Add new payment ua&lt;/p&gt;', 2, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(82, 'payment', 'public', 'new-payment-post', 'payments', 'New payment post', 'http://127.0.0.1:8000/img/default.jpg', 'New payment post', 'New payment post', 'New payment post', 'New payment post', 'New payment post', '&lt;p&gt;New payment post&lt;/p&gt;', 1, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(83, 'vendor', 'public', 'add-new-vendor-post', 'vendors', 'Add new vendor post new', 'http://127.0.0.1:8000/downloads/60a278741ccb1.png', 'Add new vendor post new', 'Add new vendor post new', 'Add new vendor post new', 'Add new vendor post new', 'Add new vendor post new', '&lt;p&gt;Add new vendor post new&lt;/p&gt;', 1, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(86, 'blog', 'public', 'kontakty', 'blog', 'Контакты', 'http://127.0.0.1:8000/img/default.jpg', 'fdsfds', 'ds dfsfds', 'fdsfs', 'fdsfsd', 'fds', '&lt;p&gt;dfskfjds kfdshjfhskj&lt;/p&gt;', 1, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(87, 'blog', 'public', 'new-post-blog', 'blog', 'new post blog', 'http://127.0.0.1:8000/img/default.jpg', 'new post blog', 'new post blog', 'new post blog', 'new post blog', 'new post blog', '&lt;p&gt;new post blog&lt;/p&gt;', 1, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(89, 'blog', 'public', 'new-post-blog-ua', 'blog', 'new post blog ua', 'http://127.0.0.1:8000/img/default.jpg', 'new post blog ua', 'new post blog ua', 'new post blog ua', 'new post blog ua', 'new post blog ua', '&lt;p&gt;new post blog ua&lt;/p&gt;', 2, '2021-05-16 21:00:00', '2021-05-16 21:00:00'),
(91, 'blog', 'public', 'blog-post-ua', 'blog', 'Blog post ua', 'http://127.0.0.1:8000/img/default.jpg', 'Blog post ua', 'Blog post ua', 'Blog post ua', 'Blog post ua', 'Blog post ua', '&lt;p&gt;Blog post ua&lt;/p&gt;', 2, '2021-05-17 21:00:00', '2021-05-17 21:00:00'),
(92, 'blog', 'public', 'ne-post-blog-ru-test', 'blog', 'Ne post blog ru test', 'http://127.0.0.1:8000/img/default.jpg', 'Ne post blog ru test', 'Ne post blog ru test', 'Ne post blog ru test', 'Ne post blog ru test', 'Ne post blog ru test', '&lt;p&gt;Ne post blog ru test&lt;/p&gt;', 1, '2021-05-17 21:00:00', '2021-05-17 21:00:00'),
(96, 'payment', 'public', 'add-new-post-payment', 'payments', 'add new post payment', 'http://127.0.0.1:8000/img/default.jpg', 'add new post payment', 'add new post payment', 'add new post payment', 'add new post payment', 'add new post payment', '&lt;p&gt;add new post payment&lt;/p&gt;', 1, '2021-05-17 21:00:00', '2021-05-17 21:00:00'),
(99, 'vendor', 'public', 'new-vendor-for-test-1', 'vendors', 'New vendor for test 1', 'http://127.0.0.1:8000/img/default.jpg', 'New vendor for test 1', 'New vendor for test 1', 'New vendor for test 1', 'New vendor for test 1', 'New vendor for test 1', '&lt;p&gt;New vendor for test 1&lt;/p&gt;', 1, '2021-05-18 21:00:00', '2021-05-18 21:00:00'),
(100, 'vendor', 'public', 'new-vendor-for-test-2', 'vendors', 'New vendor for test 2', 'http://127.0.0.1:8000/img/default.jpg', 'New vendor for test 2', 'New vendor for test 2', 'New vendor for test 2', 'New vendor for test 2', 'New vendor for test 2', '&lt;p&gt;New vendor for test 2&lt;/p&gt;', 1, '2021-05-18 21:00:00', '2021-05-18 21:00:00'),
(101, 'vendor', 'public', 'new-vendor-for-test-3', 'vendors', 'New vendor for test 3', 'http://127.0.0.1:8000/img/default.jpg', 'New vendor for test 3', 'New vendor for test 3', 'New vendor for test 3', 'New vendor for test 3', 'New vendor for test 3', '&lt;p&gt;New vendor for test 3&lt;/p&gt;', 1, '2021-05-18 21:00:00', '2021-05-18 21:00:00'),
(102, 'vendor', 'public', 'new-vendor-for-test-4', 'vendors', 'New vendor for test 4', 'http://127.0.0.1:8000/img/default.jpg', 'New vendor for test 4', 'New vendor for test 4', 'New vendor for test 4', 'New vendor for test 4', 'New vendor for test 4', '&lt;p&gt;New vendor for test 4&lt;/p&gt;', 1, '2021-05-18 21:00:00', '2021-05-18 21:00:00'),
(103, 'vendor', 'public', 'new-vendor-for-test-5', 'vendors', 'New vendor for test 5', 'http://127.0.0.1:8000/img/default.jpg', 'New vendor for test 5', 'New vendor for test 5', 'New vendor for test 5', 'New vendor for test 5', 'New vendor for test 5', '&lt;p&gt;New vendor for test 5&lt;/p&gt;', 1, '2021-05-18 21:00:00', '2021-05-18 21:00:00'),
(105, 'vendor', 'public', 'new-post-vendor', 'vendors', 'New post vendor', 'http://127.0.0.1:8000/img/default.jpg', 'New post vendor', 'New post vendor', 'New post vendor', 'New post vendor', 'New post vendor', '&lt;p&gt;New post vendor&lt;/p&gt;', 1, '2021-05-18 21:00:00', '2021-05-18 21:00:00'),
(106, 'vendor', 'public', 'new-post-vendor-ua', 'vendors', 'New post vendor ua', 'http://127.0.0.1:8000/img/default.jpg', 'New post vendor ua', 'New post vendor ua', 'New post vendor ua', 'New post vendor ua', 'New post vendor ua', '&lt;p&gt;New post vendor ua&lt;/p&gt;', 2, '2021-05-18 21:00:00', '2021-05-18 21:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `post_category`
--

CREATE TABLE `post_category` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `relative_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `post_category`
--

INSERT INTO `post_category` (`post_id`, `relative_id`) VALUES
(86, 2),
(86, 6),
(86, 7),
(87, 2),
(87, 5),
(87, 7),
(4, 4),
(4, 8),
(4, 9),
(91, 3),
(92, 1),
(92, 9),
(50, 1),
(50, 7),
(80, 4),
(80, 5),
(83, 2),
(83, 4),
(83, 6),
(40, 3),
(96, 1),
(96, 4),
(96, 7),
(3, 2),
(3, 5),
(3, 6),
(67, 2),
(67, 4),
(67, 5),
(44, 3),
(69, 2),
(69, 5),
(69, 7),
(63, 2),
(63, 5),
(63, 7),
(45, 1),
(45, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `review_rating` int(11) NOT NULL DEFAULT 1,
  `review_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`post_id`, `review_rating`, `review_name`, `review_text`, `review_date`) VALUES
(2, 90, 'Name 1', 'Text 1', '2021-04-08 11:29:39'),
(2, 75, 'Name 2', 'Text 2', '2021-04-08 11:30:16'),
(4, 1, 'Blog name reviews', 'Blog name text', '2021-04-08 12:13:59');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'settings',
  `key_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `slug`, `key_id`, `value`, `title`, `editor`, `lang`) VALUES
(1, 'settings', 'footer_text', '© 2017-2020 Онлайн казино для украинцев.', 'Текст в футере ru', 'input', 1),
(4, 'settings', 'footer_text', 'Новый текст в футере', 'Текст в футере ua', 'input', 2),
(5, 'settings', 'description_main_page', 'Описание на главной странице ua', 'Описание на главной странице ua', 'rich_text', 2),
(6, 'settings', 'description_main_page', '&lt;h2&gt;Complete guide to the best Canadian casinos&lt;/h2&gt;&lt;p&gt;CanadaCasino is your guide to all things online casino! Here, you will find honest casino and game reviews, together with useful guides that have been expertly put together to help you enjoy the best online casino experience from Canada!&lt;/p&gt;', 'Описание на главной странице ru', 'rich_text', 1),
(7, 'settings', 'header_menu', '[{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609a7bd22b9d3.png\",\"value_1\":\"great idea\",\"value_2\":\"test category\"},{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609a7bf4802e6.jpeg\",\"value_1\":\"test 1\",\"value_2\":\"test 2\"},{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609a7c1d84f12.png\",\"value_1\":\"test 2\",\"value_2\":\"test 2\"},{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609b8c31408bc.jpeg\",\"value_1\":\"fdsfs\",\"value_2\":\"fsdfs\"}]', 'Header menu ru', 'two_input_image', 1),
(8, 'settings', 'header_menu', '[{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609a7c769708d.jpeg\",\"value_1\":\"test ua\",\"value_2\":\"test ua\"},{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609a7ca12bffa.png\",\"value_1\":\"test 1 ua\",\"value_2\":\"test 2 ua\"}]', 'Header menu ua', 'two_input_image', 2),
(9, 'settings', 'footer_menu', '[{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609a871a327e7.jpeg\",\"value_1\":\"test hfghfhfg `fdsjfksdh\\\" fdshfkjv \'fdgd\",\"value_2\":\"test gfdfg fsdkfhsdkjl fdsjhfkjs fgd gffvgdfbd\"},{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609aa389a9378.jpeg\",\"value_1\":\"Meta title main page new\",\"value_2\":\"Description main page New\"},{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609aa52d8d87b.jpeg\",\"value_1\":\"get new gdfgd gfdfgdf gfdgd\",\"value_2\":\"get new fgdfdgfd gfdgd\"},{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609b8b3dc76af.png\",\"value_1\":\"vxcvx dsvs\",\"value_2\":\"gdfgdfgd dfsfds\"},{\"src\":\"http:\\/\\/127.0.0.1:8000\\/downloads\\/609bf4340d821.png\",\"value_1\":\"bvckhbjlc\",\"value_2\":\"bcvnbclk vbkjchvkj\"}]', 'Footer menu ru', 'two_input_image', 1),
(10, 'settings', 'main_page_faq', '[{\"value_1\":\"Faq 1\",\"value_2\":\"Faq 1 text for faq\"},{\"value_1\":\"Faq 2\",\"value_2\":\"Faq 2 text for faq\"}]', 'Main page Faq ru', 'input_text', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `slot_casino`
--

CREATE TABLE `slot_casino` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `relative_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slot_casino`
--

INSERT INTO `slot_casino` (`post_id`, `relative_id`) VALUES
(69, 17),
(69, 18),
(69, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `slot_meta`
--

CREATE TABLE `slot_meta` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `rtp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(10) NOT NULL,
  `min_bet` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_bet` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_lines` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reels` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volatility` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `bonus_rounds` tinyint(1) NOT NULL DEFAULT 1,
  `free_spins` tinyint(1) NOT NULL DEFAULT 1,
  `scatters` tinyint(1) NOT NULL DEFAULT 1,
  `wild_symbol` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slot_meta`
--

INSERT INTO `slot_meta` (`post_id`, `rtp`, `rating`, `min_bet`, `max_bet`, `pay_lines`, `reels`, `volatility`, `bonus_rounds`, `free_spins`, `scatters`, `wild_symbol`) VALUES
(69, '', 78, '', '', '', '', 'medium', 1, 1, 1, 1),
(72, '', 0, '', '', '', '', 'medium', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `slot_vendor`
--

CREATE TABLE `slot_vendor` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `relative_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slot_vendor`
--

INSERT INTO `slot_vendor` (`post_id`, `relative_id`) VALUES
(69, 83),
(69, 101),
(69, 103);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'Good job', 'Good description', '2021-04-05 12:21:23'),
(2, 'Good job', 'Good description', '2021-04-05 12:22:22'),
(3, 'new task title', 'new task deckription', '2021-04-05 12:24:12'),
(4, 'cxzc csa', 'dsa', '2021-04-05 12:25:23'),
(5, 'kjflkds kfdlhsj', 'kfjskl kdshlk', '2021-04-05 12:32:40'),
(6, 'rwekj krhwejkl', 'rwekjl rklweh', '2021-04-05 12:34:44');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','editor','guest') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor',
  `remember_token` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `create_at`, `update_at`) VALUES
(1, 'admin', 'lazarev-konstant@mail.ru', 'ecce4e1a7fc1fc293971c1a8eb58f99c', 'editor', '', '2021-04-15 12:31:27', '2021-05-21 06:40:16');

-- --------------------------------------------------------

--
-- Структура таблицы `vendor_meta`
--

CREATE TABLE `vendor_meta` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `faq` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_title` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `vendor_meta`
--

INSERT INTO `vendor_meta` (`post_id`, `faq`, `faq_title`) VALUES
(83, '[{\"value_1\":\"1 Add new vendor post new update\",\"value_2\":\"1 Add new vendor post new\"},{\"value_1\":\"3 Add new vendor post new\",\"value_2\":\"3 Add new vendor post new\"}]', 'Add new vendor post new update'),
(99, '[]', ''),
(100, '[]', ''),
(101, '[]', ''),
(102, '[]', ''),
(103, '[]', ''),
(105, '[{\"value_1\":\"New post vendor\",\"value_2\":\"New post vendor\"}]', 'New post vendor'),
(106, '[]', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog_meta`
--
ALTER TABLE `blog_meta`
  ADD UNIQUE KEY `blog_meta_post_id_unique` (`post_id`);

--
-- Индексы таблицы `bonus_casino`
--
ALTER TABLE `bonus_casino`
  ADD KEY `bonus_casino_post_id_foreign` (`post_id`),
  ADD KEY `bonus_casino_relative_id_foreign` (`relative_id`);

--
-- Индексы таблицы `bonus_meta`
--
ALTER TABLE `bonus_meta`
  ADD UNIQUE KEY `casino_meta_post_id_unique` (`post_id`);

--
-- Индексы таблицы `casino_meta`
--
ALTER TABLE `casino_meta`
  ADD UNIQUE KEY `casino_meta_post_id_unique` (`post_id`);

--
-- Индексы таблицы `casino_payment`
--
ALTER TABLE `casino_payment`
  ADD KEY `casino_payment_post_id_foreign` (`post_id`),
  ADD KEY `casino_payment_relative_id_foreign` (`relative_id`);

--
-- Индексы таблицы `casino_vendor`
--
ALTER TABLE `casino_vendor`
  ADD KEY `casino_vendor_post_id_foreign` (`post_id`),
  ADD KEY `casino_vendor_relative_id_foreign` (`relative_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_permalink_unique` (`permalink`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_key_id_unique` (`key_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_permalink_unique` (`permalink`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `payment_meta`
--
ALTER TABLE `payment_meta`
  ADD UNIQUE KEY `payment_meta_post_id_unique` (`post_id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_category`
--
ALTER TABLE `post_category`
  ADD KEY `post_category_post_id_foreign` (`post_id`),
  ADD KEY `post_category_category_id_foreign` (`relative_id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `reviews_post_id_foreign` (`post_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slot_casino`
--
ALTER TABLE `slot_casino`
  ADD KEY `slot_casino_post_id_foreign` (`post_id`),
  ADD KEY `slot_casino_relative_id_foreign` (`relative_id`);

--
-- Индексы таблицы `slot_meta`
--
ALTER TABLE `slot_meta`
  ADD UNIQUE KEY `blog_meta_post_id_unique` (`post_id`);

--
-- Индексы таблицы `slot_vendor`
--
ALTER TABLE `slot_vendor`
  ADD KEY `slot_vendor_post_id_foreign` (`post_id`),
  ADD KEY `slot_vendor_relative_id_foreign` (`relative_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `vendor_meta`
--
ALTER TABLE `vendor_meta`
  ADD UNIQUE KEY `vendor_meta_post_id_unique` (`post_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blog_meta`
--
ALTER TABLE `blog_meta`
  ADD CONSTRAINT `blog_meta_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `bonus_casino`
--
ALTER TABLE `bonus_casino`
  ADD CONSTRAINT `bonus_casino_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bonus_casino_relative_id_foreign` FOREIGN KEY (`relative_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `bonus_meta`
--
ALTER TABLE `bonus_meta`
  ADD CONSTRAINT `bonus_meta_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `casino_meta`
--
ALTER TABLE `casino_meta`
  ADD CONSTRAINT `casino_meta_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `casino_payment`
--
ALTER TABLE `casino_payment`
  ADD CONSTRAINT `casino_payment_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `casino_payment_relative_id_foreign` FOREIGN KEY (`relative_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `casino_vendor`
--
ALTER TABLE `casino_vendor`
  ADD CONSTRAINT `casino_vendor_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `casino_vendor_relative_id_foreign` FOREIGN KEY (`relative_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `payment_meta`
--
ALTER TABLE `payment_meta`
  ADD CONSTRAINT `payment_meta_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_category_id_foreign` FOREIGN KEY (`relative_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_category_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `slot_casino`
--
ALTER TABLE `slot_casino`
  ADD CONSTRAINT `slot_casino_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `slot_casino_relative_id_foreign` FOREIGN KEY (`relative_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `slot_meta`
--
ALTER TABLE `slot_meta`
  ADD CONSTRAINT `slot_meta_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `slot_vendor`
--
ALTER TABLE `slot_vendor`
  ADD CONSTRAINT `slot_vendor_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `slot_vendor_relative_id_foreign` FOREIGN KEY (`relative_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `vendor_meta`
--
ALTER TABLE `vendor_meta`
  ADD CONSTRAINT `vendor_meta_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
