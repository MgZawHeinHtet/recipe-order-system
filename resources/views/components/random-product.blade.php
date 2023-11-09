<div class="py-5 flex justify-between">
    <h4 class="text-slate-700 text-lg font-bold tracking-normal">Related menu</h4>
    <div class="text-center text-slate-700"> Category | {{ $category->category->name }}</div>
</div>
<div class="grid grid-cols-5 gap-3">
    @foreach ( $randomProducts as $product )
    <x-product-card :product="$product"></x-product-card>
    @endforeach
  
</div>