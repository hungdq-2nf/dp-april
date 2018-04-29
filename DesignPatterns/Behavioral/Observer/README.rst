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
