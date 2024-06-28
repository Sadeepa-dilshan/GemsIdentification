<!-- resources/views/gems/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Gems List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <style>
        main {
            margin: 20px;
        }
        .action-button {
            margin: 5px;
        }
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: right;
        }
        .dataTables_wrapper .dataTables_length {
            float: left;
        }
        .dataTables_wrapper .dataTables_info {
            float: left;
        }
        .dataTables_wrapper .dataTables_paginate {
            float: right;
        }
        body {
            background-image: url('/images/GRD_page-0002.jpg'); /* Add your background image path here */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
    
    <main>
        <div class="container mt-5">
            <h2 class="mb-4 text-center">Gems List</h2>
            <table id="gems-table" class="display table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Species</th>
                        <th>Variety</th>
                        <th>Shape & Cutting Style</th>
                        <th>Measurements</th>
                        <th>Carat Weight</th>
                        <th>Color</th>
                        <th>Transparency</th>
                        <th>User Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gems as $gem)
                    <tr>
                        <td>{{ $gem->id }}</td>
                        <td>{{ $gem->species }}</td>
                        <td>{{ $gem->variety }}</td>
                        <td>{{ $gem->shape_cutting_style }}</td>
                        <td>{{ $gem->measurements }}</td>
                        <td>{{ $gem->carat_weight }}</td>
                        <td>{{ $gem->color }}</td>
                        <td>{{ $gem->transparency }}</td>
                        <td>{{ $gem->userDetail->name }}</td>
                        <td>{{ $gem->userDetail->mobile }}</td>
                        <td>{{ $gem->userDetail->address }}</td>
                        <td>
                            <a href="{{ route('gems.downloadReport', $gem->id) }}" class="btn btn-primary btn-sm action-button">Download Report</a>
                            <a href="{{ route('gems.downloadCard', $gem->id) }}" class="btn btn-secondary btn-sm action-button">Download Card</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            $(document).ready(function() {
                $('#gems-table').DataTable({
                    responsive: true,
                    autoWidth: false,
                    language: {
                        search: "Filter records:"
                    },
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ]
                });
            });
        </script>
</main>
</html>
