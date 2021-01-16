function image_size(img, w, h) {
    let width = img.offsetWidth;
    let height = img.offsetHeight;

    if (height >= width) {
        img.style.height = w;
    } else {
        img.style.width = h;
    }
}

var imgs = document.getElementsByClassName("post_img");

for (var i = 0; i < imgs.length; i++) {
    image_size(imgs[i], "60%", "70%");
}
