var currentTab = 0;
showTab(currentTab);


function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n === 0) {
        $('#prevBtn').hide(1);
    } else {
        $('#prevBtn').show();
    }
    if (n === (x.length - 1)) {
        console.log("OK")
        $('#submit_button').show(1);
        $('#nextBtn').hide(1);
    } else {
        $('#nextBtn').show(1);
        $('#submit_button').hide(1);
    }
}

function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n === 1 && !validate(currentTab)) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    showTab(currentTab);
}

function validate(currentTab) {
    // var name = $('#name').val().toString();
    // var email = $('#email').val().toString();
    // var phone = $('#phone').val().toString();
    // var select = $('#select').val().toString();
    // var nameArea = $('#nameArea').val().toString();
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    var select = document.getElementById("select");
    var nameArea = document.getElementById("nameArea");
    var price = document.getElementsByName("price");
    var provider = document.getElementsByName("provider")
    var fran = document.getElementsByName("fran")
    var comment = document.getElementsByName("comment");
    var comment2 = document.getElementsByName("comment2");
    // var agree = document.getElementById("agree");
    switch (currentTab) {
        case 0:
            let i = [];
            if (!validateField(name.value)){
                i.push(1)
                name.className= "invalid"
            }
            if (!validateEmail(email.value)){
                i.push(2)
                i.push(email.value)
                email.className= "invalid"
            }
            if (!validateField(phone.value)){
                i.push(3)
                phone.className= "invalid"
            }
            if (!validateField(select.value)){
                i.push(4)
                select.className= "invalid"
            }
            if (!validateArea(select.value,nameArea.value)){
                i.push(5)
                nameArea.className= "invalid"
            }
            console.log(i)
            return (i.length === 0)
        case 1:
            let y = [];
            if (!validateRadio(price)){
                y.push(1)
                price.className= "invalid"
            }
            if (!validateRadio(provider)){
                y.push(2)
                provider.className= "invalid"
            }
            if (!validateRadio(fran)){
                y.push(3)
                fran.className= "invalid"
            }
            console.log(y)
            return (y.length === 0)
        case 2:
            let u = [];
            if (!validateField(comment.item(0).value)){
                u.push(1)
                comment.className= "invalid"
            }
            if (!validateField(comment2.item(0).value)){
                u.push(2)
                comment2.className= "invalid"
            }
            // if (!agree.checked){
            //     u.push(3)
            //     agree.className= "invalid"
            // }
            console.log(u)
            return (u.length === 0)
        default:
            return false;
    }
}

function validateEmail(email)
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validateArea(area, nameArea) {
    if (area === "Другое") {
        return (nameArea !== "");
    } else {
        return true;
    }
}

function validateField(field) {
    return (field !== "")
}

function validateRadio(radios) {
    var formValid = false;
    var i = 0;
    while (!formValid && i < radios.length) {
        if (radios[i].checked) formValid = true;
        i++;
    }
    return formValid;
}
