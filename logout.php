<?php
session_start();
unset($_SESSION['uname']);
unset($_SESSION['admin']);
session_destroy();
 ?>
 <script type="text/javascript">
 if(window.confirm("Logged out successfully...!"))
  window.location.href="index.php";
</script>
