<div id="comments"> <?php

    //Get only the approved comments
    $args = array(
        'status' => 'approve',
        'avatar_size' => 74
    );
    
    // The comment Query
    $comments_query = new WP_Comment_Query;
    $comments = $comments_query->query( $args );
    
    echo "<h1>Comentários:</h1>";

    comment_form();

    // Comment Loop
    if ( $comments ) {

        echo "<div class='comment'>";

        foreach ( $comments as $comment ) {
            echo get_avatar( $comment, 72 );
            echo '<p>' . $comment->comment_content . '</p>';
        }

        echo "</div>";

    } else {
        echo '<p>Ainda não há comentários nenhuns.</p>';
    }

?> </div>