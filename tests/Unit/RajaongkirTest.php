<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Symfony\Component\HttpFoundation\Response;
use Tests\CreatesApplication;
use Tests\TestCase;


class RajaongkirTest extends TestCase
{

    public function test_getProvinces(){

       $response = $this->get('/api/search/provinces?id=2');
        $response->assertStatus(Response::HTTP_OK);



    }
    public function test_getCities(){

        $response = $this->get('/api/search/cities?id=2');
         $response->assertStatus(Response::HTTP_OK);



     }
}
