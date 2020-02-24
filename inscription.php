<!DOCTYPE html />
<html>
<head>
<title>ma page</title>
<meta charset= » utf-8» />
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<!-- Include Google Maps JS API -->
<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?libraries=places&key=PUT_YOUR_OWN_KEY_HERE"></script>

<!-- Custom JS code to bind to Autocomplete API -->
<script type="text/javascript" src="autocomplete.js"></script>

    <div class="container" >
            <center>
            <h1>Inscription.</h1>   
           <p>*Tous les champs sont obligatoire.</p>
           <form method="post" action="add_user.php">
                     <label for="champ">Societe :</label><br>
                    <select name="societe" style='width:220;'>
                    <option value="defaut">&lt;---  Liste des établissements  ---&gt;
                    <option>AAREAL BANK AG
                    <option>ABC INTERNATIONAL BANK PLC
                    <option>ADYEN N.V.
                    <option value="_c85jmarj3ckg4csj1dq3m2qbjckg68p908i17cpbcdto70pbdcln78_">Agence Française de Développement
                    <option>AGENCE FRANCE LOCALE
                    <option>Al Khaliji France S.A.
                    <option>Allianz Banque
                    <option>ANDBANK MONACO SAM
                    <option>ARKEA Banque Entreprises et Institutionnels
                    <option>ASSOCIATION FRANCAISE DES BANQUES
                    <option>Attijariwafa bank Europe
                    <option>Australia and New Zealand Banking Group Limited
                    <option>AXA Banque
                    <option>AXA Banque Financement
                    <option>BANCA POPOLARE DI SONDRIO (SUISSE)
                    <option>BANCO BILBAO VIZCAYA ARGENTARIA
                    <option>BANCO DE SABADELL
                    <option>BANCO DO BRASIL AG
                    <option>BANCO SANTANDER SA
                    <option>BANK AUDI FRANCE
                    <option>Bank Julius Baer (Monaco) S.A.M.
                    <option>BANK MELLI IRAN
                    <option>BANK OF AMERICA MERRILL LYNCH INTERNATIONAL 
                    <option>BANK OF CHINA LIMITED
                    <option>BANK OF COMMUNICATIONS (LUXEMBOURG) S.A.
                    <option>BANK OF INDIA
                    <option>BANK OF SCOTLAND
                    <option>BANK SADERAT IRAN
                    <option>BANK SEPAH
                    <option>BANK TEJARAT
                    <option>BANQUE BCP
                    <option>BANQUE BIA
                    <option>BANQUE CALEDONIENNE D'INVESTISSEMENT- B.C.I.
                    <option>BANQUE CANTONALE DE GENEVE (FRANCE) SA
                    <option>BANQUE CHAABI DU MAROC
                    <option>BANQUE CHABRIERES
                    <option>BANQUE CHALUS
                    <option>Banque CIC Est
                    <option>Banque CIC Nord Ouest
                    <option>Banque CIC Ouest
                    <option>Banque CIC Sud Ouest
                    <option>BANQUE D'ESCOMPTE
                    <option>BANQUE DE NOUVELLE CALEDONIE
                    <option>BANQUE DE POLYNESIE
                    <option>BANQUE DE SAVOIE
                    <option>BANQUE DE TAHITI - BDT
                    <option>BANQUE DE WALLIS ET FUTUNA
                    <option>BANQUE DEGROOF PETERCAM FRANCE
                    <option>BANQUE DELUBAC ET CIE
                    <option>BANQUE DU BTP BANQUE
                    <option>BANQUE EDEL SNC
                    <option value="_689gmssblckg4atbidto84pbedpii0p3l411n50j4d5q20jblehqmar0_">Banque Européenne du Crédit Mutuel
                    <option>BANQUE FEDERATIVE DU CREDIT MUTUEL
                    <option>BANQUE FIDUCIAL
                    <option>BANQUE FRANCAISE MUTUALISTE - BFM
                    <option>Banque Havilland (Monaco) S.A.M.
                    <option>Banque Hottinguer
                    <option>BANQUE INTERNATIONALE DE COMMERCE-BRED
                    <option>Banque J. SAFRA SARASIN (MONACO) SA
                    <option>BANQUE KOLB
                    <option>BANQUE LAYDERNIER
                    <option>BANQUE MICHEL INCHAUSPE - BAMI
                    <option>BANQUE MISR
                    <option>BANQUE NEUFLIZE OBC
                    <option>BANQUE NOMURA FRANCE
                    <option>BANQUE NUGER
                    <option>BANQUE PALATINE
                    <option>BANQUE POUYANNE
                    <option>BANQUE PSA FINANCE
                    <option>BANQUE REVILLON
                    <option>BANQUE RHONE-ALPES
                    <option>BANQUE RICHELIEU FRANCE
                    <option>BANQUE RICHELIEU MONACO
                    <option>BANQUE SAINT OLIVE
                    <option>BANQUE SBA
                    <option>BANQUE SOCREDO
                    <option>BANQUE SOLFEA
                    <option>BANQUE TARNEAUD
                    <option>BANQUE TRANSATLANTIQUE SA
                    <option>BANQUE TRAVELEX SA
                    <option>BARCLAYS BANK IRELAND PLC
                    <option>BARCLAYS BANK PLC 'MONACO'
                    <option>BAYERISCHE LANDESBANK
                    <option>BEMO EUROPE BANQUE PRIVEE
                    <option>BGFIBank EUROPE
                    <option>BINCKBANK
                    <option>BLOM BANK FRANCE
                    <option>BMCE Bank international Plc
                    <option>BNP PARIBAS
                    <option>BNP PARIBAS ANTILLES-GUYANE
                    <option>BNP PARIBAS Lease Group
                    <option>BNP PARIBAS NOUVELLE CALEDONIE
                    <option>BNP PARIBAS PERSONAL FINANCE
                    <option>BNP PARIBAS REUNION
                    <option>BNP PARIBAS Securities Services
                    <option>BNP PARIBAS WEALTH MANAGEMENT MONACO
                    <option>BOURSORAMA
                    <option>BPCE
                    <option>BPE
                    <option>Bpifrance Financement
                    <option>BRED COFILEASE
                    <option>BRED GESTION
                    <option>BYBLOS BANK EUROPE SA
                    <option>CA CONSUMER FINANCE
                    <option>CA Indosuez Wealth (France)
                    <option>CACEIS Bank
                    <option>CAISSE CENTRALE DU CREDIT IMMOBILIER DE FRANCE 
                    <option>CAISSE FRANCAISE DE DEVELOPPEMENT INDUSTRIEL
                    <option>CAIXA GERAL DE DEPOSITOS
                    <option>CaixaBank SA
                    <option>CARREFOUR BANQUE
                    <option>CFM Indosuez Wealth
                    <option>CHEBANCA S.p.A.
                    <option>CHINA CONSTRUCTION BANK (EUROPE) SA
                    <option>CIC IBERBANCO
                    <option>CITIBANK EUROPE PLC
                    <option>COMMERZBANK AG
                    <option>COMPAGNIE GENERALE DE CREDIT AUX PARTICULIERS
                    <option>COMPAGNIE MONEGASQUE DE BANQUE
                    <option>CONFEDERATION NATIONALE DU CREDIT MUTUEL
                    <option>CONFERENCE PERMANENTE DES CAISSES DE CREDIT MUNICIPAL
                    <option>CONSERVATEUR FINANCE
                    <option value="_i8dnp8s35e9gn8qb5epii0kj1c9nm4obedcg5abi15o_">Coöperatieve Rabobank U.A.
                    <option>CREATIS
                    <option value="_e8dp84p39egg42prid5hmur35411musjgdtp62t3541gmsp1095n7cpbjehmmarjk41162rjb_">Crédit Agricole Corporate and Investment Bank
                    <option>CREDIT AGRICOLE S.A.
                    <option>CREDIT DU NORD
                    <option>CREDIT INDUSTRIEL ET COMMERCIAL
                    <option>CREDIT LYONNAIS
                    <option>CREDIT MOBILIER DE MONACO
                    <option>Credit Suisse (Luxembourg) SA
                    <option>DEUTSCHE BANK AG
                    <option>Deutsche Pfandbriefbank AG
                    <option value="_d8hingqb1411n50j4d5q20j3fcdgmo_">Dexia Crédit Local
                    <option>Edmond de Rothschild (France)
                    <option>Edmond de Rothschild (Monaco)
                    <option>EFG Bank (Monaco)
                    <option>ELECTRO FINANCE
                    <option>ENGIE Global Markets
                    <option>EUROCLEAR FRANCE
                    <option>EUROPE ARAB BANK PLC
                    <option>FEDERAL FINANCE
                    <option>FIRST ABU DHABI BANK
                    <option>FONDS DE GARANTIE DES DEPOTS ET DE RESOLUTION
                    <option>FRANSABANK FRANCE SA
                    <option>GENEBANQUE
                    <option>GOLDMAN SACHS PARIS INC ET CIE
                    <option>HSBC Bank plc
                    <option>HSBC France
                    <option>Industrial and Commercial Bank of China Paris Branch
                    <option>ING Bank N.V.
                    <option value="_m95n76t39ehqn883gdtqn483cckg4cqbec5n66pbdcln78834ekg46qbeg9mm2835egg68pbj414msp3ledq74qb5ecg46tbcehqn4pbcdhin6_">Institut pour le Financement du Cinéma et des Industries Culturelles
                    <option>INTESA SANPAOLO S.p.A.
                    <option>JP MORGAN CHASE BANK, N.A.
                    <option>KBC BANK
                    <option>KEB HANA BANK
                    <option>LA BANQUE POSTALE
                    <option value="_09hgmsp35edh62rjb4146asrjcln2ql38g5p6irj7cln0_">Landesbank Hessen-Thüringen
                    <option>LAZARD FRERES BANQUE
                    <option value="_q9hkngu23ea168qbk_">LixxCrédit
                    <option>Lloyds Bank plc
                    <option>LYONNAISE DE BANQUE
                    <option>MEDIOBANCA-BANCA DI CREDITO FINANZIARIO
                    <option>MEGA INTERNATIONAL COMMERCIAL BANK CO.LTD.
                    <option>MILLEIS BANQUE
                    <option>Mizuho Bank, Ltd., Paris Branch
                    <option>MOBILIS BANQUE
                    <option>monabanq.
                    <option>MONTE PASCHI BANQUE SA
                    <option>MUFG Bank, Ltd
                    <option>MY PARTNER BANK
                    <option>N26 Bank GmbH
                    <option>NATIONAL BANK OF KUWAIT FRANCE SA
                    <option>NATIONAL BANK OF PAKISTAN
                    <option>NATIXIS
                    <option>NATIXIS PAYMENT SOLUTIONS
                    <option>NATIXIS WEALTH MANAGEMENT
                    <option>ONEY BANK
                    <option>ORANGE BANK
                    <option>PICTET &amp; CIE (EUROPE) SA
                    <option>PSA BANQUE FRANCE
                    <option>QATAR NATIONAL BANK
                    <option value="_va5akij2m8l9l8822c5n72tb541874qbmg9ig_">QUILVEST Banque Privée
                    <option>RBC Europe Limited
                    <option>RBC INVESTOR SERVICES BANK FRANCE S.A.
                    <option>RCI BANQUE
                    <option>ROTHSCHILD MARTIN MAUREL
                    <option>ROTHSCHILD MARTIN MAUREL MONACO
                    <option>ROYAL BANK OF CANADA
                    <option>SaarLB France
                    <option>SANTANDER CONSUMER BANQUE
                    <option>SFIL
                    <option>SOCIETE ANONYME DE CREDIT A L'INDUSTRIE FRANCAISE (CALIF)
                    <option>SOCIETE DE BANQUE ET D'EXPANSION
                    <option>SOCIETE GENERALE
                    <option>SOCIETE GENERALE CALEDONIENNE DE BANQUE
                    <option>SOCIETE GENERALE DE BANQUE AUX ANTILLES
                    <option>SOCIETE GENERALE PRIVATE BANKING (MONACO)
                    <option>SOCIETE MARSEILLAISE DE CREDIT
                    <option>SOCRAM BANQUE
                    <option>SOFAX BANQUE
                    <option>Standard Chartered Bank
                    <option>STATE STREET BANK INTERNATIONAL GMBH
                    <option>SUMITOMO MITSUI BANKING CORPORATION EUROPE LIMITED
                    <option>SVENSKA HANDELSBANKEN AB
                    <option>SWISSLIFE BANQUE PRIVEE
                    <option>THE BANK OF NEW YORK MELLON
                    <option>THE EXPORT-IMPORT BANK OF CHINA
                    <option>TOYOTA KREDITBANK GMBH
                    <option>TUNISIAN FOREIGN BANK
                    <option>UBS (France) SA
                    <option>UBS (Monaco) S.A.
                    <option>UNICREDIT SPA
                    <option>UNION BANCAIRE PRIVEE, UBP SA
                    <option>UNION DE BANQUES ARABES ET FRANCAISES-UBAF
                    <option>UNION FINANCIERE DE FRANCE BANQUE
                    <option>Unione di Banche Italiane S.p.A.
                    <option value="_matin6t35e9n20lbed5nms829dpq6asjec5q6irrec5m20gj1dpli0hrdc942o82jelhm6tbiedgmop90cpp62rk7c5kn6p8_">Western Union International Bank GmbH, Succursale française  
                    </select>
                    <br><br>
                    <label for="champ">Quel est votre fonction? :</label><br>
                    <select name ="fonction" id="job-select" style="width:220";>
                    <option value="defaut">&lt;   ---  Liste des métiers   ---&gt;
                    <option value="Banque de détail">Banque de détail
                    <option value="Banque de détail à l'international">Banque de détail à l'international
                    <option value="Banque de financement et d'investissement">Banque de financement et d'investissement
                    <option value="Blanchiment">Blanchiment
                    <option value="Collectivités publiques/locales">Collectivités publiques/locales
                    <option value="Communication">Communication
                    <option value="Communication externe">Communication externe
                    <option value="Communication interne">Communication interne
                    <option value="Communication financière">Communication financière
                    <option value="Contentieux">Contentieux
                    <option value="Conformité - Déontologie">Conformité - Déontologie
                    <option value="Direction financière">Direction financière
                    <option value="Direction générale">Direction générale
                    <option value="Documentation">Documentation
                    <option value="Engagements / Crédits">Engagements / Crédits
                    <option value="Etudes">Etudes
                    <option value="Finance et comptabilité">Finance et comptabilité
                    <option value="Formation">Formation
                    <option value="Fiscalité">Fiscalité
                    <option value="Gestion d'actifs">Gestion d'actifs
                    <option value="Gestion de patrimoine">Gestion de patrimoine
                    <option value="Inspection / Audit / Risques">Inspection / Audit / Risques
                    <option value="International">International
                    <option value="Juridique">Juridique
                    <option value="Marchés">Marchés
                    <option value="Marketing">Marketing
                    <option value="Organisation et Informatique">Organisation et Informatique
                    <option value="Presse">Presse
                    <option value="Relations de Place et Institutionnelles">Relations de Place et Institutionnelles
                    <option value="Réseau / Exploitation">Réseau / Exploitation
                    <option value="Ressources Humaines">Ressources Humaines
                    <option value="Secrétariat général / Administration">Secrétariat général / Administration
                    <option value="Sécurité">Sécurité
                    <option value="Stratégie et Développement">Stratégie et Développement
                    <option value="Systèmes et Moyens de paiements">Systèmes et Moyens de paiements</select>
                    <br>
                    <label for="champ">Prenom :</label><br>
                    <input type="text" name="prenom" id="prenom" required/>
                    <br><br>
                    <label for="champ">Nom :</label><br>
                    <input type="text" name="nom" id="nom" required/>
                    <hr><br>
                    <label for="champ">Choisisez votre login :</label><br>
                    <input type="text" name="utilisateur" id="utilisateur" required/>
                    <br>
                    <label for="champ">Mot de passe :</label><br>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" required/>
                    <input type="password" name="mot_de_passe_verif" id="mot_de_passe_verif" placeholder="Resaissisez le mot de passe" required/>
                    <br>
                    <br>
                    <label for="champ">Adresse :</label><br>
                    <input type="text" name="adresse" id="adresse" required/>
                    <br>
                    <br>
                    <label for="champ">email professionnel:</label><br>
                    <input type="text" name="email" id="email" required/>
                    <br><br>
                    <label for="champ">Tel de poste:</label><br>
                    <input type="text" name="telephone" id="telephone" required/>
                    <br>
                    <input class="envoyer" type= "submit" value=" Valider"/> 
                    </form>
                    <p><a href="index.php"> Je ne souhaite pas m'inscrire</a></p>

                    <input id="user_input_autocomplete_address" placeholder="Commencez a saisir...">
            </center>

            <!-- Click verification si les deux pass sont didentique si non message -->
        </div>
        <br>
            <p><a href="dashboard.php">Direct >> Page dashboard</a></p>

<body>
</html>
