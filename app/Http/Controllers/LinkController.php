<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function createForm()
    {
        return view('create');
    }
    public function fetchForm()
    {
        return view('fetch');
    }
    public function show(Request $request)
    {
        $shortUrl = $request->query('shortUrl');
        return view('show', compact('shortUrl'));
    }
    public function original(Request $request)
    {
        $originalUrl = $request->query('originalUrl');
        return view('original', compact('originalUrl'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);
        
        $originalUrl = $request->input('url');
        $exists = Link::where('original_url', $originalUrl)->exists();
        if (!$exists) {
            $link = Link::create(['original_url' => $originalUrl, 'short_url_token' => '']);
            $hashids = new Hashids();
            $shortUrlToken = $hashids->encode($link->id);
            $link->short_url_token = $shortUrlToken;
            $link->save();
            $shortUrl = url('/short/' . $shortUrlToken);
            return redirect()->route('show', ['shortUrl' => $shortUrl])->with(['success' => 'Link Successfully shortened']);
        } else {
            return redirect()->back()->with(['success' => 'Link Already shortened!']);
        }
    }

    public function fetch(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);
        $shortUrl = $request->input('url');
        $parsedUrl = parse_url($shortUrl);
        if (isset($parsedUrl['path']) && strpos($parsedUrl['path'], "/short") !== false) {
            $token = str_replace('/short/', '', $parsedUrl['path']);
            $exists = Link::where('short_url_token', $token)->exists();
            if ($exists) {
                $link = Link::where('short_url_token', $token)->firstOrFail();
                $originalUrl = $link->original_url;
                return redirect()->route('original', ['originalUrl' => $originalUrl])->with(['success' => 'Link Found!']);
            } else {
                return redirect()->back()->with(['error' => "Provided Link was NOT shortened using this app!"]);
            }
        } else if (strpos($parsedUrl['path'], "/short") === false) {
            return redirect()->back()->with(['error' => "Invalid Link Provided!"]);
        }
    }

    public function redirect($token)
    {
        $link = Link::where('short_url_token', $token)->firstOrFail();
        $originalUrl = $link->original_url;
        return redirect()->away($originalUrl);
    }
}
