<?php 

    function construct() {
        load_model('index');
    }

    function indexAction() {
        //Số sản phẩm hiển thị
        $data['item_per_page'] = isset($_GET['item_per_page']) ? $_GET['item_per_page'] : 8;

        // Trang hiện hành
        $data['current_page'] = isset($_GET['current_page']) ? $_GET['current_page'] : 1;

        //Số sản phẩm hiện thị từ trang tiếp theo
        $data['offset'] = ($data['current_page'] - 1) * $data['item_per_page'];
        
        //Câu lệnh sql
        $data['products'] = limitAllProducts($data['item_per_page'], $data['offset']);

        //Tổng số sản phẩm
        $data['total_products'] = get_num_product();
        
        //Tổng số trang cần chứa sản phẩm
        $data['total_page'] = ceil($data['total_products'] / $data['item_per_page']);

        $data['list_regions'] = get_regions();
        $data['list_products'] = get_products();
        load_view('index', $data);
    }


    function sortProductsAction() {
        if(isset($_GET['id'])) {
            $data['region_id'] = $_GET['id'];
            
            //Số sản phẩm hiện thị
            $data['item_per_page'] = isset($_GET['item_per_page']) ? $_GET['item_per_page'] : 4;
            
            //Trang hiện hành
            $data['current_page'] = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
            
            
            //Chỉ mục sản phẩm hiện ở trang kết tiếp
            $data['offset'] = ($data['current_page'] - 1) * $data['item_per_page'];
            
            //SQL
            $data['option_products'] = limitProductsByRegion($data['region_id'], $data['item_per_page'], $data['offset']);
            
            //Tổng số sản phẩm 
            $data['total_products'] = get_num_product_by_region($data['region_id']);
            
            //Tổng số trang
            $data['total_page'] = ceil($data['total_products'] / $data['item_per_page']);
            
            
        }
        $data['list_regions'] = get_regions();
        load_view('index', $data);
    }

    function searchAction() {
        if(isset($_POST)) {
            $data['name'] = $_POST['search-product'];

            $data['result_search'] = searchProduct($data['name']);
            // show_array($data['result_search']);
            $data['list_regions'] = get_regions();
            load_view('index', $data);
        }
    }

    function detailAction() {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $data['detail_product'] = getProductById($id);
        load_view('detail', $data);
    }
?>