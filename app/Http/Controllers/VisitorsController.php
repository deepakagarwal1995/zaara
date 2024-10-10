<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Cabs;
use App\Models\local_cities;
use App\Models\Blogs;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\Pages;

use Illuminate\Support\Facades\Mail;
use TCPDF;

use Exception;
use DateTime;

class VisitorsController extends Controller
{
    public function index()
    {

        if (isset($_GET['city']) && $_GET['city'] != '') {
            $loc_city = $_GET['city'];
            $Airport_cab_service = Pages::where('status', '1')->where('cid', 'LIKE', "%{$loc_city}%")->where('category', 'Airport_cab_service')->where('is_home', '1')->latest()->take(12)->get();
        $Luxury_Car_Rental = Pages::where('status', '1')->where('cid', 'LIKE', "%{$loc_city}%")->where('category', 'Luxury_Car_Rental')->where('is_home', '1')->latest()->take(6)->get();
        $Local_sightseeing_package = Pages::where('status', '1')->where('cid', 'LIKE', "%{$loc_city}%")->where('category', 'Local_sightseeing_package')->where('is_home', '1')->latest()->take(6)->get();
        $Outstation_Cab_Booking = Pages::where('status', '1')->where('cid', 'LIKE', "%{$loc_city}%")->where('category', 'Outstation_Cab_Booking')->where('is_home', '1')->latest()->take(12)->get();

        } else {
            $Airport_cab_service = Pages::where('status', '1')->where('category', 'Airport_cab_service')->where('is_home', '1')->latest()->take(12)->get();
            $Luxury_Car_Rental = Pages::where('status', '1')->where('category', 'Luxury_Car_Rental')->where('is_home', '1')->latest()->take(6)->get();
            $Local_sightseeing_package = Pages::where('status', '1')->where('category', 'Local_sightseeing_package')->where('is_home', '1')->latest()->take(6)->get();
            $Outstation_Cab_Booking = Pages::where('status', '1')->where('category', 'Outstation_Cab_Booking')->where('is_home', '1')->latest()->take(12)->get();

        }

        $precence = local_cities::where('status', '1')->groupBy('name')->orderBy('eight_hr', 'DESC')->take(12)->get();
        $two_blog = Blogs::where('status', '1')->latest()->take(2)->get();
        $four_blog = Blogs::where('status', '1')->latest()->skip(2)->take(4)->get();

        return view('visitors.index', compact('two_blog', 'four_blog', 'precence', 'Airport_cab_service', 'Luxury_Car_Rental', 'Local_sightseeing_package', 'Outstation_Cab_Booking'));
    }
    public function local_cabs(Request $request)
    {
        if ($request->start_from != '' && $request->package != '' && $request->start_on != '' && $request->start_time != '') {
            $regular_data = local_cities::join('cabs', 'local_cities.cab_id', '=', 'cabs.id')->where('cabs.type', '1')->where('local_cities.status', '1')->where('local_cities.name', 'LIKE', "%{$request->start_from}%")->orderBy('cabs.orders', 'ASC')->get();

            $luxary_data = local_cities::join('cabs', 'local_cities.cab_id', '=', 'cabs.id')->where('cabs.type', '2')->where('local_cities.status', '1')->where('local_cities.name', 'LIKE', "%{$request->start_from}%")->orderBy('cabs.orders', 'ASC')->get();



            // $luxary_data = local_cities::whereHas('cab', function ($query) {
            //     $query->where('type', '2');$query->orderBy('orders', 'ASC');
            // })->where('status', '1')->where('name', 'LIKE', "%{$request->start_from}%")->get();

            return view('visitors.local_cabs', compact('request', 'regular_data', 'luxary_data'));
        } else {
            return redirect()->route('index')->with('error', 'All Fields Required');
        }
    }
    public function outstation_cabs(Request $request)
    {
        $fromLat = $request->input('from_lat');
        $fromLng = $request->input('from_lng');
        $toLat = $request->input('to_lat');
        $toLng = $request->input('to_lng');

        // Google Distance Matrix API
        $apiKey = env('MAP_KEY'); // Replace with your actual API key
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'query' => [
                'origins' => $fromLat . ',' . $fromLng,
                'destinations' => $toLat . ',' . $toLng,
                'key' => $apiKey
            ]
        ]);
