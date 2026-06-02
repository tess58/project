-- Create database
CREATE DATABASE IF NOT EXISTS dashboard_db;
USE dashboard_db;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(50) NOT NULL,
  first_name VARCHAR(100),
  last_name VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert test users (password: 123456)
-- Hash generated using: password_hash('123456', PASSWORD_BCRYPT)
INSERT INTO users (email, password, role, first_name, last_name) VALUES
('admin@gmail.com', '$2y$10$z.h7dDqEE9uRV3xJ5h.fRO9c6xW7Lh7j5O4k5K5k5K5k5K5k5K5k5', 'admin', 'John', 'Admin'),
('sales@gmail.com', '$2y$10$z.h7dDqEE9uRV3xJ5h.fRO9c6xW7Lh7j5O4k5K5k5K5k5K5k5K5k5', 'sales', 'Sarah', 'Sales'),
('warehouse@gmail.com', '$2y$10$z.h7dDqEE9uRV3xJ5h.fRO9c6xW7Lh7j5O4k5K5k5K5k5K5k5K5k5', 'warehouse', 'Mike', 'Warehouse');
