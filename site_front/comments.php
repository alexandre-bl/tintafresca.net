<div id="comments"> <?php

    //Get only the approved comments
    $args = array(
        'status' => 'approve'
    );
    
    // The comment Query
    $comments_query = new WP_Comment_Query;
    $comments = $comments_query->query( $args );
    
    // Comment Loop
    if ( $comments ) {

        echo "<div class='comment'>";

        foreach ( $comments as $comment ) {
            echo '<p>' . $comment->comment_content . '</p>';
        }
        
        echo "</div>";

    } else {
        echo 'No comments found.';
    }

?> </div>