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

        foreach ( $comments as $comment ) {
            echo "<div class='comment'>";
            echo '<p class="author"><b>' . get_comment_author( $comment ) . '</b></p>'; 
            echo get_avatar( $comment, 72 );
            echo '<p>' . $comment->comment_content . '</p>';
            echo "</div>";
        }

    } else {
        echo '<p>Ainda não há comentários nenhuns.</p>';
    }

?> </div>