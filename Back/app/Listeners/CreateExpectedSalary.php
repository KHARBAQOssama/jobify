<?php

namespace App\Listeners;

use App\Events\EmployeeCreated;
use App\Models\ExpectedSalary;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateExpectedSalary
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EmployeeCreated $event)
    {
        $employeeId = $event->employee->id;

        ExpectedSalary::create([
            'employee_id' => $employeeId,
        ]);
    }
}
