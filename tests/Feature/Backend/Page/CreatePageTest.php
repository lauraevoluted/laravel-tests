<?php
namespace Tests\Feature\Backend\Page;

use App\Domains\Auth\Models\User;
use App\Domains\Page\Events\PageCreated;
use App\Domains\Page\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Tests\TestCase;

class CreatePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_page_view()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/pages/create');

        $response->assertOk();
    }

    /** @test  */
    public function a_user_cannot_access_the_create_page_view()
    {
        // Login as a user
        $this->actingAs(User::factory()->user()->create());

        // Simulate a GET request to the given URL
        $response = $this->get('/admin/pages/create');

        // Check the response, we should have been redirected to the homepage
        $response->assertRedirect('/');
    }

    /** @test */
    public function create_page_requires_validation()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/pages');

        $response->assertSessionHasErrors([
            'title',
            'content',
        ]);
    }

    /** @test */
    public function admin_can_create_page()
    {
        Event::fake([ PageCreated::class ]);

        $this->loginAsAdmin();

        $page = Page::factory()->make()->toArray();

        $response = $this->post('/admin/pages', $page);

        $response->assertSessionHasNoErrors();

        $response->assertSessionHas(['flash_success' => __('The page was successfully created.')]);

        $this->assertDatabaseHas(
            'pages',
            [
                'title' => $page['title'],
                'slug' => Str::slug($page['title']),
                'content' => $page['content'],
            ]
        );

        Event::assertDispatched(PageCreated::class);
    }
}
