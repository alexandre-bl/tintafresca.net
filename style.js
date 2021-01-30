var posts = document.getElementsByClassName("post");
var descs = array();

for( var i = posts; i < posts.length; i++ ) {

    var children = posts[i].children;

    for( var j = children; j < posts.children; j++ ) {

        var child = children[j];

        if( child.classList.contains("post_desc") ) {

            descs.push( child );

        }

    }

}
