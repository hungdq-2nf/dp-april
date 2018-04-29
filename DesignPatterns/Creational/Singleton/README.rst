`Singleton`__
đơn nhất
=============

**THIS IS CONSIDERED TO BE AN ANTI-PATTERN! FOR BETTER TESTABILITY AND MAINTAINABILITY USE DEPENDENCY INJECTION!**

Purpose
-------

To have only one instance of this object in the application that will handle all calls.
_
Để chỉ có một cá thể của obj này trong ứng dụng mà sẽ xử lý tất cả các cuộc gọi.

Examples
--------

-  DB Connector
-  Logger (may also be a Multiton if there are many log files for several purposes)
-  Lock file for the application (there is only one in the filesystem ...)
_
- Trình kết nối DB
- Logger (cũng có thể là một Multiton nếu có nhiều log files cho nhiều mục đích)
- Lock file cho ứng dụng (chỉ có một tệp trong hệ thống tệp ...)

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Singleton UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

Singleton.php

.. literalinclude:: Singleton.php
   :language: php
   :linenos:

Test
----

Tests/SingletonTest.php

.. literalinclude:: Tests/SingletonTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Creational/Singleton
.. __: http://en.wikipedia.org/wiki/Singleton_pattern
