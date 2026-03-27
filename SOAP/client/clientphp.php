<link rel='stylesheet'. href="prova.css">
<html>
    <head>

    </head>
    <body>
        <h1>Convertitore Metri-Piedi Piedi-Metri</h1>
        

        <form method="POST" action="">
            <input type="number" name="lunghezza" min="1">
            <select name="scala">
                <option value="cmetri">Centimetri</option>
                <option value='pollici'>Pollici</option>
            </select>
        

        <button type="submit">Converti</button>
        </form>
    </body>


<?php
    $wsdl_url = "http://127.0.0.1/soap/server2/prova.wsdl";

    if (isset($_POST['lunghezza']) && !empty($_POST['lunghezza']) && isset($_POST['scala']) && !empty($_POST['scala'])) { //controllo che i campi da inserire non siano vuoti
    try{ //controllo errori in caso la connessione fallisca
        $lunghezza=$_POST['lunghezza'];
        $scala=$_POST['scala'];

        $client = new SoapClient($wsdl_url,["location" =>"http://127.0.0.1/soap/server2/server2.php"]); // creazione client soap e indicazione di dove sia il server

        $risposta = $client->conversione($lunghezza, $scala); //chiama il metodo soap conversione e il server restituirà il valore salvandolo in risposta 

        echo "<div class='jumbotron'><h1>La conversione  è ".$risposta."</h1><br></div>"; //output di risposta
         } catch (SoapFault $e){  

        echo '<br>Errore nel client SOAP ): ' . $e->getMessage();

    

        }
    }
?>
</html>
