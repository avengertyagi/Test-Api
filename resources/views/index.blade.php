<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">

    <title>Tables</title>
</head>

<body>
    <div class="container">
        <h3>The columns titles are merged with the filters inputs thanks to the placeholders attributes</h3>
        <hr>
        <p>Inspired by this <a href="http://bootsnipp.com/snippets/featured/panel-tables-with-filter">snippet</a></p>
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Users</h3>
                    <div class="pull-right">
                        <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th><input type="text" class="form-control" placeholder="#" disabled></th>
                            <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
                            <th><input type="text" class="form-control" placeholder="Username" disabled></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    @push('js')
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
                    // bStateSave: true,
                    ajax: {
                        url: "{{ url('admin/city/table/list') }}",
                        data: function(d) {
                            d.status = $('#status').val();
                        }
                    },
                    columns: [{
                            data: 'created_at',
                            name: 'created_at',
                            searchable: false,
                            orderable: true,
                            defaultContent: 'NA',
                            visible: false,
                        }, {
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
                            data: 'state.name',
                            name: 'state.name',
                            searchable: true,
                            orderable: true,
                            defaultContent: 'NA'
                        },
                        {
                            data: 'state_code',
                            name: 'state_code',
                            searchable: true,
                            orderable: true,
                            defaultContent: 'NA'
                        },
                        {
                            data: 'country.name',
                            name: 'country.name',
                            searchable: true,
                            orderable: true,
                            defaultContent: 'NA'
                        },
                        {
                            data: 'country_code',
                            name: 'country_code',
                            searchable: true,
                            orderable: true,
                            defaultContent: 'NA'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            searchable: false,
                            orderable: false,
                            defaultContent: 'NA'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            searchable: false,
                            orderable: false,
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
    @endpush
</body>
</html>
