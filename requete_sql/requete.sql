-- ajout des categories
INSERT INTO categorie(IdCategorieParent, nom)
VALUES 
	(NULL,'Chien'),
	(NULL,'Chat'),
    (NULL,'Rongeur'),
    (NULL,'Aquariophilie'),
    (NULL,'Terrariophilie'),
    (NULL,'Oiseau'),
    (NULL,'Espace');
    
INSERT INTO categorie(IdCategorieParent, nom)
VALUES 
    (1,'Alimentation pour chiens'),
    (1,'Compléments Alimentaires'),
    (1,'Hygiène et soins'),
    (1,'Gamelles et distributeurs'),
    (1,'Colliers et Laisses'),
    (1,'Jouets'),
    (2,'Alimentation pour Chats'),
    (2,'Litières pour chats'),
    (2,'Hygiène et soins'),
    (2,'Gamelles et distributeurs'),
    (2,'Arbre à Chat'),
    (2,'Jouets'),
    (2,'Voyage et Transport'),
    (3,'Alimentation pour Rongeurs'),
    (3,'Hygiène et soins'),
    (3,'Cages et accéssoires'),
    (4,'Alimentation pour Reptiles'),
    (4,'Eclairage'),
    (4,'Chauffage'),
    (4,'Substrat'),
    (4,'Décoration'),
    (4,'Accessoire pour Terrarium'),
    (5,'Alimentation pour Oiseaux'),
    (5,'Habitat'),
    (5,'Hygiène et soins'),
    (5,'Mangeoire'),
    (5,'Nichoire'),
    (6,'Alimentation pour poisson'),
    (6,'Aquarium'),
    (6,'Filtration'),
    (6,'Traitement et soins');


-- insertion des genres

INSERT INTO genre(libelle)
VALUES ('Homme'),('Femme'),('Autre');


-- insertiont statut de commande

INSERT INTO statut(etat)
VALUES ('Acceptée'),('En cours de préparation'),('Expédiée'),('Remboursée');

-- insertiont moyen de paiement

INSERT INTO payement(denomination)
VALUES('Carte Bancaire'),('Paypal')


-- hachage des mdp

UPDATE client
SET client.mdp = SHA2(client.mdp, 512);


-- DECLENCHEUR VERIF MAIL
BEGIN 
IF (new.mail NOT LIKE '%_@_%._%' OR new.mail LIKE '% %' OR new.mail LIKE '%@%@%')
THEN 
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = 'une adresse mail doit être du format aaa@aaa.aaa'; 
END IF; 
END


-- evenementabandon de panier

BEGIN
IF(panier.IdPanier NOT IN (SELECT commande.IdPanier FROM commande) AND panier.datePanier + INTERVAL 7 DAY < CURDATE())
THEN
UPDATE panier
SET panier.estExpire = 1;
END IF;
END


-- update des panier qui sont expiré
UPDATE panier
SET panier.estExpire = 1
WHERE panier.IdPanier NOT IN (SELECT commande.IdPanier FROM commande) AND panier.datePanier + INTERVAL 7 DAY < CURDATE()


-- ajout marques

