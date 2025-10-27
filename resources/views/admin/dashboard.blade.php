<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Watch Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
                    <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span></a></li>
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

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Add Product
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
                                        <img src="https://images.unsplash.com/photo-1523170335258-f5ed11844a49?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=80&q=80"
                                            alt="Product"
                                            style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" id="productName" class="form-control"
                                    placeholder="Enter product name">
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
                                <input type="number" id="productPrice" class="form-control"
                                    placeholder="Enter price">
                            </div>
                            <div class="form-group">
                                <label for="productStock">Stock</label>
                                <input type="number" id="productStock" class="form-control"
                                    placeholder="Enter stock quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Description</label>
                            <textarea id="productDescription" class="form-control" placeholder="Enter product description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="productImage">Image URL</label>
                            <input type="text" id="productImage" class="form-control"
                                placeholder="Enter image URL">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
