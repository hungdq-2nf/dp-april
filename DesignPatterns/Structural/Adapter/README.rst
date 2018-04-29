`Adapter / Wrapper`__
Bộ chuyển đổi / Vỏ bọc
=====================

Purpose
-------

To translate one interface for a class into a compatible interface. An adapter allows classes to work together that normally could not because of incompatible interfaces by providing its interface to clients while using the original interface.
_
Để dịch một interface cho một lớp thành một interface tương thích. Một adapter cho phép các lớp làm việc cùng nhau mà bình thường thì không thể vì các interface không tương thích bằng cách cung cấp interface của nó cho các client trong khi dùng interface gốc.

Examples
--------

-  DB Client libraries adapter
-  using multiple different webservices and adapters normalize data so that the outcome is the same for all
_
- Bộ chuyển đổi thư viện Client DB
- Dùng nhiều webservices và adapters khác nhau để chuẩn hóa dữ liệu để kết quả giống nhau cho tất cả

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Adapter UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

BookInterface.php

.. literalinclude:: BookInterface.php
   :language: php
   :linenos:

Book.php

.. literalinclude:: Book.php
   :language: php
   :linenos:

EBookAdapter.php

.. literalinclude:: EBookAdapter.php
   :language: php
   :linenos:

EBookInterface.php

.. literalinclude:: EBookInterface.php
   :language: php
   :linenos:

Kindle.php

.. literalinclude:: Kindle.php
   :language: php
   :linenos:

Test
----

Tests/AdapterTest.php

.. literalinclude:: Tests/AdapterTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Structural/Adapter
.. __: http://en.wikipedia.org/wiki/Adapter_pattern
