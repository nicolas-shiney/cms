-- Create the database
CREATE DATABASE IF NOT EXISTS cms;
USE cms;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role ENUM('admin', 'editor', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Media Types table
CREATE TABLE media_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL UNIQUE -- e.g., 'picture', 'video', 'audio'
);

-- Media table
CREATE TABLE media (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(255) NOT NULL UNIQUE, -- Path to the media file
    title VARCHAR(100), -- Optional title or description
    media_type_id INT NOT NULL, -- Links to media_types
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT, -- Who uploaded the media
    FOREIGN KEY (media_type_id) REFERENCES media_types(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Posts table
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- Author of the post
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    media_id INT, -- Optional featured media (picture/video)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (media_id) REFERENCES media(id) ON DELETE SET NULL
);

-- Tags table
CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- Polymorphic tagging relationship
CREATE TABLE tagged_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tag_id INT NOT NULL,
    item_id INT NOT NULL, -- The ID of the item being tagged
    item_type ENUM('post', 'media') NOT NULL, -- Type of the item being tagged
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);
