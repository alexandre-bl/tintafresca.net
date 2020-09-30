<!--

Copyright (C) 2020 Mário Américo Gaspar Lopes

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

-->

<?php

//require_once dirname(__FILE__)."/modules/adds/main.php";
require dirname(__FILE__)."/modules/adds/main.php";

?>

<!DOCTYPE html>
<html>

    <head>

        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/reset.css">
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">

        <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_site_icon_url() ?>">

        <meta charset="utf-8">

    </head>

    <body>

        <div id="top">

            <a href="<?php echo get_home_url(); ?>"><?php the_custom_logo() ?></a>

            <div id="top_add"></div>

        </div>

        <div id="sub_top">

            <?php
            
            $director = get_users(['role__in'=>['editor']])[0]->first_name;
            $director .= " ".get_users(['role__in'=>['editor']])[0]->last_name;
            $date = get_the_date();
            $edição = date("m")+227;

            for( $i = 0; $i < date("Y")-2020; $i += 1 ) {

                $edição += 12;
                
            }

            echo "Edição Nº ".$edição." | Director: ".$director." | ".$date;

            ?>

        </div>

        <div id="left">

            <a id="search" href="https://google.com"><img src="<?php echo get_bloginfo('template_directory'); ?>/icons/pesquisa.png">Pesquisar</a>

            <ul id="pages">


                <li>
                    <a href="<?php echo get_home_url(); ?>">Página Inicial</a>
                </li>

                <?php

                foreach ( get_pages() as $page ) {

                    echo "<li><a href='";
                    echo get_page_link( $page->ID );
                    echo "'>";
                    echo $page->post_title;
                    echo '</a></li>';

                }

                ?>

            </ul>

            <div id="forms">

                <div class="form">

                    Lado:

                    <br>

                    <label for="form_op_2">Esquerda</label>
                    <input class="form_op_2" name="options" type="radio">

                    </br>

                    <label for="form_op_1">Direita</label>
                    <input class="form_op_1" name="options" type="radio">

                    </br>

                    <input class="form_submit" type="submit" value="Enviar">

                </div>

            </div>

            <div class="side_add" id="left_add">
            </div>

        </div>

        <div id="right">

            <div class="side_add" id="right_add">
            </div>

        </div>

        <div id="center" <?php if( is_singular() ) { echo 'class="single"';} ?>>
            <?php

                $final = "";

                if( is_singular() ) {

                    the_post();

                    $final .= '<h1><a href="';
                    $final .= get_the_permalink();
                    $final .= '">';
                    $final .= get_the_title();
                    $final .= '</a></h1>';
                    $final .= get_the_post_thumbnail();
                    $final .= "<p>";
                    $final .= str_replace("\n", "<br>", get_the_content());
                    $final .= "</p>";

                } else {

                    $left = "<ul id='nots_left'>";
                    $right = "<ul id='nots_right'>";
                    $posts = get_posts($args=array('numberposts' => -1));
                    $destaques = 0;
                    $bottom = 0;

                    for( $i = 0; $i < count($posts); $i += 1 ) {

                        the_post();

                        if( $i < 15 or get_the_time("m")-date("m") < 1  ) {

                            $content = "";
                            $content .= '<h1><a href="';
                            $content .= get_the_permalink();
                            $content .= '">';
                            $content .= get_the_title();
                            $content .= '</a></h1>';
                            $content .= get_the_post_thumbnail();
                            $content .= "<p>";
                            $content .= str_replace("\n", "", get_the_content());
                            $content .= "</p>";

                            if( get_the_tags() and $destaques <= 3 ) {

                                foreach( get_the_tags() as $tag ) {

                                    if( $tag->name == "Destaques" ) {

                                        $final .= '<div class="not"';
                                        
                                        if( $destaques == 0 ) {
                                            
                                            $final .= ' id="main_not">';
                                        
                                        } elseif( $destaques == 1  ) {

                                            $final .= ' id="sec_not">';

                                        } elseif( $destaques == 2  ) {

                                            $final .= ' id="trd_not">';

                                        }

                                        $final .= $content;

                                        $final .= '</div>';

                                        $destaques += 1;

                                    } else {

                                        break;

                                    }

                                }

                            } else {

                                if( $bottom % 2 != 0 ) {

                                    $right .= "<li class='not'>";
                                    $right .= $content;
                                    $right .= "</li>";

                                } else {

                                    $left .= "<li class='not'>";
                                    $left .= $content;
                                    $left .= "</li>";

                                }

                                $bottom += 1;

                            }

                        }

                    }

                    $final .= "<div id='sub_nots'>";
                    $final .= $left."</ul>";
                    $final .= $right."</ul>";
                    $final .= "</div>";

                }

                echo $final;

            ?>
        </div>

        <script src="<?php echo get_bloginfo('template_directory'); ?>/js/script.js"></script>
        <?php echo $add_js; ?>

    </body>

</html>