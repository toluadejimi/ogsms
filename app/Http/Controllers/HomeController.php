<?php

namespace App\Http\Controllers;

use App\Models\AccountDetail;
use App\Models\Deposit;
use App\Models\ManualPayment;
use App\Models\PaymentMethod;
use App\Models\Setting;
use App\Models\SoldLog;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index(request $request)
    {
        $data['services'] = get_services();
        $data['get_rate'] = Setting::where('id', 1)->first()->rate;
        $data['margin'] = Setting::where('id', 1)->first()->margin;

        $data['verification'] = Verification::latest()->where('user_id', Auth::id())->paginate('10');


        $data['order'] = 0;


        return view('welcome', $data);
    }


    public function home(request $request)
    {

        $data['services'] = get_services();
        $data['get_rate'] = Setting::where('id', 1)->first()->rate;
        $data['margin'] = Setting::where('id', 1)->first()->margin;
        $data['verification'] = Verification::latest()->where('user_id', Auth::id())->paginate('10');
        $data['order'] = 0;
        $verification = Verification::latest()->where('user_id', Auth::id())->get();
        $data['pend'] = 0;
        $data['product'] = null;
        $data['orders'] = Verification::latest()->where('user_id', Auth::id())->get();

        return view('home', $data);
    }


    public function pendng_sms(Request $request)
    {

        return view('receive-sms');

    }


    public function order_now(Request $request)
    {


        $total_funded = Transaction::where('user_id', Auth::id())->where('status', 2)->sum('amount');
        $total_bought = verification::where('user_id', Auth::id())->where('status', 2)->sum('cost');
        if($total_funded < $total_bought){
            User::where('id', Auth::id())->update(['status' => 9]);
            Auth::logout();


            return redirect('ban');

        }

        if ($request->price < 0 || $request->price == 0) {
            return back()->with('error', "something went wrong");
        }

        if ($request->price < 500) {
            return back()->with('error', "something went wrong");
        }


        if (Auth::user()->wallet < 0) {
            return back()->with('error', "Insufficient Funds");
        }

        if (Auth::user()->wallet < $request->price) {
            return back()->with('error', "Insufficient Funds");
        }

        if (Auth::user()->wallet < $request->price) {
            return back()->with('error', "Insufficient Funds");
        }

        $data['get_rate'] = Setting::where('id', 1)->first()->rate;
        $data['margin'] = Setting::where('id', 1)->first()->margin;


        $service = $request->service;

        $gcost = get_d_price($service);

        $costs = ($data['get_rate'] * $gcost) + $data['margin'];
        if (Auth::user()->wallet < $costs) {
            return back()->with('error', "Insufficient Funds");
        }


        $service = $request->service;
        $price = $request->price;
        $cost = $request->cost;
        $service_name = $request->name;

        $order = create_order($service, $price, $cost, $service_name, $costs);


        if ($order['code'] == 8) {
            return back()->with('error', "Insufficient Funds");
        }


        if ($order['code'] == 7) {
            return redirect('ban');
        }

        if ($order['code'] == 8) {
            return back()->with('error', "Insufficient Funds");
        }

        if ($order == 8) {
            return back()->with('error', "Insufficient Funds");
        }


        //dd($order);

        if ($order['code'] == 9) {

            $ver = Verification::where('status', 1)->first() ?? null;
            if ($ver != null) {
                return redirect('us');
            }
            return redirect('us');
        }

        if ($order['code'] == 0) {
            return redirect('home')->with('error', 'Number Currently out of stock, Please check back later');
        }


        if ($order['code'] == 1) {

            $data['sms_order'] = Verification::where('id', $order['id'])->first();
            $data['order'] = 1;
            return view('receivesms', $data);

        }
    }


    public function receive_sms(Request $request)
    {

        $type = Verification::where('user_id', Auth::id())->where('id', $request->phone)->first()->type;
        if ($type == 2) {
            $data['sms_order'] = Verification::where('user_id', Auth::id())->where('id', $request->phone)->first();
            $data['order'] = 1;

            $data['verification'] = Verification::where('user_id', Auth::id())->paginate(10);

            return view('receivesmsworld', $data);

        }
        $data['sms_order'] = Verification::where('user_id', Auth::id())->where('id', $request->phone)->first();
        $data['order'] = 1;

        $data['verification'] = Verification::latest()->where('user_id', Auth::id())->paginate(10);

        return view('receivesms', $data);

    }


    public function admin_cancle_sms(Request $request)

    {


        $order = Verification::where('id', $request->id)->first() ?? null;
        $user_id = $order->user_id;


        if ($order == null) {
            return redirect('us')->with('error', 'Order not found');
        }

        if ($order->status == 2) {
            return redirect('us')->with('message', "Order Completed");
        }

        if ($order->status == 1 && $order->type == 1) {

            $orderID = $order->order_id;
            $can_order = cancel_order($orderID);

            if ($request->delete == 1) {

                if ($order->status == 1) {

                    $amount = number_format($order->cost, 2);
                    User::where('id', $user_id)->increment('wallet', $order->cost);
                    Verification::where('id', $request->id)->delete();
                    return back()->with('message', "Order has been cancled, NGN$amount has been refunded");


                }


            }


            if ($can_order == 0) {
                $amount = number_format($order->cost, 2);
                User::where('id', $user_id)->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return back()->with('error', "Order has been removed, NGN$order->cost has been refunded");
            }


            if ($can_order == 1) {
                $amount = number_format($order->cost, 2);
                User::where('id', $user_id)->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return back()->with('message', "Order has been canceled, NGN$amount has been refunded");
            }


            if ($can_order == 3) {
                $order = Verification::where('id', $request->id)->first() ?? null;
                if ($order->status != 1 || $order == null) {
                    return back()->with('error', "Please try again later");
                }
                $amount = number_format($order->cost, 2);
                User::where('id', $user_id)->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return redirect()->with('message', "Order has been canceled, NGN$amount has been refunded");
            }
        }

        if ($order->status == 1 && $order->type == 2) {


            $orderID = $order->order_id;

            $can_order = cancel_world_order($orderID);

            if ($request->delete == 1) {


                if ($order->status == 1) {

                    $amount = number_format($order->cost, 2);
                    User::where('id', $user_id)->increment('wallet', $order->cost);
                    Verification::where('id', $request->id)->delete();
                    return back()->with('message', "Order has been canceled, NGN$amount has been refunded");


                }


            }


            if ($can_order == 0) {
                return back()->with('message', "Your order cannot be cancelled yet, please try again later.");
            }


            if ($can_order == 1) {
                $amount = number_format($order->cost, 2);
                User::where('id', $user_id)->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return back()->with('message', "Order has been canceled, NGN$amount has been refunded");
            }


            if ($can_order == 3) {
                $order = Verification::where('id', $request->id)->first() ?? null;
                if ($order->status != 1 || $order == null) {
                    return back()->with('error', "Please try again later");
                }
                $amount = number_format($order->cost, 2);
                User::where('id', $user_id)->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return back()->with('message', "Order has been canceled, NGN$amount has been refunded");
            }
        }
    }


    public function cancle_sms(Request $request)
    {


        $order = Verification::where('id', $request->id)->first() ?? null;


        if ($order == null) {
            return redirect('us')->with('error', 'Order not found');
        }

        if ($order->status == 2) {
            return redirect('us')->with('message', "Order Completed");
        }

        if ($order->status == 1 && $order->type == 1) {

            $orderID = $order->order_id;
            $can_order = cancel_order($orderID);

            if ($request->delete == 1) {

                if ($order->status == 1) {

                    $amount = number_format($order->cost, 2);
                    User::where('id', Auth::id())->increment('wallet', $order->cost);
                    Verification::where('id', $request->id)->delete();
                    return redirect('us')->with('message', "Order has been cancled, NGN$amount has been refunded");


                }


            }


            if ($can_order == 0) {
                return redirect('us')->with('error', "Order has been removed");
            }


            if ($can_order == 1) {
                $amount = number_format($order->cost, 2);
                User::where('id', Auth::id())->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return redirect('us')->with('message', "Order has been canceled, NGN$amount has been refunded");
            }


            if ($can_order == 3) {
                $order = Verification::where('id', $request->id)->first() ?? null;
                if ($order->status != 1 || $order == null) {
                    return redirect('us')->with('error', "Please try again later");
                }
                $amount = number_format($order->cost, 2);
                User::where('id', Auth::id())->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return redirect('us')->with('message', "Order has been canceled, NGN$amount has been refunded");
            }
        }

        if ($order->status == 1 && $order->type == 2) {


            $orderID = $order->order_id;

            $can_order = cancel_world_order($orderID);

            if ($request->delete == 1) {


                if ($order->status == 1) {

                    $amount = number_format($order->cost, 2);
                    User::where('id', Auth::id())->increment('wallet', $order->cost);
                    Verification::where('id', $request->id)->delete();
                    return redirect('us')->with('message', "Order has been canceled, NGN$amount has been refunded");


                }


            }


            if ($can_order == 0) {
                return back()->with('message', "Your order cannot be cancelled yet, please try again later.");
            }


            if ($can_order == 1) {
                $amount = number_format($order->cost, 2);
                User::where('id', Auth::id())->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return redirect('us')->with('message', "Order has been canceled, NGN$amount has been refunded");
            }


            if ($can_order == 3) {
                $order = Verification::where('id', $request->id)->first() ?? null;
                if ($order->status != 1 || $order == null) {
                    return redirect('us')->with('error', "Please try again later");
                }
                $amount = number_format($order->cost, 2);
                User::where('id', Auth::id())->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return redirect('us')->with('message', "Order has been canceled, NGN$amount has been refunded");
            }
        }
    }


    public function check_sms(Request $request)
    {

        $order = Verification::where('id', $request->id)->first() ?? null;
        if ($request->count == 1) {

            $status = $order->status;

            if ($status == 1 || $status == 0) {

                $amount = number_format($order->cost, 2);
                User::where('id', Auth::id())->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return redirect('home')->with('message', "Order has been canceled, NGN$amount has been refunded");

            }
        }

        $orderID = $order->order_id;
        $chk = check_sms($orderID);
        if ($chk == 3) {
            return redirect('home')->with('message', 'Sms Received, order completed');
        }

        if ($chk == 1) {
            return back()->with('error', 'No order found');
        }

        if ($chk == 2) {
            return back()->with('message', 'Please wait we are getting your sms');
        }

        if ($chk == 4) {
            return back()->with('error', 'Order has been cancled');
        }

    }

    public function fund_wallet(Request $request)
    {
        $user = Auth::id() ?? null;
        $pay = PaymentMethod::all();
        $transaction = Transaction::query()
            ->orderByRaw('updated_at DESC')
            ->where('user_id', Auth::id())
            ->paginate(10);

        return view('fund-wallet', compact('user', 'pay', 'transaction'));
    }


    public function fund_now(Request $request)
    {

        $request->validate([
            'amount' => 'required|numeric|gt:0',
        ]);


            Transaction::where('user_id', Auth::id())->where('status', 1)->delete() ?? null;


        if ($request->type == 1) {

            if ($request->amount < 1000) {
                return back()->with('error', 'You can not fund less than NGN 1,000');
            }


            if ($request->amount > 100000) {
                return back()->with('error', 'You can not fund more than NGN 100,000');
            }


            $key = env('WEBKEY');
            $ref = "VERF" . random_int(000, 999) . date('ymdhis');
            $email = Auth::user()->email;

            $url = "https://web.enkpay.com/pay?amount=$request->amount&key=$key&ref=$ref&email=$email";


            $data = new Transaction();
            $data->user_id = Auth::id();
            $data->amount = $request->amount;
            $data->ref_id = $ref;
            $data->type = 2;
            $data->status = 1; //initiate
            $data->save();


            $message = Auth::user()->email . "| wants to fund |  NGN " . number_format($request->amount) . " | with ref | $ref |  on OGSMSPOOL";
            send_notification2($message);


            return Redirect::to($url);
        }


        if ($request->type == 2) {

            if ($request->amount < 1000) {
                return back()->with('error', 'You can not fund less than NGN 1000');
            }


            if ($request->amount > 100000) {
                return back()->with('error', 'You can not fund more than NGN 100,000');
            }


            $ref = "VERFM" . random_int(000, 999) . date('ymdhis');
            $email = Auth::user()->email;


            $data = new Transaction();
            $data->user_id = Auth::id();
            $data->amount = $request->amount;
            $data->ref_id = $ref;
            $data->type = 2; //manual funding
            $data->status = 0; //initiate
            $data->save();


            $message = Auth::user()->email . "| wants to fund Manually |  NGN " . number_format($request->amount) . " | with ref | $ref |  on OGSMSPOOL";
            send_notification2($message);


            $data['account_details'] = AccountDetail::where('id', 1)->first();
            $data['amount'] = $request->amount;
            $data['ref'] = $ref;


            return view('manual-fund', $data);
        }


    }


    public function fund_manual_now(Request $request)
    {


        if ($request->receipt == null) {
            return back()->with('error', "Payment receipt is required");
        }


        $file = $request->file('receipt');
        $receipt_fileName = date("ymis") . $file->getClientOriginalName();
        $destinationPath = public_path() . 'upload/receipt';
        $request->receipt->move(public_path('upload/receipt'), $receipt_fileName);


        $pay = new ManualPayment();
        $pay->receipt = $receipt_fileName;
        $pay->user_id = Auth::id();
        $pay->amount = $request->amount;
        $pay->order_id = $request->order_id;
        $pay->save();

        $message = Auth::user()->email . "| submitted payment receipt |  NGN " . number_format($request->amount) . " | on OGSMSPOOL";
        send_notification2($message);

        return view('confirm-pay');
    }


    public function confirm_pay(Request $request)
    {

        return view('confirm-pay');
    }



