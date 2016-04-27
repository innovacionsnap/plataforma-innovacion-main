
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

ini_set('max_execution_time', 300); //300 seconds = 5 minutes

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

$count_webs = 1;

$fromDate = date('Y-m-01');
$toDate = date('Y-m-d');

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

define('CLIENT_ID_1', '163564878954-fatai1an10org1hn9cd7hht8813j5bvl.apps.googleusercontent.com');
define('SERVICE_EMAIL_1', '163564878954-fatai1an10org1hn9cd7hht8813j5bvl@developer.gserviceaccount.com');
define('KEY_FILE_1', 'b1c23b9ca9a4a6bcdc386084422787f65a657448-privatekey.p12');

define('CLIENT_ID_2', '765955597909-6h13ts1s5ic2var0364rq6k4uv7meinr.apps.googleusercontent.com');
define('SERVICE_EMAIL_2', '765955597909-6h13ts1s5ic2var0364rq6k4uv7meinr@developer.gserviceaccount.com');
define('KEY_FILE_2', 'f26e43a6adc8584f3607c7854dbda77d4be4c08b-privatekey.p12');
define('GA_PROFILE_ID_2', '70878007');

define('CLIENT_ID_3', '778172255242-580ntuhtgbvgfjubokl6bkheibb1icf7.apps.googleusercontent.com');
define('SERVICE_EMAIL_3', '778172255242-580ntuhtgbvgfjubokl6bkheibb1icf7@developer.gserviceaccount.com');
define('KEY_FILE_3', '0b53328316a3649a498a519f179e64848ff69a03-privatekey.p12');
define('GA_PROFILE_ID_3', '70878007');

