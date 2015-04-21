shufflecrypt
============

A simple password encryptor.

How to use
----------
Start by creating a hash. You will need to store this somewhere. 

    $hash=shufflecrypt("generatehash");

To encrypt a string, pass the action "encrypt", the string as the 2nd variable and your hash as the 3rd...

    $encrypted=shufflecrypt("encrypt","helloworld",$hash);
    
`$encrypted` will now hold an encrypted shufflecrypt key.

To decrypt, pass the action "decrypt", a shufflecrypt key and recall the hash into a variable, either from your configuration, a database connection or end user input then pass it as the 3rd parameter to the shufflecrypt function.

    $decrypted_string = shufflecrypt("decrypt",$encrypted,$hash);


The variable `$decrypted_string` will now hold the clear-text string.

Couldn't be easier!

Implementing
----------
In your setup or install process, generate a new hash then store this in your preferences or in the config file. You'll need this key to remain consistent throughout the use of your scripts or application. Changing this key will result in all keys becoming invalidated and decryption attempts failing.

When you're saving information to a database, run shufflescript as an encrypt before storing to secure values, then when retrieving, reverse the process by decrypting the values returned from your database.

You can also store a hash in your codebase as part of your functions. We don't recommended this method as all installations will have the same hash. Our suggestion is to generate a hash for each installation as part of your setup or install process and keep it in your configuration.

Warnings and Notices
----------
Shufflecrypt, true to its name shuffles your values and 'crypts' them to make them indistinguishable as their normal self. While it is a form of encryption, its level of encryption is quite low. It will stop people being able to retrieve data easilly, but there are ways of reversing the encryption - especially if the hash is common knowledge. Each generation of a hash is unique, resulting in no two hashes that are alike.

License
----------
At i3network, we like to make simple licenses. The terms for using this function are as follows.
You're allowed to use it provided...
*   You leave the header of the file intact.
*   You send a quick email to team@i3network.net or tweet @i3network to let us know you're using it

Other than that, feel free to fork the project, make it better or provide feedback.
    
