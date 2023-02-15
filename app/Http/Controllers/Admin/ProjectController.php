<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', [
            "projects" => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        //$data = $request->validate([
        //    "name"=>"required|string|min:3",
        //    "description"=>"required|string|min:10",
        //    "cover_img"=>"nullable|image",
        //    "github_link"=>"nullable|string|url",
        //]);

        $data = $request -> all();

        $path = Storage::put("projects_thumb", $data["cover_img"]);
        //if (key_exists("cover_img", $data)) {}


        $projects = Project::create([
            ...$data,
            "cover_img" => $path,
            //"cover_img" => $data["cover_img"] ?? " "
        ]);
        return redirect() -> route("admin.projects.show", $projects -> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view("admin.projects.show", ["project" => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view("admin.projects.edit", ["project" => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, $id)
    {
        $data = $request->validated();
        //$data = $request->validate([
        //    "name"=>"required|string|min:3",
        //    "description"=>"required|string|min:10",
        //    "cover_img"=>"nullable|image",
        //    "github_link"=>"nullable|string|url",
        //]);
        $project = Project::findOrFail($id);
        $data = $request -> all();
        $project->update($data);
        return redirect() -> route("admin.projects.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        //if ($project->cover_img) {
        //    Storage::delete($project->cover_img);
        //}
        return redirect() -> route("admin.projects.index");
    }
}
