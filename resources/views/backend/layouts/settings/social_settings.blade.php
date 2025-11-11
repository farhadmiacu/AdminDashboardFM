@extends('backend.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                <h4 class="mb-sm-0">Social Settings</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Update Social Links</h4>
                </div>

                <form action="{{ route('admin.social-settings.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row gy-4">

                            @php
                                $fields = [
                                    'facebook' => 'Facebook URL',
                                    'instagram' => 'Instagram URL',
                                    'twitter' => 'Twitter URL',
                                    'tiktok' => 'TikTok URL',
                                    // 'whatsapp' => 'WhatsApp Number or URL',
                                    // 'linkedin' => 'LinkedIn URL',
                                    // 'telegram' => 'Telegram URL',
                                    // 'youtube' => 'YouTube URL',
                                ];
                            @endphp

                            @foreach ($fields as $field => $label)
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                        <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control" placeholder="Enter {{ strtolower($label) }}"
                                            value="{{ old($field, $setting->$field ?? '') }}">
                                        @error($field)
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-xxl-12 col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">Update Settings</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
