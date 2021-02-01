var posts = document.getElementsByClassName("post");
var to_resize = [];

for( var i = 0; i < posts.length; i++ ) {

    if( posts[i].parentElement.id != "opinion" ) {

        var children = posts[i].children;

        for( var j = 0; j < children.length; j++ ) {

            var child = children[j];

            if( child.classList.contains("post_desc") ||
                child.classList.contains("post_img")  ){

                to_resize.push( child );

            }

        }

    }

}

for( var l = 0; l < to_resize.length; l++ ) {

    if( to_resize[l].parentElement.id ) {

        var y = to_resize[l].offsetTop;

    } else {

        var y = to_resize[l].offsetTop - to_resize[l].parentElement.offsetTop;

    }

    var parent_h = window.getComputedStyle(to_resize[l].parentElement, null).getPropertyValue("height");

    y = y.toString().replace("px","");
    parent_h = parent_h.toString().replace("px","");

    var pos_h = parent_h - y + 8;

    if( to_resize[l].tagName == "IMG" ) {

        var w = window.getComputedStyle(to_resize[l], null).getPropertyValue("width");
        w = w.toString().replace("px","");

        var h = window.getComputedStyle(to_resize[l], null).getPropertyValue("height");
        h = h.toString().replace("px","");

        var parent_w = window.getComputedStyle(to_resize[l].parentElement, null).getPropertyValue("width");
        parent_w = parent_w.toString().replace("px","");

        var pos_w = w * ( pos_h / h );

        if( pos_w > parent_w*0.5 ) {

            to_resize[l].style.width = parent_w*0.5 + "px"; 

        } else {

            to_resize[l].style.height = pos_h + "px"; 

        }

        console.log(parent_h);

    } else {

        to_resize[l].style.height = pos_h + "px"; 

    }
}