var drop = document.getElementById("dropdownMenuButton1");
var items = document.getElementById("items");

drop.addEventListener("click", () => {
    items.classList.toggle("hidden")
});
