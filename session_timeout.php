<?php
   if(isset($_SESSION['email']) )
   {
        if((time() - $_SESSION['last_login_timestamp']) > 600) // 900 = 15 * 60
        {
          $script = "<script>
          window.location = 'logout.php';</script>";
          echo $script;
          exit();
          //    header("location:logout.php");
        }

   }

   ?>
