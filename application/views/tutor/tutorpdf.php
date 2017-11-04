<?php
require_once VIEWPATH.'dompdf/lib/html5lib/Parser.php';
require_once VIEWPATH.'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();


use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);


$html = '
<style>
'.file_get_contents(site_url('bower_components/bootstrap/dist/css/bootstrap.min.css')).'
</style>
<h2>Tutor Roster for Term '.$term['term'].', SY '.$term['sy'].'<h2>
<br><br>';

$html .= '
<table class="table table-striped table-bordered datatable">
<thead>
<tr>
<th>ID No.</th>
<th>Last Name</th>
<th>First Name</th>
<th>Degree Program</th>
<th>Schedule</th>
<th>Subjects Taught</th>
<th>Status</th>
<th>Tutor Type</th>
</tr>
</thead>
';

foreach($tutors as $t)
{
  $html .='
  <tr>
  <td>'.$t['studentNo'].'</td>
  <td>'.$t['lastName'].'</td>
  <td>'.$t['firstName'].'</td>
  <td>'.$t['programCode'].'</td>
  <td>'.$t['dayofweek'].'s, '.
  date('g:ia', strtotime($t['timeStart']))
  .' to '.
  date('g:ia', strtotime($t['timeEnd'])) .'</td>
  <td class="text-center">';
  
    $c = count($subjects[$t['tutorID']]);
    
    for ($i = 0; $i < $c; $i++)
    {
      $html .= $subjects[$t['tutorID']][$i]["subjectCode"] . '<br>';
    }
  
  $html .='</td>
  <td>'.$t['status'].'</td>
  <td>'.$t['tutorType'].'</td>
  </tr>
  ';
}

$html .= '
</table>
';

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser

$dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

exit(0);