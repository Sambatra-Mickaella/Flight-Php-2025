CREATE TABLE parcours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lieu_depart VARCHAR(255) NOT NULL,
    lieu_arrivee VARCHAR(255) NOT NULL,
    distance DECIMAL(10,2) NOT NULL
);

INSERT INTO parcours (lieu_depart, lieu_arrivee, distance) VALUES
('67 Ha', 'Anosibe', 12.50),
('Analakely', 'Ambohimanarina', 8.30),
('Ampasampito', 'Ambatobe', 6.20),
('Behoririka', 'Ankadifotsy', 4.50),
('Soarano', 'Andohalo', 3.80),
('Analakely', 'Ambohijatovo', 5.60),
('Tsaralalana', 'Ankorondrano', 7.40),
('Ambohijatovo', 'Anosy', 4.20),
('Isotry', 'Mahamasina', 3.50),
('Analakely', 'Ampefiloha', 6.80),
('Behoririka', 'Ambanidia', 9.20),
('Ampasampito', 'Ambohitrarahaba', 11.50),
('Soarano', 'Mahazo', 14.30),
('Analakely', 'Ivato', 15.80),
('67 Ha', 'Ambohimangakely', 10.70),
('Behoririka', 'Ambohidratrimo', 13.40),
('Analakely', 'Tanjombato', 16.50),
('Tsaralalana', 'Andraisoro', 5.90),
('Ambohijatovo', 'Faravohitra', 2.80),
('Isotry', 'Antohomadinika', 4.60);