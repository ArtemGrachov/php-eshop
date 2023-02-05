<?php
$TRANSLATIONS = [
    'common' => [
        'title' => 'PHP E-Commerce Example',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'select_placeholder' => 'Please, select',
        'order_status' => [
            'new' => 'New',
            'pending' => 'Pending',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled'
        ],
        'validation' => [
            'required' => 'This field is required',
            'minLength' => 'Minimum length is {minLength}',
            'lowerCase' => 'At least one lower case symbol is required',
            'upperCase' => 'At least one upper case symbol is required',
            'digits' => 'At least one digit is required'
        ]
    ],
    'admin' => [
        'title' => 'PHP eShop | Admin panel',
        'shop' => 'Go to the shop',
        'logout' => 'Logout',
        'view_address_form' => [
            'return' => 'Return to adresses list',
            'label_country' => 'Country',
            'placeholder_country' => 'Country',
            'label_region' => 'Region',
            'placeholder_region' => 'Region',
            'label_city' => 'City',
            'placeholder_city' => 'City',
            'label_street' => 'Street',
            'placeholder_street' => 'Street',
            'label_house_number' => 'House number',
            'placeholder_house_number' => 'House number',
            'label_appartment_number' => 'Appartment number',
            'placeholder_appartment_number' => 'Appartment number',
            'label_notes' => 'Notes',
            'placeholder_notes' => 'Notes',
            'label_submit' => 'Submit'
        ],
        'view_address_list' => [
            'return' => 'Return to dashboard',
            'create_address' => 'Create address',
            'id' => 'ID',
            'country' => 'Country',
            'region' => 'Region',
            'city' => 'City',
            'street' => 'Street',
            'house_number' => 'House number',
            'appartment_number' => 'Appartment number',
            'notes' => 'Notes'
        ],
        'view_orders_form' => [
            'return' => 'Return to orders list',
            'label_token' => 'Token',
            'placeholder_token' => 'Token',
            'label_state' => 'State',
            'label_customer' => 'Customer',
            'label_address' => 'Address',
            'label_note' => 'Note',
            'placeholder_note' => 'Note',
            'label_submit' => 'Submit'
        ],
        'view_orders_list' => [
            'return' => 'Return to dashboard',
            'create_order' => 'Create order',
            'id' => 'ID',
            'token' => 'Token',
            'state' => 'State',
            'customer' => 'Customer',
            'address' => 'Address',
            'note' => 'Note',
            'actions' => 'Actions'
        ],
        'view_products_form' => [
            'return' => 'Return to product list',
            'image' => 'Image',
            'file_placeholder' => 'Choose a file...',
            'label_name' => 'Name',
            'placeholder_name' => 'Name',
            'label_description' => 'Description',
            'placeholder_description' => 'Description',
            'label_price' => 'Price',
            'placeholder_price' => 'Price',
            'label_tracked' => 'Tracked',
            'label_stock' => 'Stock',
            'label_taxon' => 'Taxon',
            'label_submit' => 'Submit'
        ],
        'view_products_list' => [
            'return' => 'Return to dashboard',
            'create_product' => 'Create product',
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'description' => 'Description',
            'stock' => 'Stock',
            'taxon_name' => 'Taxon name',
            'actions' => 'Actions'
        ],
        'view_taxons_form' => [
            'return' => 'Return to taxon list',
            'label_name' => 'Name',
            'placeholder_name' => 'Name',
            'label_description' => 'Description',
            'placeholder_description' => 'Description',
            'label_submit' => 'Submit'
        ],
        'view_taxons_list' => [
            'return' => 'Return to dashboard',
            'create_taxon' => 'Create taxon',
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'products_count' => 'Products count',
            'actions' => 'Actions',
        ],
        'view_users_form' => [
            'return' => 'Return to user list',
            'label_username' => 'Username',
            'placeholder_username' => 'Name',
            'label_email' => 'Email',
            'placeholder_email' => 'Email',
            'label_password' => 'Password',
            'placeholder_password' => 'Password',
            'label_submit' => 'Submit'
        ],
        'view_users_list' => [
            'return' => 'Return to dashboard',
            'create_user' => 'Create user',
            'id' => 'ID',
            'email' => 'Email',
            'username' => 'Username',
            'actions' => 'Actions'
        ],
        'auth' => [
            'label_username' => 'Username',
            'placeholder_username' => 'Name',
            'label_password' => 'Password',
            'placeholder_password' => 'Password',
            'label_submit' => 'Submit'
        ],
        'dashboard' => [
            'link_taxons' => 'Taxons',
            'link_products' => 'Products',
            'link_orders' => 'Orders',
            'link_addresses' => 'Addresses',
            'link_users' => 'Users'
        ]
    ],
    'customer' => [
        'title' => 'PHP eShop',
        'cart' => [
            'checkout' => 'Checkout',
            'empty_placeholder' => 'The cart is empty'
        ],
        'view_checkout' => [
            'cart_summary' => 'Cart cummary',
            'total_items' => 'Total items:',
            'total_price' => 'Total price:',
            'edit_cart' => 'Edit cart',
            'submit_order' => 'Submit order'
        ],
        'view_checkout_success' => [
            'title' => 'Thanks for your order!',
            'email' => 'An email with order details was sent to <strong>{email}</strong>',
            'return' => 'Home'
        ],
        'view_product' => [
            'out_of_stock' => 'Is running out of stock'
        ]
    ],
    'partials' => [
        'address_list_row' => [
            'delete_question' => 'Are you sure you want to delete address &quot;{address}&quot;?'
        ],
        'cart_summary' => [
            'total_items' => 'Total items:',
            'total_price' => 'Total price:'
        ],
        'checkout_address_form_part' => [
            'title' => 'Customer address',
            'label_country' => 'Country',
            'placeholder_country' => 'Country',
            'label_region' => 'Region',
            'placeholder_region' => 'Region',
            'label_city' => 'City',
            'placeholder_city' => 'City',
            'label_street' => 'Street',
            'placeholder_street' => 'Street',
            'label_house_number' => 'House number',
            'placeholder_house_number' => 'House number',
            'label_appartment_number' => 'Appartment number',
            'placeholder_appartment_number' => 'Appartment number',
            'label_notes' => 'Notes',
            'placeholder_notes' => 'Notes'
        ],
        'checkout_customer_form_part' => [
            'title' => 'Customer information',
            'label_first_name' => 'First name',
            'placeholder_first_name' => 'First name',
            'label_last_name' => 'Last name',
            'placeholder_last_name' => 'Last name',
            'label_email' => 'Email',
            'placeholder_email' => 'Email',
            'label_phone_number' => 'Phone number',
            'placeholder_phone_number' => 'Phone number',
            'label_is_company' => 'Is company',
            'label_company_name' => 'Company name',
            'placeholder_company_name' => 'Company name',
            'label_company_vat' => 'Company VAT number',
            'placeholder_company_vat' => 'Company VAT number'
        ],
        'delete_modal' => [
            'title' => 'Delete confirmation',
            'cancel' => 'Cancel',
            'delete' => 'Delete'
        ],
        'footer' => [
            'note' => 'Developed for educational purposes'
        ],
        'pagination' => [
            'prev' => 'Previous',
            'next' => 'Next page'
        ],
        'product_card' => [
            'out_of_stock' => 'Is running out of stock'
        ],
        'product_cart_form' => [
            'add_to_cart' => 'Add to cart'
        ],
        'search_product_form' => [
            'placeholder_query' => 'Type a query...',
            'label_submit' => 'Search'
        ]
    ]
];
