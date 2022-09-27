<?php

namespace App\Http\Controllers;

use App\Models\FeaturesCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FeaturesCategoryItemInfo;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class FeaturesCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(User::checkPermission('feture.category.view') == true) {
            $categories = FeaturesCategories::orderBy('serial_num', 'asc')->get();
            return view('pages.fetures_category.categories', compact('categories'));
        }
        else {
            return Redirect()->back()->with('error', 'You can\'t access this page.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::checkPermission('create.feture.category') == true) {
            $validated = $request->validate([
                'title' => 'required|unique:features_categories',
                'serial_num' => 'required',
                'icon' => 'required',
            ]);
    
            $insert = FeaturesCategories::insert([
                'title'=>$request->title,
                'serial_num'=>$request->serial_num,
                'icon'=>$request->icon,
            ]);
    
            if($insert) {
                return Redirect()->back()->with('success', 'Feture Category added successfully');
            }
            else {
                return Redirect()->back()->with('error', 'Error occoured!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'You can\'t access this page.');
        }
    }

    public function store_feture(Request $request)
    {
        if(User::checkPermission('feture.category.create.list') == true) {
            $validated = $request->validate([
                'name' => 'required|unique:features_category_item_infos',
                'feture_serial_num' => 'required',
                'features_category_id' => 'required',
            ]);
    
            $insert = FeaturesCategoryItemInfo::insert([
                'name'=>$request->name,
                'serial_num'=>$request->feture_serial_num,
                'features_category_id'=>$request->features_category_id,
                'short_description'=>$request->short_description,
                'is_icon'=>$request->is_icon,
            ]);
    
            if($insert) {
                return Redirect()->back()->with('success', 'Feture Category ITEM added successfully');
            }
            else {
                return Redirect()->back()->with('error', 'Error occoured!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'You can\'t access this page.');
        }
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeaturesCategories  $featuresCategories
     * @return \Illuminate\Http\Response
     */
    public function show(FeaturesCategories $featuresCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeaturesCategories  $featuresCategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(User::checkPermission('update.feture.category') == true) {
            $fetures_category = FeaturesCategories::find($id);
            return view('pages.fetures_category.edit_feture_category', compact('fetures_category'));
        }
        else {
            return Redirect()->back()->with('error', 'You can\'t access this page.');
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeaturesCategories  $featuresCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::checkPermission('create.feture.category') == true) {
            $feture_category = FeaturesCategories::find($id);
            
            $validated = $request->validate([
                'title' => 'required|unique:features_categories,title,'.$feture_category->id,
                'serial_num' => 'required',
                'icon' => 'required',
            ]);

            $feture_category->title = $request->title;
            $feture_category->serial_num = $request->serial_num;
            $feture_category->icon = $request->icon;
            
            $status = $feture_category->save();
    
            if($status) {
                return Redirect()->route('admin.feture.category.and.fetures')->with('success', 'Feture Category added successfully');
            }
            else {
                return Redirect()->back()->with('error', 'Error occoured!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'You can\'t access this page.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeaturesCategories  $featuresCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeaturesCategories $featuresCategories)
    {
        //
    }


    public function edit_feture_category_item($id) {
        if(User::checkPermission('feture.category.update.list') == true) {
            $fetures_category_item_info = FeaturesCategoryItemInfo::find($id);
            return view('pages.fetures_category.edit_feture_category_item_info', compact('fetures_category_item_info'));
        }
        else {
            return Redirect()->back()->with('error', 'You can\'t access this page.');
        } 
    }

    public function update_feture_category_item(Request $request, $id)
    {
        if(User::checkPermission('feture.category.update.list') == true) {
            $info = FeaturesCategoryItemInfo::find($id);
            $validated = $request->validate([
                'name' => 'required|unique:features_category_item_infos,name,'.$info->id,
                'feture_serial_num' => 'required',
            ]);

            $info->name = $request->name;
            $info->serial_num = $request->feture_serial_num;
            $info->short_description = $request->short_description;
            $info->is_icon = $request->is_icon;
            $status = $info->save();
            
            if($status) {
                return Redirect()->route('admin.feture.category.and.fetures')->with('success', 'Feture Category ITEM Update successfully');
            }
            else {
                return Redirect()->back()->with('error', 'Error occoured!');
            }
        }
        else {
            return Redirect()->back()->with('error', 'You can\'t access this page.');
        }
    }

}
