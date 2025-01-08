<?php

namespace App\Livewire\Orders;
use App\Models\Orders;
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
            'html'        => 'Data Product ini akan dihapus!',
            'onConfirmed' => 'confirmedDelete',
        ]);
    }
    public function confirmedDelete()
    {
        $products = Orders::find($this->id);
        $products->delete();
        $this->alert('success', 'Berhasil', [
            'text' => 'Data Orders berhasil dihapus!',
        ]);
    }
    public function render()
    {
        $this->orders = Orders::all();
        return view('livewire.orders.index', [
            'page_meta' => [
                'title' => 'Data Orders',
            ],
            'orders'    => $this->orders,
        ]);
    }
}
