<aside class="sidebar">
    <!-- Dropdown menu for managing users -->
    <div class="dropdown">
        <button class="btn" data-target="manageUsersDropdown">Manage Users &#9660;</button>
        <div class="dropdown-content" id="manageUsersDropdown">
            <a href="#" onclick="showContent('manageUsers')">User Overview</a>
            <a href="#" onclick="showContent('createUserForm')">Add New User</a>
        </div>
    </div>

    <!-- Dropdown menu for managing products -->
    <div class="dropdown">
        <button class="btn" data-target="manageProductsDropdown">Manage Products &#9660;</button>
        <div class="dropdown-content" id="manageProductsDropdown">
            <a href="#" onclick="showContent('manageProducts')">Product Overview</a>
            <a href="#" onclick="showContent('createProductForm')">Add New Product</a>
        </div>
    </div>
</aside>