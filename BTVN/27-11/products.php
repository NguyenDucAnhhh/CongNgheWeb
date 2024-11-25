<?php
    
    $products = [
        ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 1000],
        ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 2000],
        ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 3000],
        ['id' => 4, 'name' => 'Sản phẩm 4', 'price' => 4000],
        ['id' => 5, 'name' => 'Sản phẩm 5', 'price' => 5000],
    ];

    // Lưu trạng thái của mảng sản phẩm sau mỗi thao tác
    if (isset($_POST['products'])) {
        $products = json_decode($_POST['products'], true); // Chuyển JSON thành mảng PHP
    }

    // Hàm tìm ID lớn nhất
    function getNewId($products) {
        return empty($products) ? 1 : max(array_column($products, 'id')) + 1;
    }

    // Thêm sản phẩm
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $price = floatval($_POST['price']);

        if ($name > 0 && $price > 0) {
            $newProduct = [
                'id' => getNewId($products),
                'name' => $name,
                'price' => $price,
            ];
            $products[] = $newProduct;
        }
    }

    // Chỉnh sửa sản phẩm
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editProduct'])) {
        $id = intval($_POST['id']);
        $name = htmlspecialchars(trim($_POST['name']));
        $price = floatval($_POST['price']);

        foreach ($products as &$product) {
            if ($product['id'] === $id) {
                $product['name'] = $name;
                $product['price'] = $price;
                break; // Thoát vòng lặp ngay khi tìm thấy sản phẩm
            }
        }
        unset($product); // Hủy tham chiếu
    }

    // Xóa sản phẩm
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteProduct'])) {
        $id = intval($_POST['id']);

        foreach ($products as $key => $product) {
            if ($product['id'] === $id) { // Kiểm tra ID chính xác
                unset($products[$key]); // Xóa phần tử trong mảng
                break; // Thoát vòng lặp ngay khi tìm thấy sản phẩm cần xóa
            }
        }
        $products = array_values($products); // Sắp xếp lại chỉ số mảng
    }
?>