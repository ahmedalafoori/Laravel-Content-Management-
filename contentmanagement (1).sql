-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 03:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contentmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'عام', NULL, NULL),
(2, 'أخبار', NULL, NULL),
(3, 'تقنية', NULL, NULL),
(4, 'رياضة', '2024-08-31 20:38:59', '2024-08-31 20:38:59'),
(5, 'ثقافة', '2024-08-31 20:38:59', '2024-08-31 20:38:59'),
(6, 'صحة', '2024-08-31 20:38:59', '2024-08-31 20:38:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `post_id`, `file_path`, `file_type`, `created_at`, `updated_at`) VALUES
(4, 4, 'media/photo-1505576399279-565b52d4ac71.jpeg', 'image/jpeg', '2024-08-31 20:38:59', '2024-08-31 20:38:59'),
(5, 5, 'media/photo-1517836357463-d25dfeac3438.jpeg', 'image/jpeg', '2024-08-31 20:38:59', '2024-08-31 20:38:59'),
(6, 6, 'media/photo-1513475382585-d06e58bcb0e0.jpeg', 'image/jpeg', '2024-08-31 20:38:59', '2024-08-31 20:38:59'),
(7, 7, '01J6N37TXVGW37QW4TTY4H664Z.jpeg', 'image/jpeg', '2024-08-31 20:48:25', '2024-08-31 17:50:15'),
(8, 8, '01J6N39RJMXW8HBF4RTK03EKF3.jpeg', 'image/jpeg', '2024-08-31 20:48:25', '2024-08-31 17:51:18'),
(9, 9, '01J6N3ADQPCVQ3TZGVB9BP178B.jpeg', 'image/jpeg', '2024-08-31 20:48:25', '2024-08-31 17:51:39'),
(10, 10, '01J6N3C09KWBND4293TRKKY7S7.jpeg', 'image/jpeg', '2024-08-31 20:48:25', '2024-08-31 17:52:31'),
(11, 11, '01J6N3CQMBZ0MNWFV8X2G3SAVZ.jpeg', 'image/jpeg', '2024-08-31 20:48:25', '2024-08-31 17:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_31_143628_create_posts_table', 2),
(6, '2024_08_31_143753_create_media_table', 2),
(7, '2014_10_12_100000_create_password_resets_table', 3),
(8, '2024_08_31_190942_create_categories_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `created_at`, `updated_at`, `category_id`) VALUES
(4, 2, 'فوائد ممارسة الرياضة يومياً', 'تعتبر ممارسة الرياضة بشكل يومي من أهم العادات الصحية التي يمكن أن يكتسبها الإنسان. فهي تساعد على تحسين الصحة البدنية والنفسية، وتقوي جهاز المناعة، وتحسن النوم.', '2024-08-31 20:38:59', '2024-08-31 20:38:59', 1),
(5, 4, 'أهمية القراءة في تنمية الثقافة', 'القراءة هي مفتاح المعرفة والثقافة. من خلال القراءة، يمكننا اكتشاف عوالم جديدة، وتوسيع مداركنا، وتحسين مهاراتنا اللغوية والفكرية.', '2024-08-31 20:38:59', '2024-08-31 20:38:59', 2),
(6, 5, 'نصائح للحفاظ على صحة القلب', 'للحفاظ على صحة القلب، من المهم اتباع نظام غذائي متوازن، وممارسة الرياضة بانتظام، والابتعاد عن التدخين، وإدارة الضغوط النفسية بشكل فعال.', '2024-08-31 20:38:59', '2024-08-31 20:38:59', 3),
(7, 3, 'أشهر الروايات العربية في القرن العشرين', 'شهد القرن العشرون نهضة أدبية كبيرة في العالم العربي، حيث ظهرت العديد من الروايات التي أصبحت علامات فارقة في الأدب العربي. من أشهر هذه الروايات \"ثلاثية القاهرة\" لنجيب محفوظ، و\"موسم الهجرة إلى الشمال\" للطيب صالح.', '2024-08-31 20:48:25', '2024-08-31 20:48:25', 2),
(8, 4, 'تأثير كرة القدم على الاقتصاد العالمي', 'تعتبر كرة القدم أكثر من مجرد رياضة، فهي صناعة ضخمة تؤثر بشكل كبير على الاقتصاد العالمي. من خلال عائدات البث التلفزيوني، وصفقات اللاعبين، ومبيعات التذاكر والبضائع، تساهم كرة القدم بمليارات الدولارات سنوياً في الاقتصاد العالمي.', '2024-08-31 20:48:25', '2024-08-31 20:48:25', 1),
(9, 5, 'فوائد الطب البديل والعلاجات الطبيعية', 'يزداد الاهتمام بالطب البديل والعلاجات الطبيعية في السنوات الأخيرة. تشمل هذه العلاجات الأعشاب الطبية، والعلاج بالإبر الصينية، واليوغا. بينما لا تحل محل الطب التقليدي، فإنها قد توفر فوائد تكميلية للصحة والرفاهية.', '2024-08-31 20:48:25', '2024-08-31 20:48:25', 3),
(10, 3, 'أهمية اللياقة البدنية للصحة العقلية', 'لا تقتصر فوائد اللياقة البدنية على الصحة الجسدية فحسب، بل تمتد لتشمل الصحة العقلية أيضاً. فممارسة الرياضة بانتظام تساعد في تخفيف التوتر والقلق، وتحسين المزاج، وزيادة الثقة بالنفس.', '2024-08-31 20:48:25', '2024-08-31 20:48:25', 1),
(11, 4, 'تأثير وسائل التواصل الاجتماعي على الثقافة المعاصرة', 'غيرت وسائل التواصل الاجتماعي طريقة تفاعلنا مع الثقافة بشكل جذري. فهي توفر منصة للتعبير الإبداعي، ونشر الأفكار، وتبادل المعلومات بسرعة غير مسبوقة. لكنها أيضاً تثير تساؤلات حول جودة المحتوى وتأثيره على التركيز والعلاقات الاجتماعية.', '2024-08-31 20:48:25', '2024-08-31 20:48:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'admin@admin.com', NULL, '$2y$12$11Iwcd8wpTyd3wuLznZs6eZ4Ka30ViaQmewg7FKXfU2dMTazG7JgO', NULL, '2024-08-31 11:33:12', '2024-08-31 11:33:12'),
(2, 'احمد منصور هزاع عبد الباري العفوري', 'ahmedalafoori@gmail.com', NULL, '$2y$12$kH.ekAs2H3OoZT8LXVRASOb4LZ/mdhRU4Us0QoQz2D0m.l8sH5Nh.', 'adFaVWDZ5FemLtSBg1da1oJxBbMu5mEHa8unlR8KxtLD1O5z23f0Ieqc4qeZ', '2024-08-31 16:25:20', '2024-08-31 16:25:20'),
(3, 'محمد أحمد', 'mohammed@example.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2024-08-31 20:38:59', '2024-08-31 20:38:59'),
(4, 'فاطمة علي', 'fatima@example.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2024-08-31 20:38:59', '2024-08-31 20:38:59'),
(5, 'عبدالله محمود', 'abdullah@example.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2024-08-31 20:38:59', '2024-08-31 20:38:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
