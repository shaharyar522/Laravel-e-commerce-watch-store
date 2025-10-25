<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Watch Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #2ecc71;
            --warning: #f39c12;
            --danger: #e74c3c;
            --gray: #95a5a6;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background: var(--primary);
            color: var(--white);
            transition: all 0.3s ease;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.2);
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .sidebar-header p {
            font-size: 0.8rem;
            opacity: 0.7;
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .sidebar-menu ul {
            list-style: none;
        }

        .sidebar-menu li {
            padding: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.1);
            border-left: 3px solid var(--secondary);
        }

        .sidebar-menu i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            transition: all 0.3s;
        }

        .top-navbar {
            background: var(--white);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--dark);
        }

        .search-box {
            display: flex;
            align-items: center;
            background: var(--light);
            border-radius: 30px;
            padding: 8px 15px;
            width: 300px;
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            width: 100%;
            padding: 5px;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .content-area {
            padding: 30px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .breadcrumb {
            display: flex;
            list-style: none;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .breadcrumb li:not(:last-child)::after {
            content: ">";
            margin: 0 10px;
        }

        /* Stats Cards */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--white);
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.5rem;
            color: var(--white);
        }

        .stat-icon.products {
            background: var(--secondary);
        }

        .stat-icon.orders {
            background: var(--success);
        }

        .stat-icon.revenue {
            background: var(--warning);
        }

        .stat-icon.customers {
            background: var(--danger);
        }

        .stat-info h3 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .stat-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Products Table */
        .card {
            background: var(--white);
            border-radius: 10px;
            box-shadow: var(--shadow);
            margin-bottom: 30px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            font-size: 1.5rem;
            color: var(--dark);
        }

        .card-body {
            padding: 20px;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .table th {
            background: #f8f9fa;
            font-weight: 600;
            color: var(--dark);
        }

        .table tr:hover {
            background: #f8f9fa;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn i {
            margin-right: 5px;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.8rem;
        }

        .btn-primary {
            background: var(--secondary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-success {
            background: var(--success);
            color: var(--white);
        }

        .btn-success:hover {
            background: #27ae60;
        }

        .btn-warning {
            background: var(--warning);
            color: var(--white);
        }

        .btn-warning:hover {
            background: #e67e22;
        }

        .btn-danger {
            background: var(--danger);
            color: var(--white);
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--secondary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .form-row {
            display: flex;
            gap: 20px;
        }

        .form-row .form-group {
            flex: 1;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1100;
            align-items: center;
            justify-content: center;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: var(--white);
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            margin: 0;
            color: var(--dark);
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
        }

        .modal-body {
            padding: 20px;
            max-height: 70vh;
            overflow-y: auto;
        }

        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                width: 80px;
                text-align: center;
            }

            .sidebar-header h2, .sidebar-header p, .sidebar-menu span {
                display: none;
            }

            .sidebar-menu i {
                margin-right: 0;
                font-size: 1.2rem;
            }

            .main-content {
                margin-left: 80px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

            .sidebar.active {
                width: 250px;
            }

            .sidebar.active .sidebar-header h2,
            .sidebar.active .sidebar-header p,
            .sidebar.active .sidebar-menu span {
                display: block;
            }

            .sidebar.active .sidebar-menu i {
                margin-right: 10px;
            }

            .stats-cards {
                grid-template-columns: 1fr;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .search-box {
                width: 200px;
            }
        }

        @media (max-width: 576px) {
            .top-navbar {
                padding: 15px;
            }

            .content-area {
                padding: 15px;
            }

            .search-box {
                display: none;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h2>Watch Store</h2>
                <p>Admin Dashboard</p>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
                    <li><a href="#"><i class="fas fa-shopping-bag"></i> <span>Products</span></a></li>
                    <li><a href="#"><i class="fas fa-shopping-cart"></i> <span>Orders</span></a></li>
                    <li><a href="#"><i class="fas fa-users"></i> <span>Customers</span></a></li>
                    <li><a href="#"><i class="fas fa-chart-bar"></i> <span>Analytics</span></a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
                    <li><a href="#"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navbar -->
            <div class="top-navbar">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-profile">
                    <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="Admin User">
                    <span>John Doe</span>
                </div>
            </div>

            <!-- Content Area -->
            <div class="content-area">
                <div class="page-header">
                    <h1>Product Management</h1>
                    <ul class="breadcrumb">
                        <li>Dashboard</li>
                        <li>Products</li>
                    </ul>
                </div>

                <!-- Stats Cards -->
                <div class="stats-cards">
                    <div class="stat-card">
                        <div class="stat-icon products">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <div class="stat-info">
                            <h3>42</h3>
                            <p>Total Products</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon orders">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-info">
                            <h3>128</h3>
                            <p>Total Orders</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon revenue">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stat-info">
                            <h3>$24,580</h3>
                            <p>Total Revenue</p>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon customers">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3>86</h3>
                            <p>Total Customers</p>
                        </div>
                    </div>
                </div>

                <!-- Products Table -->
                <div class="card">
                    <div class="card-header">
                        <h2>Product List</h2>
                        <button class="btn btn-primary" id="addProductBtn">
                            <i class="fas fa-plus"></i> Add Product
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#001</td>
                                    <td>
                                        <img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=80&q=80" alt="Product" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                    </td>
                                    <td>Heritage Chronograph</td>
                                    <td>Men's Collection</td>
                                    <td>$4,850</td>
                                    <td><span class="badge badge-success">In Stock</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#002</td>
                                    <td>
                                        <img src="https://images.unsplash.com/photo-1587836374828-4dbafa94cf0e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=80&q=80" alt="Product" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                    </td>
                                    <td>Mariner Professional</td>
                                    <td>Sports Collection</td>
                                    <td>$3,950</td>
                                    <td><span class="badge badge-success">In Stock</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#003</td>
                                    <td>
                                        <img src="https://images.unsplash.com/photo-1611591437281-460bfbe1220a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=80&q=80" alt="Product" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                    </td>
                                    <td>Minimalist Artisan</td>
                                    <td>Artisan Collection</td>
                                    <td>$12,500</td>
                                    <td><span class="badge badge-warning">Low Stock</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal" id="productModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Product</h3>
                <button class="modal-close" id="closeModal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="productForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" id="productName" class="form-control" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="productCategory">Category</label>
                            <select id="productCategory" class="form-control">
                                <option value="">Select Category</option>
                                <option value="Men's Collection">Men's Collection</option>
                                <option value="Women's Collection">Women's Collection</option>
                                <option value="Sports Collection">Sports Collection</option>
                                <option value="Artisan Collection">Artisan Collection</option>
                                <option value="Limited Edition">Limited Edition</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="productPrice">Price ($)</label>
                            <input type="number" id="productPrice" class="form-control" placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="productStock">Stock</label>
                            <input type="number" id="productStock" class="form-control" placeholder="Enter stock quantity">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea id="productDescription" class="form-control" placeholder="Enter product description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productImage">Image URL</label>
                        <input type="text" id="productImage" class="form-control" placeholder="Enter image URL">
                    </div>
                    <div class="form-group">
                        <label for="productBadge">Badge (Optional)</label>
                        <select id="productBadge" class="form-control">
                            <option value="">No Badge</option>
                            <option value="Limited Edition">Limited Edition</option>
                            <option value="Exclusive">Exclusive</option>
                            <option value="New">New</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" id="cancelBtn">Cancel</button>
                <button class="btn btn-primary" id="saveProductBtn">Save Product</button>
            </div>
        </div>
    </div>

    <script>
        // Toggle Sidebar
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Modal Functions
        const modal = document.getElementById('productModal');
        const addProductBtn = document.getElementById('addProductBtn');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const saveProductBtn = document.getElementById('saveProductBtn');

        addProductBtn.addEventListener('click', function() {
            modal.classList.add('show');
        });

        closeModal.addEventListener('click', function() {
            modal.classList.remove('show');
        });

        cancelBtn.addEventListener('click', function() {
            modal.classList.remove('show');
        });

        saveProductBtn.addEventListener('click', function() {
            // Here you would typically save the product data
            alert('Product saved successfully!');
            modal.classList.remove('show');
            document.getElementById('productForm').reset();
        });

        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.remove('show');
            }
        });
    </script>
</body>
</html>
