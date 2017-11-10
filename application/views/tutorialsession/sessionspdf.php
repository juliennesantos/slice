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
<h2>Tutorial Sessions Log for Term '.$term['term'].', SY '.$term['sy'].'<h2>
<br><br>';

$html .= '
<table class="table table-striped table-bordered datatable">
<thead>
<tr>
<th>#</th>
<th>Student\'s Name</th>
<th>Tutor</th>
<th>Subject</th>
<th>Scheduled Date</th>
<th>Time Started</th>
<th>Time Ended</th>
</tr>
</thead>
';

foreach($tutees as $t)
{
  $html .='
  <tr>
  <!-- tutorialNo -->
  <td>
  '.$t['tutorialNo'].'
  </td>
  <!-- tutee name -->
  <td>
  
  '.$t['uteeLN'].', '. $t['uteeFN'].'
  </td>
  <!-- tutor -->
  <td>';
  
  if(empty($t['uaLN']))
  $html .= 'No tutor assigned.';
  else 
  $html .= $t['uaLN'].', '. $t['uaFN'];
  
  $html .= '
  </td>
  <!-- subject -->
  <td>
  '.$t['subjectCode'].'
  </td>
  <!-- date of tutorial -->
  <td>
  '.date('D, M j Y', strtotime($t['dateTimeRequested'])).', '.date('g:ia', strtotime($t['tbrTS'])).' to '.date('g:ia', strtotime($t['tbrTE'])).'
  </td>
  <!-- time started -->
  <td>
  '.date('g:ia', strtotime($t['dateTimeStart'])).'
  </td>
  <!-- time ended -->
  <td>
  '.date('g:ia', strtotime($t['dateTimeEnd'])).'
  </td>
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