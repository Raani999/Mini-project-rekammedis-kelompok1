<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\Jenis_KelaminController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Http\Controllers\KontakController;
/*
use App\Http\Controllers\KontakController;
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
Route::get('/', [DesaController::class, 'index']);
Route::post('/desa', [DesaController::class, 'store'])->name('desa.store');
Route::resource('desa', DesaController::class);
Route::resource('jenis_kelamin', Jenis_KelaminController::class);

// return new class extends Migration {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('flights', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->string('airline');
//             $table->timestamps();
//         });
//     }

//     public function down(): void
//     {
//         Schema::drop('flights');
//     }
// };
// route:: get('/pasien', [PasienController::class, 'index'])->name('home');
// route:: get('/', [PasienController::class, 'index'])->name('home');
//route:: post('/kontak', [KontakController::class, 'submit'])->name('kontak.submit');
////route:: get('/kontak', [KontakController::class, 'form'])->name('kontak.form');
//route:: get('/', [KontakController::class, 'home'])->name('home');

//Route::get('/profile', [ProfileController::class, 'index']);
//Route::post('/profile', [ProfileController::class, 'store']);
//Route::get('/', function () {
   // return view('welcome');
//});

//Route::get('/hello', function () {
  //  return view('hello');
//});
