@extends('backend.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                <h4 class="mb-sm-0">Contact Messages</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.contact-messages.index') }}">Contact Messages</a></li>
                        <li class="breadcrumb-item active">View Message</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Message Details</h4>
                    <a href="{{ route('admin.contact-messages.edit', $contactMessage->id) }}" class="btn btn-sm btn-primary">Reply</a>
                </div>

                <div class="card-body">
                    <div class="row gy-4">

                        {{-- Name --}}
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label class="form-label"><strong>First Name</strong></label>
                                <p>{{ $contactMessage->name ?? 'N/A' }}</p>
                            </div>
                        </div>

                        {{-- Surname --}}
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label class="form-label"><strong>Surname</strong></label>
                                <p>{{ $contactMessage->surname ?? 'N/A' }}</p>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label class="form-label"><strong>Email</strong></label>
                                <p><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email ?? 'N/A' }}</a></p>
                            </div>
                        </div>

                        {{-- Nation --}}
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label class="form-label"><strong>Nation</strong></label>
                                <p>{{ $contactMessage->nation ?? 'N/A' }}</p>
                            </div>
                        </div>

                        {{-- Activity --}}
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label class="form-label"><strong>Activity</strong></label>
                                <p>{{ $contactMessage->activity ?? 'N/A' }}</p>
                            </div>
                        </div>

                        {{-- Telephone --}}
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label class="form-label"><strong>Telephone</strong></label>
                                <p><a href="tel:{{ $contactMessage->telephone }}">{{ $contactMessage->telephone ?? 'N/A' }}</a></p>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="col-xxl-6 col-md-6">
                            <div>
                                <label class="form-label"><strong>Status</strong></label>
                                <p>
                                    @php
                                        $status = trim($contactMessage->status);
                                        if (empty($status)) $status = 'pending';

                                        $badgeClass = match (strtolower($status)) {
                                            'pending' => 'bg-danger',
                                            'replied' => 'bg-warning',
                                            'closed' => 'bg-success',
                                            default => 'bg-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ ucfirst($status) }}</span>
                                </p>
                            </div>
                        </div>

                        {{-- Message --}}
                        <div class="col-xxl-12 col-md-12">
                            <div>
                                <label class="form-label"><strong>Message</strong></label>
                                <div class="border rounded p-3 bg-light">
                                    <p>{!! nl2br(e($contactMessage->message ?? 'N/A')) !!}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Date --}}
                        <div class="col-xxl-12 col-md-12">
                            <div>
                                <label class="form-label"><strong>Received On</strong></label>
                                <p>{{ $contactMessage->created_at->format('d M Y, H:i A') ?? 'N/A' }}</p>
                            </div>
                        </div>

                        {{-- Status Update Form --}}
                        <div class="col-xxl-12 col-md-12 mt-3">
                            <form action="{{ route('admin.contact-messages.update-status', $contactMessage->id) }}" method="POST" class="d-flex gap-2 align-items-end">
                                @csrf
                                @method('PATCH')

                                <div class="flex-grow-1">
                                    <label for="statusSelect" class="form-label"><strong>Update Status</strong></label>
                                    <select class="form-select" name="status" id="statusSelect">
                                        <option value="pending" {{ $contactMessage->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="replied" {{ $contactMessage->status == 'replied' ? 'selected' : '' }}>Replied</option>
                                        <option value="closed" {{ $contactMessage->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">Update Status</button>
                            </form>
                        </div>

                        {{-- Back Button --}}
                        <div class="col-xxl-12 col-md-12">
                            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">Back to Messages</a>
                            <form action="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-button">Delete Message</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
