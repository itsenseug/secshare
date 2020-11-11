<p class="lead mb-5" style="background:white;">
  <h3><strong>Inhalt:</strong><br> <?php echo  nl2br($decrypted); ?></h3><br>
  <hr>
    <p>Detailinformationen zu den bereitgestellten Daten:</p>
  <strong>Gültigkeit: </strong><?php echo $showDate; ?><br>
  <strong>Passwortgeschützt: </strong><?php echo ($data['password']=="" ? 'Nein' : 'Ja'); ?><br>

<?php 
     if($warning == "1")
       {
       echo "<h2>Wichtige Hinweis:</h2><br><p>Die Anzeige der sensiblen Daten wurde auf den einmaligen Aufruf beschränkt. Sobald Sie diese Seite verlassen können Sie die Daten nicht erneut abrufen!</p>";
       }
      
?>
</p>