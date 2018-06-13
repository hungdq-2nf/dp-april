Setting new cookie
=============================
<?php
setcookie("color","yellow",time()+2);
?>
<br>
Getting Cookie
=============================
<?php
if (isset($_COOKIE["color"])) {
    echo $_COOKIE["color"];
} else {
    echo 'not set';
}
?>
<br>
Updating Cookie
=============================
<?php
setcookie("color","red");
if (isset($_COOKIE["color"])) {
    echo $_COOKIE["color"];
} else {
    echo 'not set<br>';
}

setcookie("color","blue");

if (isset($_COOKIE["color"])) {
    echo $_COOKIE["color"];
} else {
    echo 'not set';
}

?>
<br>
Deleting Cookie
==============================
<?php
//unset($_COOKIE["color"]);
/*Or*/
setcookie("color","pink",time()-1);
/*it expired so it's deleted*/

if (isset($_COOKIE["color"])) {
    echo $_COOKIE["color"];
} else {
    echo 'not set';
}

?>