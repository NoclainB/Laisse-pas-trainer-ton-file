<?php
/**
 * Created by PhpStorm.
 * User: noclain
 * Date: 10/10/17
 * Time: 07:39
 */

include 'head.php';


?>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-4">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" id="file" name="files[]" multiple="multiple"/>
                    <input type="submit" value="Upload!" />
                </form>
            </div>
        </div>
    </div>
<?php

include 'footer.php';

?>