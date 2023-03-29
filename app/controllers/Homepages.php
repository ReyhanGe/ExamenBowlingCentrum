<?php
class HomePages extends Controller
{

  public function index()
  {
    $data = [
      'title' => "Homepage Bowlingcentrum Brooklyn"
    ];
    $this->view('homepages/index', $data);
  }
}
