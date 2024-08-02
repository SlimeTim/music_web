

--  Tạo  database  music_db
CREATE DATABASE music_db
GO

USE music_db
GO


-- Tạo bảng `music`
--

CREATE TABLE `music` (
  `id` int(30) NOT NULL Primary key,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `audio_path` text DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
);


-- Insert vào bảng `music`
--

INSERT INTO `music` (`id`, `title`, `description`, `audio_path`, `image_path`, `date_created`, `date_updated`) VALUES
(1, 'Song1', 'Song1 description', './audio/Song1.mp3', './images/Song1.jpg', '2023-12-03 22:22:21', '2023-12-03 22:22:21'),
(2, 'Song2', 'Song2 description', './audio/Song2.mp3', './images/Song2.jpg', '2023-12-03 22:22:21', '2023-12-03 22:22:21');


-- Tạo bảng `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL Primary key,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL
); 


-- Insert vào bảng `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `contact`, `address`, `email`, `password`) VALUES
(1, 'abc', 'def', 'Male', '+123546879', 'abc', 'abcn@def.com', 'abc123'),
(2, 'test', 'account', 'Male', '+567891011', 'Address', 'test@test.com', '123456789');


-- AUTO_INCREMENT cho bảng `music`
--
ALTER TABLE `music`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;


-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
