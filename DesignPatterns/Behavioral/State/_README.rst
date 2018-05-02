`State`__
Trạng thái
=========

Purpose
-------

Encapsulate varying behavior for the same routine based on an object's state. This can be a cleaner way for an object to change its behavior at runtime without resorting to large monolithic conditional statements.
_
Đóng gói hành vi khác nhau cho cùng một thói quen dựa trên trạng thái của một obj. Điều này có thể là một cách sạch hơn cho một obj để thay đổi hành vi của nó trong thời gian chạy mà không cần đến các câu lệnh điều kiện lớn nguyên khối.


Examples
--------

The State pattern allows an object to change its behavior when its internal state changes. This pattern can be observed in a vending machine. Vending machines have states based on the inventory, amount of currency deposited, the ability to make change, the item selected, etc. When currency is deposited and a selection is made, a vending machine will
either deliver a product and no change,
deliver a product and change,
deliver no product due to insufficient currency on deposit,
or deliver no product due to inventory depletion.
_
State pattern cho phép một obj thay đổi hành vi của nó khi trạng thái nội tại của nó thay đổi. Mẫu này có thể được quan sát thấy trong một máy bán hàng tự động. Máy bán hàng tự động có các trạng thái dựa trên hàng tồn kho, số lượng tiền gửi, khả năng thay đổi, mục được chọn, vv. Khi tiền tệ được gửi và lựa chọn được thực hiện, máy bán hàng tự động sẽ
hoặc cung cấp một sản phẩm và không thay đổi,
cung cấp một sản phẩm và thay đổi,
không phân phối sản phẩm do không đủ tiền gửi,
hoặc không cung cấp sản phẩm do cạn kiệt hàng tồn kho.

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt State UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

ContextOrder.php

.. literalinclude:: ContextOrder.php
   :language: php
   :linenos:

StateOrder.php

.. literalinclude:: StateOrder.php
   :language: php
   :linenos:

ShippingOrder.php

.. literalinclude:: ShippingOrder.php
   :language: php
   :linenos:

CreateOrder.php

.. literalinclude:: CreateOrder.php
   :language: php
   :linenos:

Test
----

Tests/StateTest.php

.. literalinclude:: Tests/StateTest.php
   :language: php
   :linenos:


.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Behavioral/State
.. __: http://en.wikipedia.org/wiki/State_pattern