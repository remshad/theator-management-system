<div id="footer">
 <?php
    if(isset($error) && $error!='')
    {  
        echo "
        
        <div id='myModal' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Message box</h4>
      </div>
      <div class='modal-body'>
        <p>{$error}.</p>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div>


        <script>$('#myModal').modal('show');</script>
        
        
        ";       
    }
?>  
</div>
</body>
</html>