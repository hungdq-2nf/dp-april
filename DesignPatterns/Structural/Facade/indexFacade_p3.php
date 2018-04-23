<?php
//Chúng ta cùng đến với một ví dụ khác về quá trình mua hàng trên mạng, quá trình này bao gồm các bước:

//1. Thêm hàng vào giỏ hàng.
//2. Tính tiền vận chuyển hàng.
//3. Tính tiền chiết khấu.
//4. Sinh đơn bán hàng.

// Quá trình xử lý đơn hàng
$productID = 1;//$_GET['productId'];
$qtyCheck = 2;//new productQty();
//if($qtyCheck > 0) {
//    // Thêm hàng vào giỏ hàng
//    $addToCart = new addToCart($productID);
//
//    // Tính toán phí vận chuyển
//    $shipping = new shippingCharge();
//    $shipping->updateCharge();
//
//    // Tính toán tiền chiết khấu
//    $discount = new discount();
//    $discount->applyDiscount();
//
//    // Sinh đơn hàng
//    $order = new order();
//    $order->generateOrder();
//}

//Đoạn code trên hoạt động hoàn toàn bình thường, tuy nhiên chúng ta gọi đến quá nhiều các phương thức trong xử lý đơn hàng. Nếu như việc xử lý này ở nhiều nơi, thật khó khăn khi cần thay đổi tất cả những chỗ có code này. Facade Pattern giải quyết vấn đề này bằng cách đặt các lời gọi phương thức này vào trong một class Facade:

class productOrderFacade {
    public $productID = '';
    public function __construct($pID) {
        $this->productID = $pID;
    }
    public function generateOrder() {
        if($this->qtyCheck()) {
            // Thêm sản phẩm vào giỏ hàng
            $this->addToCart();

            // Tính toán phí vận chuyển
            $this->calulateShipping();

            // Tính toán tiền chiết khấu
            $this->applyDiscount();

            // Xác nhận đơn hàng
            $this->placeOrder();
        }
    }

    private function addToCart () {
        /* .. Thêm sản phẩm vào giỏ hàng ..  */
        echo 'add To Cart done ! <br>';
    }

    private function qtyCheck() {
        // Lấy số lượng sản phẩm từ cơ sở dữ liệu
        $qty = 100;

        if($qty > 0) {
            return true;
        } else {
            return false;
        }
    }

    private function calulateShipping() {
        echo 'calulateShipping <br>';
//        $shipping = new shippingCharge();
//        $shipping->calculateCharge();
    }

    private function applyDiscount() {
        echo 'applyDiscount <br>';
//        $discount = new discount();
//        $discount->applyDiscount();
    }

    private function placeOrder() {
        echo 'placeOrder <br>';
//        $order = new order();
//        $order->generateOrder();
    }
}

//Như vậy chúng ta đã có một class ProductOrder dạng Facade, chúng ta sẽ sử dụng nó ở những chỗ cần phát sinh đơn hàng:

$productID = 1;//$_GET['productId'];

// Chỉ cần hai dòng code thay cho rất nhiều dòng code xử lý đơn hàng cho những nơi cần xử lý đơn hàng
$order = new productOrderFacade($productID);
$order->generateOrder();

//Như đã nói ở trên, 2 dòng xử lý đơn hàng có thể đặt ở nhiều nơi, nếu quy trình xử lý đơn hàng thay đổi, chúng ta chỉ cần thay đổi trong class productOrderFacade.




