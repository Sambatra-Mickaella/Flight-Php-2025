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
    idVehicule INT NOT NULL,
    FOREIGN KEY (idTrajet) REFERENCES kptv_trajets(id),
    FOREIGN KEY (idChauffeur) REFERENCES kptv_chauffeurs(id),
    FOREIGN KEY (idVehicule) REFERENCES kptv_vehicules(id)
);

CREATE OR REPLACE VIEW v_kptv_trajets_complets AS
SELECT 
    t.id AS trajet_id,
    t.date_debut,
    t.date_fin,
    t.type_voyage,
    t.recette,
    t.carburant,
    (t.recette - t.carburant) AS benefice,
    
    p.id AS parcours_id,
    p.lieu_depart,
    p.lieu_arrivee,
    p.distance,
    
    vo.id AS voyage_id,
    
    ve.id AS vehicule_id,
    ve.modele,
    ve.immatriculation,
    ve.capacite,
    ve.min_versement,
    
    c.id AS chauffeur_id,
    c.nom AS chauffeur_nom,
    c.contact AS chauffeur_contact
    
FROM kptv_trajets t
JOIN kptv_parcours p ON t.idParcours = p.id
JOIN kptv_voyage vo ON vo.idTrajet = t.id
JOIN kptv_vehicules ve ON vo.idVehicule = ve.id
JOIN kptv_chauffeurs c ON vo.idChauffeur = c.id;


CREATE OR REPLACE VIEW v_kptv_vehicules_par_jour AS
SELECT 
    DATE(date_debut) AS jour,
    vehicule_id,
    immatriculation,
    modele,
    chauffeur_id,
    chauffeur_nom,
    SUM(distance) AS km_effectues,
    SUM(recette) AS montant_recette,
    SUM(carburant) AS montant_carburant,
    SUM(benefice) AS benefice,
    COUNT(trajet_id) AS nombre_trajets
FROM v_kptv_trajets_complets
GROUP BY DATE(date_debut), vehicule_id, chauffeur_id;


CREATE OR REPLACE VIEW v_kptv_benefice_par_vehicule AS
SELECT 
    vehicule_id,
    immatriculation,
    modele,
    SUM(benefice) AS benefice_total,
    SUM(recette) AS recette_totale,
    SUM(carburant) AS carburant_total,
    SUM(distance) AS km_totaux,
    COUNT(trajet_id) AS nombre_trajets
FROM v_kptv_trajets_complets
GROUP BY vehicule_id;


CREATE OR REPLACE VIEW v_kptv_benefice_par_jour AS
SELECT 
    DATE(date_debut) AS jour,
    SUM(benefice) AS benefice_total,
    SUM(recette) AS recette_totale,
    SUM(carburant) AS carburant_total,
    SUM(distance) AS km_totaux,
    COUNT(trajet_id) AS nombre_trajets,
    COUNT(DISTINCT vehicule_id) AS nombre_vehicules,
    COUNT(DISTINCT chauffeur_id) AS nombre_chauffeurs
FROM v_kptv_trajets_complets
GROUP BY DATE(date_debut);