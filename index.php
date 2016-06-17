<?php
require_once 'session.php';
?>
<html>
<head>
    <title>rp</title>
<head/>
<body>
    <h1>Welcome <?php echo $login_session; ?></h1> 
    <h2><a href = "logout.php">Sign Out</a></h2>
    <ul>
        <li><a href="raw.php?h=2">RAW Disciplines Data by 56 Cat 1H2016</a></li>
        <li><a href="raw.php?h=3">RAW Disciplines Data by 56 Cat 2H2016 (FC)</a></li>
    </ul>
</body>
</html>