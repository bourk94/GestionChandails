USE h2023_420416ri_eq8;

-- Vue pour les informations de la campagne en cours avec l'usager associé
CREATE view information_campagne_usager_encours as
SELECT CONCAT(u.prenom, ' ', u.nom) as nom,
       a.nom                        as article,
       c.nom_couleur,
       t.format,
       acc.quantite
FROM usagers u
         INNER JOIN commandes ON u.id = commandes.usager_id
         INNER JOIN article_campagne_commande acc on commandes.id = acc.commande_id
         INNER JOIN article_campagne ac on acc.article_campagne_id = ac.id
         INNER JOIN campagnes cam on ac.campagne_id = cam.id
         INNER JOIN couleurs c on ac.couleur = c.id
         INNER JOIN tailles t on ac.taille = t.id
         INNER JOIN articles a on ac.article_id = a.id
WHERE cam.statut = 'en cours';

-- Vue pour les informations de la campagne en cours
CREATE view information_campagne_encours as
SELECT a.nom,
       c.nom_couleur,
       t.format,
       COUNT(acc.quantite) as quantite
FROM usagers u
         INNER JOIN commandes ON u.id = commandes.usager_id
         INNER JOIN article_campagne_commande acc on commandes.id = acc.commande_id
         INNER JOIN article_campagne ac on acc.article_campagne_id = ac.id
         INNER JOIN campagnes cam on ac.campagne_id = cam.id
         INNER JOIN couleurs c on ac.couleur = c.id
         INNER JOIN tailles t on ac.taille = t.id
         INNER JOIN articles a on ac.article_id = a.id
WHERE cam.statut = 'en cours'
GROUP BY a.nom, c.nom_couleur, t.format;



