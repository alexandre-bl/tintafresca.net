function image_size(img, wp, hp, tp, m) {
    let parent = img.parentElement;
    let width = img.offsetWidth;
    let height = img.offsetHeight;
    let p_width = img.offsetWidth;
    let p_height = parent.offsetHeight;
    let top = parent.offsetTop;

    if (height >= width) {
        img.style.height = "100%";
        img.style.maxHeight = (p_height - top - m * 2) * hp + "px";
    } else {
        img.style.width = "100%";
        img.style.maxWidth = (p_width - top - m * 2) * wp + "px";
    }
}

var imgs = document.getElementsByClassName("post_img");

for (var i = 0; i < imgs.length; i++) {
    image_size(imgs[i], 0.6, 0.6, 0.5, 5);
}
