<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RAKSO TECH EXAM - ERO AGUILAR</title>

    @vite(['resources/js/app.js'])

    @livewireStyles
</head>
<body>
    <div class="bg-light">
        <h1>Upload CSV File</h1>
        @if (session()->has('success'))
        <h5 class="text-success fw-bold">
            {{session()->get('success')}}
        </h5>
        @endif

        @if (session()->has('fail'))
        <h5 class="text-danger fw-bold">
            {{session()->get('fail')}}
        </h5>
        @endif
        <form action="{{ route('upload-csv') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="csv" required>

            <h4 class="text-muted">* Set the new values for each field upon uploading the CSV file.</h4>
            <div class="d-flex justify-content-between align-items-center bg-light">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <select class="form-select" name="title_value" id="title">
                        <option selected>Select one</option>
                        <option value="title" selected>Title</option>
                        <option value="fname">First Name</option>
                        <option value="lname">Last Name</option>
                        <option value="phone">Mobile Number</option>
                        <option value="company">Company</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <select class="form-select" name="fname_value" id="fname">
                        <option selected>Select one</option>
                        <option value="title">Title</option>
                        <option value="fname" selected>First Name</option>
                        <option value="lname">Last Name</option>
                        <option value="phone">Mobile Number</option>
                        <option value="company">Company</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <select class="form-select" name="lname_value" id="lname">
                        <option selected>Select one</option>
                        <option value="title">Title</option>
                        <option value="fname">First Name</option>
                        <option value="lname" selected>Last Name</option>
                        <option value="phone">Mobile Number</option>
                        <option value="company">Company</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Mobile Number</label>
                    <select class="form-select" name="phone_value" id="phone">
                        <option selected>Select one</option>
                        <option value="title">Title</option>
                        <option value="fname">First Name</option>
                        <option value="lname">Last Name</option>
                        <option value="phone" selected>Mobile Number</option>
                        <option value="company">Company</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="company" class="form-label">Company</label>
                    <select class="form-select" name="company_value" id="company">
                        <option selected>Select one</option>
                        <option value="title">Title</option>
                        <option value="fname">First Name</option>
                        <option value="lname">Last Name</option>
                        <option value="phone">Mobile Number</option>
                        <option value="company" selected>Company</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-lg">
                Submit and Upload CSV
            </button>
        </form>
    </div>

    @livewire('contacts')

    @livewireScripts
</body>
</html>