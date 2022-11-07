<?php

namespace Tests\Feature;

use App\Models\ExpensesCategories;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExpensesChartsApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExpensesChartApiPageWithData()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->post('/expenses', [
            'source_name' => 'testSource',
            'price' => 100,
        ]);

        $response = $this->getJson('/build/expenses');
        $response
            ->assertOk()
            ->assertJsonPath('chart.labels', ['testSource']);
    }

    public function testExpensesChartApiPageWithoutData()
    {
        $response = $this->getJson('/build/expenses');

        $response->assertOk()
            ->assertJsonPath('chart.labels', []);
    }

    public function testInsertNewExpensesCategory()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->post('/expenses', [
            'source_name' => 'testSource',
            'price' => 100,
        ]);

        $this->assertDatabaseHas('expenses_categories', [
            'source_of_expenses' => 'testSource',
            'price' => 100,
        ]);
    }

    public function testDeleteExpensesCategory()
    {
        User::factory()->create();
        $category = ExpensesCategories::factory()->create();
        $this->post("/expenses/delete/$category->id");

        $this->assertDatabaseMissing('expenses_categories', [
            'id' => $category->id,
        ]);
    }
}
