<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RentLogTable extends Component
{
    public $rentLogs;

    public function __construct($rentLogs)
    {
        $this->rentLogs = $rentLogs;
    }

    public function render()
    {
        return view('components.rent-log-table');
    }
}
