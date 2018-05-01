`Observer`__
Người quan sát
============

Purpose
-------

To implement a publish/subscribe behaviour to an object, whenever a "Subject" object changes its state, the attached "Observers" will be notified. It is used to shorten the amount of coupled objects and uses loose coupling instead.
_
Để thực hiện hành vi xuất bản/đăng ký obj, bất cứ khi nào obj "Subject" thay đổi trạng thái của nó, các "Observers" được đính kèm sẽ được thông báo. Nó được dùng để rút ngắn số lượng các obj kết hợp và dùng khớp nối lỏng để thay thế.

Examples
--------

-  a message queue system is observed to show the progress of a job in a GUI
_
một hệ thống hàng đợi tin nhắn được quan sát để hiển thị tiến độ của một công việc trong một GUI

--
The Observer defines a one-to-many relationship so that when one object changes state, the others are notified and updated automatically.
Some auctions demonstrate this pattern.
Each bidder possesses a numbered paddle that is used to indicate a bid.
The auctioneer starts the bidding, and "observes" when a paddle is raised to accept the bid.
The acceptance of the bid changes the bid price which is broadcast to all of the bidders in the form of a new bid.
_
Observer định nghĩa một mối quan hệ một-nhiều để khi một đối tượng thay đổi trạng thái, các đối tượng khác được thông báo và cập nhật tự động.
Một số phiên đấu giá thể hiện mô hình này.
Mỗi nhà thầu có một mái chèo được đánh số được sử dụng để biểu thị giá thầu.
Người đấu giá bắt đầu đặt giá thầu và "quan sát" khi một mái chèo được nâng lên để chấp nhận giá thầu.
Việc chấp nhận giá thầu thay đổi giá dự thầu được phát cho tất cả các nhà thầu dưới hình thức một giá thầu mới.


Note
----

PHP already defines two interfaces that can help to implement this pattern: SplObserver and SplSubject.
_
PHP đã định nghĩa hai interface có thể giúp thực hiện mẫu này: SplObserver và SplSubject.

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Observer UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

User.php

.. literalinclude:: User.php
   :language: php
   :linenos:

UserObserver.php

.. literalinclude:: UserObserver.php
   :language: php
   :linenos:

Test
----

Tests/ObserverTest.php

.. literalinclude:: Tests/ObserverTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Behavioral/Observer
.. __: http://en.wikipedia.org/wiki/Observer_pattern
