<html>
    <head>
        <title>Checklist</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <style>
            h1 ,h2, h3, h4, h5, h6 {
                margin: 0;
                padding: 0;
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <div class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ action('TasklistController@index') }}" class="navbar-brand">Tasklist</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Create... <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ action("TasklistController@create") }}">Create tasklist</a></li>
                            <li><a href="{{ action("TaskCategoryController@create") }}">Create category</a></li>
                            <li><a href="{{ action("TaskController@create") }}">Create task</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">

        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('input[type=checkbox]').change(function() {
            var parts = $(this).attr('name').split('-');

            $.ajax({
                type: 'PUT',
                url: '../Task/signoff/' + parts[1],
                data: {checked: this.checked},
                success: function(data) {
                    console.log(data);
                }
            });

            var oldVal = $('#count-' + parts[0]).text();
            $('#count-' + parts[0]).text(parseInt(oldVal) + (this.checked ? 1 : -1));

            var oldVal = $('#totalCount').text();
            $('#totalCount').text(parseInt(oldVal) + (this.checked ? 1 : -1));
        });

        (function() {

            var laravel = {
                initialize: function() {
                    this.methodLinks = $('a[data-method]');

                    this.registerEvents();
                },

                registerEvents: function() {
                    this.methodLinks.on('click', this.handleMethod);
                },

                handleMethod: function(e) {
                    var link = $(this);
                    var httpMethod = link.data('method').toUpperCase();
                    var form;

                    // If the data-method attribute is not PUT or DELETE,
                    // then we don't know what to do. Just ignore.
                    if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
                        return;
                    }

                    // Allow user to optionally provide data-confirm="Are you sure?"
                    if ( link.data('confirm') ) {
                        if ( ! laravel.verifyConfirm(link) ) {
                            return false;
                        }
                    }

                    form = laravel.createForm(link);
                    form.submit();

                    e.preventDefault();
                },

                verifyConfirm: function(link) {
                    return confirm(link.data('confirm'));
                },

                createForm: function(link) {
                    var form =
                            $('<form>', {
                                'method': 'POST',
                                'action': link.attr('href')
                            });

                    var token =
                            $('<input>', {
                                'type': 'hidden',
                                'name': 'csrf_token',
                                'value': link.data('token')
                            });

                    var hiddenInput =
                            $('<input>', {
                                'name': '_method',
                                'type': 'hidden',
                                'value': link.data('method')
                            });

                    return form.append(token, hiddenInput)
                            .appendTo('body');
                }
            };

            laravel.initialize();

        })();
    </script>
    </body>
</html>