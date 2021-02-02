<div id="comments"> <?php

    //Get only the approved comments
    $args = array(
        'status' => 'approve'
    );
    
    // The comment Query
    $comments_query = new WP_Comment_Query;
    $comments = $comments_query->query( $args );
    
    echo "<h1>Comentários</h1>";

    // Comment Loop
    if ( $comments ) {

        echo "<div class='comment'>";

        foreach ( $comments as $comment ) {
            echo '<p>' . $comment->comment_content . '</p>';
        }

        echo "</div>";

    } else {
        echo '<p>No comments found.</p>';
    }

?> </div>