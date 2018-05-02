`Decorator`__
Trình trang trí
=============

Purpose
-------

To dynamically add new functionality to class instances.
_
Để tự động thêm chức năng mới vào các cá thể lớp.

Examples
--------

-  Zend Framework: decorators for ``Zend_Form_Element`` instances
-  Web Service Layer: Decorators JSON and XML for a REST service (in this case, only one of these should be allowed of course)
_
- Zend: decorators cho các cá thể ``Zend_Form_Element``
- Web Service Layer: Decorators JSON và XML cho một dịch vụ REST (trong trường hợp này, chỉ một trong những dịch vụ này phải được cho phép)

--
The Decorator attaches additional responsibilities to an object dynamically. The ornaments that are added to pine or fir trees are examples of Decorators. Lights, garland, candy canes, glass ornaments, etc., can be added to a tree to give it a festive look. The ornaments do not change the tree itself which is recognizable as a Christmas tree regardless of particular ornaments used. As an example of additional functionality, the addition of lights allows one to "light up" a Christmas tree.
Another example: assault gun is a deadly weapon on it's own. But you can apply certain "decorations" to make it more accurate, silent and devastating.
_
Decorator đính kèm thêm trách nhiệm cho một đối tượng động. Các đồ trang trí được thêm vào cây thông hoặc cây thông là những ví dụ về trang trí. Đèn, vòng hoa, gậy kẹo, đồ trang trí thủy tinh, vv, có thể được thêm vào một cái cây để mang lại cho nó một cái nhìn lễ hội. Các đồ trang trí không thay đổi chính cây mà có thể nhận ra như một cây thông Noel, bất kể các đồ trang trí cụ thể được sử dụng. Như một ví dụ về chức năng bổ sung, việc bổ sung thêm ánh sáng cho phép người ta “thắp sáng” một cây thông Noel.
Một ví dụ khác: súng tấn công là vũ khí chết người trên chính nó. Nhưng bạn có thể áp dụng một số "đồ trang trí" để làm cho nó chính xác hơn, im lặng và tàn phá.


UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Decorator UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

RenderableInterface.php

.. literalinclude:: RenderableInterface.php
   :language: php
   :linenos:

Webservice.php

.. literalinclude:: Webservice.php
   :language: php
   :linenos:

RendererDecorator.php

.. literalinclude:: RendererDecorator.php
   :language: php
   :linenos:

XmlRenderer.php

.. literalinclude:: XmlRenderer.php
   :language: php
   :linenos:

JsonRenderer.php

.. literalinclude:: JsonRenderer.php
   :language: php
   :linenos:

Test
----

Tests/DecoratorTest.php

.. literalinclude:: Tests/DecoratorTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Structural/Decorator
.. __: http://en.wikipedia.org/wiki/Decorator_pattern
