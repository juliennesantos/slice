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
</style>';

$html .= '
<table class="table table-striped table-bordered datatable">
<thead>
<tr>
<th>Last Name</th>
<th>First Name</th>
<th>Degree Program</th>
</tr>
</thead>
';

foreach($students as $s)
{
  $html .='
  <tr>
  <td>'.$s['lastName'].'</td>
  <td>'.$s['firstName'].'</td>
  <td>'.$s['programCode'].'</td>
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