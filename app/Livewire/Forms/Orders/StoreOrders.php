<?php

namespace App\Livewire\Forms\Orders;

use App\Models\Orders;
use Livewire\Form;
use Livewire\Attributes\Validate;
class StoreOrders extends Form
{
    #[Validate('required', message: 'Name tidak boleh kosong!')]
    public $name;
    public $description;

    public function store()
    {
        $orders = Orders::create([
            'name'        => $this->name,
            'description' => $this->description,
        ]);

        return $orders;
    }
}
