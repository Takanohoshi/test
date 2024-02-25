<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\books;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class DatabukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bukudata = books::query();
        //fungsi search
       if ($request->has('search')) {
           $search = $request->input('search');
           $bukudata->where(function ($query) use ($search) {
               $query->where('judul', 'like', '%' . $search . '%')
                     ->orwhere('kategori', 'like', '%' . $search . '%')
                     ->orWhere('tahun', 'like', '%' . $search . '%')
                     ->orWhere('deskripsi', 'like', '%' . $search . '%');
           });
       }
                   // Tambahkan metode orderBy untuk mengurutkan data berdasarkan kolom created_at (atau yang lain sesuai kebutuhan)
                   $bukudata->orderBy('created_at', 'desc');
                   // Eksekusi query dan ambil hasilnya menggunakan ->get()
                   $bukudata = $bukudata->get();
   
       return view('admin.databuk.index', compact('bukudata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $title = 'Create | Data';
        return view('admin.databuk.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari formulir
        $rules = [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:100000',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun' => 'required|date',
            'kategori' => 'required|array',
            'deskripsi' => 'required|string',
        ];

        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate($rules);

        // Ambil file cover dan file PDF dari request
        $covered = $request->file('cover');

        // Generate nama file unik berdasarkan tanggal
        $coverFilename = date('Y-m-d') . $covered->getClientOriginalName();

        // Tentukan path penyimpanan untuk file cover dan file PDF
        $coverPath = 'cover/' . $coverFilename;

        // Simpan file cover
        Storage::disk('public')->put($coverPath, file_get_contents($covered));

        // Buat objek Dataartikel dan simpan ke database
        $book = books::create([
            'cover' => $coverFilename,
            'judul' => $validatedData['judul'],
            'penulis' => $validatedData['penulis'],
            'penerbit' => $validatedData['penerbit'],
            'tahun' => $validatedData['tahun'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        // Ambil kategori yang dipilih dari formulir
        $selectedCategories = $validatedData['kategori'];

        // Dapatkan kategori yang sudah terkait dengan buku
        $currentCategories = $book->categories->pluck('id')->toArray();

        // Tentukan kategori baru yang perlu ditambahkan
        $newCategories = array_diff($selectedCategories, $currentCategories);

        // Attach kategori yang baru ke buku
        $book->categories()->attach($newCategories);

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('databuk.index')->with('success', 'buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = books::findOrFail($id);
        $categories = Category::all();
        $title = 'Edit | Data';
        
        return view('admin.databuk.edit', compact('title', 'book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data dari formulir
        $rules = [
            'cover' => 'image|mimes:jpeg,png,jpg,gif|max:100000',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun' => 'required|date',
            'kategori' => 'required|array',
            'deskripsi' => 'required|string',
        ];

        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate($rules);

        // Ambil buku yang akan diperbarui
        $book = books::findOrFail($id);

        // Cek apakah ada file cover baru yang diunggah
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            Storage::disk('public')->delete('cover/' . $book->cover);

            // Ambil file cover yang baru
            $covered = $request->file('cover');

            // Generate nama file cover yang baru berdasarkan tanggal
            $coverFilename = date('Y-m-d') . $covered->getClientOriginalName();

            // Tentukan path penyimpanan untuk file cover yang baru
            $coverPath = 'cover/' . $coverFilename;

            // Simpan file cover yang baru
            Storage::disk('public')->put($coverPath, file_get_contents($covered));

            // Update nama file cover pada database
            $book->update(['cover' => $coverFilename]);
        }

        // Update data buku (termasuk cover jika ada perubahan)
        $book->update([
            'judul' => $validatedData['judul'],
            'penulis' => $validatedData['penulis'],
            'penerbit' => $validatedData['penerbit'],
            'tahun' => $validatedData['tahun'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        // Ambil kategori yang dipilih dari formulir
        $selectedCategories = $validatedData['kategori'];

        // Sync kategori yang dipilih ke buku menggunakan relasi many-to-many
        $book->categories()->sync($selectedCategories);

        // Redirect ke halaman daftar buku dengan pesan sukses
        return redirect()->route('databuk.index')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    // Temukan dan hapus buku berdasarkan ID
    $book = books::findOrFail($id);

    // Hapus file cover dari penyimpanan
    Storage::disk('public')->delete('cover/' . $book->cover);

    // Hapus relasi many-to-many di tabel pivot
    $book->categories()->detach();

    // Hapus buku dari database
    $book->delete();

    // Redirect ke halaman daftar buku dengan pesan sukses
    return redirect()->route('databuk.index')->with('success', 'Buku berhasil dihapus');
    }
}
