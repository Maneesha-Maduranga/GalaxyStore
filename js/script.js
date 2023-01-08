var drop = document.getElementById("dropdownMenuButton1");
var items = document.getElementById("items");
let name = document.getElementById("name");
let email = document.getElementById("email");
let phone = document.getElementById("phone");
let message = document.getElementById("message");

drop.addEventListener("click", () => {
    items.classList.toggle("hidden")
});


function send() {
    if (name.value == "") {
        document.getElementById("nameLabel").classList.remove("hidden");
    }
    else if (email.value == "") {
        document.getElementById("nameLabel").classList.add("hidden");
        document.getElementById("emailLabel").classList.remove("hidden");
    }
    else if (phone.value == "") {
        document.getElementById("nameLabel").classList.add("hidden");
        document.getElementById("emailLabel").classList.add("hidden");
        document.getElementById("phoneLabel").classList.remove("hidden");
    }
    else if (message.value == "") {
        document.getElementById("nameLabel").classList.add("hidden");
        document.getElementById("emailLabel").classList.add("hidden");
        document.getElementById("phoneLabel").classList.add("hidden");
        document.getElementById("messageLabel").classList.remove("hidden");
    }
    else {
        let subject = "Galaxy store user feedback!";
        let body =  ${message.value} %0D%0A%0D%0A User, %0D%0A%0D%0A ${name.value}, %0D%0A%0D%0A ${phone.value}, %0D%0A%0D%0A ${email.value}. ;
        document.location.href = "mailto:pubg44030@gmail.com?subject="
        + encodeURIComponent(subject)
        + "&body=" + (body);

        name.value = "";
        phone.value = "";
        email.value = "";
        message.value = "";
    }
}