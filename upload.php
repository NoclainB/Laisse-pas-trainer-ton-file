<?php

include 'head.php';

?>

<div class="container">
    <div class="row">
        <div class="col-lg-ofsset-4 col-lg-5"></div>
<?php

$valid_formats = array("jpg", "png", "gif", "jpeg");
$max_file_size = 1000000; //1 mo
$path = "upload/"; // Upload directory
$count = 0;

if(!empty($_FILES)){
    // Loop $_FILES to exeicute all files
    foreach ($_FILES['files']['name'] as $f => $name) {
        if ($_FILES['files']['error'][$f] == 4) {
            continue; // Skip file if any error found
        }
        if ($_FILES['files']['error'][$f] == 0) {
            if ($_FILES['files']['size'][$f] > $max_file_size) {
                $message = "$name est un fichier trop volumineux!";
                echo $message;
                continue; // Skip large files
            }
            elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                $message[] = "$name is not a valid format";
                continue; // Skip invalid file formats
            }
            else{ // No error found! Move uploaded files
                $ext = pathinfo( $_FILES['files']['name'][$f], PATHINFO_EXTENSION);
                $uniqueNames = 'image' . uniqid() . '.' . $ext;
                $uniqueName[$f]= $uniqueNames;
                if(move_uploaded_file($_FILES["files"]['tmp_name'][$f], 'upload/' . $uniqueNames))
                    $count++; // Number of successfully uploaded file
            }
        }
    }
}

if(isset($_POST['delete'])) {
    if (file_exists('./upload/' . $_POST['delete'])) {
        unlink('./upload/' . $_POST['delete']);
    }
}


?>

</div>
</div>
<div class="row">
    <?php if ($dossier = opendir('./upload')) { while(($file = readdir($dossier)) !== false ) {
        if( $file != '.' && $file != '..' && preg_match('#\.(jpe?g|gif|png)$#i', $file)) {?>
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img class="media-object" src="upload/<?= $file;?>">
            </a>
            <div class="caption">
                <h4 class="media-heading"><?= $file;?></h4>
                <p><?= filesize('./upload/' . $file) . 'ko';?></p>
                <p><?= 'fichier de type ' . substr($file, 19, 22);?></p>
                <form action="" method="post">
                    <input name="delete" type="hidden" value="<?=$file?>" />
                    <input class="btn btn-warning" type="submit" value="Delete" />
                </form>
            </div>
        </div>
    <?php  } } };?>
</div>
