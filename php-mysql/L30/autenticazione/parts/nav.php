<li class="nav-item">
    <a href="<?=BASE_URL?>/index.php" class="nav-link" aria-current="page">Home</a>
</li> 
<?php if(IS_LOGGED_IN):?>
    <li class="nav-item">
        <a href="<?=BASE_URL?>/rotte-protette/dashboard.php" class="nav-link">Dashboard</a>
    </li>
<?php endif;?>
