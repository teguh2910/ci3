<!DOCTYPE html>
<html>
<head>
    <title>People List</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <!-- Include DataTables CSS from CDN -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- Include SweetAlert CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <!-- Include DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

</head>
<body>
    <div class="container">
        <!-- Main content -->
        <div class="content">
            <h1>People List</h1>
            <a href="<?php echo site_url('person/create'); ?>" class="btn btn-success">Add Person</a>
            <table id="people-table" class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through the data -->
                    <?php foreach ($people as $person): ?>
                        <tr>
                            <td><?php echo $person->name; ?></td>
                            <td><?php echo $person->email; ?></td>
                            <td><?php echo $person->phone; ?></td>
                            <td>
                                <a href="<?php echo site_url('person/edit/'.$person->id); ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo site_url('person/delete/'.$person->id); ?>" class="btn btn-danger delete-person">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>            
        </div>
    </div>
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Include SweetAlert JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <!-- Include DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/pdfmake.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.70/build/vfs_fonts.js"></script>
   
    <script>
    $(document).ready(function() {
        var table = $('#people-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pdf'
            ]
        });

        // Export to PDF button event
        $('#export-pdf').on('click', function() {
            table.button('.buttons-pdf').trigger();
        });
    });
    </script>
    <script>
        $(document).ready(function() {
            // Delete person event
            $('.delete-person').on('click', function(e) {
                e.preventDefault();
                var deleteUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl;
                    }
                });
            });
        });
    </script>
</body>
</html>
