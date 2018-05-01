<?php

class fb {
    function share($status, $url) {
        echo 'FB: ' . $status . ' from:' . $url . '<br>';
    }
}

class gg {
    function share($url) {
        echo 'GG: ' . $url . '<br>';
    }
}

class tw {
    function tweet($url, $title) {
        echo 'TW: ' . $url . ', title:' . $title . '<br>';
    }
}

//Vấn đề là ở chỗ, khi chúng ta thực hiện share trên các mạng xã hội, chúng ta phải gọi rất nhiều các phương thức khác nhau từ các lớp khác nhau. Facade Pattern giúp giải quyết vấn đề này:

//    Facade cho phép gọi đến một phương thức duy nhất thay vì gọi quá nhiều các phương thức khác nhau, nó giúp đơn giản hóa hệ thống và có thể dùng các interface thuận lợi hơn.

//Để làm được việc này, Facade dùng một class ShareFacade và các class ở trên được truyền vào tham số của phương thức khởi tạo:

class ShareFacade {
    protected $fb;
    protected $gg;
    protected $tw;

    // Các obj được truyền vào phương thức khởi tạo
    function __construct($fbObj, $ggObj, $twObj) {
        $this->fb = $fbObj;
        $this->gg = $ggObj;
        $this->tw = $twObj;
    }

    // Phương thức này thực hiện tất cả các yêu cầu chia sẻ lên mạng xã hội
    function share($url, $title, $status) {
        $this->fb->share($status, $url);
        $this->gg->share($url);
        $this->tw->tweet($url, $title);
    }
}

//Với việc nhóm các phương thức của các class vào class ShareFacade, mỗi khi cần thực hiện chia sẻ lên các mạng xã hội chúng ta chỉ đơn giản thực hiện như sau:

// Tạo obj
$fbObj = new fb();
$ggObj = new gg();
$twObj = new tw();

// Truyền các obj này cho ShareFacade
$shareObj = new ShareFacade($fbObj, $ggObj, $twObj);

// Gọi một phương thức để chia sẻ tất cả lên mạng xã hội
$url1 = 'Url 1';
$title1 = 'Title 1';
$status1 = 'Status 1';
$shareObj->share($url1, $title1, $status1);

//Ví dụ trên đã cho thấy thay vì chúng ta phải gọi 3 phương thức để chia sẻ nội dung lên mạng xã hội thì tất cả đã được gói vào trong một phương thức duy nhất. Như vậy việc viết code trở nên gọn gàng hơn rất nhiều.


$url2 = 'Url 2';
$title2 = 'Title 2';
$status2 = 'Status 2';

echo '<br> - share riêng từng obj: <br>';
$fb = new fb();
echo '<br> + fb share: <br>';
$fb->share($status2, $url2);

$gg = new gg();
echo '<br> + gg share: <br>';
$gg->share($url2);

$tw = new tw();
echo '<br> + tw share: <br>';
$tw->tweet($url2, $title2);

echo '<br> - ShareFacade: <br>';
$shareFacade = new ShareFacade($fb, $gg, $tw);
$shareFacade->share($url2, $title2, $status2);


