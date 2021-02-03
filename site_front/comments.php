<div id="comments"> <?php

    $args = array(
        'post_id' => get_post()->ID
    );
    $comments = get_comments( $args );
    
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