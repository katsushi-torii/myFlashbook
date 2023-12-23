//make it reload only once, needed to reload to get data from database and then change style
window.onload = function () {

    if (window.name != "reloaded") {
        location.reload();
        window.name = "reloaded";
    } else {
        window.name = "";
    }

}