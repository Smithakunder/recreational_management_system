-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 08:50 AM
-- Server version: 10.4.27-MariaDB
PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: club
--

-- --------------------------------------------------------

--
-- Table structure for table class
--

CREATE TABLE class (
  class_id varchar(20) NOT NULL,
  class_name varchar(20) DEFAULT NULL,
  class_schedule varchar(10) DEFAULT NULL,
  class_timing varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table class
--

INSERT INTO class (class_id, class_name, class_schedule, class_timing) VALUES
('c1', 'Western Dance', 'Monday', '04.00'),
('c2', 'Classical Dance', 'Thursday', '.00'),
('c3', 'Theatre', 'Sunday', '6.00'),
('c4', 'Instrumental Music', 'Tuesday', '10.00'),
('c5', 'Western Singing', 'Saturday', '12.00');

-- --------------------------------------------------------

--
-- Table structure for table instructor
--

CREATE TABLE instructor (
  instructor_id varchar(20) NOT NULL,
  name varchar(20) DEFAULT NULL,
  mobileno varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table instructor
--

INSERT INTO instructor (instructor_id, name, mobileno) VALUES
('I1', 'George','9999999999'),
('I2', 'Tanveer','8888888888'),
('I3', 'Wong Lee','7777777777'),
('I4', 'Kiran Das','6666666666'),
('I5', 'Harry Styles','6655665566');

-- --------------------------------------------------------

--
-- Table structure for table login
--

CREATE TABLE login (
  id int(10) NOT NULL,
  uname varchar(30) NOT NULL,
  pwd varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table login
--

INSERT INTO login (id, uname, pwd) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table member
--

CREATE TABLE member (
  mem_id varchar(20) NOT NULL,
  name varchar(30) DEFAULT NULL,
  dob varchar(20) DEFAULT NULL,
  age varchar(20) DEFAULT NULL,
  package varchar(10) DEFAULT NULL,
  mobileno varchar(10) DEFAULT NULL,
  pay_id varchar(20) DEFAULT NULL,
  instructor_id varchar(20) DEFAULT NULL,
  class_id varchar(20) NOT NULL,
  props_id varchar(20) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table member
--

INSERT INTO member (mem_id, name, dob, age, package, mobileno, pay_id, instructor_id, class_id,props_id) VALUES
('M1', 'Aditya', '18/08/1994', '26', '5200', '8888888888', 'Payment1', 'I1', 'c1','P1'),
('M2', 'sam', '26/06/1998', '21', '4800', '9988998899', 'Payment2', 'I2', 'c2','P2'),
('M3', 'Chirag', '22/07/1997', '22', '6400', '9977997799', 'Payment3', 'I3', 'c3','P3'),
('M4', 'vamshi', '21/08/1998', '21', '5400', '9966996699', 'Payment4', 'I4', 'c4','P4'),
('M5', 'Veeresh', '24/06/1999', '20', '6000', '9955995599', 'Payment5', 'I5', 'c5','P5');

-- --------------------------------------------------------

--
-- Table structure for table payment
--

CREATE TABLE payment (
  pay_id varchar(20) NOT NULL,
  amount varchar(20) DEFAULT NULL,
  mem_id varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table payment
--

INSERT INTO payment (pay_id, amount, mem_id) VALUES
('Payment1', '5200', 'M1'),
('Payment2', '4800', 'M2'),
('Payment3', '6400', 'M3'),
('Payment4', '5400', 'M4'),
('Payment5', '6000', 'M5');

--
-- Table structure for table props
--

CREATE TABLE props (
  props_id varchar(20) NOT NULL,
  props_name varchar(30) DEFAULT NULL,
  mem_id varchar(20) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table props
--

INSERT INTO props (props_id, props_name,mem_id) VALUES
('P1', 'Western costumes','M1'),
('P2', 'Classical costumes','M2'),
('P3', 'Musical instruments','M3'),
('P4', 'Drama Costumes','M4'),
('P5', 'Music','M5');

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--
ALTER TABLE class
  ADD PRIMARY KEY (class_id);

ALTER TABLE instructor
  ADD PRIMARY KEY (instructor_id);

ALTER TABLE login
  ADD PRIMARY KEY (id);

ALTER TABLE member
  ADD PRIMARY KEY (mem_id),
  ADD KEY pay_id (pay_id),
  ADD KEY instructor_id (instructor_id),
  ADD KEY class_id (class_id),
  ADD KEY props_id(props_id);

ALTER TABLE payment
  ADD PRIMARY KEY (pay_id),
  ADD KEY mem_id (mem_id);

ALTER TABLE props
  ADD PRIMARY KEY (props_id),
  ADD KEY mem_id (mem_id);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE login
  MODIFY id int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
--
-- Constraints for dumped tables
--
ALTER TABLE member
  ADD CONSTRAINT member_ibfk_1 FOREIGN KEY (pay_id) REFERENCES payment (pay_id),
  ADD CONSTRAINT member_ibfk_2 FOREIGN KEY (instructor_id) REFERENCES instructor (instructor_id),
  ADD CONSTRAINT member_ibfk_3 FOREIGN KEY (class_id) REFERENCES class (class_id),
  ADD CONSTRAINT member_ibfk_4 FOREIGN KEY (props_id) REFERENCES props (props_id);
  

ALTER TABLE payment
  ADD CONSTRAINT payment_ibfk_1 FOREIGN KEY (mem_id) REFERENCES member (mem_id);

ALTER TABLE props
  ADD CONSTRAINT props_ibfk_1 FOREIGN KEY (mem_id) REFERENCES props (props_id);

-- Stored Procedure
DELIMITER //
CREATE PROCEDURE GetMembersByClass(IN classID VARCHAR(20))
BEGIN
    SELECT * FROM member WHERE class_id = classID;
END //
DELIMITER ;

-- Trigger
DELIMITER //
CREATE TRIGGER UpdateAgeOnDOBChange
BEFORE UPDATE ON member
FOR EACH ROW
BEGIN
    IF OLD.dob != NEW.dob THEN
        SET NEW.age = TIMESTAMPDIFF(YEAR, STR_TO_DATE(NEW.dob, '%d/%m/%Y'), CURDATE());
    END IF;
END //
DELIMITER ;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


UPDATE member SET dob = '10/10/1990' WHERE mem_id = 'M1';
-- SELECT age FROM member WHERE mem_id = 'M1';
