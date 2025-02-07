<?php

namespace App\Http\Controllers;

use App\Aspect;
use Illuminate\Http\Request;

class AspectController extends Controller
{
    public function index()
    {
        $aspects = Aspect::orderBy('created_at', 'DESC')->get();
        return view('admin.aspect.index', compact('aspects'));
    }
    public function edit(Aspect $aspect)
    {
        return view('admin.aspect.edit', compact('aspect'));
    }

    public function update(Aspect $aspect, Request $request)
    {
        $request->validate([
            'aspect' => 'required|min:5',
        ]);

        $aspect->update($request->only(['aspect']));

        return redirect('/admin/aspect')->with('success', 'aspek ' . $aspect->aspect . ' telah diperbaharui');
    }
}
