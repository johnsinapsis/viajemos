<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\History;

class HistoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateHistory()
    {
        $history = factory(History::class)->make();
        $response = $this->json('POST','/history',[
            'city_id' => $history->city_id, 
            'humedity' => $history->humedity, 
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id', 'humedity','created_at','updated_at']);
            $this->assertDatabaseHas('stories',[
                'city_id' => $history->city_id,
            ]);
    }

    public function testGetStories(){
        $response = $this->json('GET','/history');
        $structure = [['id', 'city_id','humedity','created_at','updated_at']];
        $response->assertStatus(200)
                ->assertJsonStructure($structure);
    }
}
