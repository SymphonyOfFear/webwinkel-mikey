// Toggle functie voor dropdown menu's
function toggleDropdown(dropdownId) {
    var dropdownContent = document.getElementById(dropdownId);
    dropdownContent.classList.toggle("show");
}

// Functie om inhoud weer te geven op basis van ID
function showContent(contentId) {
    // Verberg eerst alle inhoud
    var contents = document.querySelectorAll('.dynamic-content');
    contents.forEach(function (content) {
        content.style.display = 'none';
    });

    // Toon de geselecteerde inhoud
    var contentToShow = document.getElementById(contentId);
    if (contentToShow) {
        contentToShow.style.display = 'block';
    }
}
