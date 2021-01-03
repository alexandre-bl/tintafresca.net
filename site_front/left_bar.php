<?php

$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
$pages = get_pages();
$pages_html = "";

foreach( $pages as $page ) {

    $page_link = get_page_link( $page->ID );
    $page_title = $page->post_title;

    $pages_html .= "<li><a href='$page_link'>$page_title</a></li>";

}

foreach( $categories as $category ) {

    if( $category->name != "Uncategorized" and
        $category->name != "Destaques"     and
        $category->name != "Opinião"       ) {

        $category_link = get_site_url() . "?category=$category->name";
        $category_title = $category->name;

        $pages_html .= "<li><a href='$category_link'>$category_title</a></li>";

    }

}

global $wpdb;
$table_name = "adds";
$table_name = $wpdb->prefix . $table_name;
$charset_collate = $wpdb->get_charset_collate();
require_once(ABSPATH . "wp-admin/includes/upgrade.php");

dbDelta(" CREATE TABLE IF NOT EXISTS $table_name ( img TEXT, link TEXT ) $charset_collate; ");

$query = $wpdb->get_results(" SELECT * FROM $table_name ");

$add = array( "img" => "", "url" => "" );

if( !empty( $query[1] ) ) { $add["img"] = $query[1]->img;
                            $add["link"] = $query[1]->link; }

?>

<div id="left_bar">

    <ul>
        <li><a href="<?php echo get_site_url(); ?>">Página Inicial</a></li>
        <?php echo $pages_html; ?>
    </ul>

    <a class="add" href="<?php echo $add["url"]; ?>"> <img src="<?php echo $add["img"]; ?>"> </a>

</div>