$('#example').dataTable( {
  "ajaxSource": "root/",
  "columns": [
    { "data": "0" },
    { "data": "1" },
    { "data": "2",
        render: function ( data, type, row ) {
            return row.mobile + ' / ' + row.email + ' / '  + row.whatsapp;
        }
    },
    { "data": "3", 
        render: function ( data, type, row ) {
            return row.state + ' / ' + row.city;
        }
    },
    { "data": "4" },
    { "data": "5" },
    { "data": "6" },
    { "data": "7" },
    { "data": "8" },
    { "data": "9",
        render: function ( data, type, row ) {
            return "<button>Edit</button>";
        }
    },
    { "data": "10" },
  ],
} );
