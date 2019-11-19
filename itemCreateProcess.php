<?php



  if(strlen($_POST['item_name'])>= 4 && strlen($_POST['item_name'])<= 20 && $_POST['item_type'] != NULL){
          //Mit Server verbinden und Datenbank auswaehlen
          $database = mysqli_connect("localhost:3306", "itemDB-Website", "g3!8lkN5");
          mysqli_select_db($database, "itemDB");

          //Lade Werte des form-elemtes in die Variablen
          $itemname = $_POST['item_name'];
          $itemtype = $_POST['item_type'];
          $itemlore = $_POST['item_lore'];
          $howtoget = $_POST['how_to_get'];
          $itemdesc = $_POST['item_desc'];

          //Anti Mysql injection
          $itemname = stripcslashes($itemname);
          $itemtype = stripcslashes($itemtype);
          $itemlore = stripcslashes($itemlore);
          $howtoget = stripcslashes($howtoget);
          $itemdesc = stripcslashes($itemdesc);
          $itemname = mysqli_real_escape_string($database, $itemname);
          $itemtype = mysqli_real_escape_string($database, $itemtype);
          $itemlore = mysqli_real_escape_string($database, $itemlore);
          $howtoget = mysqli_real_escape_string($database, $howtoget);
          $itemdesc = mysqli_real_escape_string($database, $itemdesc);


                //Setze Item in die datenbank
                $database -> query("INSERT INTO items (item_name, item_type, item_lore, how_to_get, item_desc) VALUES ('$itemname', '$itemtype', '$itemlore', '$howtoget', '$itemdesc')") or die ("Fehler beim erstellen des Items: ".mysqli_error($database));

          header("location: index.php");
} else{
  die ("Bitte fülle mindestens Name und Typ sowie nur ernsthaft gemeinte Items ein! (Der name darf max. 20 Zeichen lang sein)");
}
 ?>
