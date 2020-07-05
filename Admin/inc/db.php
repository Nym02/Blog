<?php

$db = mysqli_connect('localhost', 'root', '', 'blog');

if ($db) {
    // echo "Connection Established";

} else {
    die("Connection Error" . mysqli_error($db));
}
