<?php
if(!empty($titolo) && !empty($testo)):
?>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><?=$titolo?></h5>
    <p class="card-text"><?=$testo?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<?php endif;?>