INSERT INTO marque(libelle)
VALUES('4Pets'),('8in1'),('Acana'),('Adaptil'),('Affinity'),('Adventuros'),('Almo Nature'),('Animonda'),('AniOne'),('Applaws'),('Aumüller'),('Beaphar'),('Biokat\'s'),('BIOPlan'),('Bogadent'),('bosch'),('Bozita'),('Buddy\'s Cuisine'),('Bunny'),('Catit'),('Carnilove'),('Catsan'),('Cat`s Best'),('Cat\'s Love'),('Catlabs'),('Cesar'),('Chipsi'),('Christopherus'),('Chuckit'),('CJ Wildbird'),('CooCoo Design'),('Curli'),('Dennerle'),('DentaLife'),('Dobar'),('Dogs Creek'),('Earth Rated'),('Eheim'),('Edgard & Cooper'),('Eukanuba'),('Europet Bernina'),('Exo Terra'),('Felisept'),('Felix'),('Ferplast'),('Flexi'),('Fluval'),('Frolic'),('Frolicat'),('Furminator'),('Farmina'),('Gimcat'),('Gourmet'),('Green Petfood'),('HabaPet Litter Locker'),('Hagen'),('Hunter'),('Hamiform'),('Interzoo'),('JBL'),('JR Farm'),('JUWEL'),('Josera'),('KERBL'),('KONG'),('Kurgo'),('Lucky Reptile'),('Marina'),('MORE'),('Moser'),('MultiFit'),('Naturally Good'),('Natusan'),('Numaxes'),('Orijen'),('Oster'),('Pedigree'),('Penn Plax'),('Perfect Fit'),('PetBalance'),('Pontec'),('Pro Plan'),('Purina ONE'),('Quiko'),('REAL NATURE'),('Resch'),('Rinti'),('ROYAL CANIN'),('Ruffwear'),('Sanabelle'),('Sanicat'),('Savic'),('Sera'),('Sheba'),('Simple Solution'),('Staywell'),('Terra Canis'),('Tetra'),('Trixie'),('Tropica'),('True Instinct'),('United Pets'),('Versele Laga'),('Vitakraft'),('Whiskas'),('Wolters'),('Yarrah');

'

-- update produit

UPDATE produit
SET produit.estDisponible = 1
WHERE quantite > 0;


-- procedure stocké ajout commande
BEGIN
DELETE FROM commande;
DELETE FROM panier;
ALTER TABLE commande AUTO_INCREMENT = 1 ;
ALTER TABLE panier AUTO_INCREMENT = 1 ;
SET @maxi = 500 + RAND()*2500;
SET @i = 0;

WHILE @i < @maxi DO
    SET @datePanier = '2020-04-14' + INTERVAL (RAND()*TIMESTAMPDIFF(DAY, '2020-04-14', CURDATE())) DAY;
    SET @idClient = (SELECT client.IdClient FROM client ORDER BY RAND() LIMIT 1);
    INSERT INTO panier(datePanier, IdClient)
    VALUES (@datePanier, @idClient);

    IF RAND()*100 > 60
    THEN
        SET @IdPanier = (SELECT LAST_INSERT_ID() FROM panier LIMIT 1);
        SET @dateCommande = @datePanier + INTERVAL RAND()*7 DAY;
        SET @IdPayement = (SELECT paiement.IdPaiement FROM paiement ORDER BY RAND() LIMIT 1);
        SET @IdStatut = (SELECT statut.IdStatut FROM statut ORDER BY RAND() LIMIT 1);
        
            IF RAND()*100 < 90
            THEN
           		SET @IdAdresseFacture = (SELECT client.IdAdresse FROM client  WHERE client.IdClient = @IdClient);

            ELSE
            	SET @IdAdresseFacture = (SELECT adresse.IdAdresse FROM adresse ORDER BY RAND() LIMIT 1);
            END IF;

        INSERT INTO commande(IdPanier, dateCommande, IdPayement, IdStatut,IdAdresseFacture)
    	VALUES (@IdPanier, @dateCommande, @IdPayement, @IdStatut, @IdAdresseFacture);       
    END IF;

    SET @i = @i + 1;
END WHILE;
END


-- ajout 1 article dans chaque panier
INSERT INTO contenir(idProduit, idPanier, quantite)
SELECT
	(SELECT produit.IdProduit FROM produit ORDER by rand() limit 1),
    panier.IdPanier,
    1 + RAND()*3
FROM panier

-- ajout deuxieme article dans 75% panier
INSERT INTO contenir(idProduit, idPanier, quantite)
SELECT
	(SELECT produit.IdProduit FROM produit ORDER by rand() limit 1),
    panier.IdPanier,
    1 + RAND()*3
FROM panier
Order by rand()
limit 2103

-- ajout troisieme article dans 50% panier
INSERT INTO contenir(idProduit, idPanier, quantite)
SELECT
	(SELECT produit.IdProduit FROM produit ORDER by rand() limit 1),
    contenir.IdPanier,
    1 + RAND()*3
