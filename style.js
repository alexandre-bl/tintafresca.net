var posts = document.getElementsByClassName("post");
var descs = [];

for( var i = 0; i < posts.length; i++ ) {

    if( posts[i].parentElement.id != "opinion" ) {

        var children = posts[i].children;

        for( var j = 0; j < children.length; j++ ) {

            var child = children[j];

            if( child.classList.contains("post_desc") ||
                child.classList.contains("post_img")  ){

                descs.push( child );

            }

        }

    }

}

for( var l = 0; l < descs.length; l++ ) {

    if( descs[l].parentElement.id ) {

        var y = descs[l].offsetTop;

    } else {

        var y = descs[l].offsetTop - descs[l].parentElement.offsetTop;

    }

    var height = window.getComputedStyle(descs[l].parentElement, null).getPropertyValue("height");
    y = y.toString().replace("px","");
    height = height.toString().replace("px","");

    var pos_height = height - y + 8;

    if( descs[l].tagName == "img" ) {

        var width = window.getComputedStyle(descs[l], null).getPropertyValue("width");
        width = width.toString().replace("px","");
        var h = window.getComputedStyle(descs[l], null).getPropertyValue("height");
        h = h.toString().replace("px","");
        var p_width = window.getComputedStyle(descs[l].parentElement, null).getPropertyValue("width");
        p_width = p_width.toString().replace("px","");

        var pos_width = width * ( pos_height / h );

        if( pos_width > p_width*0.5 ) {

            descs[l].style.width = p_width*0.5 + "px"; 

        }

    } else {

        descs[l].style.height = pos_height + "px"; 

    }
}