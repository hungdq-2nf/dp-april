`Dependency Injection`__
Tiêm phụ thuộc
========================

Purpose
-------

To implement a loosely coupled architecture in order to get better testable, maintainable and extendable code.
_
Để triển khai kiến trúc được ghép lỏng lẻo để có được mã có thể kiểm tra, bảo trì và có thể mở rộng tốt hơn.

Usage
-----

``DatabaseConfiguration`` gets injected and ``DatabaseConnection`` will get all that it needs from ``$config``. Without DI, the configuration would be created directly in ``DatabaseConnection``, which is not very good for testing and extending it.
_
``DatabaseConfiguration`` được tiêm và ``DatabaseConnection`` sẽ nhận được tất cả những gì cần từ ``$config``. Nếu không có DI, cấu hình sẽ được tạo trực tiếp trong ``DatabaseConnection``, điều này không tốt để test và mở rộng nó.

Examples
--------

-  The Doctrine2 ORM uses dependency injection e.g. for configuration that is injected into a ``Connection`` object. For testing purposes, one can easily create a mock object of the configuration and inject that into the ``Connection`` object
-  Symfony and Zend Framework 2 already have containers for DI that create objects via a configuration array and inject them where needed (i.e. in Controllers)
_
- Doctrine2 ORM dùng tiêm phụ thuộc, ví dụ: cho cấu hình được tiêm vào obj ``Connection``. Đối với mục đích thử nghiệm, người ta có thể dễ dàng tạo ra một obj giả định của cấu hình và tiêm vào obj ``Connection``
- Symfony và Zend Framework 2 đã có các thùng chứa cho DI để tạo các obj thông qua một mảng cấu hình và đưa chúng vào nơi cần thiết (tức là trong Controllers)

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt DependencyInjection UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

DatabaseConfiguration.php

.. literalinclude:: DatabaseConfiguration.php
   :language: php
   :linenos:

DatabaseConnection.php

.. literalinclude:: DatabaseConnection.php
   :language: php
   :linenos:

Test
----

Tests/DependencyInjectionTest.php

.. literalinclude:: Tests/DependencyInjectionTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Structural/DependencyInjection
.. __: http://en.wikipedia.org/wiki/Dependency_injection
