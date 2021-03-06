<?php

namespace OpenAPI\Client;

// test object serializer
class ObjectSerializerTest extends \PHPUnit_Framework_TestCase
{
    // test sanitizeFilename
    public function testSanitizeFilename()
    {
        // initialize the API client
        $s = new ObjectSerializer();

        $this->assertSame("sun.gif", $s->sanitizeFilename("sun.gif"));
        $this->assertSame("sun.gif", $s->sanitizeFilename("../sun.gif"));
        $this->assertSame("sun.gif", $s->sanitizeFilename("/var/tmp/sun.gif"));
        $this->assertSame("sun.gif", $s->sanitizeFilename("./sun.gif"));
        
        $this->assertSame("sun", $s->sanitizeFilename("sun"));
        $this->assertSame("sun.gif", $s->sanitizeFilename("..\sun.gif"));
        $this->assertSame("sun.gif", $s->sanitizeFilename("\var\tmp\sun.gif"));
        $this->assertSame("sun.gif", $s->sanitizeFilename("c:\var\tmp\sun.gif"));
        $this->assertSame("sun.gif", $s->sanitizeFilename(".\sun.gif"));
    }
}
