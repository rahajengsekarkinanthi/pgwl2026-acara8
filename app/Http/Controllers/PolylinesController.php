<?php

namespace App\Http\Controllers;

use App\Models\polylinesModel;
use Illuminate\Http\Request;

class PolylinesController extends Controller
{
    public function __construct() {
        $this->polylines = new polylinesModel();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate(
            [
                'geometry_polyline' => 'required',
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ],
            [
                'geometry_polyline.required' => 'Field geometry polyline harus diisi.',
                'name.required' => 'Field name harus diisi.',
                'name.string' => 'Field name harus berupa string.',
                'name.max' => 'Field name tidak boleh lebih dari 255 karakter.',
                'description.required' => 'Field description harus diisi.',
                'description.string' => 'Field description harus berupa string.',
                'image.image' => 'File gambar harus berformat jpg, jpeg, ataupng',
                'image.max' => 'Ukuran file gambar tidak boleh lebih dari 2 MB'
            ]
        );
        
        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_polyline." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);
        } else {
            $name_image = null;
        }

        $data =[
            'geom' => $request->geometry_polyline,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $name_image,
        ];

        // Simpan data ke database
        if (!$this->polylines->create($data)) {
            return redirect()->route('peta')->with('error', 'Gagal menyimpan data polyline.');
        }

        // Kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Data polyline berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit Polyline',
            'icon' => 'fa-solid fa-pen-to-square',
            'id' => $id
        ];

        return view ('map-edit-polyline',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'geometry' => 'required',
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
            ],
            [
                'geometry.required' => 'Field geometry polyline harus diisi.',
                'name.required' => 'Field name harus diisi.',
                'name.string' => 'Field name harus berupa string.',
                'name.max' => 'Field name tidak boleh lebih dari 255 karakter.',
                'description.required' => 'Field description harus diisi.',
                'description.string' => 'Field description harus berupa string.',
                'image.image' => 'File gambar harus berformat jpg, jpeg, ataupng',
                'image.max' => 'Ukuran file gambar tidak boleh lebih dari 2 M'
            ]
        );

        if (!is_dir('storage/images')) {
            mkdir('./storage/images', 0777);
        }

        $image_old = $this->polylines->find($id)->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_polyline." . strtolower($image->getClientOriginalExtension());
            $image->move('storage/images', $name_image);

            // Proses menghapus gambar
            if($image_old !=null) {
            // Cek apakah file gambar ada sebelum dihapus
            if(file_exists('./storage/images/'. $image_old)) {
                // Hapus file gambar
                unlink('./storage/images/' . $image_old);
            }

            } else {
                $name_image = $image_old;
            }
        }

        $data = [
            'geom' => $request->input('geometry'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $name_image,
        ];

        // Simpan data ke database
        if (!$this->polylines->find($id)->update($data)) {
            return redirect()->route('peta')->with('error', 'Gagal memperbarui data polyline.');
        }

        // Kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Data polyline berhasil diperbarui.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = $this->polylines->find($id)->image;

        // Proses menghapus gambar
        if($image !=null) {
            // Cek apakah file gambar ada sebelum dihapus
            if(file_exists('./storage/images/'. $image)) {
                // Hapus file gambar
                unlink('./storage/images/' . $image);
            }
        }

         // Simpan data ke database
        if (!$this->polylines->destroy($id)) {
            return redirect()->route('peta')->with('error', 'Gagal menghapus data polyline.');
        }

        // Kembali ke halaman peta
        return redirect()->route('peta')->with('success', 'Data polyline berhasil dihapus.');
    }
}
