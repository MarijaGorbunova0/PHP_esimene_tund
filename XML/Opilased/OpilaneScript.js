
function filterByGender() {
    let NaiseChekBX = document.getElementById("naine");
    let MeheCheckBX = document.getElementById("mees");
    let KoikCheckBX = document.getElementById("koik");
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
        MeheCheckBX.checked = false;
    }
     if (MeheCheckBX.checked) {
        for (let i = 0; i < Mehed.length; i++) {
            Mehed[i].style.display  = 'block';
        }
         NaiseChekBX.checked = false;
    }
    if (KoikCheckBX.checked) {
        MeheCheckBX.checked = false;
        NaiseChekBX.checked = false;
        for (let i = 0; i < Naised.length; i++) {
            Naised[i].style.display  = 'block';
        }
        for (let i = 0; i < Mehed.length; i++) {
            Mehed[i].style.display  = 'block';
        }
    }

}



