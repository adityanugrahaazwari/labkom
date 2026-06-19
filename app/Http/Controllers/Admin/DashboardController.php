<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews = \App\Models\News::count();
        $totalAgenda = \App\Models\Agenda::count();
        $totalDocument = \App\Models\Document::count();
        $totalFaq = \App\Models\Faq::count();
        $totalLab = \App\Models\Laboratory::count();
        $totalUser = \App\Models\User::count();
        $totalDownloads = \App\Models\Document::sum('download_count');
        $totalNewsViews = \App\Models\News::sum('views');

        $recentLogs = \App\Models\AuditLog::with('user')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        $recentNews = \App\Models\News::with(['category', 'user'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $popularDocuments = \App\Models\Document::orderBy('download_count', 'desc')
            ->take(5)
            ->get();

        $activeAgendas = \App\Models\Agenda::where('status', true)
            ->orderBy('event_date', 'asc')
            ->take(5)
            ->get();

        $systemInfo = [
            'laravel_version' => app()->version(),
            'php_version' => PHP_VERSION,
            'db_driver' => config('database.default'),
            'app_env' => config('app.env'),
            'debug_mode' => config('app.debug') ? 'Enabled' : 'Disabled',
        ];

        return view('admin.dashboard', compact(
            'totalNews',
            'totalAgenda',
            'totalDocument',
            'totalFaq',
            'totalLab',
            'totalUser',
            'totalDownloads',
            'totalNewsViews',
            'recentLogs',
            'recentNews',
            'popularDocuments',
            'activeAgendas',
            'systemInfo'
        ));
    }
}
