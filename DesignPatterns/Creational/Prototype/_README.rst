`Prototype`__
khuôn mẫu (tạo obj mới từ việc sao chép mẫu obj cũ)
=============

Purpose
-------

To avoid the cost of creating objects the standard way (new Foo()) and instead create a prototype and clone it.
_
Để tránh chi phí của việc tạo ra các obj theo cách tiêu chuẩn (new Foo ()) và thay vào đó tạo ra một nguyên mẫu và sao chép nó.


Examples
--------

-  Large amounts of data (e.g. create 1,000,000 rows in a database at once via a ORM).
_
- Số lượng lớn dữ liệu (ví dụ: tạo 1.000.000 hàng trong cơ sở dữ liệu cùng một lúc thông qua ORM).

--
The Prototype pattern specifies the kind of objects to create using a prototypical instance.
Prototypes of new products are often built prior to full production, but in this example, the prototype is passive and does not participate in copying itself.
The mitotic division of a cell - resulting in two identical cells - is an example of a prototype that plays an active role in copying itself and thus, demonstrates the Prototype pattern.
When a cell splits, two cells of identical genotype result.
In other words, the cell clones itself.
_
Mẫu Prototype chỉ định loại đối tượng cần tạo bằng cách sử dụng một cá thể nguyên mẫu.
Nguyên mẫu của sản phẩm mới thường được xây dựng trước khi sản xuất đầy đủ, nhưng trong ví dụ này, nguyên mẫu là thụ động và không tham gia sao chép chính nó.
Việc phân chia phân bào của một tế bào - kết quả là hai tế bào giống hệt nhau - là một ví dụ về một nguyên mẫu mà đóng một vai trò tích cực trong việc sao chép chính nó và do đó, chứng tỏ mô hình thử nghiệm.
Khi chia tế bào, hai tế bào của kết quả kiểu gen giống hệt nhau.
Nói cách khác, các tế bào nhân bản chính nó.


UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Prototype UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

BookPrototype.php

.. literalinclude:: BookPrototype.php
   :language: php
   :linenos:

BarBookPrototype.php

.. literalinclude:: BarBookPrototype.php
   :language: php
   :linenos:

FooBookPrototype.php

.. literalinclude:: FooBookPrototype.php
   :language: php
   :linenos:

Test
----

Tests/PrototypeTest.php

.. literalinclude:: Tests/PrototypeTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Creational/Prototype
.. __: http://en.wikipedia.org/wiki/Prototype_pattern
