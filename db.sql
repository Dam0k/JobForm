CREATE DATABASE IF NOT EXISTS form_data;
USE form_data;

CREATE TABLE IF NOT EXISTS responses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50),
    lname VARCHAR(50),
    email VARCHAR(100),
    phone VARCHAR(20),
    address VARCHAR(100),
    dob DATE,
    message TEXT,
    gender VARCHAR(10),
    file_path VARCHAR(255),
    terms BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
