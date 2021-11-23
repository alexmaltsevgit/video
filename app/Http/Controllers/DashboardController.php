<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request, string $token)
    {
        $modules = $this->getModules();
        return view('dashboard', ['token' => $token, 'modules' => $modules, 'videos' => []]);
    }

    public function module(Request $request, string $token, string $module)
    {
        $modules = $this->getModules();
        $videos = $this->getVideosByModule($module);
        return view('dashboard', ['token' => $token, 'modules' => $modules, 'videos' => $videos]);
    }

    protected function getModules(): array
    {
        $dirs = Storage::directories('public/videos');
        $modules = [];
        foreach ($dirs as $dir) {
            $path = explode('/', $dir);
            $module = end($path);
            array_push($modules, $module);
        }

        return $modules;
    }

    protected function getVideosByModule(string $module): array
    {
        $files = Storage::files('public/videos/' . $module);
        $videos = [];
        foreach ($files as $file) {
            $url = Storage::url($file);
            array_push($videos, $url);
        }
        return $videos;
    }
}
