`Service Locator`__
Thùng chứ dịch vụ
===================

**THIS IS CONSIDERED TO BE AN ANTI-PATTERN!**

Service Locator is considered for some people an anti-pattern. It violates the Dependency Inversion principle.
Service Locator hides class' dependencies instead of exposing them as you would do using the Dependency Injection. In case of changes of those dependencies you risk to break the functionality of classes which are using them, making your system difficult to maintain.
_
Service Locator được xem xét cho một số người một anti-pattern. Nó vi phạm nguyên tắc Dependency Inversion.
Service Locator ẩn phụ thuộc của lớp thay vì trưng ra chúng như bạn dùng Dependency Injection. Trong trường hợp thay đổi những phụ thuộc đó, bạn có nguy cơ phá vỡ chức năng của các lớp đang dùng chúng, làm cho hệ thống của bạn khó duy trì.

Purpose
-------

To implement a loosely coupled architecture in order to get better testable, maintainable and extendable code. DI pattern and Service Locator pattern are an implementation of the Inverse of Control pattern.
_
Để triển khai kiến trúc kết hợp lỏng lẻo để có được mã có thể kiểm tra, bảo trì và có thể mở rộng tốt hơn. Mẫu DI và mẫu Service Locator làm việc triển khai mẫu Inverse of Control (Đảo ngược của điều khiển).

Usage
-----

With ``ServiceLocator`` you can register a service for a given interface. By using the interface you can retrieve the service and use it in the classes of the application without knowing its implementation. You can configure and inject the Service Locator object on bootstrap.
_
Với ``ServiceLocator`` bạn có thể đăng ký một dịch vụ cho một interface cụ thể. Bằng cách dùng interface, bạn có thể truy xuất dịch vụ và dùng nó trong các lớp của ứng dụng mà không biết việc thực hiện nó. Bạn có thể cấu hình và tiêm obj Service Locator trên bootstrap.

Examples
--------

-  Zend Framework 2 uses Service Locator to create and share services used in the framework(i.e. EventManager, ModuleManager, all custom user services provided by modules, etc...)
_
- Zend Framework 2 dùng Service Locator để tạo và chia sẻ các dịch vụ được dùng trong khung công tác (tức là EventManager, ModuleManager, tất cả các dịch vụ người dùng tùy chỉnh được cung cấp bởi các mô-đun, ..)

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt ServiceLocator UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

ServiceLocator.php

.. literalinclude:: ServiceLocator.php
   :language: php
   :linenos:

LogService.php

.. literalinclude:: LogService.php
   :language: php
   :linenos:

Test
----

Tests/ServiceLocatorTest.php

.. literalinclude:: Tests/ServiceLocatorTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/More/ServiceLocator
.. __: http://en.wikipedia.org/wiki/Service_locator_pattern
