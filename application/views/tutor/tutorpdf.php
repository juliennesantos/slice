<?php
require_once site_url('resources/dompdf/lib/html5lib/Parser.php');
require_once site_url('resources/dompdf/src/Autoloader.php');
Dompdf\Autoloader::register();


use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);


$html = '
<style>
'.file_get_contents('c:\xampp\htdocs\psc\resources/bower_components/bootstrap/dist/css/bootstrap.min.css').'
</style>
<h2>Purchase Order # '.$p['poNo'].'</h2>
<br><br>';

$html .= '
<table class="table table-striped datatable">
  <thead>
      <tr>
        <th>TutorID</th>
        <th>UserID</th>
        <th>StatusID</th>
        <th>TutorType</th>
        <th>DateAdded</th>
        <th>DateModified</th>
        <th>Actions</th>
      </tr>
  </thead>
      <?php foreach($tutors as $t){ ?>
      <tr>
        <td>'.$t['tutorID'].'</td>
        <td>'.$t['userID'].'</td>
        <td>'.$t['statusID'].'</td>
        <td>'.$t['tutorType'].'</td>
        <td>'.$t['dateAdded'].'</td>
        <td>'.$t['dateModified'].'</td>
        <td>
            <a href="'.site_url('tutor/edit/'.$t['tutorID']).'" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
            <a href="'.site_url('tutor/remove/'.$t['tutorID']).'" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
        </td>
    </tr>
    <?php } ?>
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