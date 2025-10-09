<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SdkController extends Controller
{
    /**
     * Show the list of SDKs & Plugins.
     */
    public function index()
    {
        // Example SDKs data (can be dynamic later)
        $sdks = [
            ['name' => 'PHP SDK', 'download' => '/downloads/sdk-php.zip'],
            ['name' => 'JavaScript SDK', 'download' => '/downloads/sdk-js.zip'],
            ['name' => 'Python SDK', 'download' => '/downloads/sdk-python.zip'],
        ];

        return view('admin.developer.sdk', compact('sdks'));
    }
}
