-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 7 月 05 日 15:55
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `wip_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `wip_users`
--

CREATE TABLE `wip_users` (
  `user_id` varchar(20) NOT NULL,
  `domain_id` varchar(8) DEFAULT NULL,
  `user_active` tinyint(1) NOT NULL,
  `perm_group_id` varchar(2) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `wip_users`
--

INSERT INTO `wip_users` (`user_id`, `domain_id`, `user_active`, `perm_group_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('AO3M375O2KUZKLR83Q3F', 'ATHFWK8N', 1, 'RS', 'symbot2.kurosawa', 'symbot2.kurosawa@gmail.com', NULL, '$2y$10$nfnY19KIx0q8jiKNTnUnaepIBa8rCAyntvusxH4zn.oM1jl4J1a6K', NULL, '2023-07-05 04:39:25', '2023-07-05 04:54:34'),
('BA6RB7LR7BB77AE4HO45', 'FQ0RAH2H', 1, 'DA', 'Stevie Wonder', 'stevie.wonder@hupip.com', NULL, '$2y$10$zyMhjb61Qugq0cY7u9E0COS7y7bDwqftQ/kOmlrMcjEJiP85yJWkK', NULL, '2023-07-01 15:09:19', '2023-07-01 20:58:59'),
('FX0PKKOY420138QGA462', 'FQ0RAH2H', 1, 'SA', 'seimei', 'seimei.kurosawa@gmail.com', NULL, '$2y$10$ovgyLV27oiWNtxHPpv88ReFRqYd0iIiRkgfpf2T28k.I4JlF5CM.y', NULL, '2023-07-01 12:58:22', '2023-07-01 20:57:39'),
('K143TH7OI5DV64BMHK5F', '(NONE)', 0, NULL, '船場太郎', 'taro.senba@hupip.com', NULL, '$2y$10$YuGE2oYtzJtSW.TQUFYNr.DA/ogBiffFbsSe8I9zo7Z4toU75mu.y', NULL, '2023-07-01 15:05:11', '2023-07-01 15:05:11'),
('L3OU4PZSG5Y09466RK12', '(NONE)', 0, NULL, '松尾芭蕉', 'basho.matsuo@hupip.com', NULL, '$2y$10$1FkyqR50tZvs2FQ8zvtCruxGOAbIRp5pWySK548.gw4L75b572kiq', NULL, '2023-07-01 15:06:49', '2023-07-01 21:48:05'),
('NORP5JXLQU7N9I2GSJK6', 'ATHFWK8N', 1, 'DA', 'symbot4.kurosawa', 'symbot4.kurosawa@gmail.com', NULL, '$2y$10$QdqJRpm7a7V3tTIwStuWlOFElm1IgOJoL3Ge2/yj.V5tRFkdabXMy', NULL, '2023-07-05 04:40:11', '2023-07-05 04:54:59'),
('NZA4RQGW79LCM6F20G7H', '(NONE)', 0, NULL, '阪上次郎', 'jiro.sakagami@hupip.com', NULL, '$2y$10$T5cxwk75tfYyzR/4bmGTventVOOcrLSzoTigoYeeFwWSCeJ.Qbnru', NULL, '2023-07-01 15:05:47', '2023-07-01 15:05:47'),
('Q7YR63S6YMKTES6ZR7OW', 'ATHFWK8N', 1, 'RS', 'symbot1.kurosawa', 'symbot1.kurosawa@gmail.com', NULL, '$2y$10$BFlKAY66WVXr2yKPBgyC/.XfFJTgScvA6qIUA4s6CYSHW/GUELrYC', NULL, '2023-07-05 04:38:56', '2023-07-05 04:54:17'),
('QLOCSB2OQ5ZYGC5NH952', '(NONE)', 0, NULL, '山田太郎', 'taro.yamada@wip.com', NULL, '$2y$10$clySid9ilpis8voHQ68jVOHbwD6Hmz1USBGNGBsydfTAF0jCYzXxS', NULL, '2023-07-01 15:03:38', '2023-07-01 15:03:38'),
('SDJAX3RR5GG0JSFM491U', '(NONE)', 0, NULL, '与謝野晶子', 'akiko.yosano@hupip.com', NULL, '$2y$10$1bXNmQs1BnrgkvwcRcuc/uAbc/hJmLdudlY65EmdAKhdbsDn2H7Gu', NULL, '2023-07-01 15:06:20', '2023-07-01 15:06:20'),
('WYAOO8FAPKDKF0JH8GFR', 'ATHFWK8N', 1, 'SV', 'symbot3.kurosawa', 'symbot3.kurosawa@gmail.com', NULL, '$2y$10$EFZ1BVNhxzh08h7l63lZ9OsdAzFV4khZmB0p.xazlfUn3gPyhZpcS', NULL, '2023-07-05 04:39:46', '2023-07-05 04:54:46'),
('XF6EC3HV1DKP2SD137DB', '(NONE)', 0, NULL, '坂本花子', 'hanako.sakamoto@hupip.com', NULL, '$2y$10$Jsir2F2FKzkbafCQ.KM4suWPqu4vwLfsK/Iva5P.7v5EE4XyWtRgO', NULL, '2023-07-01 15:04:27', '2023-07-01 15:04:27'),
('Z5DV6NR5SLWE9K0JA6HY', 'FQ0RAH2H', 1, 'RS', 'Billy Joel', 'joel.billy@hupip.com', NULL, '$2y$10$pYNAe0aLtSiQoT7OwLMif.x8GocrTwYv6jU5L0nJaRfhkdG3sxpTO', NULL, '2023-07-01 15:08:19', '2023-07-01 20:59:19');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `wip_users`
--
ALTER TABLE `wip_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `wip_users_email_unique` (`email`),
  ADD UNIQUE KEY `user_key` (`user_id`,`domain_id`,`perm_group_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
