var table = $('#example').DataTable( {
    lengthChange: false,
    ajax: url + "/products/all",
    columns: [
        { data: "name" },
        { data: "quantity" },
        { data: "price" },
        { data: "datatime" },
        { data: "totalNumberValue" },
    ],
    select: true,
    "order": [[ 3, 'desc']]
});
