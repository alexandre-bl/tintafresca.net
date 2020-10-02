/*

Copyright (C) 2020 Mário Américo Gaspar Lopes

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

function update(img_mx_p) {

  window.scrollTo(0, 0);

  var nots = document.getElementsByClassName("not");
  var imgs;
  var img;
  var parent;
  var img_rect;
  var parent_rect;

  for (i = 0; i < nots.length; i++) {
    imgs = nots[i].getElementsByTagName("img");

    for (j = 0; j < imgs.length; j++) {
      img = imgs[j];
      parent = imgs[j].parentElement;

      img_rect = img.getBoundingClientRect();
      parent_rect = parent.getBoundingClientRect();

      if (
        (parent.clientWidth * (parent.clientHeight - img_rect.top)) /
          img.height /
          parent.clientWidth >=
        img_mx_p
      ) {
        img.height = img.height * ((parent.clientWidth * img_mx_p) / img.width);
        img.width = parent.clientWidth * img_mx_p;
      } else {
        img.width =
          img.width *
          ((parent.clientHeight - (img_rect.top - parent_rect.top)) /
            img.height);
        img.height = parent.clientHeight - (img_rect.top - parent_rect.top);
      }
    }
  }
}

function adds(top="", left="", right="") {

  var top_add = document.getElementById("top_add");
  top_add.innerHTML = "<img class='add' src=" + top + ">";

  var left_add = document.getElementById("left_add");
  left_add.innerHTML = "<img class='add' src=" + left + ">";

  var right_add = document.getElementById("right_add");
  right_add.innerHTML = "<img class='add' src=" + right + ">";
 
  var adds = document.getElementsByClassName("add");

  for (i = 0; i < adds.length; i++) {

    var add = adds[i];
    var parent = add.parentElement

    var o_add_dims = [
      window.getComputedStyle(add, null).getPropertyValue("width"),
      window.getComputedStyle(add, null).getPropertyValue("height"),
    ]; 
    var o_parent_dims = [
      window.getComputedStyle(parent, null).getPropertyValue("width"),
      window.getComputedStyle(parent, null).getPropertyValue("height"),
    ];

    if(
        o_add_dims[0] * ( o_parent_dims[0] / o_add_dims[1] ) < o_parent_dims[1]
    ) {

        add.width = parent.clientWidth;

    } else {

        add.height = parent.clientHeight;

    }

  }

}

update(0.75);
