`Factory Method`__
phương thức nhà máy
==================

Purpose
-------

The good point over the SimpleFactory is you can subclass it to implement different ways to create objects
For simple case, this abstract class could be just an interface
This pattern is a "real" Design Pattern because it achieves the "Dependency Inversion Principle" aka the "D" in S.O.L.I.D principles.
It means the FactoryMethod class depends on abstractions, not concrete classes. This is the real trick compared to SimpleFactory or StaticFactory.
_
Điểm tốt trên SimpleFactory là bạn có thể phân lớp nó để thực hiện các cách khác nhau để tạo ra các obj
Đối với trường hợp đơn giản, lớp trừu tượng này có thể chỉ là một interface
Mẫu này là DP "real" bởi vì nó đạt được "Dependency Inversion Principle" gọi là "D" trong nguyên tắc S.O.L.I.D.
Nó có nghĩa là lớp FactoryMethod phụ thuộc vào trừu tượng hóa, không phụ thuộc vào các lớp cụ thể. Đây là thủ thuật thực sự so với SimpleFactory hoặc StaticFactory.


Examples
--------

The Factory Method defines an interface for creating objects, but lets subclasses decide which classes to instantiate.
Injection molding presses demonstrate this pattern.
Manufacturers of plastic toys process plastic molding powder, and inject the plastic into molds of the desired shapes.
The class of toy (car, action figure, etc.) is determined by the mold.
_
Method Factory định nghĩa một giao diện để tạo các đối tượng, nhưng cho phép các lớp con quyết định lớp nào sẽ khởi tạo.
Ép phun ép chứng minh mô hình này.
Các nhà sản xuất đồ chơi bằng nhựa xử lý bột nhựa đúc, và tiêm nhựa vào khuôn mẫu của các hình dạng mong muốn.
Lớp của đồ chơi (ô tô, con số hành động, vv) được xác định bởi khuôn.


UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt FactoryMethod UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

FactoryMethod.php

.. literalinclude:: FactoryMethod.php
   :language: php
   :linenos:

ItalianFactory.php

.. literalinclude:: ItalianFactory.php
   :language: php
   :linenos:

GermanFactory.php

.. literalinclude:: GermanFactory.php
   :language: php
   :linenos:

VehicleInterface.php

.. literalinclude:: VehicleInterface.php
   :language: php
   :linenos:

CarMercedes.php

.. literalinclude:: CarMercedes.php
   :language: php
   :linenos:

CarFerrari.php

.. literalinclude:: CarFerrari.php
   :language: php
   :linenos:

Bicycle.php

.. literalinclude:: Bicycle.php
   :language: php
   :linenos:

Test
----

Tests/FactoryMethodTest.php

.. literalinclude:: Tests/FactoryMethodTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Creational/FactoryMethod
.. __: http://en.wikipedia.org/wiki/Factory_method_pattern
