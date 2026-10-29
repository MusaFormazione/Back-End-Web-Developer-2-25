<?php 
include_once './parts/header.php';
include './auth/guards/guest-guard.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Accedi</h1>
        </div>
        <div class="col-12">
            <form action="<?=BASE_URL?>/auth/main/user-login.php" method="POST">
                <input type="email" name="email" placeholder="La tua email" class="form-control">

                <input type="password" name="password" placeholder="La tua password" class="form-control">

                <button class="btn btn-primary">login</button>
            </form>
        </div>
    </div>
</div>

<?php include_once './parts/footer.php' ?>