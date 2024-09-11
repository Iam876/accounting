<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billings;
class BillingController extends Controller
{
    // public function index($status = 'all') {
    //     // Fetch all billing data with relations
    //     $billingsData = Billings::with(['student.school', 'apartment', 'paymentMethod', 'payments'])->get();
        
    //     // Filter based on the status
    //     switch($status) {
    //         case 'paid':
    //             $filteredBillings = $billingsData->filter(function($billing) {
    //                 return $billing->isPaid();
    //             });
    //             break;
    //         case 'unpaid':
    //             $filteredBillings = $billingsData->filter(function($billing) {
    //                 return $billing->isUnpaid();
    //             });
    //             break;
    //         case 'overdue':
    //             $filteredBillings = $billingsData->filter(function($billing) {
    //                 return $billing->isOverdue();
    //             });
    //             break;
    //         case 'partially-paid':
    //             $filteredBillings = $billingsData->filter(function($billing) {
    //                 return $billing->isPartiallyPaid();
    //             });
    //             break;
    //         default:
    //             $filteredBillings = $billingsData; // All billings
    //             break;
    //     }
        
    //     // Passing filtered data to the view
    //     return view('billing_index', [
    //         'allBillings' => $filteredBillings,
    //         'currentStatus' => $status
    //     ]);
    // }
    
    
    
    public function index($status = null) {
        // Fetch all billing data with relations
        $billingsData = Billings::with(['student.school', 'apartment', 'paymentMethod', 'payments'])->get();

    
        // Filter based on the status if provided
        if ($status) {
            switch($status) {
                case 'paid':
                    $filteredBillings = $billingsData->filter(function($billing) {
                        return $billing->isPaid();
                    });
                    break;
                case 'unpaid':
                    $filteredBillings = $billingsData->filter(function($billing) {
                        return $billing->isUnpaid();
                    });
                    break;
                case 'overdue':
                    $filteredBillings = $billingsData->filter(function($billing) {
                        return $billing->isOverdue();
                    });
                    break;
                case 'partially-paid':
                    $filteredBillings = $billingsData->filter(function($billing) {
                        return $billing->isPartiallyPaid();
                    });
                    break;
                case 'draft':
                    $filteredBillings = $billingsData->filter(function($billing) {
                        return $billing->status == 'draft';
                    });
                    break;
                default:
                    $filteredBillings = $billingsData; // All billings if status doesn't match
                    break;
            }
        } else {
            // If no status provided, show all billings
            $filteredBillings = $billingsData;
        }
        
        // Passing filtered data to the view
        return view('billing_index', [
            'allBillings' => $filteredBillings, // Filtered or all data
            'currentStatus' => $status ?? 'all' // Handle null status as 'all'
        ]);
    }
    

}
