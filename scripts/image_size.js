function image_size(img, w, h) {
    let width = img.offsetWidth;
    let height = img.offsetHeight;

    if (height >= width) {
        img.style.height = "100%";
        img.style.maxHeight = w;
    } else {
        img.style.width = "100%";
        img.style.maxWidth = h;
    }
}

var imgs = document.getElementsByClassName("post_img");

for (var i = 0; i < imgs.length; i++) {
    image_size(imgs[i], "60%", "60%");
}
