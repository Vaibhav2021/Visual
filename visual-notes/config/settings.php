<?php

return [

     'THEME_ASSETS' => [
          'global'  => [
               'css' => [
                    // 'assets/compiled/css/app.css',
                    // 'assets/compiled/css/app-dark.css',
                    // 'assets/compiled/css/custom.css',
                    // 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css'
                    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
                    'https://fonts.googleapis.com/css2?family=Wix+Madefor+Display:wght@400;500;600;700;800&display=swap',
                    'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200',
                    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css'
                    

               ],
               'js'  => [
                    // 'assets/static/js/components/dark.js',
                    // 'assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js',
                    // "https://cdn.jsdelivr.net/npm/sweetalert2@11",
                    // 'assets/compiled/js/index.global.js',
                    // 'assets/compiled/js/app.js',
                    
                    'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js',
                    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
                    'https://cdn.jsdelivr.net/npm/sweetalert2@11',
                    'assets/js/custom.js',
               ],
          ],
     ],


     # Theme Vendors
     'THEME_VENDORS' => [
          'auth' => [
               'css' => [
                    'assets/css/auth.css',
               ],
          ],
          'datatable'    => [
               'css'     => [
                    // 'assets/extensions/simple-datatables/style.css',
                    // 'assets/compiled/css/table-datatable-jquery.css',
                    // 'assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css'
                    'https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css'

               ],
               'js' => [
                    
                    'https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js'
               ]
          ],
          'select' => [
               'css' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
               ],
               'js' => [
                    'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
               ],
          ],
          'flatpickr' => [
               'css' => [
                    // 'assets/extensions/flatpickr/flatpickr.min.css',
               ],
               'js' => [
                    // 'assets/extensions/flatpickr/flatpickr.min.js',
               ],
          ],
          'smtp' => [
               'js' => [
                    'assets/js/smtp.js',
               ],
          ],

          'razorpay' => [
               'js' => [
                   'https://checkout.razorpay.com/v1/checkout.js',
               ]
          ]

     ],

];
