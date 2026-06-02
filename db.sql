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
INSERT INTO users (email, password, role, first_name, last_name) VALUES
('admin@gmail.com', '$2y$10$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36lbvlCi', 'admin', 'John', 'Admin'),
('sales@gmail.com', '$2y$10$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36lbvlCi', 'sales', 'Sarah', 'Sales'),
('warehouse@gmail.com', '$2y$10$N9qo8uLOickgx2ZMRZoMyeIjZAgcg7b3XeKeUxWdeS86E36lbvlCi', 'warehouse', 'Mike', 'Warehouse');
