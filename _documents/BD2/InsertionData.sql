USE nom_database;
-- Insertion dans la table des tailles
INSERT INTO tailles
VALUES ('s'),
    ('m'),
    ('l'),
    ('xl'),
    ('xxl'),
    ('xxxl');

-- Insertion dans la table des couleurs
INSERT INTO couleurs (nom_couleur, code_couleur)
VALUES ('rouge', '#ff0000'),
    ('bleu', '#0000ff'),
    ('vert', '#00ff00'),
    ('jaune', '#ffff00'),
    ('noir', '#000000'),
    ('blanc', '#ffffff'),
    ('orange', '#ff8000'),
    ('rose', '#ff00ff'),
    ('violet', '#8000ff'),
    ('gris', '#808080'),
    ('marron', '#804000'),
    ('beige', '#ffff80'),
    ('turquoise', '#00ffff'),
    ('bordeaux', '#800000'),
    ('kaki', '#808000'),
    ('marine', '#000080'),
    ('argent', '#c0c0c0'),
    ('or', '#ffd700'),
    ('bronze', '#cd7f32'),
    ('cuivre', '#b87333'),
    ('ivoire', '#fffff0');

-- Insertion dans la table des usagers
INSERT INTO usagers (nom,prenom,password,email,no_telephone,type,remember_token,created_at,updated_at)
VALUES ('Dehoule','Fabrice',SHA2('phrasedepasse',255),'fabrice.dehoule.01@cegeptr.qc.ca',null,'Admin',null,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
        ('SuperAdmin','SuperAdmin',SHA2('1GestionDesChandails',255),'superadmin@superadmin.com',null,'SuperAdmin',null,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       ('Hebert','Jean-Michel',SHA2('motdepasse',255),'jeanmichelhebert@edu.cegeptr.qc.ca',null,'Client',null,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       ('Lavoie', 'Sophie', SHA2('p@ssw0rd!', 255), 'sophie.lavoie@exemple.com', '514-555-1234', 'Client', null, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP()),
       ('Tremblay', 'Patrick', SHA2('m0td3p@ss3', 255), 'patrick.tremblay@exemple.com', '418-555-5678', 'Client', null, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP()),
       ('Gagnon', 'Emilie', SHA2('Gagn0n123', 255), 'emilie.gagnon@exemple.com', null, 'Client', null, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());

-- Insertion dans la table des campagnes

INSERT INTO campagnes (nom_campagne, date_debut_campagne, date_fin_campagne,date_debut_collecte,date_fin_collecte,statut,progression, created_at, updated_at)
VALUES ('H2022', '2022-02-15', '2022-03-25','2022-03-26','2022-04-31','terminée','collecte', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP()),
       ('A2022', '2022-08-20', '2022-09-14','2022-09-15','2022-10-20','terminée','collecte',CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());
INSERT INTO campagnes (nom_campagne, date_debut_campagne, date_fin_campagne,date_debut_collecte,date_fin_collecte, created_at, updated_at)
VALUES ('H2023', '2023-02-01', '2023-03-07','2023-03-08','2023-04-20', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());

-- Insertion dans la table des articles

INSERT INTO articles (nom,type,description,created_at,updated_at)
VALUES ('Tshirt','chandails','Chandail de cotton, Gildan et unisexe',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       ('Kangourou','kangourous','Kangourou de cotton Gildan et unisexe',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       ('Chandail à manches longues','chandails','Chandail à manches longues Gildan et unisexe',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       ('TankTop','autres','TankTop de cotton et unisexe',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP());

-- Insertion dans la table des article_campagne

INSERT INTO article_campagne (article_id,campagne_id,image,couleur,taille,quantite_max,prix,created_at,updated_at)
VALUES (1,1,null,1,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,1,null,2,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (4,1,null,3,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (4,1,null,4,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (3,1,null,5,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (3,1,null,6,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,2,null,7,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (2,2,null,8,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (3,2,null,9,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,3,null,10,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,3,null,11,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,3,null,12,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,3,null,13,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (2,3,null,14,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (2,3,null,14,2,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,3,null,16,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,3,null,16,2,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,3,null,18,1,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (1,3,null,18,2,10,20.00,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP());

-- Insertion dans la table des commandes

INSERT INTO commandes (usager_id,created_at,updated_at)
VALUES (3,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (4,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (5,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP());

-- Insertion dans la table d'article_campagne_commande

INSERT INTO article_campagne_commande (article_campagne_id,commande_id,quantite,created_at,updated_at)
VALUES (1,1,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (2,1,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (3,1,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (4,1,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (5,1,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (6,1,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (7,2,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (8,2,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (9,2,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (10,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (11,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (12,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (13,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (14,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (15,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (16,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (17,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (18,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (19,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP()),
       (20,3,1,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP());


