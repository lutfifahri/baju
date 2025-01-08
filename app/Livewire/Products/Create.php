<?php
namespace App\Livewire\Products;
use App\Livewire\Forms\Products\StoreProducts;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\categories;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public StoreProducts $form;
    public $index;
    public $rowDescription = [];
    public function save()
    {
        $products = $this->form->store();
        $this->flash('success', 'Berhasil', [
            'text' => 'Data Products berhasil ditambahkan!',
        ], route('products.edit', $products->id));
    }

    # Description
    public function rowDescription($index)
    {
        array_splice($this->rowDescription, $index + 1, 0, [
            [
                'name'        => '',
                'description' => '',
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.products.form', [
            'page_meta'  => [
                'title' => 'Tambah Data Products',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'header'     => 'Tambah',
            'categories' => categories::all(),
        ]);
    }
}
