<?php 
include('connection.php');
  session_start();
  $userId = $_SESSION['userid'];
function cropImage($imagePath, $startX, $startY, $width, $height) {
    $imagick = new Imagick(realpath($imagePath));
    $h= $imagick->getImageHeight();
    $w= $imagick->getImageWidth();
    $ch=$h/400;
    $cw=$w/400;
    $startX=$startX*$cw;
    $startY=$startY*$ch;
    $width=$width*$cw;
    //$cr=$w/$h;
    $height=$height*$ch;
    if($height>$width)$width=$height;
    else $height=$width;
    //$height=$width;
    $imagick->cropImage($width, $height, $startX, $startY);
    $imagick->writeImage($imagePath);
    file_put_contents($imagePath,$imagick);
    header("Content-Type: image/jpg");
    return $imagick->getImageBlob();
}
$src1=$_POST['src'];
$src="../".$_POST['src'];
$x=$_POST['x'];
$y=$_POST['y'];
$w=$_POST['w'];
$h=$_POST['h'];

$x=intval($x);
$y=intval($y);
$w=intval($w);
$h=intval($h);
$p=explode("/",$src1);
$p=$p[count($p)-1]; 
$add1=mysqli_query($con,"UPDATE user SET ImageUrl='$p' WHERE id='$userId'");


echo "<img src='$src1' />";
$img=cropImage($src,$x,$y,$w,$h);



?>
