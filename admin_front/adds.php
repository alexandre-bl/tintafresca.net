<?

function content() {

 

}

add_action( "admin_menu", "create_page");

function create_page() {

    add_menu_page( 
        "Anúncios",
        "Anúncios",
        "manage_options",
        "anuncios",
        "anuncios",
        "content",
        3
    );

}