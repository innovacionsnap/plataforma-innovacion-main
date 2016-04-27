
<?php
/*
 * https://developers.google.com/analytics/devguides/reporting/core/v3/reference
 * https://developers.google.com/analytics/devguides/reporting/core/dimsmets
 * https://github.com/google/google-api-php-client
 * https://console.developers.google.com
 * http://devstan.com/2014/01/30/google_analytics_php/
 * https://developers.google.com/analytics/solutions/articles/hello-analytics-api
 * http://www.google.com/analytics/
 * 
 * http://localhost/monitoreo/index.php?r=site/page&view=analytics
 * 
*/

if(Yii::app()->user->isGuest){
    Yii::app()->user->loginRequired();
}

ini_set('max_execution_time', 1200); // 1200 seconds = 20 minutes

?>

<!DOCTYPE html>
<html>
<head>
    <title>Reporte Monitoreo</title>
    
<style type="text/css">

.container {
    margin-right: 0px;
    margin-left: 0px;
}
    
</style>
    
</head>
<body>
    
       
    <br><br>
    <div style="font-size: medium; font-weight: bold;" class="text-info"><center>Reporte Monitoreo</center></div>
    <br>
    
    <?php
    
    $con = mysql_connect("db534950996.db.1and1.com", "dbo534950996", "20M0n1tor3oSnap14") or die(mysql_error()); 
    
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
   
    mysql_select_db("db534950996") or die(mysql_error());
    
    $data = mysql_query("SELECT * FROM monitoreo") 
    or die(mysql_error()); 
    
    $info = mysql_fetch_array($data);
    
    $contador = 1;
    
    echo "<table border cellpadding=3>"; 
    
    echo "<thead>"; 
    echo "<tr>";

    echo "<th>No.</th>";
    echo "<th>Nombre Institucion</th>";
    echo "<th>Fecha</th>";
    echo "<th>¿El diseño de la plantilla es correcto?</th>";
    echo "<th>¿El logo Ecuador Ama La Vida tiene el tamaño correcto?</th>";
    echo "<th>¿El logo Ecuador Ama La Vida tiene la posición correcta?</th>";
    echo "<th>¿El logo institucional se encuentra en la esquina superior derecha?</th>";
    echo "<th>¿Las categorías cuentan con el nombre exacto y orden establecidos?</th>";
    echo "<th>¿El número de campos y tamaño son correctos?</th>";
    echo "<th>¿Los links son funcionales?</th>";
    echo "<th>Observaciones:</th>";
    echo "<th>¿El número de imágenes es correcto?</th>";
    echo "<th>¿Las imágenes cuentan con enlaces a otras páginas?</th>";
    echo "<th>¿Los enlaces a la redes sociales son funcionales?</th>";
    echo "<th>¿Funciona el Módulo Tu Gobierno?</th>";
    echo "<th>¿Cuenta con banner Presidencia?</th>";
    echo "<th>¿Cuenta con el módulo programas y servicios?</th>";
    echo "<th>¿Cuenta con banners publicitarios?</th>";
    echo "<th>¿Cuenta con el submódulo noticias destacadas?</th>";
    echo "<th>¿La estructura es correcta?</th>";
    echo "<th>¿Los logotipos son correctos?</th>";
    echo "<th>¿El código postal es correcto?</th>";
    echo "<th>¿Funciona el link Mapa de Sitio?</th>";
    echo "<th>¿Funciona el link Contacto?</th>";
    echo "<th>¿El link es funcional?</th>";
    echo "<th>¿La información está organizada por años?</th>";
    echo "<th>¿Funciona el vínculo?</th>";
    echo "<th>¿Está vinculado al Sistema Nacional de Información?</th>";
    echo "<th>¿Funciona el vínculo?</th>";
    echo "<th>¿Los documentos son descargables?</th>";
    echo "<th>¿Funciona el vínculo?</th>";
    echo "<th>OBSERVACIONES GENERALES</th>";
    
    echo "</tr>";
    echo "</thead>"; 
    echo "<tbody>";
    
    while($info = mysql_fetch_array($data)) 
    {
    echo "<tr>";
    
    echo "<td>". $contador . "</td>";
    echo "<td style='width: 15%;'>". utf8_encode($info[1]) . "</td>";
    echo "<td>". utf8_encode($info[31]) . "</td>";
    echo "<td>". utf8_encode($info[2]) . "</td>";
    echo "<td>". utf8_encode($info[3]) . "</td>";
    echo "<td>". utf8_encode($info[4]) . "</td>";
    echo "<td>". utf8_encode($info[5]) . "</td>";
    echo "<td>". utf8_encode($info[6]) . "</td>";
    echo "<td>". utf8_encode($info[7]) . "</td>";
    echo "<td>". utf8_encode($info[8]) . "</td>";
    echo "<td style='width: 15%;'>". utf8_encode($info[9]) . "</td>";
    echo "<td>". utf8_encode($info[10]) . "</td>";
    echo "<td>". utf8_encode($info[11]) . "</td>";
    echo "<td>". utf8_encode($info[12]) . "</td>";
    echo "<td>". utf8_encode($info[13]) . "</td>";
    echo "<td>". utf8_encode($info[14]) . "</td>";
    echo "<td>". utf8_encode($info[15]) . "</td>";
    echo "<td>". utf8_encode($info[16]) . "</td>";
    echo "<td>". utf8_encode($info[17]) . "</td>";
    echo "<td>". utf8_encode($info[18]) . "</td>";
    echo "<td>". utf8_encode($info[19]) . "</td>";
    echo "<td>". utf8_encode($info[20]) . "</td>";
    echo "<td>". utf8_encode($info[21]) . "</td>";
    echo "<td>". utf8_encode($info[22]) . "</td>";
    echo "<td>". utf8_encode($info[23]) . "</td>";
    echo "<td>". utf8_encode($info[24]) . "</td>";
    echo "<td>". utf8_encode($info[25]) . "</td>";
    echo "<td>". utf8_encode($info[26]) . "</td>";
    echo "<td>". utf8_encode($info[27]) . "</td>";
    echo "<td>". utf8_encode($info[28]) . "</td>";
    echo "<td>". utf8_encode($info[29]) . "</td>";
    echo "<td>". utf8_encode($info[30]) . "</td>";
    
    echo "</tr>";
    
    $contador++;
    
    }
    echo "</tbody>";
    echo "</table>"; 
    
    ?>

</body>
</html>

<script type="text/javascript">
    

    
</script>