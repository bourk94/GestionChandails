-- Procedure & Trigger & Function

-- Trigger

/* Première lettre de nom et prenom en majuscule. */
CREATE TRIGGER usagersCaps_before_insert
    BEFORE INSERT
    ON usagers
    FOR EACH ROW
BEGIN
    SET NEW.nom = CONCAT(UCASE(LEFT(NEW.nom, 1)), SUBSTRING(NEW.nom, 2));
    SET NEW.prenom = CONCAT(UCASE(LEFT(NEW.prenom, 1)), SUBSTRING(NEW.prenom, 2));
END;
/* Première lettre de nom et prenom en majuscule après une modification */
CREATE TRIGGER usagersCaps_before_update
    BEFORE UPDATE
    ON usagers
    FOR EACH ROW
BEGIN
    SET NEW.nom = CONCAT(UCASE(LEFT(NEW.nom, 1)), SUBSTRING(NEW.nom, 2));
    SET NEW.prenom = CONCAT(UCASE(LEFT(NEW.prenom, 1)), SUBSTRING(NEW.prenom, 2));
END;

/* Triggers encrypt in argon */
-- Déja fait en laravel directement.
-- Vérifier la colonne password dans la table usagers.
select password
from usagers;



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
    IN email VARCHAR(50),)
BEGIN
    UPDATE usagers
    SET nom      = nom,
        prenom   = prenom,
        password = password,
        email    = email
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
    IN prix DECIMAL(10, 2),
    IN description varchar(255)
)
BEGIN
    INSERT INTO articles (nom, type, prix, description)
    VALUES (nom, type, prix, description);
END //

-- Création d'une procédure qui crée un article_campagne
DELIMITER //
CREATE PROCEDURE createArticleCampagne(
    IN _prix DOUBLE,
    IN idArticle INT,
    IN idCampagne INT,
    IN idCouleur INT,
    IN idTaille INT
)
BEGIN

    INSERT INTO article_campagne(article_id, campagne_id, couleur_id, taille_id, prix, created_at, updated_at)
    VALUES (idArticle, idCampagne, idCouleur, idTaille, _prix, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
END//
DELIMITER ;

-- Création d'une procédure qui crée une commande
DELIMITER //
CREATE PROCEDURE `createCommande`(IN idUsager INT)
BEGIN
    INSERT INTO commandes (usager_id, date_commande, created_at, updated_at)
    VALUES (idUsager, NOW(), CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
END//
DELIMITER ;

-- Création d'une procédure qui crée un article_campagne_commande
DELIMITER //
CREATE PROCEDURE createCommandeArticle(IN idCommande INT, IN idUsager INT, IN idArticleCampagne INT, IN _quantite INT,
                                       IN _montantTotal DECIMAL(10, 2))
BEGIN
    DECLARE idCampagne INT;

    SELECT id into idCampagne FROM campagnes WHERE statut = 'en cours';
    INSERT INTO article_campagne_commande (commande_id, article_campagne_id, quantite, montant_total, created_at,
                                           updated_at)
    VALUES (idCommande, idArticleCampagne, _quantite, _montantTotal, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

END//
DELIMITER ;

-- Création d'une procédure qui retourne les infos d'une campagne selon son nom
DELIMITER //
CREATE PROCEDURE information_campagne(IN _nom_campagne VARCHAR(255))
BEGIN
    SELECT a.nom,
           c.nom_couleur,
           t.format,
           COUNT(acc.quantite) as quantite
    FROM article_campagne acc
             INNER JOIN campagnes cam on acc.campagne_id = cam.id
             INNER JOIN couleurs c on acc.couleur = c.id
             INNER JOIN tailles t on acc.taille = t.id
             INNER JOIN articles a on acc.article_id = a.id
    WHERE nom_campagne = _nom_campagne
    GROUP BY a.nom, c.nom_couleur, t.format;

END//
DELIMITER ;

-- Function to connect with a usagers and return his type. the password is encrypted with argon
DELIMITER //
CREATE FUNCTION `connecterUsager`(IN _email VARCHAR(255), IN _password VARCHAR(255)) RETURNS VARCHAR(255)
BEGIN
    DECLARE _type VARCHAR(1);
    SELECT type INTO _type FROM usagers WHERE email = _email AND password = _password;
    RETURN _type;
END//

-- function to



-- Création d'une procédure qui modifie le statut d'un article_campagne_commande
DELIMITER //
  CREATE PROCEDURE updateStatutArticleCampagneCommande(IN idArticleCampagneCommande INT, IN statut VARCHAR(255))
       BEGIN
           UPDATE article_campagne_commande
           SET statut = statut
           WHERE id = idArticleCampagneCommande;
       END//  
DELIMITER ;

-- function pour se connecter en tant qu'usager et le type.
DELIMITER //
CREATE FUNCTION `connecterUsager`(IN _email VARCHAR(255), IN _password VARCHAR(255)) RETURNS VARCHAR(255)
BEGIN
    DECLARE _type VARCHAR(1);
    SELECT type INTO _type FROM usagers WHERE email = _email AND password = _password;
    RETURN _type;
END//