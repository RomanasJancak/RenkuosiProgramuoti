<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\UserBudget;

class UserBudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserBudget::create(['budget_id' => 1,'user_id'   => 1,'role_id'   => 4   ]);
        UserBudget::create(['budget_id' => 1,'user_id'   => 2,'role_id'   => 5   ]);
        UserBudget::create(['budget_id' => 1,'user_id'   => 3,'role_id'   => 6   ]);
        UserBudget::create(['budget_id' => 1,'user_id'   => 4,'role_id'   => 6   ]);

        UserBudget::create(['budget_id' => 2,'user_id'   => 1,'role_id'   => 4   ]);
        UserBudget::create(['budget_id' => 2,'user_id'   => 2,'role_id'   => 5   ]);
        UserBudget::create(['budget_id' => 2,'user_id'   => 3,'role_id'   => 6   ]);
        UserBudget::create(['budget_id' => 2,'user_id'   => 4,'role_id'   => 5   ]);

        UserBudget::create(['budget_id' => 3,'user_id'   => 1,'role_id'   => 4   ]);
        UserBudget::create(['budget_id' => 3,'user_id'   => 2,'role_id'   => 5   ]);
        UserBudget::create(['budget_id' => 3,'user_id'   => 3,'role_id'   => 6   ]);
        UserBudget::create(['budget_id' => 3,'user_id'   => 4,'role_id'   => 6   ]);

        UserBudget::create(['budget_id' => 4,'user_id'   => 1,'role_id'   => 4   ]);
        UserBudget::create(['budget_id' => 4,'user_id'   => 2,'role_id'   => 6   ]);
        UserBudget::create(['budget_id' => 4,'user_id'   => 3,'role_id'   => 5   ]);
        UserBudget::create(['budget_id' => 4,'user_id'   => 4,'role_id'   => 5   ]);

        UserBudget::create(['budget_id' => 5,'user_id'   => 1,'role_id'   => 4   ]);
        UserBudget::create(['budget_id' => 5,'user_id'   => 2,'role_id'   => 6   ]);
        UserBudget::create(['budget_id' => 5,'user_id'   => 3,'role_id'   => 5   ]);
        UserBudget::create(['budget_id' => 5,'user_id'   => 4,'role_id'   => 6   ]);

        UserBudget::create(['budget_id' => 6,'user_id'   => 1,'role_id'   => 4   ]);
        UserBudget::create(['budget_id' => 6,'user_id'   => 2,'role_id'   => 6   ]);
        UserBudget::create(['budget_id' => 6,'user_id'   => 3,'role_id'   => 5   ]);
        UserBudget::create(['budget_id' => 6,'user_id'   => 4,'role_id'   => 5   ]);
    }
}
