<?php

namespace Database\Seeders;

use App\Contracts\Presenters\Personal\Learner\RegisterLearnerPresenter;
use Core\Test\Actions\Personal\LearnerAction;
use Illuminate\Database\Seeder;
use Modules\Personal\Guest;

class LearnerSeeder extends Seeder
{
    use LearnerAction;

    private const COUNT_LEARNERS = 99;

    public function run()
    {
        $presenter = app()->get(RegisterLearnerPresenter::class);

        $attributes = [
            'name' => 'Для теста',
            'email' => $this->testEmail,
            'password' => $this->testPassword
        ];
        $presenter(new Guest(), $attributes);

        for ($i = 0; $i < self::COUNT_LEARNERS; $i++) {
            $attributes = $this->generateLearnerAttributes();
            $presenter(new Guest(), $attributes);
        }
    }
}
