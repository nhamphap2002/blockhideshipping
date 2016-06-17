{if !$logged}
    <style>
        .shopping_cart .cart-prices .cart-prices-line.first-line,
        #layer_cart .layer_cart_cart .layer_cart_row:nth-child(3){
            display: none;
        }
    </style>
{/if}
{if $customer_id>0}
    <style>
        .shopping_cart .cart-prices .cart-prices-line.first-line,
        #layer_cart .layer_cart_cart .layer_cart_row:nth-child(3){
            display: block;
        }
    </style>
{/if}
