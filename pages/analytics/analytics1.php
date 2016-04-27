
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

?>

<!DOCTYPE html>
<html>
<head>
    <title>Google Analytics Connect</title>
</head>
<body>

<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs\vendors\google-api-php-client-master\src');

require_once 'Google/Client.php';
require_once 'Google/Service/Analytics.php';

define('CLIENT_ID', '163564878954-fatai1an10org1hn9cd7hht8813j5bvl.apps.googleusercontent.com');
define('SERVICE_EMAIL', '163564878954-fatai1an10org1hn9cd7hht8813j5bvl@developer.gserviceaccount.com');
define('KEY_FILE', 'b1c23b9ca9a4a6bcdc386084422787f65a657448-privatekey.p12');
define('GA_PROFILE_ID', '70878007');

/*$GOB_EC_GA_PROFILE_ID = array( 
                            array("Institucion"=>"Agencia Postal", "Web"=>"www.postal.gob.ec" , "Profile_Id"=>"70878007"),
                            array("Institucion"=>"Agrocalidad", "Web"=>"www.agrocalidad.gob.ec" , "Profile_Id"=>"70853288"),
                            array("Institucion"=>"CES", "Web"=>"www.calidadeducacionsuperior.gob.ec" , "Profile_Id"=>"70864874"),
                            array("Institucion"=>"CES", "Web"=>"www.consejoeducacionsuperior.gob.ec" , "Profile_Id"=>"70864784"),
                            array("Institucion"=>"Ciudadad Eloy Alfaro", "Web"=>"www.ciudadalfaro.gob.ec" , "Profile_Id"=>"70882505"),
                            array("Institucion"=>"Ciudada del Conocimiento", "Web"=>"www.ciudaddelconocimiento.gob.ec" , "Profile_Id"=>"70874535"),
                            array("Institucion"=>"Coca Codo Sinclair", "Web"=>"www.cocacodosinclair.gob.ec" , "Profile_Id"=>"70866669")
                        ); 
 */

