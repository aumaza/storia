<?php 
include "../../vendor/autoload.php";

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try{

$file = $_GET['file'];

if($file){
ob_start();
require_once $file;
$html = ob_get_clean();
$file_name = explode('.',$file);

$page = new Html2Pdf('P','A4','es');
$page->writeHTML($html);
$page->output(''.$file_name[0].'.pdf');
}
}catch(Html2PdfException $e){
    $Html2Pdf->clean;
    $formatter = new Exceptionformatter($e);
    echo $formatter->getHtmlMessage();
    error_reporting(E_ALL);
}

?>
