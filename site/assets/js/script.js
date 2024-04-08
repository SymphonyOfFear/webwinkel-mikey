// Function to toggle dropdowns
const toggleDropdown = (dropdownId) => {
    const dropdown = document.getElementById(dropdownId);
    if (dropdown) {
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    } else {
        console.error('Dropdown with ID "' + dropdownId + '" not found.');
    }
};

// Function to display dynamic content
const showContent = (contentId) => {
    // Hide all dynamic content
    document.querySelectorAll('.dynamic-content').forEach(content => {
        content.style.display = 'none';
    });// Show the selected content
    const contentToShow = document.getElementById(contentId);
    if (contentToShow) {
        contentToShow.style.display = 'block';
    } else {
        console.error('Content with ID "' + contentId + '" not found.');
    }
};// Ensure all DOM elements are loaded
document.addEventListener('DOMContentLoaded', () => {
    // Bind click events to dropdown buttons
    document.querySelectorAll('.dropdown-btn').forEach(button => {
        button.addEventListener('click', (event) => {
            // Prevent the click from closing the dropdown immediately
            event.stopPropagation();
            const target = button.dataset.dropdown;
            if (target) {
                toggleDropdown(target);
            } else {
                console.error('No data-dropdown attribute found on button.');
            }
        });
    });// Bind click events to dynamic content buttons
    document.querySelectorAll('.dynamic-content-button').forEach(button => {
        button.addEventListener('click', (event) => {
            // Prevent default link behavior
            event.preventDefault();
            const contentId = button.dataset.content;
            showContent(contentId);
        });
    });

    // Close dropdowns when clicking outside of them
    window.addEventListener('click', () => {
        document.querySelectorAll('.dropdown-content').forEach(dropdown => {
            dropdown.style.display = 'none';
        });
    });

    // Prevent clicks within the dropdown from closing it
    document.querySelectorAll('.dropdown-content').forEach(dropdownContent => {
        dropdownContent.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    });
});