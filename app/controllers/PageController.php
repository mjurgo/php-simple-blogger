<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Models\Page;

class PageController extends BaseController
{
  public function home()
  {
    return view('pages/home');
  }

  public function about()
  {
    return view('pages/about');
  }

  public function show(int $id)
  {
    return view('pages/show', ['page' => Page::find($id)]);
  }

  public function new()
  {
    Auth::requireAdmin();

    return view('pages/new');
  }

  public function create()
  {
    Auth::requireAdmin();
    Page::create($this->request->post());

    return redirect('/');
  }

  public function edit(int $id)
  {
    Auth::requireAdmin();

    return view('/pages/edit', ['page' => Page::find($id)]);
  }

  public function update(int $id)
  {
    Auth::requireAdmin();
    /* dd($this->request->post()); */
    Page::update($id, $this->request->post());

    return redirect("/pages/{$id}");
  }

  public function destroy(int $id)
  {
    Auth::requireAdmin();
    Page::delete($id);

    return redirect('/');
  }
}
