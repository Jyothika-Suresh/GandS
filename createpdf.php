<html>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%; 
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
</style>
</html>
<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'dbcon.php';

$pay=mysqli_query($con,"SELECT a.");
while($p=mysqli_fetch_assoc($pay))
{
    $email = $ah;
    $amount = $p['amount'];
    $date = $p['added_on'];
}


$mpdf = new \Mpdf\Mpdf();
$data = '';
$data .= '<div class="card"><h1>Waste Management</h1>';
$data .= '<div class="crntdate"><h6></h6></div>';
$data .= '<p> Email :' .  $email.'</p>';
$data .= '<p> Amount :' . $amount.'</p>';
$data .= '<p> Date and time :' . $date.'</p></div>';
$mpdf->WriteHTML($data);
$mpdf->Output('idcard.pdf','D');

?>