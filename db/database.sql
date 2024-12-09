CREATE DATABASE IF NOT EXISTS cms_pictures;

USE cms_pictures;

CREATE TABLE IF NOT EXISTS pictures (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- Unique ID for each picture
    file_path VARCHAR(255) NOT NULL,         -- File location of the picture
    title VARCHAR(100) DEFAULT NULL,         -- Optional title or description
    location VARCHAR(100) DEFAULT NULL,         -- Optional title or description
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp of when the record was created
    tags VARCHAR(255) DEFAULT NULL           -- Optional tags for categorization
);
