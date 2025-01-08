<?php

namespace App\Livewire\Orders;

use App\Helpers\NumberHelper;
use App\Livewire\Forms\Orders\StoreOrders;
use App\Models\product;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    public StoreOrders $form;
    public $RowOrdersItems = [];
    public $totalOrders = 0;
    public $totalOrdersItemsFormated;
    public $index;
    public $quantity;
    public function mount()
    {
        $this->RowOrdersItems[] = [
            '',
        ];
    }
    public function addRowOrdersItems($index)
    {
        array_splice($this->RowOrdersItems, $index + 1, 0, [
            [
                'product_id' => '',
                'quantity'   => '',
                'price'      => '',
                'subtotal'   => '',
            ],
        ]);
    }

    public function removeRowOrdersItems($index)
    {
        array_splice($this->RowOrdersItems, $index, 1);
    }
    public function changeProduct($index)
    {
        $this->index = $index;
        $product_id  = $this->RowOrdersItems[$index]['product_id'];
        $product     = product::query()->where('id', $product_id)->first();
        if ($product) {
            $this->RowOrdersItems[$index]['price'] = $product->price;
            $this->RowOrdersItems[$index]['stock'] = $product->stock;
        }
    }

    public function changeQuantity($index)
    {
        $this->index = $index;
        // Ambil data dari RowOrdersItems berdasarkan indeks
        $quantity = $this->RowOrdersItems[$index]['quantity'];
        $price    = $this->RowOrdersItems[$index]['price'];
        $stock    = $this->RowOrdersItems[$index]['stock'];

        // Validasi dan konversi nilai ke tipe numerik
        $quantity = is_numeric($quantity) ? (float) $quantity : 0;
        $price    = is_numeric($price) ? (float) $price : 0;
        $stock    = is_numeric($stock) ? (int) $stock : 0;

        // Validasi jika quantity lebih besar dari stok
        if ($quantity > $stock) {
            $this->flash('error', 'Maaf', [
                'text' => 'Quantity tidak boleh lebih dari stock!',
            ], route('orders.create'));
            $this->RowOrdersItems[$index]['quantity'] = $stock; // Set quantity ke stok maksimum
            $quantity                                 = $stock; // Update quantity untuk perhitungan
        }

        // Hitung subtotal
        $subtotal = $quantity * $price;

        // Kurangi stok sesuai quantity
        $updatedStock = $stock - $quantity;

        // Update RowOrdersItems
        $this->RowOrdersItems[$index]['subtotal'] = $subtotal;
        $this->RowOrdersItems[$index]['stock']    = $updatedStock;
    }



    public function calculateOrdersItems()
    {
        $this->totalOrders         = collect($this->RowOrdersItems)->map(function ($item) {
            return [
                'subtotal' => (int) NumberHelper::format($item['subtotal']),
            ];
        })->sum('subtotal');
        $this->totalOrders         = $this->totalOrders + 1;
        $this->totalOrdersFormated = number_format($this->totalOrders, 2, '.', ',');
    }

    public function render()
    {
        return view('livewire.orders.form', [
            'page_meta' => [
                'title' => 'Tambah Orders',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'header'    => 'Tambah',
            'user'      => User::all(),
            'product'   => product::all(),
        ]);
    }
}
