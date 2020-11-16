<?php

$pages = get_pages();
$pages_html = "";

foreach( $pages as $page ) {

    $page_link = get_page_link( $page->ID );
    $page_title = $page->post_title;

    $pages_html .= "<li><a href='$page_link'>$page_title</a></li>";

}

?>

<div id="left_bar">

    <ul>
        <li><a href="<?php echo get_site_url(); ?>">Página Inicial</a></li>
        <?php echo $pages_html; ?>
    </ul>

</div>