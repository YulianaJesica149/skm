<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Respondent;
use App\Models\Service;
use App\Models\Question;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OptionSeeder;
use Database\Seeders\QuestionSeeder;
use Database\Seeders\RespondentSeeder;
use Database\Seeders\ServiceSeeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            Roleseeder::class,
            UserSeeder::class,

        ]);
    }
}
