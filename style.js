var posts = document.getElementsByClassName("post");
var descs = [];

for( var i = posts; i < posts.length; i++ ) {

    var children = posts[i].children;

    for( var j = children; j < posts.children; j++ ) {

        var child = children[j];

        if( child.classList.contains("post_desc") ) {

            descs.push( child );

        }

    }

}

for( var l; l < descs.length; l++ ) {

    console.log("test");

    var desc = descs[l];
    var parent = desc.parent;

    desc.style.height = parent.style.height - desc.offsetTop;

}
