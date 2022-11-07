<?php

namespace Tests\Feature;

use App\Models\IncomeCategories;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IncomeChartsApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIncomeChartApiPageWithData()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->post('/income', [
            'source_name' => 'testSource',
            'price' => 100,
        ]);

        $response = $this->getJson('/build/income');
        $response
            ->assertOk()
            ->assertJsonPath('chart.labels', ['testSource']);
    }

    public function testIncomeChartApiPageWithoutData()
    {
        $response = $this->getJson('/build/income');

        $response->assertOk()
            ->assertJsonPath('chart.labels', []);
    }

    public function testInsertNewIncomeCategory()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->post('/income', [
            'source_name' => 'testSource',
            'price' => 100,
        ]);

        $this->assertDatabaseHas('income_categories', [
            'source_of_income' => 'testSource',
            'price' => 100,
        ]);
    }

    public function testDeleteIncomeCategory()
    {
        User::factory()->create();
        $category = IncomeCategories::factory()->create();
        $this->post("/income/delete/$category->id");

        $this->assertDatabaseMissing('income_categories', [
            'id' => $category->id,
        ]);
    }
}
