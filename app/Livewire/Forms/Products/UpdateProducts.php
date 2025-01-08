<?php

namespace App\Livewire\Forms\Products;

use \Livewire\TemporaryUploadedFile;
use \Storage;
use App\Models\product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateProducts extends Form
{
    #[Validate('required', message: 'Nama Lengkap tidak boleh kosong!')]
    public $name;
    #[Validate('required', message: 'Price Lengkap tidak boleh kosong!')]
    public $price;
    #[Validate('required', message: 'Stock Lengkap tidak boleh kosong!')]
    public $stock;
    #[Validate('required', message: 'Category Lengkap tidak boleh kosong!')]
    public $category_id;
    public $description;
    public $image;
    public function update($product)
    {
        // Validasi input
        $this->validate();

        // Cari data produk berdasarkan ID
        $existingProduct = Product::find($product->id);

        // Periksa apakah gambar lama sama dengan yang baru atau tidak
        if ($existingProduct && $existingProduct->image === $this->image) {
            // Jika gambar tidak berubah, update data selain gambar
            $product->update([
                'name'        => $this->name,
                'description' => $this->description,
                'price'       => str_replace(',', '', $this->price),
                'stock'       => $this->stock,
                'category_id' => $this->category_id,
            ]);
        } else {
            // Jika gambar diubah, simpan gambar baru dan hapus gambar lama
            $imagePath = $this->image
                ? $this->image->storeAs('public/foto', $this->image->hashName())
                : null;
            // Update data produk dengan gambar baru
            $product->update([
                'name'        => $this->name,
                'description' => $this->description,
                'price'       => str_replace(',', '', $this->price),
                'stock'       => $this->stock,
                'category_id' => $this->category_id,
                'image'       => str_replace('public/', '', $imagePath), // Simpan path relatif
            ]);
        }

        return $product;
    }

}