$GOB_EC_GA_PROFILE_ID = array(

array("Institucion"=>"Agencia Postal", "Web"=>"www.postal.gob.ec" , "Profile_Id"=>"70878007"),
array("Institucion"=>"Agrocalidad", "Web"=>"www.agrocalidad.gob.ec" , "Profile_Id"=>"70853288"),
array("Institucion"=>"CEAACES - Consejo de Evaluación, Acreditación y Aseguramiento de la Calidad de la Educación Superior", "Web"=>"www.calidadeducacionsuperior.gob.ec" , "Profile_Id"=>"70864874"),
array("Institucion"=>"CES-Consejo de Educacion Superior", "Web"=>"www.consejoeducacionsuperior.gob.ec" , "Profile_Id"=>"70864784"),
array("Institucion"=>"Ciudad Alfaro", "Web"=>"www.ciudadalfaro.gob.ec" , "Profile_Id"=>"70882505"),
array("Institucion"=>"Ciudad del Conocimiento", "Web"=>"www.ciudaddelconocimiento.gob.ec" , "Profile_Id"=>"70874535"),
array("Institucion"=>"COCA CODO SINCLAIR", "Web"=>"www.cocacodosinclair.gob.ec" , "Profile_Id"=>"70866669"),
array("Institucion"=>"Comision Transito Ecuador", "Web"=>"www.comisiontransito.gob.ec" , "Profile_Id"=>"70877205"),
array("Institucion"=>"CONATEL", "Web"=>"www.conatel.gob.ec" , "Profile_Id"=>"70874721"),
array("Institucion"=>"Consejo de Gobierno del Régimen Especial de Galápagos", "Web"=>"www.regimenesgalapagos.gob.ec" , "Profile_Id"=>"70871375"),
array("Institucion"=>"Correos del Ecuador", "Web"=>"www.correos.gob.ec" , "Profile_Id"=>"70874218"),
array("Institucion"=>"Crece Ecuador", "Web"=>"www.creceecuador.gob.ec" , "Profile_Id"=>"70870255"),
array("Institucion"=>"DGAC - Dirección Gral. Aviación Civil", "Web"=>"www.aviacioncivil.gob.ec" , "Profile_Id"=>"70874221"),
array("Institucion"=>"DINARDAP", "Web"=>"www.datospublicos.gob.ec" , "Profile_Id"=>"70874242"),
array("Institucion"=>"Direccion de Archivo de la Administración Pública", "Web"=>"www.direccionarchivo.gob.ec" , "Profile_Id"=>"70870675"),
array("Institucion"=>"Economia en Bicicleta", "Web"=>"www.economiaenbicicleta.gob.ec" , "Profile_Id"=>"70880409"),
array("Institucion"=>"ECU 911", "Web"=>"www.ecu911.gob.ec" , "Profile_Id"=>"70883300"),
array("Institucion"=>"Enlace Ciudadano", "Web"=>"www.enlaceciudadano.gob.ec" , "Profile_Id"=>"64963742"),
array("Institucion"=>"Gobernacion de Manabi", "Web"=>"manabi.ministeriointerior.gob.ec" , "Profile_Id"=>"70874202"),
array("Institucion"=>"Gobernacion de Tungurahua", "Web"=>"tungurahua.ministeriointerior.gob.ec" , "Profile_Id"=>"70867370"),
array("Institucion"=>"Gobernacion de Bolivar", "Web"=>"bolivar.ministeriointerior.gob.ec" , "Profile_Id"=>"70831060"),
array("Institucion"=>"Gobernacion de Cañar", "Web"=>"canar.ministeriointerior.gob.ec" , "Profile_Id"=>"70850800"),
array("Institucion"=>"Gobernacion de Chimborazo ", "Web"=>"chimborazo.ministeriointerior.gob.ec" , "Profile_Id"=>"70829384"),
array("Institucion"=>"Gobernacion de Cotopaxi", "Web"=>"cotopaxi.ministeriointerior.gob.ec" , "Profile_Id"=>"70849704"),
array("Institucion"=>"Gobernacion de el Oro", "Web"=>"eloro.ministeriointerior.gob.ec" , "Profile_Id"=>"70831586"),
array("Institucion"=>"Gobernacion de Esmeraldas", "Web"=>"esmeraldas.ministeriointerior.gob.ec" , "Profile_Id"=>"70847212"),
array("Institucion"=>"Gobernacion de Galapagos", "Web"=>"galapagos.ministeriointerior.gob.ec" , "Profile_Id"=>"70830984"),
array("Institucion"=>"Gobernacion de Imbabura ", "Web"=>"imbabura.ministeriointerior.gob.ec" , "Profile_Id"=>"70829984"),
array("Institucion"=>"Gobernacion de Loja", "Web"=>"loja.ministeriointerior.gob.ec" , "Profile_Id"=>"70831170"),
array("Institucion"=>"Gobernacion de Los Rios", "Web"=>"losrios.ministeriointerior.gob.ec" , "Profile_Id"=>"70835579"),
array("Institucion"=>"Gobernacion de Manabi", "Web"=>"manabi.ministeriointerior.gob.ec" , "Profile_Id"=>"70831172"),
array("Institucion"=>"Gobernacion de Morona Santiago", "Web"=>"morona.ministeriointerior.gob.ec" , "Profile_Id"=>"70858375"),
array("Institucion"=>"Gobernacion de Napo", "Web"=>"napo.ministeriointerior.gob.ec" , "Profile_Id"=>"70847297"),
array("Institucion"=>"Gobernacion de Orellana", "Web"=>"orellana.ministeriointerior.gob.ec" , "Profile_Id"=>"70847298"),
array("Institucion"=>"Gobernacion de Pastaza", "Web"=>"pastaza.ministeriointerior.gob.ec" , "Profile_Id"=>"70873811"),
array("Institucion"=>"Gobernación de Santa Elena", "Web"=>"santaelena.ministeriointerior.gob.ec" , "Profile_Id"=>"70873813"),
array("Institucion"=>"Gobernacion de Santo Domingo de los Tsachilas", "Web"=>"santodomingo.ministeriointerior.gob.ec" , "Profile_Id"=>"70874008"),
array("Institucion"=>"Gobernacion de Sucumbios", "Web"=>"sucumbios.ministeriointerior.gob.ec" , "Profile_Id"=>"70868440"),
array("Institucion"=>"Gobernacion de Zamora Chinchipe", "Web"=>"zamora.ministeriointerior.gob.ec" , "Profile_Id"=>"70871333"),
array("Institucion"=>"Gobernacion del Guayas", "Web"=>"guayas.ministeriointerior.gob.ec" , "Profile_Id"=>"70839340"),
array("Institucion"=>"Gobierno de Azuay", "Web"=>"azuay.ministeriointerior.gob.ec" , "Profile_Id"=>"70843425"),
array("Institucion"=>"Gobierno de Carchi", "Web"=>"carchi.ministeriointerior.gob.ec" , "Profile_Id"=>"70832288"),

);

