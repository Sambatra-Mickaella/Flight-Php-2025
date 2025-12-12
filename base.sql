CREATE TABLE kptv_parcours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lieu_depart VARCHAR(255) NOT NULL,
    lieu_arrivee VARCHAR(255) NOT NULL,
    distance DECIMAL(10,2) NOT NULL
);

INSERT INTO kptv_parcours (lieu_depart, lieu_arrivee, distance) VALUES
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

CREATE TABLE kptv_trajets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idParcours INT NOT NULL,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME,
    recette DECIMAL(10,2) NOT NULL,
    carburant DECIMAL(10,2) NOT NULL,
    type_voyage CHAR(1) NOT NULL,
    FOREIGN KEY (idParcours) REFERENCES kptv_parcours(id),
    CONSTRAINT chk_dates CHECK (date_fin > date_debut)   
);

CREATE TABLE kptv_chauffeurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    contact VARCHAR(100)
);

CREATE TABLE kptv_vehicules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modele VARCHAR(100),
    immatriculation VARCHAR(100) NOT NULL,
    capacite INT NOT NULL,
    min_versement DECIMAL(10,2) 
);

CREATE TABLE kptv_voyage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idTrajet INT NOT NULL,
    idChauffeur INT NOT NULL,
    idVehicule INT NOT NULL
    FOREIGN KEY (idTrajet) REFERENCES kptv_trajets(id),
    FOREIGN KEY (idChauffeur) REFERENCES kptv_chauffeurs(id),
    FOREIGN KEY (idVehicule) REFERENCES kptv_vehicules(id)
);