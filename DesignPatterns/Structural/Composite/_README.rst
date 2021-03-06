`Composite`__
Hỗn hợp
=============

Purpose
-------

To treat a group of objects the same way as a single instance of the object.
_
Để xử lý một nhóm các obj giống như một cá thể của obj.

Examples
--------

-  a form class instance handles all its form elements like a single instance of the form, when ``render()`` is called, it subsequently runs through all its child elements and calls ``render()`` on them
-  ``Zend_Config``: a tree of configuration options, each one is a ``Zend_Config`` object itself
_
- một thể hiện của lớp biểu mẫu xử lý tất cả các phần tử biểu mẫu của nó giống như một cá thể của biểu mẫu, khi ``render()`` cha được gọi, sau đó nó chạy qua tất cả các phần tử con của nó và gọi ``render()`` con trên chúng (từ các class con)
- ``Zend_Config``: một cây các tùy chọn cấu hình, mỗi cái là một obj ``Zend_Config``

--
The Composite composes objects into tree structures and lets clients treat individual objects and compositions uniformly. Although the example is abstract, arithmetic expressions are Composites. An arithmetic expression consists of an operand, an operator (+ - * /), and another operand. The operand can be a number, or another arithmetic expression. Thus, 2 + 3 and (2 + 3) + (4 * 6) are both valid expressions.
_
Composite tổng hợp các đối tượng thành các cấu trúc cây và cho phép khách hàng xử lý các đối tượng và bố cục riêng lẻ một cách thống nhất. Mặc dù ví dụ là trừu tượng, các biểu thức số học là các Composites. Biểu thức số học bao gồm toán hạng, toán tử (+ - * /) và toán hạng khác. Toán hạng có thể là một số hoặc biểu thức số học khác. Như vậy, 2 + 3 và (2 + 3) + (4 * 6) là cả hai biểu thức hợp lệ.


UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Composite UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

RenderableInterface.php

.. literalinclude:: RenderableInterface.php
   :language: php
   :linenos:

Form.php

.. literalinclude:: Form.php
   :language: php
   :linenos:

InputElement.php

.. literalinclude:: InputElement.php
   :language: php
   :linenos:

TextElement.php

.. literalinclude:: TextElement.php
   :language: php
   :linenos:

Test
----

Tests/CompositeTest.php

.. literalinclude:: Tests/CompositeTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Structural/Composite
.. __: http://en.wikipedia.org/wiki/Composite_pattern
