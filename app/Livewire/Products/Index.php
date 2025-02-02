<?php
namespace App\Livewire\Products;
use App\Models\product;
use Barryvdh\DomPDF\Facade\Pdf;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $listeners = [
        'confirmedDelete',
    ];
    public $id;
    public function print()
    {
        $this->products = Product::all();
        $pdf            = Pdf::loadView('Livewire.PDF.product', ['produk' => $this->products]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'product.pdf');
    }
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
        $products = product::find($this->id);
        $products->delete();
        $this->alert('success', 'Berhasil', [
            'text' => 'Data Products berhasil dihapus!',
        ]);
    }
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products.index', [
            'page_meta' => [
                'title' => 'Data Products',
            ],
            'products'  => $this->products,
        ]);
    }
}
