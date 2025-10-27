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
                                    <th>Badge</th>
                                    <th>Image</th>
                                    <th>Overlay Description</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->badge }}</td>
                                        <td>
                                            <img src="{{ $product->image_url }}"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                        </td>
                                        <td>{{ $product->overlay_description }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><span class="badge badge-success">{{ $product->stock }}</span></td>
                                        <td> <button type="button" class="btn btn-warning btn-sm editBtn"
                                                data-id="{{ $product->id }}" data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
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
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="productForm" action="{{ route('products.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label for="badge" class="form-label">Badge (Optional)</label>
                                <select id="badge" name="badge" class="form-control">
                                    <option value="">No Badge</option>
                                    <option value="Limited Edition">Limited Edition</option>
                                    <option value="Exclusive">Exclusive</option>
                                    <option value="New Arrival">New Arrival</option>
                                    <option value="Bestseller">Bestseller</option>
                                    <option value="Luxury Collection">Luxury Collection</option>
                                    <option value="Trending">Trending</option>
                                    <option value="Classic">Classic</option>
                                    <option value="Special Edition">Special Edition</option>
                                    <option value="On Sale">On Sale</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Product Image</label>
                                <input type="file" id="image_file" name="image_file" class="form-control">
                                <small class="text-muted">Or provide an image URL below</small>
                            </div>

                            <div class="col-md-6">
                                <label for="image_url" class="form-label">Image URL</label>
                                <input type="text" id="image_url" name="image_url" class="form-control"
                                    placeholder="Enter image URL">
                            </div>

                            <div class="col-12">
                                <label for="overlay_description" class="form-label">Overlay Description
                                    Product</label>
                                <textarea id="overlay_description" name="overlay_description" class="form-control"
                                    placeholder="Product Overlay Description" rows="3"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <select id="category" name="category" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="Men's Collection">Men's Collection</option>
                                    <option value="Women's Collection">Women's Collection</option>
                                    <option value="Sports Collection">Sports Collection</option>
                                    <option value="Artisan Collection">Artisan Collection</option>
                                    <option value="Limited Edition">Limited Edition</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Enter product name">
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control" placeholder="Enter product description"
                                    rows="4"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="price" class="form-label">Price ($)</label>
                                <input type="number" id="price" name="price" class="form-control"
                                    placeholder="Enter price">
                            </div>

                            <div class="col-md-6">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" id="stock" name="stock" class="form-control"
                                    placeholder="Enter stock quantity">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit Modal-->


    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="editProductForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"></label>
                                <select id="editBadge" name="badge" class="form-control">
                                    <option value="">No Badge</option>
                                    <option value="Limited Edition">Limited Edition</option>
                                    <option value="Exclusive">Exclusive</option>
                                    <option value="New Arrival">New Arrival</option>
                                    <option value="Bestseller">Bestseller</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Product Image</label>
                                <input type="file" id="editImageFile" name="image_file" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image URL</label>
                                <input type="text" id="editImageUrl" name="image_url" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Overlay Description</label>
                                <textarea id="editOverlay" name="overlay_description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <input type="text" id="editCategory" name="category" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" id="editName" name="name" class="form-control">
                            </div>
                            <div class="col-12">
                                <label class="form-label">{{ $product->description }}</label>
                                <textarea id="editDescription" name="description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Price</label>
                                <input type="number" id="editPrice" name="price" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Stock</label>
                                <input type="number" id="editStock" name="stock" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>

                </form>
            </div>
        </div>
    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('image_file').addEventListener('change', function() {
            if (this.files.length) document.getElementById('image_url').disabled = true;
            else document.getElementById('image_url').disabled = false;
        });

        document.getElementById('image_url').addEventListener('input', function() {
            if (this.value) document.getElementById('image_file').disabled = true;
            else document.getElementById('image_file').disabled = false;
        });
    </script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.editBtn').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Fetch product data using AJAX
            fetch(`/products/${id}/edit`)
                .then(response => response.json())
                .then(product => {
                    // Fill modal fields
                    document.getElementById('editName').value = product.name;
                    document.getElementById('editCategory').value = product.category;
                    document.getElementById('editPrice').value = product.price;
                    document.getElementById('editStock').value = product.stock;
                    document.getElementById('editBadge').value = product.badge;
                    document.getElementById('editDescription').value = product.description;
                    document.getElementById('editOverlay').value = product.overlay_description;
                    document.getElementById('editImageUrl').value = product.image_url;

                    // Update form action
                    document.getElementById('editProductForm').action = `/products/${id}`;
                })
                .catch(error => console.error('Error loading product:', error));
        });
    });
});
</script>


</body>
</html>
