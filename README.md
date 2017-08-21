phpSyntaxTree
=============

phpSyntaxTree is a web application that creates syntax tree graphs 
from phrases entered in labelled bracket notation. phpSyntaxTree 
generated graphs can be used in linguistic homework, assignments 
and other documents.

See the COPYING file for license information.

phpSyntaxTree can be used on the web, without installing any 
software at <http://ironcreek.net/phpsyntaxtree>.

Local Installation
==================

If you prefer to run phpSyntaxTree locally, or on your own server,
simply follow the instructions below.

Requirements
------------

- Web server with support for .htaccess overwritable mime types
  like Apache 1.3/2.0 (<http://httpd.apache.org/>)

- PHP 4.3+ (PHP 5 not yet tested, but should work) with support
  for the GD library and TrueType font support (<http://php.net>)

Installation
------------

Unpack the archive into a suitable directory on your web server.
Be sure that the directory is configured to allow configuration
overwrites using a .htaccess file.

Change the permissions on the phpsyntaxtree/var/ directory to be
writable by the web server user (ex. apache, nobody, or similar).
phpSyntaxTree will create a counter.dat and a phpst.log file there
as well as other temporary files.

Support, Questions etc.
=======================

If you encounter any bugs or problems, please file a bug report
on the phpSyntaxTree project page:
<http://code.google.com/p/phpsyntaxtree>

Or, send email to andre@ironcreek.net
