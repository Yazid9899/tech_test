CREATE DATABASE IF NOT EXISTS patientDB;

USE PatientDB;

CREATE TABLE IF NOT EXISTS Patient (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  sex ENUM('Male', 'Female') NOT NULL,
  religion VARCHAR(13) NOT NULL,
  phone VARCHAR(13) NOT NULL,
  address VARCHAR(255) NOT NULL,
  nik VARCHAR(255) NOT NULL
);

USE PatientDB;

INSERT INTO Patient (name, sex, religion, phone, address, nik)
VALUES
  ('John Doe', 'Male', 'Christian', '081234567890', '123 Main St', '1234567890123456'),
  ('Jane Smith', 'Female', 'Muslim', '089876543210', '456 Elm St', '9876541210987654'),
  ('Alice Johnson', 'Female', 'Hindu', '085551234567', '789 Oak Ave', '5552234567123456'),
  ('Bob Johnson', 'Male', 'Buddhist', '084447772222', '321 Pine Rd', '4447732222123456'),
  ('Eva Brown', 'Female', 'Buddhist', '087771118888', '678 Cedar Ln', '7775118888123456'),
  ('David Wilson', 'Male', 'Jewish', '085555555555', '555 Fifth St', '5555255555123456'),
  ('Emily Davis', 'Female', 'Christian', '081112223333', '111 Elm St', '1162223333123456'),
  ('Michael Clark', 'Male', 'Hindu', '084443331111', '444 Oak Ave', '4423331111123456'),
  ('Linda Rodriguez', 'Female', 'Muslim', '086667778888', '666 Pine Rd', '6267778888123456'),
  ('William Anderson', 'Male', 'Christian', '085554443333', '555 Cedar Ln', '1554443333123456'),
  ('Sophia Martinez', 'Female', 'Hindu', '082221119999', '222 Oak St', '2221109999123456'),
  ('James Taylor', 'Male', 'Jewish', '088877766666', '888 Pine Ave', '8887772666123456'),
  ('Olivia Hernandez', 'Female', 'Buddhist', '081112223333', '111 Elm Rd', '1112223333123456'),
  ('Benjamin Moore', 'Male', 'Christian', '085557778888', '555 Oak Ln', '5557178888123456'),
  ('Ava Lewis', 'Female', 'Hindu', '084444444444', '444 Pine St', '4444444445223456'),
  ('Elijah Walker', 'Male', 'Buddhist', '087776665555', '777 Cedar Ave', '7776565555123456'),
  ('Mia Green', 'Female', 'Christian', '082223334444', '222 Main Rd', '2223323444123456'),
  ('Samuel Hall', 'Male', 'Muslim', '081116667777', '111 Elm Ave', '1116667723123456'),
  ('Sophia Jackson', 'Female', 'Hindu', '083337779999', '333 Oak St', '3337772999123456'),
  ('Henry White', 'Male', 'Jewish', '088822211111', '888 Pine Ave', '8882231111123456'),
  ('Olivia Thomas', 'Female', 'Buddhist', '085533322222', '555 Cedar Ln', '5553332222123456'),
  ('Lucas Martin', 'Male', 'Christian', '081118885555', '111 Elm St', '1118852555123456'),
  ('Emma Johnson', 'Female', 'Hindu', '084455566666', '444 Oak Ave', '4445556266123456'),
  ('William Brown', 'Male', 'Buddhist', '087772223333', '777 Pine Rd', '7772220333123456'),
  ('Olivia Smith', 'Female', 'Hindu', '082233344444', '222 Cedar Ln', '2220334444123456'),
  ('Lucas Johnson', 'Male', 'Christian', '085544443333', '555 Pine St', '5554143333123456'),
  ('Mia Davis', 'Female', 'Buddhist', '083322211111', '333 Elm Rd', '3332221111103456'),
  ('Samuel Clark', 'Male', 'Muslim', '088866655555', '888 Oak Ave', '8886665155123456'),
  ('Ava Davis', 'Female', 'Hindu', '081117778888', '111 Main St', '1117778188123456');

