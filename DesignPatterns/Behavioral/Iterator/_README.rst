`Iterator`__
bộ lặp
============

Purpose
-------

To make an object iterable and to make it appear like a collection of objects.
_
Để tạo một obj có thể lặp lại và làm cho nó xuất hiện như một bộ sưu tập obj.

Examples
--------

-  to process a file line by line by just running over all lines (which have an object representation) for a file (which of course is an object, too)
_
để xử lý một dòng file bằng dòng chỉ bằng cách chạy trên tất cả các dòng (trong đó có một đại diện obj) cho một file (mà tất nhiên là một obj, cũng vậy)

--
The Iterator provides ways to access elements of an aggregate object sequentially without exposing the underlying structure of the object.
Files are aggregate objects. In office settings where access to files is made through administrative or secretarial staff, the Iterator pattern is demonstrated with the secretary acting as the Iterator.
Several television comedy skits have been developed around the premise of an executive trying to understand the secretary's filing system.
To the executive, the filing system is confusing and illogical, but the secretary is able to access files quickly and efficiently.

On early television sets, a dial was used to change channels.
When channel surfing, the viewer was required to move the dial through each channel position, regardless of whether or not that channel had reception.
On modern television sets, a next and previous button are used.
When the viewer selects the "next" button, the next tuned channel will be displayed.
Consider watching television in a hotel room in a strange city.
When surfing through channels, the channel number is not important, but the programming is.
If the programming on one channel is not of interest, the viewer can request the next channel, without knowing its number.
_
Iterator cung cấp các cách để truy cập các phần tử của một đối tượng tổng hợp tuần tự mà không để lộ cấu trúc bên dưới của đối tượng.
Tệp là các đối tượng tổng hợp. Trong thiết lập văn phòng nơi truy cập vào các tập tin được thực hiện thông qua nhân viên hành chính hoặc thư ký, mẫu Iterator được thể hiện với thư ký hoạt động như Iterator.
Một số phim hài truyền hình đã được phát triển xung quanh tiền đề của một nhà điều hành cố gắng hiểu hệ thống nộp đơn của thư ký.
Đối với các giám đốc điều hành, hệ thống nộp đơn là khó hiểu và phi lý, nhưng thư ký có thể truy cập các tập tin một cách nhanh chóng và hiệu quả.

Trên các thiết bị truyền hình ban đầu, một quay số được sử dụng để thay đổi kênh.
Khi lướt kênh, người xem được yêu cầu di chuyển quay số qua từng vị trí kênh, bất kể kênh đó có tiếp nhận hay không.
Trên các bộ truyền hình hiện đại, một nút tiếp theo và trước đó được sử dụng.
Khi người xem chọn nút "tiếp theo", kênh được điều chỉnh tiếp theo sẽ được hiển thị.
Xem xét xem truyền hình trong một căn phòng khách sạn ở một thành phố xa lạ.
Khi lướt qua các kênh, số kênh không quan trọng, nhưng lập trình là.
Nếu chương trình trên một kênh không quan tâm, người xem có thể yêu cầu kênh tiếp theo mà không biết số của kênh đó.


Note
----

Standard PHP Library (SPL) defines an interface Iterator which is best suited for this! Often you would want to implement the Countable interface too, to allow ``count($object)`` on your iterable object
_ Thư viện PHP chuẩn (SPL) định nghĩa một Iterator interface phù hợp nhất cho việc này! Thường thì bạn cũng muốn thực hiện interface Countable, để cho phép ``count($ object)`` trên obj có thể lặp của bạn

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Iterator UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

Book.php

.. literalinclude:: Book.php
   :language: php
   :linenos:

BookList.php

.. literalinclude:: BookList.php
   :language: php
   :linenos:

Test
----

Tests/IteratorTest.php

.. literalinclude:: Tests/IteratorTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Behavioral/Iterator
.. __: http://en.wikipedia.org/wiki/Iterator_pattern
