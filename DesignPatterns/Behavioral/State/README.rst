`State`__
Trạng thái
=========

Purpose
-------

Encapsulate varying behavior for the same routine based on an object's state. This can be a cleaner way for an object to change its behavior at runtime without resorting to large monolithic conditional statements.
_
Đóng gói hành vi khác nhau cho cùng một thói quen dựa trên trạng thái của một obj. Điều này có thể là một cách sạch hơn cho một obj để thay đổi hành vi của nó trong thời gian chạy mà không cần đến các câu lệnh điều kiện lớn nguyên khối.

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