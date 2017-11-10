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
<h2>Attendance Listing for Term '.$term['term'].', SY '.$term['sy'].'<h2>
<br><br>';

$html .= '
<table class="table table-striped table-bordered datatable">
<thead>
<tr>
<th>Tutor Name</th>
<th>Time In</th>
<th>Time Out</th>
<th>Remarks</th>
</tr>
</thead>
';

foreach($attendanceList as $a)
{
  $html .='
  <tr>
<td>'.$a['firstName'].' '. $a['lastName'].'</td>
<td>'.$a['timeIn'].'</td>
<td>'.$a['timeOut'].'</td>
<td>'.$a['remarks'].'</td>
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