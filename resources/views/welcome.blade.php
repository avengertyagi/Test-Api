<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased">
    <section class="customer_index">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>@lang('S.No')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    var table = '';
    $(function() {
        table = $('#userTable').DataTable({
            "language": {
                "zeroRecords": "No record(s) found.",
                searchPlaceholder: "Search records"
            },
            order: [0, 'desc'],
            ordering: true,
            paging: true,
            processing: true,
            serverSide: true,
            lengthChange: true,
            searchable: true,
            ajax: {
                url: "{{ url('index') }}",
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    searchable: true,
                    orderable: true,
                    defaultContent: 'NA'
                },
                {
                    data: 'email',
                    name: 'email',
                    searchable: true,
                    orderable: true,
                    defaultContent: 'NA'
                },
            ]
        });
        $.fn.dataTable.ext.errMode = 'none';
        $('#userTable').on('error.dt', function(e, settings, techNote, message) {
            console.log('An error has been reported by DataTables: ', message);
        })
        $('#btnFiterSubmitSearch').click(function() {
            $('#userTable').DataTable().draw(true);
        });
    });
</script>
