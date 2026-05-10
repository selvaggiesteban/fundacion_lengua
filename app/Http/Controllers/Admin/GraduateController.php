<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
    use App\Models\Graduate;
    use App\Models\GraduateImage;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;

    class GraduateController extends Controller
    {
        public function index()
        {
            $graduates = Graduate::withCount('images')->orderBy('event_date', 'desc')->paginate(10);
            return view('admin.graduates.index', compact('graduates'));
        }
        
        public function create()
        {
            return view('admin.graduates.create');
        }
        
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'event_date' => 'required|date',
                'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
            ]);

            $graduate = new Graduate();
            $graduate->name = $request->name;
            $graduate->description = $request->description;
            $graduate->event_date = $request->event_date;
            $graduate->save();
            
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $key => $file) {
                    $imageName = Str::slug($request->name) . '_gallery_' . $graduate->id . '_' . time() . '_' . $key . '.' . $file->extension();
                    $path = $file->storeAs('graduates/galleries/' . $graduate->id, $imageName, 'public');

                    GraduateImage::create([
                        'graduate_id' => $graduate->id,
                        'image_path' => $path,
                        'caption' => $request->input('captions.' . $key)
                    ]);
                }
            }

            return redirect()->route('admin.graduates.index')->with('success', 'Galería creada exitosamente.');
        }
        
        public function edit(Graduate $graduate)
        {
            $graduate->load('images');
            return view('admin.graduates.edit', compact('graduate'));
        }
        
        public function update(Request $request, Graduate $graduate)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'event_date' => 'required|date',
                'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
            ]);

            $graduate->name = $request->name;
            $graduate->description = $request->description;
            $graduate->event_date = $request->event_date;
            $graduate->save();

            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $key => $file) {
                    $imageName = Str::slug($request->name) . '_gallery_' . $graduate->id . '_' . time() . '_' . $key . '.' . $file->extension();
                    $path = $file->storeAs('graduates/galleries/' . $graduate->id, $imageName, 'public');
                    GraduateImage::create([
                        'graduate_id' => $graduate->id,
                        'image_path' => $path,
                        'caption' => $request->input('captions.' . $key)
                    ]);
                }
            }
            
            if ($request->has('delete_images')) {
                $imagesToDelete = GraduateImage::whereIn('id', $request->input('delete_images', []))
                                            ->where('graduate_id', $graduate->id)
                                            ->get();
                foreach ($imagesToDelete as $img) {
                    Storage::disk('public')->delete($img->image_path);
                    $img->delete();
                }
            }

            return redirect()->route('admin.graduates.index')->with('success', 'Galería actualizada exitosamente.');
        }
        
        public function destroy(Graduate $graduate)
        {
            foreach ($graduate->images as $image) {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
            Storage::disk('public')->deleteDirectory('graduates/galleries/' . $graduate->id);
            $graduate->delete();
            return redirect()->route('admin.graduates.index')->with('success', 'Galería eliminada exitosamente.');
        }
        
        public function destroyImage(Request $request, Graduate $graduate, GraduateImage $image)
        {
            if ($image->graduate_id !== $graduate->id) {
                return response()->json(['error' => 'Acción no autorizada.'], 403);
            }
            try {
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
                return response()->json(['success' => 'Imagen eliminada correctamente.']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'No se pudo eliminar la imagen.'], 500);
            }
        }
    }