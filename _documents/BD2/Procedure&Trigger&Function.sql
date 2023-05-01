-- Procedure & Trigger & Function

-- Trigger

/* Première lettre de nom et prenom en majuscule. */
CREATE TRIGGER usagersCaps_before_insert
BEFORE INSERT ON usagers
FOR EACH ROW
BEGIN
    SET NEW.nom = CONCAT(UCASE(LEFT(NEW.nom, 1)), SUBSTRING(NEW.nom, 2));
    SET NEW.prenom = CONCAT(UCASE(LEFT(NEW.prenom, 1)), SUBSTRING(NEW.prenom, 2));
END;
/* Première lettre de nom et prenom en majuscule après une modification */
CREATE TRIGGER usagersCaps_before_update
BEFORE UPDATE ON usagers
FOR EACH ROW
BEGIN
    SET NEW.nom = CONCAT(UCASE(LEFT(NEW.nom, 1)), SUBSTRING(NEW.nom, 2));
    SET NEW.prenom = CONCAT(UCASE(LEFT(NEW.prenom, 1)), SUBSTRING(NEW.prenom, 2));
END;

/* Triggers encrypt in argon */
-- Déja fait en laravel directement.
-- Vérifier la colonne password dans la table usagers.
select password from usagers;

-- Procedure

/* Procedure pour ajouter un usager */
DELIMITER //
CREATE PROCEDURE ajouterUsager(
    IN nom VARCHAR(50),
    IN prenom VARCHAR(50),
    IN password VARCHAR(255),
    IN email VARCHAR(50),
    IN type VARCHAR(1)
)
BEGIN
    INSERT INTO usagers (nom, prenom, password, email, type)
    VALUES (nom, prenom, password, email, type);
END //
/* Procedure pour modifier un usager */
DELIMITER //
CREATE PROCEDURE modifierUsager(
    IN id INT,
    IN nom VARCHAR(50),
    IN prenom VARCHAR(50),
    IN password VARCHAR(255),
    IN email VARCHAR(50),
)
BEGIN
    UPDATE usagers
    SET nom = nom, prenom = prenom, password = password, email = email
    WHERE id = id;
END //

/* procedure pour ajouter une couleur */
DELIMITER //
CREATE PROCEDURE ajouterCouleur(
    IN nom VARCHAR(50),
    IN code VARCHAR(7)
)
BEGIN
    INSERT INTO couleurs (nom_couleur, code_couleur)
    VALUES (nom, code);
END //
/* procedure pour ajouter une taille */
DELIMITER //
CREATE PROCEDURE ajouterTaille(
    IN nom_taille VARCHAR(50)
)
BEGIN
    INSERT INTO tailles (format)
    VALUES (nom_taille);
END //
/* procedure pour ajouter un article */
DELIMITER //
CREATE PROCEDURE ajouterArticle(
    IN nom VARCHAR(50),
    IN type VARCHAR(50),
    IN prix DECIMAL(10,2),
    IN description varchar(255)
)
BEGIN
    INSERT INTO articles (nom, type, prix, description)
    VALUES (nom, type, prix, description);
END //

--