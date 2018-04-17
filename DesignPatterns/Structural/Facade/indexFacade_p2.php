<?php
//Chúng ta cùng xem ví dụ về các đoạn code sử dụng để chia sẻ lên các mạng xã hội như Facebook, Google Plus, Twiter…

// Class share gì đó lên Facebook
class Facebook {
    function share($status, $url) {
        echo ('Facebook:' . $status . ' from:' . $url);
    }
}

// Class share gì đó lên Google+.
class Google {
    function share($url) {
        echo ('Shared on Google+:' . $url);
    }
}

// Class tweet lên Twitter
class Twitter {
    function tweet($url, $title) {
        echo ('Tweet url:' . $url . ' title:' . $title);
    }
}

//Vấn đề là ở chỗ, khi chúng ta thực hiện share trên các mạng xã hội, chúng ta phải gọi rất nhiều các phương thức khác nhau từ các lớp khác nhau. Facade Pattern giúp giải quyết vấn đề này:

//    Facade cho phép gọi đến một phương thức duy nhất thay vì gọi quá nhiều các phương thức khác nhau, nó giúp đơn giản hóa hệ thống và có thể sử dụng các interface thuận lợi hơn.

//Để làm được việc này, Facade sử dụng một class ShareFacade và các class ở trên được truyền vào tham số của phương thức khởi tạo:

class ShareFacade {
    protected $facebook;
    protected $googleplus;
    protected $twitter;

    // Các đối tượng được truyền vào phương thức khởi tạo
    function __construct($facebookObj,$googleObj,$twitterObj) {
        $this->facebook= $facebookObj;
        $this->googleplus= $googleObj;
        $this->twitter= $twitterObj;
    }

    // Phương thức này thực hiện tất cả các yêu cầu chia sẻ lên mạng xã hội
    function share($url,$title,$status) {
        $this->facebook->share($status, $url);
        $this->googleplus->share($url);
        $this->twitter->tweet($url, $title);
    }
}

//Với việc nhóm các phương thức của các class vào class ShareFacade, mỗi khi cần thực hiện chia sẻ lên các mạng xã hội chúng ta chỉ đơn giản thực hiện như sau:

// Tạo đối tượng
$facebookObj = new Facebook();
$googleplusObj   = new Google();
$twitterObj  = new Twitter();

// Truyền các đối tượng này cho ShareFacade
$shareObj = new ShareFacade($facebookObj, $googleplusObj, $twitterObj);

// Gọi một phương thức để chia sẻ tất cả lên mạng xã hội
$shareObj->share('https://allaravel.com/facade-pattern-don-gian-trong-viet-code-php', 'Facade Pattern đơn giản trong viết code PHP', 'Pattern được dùng nhiều nhất trong lập trình hướng đối tượng');

//Ví dụ trên đã cho thấy thay vì chúng ta phải gọi 3 phương thức để chia sẻ nội dung lên mạng xã hội thì tất cả đã được gói vào trong một phương thức duy nhất. Như vậy việc viết code trở nên gọn gàng hơn rất nhiều. Chúng ta cùng đến với một ví dụ khác về quá trình mua hàng trên mạng, quá trình này bao gồm các bước:

//1. Thêm hàng vào giỏ hàng.
//2. Tính tiền vận chuyển hàng.
//3. Tính tiền chiết khấu.
//4. Sinh đơn bán hàng.

// Quá trình xử lý đơn hàng
$productID = $_GET['productId'];
$qtyCheck = new productQty();
if($qtyCheck->checkQty($productID) > 0) {
    // Thêm hàng vào giỏ hàng
    $addToCart = new addToCart($productID);

    // Tính toán phí vận chuyển
    $shipping = new shippingCharge();
    $shipping->updateCharge();

    // Tính toán tiền chiết khấu
    $discount = new discount();
    $discount->applyDiscount();

    // Sinh đơn hàng
    $order = new order();
    $order->generateOrder();
}

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
    }

    private function qtyCheck() {
        // Lấy số lượng sản phẩm từ cơ sở dữ liệu
        $qty = 100;

        if($qty > 0) {
            return true;
        } else {
            return true;
        }
    }

    private function calulateShipping() {
        $shipping = new shippingCharge();
        $shipping->calculateCharge();
    }

    private function applyDiscount() {
        $discount = new discount();
        $discount->applyDiscount();
    }

    private function placeOrder() {
        $order = new order();
        $order->generateOrder();
    }
}

//Như vậy chúng ta đã có một class ProductOrder dạng Facade, chúng ta sẽ sử dụng nó ở những chỗ cần phát sinh đơn hàng:

$productID = $_GET['productId'];

// Chỉ cần hai dòng code thay cho rất nhiều dòng code xử lý đơn hàng cho những nơi cần xử lý đơn hàng
$order = new productOrderFacade($productID);
$order->generateOrder();

//Như đã nói ở trên, 2 dòng xử lý đơn hàng có thể đặt ở nhiều nơi, nếu quy trình xử lý đơn hàng thay đổi, chúng ta chỉ cần thay đổi trong class productOrderFacade.