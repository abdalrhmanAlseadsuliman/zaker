CREATE TABLE articles (
    ArticleId INT PRIMARY KEY AUTO_INCREMENT,
    Title VARCHAR(255) NOT NULL,
    Content TEXT NOT NULL,
    Category VARCHAR(50) NOT NULL,
    PublishDate DATE NOT NULL,
    Keywords VARCHAR(255) NOT NULL,
    FeaturedImage VARCHAR(255), -- حقل للصورة البارزة
    UserIdArticale INT, -- حقل مفتاح أجنبي لربط المستخدم الناشر
    FOREIGN KEY (UserIdArticale) REFERENCES users(UserId)
);