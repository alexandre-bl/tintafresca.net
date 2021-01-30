var posts = document.getElementsByClassName("post");
var descs = [];

for( var i = 0; i < posts.length; i++ ) {

    var children = posts[i].children;

    for( var j = 0; j < children.length; j++ ) {

        var child = children[j];

        if( child.classList.contains("post_desc") ) {

            descs.push( child );

        }

    }

}

for( var l = 0; l < descs.length; l++ ) {

    var y = descs[l].offsetTop;
    var height = window.getComputedStyle(descs[l].parentElement, null).getPropertyValue("height");
    y = y.toString().replace("px","");
    height = height.toString().replace("px","");

    console.log(y);
    descs[l].style.height = height - y + "px"; 

}
