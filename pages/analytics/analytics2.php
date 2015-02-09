
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

define('CLIENT_ID', '765955597909-6h13ts1s5ic2var0364rq6k4uv7meinr.apps.googleusercontent.com');
define('SERVICE_EMAIL', '765955597909-6h13ts1s5ic2var0364rq6k4uv7meinr@developer.gserviceaccount.com');
define('KEY_FILE', 'f26e43a6adc8584f3607c7854dbda77d4be4c08b-privatekey.p12');
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

array("Institucion"=>"IECE", "Web"=>"www.becas.gob.ec" , "Profile_Id"=>"70864284"),
array("Institucion"=>"IEE - Instituto Espacial Ecuatoriano", "Web"=>"www.institutoespacial.gob.ec" , "Profile_Id"=>"70868987"),
array("Institucion"=>"INCOP", "Web"=>"www.contratacion.gob.ec" , "Profile_Id"=>"70870546"),
array("Institucion"=>"INDOT", "Web"=>"www.donacionorganos.salud.gob.ec" , "Profile_Id"=>"70871763"),
array("Institucion"=>"INEN", "Web"=>"www.normalizacion.gob.ec" , "Profile_Id"=>"70876703"),
array("Institucion"=>"Instituto Nacional de Estadísticas y Censos - INEC", "Web"=>"www.estadisticas.gob.ec" , "Profile_Id"=>"70868958"),
array("Institucion"=>"Instituto Nacional de Meritocracia", "Web"=>"www.meritocracia.gob.ec" , "Profile_Id"=>"70869564"),
array("Institucion"=>"Instituto para el Ecodesarrollo Regional Amazónico", "Web"=>"www.desarrolloamazonico.gob.ec" , "Profile_Id"=>"63084560"),
array("Institucion"=>"Jóvenes Productivos", "Web"=>"www.jovenesproductivos.gob.ec" , "Profile_Id"=>"70876017"),
array("Institucion"=>"La Verdad", "Web"=>"www.laverdad.gob.ec" , "Profile_Id"=>"65372019"),
array("Institucion"=>"Ministerio Coordinador de Conocimiento y Talento Humano", "Web"=>"www.conocimiento.gob.ec" , "Profile_Id"=>"63081776"),
array("Institucion"=>"Ministerio Coordinador de Desarrollo Social", "Web"=>"www.desarrollosocial.gob.ec" , "Profile_Id"=>"63084176"),
array("Institucion"=>"Ministerio Coordinador de Patrimonio", "Web"=>"www.patrimonio.gob.ec" , "Profile_Id"=>"63136522"),
array("Institucion"=>"Ministerio Coordinador de Política Económica", "Web"=>"www.politicaeconomica.gob.ec" , "Profile_Id"=>"63125548"),
array("Institucion"=>"Ministerio Coordinador de Política y Gobiernos Autónomos Descentralizados", "Web"=>"www.politica.gob.ec" , "Profile_Id"=>"63124750"),
array("Institucion"=>"Ministerio Coordinador de Producción, Empleo y Competitividad", "Web"=>"www.produccion.gob.ec" , "Profile_Id"=>"63125549"),
array("Institucion"=>"Ministerio Coordinador de Sectores Estratégicos", "Web"=>"www.sectoresestrategicos.gob.ec" , "Profile_Id"=>"63125931"),
array("Institucion"=>"Ministerio Coordinador de Seguridad", "Web"=>"www.seguridad.gob.ec" , "Profile_Id"=>"63084281"),
array("Institucion"=>"Ministerio de Agricultura, Ganadería, Acuacultura y Pesca", "Web"=>"www.agricultura.gob.ec" , "Profile_Id"=>"63094185"),
array("Institucion"=>"Ministerio de Cultura", "Web"=>"www.cultura.gob.ec" , "Profile_Id"=>"63123505"),
array("Institucion"=>"Ministerio de Defensa Nacional", "Web"=>"www.defensa.gob.ec" , "Profile_Id"=>"63123503"),
array("Institucion"=>"Ministerio de Desarrollo Urbano y Vivienda", "Web"=>"www.habitatyvivienda.gob.ec" , "Profile_Id"=>"63148309"),
array("Institucion"=>"Ministerio de Educación", "Web"=>"www.educacion.gob.ec" , "Profile_Id"=>"63086884"),
array("Institucion"=>"Ministerio de Electricidad y Energía Renovable", "Web"=>"www.energia.gob.ec" , "Profile_Id"=>"63097887"),
array("Institucion"=>"Ministerio de Finanzas", "Web"=>"www.finanzas.gob.ec" , "Profile_Id"=>"63082084"),
array("Institucion"=>"Ministerio de Inclusión Económica y Social", "Web"=>"www.inclusion.gob.ec" , "Profile_Id"=>"63084290"),
array("Institucion"=>"Ministerio de Industrias y Productividad", "Web"=>"www.industrias.gob.ec" , "Profile_Id"=>"63090976"),
array("Institucion"=>"Ministerio de Justicia, Derechos Humanos y Cultos", "Web"=>"www.justicia.gob.ec" , "Profile_Id"=>"63095882"),
array("Institucion"=>"Ministerio de Recursos Naturales No Renovables", "Web"=>"www.recursosnaturales.gob.ec" , "Profile_Id"=>"63122103"),

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