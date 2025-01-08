<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\Products\UpdateProducts;
use App\Models\categories;
use App\Models\product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public UpdateProducts $form;
    public $products;
    public function mount($products)
    {
        $this->products          = product::find($products);
        $this->form->name        = $this->products->name;
        $this->form->description = $this->products->description;
        $this->form->price       = $this->products->price;
        $this->form->stock       = $this->products->stock;
        $this->form->category_id = $this->products->category_id;
        $this->form->image       = $this->products->image;
    }
    public function update()
    {
        $this->form->validate();
        try {
            $this->form->update($this->products);
            $this->flash('success', 'Berhasil', [
                'text' => 'Data Product berhasil diperbarui!',
            ], route('products.edit', $this->products->id));
        } catch (\Throwable $e) {
            $this->alert('error', 'Gagal', [
                'text' => $e->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.products.form', [
            'page_meta'  => [
                'title' => 'Edit Products',
                'form'  => [
                    'action' => 'update',
                ],
            ],
            'header'     => 'Edit',
            'categories' => categories::all(),
        ]);
    }
}
