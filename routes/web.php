<?php

use Illuminate\Support\Facades\Route;
use Spatie\LaravelPdf\Facades\Pdf;

Route::get('/', function () {
     return Pdf::view('pdf.fresh')
            ->withBrowsershot(function ($browsershot) {
                if (!app()->isProduction()) {
                    $browsershot
                        ->setNodeBinary(
                            "~/Library/Application\ Support/Herd/config/nvm/versions/node/v18.20.1/bin/node"
                        )
                        ->setNpmBinary(
                            "~/Library/Application\ Support/Herd/config/nvm/versions/node/v18.20.1/bin/npm"
                        );
                }
            })
            ->format('a4')
            ->footerView('pdf.fresh.footer');
});
