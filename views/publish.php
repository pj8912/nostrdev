<?php
include '../includes/header.php';
?>

<div class="container">
    <div class="card card-body col-md-6 mt-5 m-auto">
        <h3><i class="fas fa-rss-square" aria-hidden="true"></i> Publish Note</h3>
        <form action="/publish" method="post">
           <div class="mb-2">
                <textarea type="text" name="note_value" cols="30" class="form-control" placeholder="Write Something...." rows="10"></textarea>
            </div>
            <div class="mb-2">
                <input type="text" name="private_key" class="form-control" placeholder="Private Key(nsec....)">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="sbtn"><i class="fas fa-rss-square" aria-hidden="true"></i> Publish</button>
            </div>

        </form>
    </div>
</div>

<?php
include '../includes/footer.php';
?>
