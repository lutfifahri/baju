<?php
namespace App\Livewire\Forms\Categories;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateCategories extends Form
{
    #[Validate('required', message: 'Nama Lengkap tidak boleh kosong!')]
    public $name;
    public $description;
    public function update($categories)
    {
        $this->validate();
        $categories->update([
            'name'        => $this->name,
            'description' => $this->description,
        ]);
        return $categories;
    }
}
