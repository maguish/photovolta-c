<?php
    /*puissance totale en Watt de tous les équipements*/
    $P_totale = 4300;
    echo "P_totale = ";
    echo "$P_totale Watt";
    echo "<br>";

    /*énergie totale consommée en Watt-heure*/
    /* E_cons = puissance * temps d'utilisation par jour (en heure) */
    $E_totale_cons = 17260;
    echo "E_totale_cons = ";
    echo "$E_totale_cons Watt-heure";
    echo "<br>";

    /*considérer les pertes d'énergie entre 25 et 30 % */
    /*énérgie produite en Watt-heure*/
    $E_produite = $E_totale_cons + 0.25*$E_totale_cons;
    echo "E_produite = ";
    echo "$E_produite Watt-heure";
    echo "<br>";

    /*pour choisir la tension de travail U (en Volt) en fontion de la puissance totale*/
    if ($P_totale > 0 && $P_totale <= 1000) {
      $U = 12;
      echo "La tension de travail est U = ";
      echo "$U V";
      echo "<br>";
    }
    elseif ($P_totale > 1000 && $P_totale <= 2000) {
      $U = 24;
      echo "La tension de travail est U = ";
      echo "$U V";
      echo "<br>";
    }
    else {
      $U = 48;
      echo "La tension de travail est U = ";
      echo "$U V";
      echo "<br>";
    }

    /*trouver la capacité (en Ampère-heure) des batteries*/
    /*l'autonomie A de la batterie dépend de la région, de l'ensoleillement, ... */
    $A = 1;
    /*la décharge D de la batterie est très souvent considérée à 80%*/
    $D = 0.8;
    $C = (int)(($E_produite * $A) / ($D * $U)); //pour obtenir la partie entière
    echo "La capacité des batteries est ";
    echo "$C Ampère-heure";
    echo "<br>";

    echo "Suppossons qu'on choisisse une batterie de 12 V et ayant une capacité de 250 Ampère-heure.";
    echo "<br>";
    $U_c = 12;
    $C_c = 250;

    /*pour trouver le nombre de séries de batteries*/
    $N_serie = (int)($C / $C_c);
    /*nombre de batteries dans chaque série*/
    $N_batt = (int)($U / $U_c);
    /*nombre de batteries au total*/
    $N = $N_batt * $N_serie;
    echo "On aura donc $N batteries de $U_c V, ayant une capacité de $C_c Ampère-heure chacune et qui seront montées en $N_serie séries de $N_batt batteries.";
    echo "<br>";

    /*déduction de la puissance crête de votre installation*/
    /*la puissance d'irradiation Ir (en Kilo-Watt-heure/m^2) de la région*/
    $Ir = 4.8;
    $E_produite_conv = $E_produite / 1000; //convertir en Kilo-Watt-heure
    $P_crete = (int)(($E_produite_conv * 1000) / $Ir);
    echo "La puissance crête de votre installation est $P_crete Watt-crête.";
    echo "<br>";

    echo "Supposons qu'on ait des panneaux monocristalin d'une puissance de 325 Watt-crête chacun.";
    echo "<br>";
    $P_c_u = 325;

    /*pour trouver le nombre de panneaux*/
    $N_panneaux = (int)($P_crete / $P_c_u);
    $X = $N_panneaux * $P_c_u * $Ir;
    if ($X < $E_produite) {
      $N_panneaux = $N_panneaux +1;
      echo "Alors le nombre de panneaux nécessaire est $N_panneaux panneaux.";
      echo "<br>";
    }
    else {
      echo "Alors le nombre de panneaux nécessaire est $N_panneaux panneaux.";
      echo "<br>";
    }
?>
