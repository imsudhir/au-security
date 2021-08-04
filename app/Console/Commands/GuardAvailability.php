<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Requirement;
use App\Models\Users;
use Illuminate\Http\Request;
class GuardAvailability extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guard:availability';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        // $result=Users::all()->where('current_job_leave_date',date('Y-m-d'));
         $result=Users::where(['current_job_leave_date'=>date('Y-m-d'), 'active_status'=>1, 'role'=>2])->get();
        
        if($result != null){
            // $result->availability_time = 0;
            // $result->save();
            foreach ($result as $value) {
                $guard_data = Users::where(['id'=>$value->id])->first();
                $guard_data->availability_time = 1;
                $guard_data->save();
                $this->info($value->id);
            $msg="availability updated successfully";

            }
         } else{
             $msg="no data found";
         }
          
        
         $this->info('guard command run successfully');
         $this->info($result);
        //  $this->info($result);
         
    }
}
