CREATE DATABASE IF NOT EXISTS multilogin;

USE multilogin;

CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    level INT(1) NOT NULL COMMENT '0=admin, 1=user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Password: admin123 dan user123 
INSERT INTO users (username, password, level) VALUES
('admin', 'admin123', 0),
('user', 'user123', 1);

SELECT * FROM users;