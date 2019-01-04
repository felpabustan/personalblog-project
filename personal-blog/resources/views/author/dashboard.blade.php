@extends('layouts.admin')

@section('title') Author Dashboard @endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{ Auth::user()->postsToday->count() }}</span>
                                @if (Auth::user()->postsToday->count() <= 1)
                                    <span class="font-weight-light">Post today</span>
                                @else
                                    <span class="font-weight-light">Posts today</span>
                                @endif
                                
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-paper-clip"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{ Auth::user()->posts->count() }}</span>
                                <span class="font-weight-light">All Posts</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-paper-plane"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{ $allComments->count() }}</span>
                                @if ($allComments->count() <= 1)
                                    <span class="font-weight-light">Comment all time</span>
                                @else
                                    <span class="font-weight-light">Comments all time</span>
                                @endif
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-book-open"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{ $todayComments->count() }}</span>
                                @if ( $todayComments->count() <= 1)
                                    <span class="font-weight-light">Comment today</span>
                                @else
                                    <span class="font-weight-light">Comments today</span>
                                @endif
                                
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-clock"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Posts by day
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection