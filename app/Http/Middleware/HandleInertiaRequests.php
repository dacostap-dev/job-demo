<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
  /**
   * The root template that is loaded on the first page visit.
   *
   * @var string
   */
  protected $rootView = 'app';

  /**
   * Determine the current asset version.
   */
  public function version(Request $request): string|null
  {
    return parent::version($request);
  }

  /**
   * Define the props that are shared by default.
   *
   * @return array<string, mixed>
   */
  public function share(Request $request): array
  {
    return [
      ...parent::share($request),
      'auth' => [
        'user' => $request->user() ? [
          'name' => $request->user()->name,
          'email' => $request->user()->email,
          'roles' => $request->user()->roles()->pluck('name'),
          'permissions' => $request->user()->getPermissionsViaRoles()->pluck('name'),
        ] : null,
      ],
      'flash' => function () use ($request) {
        return [
          'success' => $request->session()->get('success'),
          'error' => $request->session()->get('error'),
        ];
      },
    ];
  }
}
