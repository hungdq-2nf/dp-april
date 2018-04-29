`Builder`__
Thợ xây
===========

Purpose
-------

Builder is an interface that build parts of a complex object.
Sometimes, if the builder has a better knowledge of what it builds, this interface could be an abstract class with default methods (aka adapter).
If you have a complex inheritance tree for objects, it is logical to have a complex inheritance tree for builders too.
Note: Builders have often a fluent interface, see the mock builder of PHPUnit for example.
_
Builder là một interface xây dựng các phần của một obj phức tạp.
Đôi khi, nếu builder có kiến thức tốt hơn về những gì nó xây dựng, interface này có thể là một abstract class với các methods mặc định (còn gọi là adapter).
Nếu bạn có một cây thừa kế phức tạp cho các obj, nó là hợp lý để có một cây thừa kế phức tạp cho builders.
Lưu ý: Builders thường có interface thông thạo, xem ví dụ về trình xây dựng giả lập của PHPUnit.

Examples
--------

-  PHPUnit: Mock Builder

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Builder UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

Director.php

.. literalinclude:: Director.php
   :language: php
   :linenos:

BuilderInterface.php

.. literalinclude:: BuilderInterface.php
   :language: php
   :linenos:

TruckBuilder.php

.. literalinclude:: TruckBuilder.php
   :language: php
   :linenos:

CarBuilder.php

.. literalinclude:: CarBuilder.php
   :language: php
   :linenos:

Parts/Vehicle.php

.. literalinclude:: Parts/Vehicle.php
   :language: php
   :linenos:

Parts/Truck.php

.. literalinclude:: Parts/Truck.php
   :language: php
   :linenos:

Parts/Car.php

.. literalinclude:: Parts/Car.php
   :language: php
   :linenos:

Parts/Engine.php

.. literalinclude:: Parts/Engine.php
   :language: php
   :linenos:

Parts/Wheel.php

.. literalinclude:: Parts/Wheel.php
   :language: php
   :linenos:

Parts/Door.php

.. literalinclude:: Parts/Door.php
   :language: php
   :linenos:

Test
----

Tests/DirectorTest.php

.. literalinclude:: Tests/DirectorTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/Creational/Builder
.. __: http://en.wikipedia.org/wiki/Builder_pattern
