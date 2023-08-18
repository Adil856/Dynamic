<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>Create Contact</h1>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="form-group px-5">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group px-5">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group px-5">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <button class="btn btn-primary ml-5">Add Contact</button>
    </form>
</body>
</html>
