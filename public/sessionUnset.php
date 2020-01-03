<?php
    session_start();
    var_dump($_SESSION);
    session_unset();
    echo "Your request has been fulfilled";
    var_dump($_SESSION);
?>

<HTML>
<HEAD>

</HEAD>
<BODY>
    <form action="trolley.php">
        <br>
        <input type="submit" value="Return">
    </form>
</BODY>
</HTML>
