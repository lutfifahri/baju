<?php

namespace App\Livewire\Categories;

use App\Livewire\Forms\Categories\StoreCategories;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public StoreCategories $form;

    public function save()
    {
        $categories = $this->form->store();
        $this->flash('success', 'Berhasil', [
            'text' => 'Data categories berhasil ditambahkan!',
        ], route('categories.edit', $categories->id));
    }
    public function render()
    {
        return view('livewire.categories.form', [
            'page_meta' => [
                'title' => 'Tambah Categories',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'header'    => 'Tambah',
        ]);
    }
}
