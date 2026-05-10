<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AccomodationController extends Controller
{
    public function index(Request $request)
    {
        $query = Accomodation::query();

        $filterSection = $request->input('filter_section');
        
        if ($filterSection && $filterSection !== '') {
            $query->where('section', $filterSection);
        }

        $accomodations = $query->latest()->paginate(15)->withQueryString();
        
        return view('admin.accomodations.index', [
            'accomodations' => $accomodations,
            'selectedSection' => $filterSection
        ]);
    }
    
    public function create()
    {
        return view('admin.accomodations.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'tax_id' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone_1' => 'required|string|max:255',
            'fax' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'contact1_name' => 'required|string|max:255',
            'contact1_position' => 'required|string|max:255',
            'contact1_email' => 'required|email|max:255',
            'phone_2' => 'nullable|string|max:255',
            'contact2_name' => 'nullable|string|max:255',
            'contact2_position' => 'nullable|string|max:255',
            'contact2_email' => 'nullable|email|max:255',
            'extra_info_1' => 'nullable|string',
            'extra_info_2' => 'nullable|string',
            'other_data' => 'nullable|string',
            'observations' => 'nullable|string',
            'tags_input' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $accomodationData = $request->except(['_token', 'tags_input']);
        $accomodation = Accomodation::create($accomodationData);

        if ($request->filled('tags_input')) {
            $tagNames = array_map('trim', explode(',', $request->input('tags_input')));
            $tagIds = [];
            if (count($tagNames) > 0) {
                foreach ($tagNames as $tagName) {
                    if (!empty($tagName)) {
                        $tag = Tag::firstOrCreate(
                            ['slug' => Str::slug($tagName)],
                            ['name' => $tagName]
                        );
                        $tagIds[] = $tag->id;
                    }
                }
                if (!empty($tagIds)) {
                    $accomodation->tags()->sync($tagIds);
                } else {
                    $accomodation->tags()->detach();
                }
            } else {
                 $accomodation->tags()->detach();
            }
        } else {
            $accomodation->tags()->detach();
        }
        
        return redirect()->route('admin.accomodations.edit', $accomodation->id)->with('success', 'Alojamiento "' . $accomodation->name . '" creado con éxito.');
    }
    
    public function show(Accomodation $accomodation)
    {
        return view('admin.accomodations.show', compact('accomodation'));
    }
    
    public function edit(Accomodation $accomodation)
    {
        $tags_input = $accomodation->tags->pluck('name')->implode(', ');
        
        return view('admin.accomodations.edit', compact('accomodation', 'tags_input'));
    }
    
    public function update(Request $request, Accomodation $accomodation)
    {
        $validator = Validator::make($request->all(), [
            'section' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'tax_id' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone_1' => 'required|string|max:255',
            'fax' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
            'contact1_name' => 'required|string|max:255',
            'contact1_position' => 'required|string|max:255',
            'contact1_email' => 'required|email|max:255',
            'phone_2' => 'nullable|string|max:255',
            'contact2_name' => 'nullable|string|max:255',
            'contact2_position' => 'nullable|string|max:255',
            'contact2_email' => 'nullable|email|max:255',
            'extra_info_1' => 'nullable|string',
            'extra_info_2' => 'nullable|string',
            'other_data' => 'nullable|string',
            'observations' => 'nullable|string',
            'tags_input' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $accomodationData = $request->except(['_token', '_method', 'tags_input']);
        $accomodation->update($accomodationData);

        $tagIds = [];
        if ($request->filled('tags_input')) {
            $tagNames = array_map('trim', explode(',', $request->input('tags_input')));
            if (count($tagNames) > 0) {
                foreach ($tagNames as $tagName) {
                    if (!empty($tagName)) {
                        $tag = Tag::firstOrCreate(
                            ['slug' => Str::slug($tagName)],
                            ['name' => $tagName]
                        );
                        $tagIds[] = $tag->id;
                    }
                }
            }
        }
        
        $accomodation->tags()->sync($tagIds);
        
        return redirect()->route('admin.accomodations.edit', $accomodation->id)->with('success', 'Alojamiento "' . $accomodation->name . '" actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accomodation $accomodation)
    {
        try {
            $accomodationName = $accomodation->name;
            // Antes de eliminar el alojamiento, desasociar las etiquetas
            $accomodation->tags()->detach();
            // También desasociamos estudiantes si existen
            $accomodation->students()->detach();
            $accomodation->delete();
            return redirect()->route('admin.accomodations.index')->with('success', "Alojamiento '{$accomodationName}' eliminado con éxito.");
        } catch (\Exception $e) {
            return redirect()->route('admin.accomodations.index')->with('error', 'Error al eliminar el alojamiento: ' . $e->getMessage());
        }
    }
}