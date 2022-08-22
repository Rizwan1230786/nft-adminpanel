<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<style>
   table {
    counter-reset: section;
  }

  .count:before {
    counter-increment: section;
    content: counter(section);
  }
</style>
<body class="container-fluid">
    <h3 class="mb-5 text-center">Nfc Customer Request List</h3>
    <table class="table">
        <thead>
            <tr>
                <td>id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Contact</td>
                <td>Created at</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                <td class="count"></td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->contact }}</td>
                <td>{{$data->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>