<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ContentCategory;
use App\Models\SubCategory;
use App\Models\Playlist;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with('sub_category')->latest()->get();
        return view('admin.content.index', compact('contents'));
    }

    public function create()
    {

        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'category' => 'required',
        //     // 'subcategory' => 'required',
        //     'title' => 'required',
        //     'isbn' => 'required',
        //     'translator' => 'required',
        //     'cost' => 'required',
        //     'summary' => 'required',
        //     // 'image' => 'required',
        //     // 'audio' => 'required|mimes:audio/mpeg,mpga,mp3,wav',
        //     // 'demo' => 'required|mimes:audio/mpeg,mpga,mp3,wav',
        //     'authors' => 'required',
        //     'producers' => 'required',
        //     // 'adoption' => 'required',
        //     'director' => 'required',
        //     'music_director' => 'required',
        // ]);

        //   $image = [];
        //     if ($request->file('image')) {
        //         foreach ($request->file('image') as $image_file) {
        //             array_push($image, $image_file->store('content/image', 'public'));
        //         }
        //     } 

        // $image = "";
        // if ($request->file('image')) {
        //     $image = $request->file('image')->store('content/image', 'public');
        // }

        // $audio = [];
        // if ($request->file('audio')) {
        //     foreach ($request->file('audio') as $audio_file) {
        //         array_push($audio, $audio_file->store('content/audio', 'public'));
        //     }
        // } 


        // $audio = "";
        // if ($request->file('audio')) {
        //     $audio = $request->file('audio')->store('content/audio', 'public');
        // }
        // $demo = "";
        // if ($request->file('demo')) {
        //     $demo = $request->file('demo')->store('content/demo', 'public');
        // }

        $content = Content::findOrFail($request->id)->update([
            'category' => $request->category ?? '',
            'sub_cat_id' => $request->sub_cat_id[0],
            'title' => $request->title ?? '',
            'isbn' => $request->isbn ?? '',
            'translator' => json_encode($request->translator) ?? '',
            'total_duration' => $request->total_duration ?? '',
            'cost' => json_encode($request->cost) ?? '',
            'summary' => $request->summary ?? '',
            'is_search' => $request->search,
            'author_id' => json_encode($request->authors) ?? '',
            'authors' => json_encode($request->authors) ?? '',
            'cost2' => json_encode($request->cost2) ?? '',
            'producers' => json_encode($request->producers) ?? '',
            'adoption' => json_encode($request->adoption) ?? '',
            'director' => json_encode($request->director) ?? '',
            'music_director' => json_encode($request->music_director) ?? '',
            'status' => 1
        ]);

        $sliced_ids = array_slice($request->sub_cat_id, 1);

        // Iterate over the sliced array
        foreach ($sliced_ids as $sub_category) {
            $content1 = Content::findOrFail($request->id);
            $new_content = $content1->replicate();
            $new_content->sub_cat_id = $sub_category;
            $new = $new_content->save();

            $playlist = new Playlist();
            $playlist->title = 'NO TITLE';
            $playlist->content_id = $new_content->id;
            $playlist->audio = $content1->audio ?? '';
            $playlist->duration = '0';
            $playlist->authors = '';
            $playlist->save();
        }

        //     ContentCategory::create([
        //         'content_id' => $content->id,
        //         'sub_category_id' => $sub_category
        //     ]);
        // }

        // foreach ($request->playlist_title as $key => $value) {
        // $audio1 = "";
        // if ($request->file('playlist_audio') && isset($request->file('playlist_audio')[$key])) {
        //     // Use the correct key 'audio' for both checking and storing
        //     $audio1 = $request->file('playlist_audio')[$key]->store('content/audio', 'public');
        // }

        // }
        return response()->json(['success' => true, 'message' => 'data add successfully']);
        // return to_route('admin.content.index')->with('success', 'Content add successfully');
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.content.update', compact('content'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
            'title' => 'required',
            'isbn' => 'required',
            'translator' => 'required',
            'cost' => 'required',
            'summary' => 'required',
            'authors' => 'required',
            'producers' => 'required',
            'adoption' => 'required',
            'music_director' => 'required',
        ]);

        $content = Content::findOrFail($id);

        $image = "";
        if ($request->file('image')) {
            $image = $request->file('image')->store('content/image', 'public');
        } else {
            $image = $content->image;
        }

        $audio = "";
        if ($request->file('audio')) {
            $audio = $request->file('audio')->store('content/audio', 'public');
        } else {
            $audio = $content->audio;
        }

        $demo = "";
        if ($request->file('demo')) {
            $demo = $request->file('demo')->store('content/demo', 'public');
        } else {
            $demo = $content->demo;
        }

        $content->update([
            'category' => $request->category ?? '',
            'sub_cat_id' => $request->subcategory ?? '',
            'title' => $request->title ?? '',
            'isbn' => $request->isbn ?? '',
            'translator' => json_encode($request->translator) ?? '',
            'total_duration' => $request->total_duration ?? '',
            'cost' => json_encode($request->cost) ?? '',
            'summary' => $request->summary ?? '',
            'image' => $image ?? '',
            'audio' => $audio ?? '',
            'demo' => $demo ?? '',
            'is_search' => $request->search == "on" ? 1 : 0,
            'author_id' => json_encode($request->authors) ?? '',
            // 'authors' =>  json_encode(explode(',', $request->authors)) ?? '',
            'authors' => json_encode($request->authors) ?? '',
            'cost2' => json_encode($request->cost2) ?? '',
            'producers' => json_encode($request->producers) ?? '',
            'adoption' => json_encode($request->adoption) ?? '',
            'director' => json_encode($request->director) ?? '',
            'music_director' => json_encode($request->music_director) ?? '',
        ]);
        // if (isset($request->playlist_title)) {
        //     foreach ($request->playlist_title as $key => $value) {
        //         $playlist_id = "";
        //         if (isset($request->id[$key])) {
        //             $playlist_id = $request->id[$key];
        //         }

        //         if (!empty($playlist_id)) {
        //             $playlist1 = Playlist::findOrFail($playlist_id);
        //             $audio1 = "";
        //             if ($request->file('playlist_audio') && isset($request->file('playlist_audio')[$key])) {
        //                 $audio1 = $request->file('playlist_audio')[$key]->store('content/audio', 'public');
        //             } else {
        //                 $audio1 = $playlist1->audio;
        //             }

        //             $playlist1->title = $value ?? '';
        //             $playlist1->content_id = $content->id ?? '';
        //             $playlist1->audio = $audio1 ?? '';
        //             $playlist1->duration = $request->duration[$key] ?? '';
        //             $playlist1->authors = json_encode(explode(',', $request->playlist_authors[$key])) ?? '';
        //             $playlist1->save();
        //         } else {
        //             $audio1 = "";
        //             if ($request->file('playlist_audio') && isset($request->file('playlist_audio')[$key])) {
        //                 // Use the correct key 'audio' for both checking and storing
        //                 $audio1 = $request->file('playlist_audio')[$key]->store('content/audio', 'public');
        //             }
        //             $playlist = new Playlist();
        //             $playlist->title = $value ?? '';
        //             $playlist->content_id = $content->id ?? '';
        //             $playlist->audio = $audio1 ?? '';
        //             $playlist->duration = $request->duration[$key] ?? '';
        //             $playlist->authors = json_encode(explode(',', $request->playlist_authors[$key])) ?? '';
        //             $playlist->save();
        //         }
        //     }
        // }

        return to_route('admin.content.index')->with('success', 'Content Update successfully');
    }


    public function delete($id)
    {
        Content::findOrFail($id)->delete();
        return to_route('admin.content.index')->with('success', 'Content Deleted Successfully');
    }


    public function getSubCategories(Request $request)
    {

        $value = $request->value;
        $output = "";

        $categories = SubCategory::where('category', $value)->get();
        if (count($categories) > 0) {
            $output .= "<option value=''>Select Sub Category</option>";
            foreach ($categories as $category) {
                $output .= "<option value='{$category->id}'>{$category->name}</option>";
            }
        } else {
            $output .= "<option value=''>Sub Category Not found</option>";
        }

        echo $output;
    }


    public function getUpdateSubCategories(Request $request)
    {

        $value = $request->value;
        $output = "";

        $content = Content::findOrFail($request->id);
        $categories = SubCategory::where('category', $value)->get();
        if (count($categories) > 0) {
            foreach ($categories as $category) {
                if ($content->sub_cat_id == $category->id) {
                    $selected = "selected";
                } else {
                    $selected = '';
                }
                $output .= "<option {$selected} value='{$category->id}'>{$category->name}</option>";
            }
        } else {
            $output .= "<option value=''>Sub Category Not found</option>";
        }

        echo $output;
    }

    public function delete_playlist($id, $content_id)
    {
        Playlist::findOrFail($id)->delete();
        return to_route('admin.content.edit', ['id' => $content_id])->with('success', 'Content Deleted Successfully');
    }

    public function contentAssets(Request $request)
    {

        if ($request->id) {
            $content = Content::findOrFail($request->id);
            $image = "";
            if ($request->file('image')) {
                $image = $request->file('image')->store('content/image', 'public');
            } else {
                $image = $content->image;
            }

            $audio = "";
            if ($request->file('audio')) {
                $audio = $request->file('audio')->store('content/audio', 'public');
            } else {
                $audio = $content->audio;
            }
            $demo = "";
            if ($request->file('demo')) {
                $demo = $request->file('demo')->store('content/demo', 'public');
            } else {
                $demo = $content->demo;
            }
            $content->update([
                'image' => $image ?? '',
                'audio' => $audio ?? '',
                'demo' => $demo ?? '',
                'status' => 1
            ]);

            return response()->json(['success' => true, 'message' => 'update successfully', 'id' => $request->id]);
        } else {
            $image = "";
            if ($request->file('image')) {
                $image = $request->file('image')->store('content/image', 'public');
            }

            $audio = "";
            if ($request->file('audio')) {
                $audio = $request->file('audio')->store('content/audio', 'public');
            }
            $demo = "";
            if ($request->file('demo')) {
                $demo = $request->file('demo')->store('content/demo', 'public');
            }
            $content = Content::create([
                'image' => $image ?? '',
                'audio' => $audio ?? '',
                'demo' => $demo ?? '',
                'status' => 0
            ]);

            $playlist = new Playlist();
            $playlist->title = 'NO TITLE';
            $playlist->content_id = $content->id;
            $playlist->audio = $audio ?? '';
            $playlist->duration = '0';
            $playlist->authors = '';
            $playlist->save();
            return response()->json(['success' => true, 'message' => 'successfully', 'id' => $content->id]);
        }

    }
}
