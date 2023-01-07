let drop = document.getElementById("dropdownMenuButton1");
let items = document.getElementById("items");

drop.addEventListener("click", () => {
    items.classList.toggle("hidden")
});
