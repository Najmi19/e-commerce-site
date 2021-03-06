<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Bienvenue sur le site officiel du Veste MNL vente en ligne">
        <title>Veste MNL</title>
        <link rel="stylesheet" href="../css/Style.css">

    </head>
    <body>
        <form id=paiement>
            <fieldset>
              <legend>Votre identité</legend>
          
              <ol>
                <li>
                  <label for=nom>Nom</label>
                  <input id=nom name=nom type=text placeholder="Prénom et nom" required autofocus>
                </li>
                <li>
                  <label for=email>Email</label>
                  <input id=email name=email type=email placeholder="exemple@domaine.com" required>
                </li>
                <li>
                  <label for=telephone>Téléphone</label>
                  <input id=telephone name=telephone type=tel placeholder="par ex&nbsp;: +3375500000000" required>
                </li>
              </ol>
            </fieldset>
          
            <fieldset>
              <legend>Adresse de livraison</legend>
                <ol>
                  <li>
                    <label for=adresse>Adresse</label>
                    <textarea id=adresse name=adresse rows=5 required></textarea>
                  </li>
                  <li>
                    <label for=codepostal>Code postal</label>
                    <input id=codepostal name=codepostal type=text required>
                  </li>
                    <li>
                    <label for=pays>Pays</label>
                    <input id=pays name=pays type=text required>
                  </li>
                </ol>
              </fieldset>
            <fieldset>
              <legend>Informations CB</legend>
              <ol>
                <li>
                  <fieldset>
                    <legend>Type de carte bancaire</legend>
                    <ol>
                      <li>
                        <input id=visa name=type_de_carte type=radio>
                        <label for=visa>VISA</label>
                      </li>
                      <li>
                        <input id=amex name=type_de_carte type=radio>
                        <label for=amex>AmEx</label>
                      </li>
                      <li>
                        <input id=mastercard name=type_de_carte type=radio>
                        <label for=mastercard>Mastercard</label>
                      </li>
                    </ol>
                  </fieldset>
                </li>
                <li>
                  <label for=numero_de_carte>NÂ° de carte</label>
                  <input id=numero_de_carte name=numero_de_carte type=number required>
                </li>
                <li>
                  <label for=securite>Code sécurité</label>
                  <input id=securite name=securite type=number required>
                </li>
                <li>
                  <label for=nom_porteur>Nom du porteur</label>
                  <input id=nom_porteur name=nom_porteur type=text placeholder="Même nom que sur la carte" required>
                </li>
              </ol>
            </fieldset>
          
            <fieldset>
              <button type=submit>J'achète !</button>
            </fieldset>
          </form>
          

    </body>
</html>