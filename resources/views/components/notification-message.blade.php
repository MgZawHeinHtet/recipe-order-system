
@if($type === 'add-product')
    <span>New Product was added by</span>
    <span>{{ $recipent }}</span>
@endif

@if($type === 'update-product')
    <span> Product was updated by</span>
    <span>{{ $recipent }}</span>
@endif


@if($type === 'delete-product')
    <span> Product was deleted by</span>
    <span>{{ $recipent }}</span>
@endif

@if($type === 'change-order-status')
    <span>Your Order status was changed by</span>
    <span>{{ $recipent }}</span>
@endif