$gaMetrics = array(
    'ga:sessions',
    'ga:users',
    'ga:pageviews',
    'ga:pageviewsPerSession',
    'ga:avgSessionDuration',
    'ga:bounceRate',
    'ga:percentNewSessions'
);

$gaMetrics_Array = array(
             array("metrica"=>"ga:sessions", "titulo"=>"Sesiones"),
             array("metrica"=>"ga:users", "titulo"=>"Usuarios"),
             array("metrica"=>"ga:pageviews", "titulo"=>"Numero de paginas vistas"),
             array("metrica"=>"ga:pageviewsPerSession", "titulo"=>"Pagina / Sesion"),
             array("metrica"=>"ga:avgSessionDuration", "titulo"=>"Duracion media de la sesion"),
             array("metrica"=>"ga:bounceRate", "titulo"=>"Porcentaje de rebote"),
             array("metrica"=>"ga:percentNewSessions", "titulo"=>"% Nuevas Sesiones")
);

$client = new Google_Client();
$client->setAssertionCredentials(
        new Google_Auth_AssertionCredentials(
        SERVICE_EMAIL,
        array('https://www.googleapis.com/auth/analytics'),
        file_get_contents(KEY_FILE)
    )
);

$client->setClientId(CLIENT_ID);
$client->setAccessType('offline_access');
$analytics = new Google_Service_Analytics($client);

$fromDate = date('Y-m-01');
$toDate = date('Y-m-d');

try {
    
    /*$results = $analytics->data_ga->get('ga:'.GA_PROFILE_ID, $fromDate, $toDate,implode(",", $gaMetrics));

    echo '<b>ga:sessions:</b> '.number_format($results['totalsForAllResults']['ga:sessions']).'<br />';
    echo '<b>ga:users:</b> '.number_format($results['totalsForAllResults']['ga:users']).'<br />';
    echo '<b>ga:pageviews:</b> '.number_format($results['totalsForAllResults']['ga:pageviews']).'<br />';
    echo '<b>ga:pageviewsPerSession:</b> '. round($results['totalsForAllResults']['ga:pageviewsPerSession'], 2).'<br />';
    $timestamp = $results['totalsForAllResults']['ga:avgSessionDuration'];
    echo '<b>ga:avgSessionDuration:</b> '. gmdate("H:i:s", $timestamp) .'<br />';
    echo '<b>ga:bounceRate:</b> '.round($results['totalsForAllResults']['ga:bounceRate'], 2).'%<br />';
    echo '<b>ga:percentNewSessions:</b> '.round($results['totalsForAllResults']['ga:percentNewSessions'], 2).'%<br />';
    */

?>
    
    <br><br>
    <div style="font-size: medium; font-weight: bold;" class="text-info"><center>Google Analytics - Portales Web Ecuador</center></div>
    <br><br>
    
    <?php if (count($GOB_EC_GA_PROFILE_ID) > 0): ?>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th><?php echo implode('</th><th>', array_keys(current($GOB_EC_GA_PROFILE_ID))); ?></th>
          <?php
              foreach ($gaMetrics_Array as $value) {
                  echo '<th>' . $value['titulo'] . '</th>';
              }
          ?>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($GOB_EC_GA_PROFILE_ID as $row): array_map('htmlentities', $row); ?>
        <tr>
            <td><?php echo implode('</td><td>', $row); ?></td>
            <?php   
            $results = $analytics->data_ga->get('ga:'.$row['Profile_Id'], $fromDate, $toDate,implode(",", $gaMetrics));
            echo '<td>'.number_format($results['totalsForAllResults']['ga:sessions']) . '</td>';
            echo '<td>'.number_format($results['totalsForAllResults']['ga:users']) . '</td>';
            echo '<td>'.number_format($results['totalsForAllResults']['ga:pageviews']) . '</td>';
            echo '<td>'.round($results['totalsForAllResults']['ga:pageviewsPerSession'], 2) . '</td>';
            $timestamp = $results['totalsForAllResults']['ga:avgSessionDuration'];
            echo '<td>'.gmdate("H:i:s", $timestamp) . '</td>';
            echo '<td>'.round($results['totalsForAllResults']['ga:bounceRate'], 2).'%' . '</td>';
            echo '<td>'.round($results['totalsForAllResults']['ga:percentNewSessions'], 2).'%' . '</td>';
            ?>
        </tr>
    <?php endforeach; ?>
      <tbody>
    </table>
    <?php endif; ?>
 
<?php
    
} catch(Exception $e) {
    echo 'There was an error : - ' . $e->getMessage();
}

?>

</body>
</html>