$GOB_EC_GA_PROFILE_ID_1 = array(

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

$GOB_EC_GA_PROFILE_ID_2 = array(

array("Institucion"=>"IECE", "Web"=>"www.becas.gob.ec" , "Profile_Id"=>"70864284"),
array("Institucion"=>"IEE - Instituto Espacial Ecuatoriano", "Web"=>"www.institutoespacial.gob.ec" , "Profile_Id"=>"70868987"),
array("Institucion"=>"IEPI", "Web"=>"www.propiedadintelectual.gob.ec" , "Profile_Id"=>"70865569"),
array("Institucion"=>"INCOP", "Web"=>"www.contratacion.gob.ec" , "Profile_Id"=>"70870546"),
array("Institucion"=>"INDOT", "Web"=>"www.donacionorganos.salud.gob.ec" , "Profile_Id"=>"70871763"),
array("Institucion"=>"INEN", "Web"=>"www.normalizacion.gob.ec" , "Profile_Id"=>"70876703"),
array("Institucion"=>"Instituto Nacional de Estadísticas y Censos - INEC", "Web"=>"www.estadisticas.gob.ec" , "Profile_Id"=>"70868958"),
array("Institucion"=>"Instituto Nacional de Meritocracia", "Web"=>"www.meritocracia.gob.ec" , "Profile_Id"=>"70869564"),
array("Institucion"=>"Instituto para el Ecodesarrollo Regional Amazónico", "Web"=>"www.desarrolloamazonico.gob.ec" , "Profile_Id"=>"63084560"),
array("Institucion"=>"Jóvenes Productivos", "Web"=>"www.jovenesproductivos.gob.ec" , "Profile_Id"=>"70876017"),
array("Institucion"=>"La Verdad", "Web"=>"www.laverdad.gob.ec" , "Profile_Id"=>"65372019"),
array("Institucion"=>"Metricas Sitios Web", "Web"=>"www.presidencia.gob.ec" , "Profile_Id"=>"62828532"),
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

$GOB_EC_GA_PROFILE_ID_3 = array(

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

$client_1 = new Google_Client();
$client_1->setAssertionCredentials(
        new Google_Auth_AssertionCredentials(
        SERVICE_EMAIL_1,
        array('https://www.googleapis.com/auth/analytics'),
        file_get_contents(KEY_FILE_1)
    )
);

$client_1->setClientId(CLIENT_ID_1);
$client_1->setAccessType('offline_access');
$analytics_1 = new Google_Service_Analytics($client_1);

$client_2 = new Google_Client();
$client_2->setAssertionCredentials(
        new Google_Auth_AssertionCredentials(
        SERVICE_EMAIL_2,
        array('https://www.googleapis.com/auth/analytics'),
        file_get_contents(KEY_FILE_2)
    )
);

$client_2->setClientId(CLIENT_ID_2);
$client_2->setAccessType('offline_access');
$analytics_2 = new Google_Service_Analytics($client_2);

$client_3 = new Google_Client();
$client_3->setAssertionCredentials(
        new Google_Auth_AssertionCredentials(
        SERVICE_EMAIL_3,
        array('https://www.googleapis.com/auth/analytics'),
        file_get_contents(KEY_FILE_3)
    )
);

$client_3->setClientId(CLIENT_ID_3);
$client_3->setAccessType('offline_access');
$analytics_3 = new Google_Service_Analytics($client_3);

try {

?>
    
    <br><br>
    <div style="font-size: medium; font-weight: bold;" class="text-info"><center>Google Analytics - Portales Web Ecuador</center></div>
    <br><br>
    
    <p style="font-weight: bold;"> <?php echo "Desde el " . $fromDate . " al " . $toDate; ?></p>
    
    <br>
    
    <table id="snap_table" class="table table-striped table-bordered tablesorter">
      <thead>
        <tr>
          <th>No.</th>
          <th>Institucion</th>
          <th>Web</th>
          <!--<th>Profile_Id</th>-->
          <?php
              foreach ($gaMetrics_Array as $value) {
                  echo '<th>' . $value['titulo'] . '</th>';
              }
          ?>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($GOB_EC_GA_PROFILE_ID_1 as $row): array_map('htmlentities', $row); ?>
        <tr>
            <td><?php echo $count_webs; $count_webs++; ?></td>
            <!--<td><?php //echo implode('</td><td>', $row); ?></td>-->
            <td><?php echo $row['Institucion']; ?></td>
            <td><?php echo "<a href='http://" . $row['Web'] . "'>" . $row['Web'] . "</a>"; ?></td>
            <?php   
            $results = $analytics_1->data_ga->get('ga:'.$row['Profile_Id'], $fromDate, $toDate,implode(",", $gaMetrics));
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
    <?php foreach ($GOB_EC_GA_PROFILE_ID_2 as $row): array_map('htmlentities', $row); ?>
        <tr>
            <td><?php echo $count_webs; $count_webs++; ?></td>
            <!--<td><?php //echo implode('</td><td>', $row); ?></td>-->
            <td><?php echo $row['Institucion']; ?></td>
            <td><?php echo "<a href='http://" . $row['Web'] . "'>" . $row['Web'] . "</a>"; ?></td>
            <?php   
            $results = $analytics_2->data_ga->get('ga:'.$row['Profile_Id'], $fromDate, $toDate,implode(",", $gaMetrics));
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
    <?php foreach ($GOB_EC_GA_PROFILE_ID_3 as $row): array_map('htmlentities', $row); ?>
        <tr>
            <td><?php echo $count_webs; $count_webs++; ?></td>
            <!--<td><?php //echo implode('</td><td>', $row); ?></td>-->
            <td><?php echo $row['Institucion']; ?></td>
            <td><?php echo "<a href='http://" . $row['Web'] . "'>" . $row['Web'] . "</a>"; ?></td>
            <?php   
            $results = $analytics_3->data_ga->get('ga:'.$row['Profile_Id'], $fromDate, $toDate,implode(",", $gaMetrics));
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
 
<?php
    
} catch(Exception $e) {
    echo 'There was an error : - ' . $e->getMessage();
}

?>

</body>
</html>

<script type="text/javascript">
    
    $(document).ready(function() 
        { 
            $("#snap_table").tablesorter(); 
        } 
    );
    
</script>