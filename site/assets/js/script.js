// Function to toggle dropdowns
const toggleDropdown = (dropdownId) => {
    // Close all open dropdowns before toggling the current one
    document.querySelectorAll('.dropdown-content').forEach(dropdown => {
        dropdown.style.display = 'none';
    });

    const dropdown = document.getElementById(dropdownId);
    // Use 'block' to show and 'none' to hide
    dropdown.style.display = 'block';
};

// Function to display dynamic content
const showContent = (contentId) => {
    // Hide all dynamic content
    const contents = document.querySelectorAll('.dynamic-content');
    contents.forEach(content => content.style.display = 'none');

    // Show the selected content
    const contentToShow = document.getElementById(contentId);
    contentToShow.style.display = 'block';
};

// Ensure all DOM elements are loaded
document.addEventListener('DOMContentLoaded', function () {
    // Bind click events to buttons
    document.querySelectorAll('.sidebar button[data-dropdown]').forEach(button => {
        button.addEventListener('click', () => {
            const target = button.getAttribute('data-dropdown');
            toggleDropdown(target);
        });
    });

    // Close dropdowns when clicking outside of them
    window.addEventListener('click', function (e) {
        if (!e.target.matches('.btn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                    openDropdown.style.display = 'none';
                }
            }
        }
    });
});
