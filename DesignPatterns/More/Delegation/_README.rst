`Delegation`__
phái đoàn (ủy nhiệm)
==============

Purpose
-------

Demonstrate the Delegator pattern, where an object, instead of performing one of its stated tasks, delegates that task to an associated helper object. In this case TeamLead professes to writeCode and Usage uses this, while TeamLead delegates writeCode to JuniorDeveloper's writeBadCode function. This inverts the responsibility so that Usage is unknowingly executing writeBadCode.
_
Trình diễn mẫu Delegator, trong đó một obj, thay vì thực hiện một trong các nhiệm vụ đã nêu của nó, ủy nhiệm nhiệm vụ đó cho một obj trợ giúp liên quan. Trong trường hợp này, TeamLead tuyên bố writeCode và Usage dùng điều này, trong khi TeamLead ủy quyền writeCode thành hàm writeBadCode của JuniorDeveloper. Điều này đảo ngược trách nhiệm nên Cách dùng vô tình thực hiện writeBadCode.

Examples
--------

Please review JuniorDeveloper.php, TeamLead.php, and then Usage.php to see it all tied together.
_
Vui lòng xem lại JuniorDeveloper.php, TeamLead.php và Usage.php để xem tất cả được gắn với nhau.

UML Diagram
-----------

.. image:: uml/uml.png
   :alt: Alt Delegation UML Diagram
   :align: center

Code
----

You can also find this code on `GitHub`_

TeamLead.php

.. literalinclude:: TeamLead.php
   :language: php
   :linenos:

JuniorDeveloper.php

.. literalinclude:: JuniorDeveloper.php
   :language: php
   :linenos:

Test
----

Tests/DelegationTest.php

.. literalinclude:: Tests/DelegationTest.php
   :language: php
   :linenos:

.. _`GitHub`: https://github.com/domnikl/DesignPatternsPHP/tree/master/More/Delegation
.. __: http://en.wikipedia.org/wiki/Delegation_pattern
