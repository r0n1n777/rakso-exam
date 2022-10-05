<div>
    <h4 class="text-muted">List of Contacts</h4>
    <div class="table-responsive mt-2">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Company</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr class="">
                        <td scope="row">{{ $contact->title }}</td>
                        <td>{{ $contact->fname }}</td>
                        <td>{{ $contact->lname }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->company }}</td>
                        <td>
                            <i class="bi bi-pencil" data-bs-toggle="modal" data-bs-target="#contact-form" wire:click="edit({{$contact->id}})"></i>
                            <i class="bi bi-trash" wire:click="delete({{$contact->id}})"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="contact-form" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="contact-form" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="contact-formLabel">Contact Information</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" wire:submit.prevent="update">
                        <div class="col-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" value="{{$title}}" required wire:model.defer="title">
                            @error('title')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" value="{{$fname}}" required wire:model.defer="fname">
                            @error('fname')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" value="{{$lname}}" required wire:model.defer="lname">
                            @error('lname')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="phone" value="{{$phone}}" required wire:model.defer="phone">
                            @error('phone')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control" id="company" value="{{$company}}" required wire:model.defer="company">
                            @error('company')
                            <div class="error">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update Record</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    @if ($success == true)
                    <h5 class="text-success">Record successfully saved.</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
