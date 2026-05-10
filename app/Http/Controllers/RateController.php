<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RateController extends Controller
{
    public function index(Request $request)
    {
        $query = Rate::query();
        $filterSection = $request->input('filter_section');

        if ($filterSection && $filterSection !== '') {
            $query->where('section', $filterSection);
        }

        $rates = $query->latest()->paginate(15);
        
        return view('admin.rates.index', [
            'rates' => $rates,
            'selectedSection' => $filterSection
        ]);
    }
    
    public function create()
    {
        return view('admin.rates.create');
    }
    
    public function store(Request $request)
    {
        $validSections = ['course_type', 'accommodation_fee', 'options', 'registration', 'discount_definition', 'date_period'];

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'section' => ['required', 'string', Rule::in($validSections)],
            'summary' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'weekly_rates' => 'required|array',
            'weekly_rates.odd.*' => 'nullable|numeric|min:0',
            'weekly_rates.even.*' => 'nullable|numeric|min:0',
            'tags_input' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $rateData = $request->except(['_token', 'tags_input', 'weekly_rates']);
        
        if ($request->filled('weekly_rates')) {
            $rateData['weekly_rates_details'] = json_encode($request->input('weekly_rates'));
        } else {
            $rateData['weekly_rates_details'] = json_encode([]);
        }
        
        $rate = Rate::create($rateData);

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
                    $rate->tags()->sync($tagIds);
                } else {
                    $rate->tags()->detach();
                }
            } else {
                 $rate->tags()->detach();
            }
        } else {
            $rate->tags()->detach(); 
        }
        
        return redirect()->route('admin.rates.edit', $rate->id)->with('success', 'Tarifa "' . $rate->title . '" creada con éxito.');
    }
    
    public function show(Rate $rate)
    {
        $tags_input = $rate->tags->pluck('name')->implode(', ');
        return view('admin.rates.edit', compact('rate', 'tags_input'))->with('info', 'Mostrando detalles (modo edición).');
    }
    
    public function edit(Rate $rate)
    {
        $tags_input = $rate->tags->pluck('name')->implode(', ');
        return view('admin.rates.edit', compact('rate', 'tags_input'));
    }
    
    public function update(Request $request, Rate $rate)
    {
        $validSections = ['course_type', 'accommodation_fee', 'options', 'registration', 'discount_definition', 'date_period'];

        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255', Rule::unique('rates')->ignore($rate->id)],
            'section' => ['required', 'string', Rule::in($validSections)],
            'summary' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'weekly_rates' => 'required|array',
            'weekly_rates.odd.*' => 'nullable|numeric|min:0',
            'weekly_rates.even.*' => 'nullable|numeric|min:0',
            'tags_input' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $rateData = $request->except(['_token', '_method', 'tags_input', 'weekly_rates']);
        
        if ($request->filled('weekly_rates')) {
            $rateData['weekly_rates_details'] = json_encode($request->input('weekly_rates'));
        } else {
            $rateData['weekly_rates_details'] = json_encode([]);
        }
        
        $rate->update($rateData);
        
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
        
        $rate->tags()->sync($tagIds); 
        
        return redirect()->route('admin.rates.edit', $rate->id)->with('success', 'Tarifa "' . $rate->title . '" actualizada con éxito.');
    }
    
    public function destroy(Rate $rate)
    {
        try {
            $rateTitle = $rate->title;
            
            $rate->tags()->detach(); 
            
            $rate->delete();
            
            return redirect()->route('admin.rates.index')->with('success', "Tarifa '{$rateTitle}' eliminada con éxito.");
        } catch (\Exception $e) {
            return redirect()->route('admin.rates.index')->with('error', 'Error al eliminar la tarifa: ' . $e->getMessage());
        }
    }
}