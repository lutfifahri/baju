<?php

namespace App\Livewire\Orders;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.orders.index', [
            'page_meta' => [
                'title' => 'Data Orders',
            ],
        ]);
    }
}