FROM contenir
GROUP BY contenir.IdPanier
HAVING COUNT(*) = 2
Order by rand()
limit 1402


-- ajout quatrième article dans 25% panier
INSERT INTO contenir(idProduit, idPanier, quantite)
SELECT
	(SELECT produit.IdProduit FROM produit ORDER by rand() limit 1),
    contenir.IdPanier,
    1 + RAND()*3
FROM contenir
GROUP BY contenir.IdPanier
HAVING COUNT(*) = 3
Order by rand()
limit 701


-- compte les panier en fct du nb de panier 
SELECT nb, COUNT(*) FROM (
	SELECT COUNT(*) nb
    FROM contenir
    GROUP BY contenir.IdPanier  
) T
group by nb


-- déclencheur commentaire


BEGIN

IF(new.IdClient NOT IN (SELECT panier.IdClient 
                        	FROM panier
                            JOIN commande ON commande.IdPanier = panier.IdPanier
                            JOIN contenir ON contenir.IdPanier = panier.IdPanier
                            JOIN produit ON produit.IdProduit = contenir.IdProduit
                            WHERE produit.IdProduit = new.IdProduit))
THEN
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = 'Vous ne pouvez pas commentez un produit que vous n\'avez pas acheté'; 

END IF;
END
'



-- listedesclients et de leur produit commandé
SELECT
    client.IdClient
FROM client
JOIN panier ON panier.IdClient = client.IdClient
JOIN contenir ON contenir.IdPanier = panier.IdPanier
JOIN produit ON produit.IdProduit = contenir.IdProduit
WHERE produit.IdProduit = 67


-- ajout des commentaires !!!doitenlever le déclencheur qui bloque si non commande

INSERT INTO commentaire(IdProduit, IdClient, note, description, dateAvis)
SELECT
    contenir.IdProduit,
    panier.IdClient,
    ROUND(RAND()*5),
    SHA2(CONV(FLOOR(RAND() * 99999999999999), 20, 36), 256),
    commande.dateCommande + INTERVAL (RAND() * 30) DAY
FROM panier
JOIN contenir ON contenir.IdPanier = panier.IdPanier
JOIN commande ON commande.IdPanier = panier.IdPanier
ORDER BY rand() limit 400;


-- requete qui récupère toutes les infos nécéssaire pour une commande
SET @idClient = 1; -- choix de l'id du client

SELECT	
	CONCAT(client.nom, ' ', client.prenom) 'Nom du Client',
    client.mail email,
    client.dateInscription `Date d'inscription`,
    COUNT(*) 'Nombre de Commande passée',
    SUM(produit.prixHT*contenir.quantite) 'Total dépensé',
    (SELECT SUM(produit.prixHT*contenir.quantite) FROM panier JOIN contenir ON contenir.IdPanier = panier.IdPanier JOIN commande ON commande.IdPanier = panier.IdPanier JOIN produit on produit.IdProduit = contenir.IdProduit WHERE panier.IdClient = @idClient GROUP BY panier.IdClient, commande.IdPanier ORDER BY commande.dateCommande desc LIMIT 1) 'Total de la commande HT',
    (SELECT SUM(produit.prixHT*contenir.quantite)*1.2 FROM panier JOIN contenir ON contenir.IdPanier = panier.IdPanier JOIN commande ON commande.IdPanier = panier.IdPanier JOIN produit on produit.IdProduit = contenir.IdProduit WHERE panier.IdClient = @idClient GROUP BY panier.IdClient, commande.IdPanier ORDER BY commande.dateCommande desc LIMIT 1) 'Total de la commande TTC',
    statut.etat 'Etat de la commande',
    CURDATE() 'Date dréation de facture'
FROM panier
JOIN client ON client.IdClient = panier.IdClient
JOIN commande ON commande.IdPanier = panier.IdPanier
JOIN contenir ON contenir.IdPanier = panier.IdPanier
JOIN produit ON produit.IdProduit = contenir.IdProduit
JOIN statut ON statut.IdStatut = commande.IdStatut
WHERE panier.IdClient = @idClient
GROUP BY panier.IdClient

