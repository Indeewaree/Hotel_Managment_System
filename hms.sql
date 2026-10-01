-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 06:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(50) NOT NULL,
  `Reservation_ID` int(50) NOT NULL,
  `Room_No` int(50) NOT NULL,
  `Check_In_Date` date NOT NULL,
  `Check_Out_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `Reservation_ID`, `Room_No`, `Check_In_Date`, `Check_Out_Date`) VALUES
(1, 18, 212, '2024-05-01', '2024-05-04');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `C_No` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `Name`, `Email`, `Address`, `C_No`) VALUES
(2001, 'Piter Johann', 'piter@gmail.com', 'England', 71568936),
(2002, 'Hasanka Wiewardana', 'hasnka@yahoo.com', 'Colombo', 77567893),
(2003, 'Jane', 'jane@yahoo.com', 'Amarica', 14845229),
(2004, 'Praveen', 'praveen@gmail.com', 'Kandy', 769852413),
(2005, 'Pathum', 'pathum@gmail.com', 'Kurunegal', 702568911),
(2006, 'Gihan', 'gihan@gmail.com', 'No.187/19, Moonamalewatta, Kiriwaththuduwa', 11523468);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`, `user_type`) VALUES
('Pabasara', '1234', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(50) NOT NULL,
  `Room_No` int(50) NOT NULL,
  `Room_Type` varchar(50) NOT NULL,
  `Reservation_ID` int(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `Room_No`, `Room_Type`, `Reservation_ID`, `Status`) VALUES
(212, 15, 'signal room', 213, 'Stayover'),
(1001, 56, 'Single Room', 180, 'OCC'),
(1002, 253, 'Double Room', 89, 'Stayover'),
(1003, 150, 'Family Room', 75, 'Dirty'),
(1004, 250, 'Twin Room', 110, 'Stayover'),
(1005, 500, 'Deluxe Rooms ', 200, 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `room_service`
--

CREATE TABLE `room_service` (
  `id` int(50) NOT NULL,
  `Room_No` int(50) NOT NULL,
  `Service_ID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_service`
--

INSERT INTO `room_service` (`id`, `Room_No`, `Service_ID`) VALUES
(1, 350, 115);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(50) NOT NULL,
  `Service_Name` varchar(50) NOT NULL,
  `Cost` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `Service_Name`, `Cost`) VALUES
(1, 'Room Cleaning', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `C_No` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Name`, `Email`, `Position`, `C_No`) VALUES
(3001, 'Naveen Silva', 'naveen@gmail.com', 'Front Desk Clerk/Receptionist', 71658956),
(3002, 'Sachin Perera', 'sachin@yahoo.com', 'Sales and Marketing Staff:', 716895623);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` int(10) NOT NULL,
  `age` varchar(2) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `age`, `gender`, `email`, `password`, `user_type`) VALUES
(1, 'Pabasara Sithmini', 713163304, '26', 'female', 'admin@gmail.com', '1234', 'admin'),
(3, 'Dineth bandara', 772846262, '34', 'male', 'dineth@gmail.com', '123', 'staff'),
(4, 'Suraj Kumara', 745123451, '32', 'Male', 'suraj@gmail.com', '123', 'staff'),
(5, 'ChathaurA  Saranga', 777835766, '38', 'male', 'charith@gmail.com', '123', 'staff'),
(6, 'Nadisha', 772846262, '45', 'male', 'nadisha@gmail.com', '123', 'staff'),
(7, 'Kavidu Sathsara', 112785635, '54', 'male', 'kavidu@gmail.com', '123', 'staff'),
(13, 'P.A Thimedha Viraj Pushpakumara', 112753639, '28', 'male', 'nimedha256@gmail.com', '1234', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2008;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `room_service`
--
ALTER TABLE `room_service`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `Staff_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3003;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE guest ADD COLUMN userId INT;
ALTER TABLE guest ADD CONSTRAINT fk_guest_user FOREIGN KEY (userId) REFERENCES users(id)

ALTER TABLE booking ADD COLUMN guestId INT;
ALTER TABLE booking ADD CONSTRAINT fk_booking_guest FOREIGN KEY (guestId) REFERENCES guest(id);


ALTER TABLE guest ADD COLUMN userId INT;
ALTER TABLE guest ADD CONSTRAINT fk_guest_user FOREIGN KEY (userId) REFERENCES users(id)

ALTER TABLE booking ADD COLUMN guestId INT;
ALTER TABLE booking ADD CONSTRAINT fk_booking_guest FOREIGN KEY (guestId) REFERENCES guest(id);