<?php
//Chúng ta cùng xem ví dụ về các đoạn code sử dụng để chia sẻ lên các mạng xã hội như Facebook, Google Plus, Twiter…

// Class share gì đó lên Facebook
class Facebook {
    function share($status, $url) {
        echo 'Facebook: ' . $status . ' from:' . $url . '<br>';
    }
}

// Class share gì đó lên Google+.
class Google {
    function share($url) {
        echo 'Google+: ' . $url . '<br>';
    }
}

// Class tweet lên Twitter
class Twitter {
    function tweet($url, $title) {
        echo 'Tweet: ' . $url . ', title:' . $title . '<br>';
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
$shareObj->share('url 1', 'Title 1', 'Status 1');

//Ví dụ trên đã cho thấy thay vì chúng ta phải gọi 3 phương thức để chia sẻ nội dung lên mạng xã hội thì tất cả đã được gói vào trong một phương thức duy nhất. Như vậy việc viết code trở nên gọn gàng hơn rất nhiều.

echo '<br> - <br>';
$fb = new Facebook();
$fb->share('status fb', 'url fb');

$gg = new Google();
$gg->share('url gg');

$tw = new Twitter();
$tw->tweet('url tw', 'title tw');

echo '<br><br> ShareFacade <br>';
$shareFacade = new ShareFacade($fb, $gg, $tw);
$shareFacade->share('url 2', 'title 2', 'status 2');


