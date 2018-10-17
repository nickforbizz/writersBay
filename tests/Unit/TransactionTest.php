<?php

namespace Tests\Unit;

use App\Http\Controllers\Api\TransactionController;
use App\SystemWalletConfig;
use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransactionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        try{
            DB::beginTransaction();
            $t=new TransactionController();
            $user1=User::find(1);
            $systemWalletConfig=SystemWalletConfig::find(1);


//            $repsonse=$t->loadUser($systemWalletConfig,$user1,98500);
//            $repsonse=$t->paySystem($systemWalletConfig,$user1,5000);

            $user2=User::find(2);
            $repsonse=$t->transfer($systemWalletConfig,$user1,$user2,5000);

            echo json_encode($repsonse);
            $this->assertTrue(true);

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            echo json_encode($exception->getMessage());

            $this->assertTrue(false);

        }

    }
}
