function toggleDropdown(dropdownClass) {
    var dropdowns = document.getElementsByClassName(dropdownClass);
    for (var i = 0; i < dropdowns.length; i++) {
        var dropdown = dropdowns[i];
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
            dropdown.style.transform = "scaleY(0)";
            dropdown.style.opacity = "0";
        } else {
            dropdown.style.display = "block";
            dropdown.style.transform = "scaleY(1)";
            dropdown.style.opacity = "1";
        }
    }
}

function toggleCart() {
    var cart = document.getElementById("cart-dropdown");
    if (cart.style.display === "block") {
        cart.style.display = "none";
        cart.style.transform = "scaleY(0)";
        cart.style.opacity = "0";
    } else {
        cart.style.display = "block";
        cart.style.transform = "scaleY(1)";
        cart.style.opacity = "1";
    }
}
// Dropdown
function toggleDropdown(dropdownClass) {
    var dropdownContent = document.querySelector('.' + dropdownClass);
    if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
    } else {
        dropdownContent.style.display = "block";
    }
}

document.addEventListener('click', function(event) {
    var isClickInsideDropdown = document.querySelector('.dropdown').contains(event.target);
    if (!isClickInsideDropdown) {
        var dropdowns = document.querySelectorAll('.dropdown-content');
        dropdowns.forEach(function(dropdown) {
            dropdown.style.display = 'none';
        });
    }
});
