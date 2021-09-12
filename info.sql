CREATE DATABASE bank;

USE bank;

CREATE TABLE transaction (
  t_no int(11) NOT NULL,
  t_sender text NOT NULL,
  t_receiver text NOT NULL,
  t_amount int(11) NOT NULL,
  date_time datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE clients (
  c_id int(11) NOT NULL,
  c_name varchar(255) NOT NULL,
  c_email varchar(255) NOT NULL,
  c_balance int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Inserting dummy data

INSERT INTO clients (c_id, c_name, c_email, c_balance) VALUES
(1001, 'Sarthak Rajput', 'sarthak@gmail.com', 600000),
(1002, 'Garima', 'gar07@gmail.com', 800000),
(1003, 'Neerja', 'neer@gmail.com', 700000),
(1004, 'Aadi Gaikwad', 'adi2@gmail.com', 450000),
(1005, 'Anurag Sidana', 'sidana@gmail.com', 750000),
(1006, 'Gaia', 'gg4@gmail.com', 555000),
(1007, 'Saksham Mathur', 'saksham45@gmail.com', 465000),
(1008, 'Rahul Rai', 'rahul65@gmail.com', 361000),
(1009, 'Aman Kohli', 'amankohli@gmail.com', 473000),
(1010, 'Sarthak Shrivastav', 'ss76@gmail.com', 612000);


ALTER TABLE transaction
  ADD PRIMARY KEY (t_no);

ALTER TABLE clients
  ADD PRIMARY KEY (c_id);

ALTER TABLE transaction
  MODIFY t_no int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE clients
  MODIFY c_id int(11) NOT NULL AUTO_INCREMENT;



