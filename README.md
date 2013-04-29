shufflecrypt
============

A simple password encryptor.

How to use
----------
Start by creating a hash. You will need to store this somewhere. Best to do this in a setup/configuration wizard, else have a script in your codebase that you can run to generate a hash.
    $hash=shufflecrypt("generatehash");

You can also store it in your codebase, not recommended, but in your configuration, it'll need to look something like this...
    $hash="RElLIyJYRlA6VWsuMVdwTF1ZLyp6SGVxQV4mbm89NWx1ZkoyU35UUVo5MzdfRz9PZytNMCFDVidqOyg4JTZpeXdbQnZ7dH1iQD48LVJyaCRgc3hkRSx8YylOYVw0bQ==";

To encrypt a string, pass the action "encrypt", the string as the 2nd variable and your has as the 3rd...
    $encrypted=shufflecrypt("encrypt","helloworld",$hash);
The returned variable will be the encrypted or hashed password.

To decrypt, pass the action "decrypt", the encrypted password and your hash...
    echo shufflecrypt("decrypt",$encrypted,$hash);


Couldn't be easier!
