<br>
<div class="card bg-light mb-3" style="max-width: 68rem;">
  <div class="card-header">        <a href="/"><h1 class="mb-0">daten
          <span class="text-primary">sicher tauschen</span>
        </h1></a></div>
  <div class="card-body">
    <h5 class="card-title">Auf einfache Weise Daten mit Kunden sicher austauschen</h5>
    <p class="card-text">
        <form method="post" action="<?php $_SELF; ?>">
        <input type="hidden" name="action" value="addEntry">
        <input type="hidden" id="oneTime" name="oneTime" value="no"/>
                
<div class="md-form">
 <h4><span class="badge badge-primary">Im folgenden Feld den sicheren Inhalt eingeben</span></h4>
  <textarea id="secret" name="secret" class="md-textarea form-control" rows="5" required></textarea>
</div>
<div>&nbsp;</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Passwort zum Abrufen</label>
  </div>
    <input type="password" class="form-control" id="password" name="password">
</div>  
  
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Verfügbarkeit des Links</label>
  </div>
  
 
  <select class="custom-select" id="validity" name="validity">
    <option value="5" selected>5 Tage</option>
    <option value="1">1 Tag</option>
    <option value="2">2 Tage</option>
    <option value="3">3 Tage</option>
    <option value="10">10 Tage</option>
    <option value="14">14 Tage</option>
    <option value="20">20 Tage</option>
    <option value="30">30 Tage</option>
  </select>
</div>
<div class="alert alert-primary" role="alert">
<div class="custom-control custom-switch">
  <label>Ja</label> 
<input type="checkbox" id="oneTime" name="oneTime" value="yes"/>
  <label>Link kann nur einmal geöffnet werden</label>
</div>
</div>

  <button type="submit" class="btn btn-primary btn-lg btn-block">Link erstellen und anzeigen</button>
</form></p>
  </div>
</div>