<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order')->orderBy('title')->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create', ['project' => new Project(['published' => true])]);
    }

    public function store(Request $request)
    {
        Project::create($this->validated($request));

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proyecto creado correctamente.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($this->validated($request, $project));

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Proyecto eliminado.');
    }

    private function validated(Request $request, ?Project $project = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'summary' => ['required', 'string', 'max:300'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'url', 'max:255'],
            'tech_stack' => ['nullable', 'string', 'max:255'],
            'repo_url' => ['nullable', 'url', 'max:255'],
            'demo_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['tech_stack'] = $this->parseTechStack($data['tech_stack'] ?? null);
        $data['featured'] = $request->boolean('featured');
        $data['published'] = $request->boolean('published');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['slug'] = $this->uniqueSlug($data['title'], $project?->getKey());

        return $data;
    }

    private function parseTechStack(?string $techStack): array
    {
        if (! $techStack) {
            return [];
        }

        return collect(explode(',', $techStack))
            ->map(fn (string $tech) => trim($tech))
            ->filter()
            ->values()
            ->all();
    }

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $suffix = 1;

        while (Project::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
            ->exists()) {
            $slug = $base.'-'.(++$suffix);
        }

        return $slug;
    }
}
