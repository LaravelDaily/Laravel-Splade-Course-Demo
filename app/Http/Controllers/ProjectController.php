<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => SpladeTable::for(Project::class)
                ->column('id')
                ->column('name')
                ->column('actions')
                ->paginate(15),
        ]);
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('projects.create', compact('categories', 'users'));
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['logo'] = $request->file('logo')->store('logos');
        $project = Project::create($data);

        $project->users()->attach($request->users);

        Toast::title('Project saved');

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        SEO::title($project->name);

        $categories = Category::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('projects.edit', compact('project', 'categories', 'users'));
    }

    public function update(Project $project, StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['logo'] = $request->file('logo')->store('logos');
        $project->update($data);

        $project->users()->sync($request->users);

        Toast::title('Project saved');

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {

        $project->users()->detach();
        $project->delete();

        return redirect()->route('projects.index');
    }

}
