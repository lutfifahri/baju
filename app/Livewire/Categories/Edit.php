<?php

namespace App\Livewire\Categories;

use App\Livewire\Forms\Categories\UpdateCategories;
use App\Models\categories;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;
    public UpdateCategories $form;
    public $categories;
    public function mount($categories)
    {
        $this->categories        = categories::find($categories);
        $this->form->name        = $this->categories->name;
        $this->form->description = $this->categories->description;
    }
    public function update()
    {
        $this->form->validate();
        try {
            $this->form->update($this->categories);
            $this->flash(
                'success',
                'Berhasil',
                [
                    'text' => 'Data Categories berhasil diperbarui',
                ],
                route('categories.edit', $this->categories->id)
            );
        } catch (\Throwable $e) {
            $this->alert('error', 'Gagal', [
                'text' => $e->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.categories.form', [
            'page_meta' => [
                'title' => 'Edit Products',
                'form'  => [
                    'action' => 'update',
                ],
            ],
            'header'    => 'Edit',
        ]);
    }
}
