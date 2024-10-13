Create Database IF NOT EXISTS Forum;

Use Forum;

CREATE TABLE IF NOT EXISTS Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    registration_date DATETIME NOT NULL,
    profile_bio TEXT,
    profile_picture TEXT
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Threads (
    thread_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    view_nb INT NOT NULL,
    thread_date DATETIME NOT NULL,
    description TEXT,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    thread_id INT NOT NULL,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    post_date DATETIME NOT NULL,
    FOREIGN KEY (thread_id) REFERENCES Threads(thread_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS Private_Messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    content TEXT NOT NULL,
    deleted TINYINT(1) NOT NULL,
    timestamp DATETIME NOT NULL,
    FOREIGN KEY (sender_id) REFERENCES Users(user_id),
    FOREIGN KEY (receiver_id) REFERENCES Users(user_id)
)ENGINE=InnoDB;

ALTER TABLE Users 
MODIFY registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE Posts 
MODIFY post_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE Threads 
MODIFY thread_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE Private_Messages 
MODIFY timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE Private_Messages
MODIFY COLUMN deleted TINYINT(1) NOT NULL DEFAULT 0;

INSERT INTO Categories (category_name) VALUES
('general-discussion'),
('technology'),
('entertainment'),
('health'),
('travel'),
('sports'),
('food'),
('arts'),
('science'),
('education'),
('relationships'),
('gaming'),
('politics'),
('religion'),
('environment'),
('off-topic');