<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Onboarding;
use App\Models\Jingle;
use App\Models\Legal;
use App\Models\Recent;
use App\Models\Playlist;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\ActorProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function saveToken(Request $request)
    {
        try {
            $existingToken = \DB::table('tokens')->where('token', $request->token)->first();

            if ($existingToken) {
                \DB::table('tokens')
                    ->where('token', $request->token)
                    ->update([
                        'token' => $request->token,
                        'version' => $request->version,
                        'updated_at' => now()
                    ]);
            } else {
                \DB::table('tokens')->insert([
                    'token' => $request->token,
                    'version' => $request->version,
                ]);
            }

            return response()->json(['message' => 'Token Successfully', 'success' => true], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }
    function onboarding()
    {
        try {
            $onboardings = Onboarding::all();
            return response()->json(['onboardings' => $onboardings, 'success' => true], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }
    function notifications($token)
    {
        try {
            $notifications = \DB::table('notifications')->where('token', $token)->latest()->get();
            $count = \DB::table('notifications')->where('token', $token)->where('status', false)->count();
            return response()->json(['notifications' => $notifications, 'count' => $count, 'success' => true], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    function update_notification_status($token)
    {
        try {
            $update = \DB::table('notifications')
                ->where('token', $token)
                ->update(['status' => true]);
            return response()->json(['success' => true], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    function sub_category_with_content($category)
    {
        try {
            $sub_category_with_contents = SubCategory::with('contents.reviews.user', 'contents.playlists')
                ->whereCategory($category)
                ->get();


            foreach ($sub_category_with_contents as $subCategory) {
                foreach ($subCategory->contents as $content) {
                    $content->authors = ActorProfile::find(json_decode($content->authors, true));
                    $content->producers = ActorProfile::find(json_decode($content->producers, true));
                    $content->cost = ActorProfile::find(json_decode($content->cost, true));
                    $content->cost2 = ActorProfile::find(json_decode($content->cost2, true));
                    $content->translator = ActorProfile::find(json_decode($content->translator, true));
                    $content->adoption = ActorProfile::find(json_decode($content->adoption, true));
                    $content->director = ActorProfile::find(json_decode($content->director, true));
                    $content->music_director = ActorProfile::find(json_decode($content->music_director, true));

                    foreach ($content->reviews as $review) {
                        // Retrieve the user associated with the review
                        $user = $review->user;
                    }

                    $totalDurationInSeconds = [];

                    foreach ($content->playlists as $playlist) {
                        $totalDurationInSeconds[] = intval($playlist->duration);
                    }


                    // // Convert total duration to minutes and seconds
                    // $totalMinutes = floor($totalDurationInSeconds / 60);
                    // $totalSeconds = $totalDurationInSeconds % 60;

                    // // Format the result as a string
                    // $formattedTotalDuration = sprintf('%02d:%02d', $totalMinutes, $totalSeconds);

                    // // Append the total duration to the content
                    $content->totalDuration = $totalDurationInSeconds;

                    $totalAvgReview = Review::where('content_id', $content->id)
                        ->avg('star');
                    $content->totalAvgReview = $totalAvgReview;
                    $jingle = Jingle::inRandomOrder()->where('status', 1)->first();
                    $content->jingle = $jingle;
                }
            }

            return response()->json(['sub_category' => $sub_category_with_contents, 'success' => true], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }


    function play_songs($id)
    {
        try {
            $content = Content::findOrFail($id);
            $content->plays = $content->plays + 1;
            $content->save();

            $existingRecord = Recent::where('user_id', auth()->id())
                ->where('content_id', $id)
                ->first();

            // If the record doesn't exist, create it
            if (!$existingRecord) {
                Recent::create([
                    'user_id' => auth()->id(),
                    'content_id' => $id,
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    function next_previous_song($id)
    {
        try {
            $content = Content::with('playlists', 'reviews')->whereStatus(1)->findOrFail($id);

            // Convert string representations of arrays to actual arrays
            $content->authors = json_decode($content->authors, true);
            $content->producers = json_decode($content->producers, true);
            $content->adoption = json_decode($content->adoption, true);
            $content->director = json_decode($content->director, true);
            $content->music_director = json_decode($content->music_director, true);

            // Calculate the total average review
            $totalAvgReview = Review::where('content_id', $content->id)
                ->avg('star');

            // Append the calculated average to the content
            $content->totalAvgReview = $totalAvgReview;
            $jingle = Jingle::inRandomOrder()->where('status', 1)->first();

            $content->jingle = $jingle;

            return response()->json(['content' => $content, 'success' => true], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    function get_single_song($id)
    {
        try {
            $content = Content::with('reviews', 'playlists')->whereStatus(1)->findOrFail($id);

            // Convert string representations of arrays to actual arrays
            $content->authors = ActorProfile::find(json_decode($content->authors, true));
            $content->producers = ActorProfile::find(json_decode($content->producers, true));
            $content->cost = ActorProfile::find(json_decode($content->cost, true));
            $content->cost2 = ActorProfile::find(json_decode($content->cost2, true));
            $content->translator = ActorProfile::find(json_decode($content->translator, true));
            $content->adoption = ActorProfile::find(json_decode($content->adoption, true));
            $content->director = ActorProfile::find(json_decode($content->director, true));
            $content->music_director = ActorProfile::find(json_decode($content->music_director, true));

            foreach ($content->reviews as $review) {
                // Retrieve the user associated with the review
                $user = $review->user;
            }

            $totalDurationInSeconds = [];

            foreach ($content->playlists as $playlist) {
                $totalDurationInSeconds[] = intval($playlist->duration);
            }


            // // Convert total duration to minutes and seconds
            // $totalMinutes = floor($totalDurationInSeconds / 60);
            // $totalSeconds = $totalDurationInSeconds % 60;

            // // Format the result as a string
            // $formattedTotalDuration = sprintf('%02d:%02d', $totalMinutes, $totalSeconds);

            // // Append the total duration to the content
            $content->totalDuration = $totalDurationInSeconds;

            $totalAvgReview = Review::where('content_id', $content->id)
                ->avg('star');
            $content->totalAvgReview = $totalAvgReview;
            $jingle = Jingle::inRandomOrder()->where('status', 1)->first();
            $content->jingle = $jingle;

            return response()->json(['content' => $content, 'success' => true], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    function recent_song()
    {
        try {
            $recents = Recent::whereUserId(auth()->id())->latest()->get();
            foreach ($recents as $recent) {
                $content = $recent->content;
                // Convert string representations of arrays to actual arrays
                $content->authors = ActorProfile::find(json_decode($content->authors, true));
                $content->producers = ActorProfile::find(json_decode($content->producers, true));
                $content->cost = ActorProfile::find(json_decode($content->cost, true));
                $content->cost2 = ActorProfile::find(json_decode($content->cost2, true));
                $content->translator = ActorProfile::find(json_decode($content->translator, true));
                $content->adoption = ActorProfile::find(json_decode($content->adoption, true));
                $content->director = ActorProfile::find(json_decode($content->director, true));
                $content->music_director = ActorProfile::find(json_decode($content->music_director, true));
                $playlists = Playlist::where('content_id', $content->id)->get();
                $content->playlists = $playlists;
                $jingle = Jingle::inRandomOrder()->where('status', 1)->first();
                $content->jingle = $jingle;
                foreach ($content->reviews as $review) {
                    $user = $review->user;
                    $totalAvgReview = Review::where('content_id', $content->id)
                        ->avg('star');

                    // Append the calculated average to the content
                    $content->totalAvgReview = $totalAvgReview;
                }
            }

            return response()->json(['recents' => $recents, 'success' => true], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    function review(Request $request)
    {
        try {
            $is_review = Review::whereUserIdAndContentId(auth()->id(), $request->content_id)->first();
            if (!$is_review) {
                Review::create([
                    'user_id' => auth()->id(),
                    'content_id' => $request->content_id,
                    'content' => $request->content ?? ' ',
                    'star' => $request->star,
                ]);
                return response()->json(['message' => 'Review Successfully', 'success' => true], 201);
            } else {
                return response()->json(['message' => 'You already reviewed', 'success' => false], 201);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    function getActorProfile($id)
    {
        try {
            $actor_profile = ActorProfile::findOrFail($id);
            $actor_profile->views = $actor_profile->views + 1;
            $actor_profile->save();
            $contents = Content::with('playlists', 'reviews')->whereStatus(1)->latest()->get();

            $matchingContents = [];
            foreach ($contents as $content) {

                $producers = json_decode($content->producers);
                $adoption = json_decode($content->adoption);
                $cost = json_decode($content->cost);
                $translator = json_decode($content->translator);
                $director = json_decode($content->director);
                $music_director = json_decode($content->music_director);
                $cost2 = json_decode($content->cost2);


                if ((isset($producers) && in_array($id, $producers)) || (isset($director) && in_array($id, $director)) || (isset($music_director) && in_array($id, $music_director)) || (isset($cost2) && in_array($id, $cost2)) || (isset($cost) && in_array($id, $cost)) || (isset($translator) && in_array($id, $translator)) || (isset($adoption) && in_array($id, $adoption))) {
                    $content = Content::with('playlists', 'reviews')->findOrFail($content->id);
                    $jingle = Jingle::inRandomOrder()->where('status', 1)->first();
                    $content->jingle = $jingle;
                    $content->authors = ActorProfile::find(json_decode($content->authors, true));
                    $content->producers = ActorProfile::find(json_decode($content->producers, true));
                    $content->cost = ActorProfile::find(json_decode($content->cost, true));
                    $content->cost2 = ActorProfile::find(json_decode($content->cost2, true));
                    $content->translator = ActorProfile::find(json_decode($content->translator, true));
                    $content->adoption = ActorProfile::find(json_decode($content->adoption, true));
                    $content->director = ActorProfile::find(json_decode($content->director, true));
                    $content->music_director = ActorProfile::find(json_decode($content->music_director, true));
                    $matchingContents[] = $content;
                }
            }
            $matchingContents = collect($matchingContents)->unique(function ($item) {
                return strtolower(trim($item->title));
            })->values()->all();

            return response()->json(['profiles' => $actor_profile, 'contents' => $matchingContents, 'success' => false], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    public function getAuthorProfiles(Request $request)
    {
        $name = '%' . $request->name . '%';
        if ($request->name) {
            $actor_profile = ActorProfile::where('name', 'LIKE', $name)->where('in_search', 1)->get();
            return response()->json(['profiles' => $actor_profile, 'success' => false], 201);
        } else {
            $actor_profile = ActorProfile::where('in_search', 1)->get();
            return response()->json(['profiles' => $actor_profile, 'success' => false], 201);
        }
    }

    function search_song(Request $request)
    {
        try {
            $searchTerm = $request->search;

            if ($searchTerm == '') {
                $contents = Content::with('reviews')->whereStatus(1)->whereIsSearch(1)->orderBy('title', 'asc')->get();
                $actor_profiles = ActorProfile::where('in_search', 1)->get();


                foreach ($contents as $content) {
                    // Convert string representations of arrays to actual arrays
                    $content->authors = ActorProfile::find(json_decode($content->authors, true));
                    $content->producers = ActorProfile::find(json_decode($content->producers, true));
                    $content->cost = ActorProfile::find(json_decode($content->cost, true));
                    $content->cost2 = ActorProfile::find(json_decode($content->cost2, true));
                    $content->translator = ActorProfile::find(json_decode($content->translator, true));
                    $content->adoption = ActorProfile::find(json_decode($content->adoption, true));
                    $content->director = ActorProfile::find(json_decode($content->director, true));
                    $content->music_director = ActorProfile::find(json_decode($content->music_director, true));
                    $playlists = Playlist::where('content_id', $content->id)->get();
                    $content->playlists = $playlists;
                    $jingle = Jingle::inRandomOrder()->where('status', 1)->first();
                    $content->jingle = $jingle;
                    foreach ($content->reviews as $review) {
                        $totalAvgReview = Review::where('content_id', $content->id)
                            ->avg('star');

                        // Append the calculated average to the content
                        $content->totalAvgReview = $totalAvgReview;
                    }
                }

                $contentsArray = $contents->toArray();
                $actorProfilesArray = $actor_profiles->toArray();

                // Merge the arrays
                $resultArray = array_merge($contentsArray, $actorProfilesArray); 
                // $contentsArray = $contents->toArray();
                // // $actorProfilesArray = $actor_profiles->toArray();

                // // Merge the arrays
                // $resultArray = $contentsArray;
                // $resultArray = array_merge($contentsArray, $actorProfilesArray); 
                return response()->json(['contents' => $resultArray, 'success' => true], 200);
            } else {
                $contents = Content::with('reviews', 'playlists')
                    ->whereIsSearch(1)
                    ->whereStatus(1)
                    ->where('title', 'LIKE', "%{$searchTerm}%")
                    ->get();

                $actor_profiles = ActorProfile::where('in_search', 1)->where('name', 'LIKE', "%{$searchTerm}%")->get();

                foreach ($contents as $content) {
                    // Convert string representations of arrays to actual arrays
                    $content->authors = ActorProfile::find(json_decode($content->authors, true));
                    $content->producers = ActorProfile::find(json_decode($content->producers, true));
                    $content->cost = ActorProfile::find(json_decode($content->cost, true));
                    $content->cost2 = ActorProfile::find(json_decode($content->cost2, true));
                    $content->translator = ActorProfile::find(json_decode($content->translator, true));
                    $content->adoption = ActorProfile::find(json_decode($content->adoption, true));
                    $content->director = ActorProfile::find(json_decode($content->director, true));
                    $content->music_director = ActorProfile::find(json_decode($content->music_director, true));
                    $content->in_search = 1;
                    $jingle = Jingle::inRandomOrder()->where('status', 1)->first();
                    $content->jingle = $jingle;
                    foreach ($content->reviews as $review) {
                        // Calculate the average review
                        $totalAvgReview = Review::where('content_id', $content->id)
                            ->avg('star');

                        // Append the calculated average to the content
                        $content->totalAvgReview = $totalAvgReview;
                    }
                }

                $contentsArray = $contents->toArray();
                $actorProfilesArray = $actor_profiles->toArray();

                // Merge the arrays
                $resultArray = array_merge($contentsArray, $actorProfilesArray); 
                // $contentsArray = $contents->toArray();
                // // $actorProfilesArray = $actor_profiles->toArray();

                // // Merge the arrays
                // $resultArray = $contentsArray;
                return response()->json(['contents' => $resultArray, 'success' => true], 200);
                // return response()->json(['contents' => $new_data, 'success' => true], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    public function delete_recent($id)
    {
        Recent::findOrFail($id)->delete();
        return response()->json(['message' => 'Recent Delete successfully', 'success' => true], 200);
    }

    public function legal()
    {
        try {
            $legals = Legal::latest()->get();
            return response()->json(['success' => true, 'legals' => $legals]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }

    public function viewAds($id)
    {
        try {
            $ads = Jingle::findOrFail($id);
            $ads->views = $ads->views + 1;
            $ads->save();
            return response()->json(['success' => true, 'message' => ['Views']]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage(), 'success' => false], 201);
        }
    }
}
