# f-kbyte-rex

Imagine you have a collection of objects somewhere on your API endpoint, and you want to give your customer an option to
paginate through them. 

The problem is, you load each of those collections from individual repositories, each time with their own offsets and limits. 
But your customer shouldn't care - he wants to simply provide and offset and a limit for each request, and reveive those objects
by chunks, without distinguishing them from each other.

This script solves this issue. You provide a collection (what's inside is not important, what is important is their individual 
count), an offsert, and a limit, and receive an array that shows how many objects from each collection is to be loaded.
