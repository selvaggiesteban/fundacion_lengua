<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule; // Importar Rule para validación unique

class ScholarshipController extends Controller
{
    public function index(Request $request)
    {
        $query = Scholarship::query();
        $filterSection = $request->input('filter_section');

        if ($filterSection && $filterSection !== '') {
            $query->where('section', $filterSection);
        }

        $scholarships = $query->withCount('students')->latest()->paginate(15)->withQueryString();

        return view('admin.scholarships.index', [
            'scholarships' => $scholarships,
            'selectedSection' => $filterSection
        ]);
    }

    public function create()
    {
        return view('admin.scholarships.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'summary' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'application_start_date' => 'required|date',
            'application_end_date' => 'required|date|after_or_equal:application_start_date',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'discount_code' => 'nullable|string|max:255|unique:scholarships', // Añadido validación
            'foundation_notes' => 'nullable|string',
            'discounts' => 'nullable|array',
            'discounts.odd.*' => 'nullable|numeric|min:0|max:100',
            'discounts.even.*' => 'nullable|numeric|min:0|max:100',
            'tags_input' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $scholarshipData = $request->except(['_token', 'image', 'tags_input', 'discounts']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('scholarship_images', 'public');
            $scholarshipData['image_path'] = $imagePath;
        }

        if ($request->filled('discounts')) {
            $scholarshipData['discount_details'] = json_encode($request->input('discounts'));
        } else {
             $scholarshipData['discount_details'] = null;
        }

        $scholarship = Scholarship::create($scholarshipData);

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
                    $scholarship->tags()->sync($tagIds);
                } else {
                    $scholarship->tags()->detach();
                }
            } else {
                 $scholarship->tags()->detach();
            }
        } else {
            $scholarship->tags()->detach();
        }

        return redirect()->route('admin.scholarships.edit', $scholarship->id)->with('success', 'Beca "' . $scholarship->title . '" creada con éxito.');
    }

    public function show(Scholarship $scholarship)
    {
        return view('admin.scholarships.show', compact('scholarship'));
    }

    public function edit(Scholarship $scholarship)
    {
        $tags_input = $scholarship->tags->pluck('name')->implode(', ');

        $discount_details = $scholarship->discount_details;

        return view('admin.scholarships.edit', compact('scholarship', 'tags_input', 'discount_details'));
    }

    public function update(Request $request, Scholarship $scholarship)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'summary' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'application_start_date' => 'required|date',
            'application_end_date' => 'required|date|after_or_equal:application_start_date',
            'contact_name' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'discount_code' => ['nullable', 'string', 'max:255', Rule::unique('scholarships')->ignore($scholarship->id)], // Añadido validación con ignore
            'foundation_notes' => 'nullable|string',
            'discounts' => 'nullable|array',
            'discounts.odd.*' => 'nullable|numeric|min:0|max:100',
            'discounts.even.*' => 'nullable|numeric|min:0|max:100',
            'tags_input' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $scholarshipData = $request->except(['_token', '_method', 'image', 'tags_input', 'discounts']);

        if ($request->hasFile('image')) {
            if ($scholarship->image_path && Storage::disk('public')->exists($scholarship->image_path)) {
                Storage::disk('public')->delete($scholarship->image_path);
            }
            $imagePath = $request->file('image')->store('scholarship_images', 'public');
            $scholarshipData['image_path'] = $imagePath;
        }

        if ($request->filled('discounts')) {
            $scholarshipData['discount_details'] = json_encode($request->input('discounts'));
        } else {
            $scholarshipData['discount_details'] = $request->input('discounts') ? json_encode($request->input('discounts')) : null;
        }

        $scholarship->update($scholarshipData);

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

        $scholarship->tags()->sync($tagIds);

        return redirect()->route('admin.scholarships.edit', $scholarship->id)->with('success', 'Beca "' . $scholarship->title . '" actualizada con éxito.');
    }

    public function destroy(Scholarship $scholarship)
    {
        try {
            if ($scholarship->image_path && Storage::disk('public')->exists($scholarship->image_path)) {
                Storage::disk('public')->delete($scholarship->image_path);
            }

            $scholarshipTitle = $scholarship->title;

            $scholarship->tags()->detach();
            $scholarship->students()->detach();
            $scholarship->delete();

            return redirect()->route('admin.scholarships.index')->with('success', "Beca '{$scholarshipTitle}' eliminada con éxito.");
        } catch (\Exception $e) {
            return redirect()->route('admin.scholarships.index')->with('error', 'Error al eliminar la beca: ' . $e->getMessage());
        }
    }
}