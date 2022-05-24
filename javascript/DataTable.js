$(document).ready(function () {
    $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: 'http://localhost:8080/index.php',
            type: 'POST',
        },
        search:{
            return: true,
        },
        columns: [
            { data: 'id' },
            { data: 'birth_date' },
            { data: 'first_name' },
            { data: 'last_name' },
            { data: 'gender' },
            { data: 'hire_date' },
        ],
    });
});