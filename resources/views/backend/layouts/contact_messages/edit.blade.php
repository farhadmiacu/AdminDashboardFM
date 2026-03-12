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
                        <li class="breadcrumb-item active">Reply Message</li>
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
                    <h4 class="card-title mb-0 flex-grow-1">Reply to Message</h4>
                </div>

                <form action="{{ route('admin.contact-messages.update-status', $contactMessage->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="row gy-4">

                            {{-- Original Message Header --}}
                            <div class="col-xxl-12 col-md-12">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Original Message from {{ $contactMessage->name }} {{ $contactMessage->surname }}</strong>
                                    <p class="mb-0 mt-2">{{ $contactMessage->message }}</p>
                                </div>
                            </div>

                            {{-- Name --}}
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="name" class="form-label"><strong>Sender Name</strong></label>
                                    <input type="text" class="form-control" value="{{ $contactMessage->name }}" readonly>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="email" class="form-label"><strong>Sender Email</strong></label>
                                    <input type="email" class="form-control" value="{{ $contactMessage->email }}" readonly>
                                </div>
                            </div>

                            {{-- Subject --}}
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="subject" class="form-label"><strong>Subject</strong></label>
                                    <input type="text" class="form-control" value="{{ $contactMessage->subject }}" readonly>
                                </div>
                            </div>

                            {{-- Status Update --}}
                            <div class="col-xxl-6 col-md-6">
                                <label for="statusSelect" class="form-label"><strong>Update Status</strong></label>
                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="statusSelect">
                                    <option value="pending" {{ $contactMessage->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="replied" {{ $contactMessage->status == 'replied' ? 'selected' : '' }}>Replied</option>
                                    <option value="closed" {{ $contactMessage->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Note about reply --}}
                            <div class="col-xxl-12 col-md-12">
                                <div class="alert alert-warning" role="alert">
                                    <strong>Note:</strong> Please send your reply directly via email to <strong>{{ $contactMessage->email }}</strong>. This form updates the status to track that a reply has been sent.
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="col-xxl-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Mark as Replied</button>
                                <a href="{{ route('admin.contact-messages.show', $contactMessage->id) }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
