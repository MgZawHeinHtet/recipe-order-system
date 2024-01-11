<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use App\Models\Product;
use App\Models\SpecialProduct;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AutoFillStockCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:auto-fill-stock-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

  

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SpecialProduct::query()->delete();
        $radomProducts = Product::inRandomOrder()->limit(4)->get();
        foreach($radomProducts as $product){
            SpecialProduct::create([
                'id'=>$product->id,
                'title'=>$product->title,
                'description'=>$product->description,
                'photo'=>$product->photo,
                'price'=>$product->price,
                'rating'=>$product->reting,
                'avg_rating'=>$product->avg_rating,
                'ingredients'=>$product->ingredients,
                'country_id'=>$product->country_id,
                'category_id'=>$product->category_id,
                'is_publish'=>$product->is_publish
            ]);
        }
    }
}
