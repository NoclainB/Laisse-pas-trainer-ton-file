<?php
/**
 * Created by PhpStorm.
 * User: noclain
 * Date: 12/10/17
 * Time: 08:57
 **/

include 'upload.php'

?>

<div class="row">
    <?php for ($i=0; $i <= count($_FILES['fichier'])-1; $i ++) : { ?>
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img class="media-object" src="upload/<?= $uniqueName;?>">
            </a>
            <div class="caption">
                <h4 class="media-heading"><?= $uniqueName;?></h4>
                <p><?= $_FILES['fichier']['size'][$i] . 'ko';?></p>
                <p><?= 'fichier de type ' . $_FILES['fichier']['type'][$i] ;?></p>
            </div>
        </div>
    <?php } endfor;?>
</div>

<div class="row">
    <?php if (!empty ($_FILES)) { for ($i=0; $i <= count($_FILES['files']['name'])-1; $i ++) : { ?>
        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img class="media-object" src="upload/<?= $uniqueName[$i];?>">
            </a>
            <div class="caption">
                <h4 class="media-heading"><?= $uniqueName[$i];?></h4>
                <p><?= $_FILES['files']['size'][$i] . 'ko';?></p>
                <p><?= 'fichier de type ' . $_FILES['files']['type'][$i] ;?></p>
                <form action="" method="post">
                    <input name="delete" type="hidden" value="<?=$uniqueName[$i]?>" />
                    <input class="btn btn-warning" type="submit" name="remove" value="Delete" />
                </form>
            </div>
        </div>
    <?php } endfor; };?>
</div>
