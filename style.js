jQuery.fn.ellipsis = function (text, maxHeight) {
    var element = $(this);
    var characters = text.length;
    var step = text.length / 2;
    var newText = text;
    while (step > 0) {
        element.html(newText);
        if (element.outerHeight() <= maxHeight) {
            if (text.length == newText.length) {
                step = 0;
            } else {
                characters += step;
                newText = text.substring(0, characters);
            }
        } else {
            characters -= step;
            newText = newText.substring(0, characters);
        }
        step = parseInt(step / 2);
    }
    if (text.length > newText.length) {
        element.html(newText + "...");
        while (element.outerHeight() > maxHeight && newText.length >= 1) {
            newText = newText.substring(0, newText.length - 1);
            element.html(newText + "...");
        }
    }
};

$(".post_desc").ellipsis($(".post_desc").text(), 1000);
