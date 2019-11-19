<html>

<head>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">.
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel="stylesheet" href="css/mc-icons.min.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>

<body background="img/BGimg.png">
  <div class="content">
      <nav class="nav-extended blue-grey darken-4" id="navBar">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">Content-Vorschläge</a>
        </div>
        <div class="nav-content">
          <a href="newItemSite.html" class="btn-floating btn-large halfway-fab waves-effect waves-light teal pulse amber darken-1">
            <i class="material-icons">add</i>
          </a>
        </div>
      </nav>

    <!--Page Content-->
    <ul class="collection with-header" id="list">
      <li class="collection-header"><h4>Eingetragende Elemente:</h4></li>

      <?php

      //Mit Server verbinden und Datenbank auswaehlen
      $database = mysqli_connect("localhost", "root", "");
      mysqli_select_db($database, "login");

      $result = $database -> query("select * from items")
                    or die("Fehler beim durchsuchen der Datenbank: ".mysqli_error());

      $icons = array("", "<span class='mc-icon-32 mc-icon-iron_sword'></span>", "<span class='mc-icon-32 mc-icon-bow_standby'></span>", "<span class='mc-icon-32 mc-icon-item_frame'></span>", "<span class='mc-icon-32 mc-icon-empty_armor_slot_helmet'></span>", "<span class='mc-icon-32 mc-icon-bread'></span>", "<span class='mc-icon-32 mc-icon-iron_chestplate'></span>", "<span class='mc-icon-32 mc-icon-potion_bottle_splash'></span>", "<span class='mc-icon-32 mc-icon-emerald'></span>", "<span class='mc-icon-32 mc-icon-redstone_dust'></span>", "<span class='mc-icon-32 mc-icon-paper'></span>");




        while ($row = mysqli_fetch_assoc($result)) {
          $types = array("Nahkampf", "Fernkampf", "Sonstiger Kampf", "Stehlen", "Essen", "Rüstung", "Effekt", "Währung", "Nützliches", "Sonstiges");
          $itType = $types[$row["item_type"]];


          echo   "<li class='collection-item'><div>".$icons[$row["item_type"]]."<span>".$row["item_name"]."</span>"."<a class='secondary-content' href='#modal-".$row["id"]."'><i class='material-icons'>info</i></a></div></li>";
          echo    "
          <!--ItemInfo-Popup---->


          <div id='modal-".$row["id"]."' class='modalDialog'>
              <div>

                  <h2 class='modalHeader'>Beschreibung</h2> <a href='#close' title='Schließen' class='btn-floating btn-large waves-effect waves-light red right'><i class='material-icons' >close</i></a>
                  <div class='modalcontent'>
                    <p class='modalText'><b>Name: </b> ".$row["item_name"]."</p>
                    <p class='modalText'><b>Typ: </b> ".$itType."</p>
                    <p class='modalText'><b>Lore: </b> <br> <div class='longText'>".$row["item_lore"]."</div></p>
                    <p class='modalText'><b>How to get: </b> <br> <div class='longText'>".$row["how_to_get"]."</div></p>
                    <p class='modalText'><b>Beschreibung: </b> <br> <div class='longText'>".$row["item_desc"]."</div></p>
                  </div>
              </div>
          </div>


          <!--ItemInfo-Popup---->
          ";
        }
      ?>

    </ul>


    <!--Page Content-->
  </div>
</body>

</html>
