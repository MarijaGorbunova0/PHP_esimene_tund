
function filterByGender() {
    let NaiseChekBX = document.getElementById("naine");
    let MeheCheckBX = document.getElementById("mees");

    let Naised = document.getElementsByClassName("naised");
    let Mehed = document.getElementsByClassName("mehed");

    for (let i = 0; i < Naised.length; i++) {
        Naised[i].style.display = "none";
    }

    for (let i = 0; i < Mehed.length; i++) {
        Mehed[i].style.display = "none";
    }
    if (NaiseChekBX.checked) {
        for (let i = 0; i < Naised.length; i++) {
            Naised[i].style.display  ='block';
        }
    }
    if (MeheCheckBX.checked) {
        for (let i = 0; i < Mehed.length; i++) {
            Mehed[i].style.display  = 'block';
        }
    }
    if (!NaiseChekBX.checked && !MeheCheckBX.checked) {
        for (let i = 0; i < Naised.length; i++) {
            Naised[i].style.display  = 'block';
        }

        for (let i = 0; i < Mehed.length; i++) {
            Mehed[i].style.display  = 'block';
        }
    }
}



