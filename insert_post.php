<html>
<head>
<title>Blog: inserimento news</title>
</head>
<body>
<h1>Inserisci un articolo</h1>
<?

//includiamo il file di configurazione
@include "config.php";

//valorizziamo le variabili con i dati ricevuti dal form
if(isset($_POST['submit'])){
  if(isset($_POST['autore'])){
    $autore = addslashes($_POST['autore']);
  }
  if(isset($_POST['titolo'])){
    $titolo = addslashes($_POST['titolo']);
  }
  if(isset($_POST['articolo'])){
    $articolo = addslashes($_POST['articolo']);
  }

  // popoliamo i campi della tabella articoli con i dati ricevuti dal form
  $sql = "INSERT INTO articoli (art_autore, art_titolo, art_articolo, art_data) VALUES ('$autore', '$titolo', '$articolo', now())";

  // se l'inserimento ha avuto successo inviamo una notifica
  if (@mysqli_query($db, $sql) or die (mysqli_error($db))){
    echo "Articolo inserito con successo.";
  } 
}else{
  // se non sono stati inviati dati dal form mostriamo il modulo per l'inserimento
  ?>
<form action="insert_post.php" method="post">
Autore:<br>
<input name="autore" type="text" size="20"><br>
Titolo:<br>
<input name="titolo" type="text" size="30"><br>
Articolo:<br>
<textarea name="articolo" cols="40" rows="10"></textarea><br>
<input name="submit" type="submit" value="Invia">
</form>
  <?
}
?>
</body>
</html>