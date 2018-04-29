`Strategy`__
Chiến lược
============

Terminology:
------------

-  Context
-  Strategy
-  Concrete Strategy

Purpose
-------

To separate strategies and to enable fast switching between them. Also this pattern is a good alternative to inheritance (instead of having an abstract class that is extended).
_
Để tách các chiến lược và cho phép chuyển đổi nhanh giữa chúng. Ngoài ra mô hình này là một lựa chọn tốt để thừa kế (thay vì có một abstract class được mở rộng).

Examples
--------

-  sorting a list of objects, one strategy by date, the other by id
-  simplify unit testing: e.g. switching between file and in-memory storage
_
- sắp xếp danh sách các obj, một chiến lược theo ngày, cái khác theo id
- đơn giản hóa việc unit testing: ví dụ: chuyển đổi giữa tệp và lưu trữ trong bộ nhớ

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Strategy UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

Context.php

.. literalinclude:: Context.php
   :language: php
   :linenos:

ComparatorInterface.php

.. literalinclude:: ComparatorInterface.php
   :language: php
   :linenos:

DateComparator.php

.. literalinclude:: DateComparator.php
   :language: php
   :linenos:

IdComparator.php

.. literalinclude:: IdComparator.php
   :language: php
   :linenos:

Test
----

Tests/StrategyTest.php

.. literalinclude:: Tests/StrategyTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Behavioral/Strategy
.. __: http://en.wikipedia.org/wiki/Strategy_pattern