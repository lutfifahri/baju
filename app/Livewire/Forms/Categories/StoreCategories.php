<?php

namespace App\Livewire\Forms\Categories;

use App\Models\categories;
use Livewire\Form;
use Livewire\Attributes\Validate;
class StoreCategories extends Form
{
    #[Validate('required', message: 'Name tidak boleh kosong!')]
    public $name;
    public $description;
    public function store()
    {
        $categories = categories::create([
            'name'        => $this->name,
            'description' => $this->description,
        ]);

        return $categories;
    }
}
