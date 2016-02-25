This is a fork of [Paul Butler](https://github.com/paulgb/simplediff) simplediff algorithm. 

He implemented it as plain php functions, and we needed it to be in a class and namespaced.

**simplediff** is an implementation of a diff function similar to Ratcliff/Metzener<sup>1</sup>

It's not the fastest diff algorithm, but it's simple enough to understand in an afternoon. That said, it's been in use for five years and I've never heard a complaint about performance. There are now four implementations (Python, CoffeeScript, JavaScript, and PHP), all mostly sharing the same interface.

The PHP code for the algorithm was written by Paul Butler in 2007 respectively.

PHP fix contributed by multiwebinc, 2013.

1. [Pattern Matching: The Gestalt Approach](http://collaboration.cmc.ec.gc.ca/science/rpn/biblio/ddj/Website/articles/DDJ/1988/8807/8807c/8807c.htm)