//    public function verify_payment(request $request)
//    {
//
//        $trx_id = $request->trans_id;
//        $ip = $request->ip();
//        $status = $request->status;
//
//
//        if ($status == 'failed') {
//
//
//            $message = Auth::user()->email . "| Cancled |  NGN " . number_format($request->amount) . " | with ref | $trx_id |  on OGSMSPOOL";
//            send_notification2($message);
//
//
//            Transaction::where('ref_id', $trx_id)->where('status', 1)->update(['status' => 3]);
//            return redirect('fund-wallet')->with('error', 'Transaction Declined');
//        }
//
//
//
//
//        $trxstatus = Transaction::where('ref_id', $trx_id)->first()->status ?? null;
//
//        if ($trxstatus == 2) {
//
//            $message =  Auth::user()->email . "| is trying to fund  with | " . number_format($request->amount, 2) . "\n\n IP ====> " . $request->ip();
//            send_notification($message);
//
//            $message =  Auth::user()->email . "| on OGSMSPOOL | is trying to fund  with | " . number_format($request->amount, 2) . "\n\n IP ====> " . $request->ip();
//            send_notification2($message);
//
//            return redirect('fund-wallet')->with('error', 'Transaction already confirmed or not found');
//        }
//
//        $curl = curl_init();
//
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => 'https://web.enkpay.com/api/verify',
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => '',
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 0,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => 'POST',
//            CURLOPT_POSTFIELDS => array('trans_id' => "$trx_id"),
//        ));
//
//        $var = curl_exec($curl);
//        curl_close($curl);
//        $var = json_decode($var);
//
//        $status1 = $var->detail ?? null;
//        $amount = $var->price ?? null;
//
//
//
//
//        if ($status1 == 'success') {
//
//            $chk_trx = Transaction::where('ref_id', $trx_id)->first() ?? null;
//            if ($chk_trx == null) {
//                return back()->with('error', 'Transaction not processed, Contact Admin');
//            }
//
//            Transaction::where('ref_id', $trx_id)->update(['status' => 2]);
//            User::where('id', Auth::id())->increment('wallet', $amount);
//
//            $message =  Auth::user()->email . "| just funded NGN" . number_format($request->amount, 2) . " on Log market";
//            send_notification($message);
//
//
//
//
//
//            $order_id = $trx_id;
//            $databody = array('order_id' => "$order_id");
//
//            curl_setopt_array($curl, array(
//                CURLOPT_URL => 'https://web.enkpay.com/api/resolve-complete',
//                CURLOPT_RETURNTRANSFER => true,
//                CURLOPT_ENCODING => '',
//                CURLOPT_MAXREDIRS => 10,
//                CURLOPT_TIMEOUT => 0,
//                CURLOPT_FOLLOWLOCATION => true,
//                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                CURLOPT_CUSTOMREQUEST => 'POST',
//                CURLOPT_POSTFIELDS => $databody,
//            ));
//
//            $var = curl_exec($curl);
//            curl_close($curl);
//            $var = json_decode($var);
//
//
//            $message = Auth::user()->email . "| Just funded |  NGN " . number_format($request->amount) . " | with ref | $order_id |  on OGSMSPOOL";
//            send_notification2($message);
//
//
//
//
//
//
//            return redirect('fund-wallet')->with('message', "Wallet has been funded with $amount");
//        }
//
//        return redirect('fund-wallet')->with('error', 'Transaction already confirmed or not found');
//    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        $st = User::where('email', $request->email)->first()->status ?? null;
        if ($st == 9) {
            return view('ban');
        }

        if (Auth::attempt($credentials)) {
            $user = Auth::id() ?? null;

//            $total_trx = Transaction::where(['user_id' => Auth::id(),'type' => 2, 'status' => 2  ])->sum('amount');
//            $total_ver = Verification::where(['user_id' => Auth::id(), 'status' => 2  ])->sum('cost');
//
//            if($total_ver > $total_trx){
//                User::where('id', Auth::id())->update(['status' => 9]);
//                return view('ban');
//
//            }


            return redirect('us');
        }

        return back()->with('error', "Email or Password Incorrect");
    }


    public function register_index(Request $request)
    {
        return view('Auth.register');
    }


    public function login_index(Request $request)
    {
        return view('Auth.login');
    }

    public function ban_view(Request $request)
    {
        return view('ban');
    }


    public function ban_user(Request $request)
    {
        User::where('id', $request->user_id)->update(['status' => 9]);
        return back()->with('message', 'User ban successfully');
    }

    public function unban_user(Request $request)
    {
        User::where('id', $request->user_id)->update(['status' => 2]);
        return back()->with('message', 'User unban successfully');
    }


    public function forget_password(Request $request)
    {
        return view('Auth.forgot-password');
    }


    public function register(Request $request)
    {
        // Validate the user input
        $validatedData = $request->validate([
            'username' => 'required||string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:4|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Log in the user after registration (optional)
        auth()->login($user);

        // Redirect the user to a protected route or dashboard
        return redirect('home');
    }


    public function profile(request $request)
    {


        $user = Auth::id();
        $orders = SoldLog::latest()->where('user_id', Auth::id())->paginate(5);


        return view('profile', compact('user', 'orders'));
    }


    public function logout(Request $request)
    {

        Auth::logout();
        return redirect('/');
    }


    public function change_password(request $request)
    {

        $user = Auth::id();


        return view('change-password', compact('user'));
    }


    public function faq(request $request)
    {
        $user = Auth::id();
        return view('faq', compact('user'));
    }

    public function terms(request $request)
    {
        $user = Auth::id();
        return view('terms', compact('user'));
    }

    public function rules(request $request)
    {
        $user = Auth::id();
        return view('rules', compact('user'));
    }


    public function update_password_now(request $request)
    {
        // Validate the user input
        $validatedData = $request->validate([
            'password' => 'required|string|min:4|confirmed',
        ]);

        User::where('id', Auth::id())->update([
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect the user to a protected route or dashboard
        return back()->with('message', 'Password Changed Successfully');
    }


    // public function forget_password(request $request)
    // {

    //     $user = Auth::id() ?? null;

    //     return view('forget-password', compact('user'));
    // }

    public function reset_password(request $request)
    {

        $email = $request->email;
        $expiryTimestamp = time() + 24 * 60 * 60; // 24 hours in seconds
        $url = url('') . "/verify-password?code=$expiryTimestamp&email=$request->email";

        $ck = User::where('email', $request->email)->first()->email ?? null;
        $username = User::where('email', $request->email)->first()->username ?? null;


        if ($ck == $request->email) {

            User::where('email', $email)->update([
                'code' => $expiryTimestamp
            ]);

            $data = array(
                'fromsender' => 'noreply@ogsmspool.com', 'OGSMSPOOL',
                'subject' => "Reset Password",
                'toreceiver' => $email,
                'url' => $url,
                'user' => $username,
            );


            Mail::send('reset-password-mail', ["data1" => $data], function ($message) use ($data) {
                $message->from($data['fromsender']);
                $message->to($data['toreceiver']);
                $message->subject($data['subject']);
            });


            return redirect('/forgot-password')->with('message', "A reset password mail has been sent to $request->email, if not inside inbox check your spam folder");
        } else {
            return back()->with('error', 'Email can not be found on our system');
        }
    }


    public function verify_password(request $request)
    {

        $code = User::where('email', $request->email)->first()->code;


        $storedExpiryTimestamp = $request->code;;

        if (time() >= $storedExpiryTimestamp) {

            $user = Auth::id() ?? null;
            $email = $request->email;
            return view('expired', compact('user', 'email'));
        } else {

            $user = Auth::id() ?? null;
            $email = $request->email;

            return view('verify-password', compact('user', 'email'));
        }
    }


    public function expired(request $request)
    {
        $user = Auth::id() ?? null;
        return view('expired', compact('user'));
    }

    public function reset_password_now(request $request)
    {

        $validatedData = $request->validate([
            'password' => 'required|string|min:4|confirmed',
        ]);


        $password = Hash::make($validatedData['password']);

        User::where('email', $request->email)->update([

            'password' => $password

        ]);

        return redirect('/login')->with('message', 'Password reset successful, Please login to continue');
    }




//    public function resloveDeposit(Request $request)
//    {
//        $dep = Transaction::where('ref_id', $request->trx_ref)->first() ?? null;
//
//
//        if ($dep == null) {
//            return back()->with('error', "Transaction not Found");
//        }
//
//        if ($dep->status == 2) {
//            return back()->with('error', "This Transaction has been successful");
//        }
//
//
//        if ($dep->status == 4) {
//            return back()->with('error', "This Transaction has been resolved");
//        }
//
//
//        if ($dep == null) {
//            return back()->with('error', "Transaction has been deleted");
//        } else {
//
//            $ref = $request->trx_ref;
//            $user =  Auth::user() ?? null;
//            return view('resolve-page', compact('ref', 'user'));
//        }
//    }


//    public function  resolveNow(request $request)
//    {
//
//        if ($request->trx_ref == null || $request->session_id == null) {
//            return back()->with('error', "Session ID or Ref Can not be null");
//        }
//
//
//        $trx = Transaction::where('ref_id', $request->trx_ref)->first()->status ?? null;
//        $ck_trx = (int)$trx;
//        if ($ck_trx == 2) {
//
//            $email = Auth::user()->email;
//            $message =  "$email | OGSMSPOOL  | is trying to fund and a successful order with orderid $request->trx_ref";
//            send_notification2($message);
//
//            $message =  "$email | OGSMSPOOL  | is trying to fund and a successful order with orderid $request->trx_ref";
//            send_notification($message);
//
//            return back()->with('error', "This Transaction has been successful");
//        }
//
//
//
//        if ($ck_trx != 1) {
//
//            $email = Auth::user()->email;
//            $message =  "$email | OGSMSPOOL  | is trying to fund and a successful order with orderid $request->trx_ref";
//            send_notification2($message);
//
//
//
//            $message =  "$email | OGSMSPOOL | is trying to fund and a successful order with orderid $request->trx_ref";
//            send_notification($message);
//
//
//
//
//
//            return back()->with('error', "This Transaction has been successful");
//        }
//
//        if ($ck_trx == 2) {
//
//            $email = Auth::user()->email;
//            $message =  "$email |OGSMSPOOL | is trying to fund and a successful order with orderid $request->trx_ref";
//            send_notification2($message);
//
//            $message =  "$email | OGSMSPOOL | is trying to fund and a successful order with orderid $request->trx_ref";
//            send_notification($message);
//
//
//
//
//
//
//
//            return back()->with('error', "This Transaction has been successful");
//        }
//
//
//        if ($ck_trx == 4) {
//
//            $email = Auth::user()->email;
//            $message =  "$email |OGSMSPOOL | is trying to fund and a successful order with orderid $request->trx_ref";
//            send_notification2($message);
//
//            $message =  "$email | OGSMSPOOL | is trying to fund and a successful order with orderid $request->trx_ref";
//            send_notification($message);
//
//            return back()->with('error', "This Transaction has been resolved");
//        }
//
//
//
//
//
//
//        if ($ck_trx == 1) {
//            $session_id = $request->session_id;
//            if ($session_id == null) {
//                $notify[] = ['error', "session id or amount cant be empty"];
//                return back()->withNotify($notify);
//            }
//
//
//            $curl = curl_init();
//            $databody = array(
//                'session_id' => "$session_id",
//                'ref' => "$request->trx_ref"
//
//            );
//
//            curl_setopt_array($curl, array(
//                CURLOPT_URL => 'https://web.enkpay.com/api/resolve',
//                CURLOPT_RETURNTRANSFER => true,
//                CURLOPT_ENCODING => '',
//                CURLOPT_MAXREDIRS => 10,
//                CURLOPT_TIMEOUT => 0,
//                CURLOPT_FOLLOWLOCATION => true,
//                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                CURLOPT_CUSTOMREQUEST => 'POST',
//                CURLOPT_POSTFIELDS => $databody,
//            ));
//
//            $var = curl_exec($curl);
//            curl_close($curl);
//            $var = json_decode($var);
//
//
//            $messager = $var->message ?? null;
//            $status = $var->status ?? null;
//            $trx = $var->trx ?? null;
//            $amount = $var->amount ?? null;
//
//            if ($status == true) {
//                User::where('id', Auth::id())->increment('wallet', $var->amount);
//                Transaction::where('ref_id', $request->trx_ref)->update(['status' => 2]);
//
//
//                $user_email = Auth::user()->email;
//                $message = "$user_email | $request->trx_ref | $session_id | $var->amount | just resolved deposit | OGSMSPOOL";
//                send_notification($message);
//                send_notification2($message);
//
//
//
//
//
//
//                return redirect('fund-wallet')->with('message', "Transaction successfully Resolved, NGN $amount added to ur wallet");
//            }
//
//            if ($status == false) {
//                return back()->with('error', "$messager");
//            }
//
//            return back()->with('error', "please try again later");
//        }
//    }
//

    public function get_smscode(request $request)
    {


        $sms = Verification::where('phone', $request->num)->first()->sms ?? null;
        $order_id = Verification::where('phone', $request->id)->first()->order_id ?? null;
      //  check_sms($order_id);

        $originalString = 'waiting for sms';
        $processedString = str_replace('"', '', $originalString);


        if ($sms == null) {
            return response()->json([
                'message' => $processedString
            ]);
        } else {

            return response()->json([
                'message' => $sms
            ]);
        }
    }


    public function webhook(request $request)
    {

        $activationId = $request->activationId;
        $messageId = $request->messageId;
        $service = $request->service;
        $text = $request->text;
        $code = $request->code;
        $country = $request->country;
        $receivedAt = $request->receivedAt;
        $orders = Verification::where('order_id', $activationId)->update(['sms' => $code, 'status' => 2]);


        $message = json_encode($request->all());
        send_notification($message);


    }


    public function world_webhook(request $request)
    {

        $activationId = $request->orderid;
        $messageId = $request->messageId;
        $service = $request->service;
        $text = $request->text;
        $code = $request->sms;
        $country = $request->country;
        $receivedAt = $request->receivedAt;
        $orders = Verification::where('order_id', $activationId)->update(['sms' => $code, 'status' => 2]);


        $message = json_encode($request->all());
        send_notification($message);


    }


    public function diasy_webhook(request $request)
    {


        try {

            $message = json_encode($request->all());
            send_notification($message);


            $activationId = "$request->activationId";
            $messageId = $request->messageId;
            $service = $request->service;
            $text = $request->text;
            $code = $request->code;
            $country = $request->country;
            $receivedAt = $request->receivedAt;
            Verification::where('order_id', $activationId)->update([
                'sms' => $code,
                'full_sms' => $text,
                'status' => 2,
                'updated_at' => now(),
            ]);

            return response()->json([
                'status' => "success",
                'order_id' => $request->activationId
            ]);

        } catch (\Exception $th) {
            $message = json_encode($th->getMessage());
            send_notification($message);
        }




    }


    public function orders(request $request)
    {
        $orders = Verification::latest()->where('user_id', Auth::id())->get() ?? null;
        $spent = Verification::where('user_id', Auth::id())->where('status', 2)->sum('cost');
        $verification = Verification::where('user_id', Auth::id())->where('status', 2)->count();
        return view('orders', compact('orders', 'spent', 'verification'));
    }


    public function about_us(request $request)
    {

        return view('about-us');
    }


    public function policy(request $request)
    {

        return view('policy');
    }


    public function delete_order_admin(request $request)
    {

        $get_user_id = Verification::where('id', $request->id)->first()->user_id;
        $cost = Verification::where('id', $request->id)->first()->cost;
        User::where('id', $get_user_id)->increment('wallet', $cost);
        Verification::where('id', $request->id)->delete();


        return back()->with('message', "Order has been successfully deleted");


    }


    public function delete_order(request $request)
    {
        $order = Verification::where('id', $request->id)->first() ?? null;

        if ($order->status == 1 && $order->type == 2) {

            $orderID = $order->order_id;
            $can_order = cancel_world_order($orderID);


            if ($can_order == 0) {
                return back()->with('error', "Please wait and try again later");
            }


            if ($can_order == 1) {


                $amount = number_format($order->cost, 2);
                User::where('id', Auth::id())->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return back()->with('message', "Order has been cancled, NGN$amount has been refunded");
            }


            if ($can_order == 3) {

                $amount = number_format($order->cost, 2);
                User::where('id', Auth::id())->increment('wallet', $order->cost);
                Verification::where('id', $request->id)->delete();
                return back()->with('message', "Order has been cancled, NGN$amount has been refunded");
            }
        }

        if ($order->status == 1 && $order->type == 1) {

            $order = Verification::where('id', $request->id)->first() ?? null;


            if ($order == null) {
                return redirect('home')->with('error', 'Order not found');
            }

            if ($order->status == 2) {
                Verification::where('id', $request->id)->delete();
                return back()->with('message', "Order has been successfully deleted");
            }

            if ($order->status == 1) {

                $orderID = $order->order_id;
                $can_order = cancel_order($orderID);

                if ($can_order == 0) {
                    return back()->with('error', "Please wait and try again later");
                }


                if ($can_order == 1) {
                    $amount = number_format($order->cost, 2);
                    User::where('id', Auth::id())->increment('wallet', $order->cost);
                    Verification::where('id', $request->id)->delete();
                    return back()->with('message', "Order has been cancled, NGN$amount has been refunded");
                }


                if ($can_order == 3) {
                    $amount = number_format($order->cost, 2);
                    User::where('id', Auth::id())->increment('wallet', $order->cost);
                    Verification::where('id', $request->id)->delete();
                    return back()->with('message', "Order has been cancled, NGN$amount has been refunded");
                }
            }

        }


        if ($order->status == 1 && $order->type == 3) {


            $token = env('SIMTOKEN');
            $ch = curl_init();
            $id = Verification::where('id', $request->id)->first()->order_id ?? null;
            $cost = Verification::where('id', $request->id)->first()->cost ?? null;
            $user_id = Verification::where('id', $request->id)->first()->user_id ?? null;

            if ($id == null) {
                return back()->with('error', "Verification has been deleted");
            }

            curl_setopt($ch, CURLOPT_URL, 'https://5sim.net/v1/user/cancel/' . $id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


            $headers = array();
            $headers[] = 'Authorization: Bearer ' . $token;
            $headers[] = 'Accept: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            curl_close($ch);
            $var = json_decode($result);
            $status = $var->status ?? null;


            if ($status == "CANCELED") {

                Verification::where('id', $request->id)->delete();
                User::where('id', $user_id)->increment('wallet', $cost);
                return back()->with('message', "Number Canceled, NGN $cost has been refunded");

            }

            $status = Verification::where('id', $request->id)->first()->status ?? null;

            if ($status != null && $status != 2) {
                Verification::where('id', $request->id)->delete();
                User::where('id', $user_id)->increment('wallet', $cost);
                return back()->with('message', "Number Canceled, NGN $cost has been refunded");
            }


        }


    }


//    public function delete_w_order(request $request)
//    {
//
//        $order = Verification::where('id', $request->id)->first() ?? null;
//
//
//        if ($order == null) {
//            return redirect('home')->with('error', 'Order not found');
//        }
//
//        if ($order->status == 2) {
//            Verification::where('id', $request->id)->delete();
//            return back()->with('message', "Order has been successfully deleted");
//        }
//
//        if ($order->status == 1) {
//
//            $orderID = $order->order_id;
//            $can_order = cancel_order($orderID);
//
//            if ($can_order == 0) {
//                return back()->with('error', "Please wait and try again later");
//            }
//
//
//            if ($can_order == 1) {
//                $amount = number_format($order->cost, 2);
//                User::where('id', Auth::id())->increment('wallet', $order->cost);
//                Verification::where('id', $request->id)->delete();
//                return back()->with('message', "Order has been cancled, NGN$amount has been refunded");
//            }
//
//
//            if ($can_order == 3) {
//                $amount = number_format($order->cost, 2);
//                User::where('id', Auth::id())->increment('wallet', $order->cost);
//                Verification::where('id', $request->id)->delete();
//                return back()->with('message', "Order has been cancled, NGN$amount has been refunded");
//            }
//        }
//
//        if ($order->status == 1 && $order->type == 2 ) {
//
//
//
//            $orderID = $order->order_id;
//            $can_order = cancel_world_order($orderID);
//
//            if ($can_order == 0) {
//                return back()->with('error', "Please wait and try again later");
//            }
//
//
//            if ($can_order == 1) {
//                $amount = number_format($order->cost, 2);
//                User::where('id', Auth::id())->increment('wallet', $order->cost);
//                Verification::where('id', $request->id)->delete();
//                return back()->with('message', "Order has been cancled, NGN$amount has been refunded");
//            }
//
//
//            if ($can_order == 3) {
//                $amount = number_format($order->cost, 2);
//                User::where('id', Auth::id())->increment('wallet', $order->cost);
//                Verification::where('id', $request->id)->delete();
//                return back()->with('message', "Order has been cancled, NGN$amount has been refunded");
//            }
//        }
//    }


    public function e_check(request $request)
    {

        $get_user = User::where('email', $request->email)->first() ?? null;

        if ($get_user == null) {

            return response()->json([
                'status' => false,
                'message' => 'No user found, please check email and try again',
            ]);
        }


        return response()->json([
            'status' => true,
            'user' => $get_user->username,
        ]);
    }


//    public function e_fund(request $request)
//    {
//
//        $get_user =  User::where('email', $request->email)->first() ?? null;
//
//        if ($get_user == null) {
//
//            return response()->json([
//                'status' => false,
//                'message' => 'No user found, please check email and try again',
//            ]);
//        }
//
//            User::where('email', $request->email)->increment('wallet', $request->amount) ?? null;
//
//
//        $amount = number_format($request->amount, 2);
//
//        $get_depo = Transaction::where('ref_id', $request->order_id)->first() ?? null;
//        if ($get_depo == null){
//            $trx = new Transaction();
//            $trx->ref_id = $request->order_id;
//            $trx->user_id = $get_user->id;
//            $trx->status = 2;
//            $trx->amount = $request->amount;
//            $trx->type = 2;
//            $trx->save();
//        }else{
//            Transaction::where('ref_id', $request->order_id)->update(['status'=> 2]);
//        }
//
//        $message = $request->email."| just funded wallet on ace verify | NGN" .$amount;
//        send_notification2($message);
//
//        return response()->json([
//            'status' => true,
//            'message' => "NGN $amount has been successfully added to your wallet",
//        ]);
//    }

    public function verify_username(request $request)
    {

        $get_user = User::where('email', $request->email)->first() ?? null;

        if ($get_user == null) {

            return response()->json([
                'username' => "Not Found, Pleas try again"
            ]);

        }

        return response()->json([
            'username' => $get_user->username
        ]);


    }

    public function api_index(request $request)
    {

        $data['api_key'] = User::where('id', Auth::id())->first()->api_key ?? null;
        $data['webhook_url'] = User::where('id', Auth::id())->first()->webhook_url ?? null;

        return view('api', $data);


    }


    public function set_webhook(request $request)
    {

        User::where('id', Auth::id())->update(['webhook_url' => $request->webhook]);
        return back()->with('message', 'Webhook Set successfully');


    }


    public function generate_token(request $request)
    {

        $token = Str::random(30);

        User::where('id', Auth::id())->update(['api_key' => $token]);
        return back()->with('message', 'Api Key Set successfully');

    }


}
