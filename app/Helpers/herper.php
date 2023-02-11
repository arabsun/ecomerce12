
<?php

use Carbon\Carbon;
use Twilio\Rest\Client;
use App\Models\Currency;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use App\Models\Generalsetting;
use App\Models\PaymentGateway;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function validateError($messages)
{
    foreach ($messages as $message) {
        return $message[0];
        break;
    }
}


// clinet register mail 
function clientRegisterMail($client)
{
    $data = array(
        'name' => $client->first_name,
        'email' => $client->email,
        'username' => $client->username,
        'phone' => $client->phone,
    );

    Mail::send('emails.client_register', $data, function ($message) use ($data) {

        $message->to($data['email'], $data['name'])
            ->subject('Welcome to ' . env('APP_NAME'));
        $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
    });
}


// twilioi sms 
function twilioSms($phone, $message, $code)
{
    $sid = env('TWILIO_SID');
    $token = env('TWILIO_TOKEN');
    $client = new Client($sid, $token);
    $phone = $code . $phone;

    try {
        $client->messages->create($phone, array(
            'from' => env('TWILIO_FROM'),
            'body' => $message
        ));
        return 1;
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}

function getTotalAmount()
{
    if (Session::has('cart')) {
        $cart = Session::get('cart');
        $total = 0;
        if(session('discount')){
            $total =  session('discount');
        } else{
            foreach ($cart as $item) {
                $total += priceConv($item['price']) * $item['quantity'];
            }

        }
        return $total;
    } else {
        return 0;
    }
}

function randNum($digits = 6){
    return rand(pow(10, $digits-1), pow(10, $digits)-1);
}

function curr()
{
    if(auth()->check()){
        return  Currency::find(auth()->user()->currency_id);
    }else{
        return Currency::where('default', 1)->first();
    }
}

function priceConv($amount){
 
    $currency = curr();
    if($currency){
        return round($amount/$currency->rate,2);
    }else{
        return round($amount,2);
    }
    
}

function numFormat($amount, $length = 0)
{
    if(0 < $length)return number_format( $amount + 0, $length);
    return $amount + 0;
}

function amount($amount,$type = 1,$length = 0){
    if($type == 2) return numFormat($amount,8);
    else return numFormat($amount,$length);  
}

function getPhoto($filename)
{
    if($filename){
        if(file_exists('assets/images'.'/'.$filename)) return asset('assets/images/'.$filename);
        else return asset('assets/images/default.png');
    } else{
        return asset('assets/images/default.png');
    }
}

function tagFormat($tag)
{
    $common_rep   = ["value", "{", "}", "[","]",":","\""];
    $tag = str_replace($common_rep, '', $tag);
    if (!empty($tag))  return $tag;   
    else  return  null;
}

function dateFormat($date,$format = 'd M Y, h:i a'){
    return Carbon::parse($date)->format($format);
}


function diffTime($time)
{
    return Carbon::parse($time)->diffForHumans();
}
function uploadImage($file, $location, $size = null, $old = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if (!empty($old)) {
        removeFile($location . '/' . $old);
        removeFile($location . '/thumb_' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();

    $image = Image::make($file);


    if (!empty($size)) {
        $size = explode('x', strtolower($size));
        $image->resize($size[0], $size[1]);
    }
    $image->save($location . '/' . $filename);

    
    return $filename;
}

function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}


function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

function filter($key, $value)
{
    $queries = request()->query();
    if(count($queries) > 0) $delimeter = '&';
    else  $delimeter = '?';
    
    if(request()->has($key)){
      $url = request()->getRequestUri();
      $pattern = "\?$key";
      $match = preg_match("/$pattern/",$url);
      if($match != 0) return  preg_replace('~(\?|&)'.$key.'[^&]*~', "\?$key=$value", $url);
      $filteredURL = preg_replace('~(\?|&)'.$key.'[^&]*~', '', $url);
      return  $filteredURL.$delimeter."$key=$value";
    }
    return  request()->getRequestUri().$delimeter."$key=$value";
    

}


function email($data){

    $gs = Generalsetting::first();
    if ($gs->mail_type == 'php_mail') {
        $headers = "From: $gs->sitename <$gs->email_from> \r\n";
        $headers .= "Reply-To: $gs->sitename <$gs->email_from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        @mail($data['email'], $data['subject'], $data['message'], $headers);
    }
    else {
        
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = $gs->smtp_host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $gs->smtp_user;
            $mail->Password   = $gs->smtp_pass;
            if ($gs->mail_encryption == 'ssl') {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } else {
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            }
            $mail->Port       = $gs->smtp_port;
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($gs->from_email, $gs->from_name);
            $mail->addAddress($data['email'], $data['name']);
            $mail->addReplyTo($gs->from_email, $gs->from_name);
            $mail->isHTML(true);
            $mail->Subject = $data['subject'];
            $mail->Body    = $data['message'];
            $mail->send();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
    
}

