<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class EnvirontmenTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_env()
    {
        $youtube = env('YOUTUBE');

        assertEquals('Me Nadz', $youtube);
    }
}
