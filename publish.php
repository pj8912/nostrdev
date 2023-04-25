<?php
include 'includes/header.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL & ~E_NOTICE);

?>
<div class="container">

    <div class="card card-body col-md-4 mt-5">
        <h3>Publish Note</h3>
        <form action="publish_note.php" method="post">

            <div class="mb-2">
                <textarea name="note_value" cols="30" class="form-control" placeholder="Write Something...." rows="10"></textarea>
            </div>
            <div class="mb-2">
                <input type="text" name="private_key" class="form-control" placeholder="Private Key">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="sbtn">Publish</button>
            </div>

        </form>
    </div>
</div>

<?php
include 'includes/footer.php';
?>