<?php

namespace Tests\Feature\Controllers\Api;

use App\Http\Controllers\Api\DosenController;
use App\Models\HakAksesModel;
use Illuminate\Support\Facades\Route;
use Mockery;
<<<<<<< Updated upstream
use PHPUnit\Framework\Attributes\PreserveGlobalState;
// Import Attributes PHPUnit
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
=======
use Tests\TestCase;
// Import Attributes PHPUnit
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\RunInSeparateProcess;
use PHPUnit\Framework\Attributes\PreserveGlobalState;
>>>>>>> Stashed changes

class DosenControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // 1. Matikan Middleware agar fokus ke logic
        $this->withoutMiddleware();

        // 2. Daftarkan Route Manual untuk keperluan testing
        Route::get('/api/dosen-hak-akses', [DosenController::class, 'getDosenFromHakAkses']);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    /**
<<<<<<< Updated upstream
     * Menggunakan Attribute untuk isolasi proses agar mocking 'overload'
=======
     * Menggunakan Attribute untuk isolasi proses agar mocking 'overload' 
>>>>>>> Stashed changes
     * tidak merusak factory di test file lain.
     */
    #[Test]
    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function get_dosen_returns_success_data()
    {
        // ARRANGE: Siapkan Data Palsu
        $mockData = collect([
            (object) [
                'user_id' => 'dosen-001',
                'akses' => 'Dosen',
                'created_at' => now(),
            ],
            (object) [
                'user_id' => 'dosen-002',
                'akses' => 'Dosen',
                'created_at' => now(),
<<<<<<< Updated upstream
            ],
        ]);

        // MOCKING: Pura-pura menjadi HakAksesModel menggunakan overload
        $mock = Mockery::mock('overload:'.HakAksesModel::class);

        $mock->shouldReceive('where')
            ->once()
            ->with('akses', 'Dosen')
            ->andReturnSelf();

        $mock->shouldReceive('get')
            ->once()
            ->with(['user_id', 'akses', 'created_at'])
            ->andReturn($mockData);
=======
            ]
        ]);

        // MOCKING: Pura-pura menjadi HakAksesModel menggunakan overload
        $mock = Mockery::mock('overload:' . HakAksesModel::class);
        
        $mock->shouldReceive('where')
             ->once()
             ->with('akses', 'Dosen')
             ->andReturnSelf();
        
        $mock->shouldReceive('get')
             ->once()
             ->with(['user_id', 'akses', 'created_at'])
             ->andReturn($mockData);
>>>>>>> Stashed changes

        // ACT
        $response = $this->getJson('/api/dosen-hak-akses');

        // ASSERT
        $response->assertStatus(200)
<<<<<<< Updated upstream
            ->assertJson([
                'success' => true,
                'message' => 'Data dosen berhasil diambil',
                'count' => 2,
            ]);
=======
                 ->assertJson([
                     'success' => true,
                     'message' => 'Data dosen berhasil diambil',
                     'count' => 2,
                 ]);
>>>>>>> Stashed changes

        $response->assertJsonFragment([
            'user_id' => 'dosen-001',
            'nama' => 'Dosen (dosen-001)',
            'email' => 'dosen-001@dosen.local',
            'is_invited' => false,
        ]);
    }

    #[Test]
    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function get_dosen_returns_empty_if_no_data()
    {
<<<<<<< Updated upstream
        $mock = Mockery::mock('overload:'.HakAksesModel::class);

=======
        $mock = Mockery::mock('overload:' . HakAksesModel::class);
        
>>>>>>> Stashed changes
        $mock->shouldReceive('where')->once()->with('akses', 'Dosen')->andReturnSelf();
        $mock->shouldReceive('get')->once()->andReturn(collect([]));

        $response = $this->getJson('/api/dosen-hak-akses');

        $response->assertStatus(200)
<<<<<<< Updated upstream
            ->assertJson([
                'success' => true,
                'data' => [],
                'count' => 0,
            ]);
=======
                 ->assertJson([
                     'success' => true,
                     'data' => [],
                     'count' => 0,
                 ]);
>>>>>>> Stashed changes
    }

    #[Test]
    #[RunInSeparateProcess]
    #[PreserveGlobalState(false)]
    public function get_dosen_handles_exceptions()
    {
<<<<<<< Updated upstream
        $mock = Mockery::mock('overload:'.HakAksesModel::class);

        $mock->shouldReceive('where')
            ->andThrow(new \Exception('Koneksi Database Putus!'));
=======
        $mock = Mockery::mock('overload:' . HakAksesModel::class);
        
        $mock->shouldReceive('where')
             ->andThrow(new \Exception('Koneksi Database Putus!'));
>>>>>>> Stashed changes

        $response = $this->getJson('/api/dosen-hak-akses');

        $response->assertStatus(500)
<<<<<<< Updated upstream
            ->assertJson([
                'success' => false,
                'message' => 'Gagal mengambil data dosen',
                'count' => 0,
            ]);
    }
}
=======
                 ->assertJson([
                     'success' => false,
                     'message' => 'Gagal mengambil data dosen',
                     'count' => 0,
                 ]);
    }
}
>>>>>>> Stashed changes
