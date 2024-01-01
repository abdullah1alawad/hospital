<?php

namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;
use Illuminate\Support\Facades\Validator;

class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {
        $sections = Section::all();
        return view('Dashboard/Sections/index', compact('sections'));
    }

    public function store($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Section::create([
            'name' => $request->name,
        ]);
        session()->flash('add');
        return redirect()->route('Sections.index');
    }

    public function update($request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'exists:sections,id'],
            'name' => ['required', 'string', 'min:2']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->name,
        ]);
        session()->flash('edit');
        return redirect()->route('Sections.index');
    }

    public function destroy($request)
    {
        Section::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Sections.index');
    }
}
