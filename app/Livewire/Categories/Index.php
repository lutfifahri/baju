<?php

namespace App\Livewire\Categories;

use App\Models\categories;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $listeners = [
        'confirmedDelete',
    ];
    public $id;
    public function delete($id)
    {
        $this->id = $id;
        $this->confirm('Apakah anda yakin?', [
            'html'        => 'Data Categories ini akan dihapus!',
            'onConfirmed' => 'confirmedDelete',
        ]);
    }
    public function confirmedDelete()
    {
        $categories = categories::find($this->id);
        $categories->delete();
        $this->alert('success', 'Berhasil', [
            'text' => 'Data Categories berhasil dihapus!',
        ]);
    }
    public function render()
    {
        $categories = categories::all();
        return view('livewire.categories.index', [
            'page_meta'  => [
                'title' => 'Data Categories',
            ],
            'categories' => $categories,
        ]);
    }
}
