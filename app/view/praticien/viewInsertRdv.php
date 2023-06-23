
<!-- ----- début viewInsertRdv -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='RdvCreated'>        
        <label class='w-25' for="rdv_date">rdv_date : </label><input type="date" name='rdv_date'> <br/>                          
        <label class='w-25' for="rdv_nombre">rdv_nombre : </label><input type="number" name='rdv_nombre'> <br/> 
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



