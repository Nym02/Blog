<?php
include "Admin/inc/db.php";
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $replyID = $_POST['replyID'];
    $postID = $_POST['postID'];

    $subID = $_SESSION['sub_id'];



    $replyBody = mysqli_real_escape_string($db, $_POST['reply']);

    //getting subscriber name and image
    $subscriber = "SELECT * FROM subscriber where sub_id= '$subID'";
    $fireSubscriber = mysqli_query($db, $subscriber);
    while($row = mysqli_fetch_assoc($fireSubscriber)){
        $subName = $row['sub_name'];
        $subImage = $row['sub_image'];
    }

    $sql = "INSERT INTO comments(reply_id, user_fullname, cmnt_description,    post_id,    cmnt_status    ,cmnt_img,cmnt_date    ) VALUES('$replyID','$subName','$replyBody','$postID','1','$subImage', current_timestamp())";


    $fireSql = mysqli_query($db, $sql);

    if ($fireSql) {
        header("Location: single.php?post=$postID&reply=$replyID");
    } else {
        header("Location: single.php?post=$postID&msg=replyFailed");
    }
}

ob_end_flush();
