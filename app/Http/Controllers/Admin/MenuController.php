<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('public/menus');
        $menu = Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price
        ]);
        if($request->has('categories')){
            $menu->categories()->attach($request->categories);
        }
        return to_route('admin.menus.index')->with('success','Menu insert successfully ');
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
        $menus = Menu::find($id);
        $categories = Category::all();
        return view('admin.menus.edit',compact('menus','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Menu $menus, $id)
    {
        
        $menus = Menu::find($id);
        
        $request->validate([
            'name' => 'required',
            'price' =>'required',
            'description' => 'required'   
        ]);
        
        $image = $menus->image;
        if($request->hasFile('image')){
            Storage::delete(($menus->image));
            $image = $request->file('image')->store('public/menus');
        }
        
        try {
            $menus->update([
                'name' => $request->name,
                'price' =>$request->price,
                'description' => $request->description,
                'image' => $image
            ]);
        } catch (\Exception $e) {
            return to_route('admin.menus.edit');
        }
        
        
        return to_route('admin.menus.index')->with('updateSuccess','Menu update successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu, $id)
    { 
        $menu = Menu::find($id);
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();
        return to_route('admin.menus.index')->with('danger', 'Menu deleted successfully.');
        
    }
}
