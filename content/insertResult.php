<br>
<div class="card bg-light mb-3" style="max-width: 68rem;">
  <div class="card-header">        <a href="/"><h1 class="mb-0">daten
          <span class="text-primary">sicher tauschen</span>
        </h1></a></div>
  <div class="card-body">
    <h5 class="card-title">Es wurde ein neuer Link angelegt</h5>
    <p class="card-text">
    
    <div class="container">
  <div class="row">
    <div class="col-sm-3">Url:</div>
    <div class="col-sm-9"><?php echo $_SERVER['HTTP_HOST']; ?>/index.php?id=<?php echo $linkPath;?></div>
  </div>
  <div class="row">
    <div class="col-sm-3">Gültigkeit:</div>
    <div class="col-sm-9"><?php echo $_POST['validity']; ?> Tage</div>
  </div>
  <div class="row">
    <div class="col-sm-3">Passwortschutz:</div>
    <div class="col-sm-9"><?php echo ($_POST['password']=="" ? 'Nein' : 'Ja'); ?></div>
  </div>
  <div class="row">
    <div class="col-sm-3">Einmalige Anzeige:</div>
    <div class="col-sm-9"><?php echo ($_POST['oneTime']== "no" ? 'Nein' : 'Ja'); ?></div>
  </div>
</div>
  </div>
</div>