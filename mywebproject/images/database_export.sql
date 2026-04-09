-- Create database
CREATE DATABASE IF NOT EXISTS hotel_db;
USE hotel_db;

-- Table 1: Orders
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    menu_item VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    order_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table 2: Messages
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    location VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table 3: Admin (for login)
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert default admin user (password = 'password123')
INSERT INTO admin (username, password) VALUES ('admin', MD5('password123'));

-- Table 4: Qualifications (for individual project)
CREATE TABLE IF NOT EXISTS qualifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    board10 VARCHAR(10),
    percentage10 DECIMAL(5,2),
    year10 VARCHAR(4),
    board12 VARCHAR(10),
    percentage12 DECIMAL(5,2),
    year12 VARCHAR(4),
    boardgrad VARCHAR(10),
    percentagegrad DECIMAL(5,2),
    yeargrad VARCHAR(4),
    boardmaster VARCHAR(10),
    percentagemaster DECIMAL(5,2),
    yearmaster VARCHAR(4),
    course VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);