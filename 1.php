<h1>CVE-2016-7478—REMOTE DENIAL OF SERVICE</h1>
<p>The first vulnerability allows a remote attacker to unserialize a pathological exception object which refers to itself as the
previous exception. When invoking the __toString method of this exception, the code iterates over the chain of exceptions.
As the chain of exceptions consists of just that one object that points to itself, the iteration never terminates.
This object is created by passing the following string to unserialize: </p>

<p>
This causes unserialize to instantiate an exception object with the Exceptionprevious property set to the first unserialized
value—the exception object itself
</p>

<p>
  Result : tested infinite loop
</p>

<?php

echo unserialize('O:9:"exception":1:{S:19:"\00Exception\00previous";r:1;}' );
