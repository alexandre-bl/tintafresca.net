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

    console.log( descs[l].parentElement.id + " : " + descs[l].offsetTop + ", " +  descs[l].parentElement.offsetTop );

    var y = descs[l].offsetTop ;//- descs[l].parentElement.offsetTop;
    var height = window.getComputedStyle(descs[l].parentElement, null).getPropertyValue("height");
    y = y.toString().replace("px","");
    height = height.toString().replace("px","");

    descs[l].style.height = height - y + 8 + "px"; 

}
