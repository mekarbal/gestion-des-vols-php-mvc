-- create and use database
CREATE DATABASE flightManagmentP2;
USE flightManagmentP2;

-- create tables
CREATE TABLE Users(
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50), 
    last_name VARCHAR(50),
    id_card VARCHAR(10),
    passport VARCHAR(10),
    nationality VARCHAR(50),
    birthday DATETIME,
    email VARCHAR(60),
    password_user VARCHAR(100),
    phone VARCHAR(15),
    role VARCHAR(10)
);


CREATE TABLE Flight(
    id_flight INT AUTO_INCREMENT PRIMARY KEY,
    plane_name VARCHAR(50),
    depart VARCHAR(80), 
    distination VARCHAR(80),
    date_flight DATETIME, 
    price INT,
    total_places INT(4),
    is_active TINYINT(1)
);

CREATE TABLE Reservation(
    id_resevation INT AUTO_INCREMENT PRIMARY KEY, 
    id_flight INT,
    id_user INT, 
    date_resevation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_flight) references Flight(id_flight),
    FOREIGN KEY (id_user) references Users(id_user)
);

CREATE TABLE Travler(
    id_travler INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT, 
    id_flight INT,
    id_resevation INT, 
    first_name VARCHAR(50), 
    last_name VARCHAR(50),
    passport VARCHAR(10),
    FOREIGN KEY (id_user) references Users(id_user),
    FOREIGN KEY (id_flight) references Flight(id_flight),
    FOREIGN KEY (id_resevation) references Reservation(id_resevation)
);

-- add rows
INSERT INTO Flight(plane_name, depart, distination, date_flight, price, total_places,is_active) 
VALUES 
('Qatar Airways', 'Morocco', 'France', '2020-05-23', 1500, 100,1),
('Singapore Airlines', 'Morocco', 'Spain', '2020-06-02', 2000, 150,1),
('Emirates', 'Spain', 'UK', '2020-06-02', 1000, 80,1),
('ANA All Nippon Airways', 'France', 'Japan', '2020-06-04', 10000, 200,1),
('Qatar Airways', 'Morocco', 'Japan', '2020-05-23', 1500, 100,1),
('Singapore Airlines', 'Morocco', 'Spain', '2020-06-02', 2000, 150,1),
('Emirates', 'Morocco', 'France', '2020-06-02', 1000, 80,1),
('ANA All Nippon Airways', 'Spain', 'France', '2020-06-04', 10000, 200,1),
('EVA Air', 'France', 'China', '2020-06-10', 10100, 100,1),
('Singapore Airlines', 'Morocco', 'France', '2020-04-12', 1000, 80,1);

INSERT INTO Users(first_name, last_name, id_card, passport, nationality, birthday, email, password_user, phone, role) 
VALUES 
('Youssef', 'Abada', 'HH154644', 'MAR134567', 'Morocco', '1996-06-18','youssef.abada.x@gmail.com', 'admin123', '+21266578685','admin'),
('John', 'Doe', 'HH151188', 'MAR454500', 'USA', '1996-08-20','john.doe@gmail.com', 'user123', '+21266578685','user');


-- create trigger
DELIMITER $$
CREATE TRIGGER reservePlace 
AFTER INSERT ON Reservation FOR EACH ROW
BEGIN
UPDATE Flight SET Flight.total_places = Flight.total_places - 1 WHERE Flight.id_flight = NEW.id_flight;
END $$
DELIMITER ;

