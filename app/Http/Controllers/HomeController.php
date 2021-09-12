<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\BankAccount;
use App\Models\Bottle;
use App\Models\BottleSize;
use App\Models\Client;
use App\Models\ClientBottle;
use App\Models\Payment;
use App\Models\Salary;
use App\Models\Sell;
use App\Models\SellProductList;
use App\Models\Staff;
use App\Models\Transection;
use App\Models\WaterProduction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allproducts = BottleSize::count();
        $allclient = Client::count();
        $allstaff = Staff::count();
        $allbank = BankAccount::count();
        
        $sell_earn = Payment::sum('payment');
        $account_earn = Account::sum('credit');
        $bank_width = Transection::sum('debit');
        $total_hand_cash = $sell_earn+$account_earn+$bank_width;
        $paysalary = Salary::sum('salary');
        $account_cost = Account::sum('debit');
        $bank_add = Transection::sum('credit');
        $total_cost = $paysalary+$account_cost+$bank_add;
        $hand_cash = $total_hand_cash-$total_cost;

        $total_sell = Sell::sum('sell_ammount');
        $total_get_payment = Payment::sum('payment');
        $total_earnable = $total_sell - $total_get_payment;

        $bank_add= Transection::sum('credit');
        $bank_widh= Transection::sum('debit');
        $bank_avl = $bank_add-$bank_widh;

        $main_bottle = Bottle::where('size_id','6')->sum('pices');

        $client_nise= ClientBottle::sum('taken_bottle');
        $client_dise= ClientBottle::sum('pay_bottle');
        $client_dibe = $client_nise-$client_dise;
        $bottle_ase = $main_bottle-$client_dibe;
        
        $totalproduction = WaterProduction::where('bottle_id','6')->sum('quantity');
        $sell_this_product = SellProductList::where('product_id','6')->sum('quantity');
        $avail_full_fill_bottle = $totalproduction - $sell_this_product;


        return view('home',compact('allproducts','allclient','allstaff','allbank','hand_cash','total_earnable','bank_avl','bottle_ase','avail_full_fill_bottle'));
    }
}
