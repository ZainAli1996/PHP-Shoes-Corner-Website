<script>
alert('You Have Successfully LOGGED OUT.')
</script>

<?php
session_start();
include("conf.php");
session_destroy();
?>
<script>
document.location='Login.php'
</script>
