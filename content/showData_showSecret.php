  <br>
<div class="card bg-light mb-3" style="max-width: 68rem;">
  <div class="card-header">        <a href="/"><h1 class="mb-0">daten
          <span class="text-primary">sicher tauschen</span>
        </h1></a></div>
  <div class="card-body">
        <?php if($data == "")
        {
          include("content/showData_notFound.php");           
        }
        else
        {
          include("content/showData_showContent.php");           
        }


          include("content/footer.php");           

?>

  </div>
</div>
