<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Mail\UserMail;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    function index(): View
    {
        return view('admin.dashboard');
    }



    public function send_mail_view($id)
    {
        return view('admin.send-mail', compact('id'));
    }

    public function send_mail(Request $request, $id)
    {

        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);
        $user = User::findOrFail($id);

        $details = [
            'subject' => $request->subject,
            'title' => $request->message
        ];
        \Mail::to($user->email)->send(new UserMail($details));

        return to_route('admin.user.index')->with('success', 'Email send to user ' . $user->email);
    }

    function notification(): View
    {
        $notifications = \DB::table('notifications')->paginate(10);
        return view('admin.notification.index', compact('notifications'));
    }
    function getNotifications()
    {
        $notifications = \DB::table('notifications')->paginate(10);
        $output=view('components.get-notifications', compact('notifications'))->render();
        return response()->json([
            'success'=>true,
            'data'=>$output, 
        ]);
    }

    function search_notification(Request $request)
    {
        $notifications = \DB::table('notifications')->where('title', 'LIKE', '%{$request->search}%')->paginate(10);
        // $notifications->appends(['search' => $request->search]);
        $output=view('components.get-notifications', compact('notifications'))->render();
        return response()->json([
            'success'=>true,
            'data'=>$output, 
        ]);
    }

    public function notificationCreate()
    {
        return view('admin.notification');
    }
    public function deleteNotification($id)
    {
        \DB::table('notifications')->where('id', $id)->delete();
        return to_route('admin.notification.index')->with('success', 'Delete successfully');
    }

    public function getVersion()
    {
        $versions = \DB::table('tokens')->distinct()->get(['version']);
        $output = "";
        if (count($versions)) {
            foreach ($versions as $version) {
                $output .= "<option value='{$version->version}'>{$version->version}</option>";
            }
        }
        echo $output;
    }

    function send_notification(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required'
        ]);
        if ($request->type == 'simple_notification') {
            $tokens = \DB::table('tokens')->get();
            foreach ($tokens as $token) {
                $response = Http::acceptJson()
                    ->withToken('AAAAQYkzuZw:APA91bHbQAzZXqn_oLVKTIIupSez5OqjGKGUUahfgLE1U0cwgUptWy1dJc86bwZeA3r2pA9IItrhCfraSYGpxz2N51reEE-av1EnQAfL2FRHkxd5SkGG8C7TlZ3SV39puL_sMf2lbiXZ') // Replace 'YOUR_SERVER_KEY' with your actual server key
                    ->post('https://fcm.googleapis.com/fcm/send', [
                        "priority" => "high",
                        "registration_ids" => [
                            $token->token
                        ],
                        'notification' => [
                            'title' => $request->title,
                            'body' => $request->message,
                            "android_channel_id" => "boindos",
                        ],
                    ]);


                \DB::table('notifications')->insert([
                    'title' => $request->title,
                    'body' => $request->message,
                    'link' => $request->link,
                    'token' => $token->token,
                    'audio' => $request->audio  ? $request->file('audio')->store('audio', 'public') : null
                ]);
            }
        } else if ($request->type == 'new_version') {
            $tokens = \DB::table('tokens')->where('version', $request->version)->get();
            foreach ($tokens as $token) {
                $response = Http::acceptJson()
                    ->withToken('AAAAQYkzuZw:APA91bHbQAzZXqn_oLVKTIIupSez5OqjGKGUUahfgLE1U0cwgUptWy1dJc86bwZeA3r2pA9IItrhCfraSYGpxz2N51reEE-av1EnQAfL2FRHkxd5SkGG8C7TlZ3SV39puL_sMf2lbiXZ') // Replace 'YOUR_SERVER_KEY' with your actual server key
                    ->post('https://fcm.googleapis.com/fcm/send', [
                        "priority" => "high",
                        "registration_ids" => [
                            $token->token
                        ],
                        'notification' => [
                            'title' => $request->title,
                            'body' => $request->message,
                            "android_channel_id" => "boindos",
                        ],
                    ]);


                \DB::table('notifications')->insert([
                    'title' => $request->title,
                    'body' => $request->message,
                    'link' => $request->link,
                    'token' => $token->token,
                    'audio' => $request->audio  ? $request->file('audio')->store('audio', 'public') : null
                ]);
            }
        } else if ($request->type == 'with_audio') {
            $tokens = \DB::table('tokens')->get();
            foreach ($tokens as $token) {
                $response = Http::acceptJson()
                    ->withToken('AAAAQYkzuZw:APA91bHbQAzZXqn_oLVKTIIupSez5OqjGKGUUahfgLE1U0cwgUptWy1dJc86bwZeA3r2pA9IItrhCfraSYGpxz2N51reEE-av1EnQAfL2FRHkxd5SkGG8C7TlZ3SV39puL_sMf2lbiXZ') // Replace 'YOUR_SERVER_KEY' with your actual server key
                    ->post('https://fcm.googleapis.com/fcm/send', [
                        "priority" => "high",
                        "registration_ids" => [
                            $token->token
                        ],
                        'notification' => [
                            'title' => $request->title,
                            'body' => $request->message,
                            "android_channel_id" => "boindos",
                        ],
                    ]);

                \DB::table('notifications')->insert([
                    'title' => $request->title,
                    'body' => $request->message,
                    'link' => $request->link,
                    'token' => $token->token,
                    'audio' => $request->audio  ? $request->file('audio')->store('audio', 'public') : null
                ]);
            }
        }


        return to_route('admin.notification.index')->with('success', 'Notification send successfully');
    }

    public function reviewGet()
    {
        $reviews = Review::all();
        return view('admin.reviews', compact('reviews'));
    }
    public function getReviews()
    {
        $reviews = Review::with('contents', 'user')->latest()->paginate(10);
        $output = view('components.get-reviews', compact('reviews'))->render();
        return response()->json([
            'success' => true,
            'data' => $output
        ]);
    }

    public function search(Request $request)
    {
        $query = Review::with('contents', 'user');
        $searchTerm = $request->input('search', '');

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->whereHas('user', function ($q) use ($searchTerm) {
                    $q->where('email', 'LIKE', "%{$searchTerm}%");
                })
                    ->orWhereHas('contents', function ($q) use ($searchTerm) {
                        $q->where('title', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhere('content', 'LIKE', "%{$searchTerm}%"); // Make sure 'content' is the correct column name
            });
        }

        $reviews = $query->latest()->paginate(10);
        $reviews->appends(['search' => $searchTerm]);

        $output = view('components.get-reviews', compact('reviews'))->render();
        return response()->json([
            'success' => true,
            'data' => $output
        ]);
    }


    public function deleteReviews($id)
    {
        Review::findOrFail($id)->delete();
        return to_route('admin.review.index')->with('success', 'Delete successfully');
    }
}
