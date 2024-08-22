CREATE DATABASE eng_har_sim;

USE eng_har_sim;

CREATE TABLE circuits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    resistors VARCHAR(255),
    capacitor VARCHAR(255),
    inductors VARCHAR(255),
    voltage FLOAT,
    current FLOAT,
    diagram_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
