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
            'translator' => json_encode($request->translator) ?? json_encode([]),
            'total_duration' => $request->total_duration ?? json_encode([]),
            'cost' => json_encode($request->cost) ?? json_encode([]),
            'summary' => $request->summary ?? '',
            'is_search' => $request->search,
            'author_id' => json_encode($request->authors) ?? json_encode([]),
            'authors' => json_encode($request->authors) ?? json_encode([]),
            'cost2' => json_encode($request->cost2) ?? json_encode([]),
            'producers' => json_encode($request->producers) ?? json_encode([]),
            'adoption' => json_encode($request->adoption) ?? json_encode([]),
            'director' => json_encode($request->director) ?? json_encode([]),
            'music_director' => json_encode($request->music_director) ?? json_encode([]),
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

        return response()->json(['success' => true, 'message' => 'data add successfully']);

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
        // return response()->json(['success' => true, 'message' => 'data add successfully']);
        // return to_route('admin.content.index')->with('success', 'Content add successfully');
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('admin.content.update', compact('content'));
    }


    public function update(Request $request)
    {

        $content = Content::findOrFail($request->id);
        $contents = Content::whereTitle($content->title)->get();
        foreach ($contents as $content1) {
            $content1->update([
                'category' => $request->category ?? '',
                'sub_cat_id' => $request->sub_cat_id[0],
                'title' => $request->title ?? '',
                'isbn' => $request->isbn ?? '',
                'translator' => json_encode($request->translator) ?? json_encode([]),
                'total_duration' => $request->total_duration ?? json_encode([]),
                'cost' => json_encode($request->cost) ?? json_encode([]),
                'summary' => $request->summary ?? '',
                'is_search' => $request->search,
                'author_id' => json_encode($request->authors) ?? json_encode([]),
                'authors' => json_encode($request->authors) ?? json_encode([]),
                'cost2' => json_encode($request->cost2) ?? json_encode([]),
                'producers' => json_encode($request->producers) ?? json_encode([]),
                'adoption' => json_encode($request->adoption) ?? json_encode([]),
                'director' => json_encode($request->director) ?? json_encode([]),
                'music_director' => json_encode($request->music_director) ?? json_encode([]),
                'status' => 1
            ]);
        }
        return response()->json(['success' => true, 'message' => $content]);
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
    public function contentAssetsImage(Request $request)
    {

        // if ($request->id) {
        //     $content = Content::findOrFail($request->id);
        //     $image = "";
        //     if ($request->file('image')) {
        //         $image = $request->file('image')->store('content/image', 'public');
        //     } else {
        //         $image = $content->image;
        //     }

        //     $audio = "";
        //     if ($request->file('audio')) {
        //         $audio = $request->file('audio')->store('content/audio', 'public');
        //     } else {
        //         $audio = $content->audio;
        //     }
        //     $demo = "";
        //     if ($request->file('demo')) {
        //         $demo = $request->file('demo')->store('content/demo', 'public');
        //     } else {
        //         $demo = $content->demo;
        //     }
        //     $content->update([
        //         'image' => $image ?? '',
        //         'audio' => $audio ?? '',
        //         'demo' => $demo ?? '',
        //         'status' => 1
        //     ]);

        //     return response()->json(['success' => true, 'message' => 'update successfully', 'id' => $request->id]);
        // } else {


        //     $audio = "";
        //     if ($request->file('audio')) {
        //         $audio = $request->file('audio')->store('content/audio', 'public');
        //     }
        //     $demo = "";
        //     if ($request->file('demo')) {
        //         $demo = $request->file('demo')->store('content/demo', 'public');
        //     }
        //     $image = "";

        // }
        if ($request->file('image')) {
            $image = $request->file('image')->store('content/image', 'public');
        }
        $content = Content::create([
            'image' => $image ?? '',
            'audio' => '',
            'demo' => '',
            'status' => 0
        ]);

        $playlist = new Playlist();
        $playlist->title = 'NO TITLE';
        $playlist->content_id = $content->id;
        $playlist->audio =  '';
        $playlist->duration = '0';
        $playlist->authors = '';
        $playlist->save();
        return response()->json(['success' => true, 'message' => 'Image upload successfully', 'id' => $content->id]);
    }

    public function contentAssetsDemo(Request $request)
    {

        // if ($request->id) {
        //     $content = Content::findOrFail($request->id);
        //     $image = "";
        //     if ($request->file('image')) {
        //         $image = $request->file('image')->store('content/image', 'public');
        //     } else {
        //         $image = $content->image;
        //     }

        //     $audio = "";
        //     if ($request->file('audio')) {
        //         $audio = $request->file('audio')->store('content/audio', 'public');
        //     } else {
        //         $audio = $content->audio;
        //     }
        //     $demo = "";
        //     if ($request->file('demo')) {
        //         $demo = $request->file('demo')->store('content/demo', 'public');
        //     } else {
        //         $demo = $content->demo;
        //     }
        //     $content->update([
        //         'image' => $image ?? '',
        //         'audio' => $audio ?? '',
        //         'demo' => $demo ?? '',
        //         'status' => 1
        //     ]);

        //     return response()->json(['success' => true, 'message' => 'update successfully', 'id' => $request->id]);
        // } else {


        //     $audio = "";
        //     if ($request->file('audio')) {
        //         $audio = $request->file('audio')->store('content/audio', 'public');
        //     }
        //     $demo = "";
        //     if ($request->file('demo')) {
        //         $demo = $request->file('demo')->store('content/demo', 'public');
        //     }
        //     $image = "";

        // }
        $demo = "";
        if ($request->file('demo')) {
            $demo = $request->file('demo')->store('content/demo', 'public');
        }
        $content = Content::findOrFail($request->id)->update([
            'demo' => $demo,
        ]);

        $playlist = new Playlist();
        $playlist->title = 'NO TITLE';
        $playlist->content_id = $request->id;
        $playlist->audio =  '';
        $playlist->duration = '0';
        $playlist->authors = '';
        $playlist->save();
        return response()->json(['success' => true, 'message' => 'Demo upload successfully', 'id' => $request->id]);
    }

    public function contentAssetsAudio(Request $request)
    {

        // if ($request->id) {
        //     $content = Content::findOrFail($request->id);
        //     $image = "";
        //     if ($request->file('image')) {
        //         $image = $request->file('image')->store('content/image', 'public');
        //     } else {
        //         $image = $content->image;
        //     }

        //     $audio = "";
        //     if ($request->file('audio')) {
        //         $audio = $request->file('audio')->store('content/audio', 'public');
        //     } else {
        //         $audio = $content->audio;
        //     }
        //     $demo = "";
        //     if ($request->file('demo')) {
        //         $demo = $request->file('demo')->store('content/demo', 'public');
        //     } else {
        //         $demo = $content->demo;
        //     }
        //     $content->update([
        //         'image' => $image ?? '',
        //         'audio' => $audio ?? '',
        //         'demo' => $demo ?? '',
        //         'status' => 1
        //     ]);

        //     return response()->json(['success' => true, 'message' => 'update successfully', 'id' => $request->id]);
        // } else {


        //     $audio = "";
        //     if ($request->file('audio')) {
        //         $audio = $request->file('audio')->store('content/audio', 'public');
        //     }
        //     $demo = "";
        //     if ($request->file('demo')) {
        //         $demo = $request->file('demo')->store('content/demo', 'public');
        //     }
        //     $image = "";

        // }
        $audio = "";
        if ($request->file('audio')) {
            $audio = $request->file('audio')->store('content/audio', 'public');
        }
        $content = Content::findOrFail($request->id)->update([
            'audio' => $audio,
        ]);

        $playlist = new Playlist();
        $playlist->title = 'NO TITLE';
        $playlist->content_id = $request->id;
        $playlist->audio =  '';
        $playlist->duration = '0';
        $playlist->authors = '';
        $playlist->save();
        return response()->json(['success' => true, 'message' => 'Audio upload successfully', 'id' => $request->id]);
    }


    function updateAssetImage(Request $request)
    {
        $content = Content::findOrFail($request->id);
        $contents = Content::whereTitle($content->title)->get();
        foreach ($contents as $content1) {
            $image = "";
            if ($request->file('image')) {
                $image = $request->file('image')->store('content/image', 'public');
            } else {
                $image = $content1->image;
            }
            $content1->update([
                'image' => $image ?? '', 
            ]);
        }
        return response()->json(['success' => true, 'message' => 'Image update successfully', 'id' => $content->id]);
    }


    function updateAssetDemo(Request $request)
    {
        $content = Content::findOrFail($request->id);
        $contents = Content::whereTitle($content->title)->get();
        foreach ($contents as $content1) {
            $demo = "";
            if ($request->file('demo')) {
                $demo = $request->file('demo')->store('content/demo', 'public');
            } else {
                $demo = $content1->demo;
            }
            $content1->update([
                'demo' => $demo ?? '',
            ]);
        }
        return response()->json(['success' => true, 'message' => 'Demo update successfully', 'id' => $content->id]);
    }

    function updateAssetAudio(Request $request)
    {
        $content = Content::findOrFail($request->id);
        $contents = Content::whereTitle($content->title)->get();
        foreach ($contents as $content1) {
            $audio = "";
            if ($request->file('audio')) {
                $audio = $request->file('audio')->store('content/audio', 'public');
            } else {
                $audio = $content1->audio;
            }
            $content1->update([
                'audio' => $audio ?? '',
            ]);
        }
        return response()->json(['success' => true, 'message' => 'Audio update successfully', 'id' => $content->id]);
    }
}
