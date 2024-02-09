<?php
        $id = $_GET['catid'];
         $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
         $result = mysqli_query($conn,$sql);
         $noResult = true;
         while($row = mysqli_fetch_assoc($result)){
             $noResult = false;
             $id = $row['thread_id'];
             $title = $row['thread_title'];
             $desc = $row['thread_desc'];
             $thread_time = $row['timestamp'];
             $thread_user_id = $row['thread_user_id'];
             $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $asked_by = $row2['user_email'];
        //echo $row['user_email'];

        echo '<div class="media my-3">
            <img src="img/media.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">'.
             '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id. '">'. $title . ' </a></h5>
                '. $desc . ' </div>'.'<div class="font-weight-bold my-0"> Asked by: '.$asked_by.''. $thread_time. '</div>'.
        '</div>';
         }

         //echo var_dump($noResult);
         if($noResult){

             echo '<div class="jumbotron jumbotron-fluid">
              <div class="container">
                <p class="display-4">No Results Found</p>
                <p class="lead">You are the first person to ask the question.</p>
              </div>
            </div>';
        }
        ?>      