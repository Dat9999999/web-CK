-- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS product_manager;

-- Sử dụng cơ sở dữ liệu mới tạo
USE product_manager;

--tạo bảng acc_admin
CREATE TABLE IF NOT EXISTS acc_admin (
    user_name VARCHAR(255) PRIMARY KEY DEFAULT 'admin',
    password VARCHAR(255) NOT NULL DEFAULT'admin',
    avatar VARCHAR(255) DEFAULT 'unkown.jpg',
    full_name VARCHAR(255) NOT NULL
);

-- tạo bảng customer 
CREATE TABLE IF NOT EXISTS customer (
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) PRIMARY KEY,
    address VARCHAR(255) NOT NULL
);


-- tạo bảng employee 
CREATE TABLE IF NOT EXISTS employee (
    user_name VARCHAR(255) PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(255),
    status VARCHAR(255) DEFAULT 'active',
    lock_ VARCHAR(255) DEFAULT 'no',
    full_name VARCHAR(255) NOT NULL,
    token VARCHAR(255),
    expiry_time BIGINT(20),
    sales INT DEFAULT 0
);

-- tạo bảng order_ 
CREATE TABLE IF NOT EXISTS order_ (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_phone VARCHAR(20) NOT NULL,
    order_date BIGINT NOT NULL,
    total_amount INT NOT NULL,
    amount_paid INT NOT NULL
);

-- tạo bảng order_detail 
CREATE TABLE IF NOT EXISTS order_detail (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    order_id INT NOT NULL,
    quantity INT NOT NULL,
);

-- tạo bảng product 
CREATE TABLE IF NOT EXISTS product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    original_price INT NOT NULL,
    price INT NOT NULL,
    catalog VARCHAR(255),
    creational_date BIGINT NOT NULL,
    barcode VARCHAR(255) UNIQUE
);


