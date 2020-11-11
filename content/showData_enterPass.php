<br>
<div class="card bg-light mb-3" style="max-width: 68rem;">
  <div class="card-header">        <a href="/"><h1 class="mb-0">daten
          <span class="text-primary">sicher tauschen</span>
        </h1></a></div>
  <div class="card-body">    
    <p class="card-text">
    
    <div class="container">


<form method="post" action="showSecret.php">
    <input type="hidden" name="action" value="checkPass">
    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>"
        <div class="md-form">
          <h4><span class="badge badge-primary">Bitte das Passwort zum entschlüsseln eingeben</span></h4>
          <input type="password" class="form-control" id="password" name="password">
        </div>
    <div>&nbsp;</div>
    <button type="submit" class="btn btn-primary btn-lg btn-block">Inhalt anzeigen</button>
</form></p>
</div>
  </div>
</div>