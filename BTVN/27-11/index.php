<?php include('header.php'); ?>
<?php include('products.php'); ?>

<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Products</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                    </div>
                </div>
            </div>
            <form id="productForm" method="POST">
                <input type="hidden" name="products" id="products" value='<?= json_encode($products) ?>'> <!-- Mảng sản phẩm dưới dạng JSON -->
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>Sản phẩm</th>
							<th>Giá thành</th>
							<th>Sửa</th>
							<th>Xóa</th>
						</tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox<?= $index ?>" name="options[]" value="<?= $index ?>">
                                        <label for="checkbox<?= $index ?>"></label>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($product['name']) ?></td>
                                <td><?= htmlspecialchars($product['price']) ?> VNĐ</td>
                                <td>
                                    <a href="#editProductModal" class="edit" data-toggle="modal" data-id="<?= $product['id'] ?>" data-name="<?= htmlspecialchars($product['name']) ?>" data-price="<?= htmlspecialchars($product['price']) ?>"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                </td>
                                <td>
                                <a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?= $product['id'] ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div id="addProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" onsubmit="syncProducts(this);">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá Cả</label>
                        <input type="text" class="form-control" name="price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="addProduct" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div id="editProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" onsubmit="syncProducts(this);">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá Cả</label>
                        <input type="text" class="form-control" name="price" id="edit-price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="editProduct" class="btn btn-info">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Product Modal -->
<div id="deleteProductModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" onsubmit="syncProducts(this);">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="delete-id">
                    <p>Are you sure you want to delete this product?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="deleteProduct" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript xử lý -->
<script>
    // Đồng bộ mảng `products` vào form trước khi gửi
    function syncProducts(form) {
        const productsInput = document.getElementById('products');
        form.appendChild(productsInput.cloneNode(true));
    }

    // Đổ dữ liệu vào modal chỉnh sửa
    document.querySelectorAll('.edit').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('edit-id').value = this.dataset.id;
            document.getElementById('edit-name').value = this.dataset.name;
            document.getElementById('edit-price').value = this.dataset.price;
        });
    });

    // Đổ dữ liệu vào modal xóa
    document.querySelectorAll('.delete').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('delete-id').value = this.dataset.id;
        });
    });
</script>

<?php include('footer.php'); ?>