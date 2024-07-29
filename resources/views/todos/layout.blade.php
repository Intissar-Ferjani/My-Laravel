<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: "Open Sans", sans-serif;
            line-height: 1.6;
        }
        .add-todo-input, .edit-todo-input {
            outline: none;
        }
        .add-todo-input:focus, .edit-todo-input:focus {
            border: none !important;
            box-shadow: none !important;
        }
        .view-opt-label, .date-label {
            font-size: 0.8rem;
        }
        .edit-todo-input {
            font-size: 1.7rem !important;
        }
        .todo-actions {
            visibility: hidden !important;
        }
        .todo-item:hover .todo-actions {
            visibility: visible !important;
        }
        .todo-item.editing .todo-actions .edit-icon {
            display: none !important;
        }
        .container {
            width: 650px; 
        }
    </style>

   

</head>

<body>
    <div class="container m-5 p-2 rounded mx-auto bg-light shadow">
        @yield('content')
    </div>
    @livewireStyles
    @livewireScripts
    
</body>
</html>
