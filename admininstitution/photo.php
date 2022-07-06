<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['ilogin'])==0)
    {   
header('location:index.php');
}
else{

function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 300;
    $resizeHeight = 300;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}

 if(isset($_POST['uploadattire']))
{
	$imageProcess = 0;
    if(is_array($_FILES)) {
		
        $iid=$_SESSION['ilogin'];
	    $image = $_FILES['image']['name'];
        $fileName = $_FILES['image']['tmp_name']; 
		$sql="update tblinstitution  set GroupAttire=:image where UserID=:iid";
	$query = $dbh->prepare($sql);
    $query->bindParam(':image',$image,PDO::PARAM_STR);
    $query->bindParam(':iid',$iid,PDO::PARAM_STR);
	$query->execute();
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $image;
        $uploadPath = "../assets/img/attire/";
        $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagejpeg($imageLayer,$uploadPath.$resizeFileName);
                break;
 
            
 
            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagepng($imageLayer,$uploadPath.$resizeFileName);
                break;
 
            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($file, $uploadPath. $resizeFileName);
        $imageProcess = 1;
    }
 
	if($imageProcess == 1){
	
		header ('location:institutionprofile.php?success');
	
	}else{
			header ('location:institutionprofile.php?invalidimage');

	}
	$imageProcess = 0;
}
 if(isset($_POST['uploadlogo']))
{
	$imageProcess = 0;
    if(is_array($_FILES)) {
		
        $iid=$_SESSION['ilogin'];
	    $image = $_FILES['image']['name'];
        $fileName = $_FILES['image']['tmp_name']; 
		$sql="update tblinstitution  set Image=:image where UserID=:iid";
	$query = $dbh->prepare($sql);
    $query->bindParam(':image',$image,PDO::PARAM_STR);
    $query->bindParam(':iid',$iid,PDO::PARAM_STR);
	$query->execute();
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = $image;
        $uploadPath = "../assets/img/institutionlogo/";
        $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagejpeg($imageLayer,$uploadPath.$resizeFileName);
                break;
 
            
 
            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                imagepng($imageLayer,$uploadPath.$resizeFileName);
                break;
 
            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($file, $uploadPath. $resizeFileName);
        $imageProcess = 1;
    }
 
	if($imageProcess == 1){
	
		header ('location:institutionprofile.php?success');
	
	}else{
			header ('location:institutionprofile.php?invalidimage');

	}
	$imageProcess = 0;
}
?>

<?php } ?>
