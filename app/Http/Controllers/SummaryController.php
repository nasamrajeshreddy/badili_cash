<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class SummaryController extends Controller
{
    //
    public function overview()
    {
        return view('Summary.overview');
    }
     public function analytics()
    {
        // -----------------
        // Business Trend
        // -----------------
       /* $successTransactions = Transaction::where('status', 'success');
        $successRate = Transaction::count() ? round(($successTransactions->count() / Transaction::count()) * 100, 2) : 0;
        $transactions = $successTransactions->count();
        $volume = $successTransactions->sum('amount');
        $totalGmv = $volume;

        // Highest & Lowest GMV by payment method
        $paymentGmv = $successTransactions
            ->selectRaw('payment_method, SUM(amount) as total')
            ->groupBy('payment_method')
            ->pluck('total','payment_method');

        $highestGmv = $paymentGmv->max();
        $lowestGmv = $paymentGmv->min();

        // -----------------
        // Conversion Rate
        // -----------------
        $totalVisitors = User::count();
        $converted = Transaction::where('status','success')->distinct('user_id')->count();
        $conversionRate = $totalVisitors ? round(($converted / $totalVisitors) * 100, 2) : 0;

        // -----------------
        // Payment Failure
        // -----------------
        $failedTransactions = Transaction::where('status', 'failed')->count();
        $failureRate = Transaction::count() ? round(($failedTransactions / Transaction::count()) * 100, 2) : 0;
        $failureVolume = Transaction::where('status','failed')->sum('amount');

        return view('analytics', compact(
            'successRate','transactions','volume','totalGmv','highestGmv','lowestGmv',
            'conversionRate','totalVisitors','converted',
            'failedTransactions','failureRate','failureVolume'
        ));
    }*/
        return view('Summary.analytics');
}
}
