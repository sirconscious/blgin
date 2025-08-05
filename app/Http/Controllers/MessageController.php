<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class MessageController extends Controller
{
    public function sendSms(Request $request)
    {
        $credentials = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $sid = config("services.twilio.sid");
        $token = config("services.twilio.token");
        $twilio = new Client($sid, $token);

        try {
            $message = $twilio->messages
                ->create("+212648772911", // to
                    array(
                        "messagingServiceSid" => config("services.twilio.messaging_service_sid"),
                        "body" => $credentials['content']
                    )
                );
            return response()->json(['message' => 'Message sent successfully', 'sid' => $message->sid], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send message: ' . $e->getMessage()], 500);
        }
    }

   public function sendMessageWatsApp(Request $request)
{
    $sid = config("services.twilio.sid");
    $token = config("services.twilio.token");
    $twilio = new Client($sid, $token);

    try {
        $message = $twilio->messages
            ->create("whatsapp:+212648772911",
                array(
                    "from" => "whatsapp:+14155238886",
                    "contentSid" => "HX5c2583fc7f2c70030aa26fdc0a3c0186",
                    "contentVariables" => '{"1":"12/1","2":"3pm"}',
                    "body" => "Your Message"
                )
            );
        
        return response()->json($message->toArray(), 201);
        
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to send message: ' . $e->getMessage()], 500);
    }
} 
public function handleWebhook(Request $request) 
{
    // Disable CSRF for this route
    // Add ngrok warning bypass headers
    $response = response('OK', 200);
    $response->header('ngrok-skip-browser-warning', 'true');
    
    Log::info('Webhook received', $request->all());
    Log::info('Headers received', $request->headers->all());
    
    $messageStatus = $request->input('MessageStatus');
    $messageSid = $request->input('MessageSid');
    $from = $request->input('From');
    $body = $request->input('Body');
    
    Log::info('Parsed data', [
        'status' => $messageStatus,
        'sid' => $messageSid,
        'from' => $from,
        'body' => $body
    ]);
    
    // Handle different statuses
    switch ($messageStatus) {
        case 'delivered':
            Log::info('Message was delivered: ' . $messageSid);
            break;
        case 'read':
            Log::info('Message was read: ' . $messageSid);
            break;
        case 'failed':
            Log::info('Message failed: ' . $messageSid);
            break;
    }
    
    // For incoming messages (user replies)
    if ($body) {
        Log::info('User replied: ' . $body . ' from: ' . $from);
        // Handle the response here
    }
    
    return $response;
}}