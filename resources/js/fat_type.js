window.fat_type = function (id) {
    let tipo1 = document.getElementsByClassName("fat-type-1");
    let tipo2 = document.getElementsByClassName("fat-type-2");

    if (id == 1) {
        for (let i = 0; i <= tipo1.length; i++) {
            tipo1[i].style.display = "";
            tipo2[i].style.display = "none";
        }
    } else if (id == 2) {
        for (let i = 0; i <= tipo2.length; i++) {
            tipo2[i].style.display = "";
            tipo1[i].style.display = "none";
        }
    } else {
        document.location.reload(true);
    }
};
