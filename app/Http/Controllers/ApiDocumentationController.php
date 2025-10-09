<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiDocumentationController extends Controller
{
    protected $endpoints = [
        'create-payment-link' => [
            'title' => 'Create Payment Link',
            'method' => 'POST',
            'url' => '/api/v1/payment-links',
            'headers' => ['Authorization: Bearer <SECRET_KEY>', 'Content-Type: application/json'],
            'parameters' => [
                'amount' => 'Required | decimal',
                'customer_name' => 'Required | string',
                'customer_email' => 'Required | string',
                'notes' => 'Optional | string'
            ],
            'response' => [
                'id' => 'string',
                'status' => 'string',
                'short_url' => 'string'
            ]
        ],
        // Add more endpoints here...
    ];

    public function index()
    {
        $endpoints = $this->endpoints;
        return view('admin.developer.api_docs.index', compact('endpoints'));
    }

    public function show($endpoint)
    {
        if (!isset($this->endpoints[$endpoint])) {
            abort(404);
        }
        $doc = $this->endpoints[$endpoint];
        return view('admin.developer.api_docs.show', compact('doc'));
    }
}
