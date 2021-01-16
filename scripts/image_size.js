function image_size(img, wp, hp, tp, m) {
    let parent = img.parent;
    let width = img.offsetWidth;
    let height = img.offsetHeight;
    let p_width = img.offsetWidth;
    let p_height = parent.offsetHeight;
    let top = parent.offsetTop;

    if (height >= width) {
        img.style.height = p_height - top - m;
    } else {
        img.style.width = p_width - top - m;
    }
}

let imgs = getElementById("");
