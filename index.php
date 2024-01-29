<?php 
/* 
*   1. Creare un form HTML che acquisisca il nome, il cognome e un messaggio da parte di un utente. 
*   2. All'invio del form, i dati devono essere caricati in un array multidimensionale, dove il nome e cognome verranno salvati in un array, mentre il messaggio in una stringa a parte.
*   3. Infine, creare il codice PHP adeguato per mostrare le seguenti informazioni in pagina.
*/

// Acquisire i dati dal form
 
$array = [
    "full_name" => [],
    "message" => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $message = $_GET['message'];

    array_push($array["full_name"], $firstname, $lastname);
    $array["message"] = $message;
    //var_dump($array);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js" defer></script>
</head>

<body>
    <div id="app" class="container flex flex-col items-center gap-2 mx-auto max-w-[800px] pt-5">
        <h1 class="text-3xl text-black font-semibold">Title</h1>

        <form class="flex flex-col gap-3 items-center">
        
        Nome: <input name="firstname" class="border-2 border-black rounded"/>
        Cognome: <input name="lastname" class="border-2 border-black rounded"/>
        Messaggio: <textarea name="message" class="border-2 border-black rounded"></textarea>

        <button type="submit" name="submit" class="bg-sky-500 p-1 px-4 mt-3 rounded">Invia</button>
        </form>

        <?php 
        if (isset($_GET['submit'])) {
            echo  "<h3>Nome utente: " . implode(" ", $array["full_name"]) . "</h3>";
            echo  "<p><b>Messaggio</b>: " . $array["message"] . "</p>";
            echo  "<p><b>HTTP infos</b>: <ul>";
            echo  "<li><b>Metodo HTTP</b>:" . $_SERVER['REQUEST_METHOD'] . "</li>";
            echo  "<li><b>Protocollo HTTP</b>:" . $_SERVER['SERVER_PROTOCOL'] . "</li>";
            echo  "<li><b>Pagina richiesta</b>:" . $_SERVER['PHP_SELF'] . "</li>";
            echo  "<li><b>URI richiesto</b>:" . $_SERVER['REQUEST_URI'] . "</li></ul>";
        }
        ?>
    </div>
</body>

</html>