$ded = [
    'origins' => $fromLat . ',' . $fromLng,
    'destinations' => $toLat . ',' . $toLng,
    'key' => $apiKey
];
        $data = json_decode($response->getBody(), true);

        // Check if API response is OK
        if ($data['status'] == 'OK') {
            $distance = $data['rows'][0]['elements'][0]['distance']['value']; // Get distance (in km or meters)
            $distance = round($distance / 1000);
            $distance = $distance*2;
            if ($distance > 0) {


                $startDate = $request->input('start_on');
                $endDate = $request->input('end_on');

                // Create DateTime objects from the selected dates
                $start = DateTime::createFromFormat('d/m/Y', $startDate);
                 $end = DateTime::createFromFormat('d/m/Y', $endDate);

                // Calculate the difference between the two dates
                $interval = $start->diff($end);

                $numberOfDays = $interval->days;

                if ($numberOfDays < 1) {
                    return redirect()->route('index')->with('error', 'Date Error Please select correct Dates');
                }

                $regular_data = Cabs::where('type', '1')->where('status', '1')->orderBy('orders', 'ASC')->get();

                $luxary_data = Cabs::where('type', '2')->where('status', '1')->orderBy('orders', 'ASC')->get();

                return view('visitors.outstation_cabs', compact('request', 'regular_data', 'luxary_data', 'distance', 'numberOfDays'));
            } else {
                return redirect()->route('index')->with('error', 'City Error Please select correct cities');
            }
        } else {
            return redirect()->route('index')->with('error', 'City Error Please select correct cities');
        }
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $cities = local_cities::where('name', 'LIKE', "%{$query}%")->where('status', '1')->groupBy('name')->limit(10)->pluck('name');
        return response()->json($cities);
    }


    public function about()
    {
        return view('visitors.about');
    }
    public function faq()
    {
        return view('visitors.faq');
    }
    public function contact()
    {
        return view('visitors.contact');
    }
    public function termscondition()
    {
        return view('visitors.termscondition');
    }
    public function privacypolicy()
    {
        return view('visitors.privacypolicy');
    }
    public function cancelation_policy()
    {
        return view('visitors.cancelation_policy');
    }
    public function blog()
    {
        $blog = Blogs::where('status', '1')->latest()->take(30)->get();
        return view('visitors.blog', compact('blog'));
    }
    public function blog_detail(Request $request)
    {
        $blog = Blogs::where('slug', $request->slug)->first();
        return view('visitors.blog_detail', compact('blog'));
    }
    public function page(Request $request)
    {
        $blog = Pages::where('slug', $request->slug)->first();
        $cid = $blog->cid;
        $ids = $blog->external_links;
        $local_cities = local_cities::where('status', '1')->where('name', 'LIKE', "%{$cid}%")->get();

        $idsArray = explode(',', $ids);
        $butns = Pages::whereIn('id', $idsArray)->get();

        return view('visitors.page', compact('blog','local_cities','butns'));
    }
    public function driver_registration()
    {
        $cabs = Cabs::where('status', '1')->get();
        return view('visitors.driver', compact('cabs'));
    }
    public function driver_registration_action(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'cab_id' => 'required',
            'phone' => 'required',
            'license_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'registration_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'insuranse_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'license' => 'required',
            'city' => 'required',
            'registration' => 'required',
            'year' => 'required',
            'lisence_exp' => 'required',
        ]);

        try {
        $insrt = new Driver();

        if ($request->hasFile('registration_img')) {
            $image = $request->file('registration_img');
            $filename = time() . 'reg.' . $image->getClientOriginalExtension();
            $this->compressAndStore($image, $filename);
            $insrt->registration_img = $filename;
        }
        if ($request->hasFile('license_img')) {
            $image = $request->file('license_img');
            $filename = time() . 'lic.' . $image->getClientOriginalExtension();
            $this->compressAndStore($image, $filename);
            $insrt->license_img = $filename;
        }
        if ($request->hasFile('insuranse_img')) {
            $image = $request->file('insuranse_img');
            $filename = time() . 'inc.' . $image->getClientOriginalExtension();
            $this->compressAndStore($image, $filename);
            $insrt->insuranse_img = $filename;
        }
            $insrt->name= $request->name;
            $insrt->cab_id= $request->cab_id;
            $insrt->phone = $request->phone;
            $insrt->address = $request->address;
            $insrt->license = $request->license;
            $insrt->city = $request->city;
            $insrt->registration = $request->registration;
            $insrt->year = $request->year;
            $insrt->lisence_exp = $request->lisence_exp;
            $insrt->status = '0';
            $insrt->save();

          return redirect()->route('driver_registration')->with('success', 'Your Registration Successful');
        } catch (\Exception $e) {

            print_r($e->getMessage());
        }
    }



    //BOOKING
    public function checkout(Request $request)
    {
        if (!empty($request->all())) {
            if($request->type == "Local_Trip"){
                $this->validate($request, [
                    'plocation' =>'required',
                    'package' =>'required',
                    'pdate' =>'required',
                    'ptime' =>'required',
                    'type' =>'required',
                    'cab_id' =>'required',
                    'price' =>'required',
                ]);
                $cab = Cabs::where('id', $request->cab_id)->first();
                return view('visitors.checkout', compact('cab', 'request'));

            }
        } else {
            return redirect()->route('index')->with('error', 'Request Not Found');
        }

    }
    public function payment(Request $request)
    {

        $this->validate($request, [
            'plocation' =>'required',
            'package' =>'required',
            'pdate' =>'required',
            'ptime' =>'required',
            'type' =>'required',
            'cab_id' =>'required',
            'price' =>'required',
            'name' =>'required',
            'phone' =>'required',
            'address' =>'required',
            'pay_type' =>'required',
            'email' =>'required',
        ]);

        if($request->pay_type=='15'){
            $price = round(($request->price*15)/100);
        }elseif($request->pay_type=='50'){
            $price = round(($request->price*50)/100);
        }else{
            $price = $request->price;
        }
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

        $booking = new Booking();
            $booking->plocation = $request->plocation;
            $booking->package = $request->package;
            $booking->pdate = $request->pdate;
            $booking->ptime = $request->ptime;
            $booking->type = $request->type;
            $booking->cab_id = $request->cab_id;
            $booking->price = $request->price;
            $booking->name = $request->name;
            $booking->phone = $request->phone;
            $booking->address = $request->address;
            $booking->pay_type = $request->pay_type;
            $booking->email = $request->email;
            $booking->payment = $price;
            $booking->pay_status = 'unpaid';
            $booking->txnid = $txnid;
            $booking->save();
            $OrderId = $booking->id;
            $name = $request->name;
            try {

            $MERCHANT_KEY = env('PAYU_MERCHANT_KEY');
            $SALT = env('PAYU_SALT');
            $PAYU_BASE_URL = env('PAYU_URL');

        //$PAYU_BASE_URL = "https://secure.payu.in"; // PRODUCATION
        $name = $name;
        $successURL = route('pay.u.response');
        $failURL = route('pay.u.cancel');
        $email = $request->email;
        $amount = $price;

        $action = '';
        $posted = array();
        $posted = array(
            'key' => $MERCHANT_KEY,
            'txnid' => $txnid,
            'amount' => $amount,
            'firstname' => $name,
            'email' => $email,
            'productinfo' => 'Webappfix',
            'surl' => $successURL,
            'furl' => $failURL,
            'service_provider' => 'payu_paisa',
        );

        $hash = '';
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

        if(empty($posted['hash']) && sizeof($posted) > 0) {
            $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';
            foreach($hashVarsSeq as $hash_var) {
                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                $hash_string .= '|';
            }
            $hash_string .= $SALT;

            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '/_payment';
        }
        elseif(!empty($posted['hash']))
        {
            $hash = $posted['hash'];
            $action = $PAYU_BASE_URL . '/_payment';
        }

        return view('visitors.razorpay-checkout',compact('action','hash','MERCHANT_KEY','txnid','successURL','failURL','name','email','amount'));

        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function checkout_outs(Request $request)
    {

        if (!empty($request->all())) {
            if($request->type == "Outstation"){

                $this->validate($request, [
                    'plocation' =>'required',
                    'dlocation' =>'required',
                    'ddate' =>'required',
                    'pdate' =>'required',
                    'ptime' =>'required',
                    'type' =>'required',
                    'cab_id' =>'required',
                    'price' =>'required',
                ]);
                $cab = Cabs::where('id', $request->cab_id)->first();
                return view('visitors.checkout_outs', compact('cab', 'request'));

            }
        } else {
            return redirect()->route('index')->with('error', 'Request Not Found');
        }
    }
    public function payment_outs(Request $request)
    {

        $this->validate($request, [
            'plocation' =>'required',
            'dlocation' =>'required',
            'ddate' =>'required',
            'pdate' =>'required',
            'ptime' =>'required',
            'type' =>'required',
            'cab_id' =>'required',
            'price' =>'required',
            'name' =>'required',
            'phone' =>'required',
            'address' =>'required',
            'pay_type' =>'required',
            'email' =>'required',
        ]);

        if($request->pay_type=='15'){
            $price = round(($request->price*15)/100);
        }elseif($request->pay_type=='50'){
            $price = round(($request->price*50)/100);
        }else{
            $price = $request->price;
        }
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

        $booking = new Booking();
            $booking->plocation = $request->plocation;
            $booking->dlocation = $request->dlocation;
            $booking->ddate = $request->ddate;
            $booking->pdate = $request->pdate;
            $booking->ptime = $request->ptime;
            $booking->type = $request->type;
            $booking->cab_id = $request->cab_id;
            $booking->price = $request->price;
            $booking->name = $request->name;
            $booking->phone = $request->phone;
            $booking->address = $request->address;
            $booking->pay_type = $request->pay_type;
            $booking->email = $request->email;
            $booking->payment = $price;
            $booking->pay_status = 'unpaid';
            $booking->txnid = $txnid;
            $booking->save();
            $OrderId = $booking->id;
            $name = $request->name;
            try {

            $MERCHANT_KEY = env('PAYU_MERCHANT_KEY');
            $SALT = env('PAYU_SALT');
            $PAYU_BASE_URL = env('PAYU_URL');

        //$PAYU_BASE_URL = "https://secure.payu.in"; // PRODUCATION
        $name = $name;
        $successURL = route('pay.u.response');
        $failURL = route('pay.u.cancel');
        $email = $request->email;
        $amount = $price;

        $action = '';
        $posted = array();
        $posted = array(
            'key' => $MERCHANT_KEY,
            'txnid' => $txnid,
            'amount' => $amount,
            'firstname' => $name,
            'email' => $email,
            'productinfo' => 'Webappfix',
            'surl' => $successURL,
            'furl' => $failURL,
            'service_provider' => 'payu_paisa',
        );

        $hash = '';
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

        if(empty($posted['hash']) && sizeof($posted) > 0) {
            $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';
            foreach($hashVarsSeq as $hash_var) {
                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                $hash_string .= '|';
            }
            $hash_string .= $SALT;

            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '/_payment';
        }
        elseif(!empty($posted['hash']))
        {
            $hash = $posted['hash'];
            $action = $PAYU_BASE_URL . '/_payment';
        }

        return view('visitors.razorpay-checkout',compact('action','hash','MERCHANT_KEY','txnid','successURL','failURL','name','email','amount'));

        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function payUResponse(Request $request)
    {
        $status = $request->status;
        $txnid = $request->txnid;
        $amount = $request->amount;

        if ($status == 'success') {

             Booking::where('txnid', $txnid)
            ->update([
                'pay_status' => 'paid'
             ]);
             $update = Booking::join('cabs', 'cabs.id', '=', 'bookings.cab_id')
             ->select('bookings.*', 'cabs.name as cab', 'cabs.title as cabname')
             ->where('txnid', $txnid)
             ->first();

             $this->send_mail_admin($txnid);
            return view('visitors.success', compact('update'));
        } elseif ($status == 'failure') {
             echo "Payment failed for transaction ID: " . $txnid;

        } else {
             echo "Payment status unknown!";

        }
    }
    public function test(Request $request)
    {
        $update = Booking::join('cabs', 'cabs.id', '=', 'bookings.cab_id')
             ->select('bookings.*', 'cabs.name as cab', 'cabs.title as cabname')
             ->where('txnid', '5bd7d75ddc78f4dd0ebd')
             ->first();



            return view('visitors.success', compact('update'));
    }

    public function payUCancel(Request $request)
    {
        echo 'Payment Failed';
    }



public function compressAndStore($image, $filename)
{
    // Get the image extension
    $extension = $image->getClientOriginalExtension();

    // Get the image real path
    $imagePath = $image->getRealPath();

    // Set compression path
    $storagePath = storage_path('app/public/driver/' . $filename);

    // Compress image using GD Library
    if ($extension == 'jpeg' || $extension == 'jpg') {
        // Create image from jpeg
        $img = imagecreatefromjpeg($imagePath);
        // Compress and save the image (quality 75%)
        imagejpeg($img, $storagePath, 70);
    } elseif ($extension == 'png') {
        // Create image from png

        $img = @imagecreatefrompng($imagePath);
        // Compress and save png (compression level from 0-9)
        imagepng($img, $storagePath, 8);
    } elseif ($extension == 'gif') {
        // Create image from gif
        $img = imagecreatefromgif($imagePath);
        // Save gif (no compression)
        imagegif($img, $storagePath);
    }

    // Free up memory
    imagedestroy($img);
}

public function send_mail_admin($txid)
    {

         $booking = Booking::join('cabs', 'cabs.id', '=', 'bookings.cab_id')
        ->select('bookings.*', 'cabs.name as cab', 'cabs.title as cabname')
        ->where('txnid', $txid)
        ->first();

$package='';$drop='';
 if($booking->type=='Local_Trip'){
    if($booking->package == 8){
    $package='<tr><th>Package:</th><td>8Hr 80 Kms</td></tr>';
    } elseif($booking->package == 12){
        $package='<tr><th>Package:</th><td>12Hr 120 Kms</td></tr>';
    }
 }else{
    $drop='<tr><th>Drop City:</th><td>'.$booking->plocation.'</td></tr>
    <tr><th>Drop Date:</th><td>'.$booking->ddate.'</td></tr>';
 }
 $type = str_replace('_', ' ', $booking->type);
   $message = "
   <!DOCTYPE html>
   <html>
   <head>
       <meta charset='UTF-8'>
       <meta http-equiv='X-UA-Compatible' content='IE=edge'>
       <meta name='viewport' content='width=device-width, initial-scale=1.0'>
       <title>Booking Details</title>
       <style>
           body {
               font-family: Arial, sans-serif;
               color: #333;
               background-color: #f4f4f4;
               margin: 0;
               padding: 0;
           }
           .container {
               width: 100%;
               max-width: 600px;
               margin: 0 auto;
               background-color: #fff;
               padding: 20px;
               border-radius: 8px;
               box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
           }
           .header {
               background-color: #007bff;
               color: #fff;
               text-align: center;
               padding: 20px;
               border-radius: 8px 8px 0 0;
           }
           .header h1 {
               margin: 0;
               font-size: 24px;
           }
           .content {
               padding: 20px;
           }
           .content h2 {
               font-size: 20px;
               margin-bottom: 10px;
           }
           .content p {
               font-size: 16px;
               line-height: 1.5;
           }
           .booking-details {
               background-color: #f9f9f9;
               border: 1px solid #ddd;
               padding: 15px;
               border-radius: 8px;
               margin-bottom: 20px;
           }
           .booking-details table {
               width: 100%;
               border-collapse: collapse;
           }
           .booking-details table th,
           .booking-details table td {
               padding: 10px;
               text-align: left;
               border-bottom: 1px solid #ddd;
           }
           .footer {
               text-align: center;
               font-size: 14px;
               color: #888;
               padding: 20px;
           }
       </style>
   </head>
   <body>
       <div class='container'>
           <div class='header'>
               <h1>Booking Confirmation</h1>
           </div>
           <div class='content'>
               <h2>Dear {$booking->name},</h2>
               <p>Thank you for booking with us! Below are your booking details:</p>
               <p><b>Contact No</b>: {$booking->phone}</p>
               <p><b>Address</b>: {$booking->address}</p>

               <div class='booking-details'>
                   <table>
                       <tr>
                           <th>Booking ID:</th>
                           <td>{$booking->id}</td>
                       </tr>
                       <tr>
                           <th>Transaction Id:</th>
                           <td>{$booking->txnid}</td>
                       </tr>
                       <tr>
                           <th>Service Type:</th>
                           <td>{$type}</td>
                       </tr>{$package}
                       <tr>
                           <th>Cab Name:</th>
                           <td>{$booking->cab}</td>
                       </tr>
                       <tr>
                           <th>Cab Type:</th>
                           <td>{$booking->cabname}</td>
                       </tr>
                       <tr>
                           <th>Pickup City:</th>
                           <td>{$booking->plocation}</td>
                       </tr>
                       <tr>
                           <th>Pickup Date:</th>
                           <td>{$booking->pdate} ({$booking->ptime})</td>
                       </tr>{$drop}

                       <tr>
                           <th>Amount Paid:</th>
                           <td>Rs {$booking->payment}</td>
                       </tr>
                       <tr>
                           <th>Total Amount:</th>
                           <td>Rs {$booking->price}</td>
                       </tr>
                   </table>
               </div>

               <p>If you have any questions or need to make changes to your booking, feel free to contact us.</p>

               <p>Thank you for choosing our service!</p>
           </div>

           <div class='footer'>
               <p>&copy; " . date('Y') . " Zaara Travels. All rights reserved.</p>
           </div>
       </div>
   </body>
   </html>";


        $to = $booking->email.',zaaratravel.com@gmail.com';
        $subject = "Booking Confirmed";


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: info@zaaratravels' . "\r\n";


return mail($to,$subject,$message,$headers);
    }

}
