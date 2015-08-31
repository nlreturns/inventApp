var client = {
    // object constructor
    initialize: function() {
        // check if worksheet in progress
        if (window.localStorage.getItem('worksheetstatus') === null | window.localStorage.getItem('worksheetstatus') === "0") {
            // not in progress
            this.start();
        } else if (window.localStorage.getItem('worksheetstatus') === "1") {
            // worksheet busy, redirect to page
            window.location.assign('worksheet.html');
        } else {
            // continue
        }
    },
    update: function() {
        // call to online db
        $.post('http://localhost/inventOnline/clientupdate.php', {clients: "test"},
        function(data) {

            // store session variables
            window.localStorage.setItem('clients', data);

            // redirect to main page
            window.location.assign('index.html');

        });

        //put data in json object / localstorage
    },
    flush: function() {
        window.localStorage.removeItem('worksheetstatus');
        window.localStorage.removeItem('clientid');
        window.localStorage.removeItem('addCompany');
    }
};