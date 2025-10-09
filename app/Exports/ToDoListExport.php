<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ToDoListExport implements FromView
{
    public function __construct(private $data) {}

    public function view(): View
    {
        return view('exports.ToDoListTable', $this->data);
    }
}
