
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

define('CLIENT_ID', '778172255242-580ntuhtgbvgfjubokl6bkheibb1icf7.apps.googleusercontent.com');
define('SERVICE_EMAIL', '778172255242-580ntuhtgbvgfjubokl6bkheibb1icf7@developer.gserviceaccount.com');
define('KEY_FILE', '0b53328316a3649a498a519f179e64848ff69a03-privatekey.p12');
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

array("Institucion"=>"Ministerio de Relaciones Exteriores, Comercio e Integración", "Web"=>"www.cancilleria.gob.ec" , "Profile_Id"=>"63123757"),
array("Institucion"=>"Ministerio de Relaciones Laborales", "Web"=>"www.relacioneslaborales.gob.ec" , "Profile_Id"=>"63122307"),
array("Institucion"=>"Ministerio de Salud Pública", "Web"=>"www.salud.gob.ec" , "Profile_Id"=>"63122348"),
array("Institucion"=>"Ministerio de Telecomunicaciones y Sociedad de la Información", "Web"=>"www.telecomunicaciones.gob.ec" , "Profile_Id"=>"63128746"),
array("Institucion"=>"Ministerio de Transporte y Obras Públicas", "Web"=>"www.obraspublicas.gob.ec" , "Profile_Id"=>"63122305"),
array("Institucion"=>"Ministerio de Turismo", "Web"=>"www.turismo.gob.ec" , "Profile_Id"=>"63084291"),
array("Institucion"=>"Ministerio del Ambiente", "Web"=>"www.ambiente.gob.ec" , "Profile_Id"=>"63123205"),
array("Institucion"=>"Ministerio del Deporte", "Web"=>"www.deporte.gob.ec" , "Profile_Id"=>"63089973"),
array("Institucion"=>"Ministerio del Interior", "Web"=>"www.ministeriointerior.gob.ec" , "Profile_Id"=>"63087990"),
array("Institucion"=>"Parque Nacional Galapagos", "Web"=>"www.galapagos.gob.ec" , "Profile_Id"=>"70878017"),
array("Institucion"=>"Petroamazonas", "Web"=>"www.petroamazonas.gob.ec" , "Profile_Id"=>"70876709"),
array("Institucion"=>"Plan Nacional de Ciencia y Tecnología", "Web"=>"www.somosciencia.gob.ec" , "Profile_Id"=>"70868086"),
array("Institucion"=>"Policia Nacional del Ecuador", "Web"=>"www.policiaecuador.gob.ec" , "Profile_Id"=>"70872525"),
array("Institucion"=>"Presidencia de la República del Ecuador", "Web"=>"www.presidencia.gob.ec" , "Profile_Id"=>"63592312"),
array("Institucion"=>"Prometeo", "Web"=>"www.prometeo.educacionsuperior.gob.ec" , "Profile_Id"=>"70876724"),
array("Institucion"=>"Registro Civil", "Web"=>"www.registrocivil.gob.ec" , "Profile_Id"=>"70869562"),
array("Institucion"=>"Secretaría Nacional de Comunicación", "Web"=>"www.comunicacion.gob.ec" , "Profile_Id"=>"63080390"),
array("Institucion"=>"Secretaría Nacional de Educación Superior, Ciencia, Tecnología e Innovación", "Web"=>"www.educacionsuperior.gob.ec" , "Profile_Id"=>"63124301"),
array("Institucion"=>"Secretaría Nacional de Gestión de Riesgos", "Web"=>"www.gestionderiesgos.gob.ec" , "Profile_Id"=>"63132134"),
array("Institucion"=>"Secretaría Nacional de la Administración Publica", "Web"=>"www.administracionpublica.gob.ec" , "Profile_Id"=>"63130831"),
array("Institucion"=>"Secretaría Nacional de Planificación y Desarrollo", "Web"=>"www.planificacion.gob.ec" , "Profile_Id"=>"63125930"),
array("Institucion"=>"Secretaría Nacional de Pueblos, Movimientos Sociales y Participación Ciudadana", "Web"=>"www.pueblos.gob.ec" , "Profile_Id"=>"63085187"),
array("Institucion"=>"Secretaría Nacional de Transparencia de Gestión", "Web"=>"www.transparencia.gob.ec" , "Profile_Id"=>"63123550"),
array("Institucion"=>"Secretaría Nacional del Agua", "Web"=>"www.agua.gob.ec" , "Profile_Id"=>"63085297"),
array("Institucion"=>"Secretaría Nacional del Migrante", "Web"=>"www.migrante.gob.ec" , "Profile_Id"=>"63129746"),
array("Institucion"=>"Secretaría Técnica de Capacitación y Formación Profesional", "Web"=>"www.formacionprofesional.gob.ec" , "Profile_Id"=>"70867383"),
array("Institucion"=>"Secretaría Técnica de Cooperación Internacional", "Web"=>"www.cooperacioninternacional.gob.ec" , "Profile_Id"=>"70870648"),
array("Institucion"=>"Secretaria Tecnica del Mar", "Web"=>"www.secretariamar.gob.ec" , "Profile_Id"=>"70874248"),
array("Institucion"=>"Senescyt - Programa de Becas", "Web"=>"www.becas.educacionsuperior.gob.ec" , "Profile_Id"=>"70879501"),
array("Institucion"=>"Servicio Civil Ciudadano", "Web"=>"www.serviciociudadano.gob.ec" , "Profile_Id"=>"70876038"),
array("Institucion"=>"Sistema de Economía Popular - EPS", "Web"=>"www.economiapopular.gob.ec" , "Profile_Id"=>"70879520"),
array("Institucion"=>"Sistema Nacional de Nivelacion", "Web"=>"www.nivelacionnacional.educacionsuperior.gob.ec" , "Profile_Id"=>"70876040"),
array("Institucion"=>"Tramites Ciudadanos", "Web"=>"www.tramitesciudadanos.gob.ec" , "Profile_Id"=>"70876722"),
array("Institucion"=>"Vicepresidencia de la República del Ecuador", "Web"=>"www.vicepresidencia.gob.ec" , "Profile_Id"=>"63453171"),
array("Institucion"=>"WOW ECUADOR", "Web"=>"www.wowadmirableecuador.com" , "Profile_Id"=>"67126422"),
array("Institucion"=>"Yasuni", "Web"=>"www.yasuni.gob.ec" , "Profile_Id"=>"70873047"),
array("Institucion"=>"Yo Gobierno", "Web"=>"www.yogobierno.gob.ec" , "Profile_Id"=>"64822866"),

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