<?php
namespace IdentSpace\Ticky\Http\Controllers;

class SyncController
{
    static public function pull()
    {
        // Lastsync
        // GET Records
        // GET Customers
        // ...
        // GET Projects
        // GET AUDI OF Deleted
    }

    static public function push()
    {
        // POST Records
        // if Array, for each
        // try catch
        // insert/update
        // catch, add id to errors
    }
}