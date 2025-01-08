<?php

namespace App\Livewire\Forms\Products;
use App\Models\product;
use Livewire\Attributes\Validate;
use Illuminate\Validation\ValidationException;
use Livewire\Form;

class StoreProducts extends Form
{
    #[Validate('required', message: 'Nama Lengkap tidak boleh kosong!')]
    public $name;
    #[Validate('required', message: 'Price tidak boleh kosong!')]
    public $price;
    #[Validate('required', message: 'Stock harus berupa angka dan tidak boleh kosong!')]
    public $stock;
    #[Validate('required', message: 'Categori tidak boleh kosong!')]
    public $category_id;
    public $sku;
    public $description;
    #[Validate('image|max:1024')] // 1MB Max
    public $image;
    public function store()
    {
        $this->validate();
        if (!$this->category_id) {
            throw ValidationException::withMessages([
                'form.category_id' => 'Categori tidak boleh kosong',
            ]);
        }
        // Ambil SKU terakhir dari database dan tambahkan 1
        $lastSku   = Product::max('sku') ?? 0; // Jika kosong, mulai dari 0
        $this->sku = str_pad($lastSku + 1, 6, '0', STR_PAD_LEFT); // Format menjadi 6 digit (contoh: 000001)
        # store image in storage/app/public/posts
        $imagePath = $this->image
            ? $this->image->storeAs('public/foto', $this->image->hashName())
            : null;
        $products  = product::create([
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => str_replace(',', '', $this->price),
            'stock'       => $this->stock,
            'category_id' => $this->category_id,
            'sku'         => $this->sku,
            'image'       => str_replace('public/', '', $imagePath), // Simpan path relatif
        ]);

        return $products;
    }
}
